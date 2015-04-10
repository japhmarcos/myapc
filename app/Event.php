<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model {

	protected $table = 'events';
	
	protected $fillable = ['id', 'title', 'body', 'date_start', 'date_end', 'time_start', 'time_end', 'read_more', 'image', 'rating', 
	'location', 'status', 'notes', 'user_id'];

	public function Author()
	{
		return $this->belongsTo('App\User', 'user_id', 'id');
	}

	public function Comments()
    {
        return $this->hasMany('App\Comment', 'event_id', 'id');
    }

    public function Attendee()
    {
        return $this->hasMany('App\Attendee', 'event_id', 'id');
    }
}
