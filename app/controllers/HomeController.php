<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function home()
	{
		$listpost = DB::table('posts')->orderByRaw("RAND()")->take(9)->get();
		$postrand = DB::table('posts')->orderByRaw("RAND()")->take(1)->first();
		$postdis = DB::table('posts')->orderby('created_at')->get();
		$trend = DB::table('posts')->orderby('count','desc')->take(10)->get();
		//$banner = DB::table('settings')->where('option','banner1')->first();
		
		//$userdel = DB::table('users')->where('id',$userid)->first();
		return View::make('index')->with('listpost',$listpost)
									->with('postrand',$postrand)
									->with('postdis',$postdis)
									->with('trend',$trend);
		//return View::make('index5');
	}

}
