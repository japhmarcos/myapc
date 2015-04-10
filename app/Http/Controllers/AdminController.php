<?php namespace App\Http\Controllers;

use App\Http\Requests\CreateNews;
use App\Http\Requests\CreateAnnouncement;
use App\Http\Requests\CreateEvent;
use App\Http\Requests\CreateOrg;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

use App\User as User;
use App\Post as Post;
use App\Event as Event;
use App\Comment as Comment;
use App\Registration as Registration;
use App\Attendee as Attendee;
use Laracasts\Flash\Flash;
use Webpatser\Uuid\Uuid;
use Auth;
use Html;
use Redirect;

class AdminController extends Controller {
	
	public function index()
	{		
		if(Auth::user()->user_type_id == '1')
		{
			$count = User::where('status', '=', '1')->where('user_type_id', '!=', '1')->count();
			$countp = User::where('status', '=', '0')->count();
			$countn = Post::where('module_id', '=', '1')->where(function($query){
					$query->where('status', '=', '0');
					$query->orWhere('status', '=', '2');
					$query->orWhere('status', '=', '3');
				})->count();
			$counte = Event::where('status', '=', '0')->orWhere('status', '=', '2')->orWhere('status', '=', '3')->count();

			$news = Post::where('module_id', '=', '1')->where('status', '=', '1')->orderBy('created_at', 'desc')->take(3)->get();
			$events = Event::where('status', '=', '1')->orderBy('created_at', 'desc')->take(3)->get();
			$users = User::where('status', '=', '1')->where('user_type_id', '!=', '1')->take(6)->get();
		}
		else
		{
			$org = Post::where('user_id', Auth::user()->id)->where('module_id', '=', '3')->pluck('id');
			$count = Registration::where('status', '=', '1')->where('post_id', $org)->count();
			$countp = Registration::where('status', '=', '0')->where('post_id', $org)->count();
			$countn = Post::where('module_id', '=', '1')->where('user_id', Auth::user()->id)->where(function($query){
					$query->where('status', '=', '0');
					$query->orWhere('status', '=', '2');
					$query->orWhere('status', '=', '3');
				})->count();
			$counte = Event::where('user_id', Auth::user()->id)->where('status', '=', '0')->orWhere('status', '=', '2')->orWhere('status', '=', '3')->count();

			$news = Post::where('module_id', '=', '1')->where('user_id', Auth::user()->id)->where('status', '=', '1')->take(3)->get();
			$events = Event::where('user_id', Auth::user()->id)->where('status', '=', '1')->where('date_start', '>', date("Y-m-d"))->orderBy('date_start', 'desc')->take(3)->get();
			$users = Registration::where('status', '=', '0')->where('post_id', $org)->take(6)->get();
		}
		return view('admin.index', compact('count', 'countp', 'countn', 'counte', 'news', 'events', 'users'));
	}

	public function search()
	{
		$keyword = Input::get('keyword');
		if(Auth::user()->user_type_id == '1')
		{
			$posts = Post::where('title', 'LIKE', '%'.$keyword.'%')->orWhere('body', 'LIKE', '%'.$keyword.'%')->orWhere('author', 'LIKE', '%'.$keyword.'%')->orderBy('created_at', 'desc')->get();
			$events = Event::where('title', 'LIKE', '%'.$keyword.'%')->orWhere('body', 'LIKE', '%'.$keyword.'%')->orderBy('created_at', 'desc')->get();
		}
		else
		{
			$posts = Post::where('user_id', Auth::user()->id)->where(function($query) use ($keyword){
					$query->where('title', 'LIKE', '%'.$keyword.'%');
					$query->orWhere('body', 'LIKE', '%'.$keyword.'%');
					$query->orWhere('author', 'LIKE', '%'.$keyword.'%');
				})->orderBy('created_at', 'desc')->get();
			$events = Event::where('user_id', Auth::user()->id)->where(function($query) use ($keyword){
					$query->where('title', 'LIKE', '%'.$keyword.'%');
					$query->orWhere('body', 'LIKE', '%'.$keyword.'%');
				})->orderBy('created_at', 'desc')->get();
		}
		
		return view('admin.search', compact('posts', 'events', 'keyword'));
	}

	// news
	public function newspos()
	{
		$nposted;
		if(Auth::user()->user_type_id == '1')
		{
			$nposted = Post::where('status', '=', '1')->where('module_id', '=', '1')->orderBy('created_at', 'desc')->paginate(3);
		}
		else
		{
			$nposted = Post::where('status', '=', '1')->where('module_id', '=', '1')->where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->paginate(3);	
		}
		return view('news.posted', compact('nposted'));
	}

