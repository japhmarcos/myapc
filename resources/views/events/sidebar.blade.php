@if(!Auth::guest())
	<h4>Announcements</h4>
	<div>      
		@foreach($announcements as $announcement)
			<div onclick="location.href='/announcements/details/{{$announcement->id}}';">
				<h6><a href="/announcements/details/{{$announcement->id}}">{{$announcement->title}}</a></h6>
				<p>                                                        
					By: {{$announcement->author}} | {{ date("F d, Y", strtotime($announcement->created_at)) }}
				</p> 
				<hr />
			</div>
		@endforeach       
	</div>
@endif

<h4>News</h4>
<div>      
	@foreach($news as $new)
		<div onclick="location.href='/news/details/{{$new->id}}';">
			<h6><a href="/news/details/{{$new->id}}">{{$new->title}}</a></h6>
			<p>                                                        
				By: {{$new->author}} | {{ date("F d, Y", strtotime($new->created_at)) }}
			</p> 
			<hr />
		</div>
	@endforeach       
</div>