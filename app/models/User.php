<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	/*public static $rules=array('email' => 'required|unique:users|email',
					'name' => 'required|unique:users|alpha_dash|min:4',
					'password' => 'required|alpha_num|between:4,8',
					'password_again' => 'required|alpha_num|between:4,8');*/

	public static $ruleslog = array('email' => 'required|email',
									'password' => 'required');

	
	protected $fillable = ['name','password','email','dob','gender','usr_img','header_img','bio','orgnisation','fb_link','tw_link','weblink'];
	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

}
