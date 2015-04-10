<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Webpatser\Uuid\Uuid;

use Request;
use App\Post as News;
use App\Comment as Comment;
use App\User as User;
use Redirect;
use Auth;

class NewsController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$news = News::where('status', '=', '1')->where('module_id', '=', '1')->orderBy('created_at', 'desc')->paginate(3);
		return view('news.index', compact('news'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('news.create');		
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Request::all();
		
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$article = News::find($id);
		$comments = Comment::where('post_id', $id)->orderBy('created_at', 'asc')->get();
		$count = Comment::where('post_id', $id)->count();
		return view('news.details', compact('article', 'comments', 'count'));
	}

	public function newscomment($id)
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
