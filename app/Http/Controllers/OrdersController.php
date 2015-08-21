<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateOrderRequest;
use JavaScript, Mail, Auth, Session;
use Address, Jacket, Measurement, Attribute, Order, User;

class OrdersController extends Controller {

	public function store(CreateOrderRequest $request)
	{
		$user = Auth::loginUsingId($request->user_id);
		$last_order = $user->unfinishedOrders->last();

		if ($last_order && $last_order->userMeasurements) {
			return view('04-pages.checkout.continue', ['last_order' => $last_order, 'new_order' => $request->input()]);
		}

		$jacket = Jacket::where('model', '=', $request->model)->first();
		$order  = Order::create(array(
			'status'    => 'new',
			'user_id'   => Auth::user()->id,
			'jacket_id' => $jacket->id,
			'total'     => $jacket->price // Needs to updated in 2.0 when attributes affect price
		));

		Session::remove('card');

		foreach ($request->jacket_look as $attribute) {
			$order->attributes()->attach($attribute);
		}

		return redirect()->route('orders.fit', [$order->id, 'units']);
	}

	public function resetOrder($id, CreateOrderRequest $request)
	{
		$order = Order::find($id);
		$order->status = 'dropped';
		$order->save();

		return $this->store($request);
	}

	public function getFit($id, $step)
	{
		$order = Order::find($id);

		return view('04-pages.fit.' . $step, ['order' => $order, 'step' => $step]);
	}

	public function postFit($id, Request $request)
	{
		$order = Order::find($id);

		if (!$order->userMeasurements) {
			Measurement::create(array_merge($request->measurements, ['order_id' => $order->id]));
		} elseif ($request->measurements) {
			$order->userMeasurements->update($request->measurements);
		}

		$order = Order::find($id);
		$order->status = 'started';
		$order->save();

		if (count($incomplete_measurements = $order->userMeasurements->getIncompleteMeasurements()) > 0) {
			$next_step = $incomplete_measurements[0];
			return redirect()->route('orders.fit', ['id' => $order->id, 'step' => $next_step]);
		} else {
			return redirect()->route('orders.checkout', $order->id);
		}
	}

	/**
	 * Return a specific course.
	 *
	 * @param  int|string $id
	 * @return string     JsonResponse with Course object or not-found error
	 */
	public function checkout($id)
	{
		$order = Order::findOrFail($id);

    JavaScript::put([
			'order'   => $order,
			'user'    => $order->user,
			'address' => $order->address,
			'session' => Session::all()
    ]);

		return view('04-pages.checkout.customer-info', ['order' => $order]);
	}

	/**
	 * Return a specific course.
	 *
	 * @param  int|string $id
	 * @return string     JsonResponse with Course object or not-found error
	 */
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
			$order->save();

		  Mail::send('05-emails.receipt', ['order' => $order], function ($message) use ($order) {
        $message->to($order->user->email, $order->user->name);
        $message->from('ediz@sapayol.com');
        $message->subject('Your Receipt!');
      });

			return redirect()->route('orders.complete', $order->id);
		}	else {
			dd($charge_attempt);
		}
	}

	public function complete($id) {
		$order = Order::findOrFail($id);
		return view('04-pages.checkout.complete', ['order' => $order]);
	}



}
