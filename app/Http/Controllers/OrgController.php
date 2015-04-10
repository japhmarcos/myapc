<?php namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;

use App\Post as Org;
use App\Registration as Registration;
use Webpatser\Uuid\Uuid;
use Auth;
use Redirect;
use Laracasts\Flash\Flash;
use Illuminate\Http\Request;

class OrgController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$orgs = Org::where('module_id', '=', '3')->orderBy('title', 'asc')->paginate(3);
		return view('org.index', compact('orgs'));
	}

	public function org()
	{
		$org = Org::where('user_id', Auth::user()->id)->where('module_id', '=', '3')->first();
		return view('org.article', compact('org'));
	}

	public function approved()
	{
		$org = Org::where('user_id', Auth::user()->id)->where('module_id', '=', '3')->pluck('id');
		$approved = Registration::where('post_id', $org)->where('status', '=', '1')->paginate(4);
		return view('org.approved', compact('approved'));
	}

	public function applicants()
	{
		$org = Org::where('user_id', Auth::user()->id)->where('module_id', '=', '3')->pluck('id');
		$applicants = Registration::where('post_id', $org)->where('status', '=', '0')->orWhere('status', '=', '2')->paginate(4);
		return view('org.applicants', compact('applicants'));
	}

	public function approve()
	{
		$id = Input::get('id');
		$status = Input::get('status');
		$approve = Registration::where('id', $id)->first();
		$approve->status = $status;
		$approve->update();

		Flash::message('Applicant updated!');
		return redirect('/org/applicants');
	}

	public function appdel()
	{
		$id = Input::get('id');
		Registration::find($id)->delete();
		Flash::message('Applicant deleted!');
		return redirect('/org/applicants');
	}

	public function reject()
	{
		$id = Input::get('id');
		$status = Input::get('status');
		$approve = Registration::where('id', $id)->first();
		$approve->status = $status;
		$approve->update();

		Flash::message('Member updated!');
		return redirect('/org/approved');
	}

	public function memdel()
	{
		$id = Input::get('id');
		Registration::find($id)->delete();
		Flash::message('Member deleted!');
		return redirect('/org/approved');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$org = Org::find($id);
		if(!Auth::guest())
		{
			$registration = Registration::where('user_id', Auth::user()->id)->where('post_id', $id)->pluck('user_id');
		}
		return view('org.details', compact('org', 'registration'));		
	}

	public function register()
	{
		$register['id'] = Uuid::generate();
		$register['status'] = '0';
		$register['user_id'] = Auth::user()->id;
		$register['post_id'] = Input::get('post_id');

		Registration::create($register);
		Flash::message('Application submitted!');
        return Redirect::back();				
	}	

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
