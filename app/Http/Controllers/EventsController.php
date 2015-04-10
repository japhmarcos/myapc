<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Webpatser\Uuid\Uuid;

use Request;
use App\Event as Event;
use App\Comment as Comment;
use App\Attendee as Attendee;
use App\User as User;
use Redirect;
use Auth;
use Laracasts\Flash\Flash;

class EventsController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$events = Event::where('status', '=', '1')->orderBy('created_at', 'desc')->paginate(1);
		return view('events.index', compact('events'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('events.create');		
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
		$article = Event::find($id);
		$comments = Comment::where('event_id', $id)->orderBy('created_at', 'asc')->get();
		$count = Comment::where('event_id', $id)->count();
		if(!Auth::guest())
		{
			$attendee = Attendee::where('user_id', Auth::user()->id)->where('event_id', $id)->pluck('user_id');
		}
		return view('events.details', compact('article', 'comments', 'count', 'attendee'));
	}

	public function eventcomment($id)
	{
		if (Input::get('body') != null) {
			$comment = Request::all();
			$comment['id'] = Uuid::generate();
			$comment['user_id'] = Auth::user()->id;
			$comment['event_id'] = $id;

			Comment::create($comment);
		}

		return Redirect::back();        
	}

	public function commentdel()
	{
		$id = Input::get('id');
		Comment::find($id)->delete();
		return Redirect::back();        
	}

	public function attend()
	{
		if(Input::get('event_id') != null)
		{
			$attend = Request::all();
			$attend['id'] = Uuid::generate();
			$attend['user_id'] = Auth::user()->id;
			$attend['event_id'] = Input::get('event_id');

			Attendee::create($attend);
			Flash::message('You are attending!');
		}
		return Redirect::back();        
	}	

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

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
