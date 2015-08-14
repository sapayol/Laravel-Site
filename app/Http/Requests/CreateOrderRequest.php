<?php

namespace App\Http\Requests;

class CreateOrderRequest extends Request {


	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'user_id'  => 'required',
			'model'    => 'required'
			// 'password' => 'required',
		];
	}

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Specify where to redirect the user if they are
	 * not anauthorized to make this request
	 *
	 * @return \Illuminate\Http\RedirectResponse
	 */
	public function forbiddenResponse()
	{
		return $this->redirector->to('/forbidden');
	}

}
