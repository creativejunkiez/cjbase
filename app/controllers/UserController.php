<?php

class UserController extends BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /user
	 *
	 * @return Response
	 */
	public function userDetail()
	{
		$userdel = DB::table('users')->get();
		return View::make('userdetail')->with('userdel', $userdel);
	}

	
	public function userDashbo($name = null)
	{
		//dd($name);
		$username = $name;
		
		$userdel = DB::table('users')->where('name',$username)->first();
		$usrid = $userdel->id;
		$post = DB::table('posts')->where('usr_id',$usrid)->get();
		if(Auth::check())
		{
			return View::make('posts.userdashboard')->with('postdel',$post)->with('userdel',$userdel);
		}
		else
		{
			return View::make('posts.usersdashboard')->with('postdel',$post)->with('userdel',$userdel);	
		}

	}

	/**
	 * Store a newly created resource in storage.
	 * POST /user
	 *
	 * @return Response
	 */
	public function userActivity($name = null)
	{
		$username = $name;
		$userdel = DB::table('users')->where('name',$username)->first();
		$usrid = $userdel->id;
		$postlike = DB::table('postlinks')->where('usr_id',$usrid)->get();
		if(Auth::check())
		{
			return View::make('posts.useractivity')->with('postlike',$postlike)
												->with('userdel',$userdel);
		}
		else
		{
			return View::make('posts.usersactivity')->with('postlike',$postlike)
												->with('userdel',$userdel);	
		}
	}

	/**
	 * Display the specified resource.
	 * GET /user/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function activity()
	{
		$usrid = Auth::id();
		$userdel = DB::table('users')->where('id',$usrid)->first();
		$postlike = DB::table('postlinks')->where('usr_id',$usrid)->get();
		return View::make('posts.activity')->with('postlike',$postlike)
												->with('userdel',$userdel);

	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /user/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /user/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /user/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}