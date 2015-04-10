<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Webpatser\Uuid\Uuid;

use Request;
use App\Post as Post;
use App\Event as Event;
use App\Comment as Comment;
use App\User as User;
use Redirect;
use Auth;
use DateTime;

class AnnouncementsController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	
	public function __construct()
	{
		$this->middleware('auth');
	}
	
	public function index()
	{
		$announcements = Post::where('module_id', '=', '2')->orderBy('created_at', 'desc')->paginate(2);
		$news = Post::where('module_id', '=', '1')->where('status', '=', '1')->orderBy('created_at', 'desc')->take(3)->get();
		$events = Event::where('status', '=', '1')->where('date_start', '>=', new DateTime('today'))->orderBy('date_start', 'asc')->take(3)->get();	
		return view('announcements.index', compact('announcements', 'news', 'events'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('announcements.create');		
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
		$article = Post::find($id);
		$comments = Comment::where('post_id', $id)->orderBy('created_at', 'asc')->get();
		$count = Comment::where('post_id', $id)->count();

		$news = Post::where('module_id', '=', '1')->where('status', '=', '1')->orderBy('created_at', 'desc')->take(3)->get();
		$events = Event::where('status', '=', '1')->where('date_start', '>=', new DateTime('today'))->orderBy('date_start', 'asc')->take(3)->get();
		return view('announcements.details', compact('article', 'comments', 'count', 'news', 'events'));
	}

	public function acomment($id)
	{
		$comment = Request::all();
		$comment['id'] = Uuid::generate();
		$comment['user_id'] = Auth::user()->id;
		$comment['post_id'] = $id;

		Comment::create($comment);

		return Redirect::back();        
	}

	public function commentdel()
	{
		$id = Input::get('id');
		Comment::find($id)->delete();
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
