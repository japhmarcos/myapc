<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model {

	protected $table = 'posts';
	
	protected $fillable = ['id', 'title', 'body', 'author', 'image1', 'image2', 'image3', 'read_more', 'budget', 'directions', 'menu',
	'rating', 'status', 'notes', 'module_id', 'user_id'];

	public function Comments()
    {
        return $this->hasMany('App\Comment', 'post_id', 'id');
    }

    public function Org()
	{
		return $this->belongsTo('App\User', 'user_id', 'id');
	}

	public function Writer()
	{
		return $this->belongsTo('App\User', 'user_id', 'id');
	}
}