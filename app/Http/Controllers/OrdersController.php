<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateOrderRequest;
use App\Jobs\SwitchMeasurementUnits;
use JavaScript, Mail, Auth, Session;
use Address, Jacket, Measurement, Attribute, Order, User;

class OrdersController extends Controller {


	public function look($id)
	{
		$order = Order::find($id);
		JavaScript::put(['jacket' => $order->jacket, 'session' => Session::all()]);

		return view('pages.jackets.look', ['jacket' => $order->jacket]);
	}


	public function show($id, Request $request)
	{
		$order = Order::find($id);

		if ($order->status == 'new') return redirect()->back();
		if (!$order->isNew()) return redirect()->route('orders.complete', $order->id);
		if (!$request->old()) {
			$new_order = [
				'user_id'          => Auth::id(),
				'model'            => $order->jacket->model,
				'jacket_look'			 => [
					'leather_type'   => $order->jacket->leather_type,
					'leather_color'  => $order->jacket->leather_color,
					'lining_color'   => $order->jacket->lining_color,
					'hardware_color' => $order->jacket->hardware_color
				]
			];
		} else {
			$new_order = $request->old();
		}

		return view('pages.orders.show', ['order' => $order, 'new_order' => $new_order]);
	}


	public function store(CreateOrderRequest $request)
	{
    Session::remove('card'); // Clear the saved credit card info from the session
		$order = $this->dispatchFrom('App\Jobs\CreateNewOrder', $request);
		if ($order->bodyMeasurements && $order->bodyMeasurements->completed()) {
      Session::flash('message', "Looks you already submitted some of your measurements. Please enter the rest for a perfect fit.");
      $uncompleted_measurements = $order->bodyMeasurements->uncompleted();
			return redirect()->route('fit.show', [$order->id, array_shift($uncompleted_measurements)]);
		}

		return redirect()->route('fit.show', [$order->id, 'units']);
	}


	public function resetOrder($id, Request $request)
	{
    $this->dispatchFrom('App\Jobs\ResetOrder', $request, ['id' => $id]);

		return redirect()->route('jackets.index');
	}


	public function getFit($id, $step = null)
	{
		$order = Order::find($id);

		if ($step == 'next' || $step == null) {
			$uncompleted_measurements = $order->bodyMeasurements ? $order->bodyMeasurements->uncompleted() : null;
			$completed_measurements   = $order->bodyMeasurements ? $order->bodyMeasurements->completed() : null;
			if (!$completed_measurements) {
				return redirect()->route('fit.show', ['id' => $order->id, 'step' => 'height']);
			} elseif ($uncompleted_measurements) {
				return redirect()->route('fit.show', ['id' => $order->id, 'step' => array_shift($uncompleted_measurements)]);
			} else {
				return redirect()->route('orders.checkout', $order->id);
			}
		}

		return view('pages.measurement.' . $step, ['order' => $order, 'step' => $step]);
	}


	public function postFit($id, Request $request)
	{
 		$this->dispatchFrom('App\Jobs\SubmitMeasurement', $request, ['id' => $id]);

    $order = Order::find($id);

    if ($order->bodyMeasurements) {
    	if (!$uncompleted_measurements = $order->bodyMeasurements->uncompleted()) {
				return redirect()->route('orders.checkout', $order->id);
    	} else {
				return redirect()->route('fit.show', ['id' => $order->id, 'step' => array_shift($uncompleted_measurements)]);
    	}
		} elseif (!$order->isNew()) {
			return redirect()->route('orders.complete', $order->id);
		}

		return redirect()->route('fit.show', ['id' => $order->id, 'step' => 'height']);
	}


	public function switchUnits($id)
	{
		$order = Order::find($id);
    $this->dispatch(new SwitchMeasurementUnits($order->bodyMeasurements));

		return redirect()->back();
	}


	public function update($id, Request $request)
	{
    $order = $this->dispatchFrom('App\Jobs\UpdateOrder', $request, ['id' => $id]);

    if ($request->ajax() || $request->wantsJson()) {
			return response()->json($order);
    }

	  Session::flash('success', "Order updated");
    return redirect()->back();
	}


	public function checkout($id)
	{
		$order = Order::findOrFail($id);

    JavaScript::put([
			'order'   => $order,
			'user'    => $order->user,
			'address' => $order->address,
			'session' => Session::all()
    ]);

		return view('pages.orders.checkout', ['order' => $order]);
	}


	public function process($id, Request $request)
	{
		$order = Order::findOrFail($id);
    $stripe_charge = $this->dispatchFrom('App\Jobs\ProcessOrderPayment', $request, ['order' => $order]);

    if ($stripe_charge) {
      // Mail::send('emails.order-confirmation', ['order' => $order], function ($message) use ($order) {
      //   $message->to($order->user->email, $order->user->name);
      //   $message->from('contact@sapayol.com');
      //   $message->subject('Thanks for ordering a custom ' . $order->jacket->name );
      // });

      Session::flash('success', "Checkout complete!");
      return redirect()->route('orders.complete', $order->id);
    }

    return 'something went wrong with the payment';
	}


	public function complete($id) {
		$order = Order::findOrFail($id);
		return view('pages.orders.complete', ['order' => $order]);
	}

}