	public function newspen()
	{
		$npending;
		if(Auth::user()->user_type_id == '1')
		{
			$npending = Post::where('module_id', '=', '1')->where(function($query){
					$query->where('status', '=', '0');
					$query->orWhere('status', '=', '2');
					$query->orWhere('status', '=', '3');
				})->orderBy('created_at', 'desc')->get();
		}
		else
		{
			$npending = Post::where('module_id', '=', '1')->where(function($query){
					$query->where('status', '=', '0');
					$query->orWhere('status', '=', '2');
					$query->orWhere('status', '=', '3');
				})->where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->get();	
		}
		return view('news.pending', compact('npending'));		
	}

	public function newsarticle($id)
	{
		$article = Post::find($id);
		$comments = Comment::where('post_id', $id)->orderBy('created_at', 'asc')->get();
		$count = Comment::where('post_id', $id)->count();
		return view('news.article', compact('article', 'comments', 'count'));		
	}

	public function newscreate()
	{
		return view('news.create');		
	}

	public function newsstore(CreateNews $request)
	{
		if(Input::file('image1') != null)
		{
			$image1 = Input::file('image1');
			$filename1 = $image1->getClientOriginalName();
			Input::file('image1')->move(public_path().'/images/news/', $filename1);
		}		

		$body = Input::get('body');
		$body = HTML::entities($body);
		$read_more = HTML::decode($body);
		$remove_tags = strip_tags($read_more);



		$news = $request->all();
		$news['id'] = Uuid::generate();
		if(Input::file('image1') != null)
		{
			$news['image1'] = $filename1;
		}
		$news['body'] = $body;
		$news['read_more'] = (strlen($remove_tags>140)) ? subtr($remove_tags, 0, 140) : $remove_tags;
        $news['module_id'] = '1';
        $news['user_id'] = Auth::user()->id;

		if(Auth::user()->user_type_id == '1')
		{
			$news['status'] = '1';
		}
		else
		{
			$news['status'] = '0';
		}

		Post::create($news);

		Flash::message('News created!');
        return redirect('/news/create');
	}

	public function newsupdate($id)
	{
		$update = Post::find($id);
		return view('news.update', compact('update'));		
	}

	public function newspost(CreateNews $request, $id)
	{
		if(Input::file('image1') != null)
		{
			$image1 = Input::file('image1');
			$filename1 = $image1->getClientOriginalName();
			Input::file('image1')->move(public_path().'/images/news/', $filename1);
		}	
		else
		{
			$filename1 = Post::where('id', $id)->pluck('image1');
		}	

		$body = Input::get('body');
		$body = HTML::entities($body);
		$notes = Input::get('notes');

		$news = $request->all();
		$news['image1'] = $filename1;
		$news['body'] = $body;
		$news['read_more'] = (strlen($body>140)) ? subtr($body, 0, 140) : $body;

		$article = Post::find($id)->update($news);

		Flash::message('News updated!');
        return Redirect::back();
	}

	public function newspendel()
	{
		$id = Input::get('id');
		Post::find($id)->delete();
		Flash::message('News deleted!');
		return redirect('/news/pending');		
	}

	public function newspostdel()
	{
		$id = Input::get('id');
		Comment::where('post_id', $id)->delete();
		Post::find($id)->delete();
		Flash::message('News deleted!');
		return redirect('/news/posted');		
	}

	public function newscomdel()
	{
		$id = Input::get('id');
		Comment::find($id)->delete();
		return Redirect::back();        
	}


	// events
	public function eventpos()
	{
		$eposted;
		if(Auth::user()->user_type_id == '1')
		{
			$eposted = Event::where('status', '=', '1')->orderBy('created_at', 'desc')->paginate(3);
		}
		else
		{
			$eposted = Event::where('status', '=', '1')->orderBy('created_at', 'desc')->where('user_id', Auth::user()->id)->paginate(3);	
		}
		return view('events.posted', compact('eposted'));
	}

	public function eventpen()
	{
		$epending;
		if(Auth::user()->user_type_id == '1')
		{
			$epending = Event::where('status', '=', '0')->orderBy('created_at', 'desc')->get();
		}
		else
		{
			$epending = Event::where('status', '=', '0')->orderBy('created_at', 'desc')->where('user_id', Auth::user()->id)->get();	
		}
		return view('events.pending', compact('epending'));	
	}

	public function eventarticle($id)
	{
		$article = Event::find($id);
		$comments = Comment::where('event_id', $id)->orderBy('created_at', 'asc')->get();
		$count = Comment::where('event_id', $id)->count();
		return view('events.article', compact('article', 'comments', 'count'));		
	}

