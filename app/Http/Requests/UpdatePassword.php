<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class UpdatePassword extends Request {

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
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'current_password' => 'required',
			'password' => 'required|confirmed|min:6|alpha_num',
			'password_confirmation' => 'required|alpha_num'
		];
	}

}
