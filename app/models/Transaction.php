
<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class Transaction extends Eloquent implements UserInterface, RemindableInterface {

	protected $fillable = ['usr_id','business_id','amount'];
	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'transactions';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	

}
