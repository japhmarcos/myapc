<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Auth;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['id', 'last_name', 'first_name', 'mi', 'course', 'contact', 'image', 'email', 'password', 'status', 'user_type_id'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];

	public function Comment()
	{
		return $this->hasMany('Comment', 'user_id', 'id');
	}

	public function Event()
	{
		return $this->hasMany('Event', 'user_id', 'id');
	}

	public function Post()
	{
		return $this->hasMany('Post', 'user_id', 'id');
	}

	public function Registration()
	{
		return $this->hasMany('Registration', 'user_id', 'id');
	}

	public function Attendee()
	{
		return $this->hasMany('Attendee', 'user_id', 'id');
	}

	public function isAdmin()
	{
		if (Auth::user()->user_type_id == '1')
		{
			return true;
		}
	}

	public function isCreator()
	{
		if (Auth::user()->user_type_id == '1' || Auth::user()->user_type_id == '2')
		{
			return true;
		}
	}

	public function getRememberToken()
	 {
	  return null; // not supported
	}

	public function setRememberToken($value)
	{
	  // not supported
	}

	public function getRememberTokenName()
	{
	  return null; // not supported
	}

	/**
	 * Overrides the method to ignore the remember token.
	 */
	public function setAttribute($key, $value)
	{
	  $isRememberTokenAttribute = $key == $this->getRememberTokenName();
	  if (!$isRememberTokenAttribute)
	  {
	    parent::setAttribute($key, $value);
	  }
	}

}
