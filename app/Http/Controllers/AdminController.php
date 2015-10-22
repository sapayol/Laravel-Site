<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mailers\OrderMailer;
use JavaScript;
use Address, Jacket, Measurement, Attribute, Order, User;

class AdminController extends Controller {

	public function dashboard()
	{
		$orders = Order::all()->take(5);

		return view('pages.admin.dashboard', ['orders' => $orders]);
	}

	public function orderIndex(Request $request)
	{
		if ($request->status) {
			$orders = Order::where('status', '=', $request->status)->orderBy('id', 'DESC')->paginate(50);
		} else {
			$orders = Order::orderBy('id', 'DESC')->paginate(50);
		}

		return view('pages.admin.order-index', ['orders' => $orders, 'status' => $request->status]);
	}

	public function showOrder($id)
	{
		$order = Order::findOrFail($id);

		JavaScript::put([
			'order'                => $order,
			'user'                 => $order->user,
			'address'              => $order->address,
			'jacket'               => $order->jacket,
			'body_measurements'    => $order->bodyMeasurements->measurementsOnly(),
			'product_measurements' => $order->productMeasurements->measurementsOnly(),
			'look'            => [
				'leather_type'   => $order->leather_type(),
				'leather_color'  => $order->leather_color(),
				'lining_color'   => $order->lining_color(),
				'hardware_color' => $order->hardware_color(),
			],
			'look_options'    => [
				'leather_types'   => $order->jacket->leather_types(),
				'leather_colors'  => $order->jacket->leather_colors(),
				'lining_colors'   => $order->jacket->lining_colors(),
				'hardware_colors' => $order->jacket->hardware_colors(),
			]
		]);

		return view('pages.admin.show-order', ['order' => $order]);
	}

	public function updateLook($id, Request $request)
	{
 		$order = Order::find($id);

    $order->attributes()->sync([
      $request->leather_type,
      $request->leather_color,
      $request->lining_color,
      $request->hardware_color,
    ]);

		return response()->json($order);
	}


	public function updateFit($id, Request $request)
	{
		$response =[];
 		$order = Order::find($id);
		foreach ($order->bodyMeasurements->measurement_names as $name) {
			$response[] = $name;
 			if ($request->type == 'body') {
			  $order->bodyMeasurements->$name = $request->$name;
		    $order->bodyMeasurements->save();
 			} elseif ($request->type == 'product') {
			  $order->productMeasurements->$name = $request->$name;
		    $order->productMeasurements->save();
 			}
 		}
		return response()->json($order->measurements);
		// return response()->json($response);
	}

	public function tailor($id, Request $request, OrderMailer $mailer)
	{
		$order = $request->input();
 		$order = Order::find($id);
 		$mailer->sendTailorMessage($order, $request->note, $request->inclusions);
 		// return view('emails.tailor-message', ['order' => $order, 'note' => $request->note, 'inclusions' => $request->inclusions]);
		return response()->json($order);
	}

}
