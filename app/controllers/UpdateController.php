<?php
use Carbon\Carbon;
class UpdateController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function updateDel()
	{
		return View::make('update.updatedel');	
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function updateDelPost()
	{
		$validation = Validator::make(Input::all(),
			array('name' => 'required',
					'usr_img' => 'required|mimes:jpeg,jpg,bmp,png',
					'header_img' => 'required|mimes:jpeg,jpg,bmp,png',
					'des' => 'required',
					'org' => 'required',
					'location' => 'required',
					'gender' => 'required',
					'dob' => 'required'
					));
		if($validation->fails())
		{
			dd("error");
			return Redirect::back()->withInput()
									->withErrors($validation->messages());
		}
		$listpost = DB::table('posts')->orderByRaw("RAND()")->take(9)->get();
		$postrand = DB::table('posts')->orderByRaw("RAND()")->take(1)->first();
		$postdis = DB::table('posts')->orderby('created_at')->get();
		$trend = DB::table('posts')->orderby('count','desc')->take(10)->get();
		//$userid = Session::get('userid');
		$userid = Auth::id();
		$email = Input::get('email');
		$name = Input::get('name');
		$org = Input::get('org');
		$location = Input::get('location');
		$gender = Input::get('gender');
		$dob = Input::get('dob');
		$des = Input::get('des');
		$fb_link = Input::get('fb_link');
		$tw_link = Input::get('tw_link');
		$web_link = Input::get('web_link');
		$usr_img = Input::file('usr_img');
		$header_img = Input::file('header_img');
	
				$new = time();
				$destinationPath = 'uploads/';
				$fileName = $new.'.jpg';
				$file = Input::file('usr_img')->move($destinationPath,$fileName);
		
				$new1 = time();
				$destinationPath1 = 'headerimg/';
				$fileName1 = $new1.'.jpg';
				$file1 = Input::file('header_img')->move($destinationPath1,$fileName1);
	
		$user = DB::table('users')
						->where('id',$userid)
						->update(array('name' => $name,
										'usr_img' => $fileName,
										'header_img' => $fileName1,
										'orgnisation' => $org,
										'location' => $location,
										'gender' => $gender,
										'dob' => $dob,
										'bio' => $des,
										'fb_link' => $fb_link,
										'tw_link' => $tw_link,
										'web_link' => $web_link));
		if($user)
		{
			return View::make('/userinfo')->with('listpost',$listpost)
									->with('postrand',$postrand)
									->with('postdis',$postdis)
									->with('trend',$trend)
									->with('global','update successfully');
		}
		else
		{
			return Redirect::back();
		}
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function updatePass()
	{
		return View::make('update.updatepass');	
	}
	public function updatePassPost()
	{
		$listpost = DB::table('posts')->orderByRaw("RAND()")->take(9)->get();
		$postrand = DB::table('posts')->orderByRaw("RAND()")->take(1)->first();
		$postdis = DB::table('posts')->orderby('created_at')->get();
		$trend = DB::table('posts')->orderby('count','desc')->take(10)->get();
		// $validation = Validator::make(Input::all(),
		// 	array('currentpass' => 'required',
		// 			'password' => 'required',
		// 			'passwordagain' => 'required',
		// 			));
		// if($validation->fails())
		// {
			
		// 	return Redirect::back()->withInput()
		// 							->withErrors($validation->messages());
		// }
		$old_password = Input::get('currentpass');
		$password = Input::get('password');
		$userid = Auth::id();
		$user = DB::table('users')
								->where('id',$userid)
								->update(array(
									'password' => Hash::make($password)));
		if($user)
		{
			return View::make('userinfo')->with('listpost',$listpost)
									->with('postrand',$postrand)
									->with('postdis',$postdis)
									->with('trend',$trend);
			
		}
		else
		{
			return Redirect::route('update.setting');
		}
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function deleteAcc()
	{
		//Session::put('global','your account is deleted');
		$userid=Session::get('userid');
		$user = DB::table('users')->where('id',$userid)->delete();
		return View::make('home')->with('global','your account is deleted');	
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function viewImage()
	{
		return View::make('update.viewimg');
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function setting()
	{
		$post = DB::table('posts')->orderByRaw("RAND()")->take(9)->get();
		$id = Auth::id();
		$user = DB::table('users')->where('id',$id)->first();
		return View::make('update.setting')->with('post',$post)->with('user',$user);
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function testEdit()
	{
		$test = Input::get('summernote');
		echo $test;
		$time = Carbon::now();
		echo Carbon::now()->subDays(24)->diffForHumans();   
	}

	public function search()
	{
		$title = Input::get('q');
		//dd($title);
	    $searchTerms = explode(' ', $title);

	    $query = DB::table('posts');

	    foreach($searchTerms as $term)
	    {
	        $query->where('title', 'LIKE', '%'. $term .'%');
	    }

	    $results = $query->get();

	  	$listpost = DB::table('posts')->orderByRaw("RAND()")->take(9)->get();
	  	$postdis = DB::table('posts')->orderby('created_at')->take(6)->get();
	  	if(Auth::check())
	  	{
	    return View::make('search.usersearchDel')->with('details',$results)
	    									->with('listpost',$listpost)
	    									->with('postdis',$postdis);
	    }
	    else
	    {
	    	return View::make('search.searchDel')->with('details',$results)
	    									->with('listpost',$listpost)
	    									->with('postdis',$postdis);
	    }
	}

	public function test()
	{
		return 'test';
	}

	public function searchKey($data = 0)
	{
		$title = $data;
		//dd($title);

		$searchTerms = explode(' ', $title);
		//dd($searchTerms);
		$query = DB::table('posts');

		foreach($searchTerms as $term)
	    {
	        $query->where('title', 'LIKE', '%'. $term .'%');
	    }

	    $results = $query->get();
	    $listpost = DB::table('posts')->orderByRaw("RAND()")->take(9)->get();
	    $postdis = DB::table('posts')->orderby('created_at')->take(6)->get();

	    //dd($results);
	   return View::make('search.searchDel')->with('details',$results)
	   										->with('listpost',$listpost)
	   										->with('postdis',$postdis);
	}

}
