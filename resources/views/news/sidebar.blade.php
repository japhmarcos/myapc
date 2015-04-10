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

<h4>Upcoming Events</h4>
<div>                                        
    @foreach($events as $event)
		<div onclick="location.href='/events/details/{{$event->id}}';">
			<h6><a href="/events/details/{{$event->id}}">{{$event->title}}</a></h6>
			<p>                
				{{$event->author->first_name}} | Date: {{ date("F d, Y", strtotime($event->date_start)) }}
			</p> 
			<hr />
		</div>
	@endforeach           
</div>