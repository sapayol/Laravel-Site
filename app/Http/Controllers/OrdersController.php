<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateOrderRequest;
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

		if ($order->status == 'new') {
			return redirect()->back();
		}

		if (!$order->isNew()) {
			return redirect()->route('orders.complete', $order->id);
		}

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
    Session::remove('card');

		$order = $this->dispatchFrom('App\Jobs\CreateNewOrder', $request);

		if ($order->userMeasurements->completed()) {
      Session::flash('message', "Looks you already submitted some of your measurements. Please enter the rest for a perfect fit.");
      $uncompleted_measurements = $order->userMeasurements->uncompleted();
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
		if ($step == 'next' && count($incomplete_measurements = $order->userMeasurements->getIncompleteMeasurements()) <= 0) {
			return redirect()->route('fit.show', ['id' => 1,  'step' => 'height']);
		} elseif ($step == 'next' && count($incomplete_measurements = $order->userMeasurements->getIncompleteMeasurements()) > 0) {
			$step =  array_shift($incomplete_measurements);
			return redirect()->route('fit.show', ['id' => 1,  'step' => $step]);
		} elseif ($step == null) {
			return redirect()->route('fit.show', ['id' => 1,  'step' => 'units']);
		}

		return view('pages.measurement.' . $step, ['order' => $order, 'step' => $step]);
	}


	public function postFit($id, Request $request)
	{
    $order = $this->dispatchFrom('App\Jobs\SubmitMeasurement', $request, ['id' => $id]);
    $uncompleted_measurements = $order->userMeasurements->uncompleted();

		if ($uncompleted_measurements) {
			return redirect()->route('fit.show', ['id' => $order->id, 'step' => array_shift($uncompleted_measurements)]);
		} elseif (!$order->isNew()) {
			return redirect()->route('orders.complete', $order->id);
		} else {
			return redirect()->route('orders.checkout', $order->id);
		}
	}


	public function switchUnits($id)
	{
		$order = Order::find($id);
		$measurements = ['height', 'half_shoulder', 'back_width', 'chest', 'stomach', 'back_length', 'waist', 'arm', 'biceps'];

		foreach ($measurements as $measurement) {
			if ($order->userMeasurements->$measurement == null || $order->userMeasurements->$measurement == 0) {
				$order->userMeasurements->$measurement = null;
			} elseif ($order->userMeasurements->units == 'in') {
				$order->userMeasurements->$measurement = round($order->userMeasurements->$measurement * 2.54, 0);
			} else {
				$order->userMeasurements->$measurement /= 2.54;
			}
		}

		$order->userMeasurements->units = $order->userMeasurements->units == 'in' ? 'cm' : 'in';
		$order->userMeasurements->save();

		return redirect()->back();
	}

	public function update($id, Request $request)
	{
		$order = Order::findOrFail($id);

		// Check if user with this email exists and return them or create a new record for them
		if ($request->name) {
			$order->user->name = $request->name;
			$order->user->save();
		}

		if ($request->address1 && $request->city) {
			$address = Address::create([
				'address1' => $request->address1,
				'address2' => $request->address2,
				'city'     => $request->city,
				'postcode' => $request->postcode,
				'province' => $request->province,
				'country'  => $request->country,
			]);
			$order->address_id = $address->id;
		}

		$order->save();

		return response()->json($order);
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

		return view('pages.checkout.customer-info', ['order' => $order]);
	}


	public function postCheckout()
	{
		return redirect()->route('checkout.complete');
	}


	public function process($id, Request $request)
	{
		$order = Order::findOrFail($id);
		$amount = str_replace('.', '', $order->total);
		$address_string = $order->address->address1 . ' ' . $order->address->address2 . ' | ' . $order->address->city . ', ' . $order->address->province . ' ' . $order->address->postcode;

		$charge_attempt =	$order->user->charge($amount, [
			'source' => $request->stripe_token,
			'description' => 'Order: ' . $order->id,
			'receipt_email' => $order->user->email,
			'metadata' => [
				'name' => $order->user->name,
				'email' => $order->user->email,
				'jacket' => $order->jacket->model
			],
			'shipping' => [
				'address' => [
					'line1'       => $order->address->address1,
					'line2'       => $order->address->address2,
					'city'        => $order->address->city,
					'state'       => $order->address->province,
					'postal_code' => $order->address->postcode,
					'country'     => $order->address->country,
				],
				'name' => $order->user->name
			]
		]);

		if ($charge_attempt) {
			$order->payment_id = $charge_attempt->id;
			$order->status     = 'placed';
			$order->save();

		  Mail::send('emails.order-confirmation', ['order' => $order], function ($message) use ($order) {
        $message->to($order->user->email, $order->user->name);
        $message->from('contact@sapayol.com');
        $message->subject('Thanks for ordering a custom ' . $order->jacket->name );
      });
      Session::flash('success', "Checkout complete!");
			return redirect()->route('orders.complete', $order->id);
		}	else {
			dd($charge_attempt);
		}
	}


	public function complete($id) {
		$order = Order::findOrFail($id);
		return view('pages.checkout.complete', ['order' => $order]);
	}

}
