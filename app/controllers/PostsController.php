<?php

class PostsController extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function mainPost()
	{
		return Redirect::back();
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function addPosts()
	{
		return View::make('posts.addpost');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function viewPosts()
	{
		$userid = Auth::id();
		$usertable = DB::table('users')->where('id',$userid)->first();
		$postdis = DB::table('posts')->where('usr_id',$userid)->orderby('created_at')->get();
		return View::make('posts.viewpost')->with('userdel',$usertable)
											->with('postdis',$postdis);
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function addingPosts()
	{
		// $validation = Validator::make(Input::all(),
		// 	array('title' => 'required',
		// 			'headline' => 'required',
		// 			'des' => 'required',
		// 			'thumbnail_img' => 'required',
		// 			'credits' => 'required',
		// 			'catg' => 'required',
		// 			'url' => 'required',
		// 			));
		// if($validation->fails())
		// {
		// 	return Redirect::back()->withInput()
		// 							->withErrors($validation->messages());
		// }
		$validation = Validator::make(array('thumbnail_img' => Input::file('thumbnail_img')),
								array('thumbnail_img' => 'required|mimes:jpeg,jpg,bmp,png'));
		if($validation->fails())
		{
			$error_msg = $validator->messages();
			return Redirect::back()->with('global',$error_msg);
		}
		else
		{
			$userId = Auth::id();
			$title = Input::get('title');
			$url = Input::get('url');
			$credits = Input::get('credits');
			$des = Input::get('des');
			$headline = Input::get('headline');
			$news = (int) Input::get('catg');
			$thumbnail = Input::file('thumbnail_img');

					$new = str_random(32);
					$destinationPath = 'thumbnails/';
					$fileName = $new.'.jpg';
					$img = Image::make(file_get_contents(Input::file('thumbnail_img')));
					$img->save(public_path().'/thumbnails/'.$fileName);
					
			$posts = Post::create(array(
				'usr_id' => $userId,
				'title' => $title,
				'news' => $news,
				'url' => $url,
				'credits' => $credits,
				'description' =>$des,
				'headline' => $headline,
				'thumbnail' => $fileName
				));

			if($posts)
			{
				$postcheck = DB::table('posts')->where('title',$title)->first();
					$postid=$postcheck->id;
				$postlike = Postlink::create(array(
							'usr_id' => $userId,
							'post_id' => $postid,));
				return Redirect::back()->with('global','post successfully added');
			}
			else
			{
				return Redirect::route('user-home');
			}
		}
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function viewAllPost()
	{
		return View::make('posts.viewallpost');
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function dashboard()
	{
		$count = 0;
		$usrid = Auth::id();
		$userdel = DB::table('users')->where('id',$usrid)->first();
		$post = DB::table('posts')->where('usr_id',$usrid)->get();
		foreach ($post as $postcount)
		{
			$count = $count + 1;
		}
		return View::make('posts.dashboard')->with('postdel',$post)->with('userdel',$userdel)
											->with('count',$count);
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function deletePost($postid = 1)
	{

	// dd('hi')	;
		$post = DB::table('posts')->where('id',$postid)->delete();
		$postlike = DB::table('postlinks')->where('post_id',$postid)->delete();
		//return View::make('posts.viewpost')->with('global','your post is deleted');
		return Redirect::back();		
		

	}
	public function editPost($postid = 1)
	{
		
		return View::make('posts.editpost')->with('postid',$postid);
	}

	public function editPostForm($postid = 1)
	{
		$validation = Validator::make(Input::all(),
			array('title' => 'required',
					'headline' => 'required',
					'des' => 'required',
					'thumbnail_img' => 'required|mimes:jpeg,jpg,bmp,png',
					));
		if($validation->fails())
		{
			return Redirect::back()->withInput()
									->withErrors($validation->messages());
		}
		$title = Input::get('title');
		$headline = Input::get('headline');
		$des = Input::get('des');
		$credits = Input::get('credits');
		$url = Input::get('url');
		$thumbnail = Input::file('thumbnail_img');
		

				$new = time();
				$destinationPath = 'thumbnails/';
				$fileName = $new.'.jpg';
				$file = Input::file('thumbnail_img')->move($destinationPath,$fileName);


		$post = DB::table('posts')
						->where('id',$postid)
						->update(array('title' => $title,
										'headline' => $headline,
										'description' => $des,
										'credits' => $credits,
										'url' => $url,
										'thumbnail' => $fileName));
		if($post)
		{
			$userid = Auth::id();
		$usertable = DB::table('users')->where('id',$userid)->first();
		$postdis = DB::table('posts')->where('usr_id',$userid)->orderby('created_at')->get();
		
			return View::make('posts.viewpost')->with('userdel',$usertable)
												->with('postdis',$postdis)
												->with('global','post updated successfully');
		}
		else
		{
			return Redirect::route('update.updatedel');
		}
	}
	public function postCatg($postcat = 0)
	{
		$postall = DB::table('posts')->where('news',$postcat)->orderByRaw("RAND()")->take(10)->get();
		$postrand = DB::table('posts')->where('news',$postcat)->orderByRaw("RAND()")->take(1)->first();

		$post = DB::table('posts')->where('news', $postcat)->get();
		if(Auth::check())
		{
		return View::make('posts.postcat')->with('postcatg',$post)
											->with('postrand',$postrand)
											->with('userpost',$postall);
		}
		else
		{
		return View::make('posts.userpostcat')->with('postcatg',$post)
											->with('postrand',$postrand)
											->with('userpost',$postall);
		
		}
	}

	public function postLike($like = 0,$postid = 0)
	{
		$likes = $like;
		$postsid = $postid;
		$userid = Session::get('userid');
		//dd($postsid);
		$count = 0;
		switch ($likes) 
		{
			case '1':
					$check = DB::table('postlinks')->where('post_id',$postsid)->where('usr_id',$userid)->first();
										
						
					if($check)
					{	
						$lol=$check->lol;
						if($lol == NULL)
						{
							$postlike = DB::table('postlinks')
											->where('post_id',$postsid)
											->update(array('lol' => $likes));

							return 'u have liked this post lol';
						}
						else
						{
							return 'u have already like this post as lol';
						}
					}
					else
					{
						$postlike = Postlink::create(array(
													'post_id' => $postsid,
													'usr_id' => $userid,
													'lol' => 1));
						return 'u have liked this post lol';

					}
				break;
			case '2':
					$check = DB::table('postlinks')->where('post_id',$postsid)->where('usr_id',$userid)->first();
					
					if($check)
					{	
						$win=$check->win;
						if($win == NULL)
						{
							$postlike = DB::table('postlinks')
											->where('post_id',$postsid)
											->update(array('win' => $likes));
							return 'u liked this post as win';
						}
						else
						{
							return 'u have already like this post as win';
						}
					}
					else
					{
						$postlike = Postlink::create(array(
													'post_id' => $postsid,
													'usr_id' => $userid,
													'win' => 2));
						return 'u liked this post as win';

					}
				break;
				case '3':
					$check = DB::table('postlinks')->where('post_id',$postsid)->where('usr_id',$userid)->first();
					if($check)
					{									
						$omg=$check->omg;
						if($omg == NULL)
						{
							$postlike = DB::table('postlinks')
											->where('post_id',$postsid)
											->update(array('omg' => $likes));
							return 'u liked this post as omg';
						}
						else
						{
							return 'u have already like this post as omg';
						}
					}
					else
					{
						$postlike = Postlink::create(array(
													'post_id' => $postsid,
													'usr_id' => $userid,
													'omg' => 3));
						return 'u liked this post as omg';

					}
				break;
				case '4':
					$check = DB::table('postlinks')->where('post_id',$postsid)->where('usr_id',$userid)->first();
					if($check)
					{								
						$cute=$check->cute;
						if($cute == NULL)
						{
							$postlike = DB::table('postlinks')
											->where('post_id',$postsid)
											->update(array('cute' => $likes));
							return 'u liked this post as cute';
						}
						else
						{
							return 'u have already like this post as cute';
						}
					}
					else
					{
						$postlike = Postlink::create(array(
													'post_id' => $postsid,
													'usr_id' => $userid,
													'cute' => 4));
						return 'u liked this post as cute';

					}
				break;
				case '5':
					$check = DB::table('postlinks')->where('post_id',$postsid)->where('usr_id',$userid)->first();
					if($check)
					{								
						$trashy=$check->trashy;
						if($trashy == NULL)
						{
							$postlike = DB::table('postlinks')
											->where('post_id',$postsid)
											->update(array('trashy' => $likes));
							return 'u liked this post as trashy';
						}
						else
						{
							return 'u have already like this post as trashy';
						}
					}
					else
					{
						$postlike = Postlink::create(array(
													'post_id' => $postsid,
													'usr_id' => $userid,
													'trashy' => 5));
						return 'u liked this post as trashy';

					}
				break;
				case '6':
					$check = DB::table('postlinks')->where('post_id',$postsid)->where('usr_id',$userid)->first();
					if($check)
					{										
						$fail=$check->fail;
						if($fail == NULL)
						{
							$postlike = DB::table('postlinks')
											->where('post_id',$postsid)
											->update(array('fail' => $likes));
							return 'u liked this post as fail';
						}
						else
						{
							return 'u have already like this post as fail';
						}
					}
					else
					{
						$postlike = Postlink::create(array(
													'post_id' => $postsid,
													'usr_id' => $userid,
													'fail' => 6));
						return 'u liked this post as fail';

					}
				break;
				case '7':
					$check = DB::table('postlinks')->where('post_id',$postsid)->where('usr_id',$userid)->first();
					if($check)
					{					
						$wtf=$check->wtf;
						if($wtf == NULL)
						{
							$postlike = DB::table('postlinks')
											->where('post_id',$postsid)
											->update(array('wtf' => $likes));
							return 'u liked this post as wtf';
						}
						else
						{
							return 'u have already like this post as wtf';
						}
					}
					else
					{
						$postlike = Postlink::create(array(
													'post_id' => $postsid,
													'usr_id' => $userid,
													'wtf' => 7));
						return 'u liked this post as wtf';

					}
				break;
				case '8':
					$check = DB::table('postlinks')->where('post_id',$postsid)->where('usr_id',$userid)->first();
					if($check)
					{					
						$trend=$check->trend;
						if($trend == NULL)
						{
							$postlike = DB::table('postlinks')
											->where('post_id',$postsid)
											->update(array('trend' => $likes));
							return 'u liked this post as trend';
						}
						else
						{
							return 'u have already like this post as trend';
						}
					}
					else
					{
						$postlike = Postlink::create(array(
													'post_id' => $postsid,
													'usr_id' => $userid,
													'trend' => 8));
						return 'u liked this post as trend';

					}
				break;
		}
		//return Redirect::back();
	}
	public function postLikeCount($like = 0,$postid = 0)
	{
		$likes = $like;
		$postsid = $postid;
		//$userid = Session::get('userid');
		$userid = Auth::id();
		//dd($postsid);
		//dd($userid);
		$count = 0;
		switch ($likes) 
		{
			case '1':
					$check = DB::table('postlinks')->where('post_id',$postsid)->where('usr_id',$userid)->first();
										
						
					if($check)
					{	
						$lol=$check->lol;
						if($lol == NULL)
						{
							$postlike = DB::table('postlinks')
											->where('post_id',$postsid)
											->where('usr_id',$userid)
											->update(array('lol' => $likes));

							$likecount = DB::table('postlinks')
												->where('post_id',$postsid)
												->where('lol',$likes)->count();
							$msg1 = 'You have liked this post lol';
							return Response::json(array('msg' => $msg1, 'feedcount' => $likecount));
							
						}
						else
						{
							$likecount = DB::table('postlinks')
												->where('post_id',$postsid)
												->where('lol',$likes)->count();
							$msg1 = 'You have already like this post as lol';
							return Response::json(array('msg' => $msg1, 'feedcount' => $likecount));
						}
					}
					else
					{
						$postlike = Postlink::create(array(
													'post_id' => $postsid,
													'usr_id' => $userid,
													'lol' => 1));
						$likecount = DB::table('postlinks')
												->where('post_id',$postsid)
												->where('lol',$likes)->count();
						$msg1 = 'You have liked this post lol';
						return Response::json(array('msg' => $msg1, 'feedcount' => $likecount));
							
					}
				break;
			case '2':
					$check = DB::table('postlinks')->where('post_id',$postsid)->where('usr_id',$userid)->first();
					
					if($check)
					{	
						$win=$check->win;
						if($win == NULL)
						{
							$postlike = DB::table('postlinks')
											->where('post_id',$postsid)
											->where('usr_id',$userid)
											->update(array('win' => $likes));
							$likecount = DB::table('postlinks')
												->where('post_id',$postsid)
												->where('win',$likes)->count();
							
							$msg1 = 'You have liked this post win';
							return Response::json(array('msg' => $msg1, 'feedcount' => $likecount));

							
						}
						else
						{
							$likecount = DB::table('postlinks')
												->where('post_id',$postsid)
												->where('win',$likes)->count();
							
							$msg1 = 'You have already like this post as win';
							return Response::json(array('msg' => $msg1, 'feedcount' => $likecount));
						
						}
					}
					else
					{
						$postlike = Postlink::create(array(
													'post_id' => $postsid,
													'usr_id' => $userid,
													'win' => 2));
						$likecount = DB::table('postlinks')
												->where('post_id',$postsid)
												->where('win',$likes)->count();
							
						$msg1 = 'You have liked this post win';
						return Response::json(array('msg' => $msg1, 'feedcount' => $likecount));

					}
				break;
				case '3':
					$check = DB::table('postlinks')->where('post_id',$postsid)->where('usr_id',$userid)->first();
					if($check)
					{									
						$omg=$check->omg;
						if($omg == NULL)
						{
							$postlike = DB::table('postlinks')
											->where('post_id',$postsid)
											->where('usr_id',$userid)
											->update(array('omg' => $likes));
							$likecount = DB::table('postlinks')
												->where('post_id',$postsid)
												->where('omg',$likes)->count();
							
							$msg1 = 'You have liked this post omg';
							return Response::json(array('msg' => $msg1, 'feedcount' => $likecount));
					}
						else
						{
							$likecount = DB::table('postlinks')
												->where('post_id',$postsid)
												->where('omg',$likes)->count();
							
							$msg1 = 'You have already like this post as omg';
							return Response::json(array('msg' => $msg1, 'feedcount' => $likecount));
						
						}
					}
					else
					{
						$postlike = Postlink::create(array(
													'post_id' => $postsid,
													'usr_id' => $userid,
													'omg' => 3));
						$likecount = DB::table('postlinks')
												->where('post_id',$postsid)
												->where('omg',$likes)->count();
							
						$msg1 = 'You have liked this post omg';
						return Response::json(array('msg' => $msg1, 'feedcount' => $likecount));
						

					}
				break;
				case '4':
					$check = DB::table('postlinks')->where('post_id',$postsid)->where('usr_id',$userid)->first();
					if($check)
					{								
						$cute=$check->cute;
						if($cute == NULL)
						{
							$postlike = DB::table('postlinks')
											->where('post_id',$postsid)
											->where('usr_id',$userid)
											->update(array('cute' => $likes));
							$likecount = DB::table('postlinks')
												->where('post_id',$postsid)
												->where('cute',$likes)->count();
							
							$msg1 = 'You have liked this post cute';
							return Response::json(array('msg' => $msg1, 'feedcount' => $likecount));

					
						}
						else
						{
							$likecount = DB::table('postlinks')
												->where('post_id',$postsid)
												->where('cute',$likes)->count();
							
							$msg1 = 'You have already like this post as cute';
							return Response::json(array('msg' => $msg1, 'feedcount' => $likecount));
						
						}
					}
					else
					{
						$postlike = Postlink::create(array(
													'post_id' => $postsid,
													'usr_id' => $userid,
													'cute' => 4));
						$likecount = DB::table('postlinks')
												->where('post_id',$postsid)
												->where('cute',$likes)->count();
							
						$msg1 = 'You have liked this post cute';
						return Response::json(array('msg' => $msg1, 'feedcount' => $likecount));
						
					}
				break;
				case '5':
					$check = DB::table('postlinks')->where('post_id',$postsid)->where('usr_id',$userid)->first();
					if($check)
					{								
						$trashy=$check->trashy;
						if($trashy == NULL)
						{
							$postlike = DB::table('postlinks')
											->where('post_id',$postsid)
											->where('usr_id',$userid)
											->update(array('trashy' => $likes));
							$likecount = DB::table('postlinks')
												->where('post_id',$postsid)
												->where('trashy',$likes)->count();
							$msg1 = 'You have liked this post trashy';
							return Response::json(array('msg' => $msg1, 'feedcount' => $likecount));
					
						}
						else
						{
							$likecount = DB::table('postlinks')
												->where('post_id',$postsid)
												->where('trashy',$likes)->count();
							
							$msg1 = 'You have already like this post as trashy';
							return Response::json(array('msg' => $msg1, 'feedcount' => $likecount));
						
						}
					}
					else
					{
						$postlike = Postlink::create(array(
													'post_id' => $postsid,
													'usr_id' => $userid,
													'trashy' => 5));
						$likecount = DB::table('postlinks')
												->where('post_id',$postsid)
												->where('trashy',$likes)->count();
						
						$msg1 = 'You have liked this post trashy';
						return Response::json(array('msg' => $msg1, 'feedcount' => $likecount));
					}
				break;
				case '6':
					$check = DB::table('postlinks')->where('post_id',$postsid)->where('usr_id',$userid)->first();
				//	dd($check);
					if($check)
					{										
						$fail=$check->fail;
						if($fail == NULL)
						{
							$postlike = DB::table('postlinks')
											->where('post_id',$postsid)
											->where('usr_id',$userid)
											->update(array('fail' => $likes));
							$likecount = DB::table('postlinks')
												->where('post_id',$postsid)
												->where('fail',$likes)->count();
							
							$msg1 = 'You have liked this post fail';
							return Response::json(array('msg' => $msg1, 'feedcount' => $likecount));
					
						}
						else
						{
							$likecount = DB::table('postlinks')
												->where('post_id',$postsid)
												->where('fail',$likes)->count();
							
							$msg1 = 'You have already like this post as fail';
							return Response::json(array('msg' => $msg1, 'feedcount' => $likecount));
						
						}
					}
					else
					{
						$postlike = Postlink::create(array(
													'post_id' => $postsid,
													'usr_id' => $userid,
													'fail' => 6));
							$likecount = DB::table('postlinks')
												->where('post_id',$postsid)
												->where('fail',$likes)->count();
							
						$msg1 = 'You have liked this post fail';
						return Response::json(array('msg' => $msg1, 'feedcount' => $likecount));
					}
				break;
				case '7':
					$check = DB::table('postlinks')->where('post_id',$postsid)->where('usr_id',$userid)->first();
					if($check)
					{					
						$wtf=$check->wtf;
						if($wtf == NULL)
						{
							$postlike = DB::table('postlinks')
											->where('post_id',$postsid)
											->where('usr_id',$userid)
											->update(array('wtf' => $likes));
							$likecount = DB::table('postlinks')
												->where('post_id',$postsid)
												->where('wtf',$likes)->count();
							
						$msg1 = 'You have liked this post wtf';
						return Response::json(array('msg' => $msg1, 'feedcount' => $likecount));
					
						}
						else
						{
							$likecount = DB::table('postlinks')
												->where('post_id',$postsid)
												->where('wtf',$likes)->count();
						
							$msg1 = 'You have already like this post as wtf';
							return Response::json(array('msg' => $msg1, 'feedcount' => $likecount));
						
						}
					}
					else
					{
						$postlike = Postlink::create(array(
													'post_id' => $postsid,
													'usr_id' => $userid,
													'wtf' => 7));
						$likecount = DB::table('postlinks')
												->where('post_id',$postsid)
												->where('wtf',$likes)->count();
							
						$msg1 = 'You have liked this post wtf';
						return Response::json(array('msg' => $msg1, 'feedcount' => $likecount));
					

					}
				break;
				case '8':
					$check = DB::table('postlinks')->where('post_id',$postsid)->where('usr_id',$userid)->first();
					if($check)
					{					
						$trend=$check->trend;
						if($trend == NULL)
						{
							$postlike = DB::table('postlinks')
											->where('post_id',$postsid)
											->where('usr_id',$userid)
											->update(array('trend' => $likes));
							$likecount = DB::table('postlinks')
												->where('post_id',$postsid)
												->where('trend',$likes)->count();
							
						$msg1 = 'You have liked this post trend';
						return Response::json(array('msg' => $msg1, 'feedcount' => $likecount));
					
						}
						else
						{
							$likecount = DB::table('postlinks')
												->where('post_id',$postsid)
												->where('trend',$likes)->count();
							
							$msg1 = 'You have already like this post as trend';
							return Response::json(array('msg' => $msg1, 'feedcount' => $likecount));
						
						}
					}
					else
					{
						$postlike = Postlink::create(array(
													'post_id' => $postsid,
													'usr_id' => $userid,
													'trend' => 8));
						$likecount = DB::table('postlinks')
												->where('post_id',$postsid)
												->where('trend',$likes)->count();
							
						$msg1 = 'You have liked this post trend';
						return Response::json(array('msg' => $msg1, 'feedcount' => $likecount));
					

					}
				break;
		}
	}
	public function postData($postid =0)
	{
		$postsid = $postid;
		$countval = 1;
		//dd($postsid);
		$addlin = DB::table('posts')->where('id',$postsid)->first();
		//$postid = $addlin->id;
		$userid = $addlin->usr_id;
		$tit = $addlin->title;
		$url = $addlin->url;
		$credits = $addlin->credits;
		$des = $addlin->description;
		$headline = $addlin->headline;
		$thumbnail = $addlin->thumbnail;
		$count = $addlin->count;
		if($count == NULL)
		{
			$newcount = DB::table('posts')->where('id', $postsid)->update(array('count' => $countval));
			
		}
		else
		{
			//dd($count);
			$newcount = DB::table('posts')->where('id', $postsid)->update(array('count' => $count + 1));
		}

		$result = DB::table('posts')->where('id', $postsid)->first();
		$userdel = DB::table('users')->where('id',$userid)->first();
		$results = DB::table('posts')->where('usr_id',$userid)->get();
		$postlike = DB::table('postlinks')->where('post_id',$postid)->get();
		$post = DB::table('posts')->orderByRaw("RAND()")->take(9)->get();
		$lolcount = DB::table('postlinks')->where('post_id',$postsid)->where('lol',1)->count();
		$wincount = DB::table('postlinks')->where('post_id',$postsid)->where('win',2)->count();
		$omgcount = DB::table('postlinks')->where('post_id',$postsid)->where('omg',3)->count();
		$cutecount = DB::table('postlinks')->where('post_id',$postsid)->where('cute',4)->count();
		$trashycount = DB::table('postlinks')->where('post_id',$postsid)->where('trashy',5)->count();
		$failcount = DB::table('postlinks')->where('post_id',$postsid)->where('fail',6)->count();
		$wtfcount = DB::table('postlinks')->where('post_id',$postsid)->where('wtf',7)->count();
		$trendcount = DB::table('postlinks')->where('post_id',$postsid)->where('trend',8)->count();
		//dd($results);
		if(Auth::check())
		{
		return View::make('posts.details')->with('data',$result)
											->with('userdel',$userdel)
											->with('userpost',$results)
											->with('listpost',$post)
											->with('lolcount',$lolcount)
											->with('wincount',$wincount)
											->with('omgcount',$omgcount)
											->with('cutecount',$cutecount)
											->with('trashycount',$trashycount)
											->with('failcount',$failcount)
											->with('wtfcount',$wtfcount)
											->with('trendcount',$trendcount)
											->with('postlike',$postlike);
		}
		else
		{
			return View::make('posts.userdetails')->with('data',$result)
											->with('userdel',$userdel)
											->with('userpost',$results)
											->with('listpost',$post)
											->with('lolcount',$lolcount)
											->with('wincount',$wincount)
											->with('omgcount',$omgcount)
											->with('cutecount',$cutecount)
											->with('trashycount',$trashycount)
											->with('failcount',$failcount)
											->with('wtfcount',$wtfcount)
											->with('trendcount',$trendcount)
											->with('postlike',$postlike);
		
		}
	}

	
}
