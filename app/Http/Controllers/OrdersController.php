<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CreateOrderRequest;
use JavaScript, Mail;
use Address, Jacket, Measurement, Attribute, Order, User;

class OrdersController extends Controller {

	public function index(Request $request)
	{
		$this->createNewOrder($request->input());
		$jacket = Jacket::where('model', '=', $request->model)->first();

		return view('04-pages.checkout.customer-info', [
			'jacket'         => $jacket,
			'leather_type'   => $request->leather_type,
			'leather_color'  => $request->leather_color,
			'lining_color'   => $request->lining_color,
			'hardware_color' => $request->hardware_color
		]);
	}

	public function store(CreateOrderRequest $request)
	{
		$jacket         = Jacket::where('model', '=', $request->jacket['model'])->first();
		$leather_type   = Attribute::where('type', '=', 'leather_type')->where('name', '=', $request->jacket['leather_type'])->first();
		$leather_color  = Attribute::where('type', '=', 'leather_color')->where('name', '=', $request->jacket['leather_color'])->first();
		$lining_color   = Attribute::where('type', '=', 'lining_color')->where('name', '=', $request->jacket['lining_color'])->first();
		$hardware_color = Attribute::where('type', '=', 'hardware_color')->where('name', '=', $request->jacket['hardware_color'])->first();

		$measurements = Measurement::create(array(
			'type'          => 'custom',
			'units'         => $request->measurements['units'],
			'shoulder'      => $request->measurements['shoulder'],
			'back'          => $request->measurements['back'],
			'chest'         => $request->measurements['chest'],
			'stomach'       => $request->measurements['stomach'],
			'waist'         => $request->measurements['waist'],
			'sleeve'        => $request->measurements['sleeve'],
			'biceps'        => $request->measurements['biceps'],
			// 'jacket-length' => $request->measurement['jacket-length'],
		));

		$order = Order::create(array(
			'status'         => 'new',
			'jacket_id'      => $jacket->id,
			'measurement_id' => $measurements->id,
			'total'          => $jacket->price // Needs to updated in 2.0 when attributes affect price
		));

		$order->attributes()->attach($leather_type->id);
		$order->attributes()->attach($leather_color->id);
		$order->attributes()->attach($lining_color->id);
		$order->attributes()->attach($hardware_color->id);

		// return view('04-pages.checkout.customer-info', ['order' => $order]);
		return redirect()->route('orders.show', $order->id);
	}


	/**
	 * Return a specific course.
	 *
	 * @param  int|string $id
	 * @return string     JsonResponse with Course object or not-found error
	 */
	public function show($id)
	{
		$order = Order::findOrFail($id);

    JavaScript::put([
			'order'   => $order,
			'user'    => $order->user,
			'address' => $order->address
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
		if ($request->name && $request->email) {
			$user = User::firstOrNew(['email' => trim(strtolower($request->email))]);
			$user->name = $request->name;
			$user->save();
			$order->user_id = $user->id;
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
