<?php
class AccountController extends BaseController
{
	public function getCreate()
	{
		return View::make('account.create');
	}


	public function postCreate()
	{
		
		$validation = Validator::make(Input::all(),
			array('email' => 'required|email',
					'name' => 'required|unique:users',
					'password' => 'required'
					));
		if($validation->fails())
		{
		//dd(Input::all());
		return Redirect::back()->withInput()
									->withErrors($validation->messages());
		}
		
		//dd(Input::get('email'));
		$email = Input::get('email');
		$username = Input::get('name');
		$password = Input::get('password');
		/*$img = Input::file('img');
		

				$new = Hash::make(time());
				$destinationPath = 'uploads/';
				$fileName = $new.'.jpg';
				$file = Input::file('img')->move($destinationPath,$fileName);
*/
		$user = User::create(array(
			'email' => $email,
			'name' => $username,
			'password' => Hash::make($password)
			//'usr_img' => $fileName
			));
		if($user)
		{
			return Redirect::route('home')
			->with('global','created successfully');
		}
		else
		{
			return View::make('account.create')
				->with('global','some error in creating an account');
		}
}

	public function fbGetCreate()
	{
		return View::make('account.fbcreate');
	}
	
	public function getSignIn()
	{
		return View::make('account.signin');
	}
	public function postSignIn()
	{
		$listpost = DB::table('posts')->orderByRaw("RAND()")->take(9)->get();
		$postrand = DB::table('posts')->orderByRaw("RAND()")->take(1)->first();
		$postdis = DB::table('posts')->orderby('created_at')->get();
		$trend = DB::table('posts')->orderby('count','desc')->take(10)->get();
		$credentials = array(
				'email' => Input::get('email'),
				'password' => Input::get('password'));
		$validation = Validator::make(Input::all(),User::$ruleslog);
		if($validation->fails())
		{
			//dd('errror');
			return Redirect::back()->withInput()
									->withErrors($validation->messages());
		}
		$user = Auth::attempt($credentials);
		if($user)
		{
			
			return View::make('userinfo')->with('listpost',$listpost)
									->with('postrand',$postrand)
									->with('postdis',$postdis)
									->with('trend',$trend);
			//return 'successfully loged in';
		}
		else
		{

			return View::make('account.signin')->with('global',"Email and password wrong");
			//return 'some error';
		}
		$user = Sentry::authenticate($credentials, false);

		$admin = Sentry::findGroupByName('admin');

      if(!$user->inGroup($admin))
      {
        return Redirect::route('home')->with('success', 'Login Successful');
      }
      else
      {
        return Redirect::route('adminDashboard')->with('success', 'Login Successful');
      }
		//return View::make('home');

	}
	public function userPage()
	{
		$listpost = DB::table('posts')->orderByRaw("RAND()")->take(9)->get();
		$postrand = DB::table('posts')->orderByRaw("RAND()")->take(1)->first();
		$postdis = DB::table('posts')->orderby('created_at')->get();
		$trend = DB::table('posts')->orderby('count','desc')->take(10)->get();
		return View::make('userinfo')->with('listpost',$listpost)
									->with('postrand',$postrand)
									->with('postdis',$postdis)
									->with('trend',$trend);
	}
	public function accountPost()
	{
		return View::make('account.posts');
	}


	public function logout()
	{
		Auth::logout();
		return Redirect::to('/');
	}


} 