	public function attendees($id)
	{
		$attendees = Attendee::where('event_id', $id)->paginate(4);
		return view('events.attendees', compact('attendees', 'id'));		
	}

	public function eventcreate()
	{
		return view('events.create');		
	}

	public function eventstore(CreateEvent $request)
	{
		if(Input::file('image') != null)
		{
			$image = Input::file('image');
			$filename = $image->getClientOriginalName();
			Input::file('image')->move(public_path().'/images/events/', $filename);
		}		

		$body = Input::get('body');
		$body = HTML::entities($body);
		$read_more = HTML::decode($body);
		$remove_tags = strip_tags($read_more);

		$events = $request->all();
		$events['id'] = Uuid::generate();
		if(Input::file('image') != null)
		{
			$events['image'] = $filename;
		}
		$events['body'] = $body;
		$events['read_more'] = (strlen($remove_tags>140)) ? subtr($remove_tags, 0, 140) : $remove_tags;
        $events['user_id'] = Auth::user()->id;

		if(Auth::user()->user_type_id == '1')
		{
			$events['status'] = '1';
		}
		else
		{
			$events['status'] = '0';
		}

		Event::create($events);

		Flash::message('Event created!');
        return redirect('/events/create');
	}

	public function eventupdate($id)
	{
		$update = Event::find($id);
		return view('events.update', compact('update'));		
	}

	public function eventpost(CreateEvent $request, $id)
	{
		if(Input::file('image') != null)
		{
			$image = Input::file('image');
			$filename = $image->getClientOriginalName();
			Input::file('image')->move(public_path().'/images/events/', $filename);
		}	
		else
		{
			$filename = Event::where('id', $id)->pluck('image');
		}	

		$body = Input::get('body');
		$body = HTML::entities($body);

		$event = $request->all();
		$event['image'] = $filename;
		$event['body'] = $body;
		$event['read_more'] = (strlen($body>140)) ? subtr($body, 0, 140) : $body;

		$article = Event::find($id)->update($event);

		Flash::message('Event updated!');
        return Redirect::back();
	}

	public function eventpendel()
	{
		$id = Input::get('id');
		Event::find($id)->delete();
		Flash::message('Event deleted!');
		return redirect('/events/pending');		
	}

	public function eventpostdel()
	{
		$id = Input::get('id');
		Attendee::where('event_id', $id)->delete();
		Comment::where('event_id', $id)->delete();
		Event::find($id)->delete();
		Flash::message('Event deleted!');
		return redirect('/events/posted');		
	}

	public function eventcomdel()
	{
		$id = Input::get('id');
		Comment::find($id)->delete();
		return Redirect::back();        
	}


	// announcements
	public function alist()
	{
		$announcements = Post::where('module_id', '=', '2')->orderBy('created_at', 'desc')->paginate(3);
		return view('announcements.list', compact('announcements'));
	}

	public function aarticle($id)
	{
		$article = Post::find($id);		
		$comments = Comment::where('post_id', $id)->orderBy('created_at', 'asc')->get();
		$count = Comment::where('post_id', $id)->count();
		return view('announcements.article', compact('article', 'comments', 'count'));		
	}

	public function acreate()
	{
		return view('announcements.create');		
	}

	public function astore(CreateAnnouncement $request)
	{
		if(Input::file('image1') != null)
		{
			$image1 = Input::file('image1');
			$filename1 = $image1->getClientOriginalName();
			Input::file('image1')->move(public_path().'/images/announcements/', $filename1);
		}		

		$body = Input::get('body');
		$read_more = HTML::decode($body);
		$remove_tags = strip_tags($read_more);

		$announcement = $request->all();
		$announcement['id'] = Uuid::generate();
		if(Input::file('image1') != null)
		{
			$announcement['image1'] = $filename1;
		}
		$announcement['body'] = HTML::entities($body);
        $announcement['module_id'] = '2';
		$announcement['read_more'] = (strlen($remove_tags >140)) ? subtr($remove_tags , 0, 140) : $remove_tags ;
        $announcement['user_id'] = Auth::user()->id;
		$announcement['status'] = '1';
		

		Post::create($announcement);

		Flash::message('Announcement created!');
        return redirect('/announcements/create');
	}

	public function aupdate($id)
	{
		$update = Post::find($id);
		return view('announcements.update', compact('update'));		
	}

