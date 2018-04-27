<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateOrderRequest;
use App\Jobs\SwitchMeasurementUnits;
use JavaScript, Mail, Auth, Session, URL;
use Address, Jacket, Measurement, Attribute, Order, User;

class OrdersController extends Controller {

	public function show($id, Request $request)
	{
		$order = Order::find($id);
    $jacket = $order->jacket;

    if ($order->status == 'new') return redirect()->back();
    if ($order->statusIsAfter('started')) return redirect()->route('orders.complete', $order->id);
    if (!$request->old()) {
      $new_order = [
        'user_id'          => Auth::id(),
        'model'            => $jacket->model,
        'jacket_look'      => [
          'leather_type'   => $jacket->leather_type,
          'leather_color'  => $jacket->leather_color,
          'lining_color'   => $jacket->lining_color,
          'hardware_color' => $jacket->hardware_color
        ]
      ];
    } else {
      $new_order = $request->old();
    }

    JavaScript::put([
      'attributes' => $jacket->attributes()->get(),
      'jacket' => $jacket,
      'session' => Session::all()
    ]);

		return view('pages.orders.show', ['order' => $order, 'jacket' => $jacket, 'new_order' => $new_order]);
	}


	public function store(CreateOrderRequest $request)
	{
    // Clear the saved credit card info from the session
    Session::remove('card');

    $last_order = Auth::user()->orders->last();
    $hasExistingOrder = $last_order && ($last_order->status == 'new' || $last_order->status == 'started');
    $switchedModels = $last_order && $last_order->model !== $request->model;

    if ($hasExistingOrder && !$switchedModels) {
      $order = $last_order;
    } else {
      $order = $this->dispatchFrom('App\Jobs\CreateNewOrder', $request);
    }
		if ($order->bodyMeasurements) {
			$completed_measurements = $order->bodyMeasurements->completed();
      $uncompleted_measurements = $order->bodyMeasurements->uncompleted();
			if ($uncompleted_measurements && $completed_measurements) {
	      Session::flash('message', "Looks you already submitted some of your measurements. Please enter the rest for a perfect fit.");
				return redirect()->route('fit.show', [$order->id, array_shift($uncompleted_measurements)]);
			} else {
				return redirect()->route('orders.checkout', $order->id);
			}
		}

		return redirect()->route('fit.show', [$order->id, 'units']);
	}


	public function resetOrder($id, Request $request)
	{
    $this->dispatchFrom('App\Jobs\ResetOrder', $request, ['id' => $id]);

    $url = URL::route('home') . '#jackets';

		return redirect()->to($url);
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
		} elseif ($order->statusIsAfter('started')) {
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

		// Update the order with latest jacket look from the session
		$jacket = Session::get($order->jacket->model);

    $attributes = ['leather_type', 'leather_color', 'lining_color', 'hardware_color', 'collar_color'];

    $jacket_look = [];

    foreach ($attributes as $attribute) {
      if ($jacket[$attribute]) {
        $jacket_look[] = $jacket[$attribute];
      }
    }

    $order->attributes()->sync($jacket_look);

    $total_price = $order->jacket->price;
    foreach ($order->attributes()->get() as $order_attribute) {
      $total_price += $order_attribute->price;
    }

    if (!isset($order->measurements['note']) || $order->measurements['note'] == '') {
      $order->measurements['note'] = '-';
      $order->total = money_format('%i', $total_price);
      $order->save();
    }

    JavaScript::put([
			'order'   => $order,
			'user'    => $order->user,
			'address' => $order->address,
			'session' => Session::all(),
			'stripe_key' => env('STRIPE_PUBLISHABLE')
    ]);

		return view('pages.orders.checkout', ['order' => $order]);
	}


	public function process($id, Request $request)
	{
		$order = Order::findOrFail($id);
    $stripe_charge = $this->dispatchFrom('App\Jobs\ProcessOrderPayment', $request, ['order' => $order]);

    if ($stripe_charge) {
      Session::flash('success', "Checkout complete!");
      return redirect()->route('orders.complete', $order->id);
    } else {
 	    Session::remove('card'); // Clear the saved credit card info from the session
    	Session::flash('alert', "Looks like your credit card was declined. Please contact your bank or try another card.");
      return redirect()->route('orders.checkout', $order->id);
    }


    return 'something went wrong with the payment';
	}


	public function complete($id) {
		$order = Order::findOrFail($id);
		return view('pages.orders.complete', ['order' => $order]);
	}

}
