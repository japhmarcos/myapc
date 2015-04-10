<?php namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use App\Http\Requests\UpdateAccount;
use App\Http\Requests\UpdateEmail;
use App\Http\Requests\UpdatePassword;
use Laracasts\Flash\Flash;

use App\Post as Post;
use App\Event as Event;
use App\User as User;
use App\Registration as Registration;
use Auth;
use Request;
use Redirect;
use Hash;

class HomeController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Home Controller
	|--------------------------------------------------------------------------
	|
	| This controller renders your application's "dashboard" for users that
	| are authenticated. Of course, you are free to change or remove the
	| controller as you wish. It is just here to get your app started!
	|
	*/

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('home.index');
	}

	public function bus()
	{
		return view('home.bus');
	}

	public function directory()
	{
		return view('home.directory');
	}

	public function account()
	{
		$apps = Registration::where('user_id', Auth::user()->id)->get();
		return view('home.account', compact('apps'));
	}

	public function regdel()
	{
		$id = Input::get('id');
		Registration::where('id', $id)->delete();
		Flash::message('Application deleted!');
		return Redirect::back();
	}	

	public function update()
	{
		$pane = '1';
		return view('home.update',compact('pane'));
	}

	public function updateaccount(UpdateAccount $request)
	{
		$pane = '1';
		if(Input::file('image') != null)
		{
			$image = Input::file('image');
			$filename = $image->getClientOriginalName();
			Input::file('image')->move(public_path().'/images/users/', $filename);
		}	
		else
		{
			$filename = User::where('id', Auth::user()->id)->pluck('image');
		}
		$user = $request->all();
		if(Input::file('image') != null)
		{
			$user['image'] = $filename;
		}
		User::find(Auth::user()->id)->update($user);
		Flash::message('Account updated!');
		return redirect('/account/update')->with('pane',$pane);
	}

	public function updatepass(UpdatePassword $request)
	{
		$pane = '2';
		if(Hash::check(Input::get('current_password'), Auth::user()->password))
		{
			$password = Input::get('password');
			$pass['password'] = Hash::make($password);

			User::find(Auth::user()->id)->update($pass);
			Flash::message('Password changed!');
		}
		else
		{
			Flash::error('Current password does not match our records!');
		}
		return Redirect::back()->with('pane',$pane);
	}

	public function updateemail(UpdateEmail $request)
	{
		$pane = '2';
		$email = $request->all();
		User::find(Auth::user()->id)->update($email);
		Flash::message('Email changed!');
		return Redirect::back()->with('pane',$pane);
	}

	public function search()
	{
		$input = Input::get('input');
		if(Auth::guest())
		{
			$posts = Post::where('status', '=', '1')->where('module_id', '!=', '2')->where(function($query) use ($input){
					$query->where('title', 'LIKE', '%'.$input.'%');
					$query->orWhere('body', 'LIKE', '%'.$input.'%');
					$query->orWhere('author', 'LIKE', '%'.$input.'%');
				})->orderBy('created_at', 'desc')->get();
		}
		else
		{
			$posts = Post::where('status', '=', '1')->where(function($query) use ($input){
					$query->where('title', 'LIKE', '%'.$input.'%');
					$query->orWhere('body', 'LIKE', '%'.$input.'%');
					$query->orWhere('author', 'LIKE', '%'.$input.'%');
				})->orderBy('created_at', 'desc')->get();
		}
		
		$events = Event::where('status', '=', '1')->where(function($query) use ($input){
				$query->where('title', 'LIKE', '%'.$input.'%');
				$query->orWhere('body', 'LIKE', '%'.$input.'%');
			})->orderBy('created_at', 'desc')->get();
		
		
		return view('home.search', compact('posts', 'events', 'input'));
	}

}