	public function apost(CreateAnnouncement $request, $id)
	{
		if(Input::file('image1') != null)
		{
			$image1 = Input::file('image1');
			$filename1 = $image1->getClientOriginalName();
			Input::file('image1')->move(public_path().'/images/announcements/', $filename1);
		}	
		else
		{
			$filename1 = Post::where('id', $id)->pluck('image1');
		}	

		$body = Input::get('body');
		$body = HTML::entities($body);

		$announcement = $request->all();
		$announcement['image1'] = $filename1;
		$announcement['body'] = $body;
		$announcement['read_more'] = (strlen($body>140)) ? subtr($body, 0, 140) : $body;

		$article = Post::find($id)->update($announcement);

		Flash::message('Announcement updated!');
        return Redirect::back();
	}

	public function adel()
	{
		$id = Input::get('id');
		Comment::where('post_id', $id)->delete();
		Post::find($id)->delete();
		Flash::message('Announcement deleted!');
		return redirect('/announcements/list');		
	}

	public function acomdel()
	{
		$id = Input::get('id');
		Comment::find($id)->delete();
		return Redirect::back();        
	}


	// org
	public function orglist()
	{
		$orgs = Post::where('module_id', '=', '3')->orderBy('created_at', 'desc')->paginate(3);
		return view('org.list', compact('orgs'));
	}

	public function orgarticle($id)
	{		
		$org = Post::find($id);		
		return view('org.article', compact('org'));		
	}

	public function orgcreate()
	{
		$orgs = User::where('user_type_id', '=', '2')->lists('last_name', 'id');
		return view('org.create', compact('orgs'));		
	}

	public function orgstore(CreateOrg $request)
	{
		if(Input::file('image1') != null)
		{
			$image1 = Input::file('image1');
			$filename1 = $image1->getClientOriginalName();
			Input::file('image1')->move(public_path().'/images/org/', $filename1);
		}		

		$body = Input::get('body');
		$body = HTML::entities($body);
		$read_more = HTML::decode($body);
		$remove_tags = strip_tags($read_more);


		$org = $request->all();
		$org['id'] = Uuid::generate();
		if(Input::file('image1') != null)
		{
			$org['image1'] = $filename1;
		}
		$org['body'] = $body;
		$org['read_more'] = (strlen($remove_tags>140)) ? subtr($remove_tags, 0, 140) : $remove_tags;
        $org['module_id'] = '3';
		$org['status'] = '1';

		Post::create($org);

		Flash::message('Organization created!');
        return redirect('/org/create');
	}

	public function orgupdate($id)
	{
		$update = Post::find($id);
		$orgs = User::where('user_type_id', '=', '2')->lists('last_name', 'id');
		return view('org.update', compact('update', 'orgs'));		
	}

	public function orgpost(CreateOrg $request, $id)
	{
		if(Input::file('image1') != null)
		{
			$image1 = Input::file('image1');
			$filename1 = $image1->getClientOriginalName();
			Input::file('image1')->move(public_path().'/images/org/', $filename1);
		}	
		else
		{
			$filename1 = Post::where('id', $id)->pluck('image1');
		}	

		$body = Input::get('body');
		$body = HTML::entities($body);

		$org = $request->all();
		$org['image1'] = $filename1;
		$org['body'] = $body;
		$org['read_more'] = (strlen($body>140)) ? subtr($body, 0, 140) : $body;

		$article = Post::find($id)->update($org);

		Flash::message('Organization updated!');
        return Redirect::back();
	}

	public function orgdel()
	{
		$id = Input::get('id');
		Registration::where('post_id', $id)->delete();
		Post::find($id)->delete();
		Flash::message('Organization deleted!');
		return redirect('/org/list');		
	}

	


	// user
	public function current()
	{
		$current = User::where('status', '=', '1')->where('user_type_id', '!=', '1')->orderBy('created_at', 'desc')->paginate(4);
		return view('admin.current', compact('current'));
	}

	public function user()
	{
		return view('admin.user');
	}

	public function pending()
	{
		$pending = User::where('status', '=', '0')->paginate(4);
		return view('admin.pending', compact('pending'));		
	}	

	public function approve()
	{
		$id = Input::get('id');
		$approve = User::where('id', $id)->first();
		$approve->status = '1';
		$approve->user_type_id = Input::get('user_type_id');
		$approve->update();

		Flash::message('User registered!');
		return redirect('/users/pending');
	}

	public function pendel()
	{
		$id = Input::get('id');
		User::where('id', $id)->delete();
		Flash::message('User deleted!');
		return redirect('/users/pending');
	}

	public function userdel()
	{
		$id = Input::get('id');
		User::where('id', $id)->delete();
		Comment::where('user_id', $id)->delete();
		Post::where('user_id', $id)->delete();
		Registration::where('user_id', $id)->delete();
		Event::where('user_id', $id)->delete();
		Attendee::where('user_id', $id)->delete();
		Flash::message('User deleted!');
		return redirect('/users');
	}

}
