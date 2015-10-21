<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
			$orders = Order::where('status', '=', $request->status)->paginate(50);
		} else {
			$orders = Order::paginate(50);
		}

		return view('pages.admin.order-index', ['orders' => $orders, 'status' => $request->status]);
	}

	public function showOrder($id)
	{
		$order = Order::findOrFail($id);

		JavaScript::put([
			'order'             => $order,
			'user'              => $order->user,
			'address'           => $order->address,
			'jacket'            => $order->jacket,
			'user_measurements' => $order->userMeasurements->measurementsOnly(),
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
 		$order = Order::find($id);
 		if ($request->type == 'user') {
		  $order->userMeasurements->height        = $request->height;
	    $order->userMeasurements->half_shoulder = $request->half_shoulder;
	    $order->userMeasurements->back_width    = $request->back_width;
	    $order->userMeasurements->chest         = $request->chest;
	    $order->userMeasurements->stomach       = $request->stomach;
	    $order->userMeasurements->back_length   = $request->back_length;
	    $order->userMeasurements->waist         = $request->waist;
	    $order->userMeasurements->arm           = $request->arm;
	    $order->userMeasurements->biceps        = $request->biceps;
	    $order->userMeasurements->note          = $request->note;
	    $order->userMeasurements->save();

			return response()->json($order->userMeasurements);
 		} else {
			return response()->json($order->userMeasurements);
 		}

	}

}
