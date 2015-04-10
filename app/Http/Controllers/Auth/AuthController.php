<?php namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\Registrar;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Input;

class AuthController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Registration & Login Controller
	|--------------------------------------------------------------------------
	|
	| This controller handles the registration of new users, as well as the
	| authentication of existing users. By default, this controller uses
	| a simple trait to add these behaviors. Why don't you explore it?
	|
	*/

	use AuthenticatesAndRegistersUsers;

	/**
	 * Create a new authentication controller instance.
	 *
	 * @param  \Illuminate\Contracts\Auth\Guard  $auth
	 * @param  \Illuminate\Contracts\Auth\Registrar  $registrar
	 * @return void
	 */
	public function __construct(Guard $auth, Registrar $registrar)
	{
		$this->auth = $auth;
		$this->registrar = $registrar;

		$this->middleware('guest', ['except' => 'getLogout']);
	}

	public function postLogin(Request $request)
	{
		$this->validate($request, [
			'email' => 'required|email', 'password' => 'required',
		]);

		$email = Input::get('email');
		$password = Input::get('password');

		if(Auth::attempt(['email' => $email, 'password' => $password, 'user_type_id' => 1, 'status' => 1]))		
		{
			return redirect('/dashboard');
		}
		elseif(Auth::attempt(['email' => $email, 'password' => $password, 'user_type_id' => 2, 'status' => 1]))		
		{
			return redirect('/dashboard');
		}
		elseif(Auth::attempt(['email' => $email, 'password' => $password, 'user_type_id' => 3, 'status' => 1]))		
		{
			return redirect('/');
		}

		return redirect($this->loginPath())
					->withInput($request->only('email', 'remember'))
					->withErrors([
						'email' => $this->getErrorLoginMessage(),
					]);
	}

	protected function getErrorLoginMessage()
	{
		return 'These credentials do not match our records.';
	}

}