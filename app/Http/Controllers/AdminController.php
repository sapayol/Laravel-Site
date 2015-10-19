<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Address, Jacket, Measurement, Attribute, Order, User;

class AdminController extends Controller {

	public function orderIndex()
	{
		$orders = Order::all();

		return view('pages.admin.order-index', ['orders' => $orders]);
	}

	public function showOrder($id)
	{
		$order = Order::findOrFail($id);

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
