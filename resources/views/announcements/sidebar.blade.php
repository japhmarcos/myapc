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