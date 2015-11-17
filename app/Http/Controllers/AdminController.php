<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mailers\OrderMailer;
use App\Jobs\SendTailorMessage;
use JavaScript;
use Session;
use Address, Jacket, Measurement, Attribute, Order, User;

class AdminController extends Controller {

	private $mailer;

	function __construct(OrderMailer $mailer, Request $request) {
		$this->mailer = $mailer;
	}

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
			'body_measurements'    => $order->bodyMeasurements ? $order->bodyMeasurements->measurementsOnly() : null,
			'product_measurements' => $order->productMeasurements ? $order->productMeasurements->measurementsOnly() : null,
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
		foreach ($order->bodyMeasurements->measurement_names as $name) {
 			if ($request->type == 'body') {
			  $order->bodyMeasurements->$name = $request->$name;
		    $order->bodyMeasurements->save();
 			} elseif ($request->type == 'product') {
			  $order->productMeasurements->$name = $request->$name;
		    $order->productMeasurements->save();
 			}
 		}
		return response()->json($order->measurements);
	}

	public function confirm($order_id, Request $request)
	{
	  $order = Order::find($order_id);
    $this->mailer->sendMeasurementConfirmation($order);
	  Session::flash('success', "Measurement confirmation email sent.");
		return redirect()->back();
	}


	public function tailor($order_id, Request $request)
	{
	  $order = Order::find($order_id);
    $this->mailer->sendTailorMessage($order, $request->note, $request->inclusions);

		return response()->json($order);
	}


}
