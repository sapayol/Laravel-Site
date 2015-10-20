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
			'order'    => $order,
			'jacket'   => $order->jacket,
			'user'     => $order->user,
			'address'  => $order->address,
		]);

		return view('pages.admin.show-order', ['order' => $order]);
	}

	public function editOrder($id)
	{
		$order = Order::findOrFail($id);

		return view('pages.admin.edit-order', ['order' => $order]);
	}

	public function updateOrder($id, Request $request)
	{
		$order = $this->dispatchFrom('App\Jobs\UpdateUsersOrder', $request);

		return redirect()->route('admin.show-order', $order->id);
	}

}
