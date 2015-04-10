<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Registration extends Model {

	protected $table = 'registrations';
	
	protected $fillable = ['id', 'status', 'user_id', 'post_id'];

	public function Member()
	{
		return $this->belongsTo('App\User', 'user_id', 'id');
	}

    public function Applications()
    {
        return $this->belongsTo('App\Post', 'post_id', 'id');
    }

}
