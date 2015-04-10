<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendee extends Model {

	protected $table = 'attendees';
	
	protected $fillable = ['id', 'event_id', 'user_id'];

	public function Event()
	{
		return $this->belongsTo('App\Post', 'event_id', 'id');
	}

	public function Attend()
	{
		return $this->belongsTo('App\User', 'user_id', 'id');
	}
}