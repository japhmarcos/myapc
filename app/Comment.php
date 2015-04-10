<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model {

	protected $table = 'comments';
	
	protected $fillable = ['id', 'title', 'body', 'rating', 'event_id', 'post_id', 'user_id'];

	public function Commenter()
	{
		return $this->belongsTo('App\User', 'user_id', 'id');
	}

	public function Post()
    {
        return $this->belongsTo('App\Post', 'post_id', 'id');
    }

    public function Event()
    {
        return $this->belongsTo('App\Event', 'event_id', 'id');
    }

}
