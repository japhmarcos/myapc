<?php namespace App\Services;

use App\User;
use Validator;
use Illuminate\Contracts\Auth\Registrar as RegistrarContract;

class Registrar implements RegistrarContract {

	/**
	 * Get a validator for an incoming registration request.
	 *
	 * @param  array  $data
	 * @return \Illuminate\Contracts\Validation\Validator
	 */
	public function validator(array $data)
	{
		return Validator::make($data, [
			'last_name' => 'required|max:255',
			'first_name' => 'required|max:255',
			'mi' => 'required|max:255',
			'course' => 'required|max:255',
			'contact' => 'required|max:255',
			'image' => 'required',
			'email' => 'required|email|max:255|unique:users',
			'password' => 'required|confirmed|min:6|alpha_num',
		]);
	}

	/**
	 * Create a new user instance after a valid registration.
	 *
	 * @param  array  $data
	 * @return User
	 */
	public function create(array $data)
	{
		return User::create([
			'id' => $data['id'],
			'last_name' => $data['last_name'],
			'first_name' => $data['first_name'],
			'mi' => $data['mi'],
			'course' => $data['course'],
			'contact' => $data['contact'],
			'image' => $data['image'],
			'status' => $data['status'],
			'user_type_id' => $data['user_type_id'],
			'email' => $data['email'],
			'password' => bcrypt($data['password']),
		]);
	}

}
