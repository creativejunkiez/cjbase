<?php

class FeedsController extends BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /feeds
	 *
	 * @return Response
	 */
	public function feeds($feed = 0)
	{
		switch ($feed) {
			case '1':
				$postids = DB::table('postlinks')->where('lol',1)->select('post_id')->distinct()->get();
				$postdis = DB::table('posts')->orderByRaw("RAND()")->take(9)->get();
				if(Auth::check())
				{
					return View::make('feeds.userfeed')->with('postids',$postids)->with('feed','LOL')->with('postdis',$postdis);
				}
				else
				{
					return View::make('feeds.feed')->with('postids',$postids)->with('feed','LOL')->with('postdis',$postdis);	
				}
				break;
			case '2':
				$postids = DB::table('postlinks')->where('win',2)->select('post_id')->distinct()->get();
				$postdis = DB::table('posts')->orderByRaw("RAND()")->take(9)->get();
				if(Auth::check())
				{
					return View::make('feeds.userfeed')->with('postids',$postids)->with('feed','WIN')->with('postdis',$postdis);
				}
				else
				{
					return View::make('feeds.feed')->with('postids',$postids)->with('feed','WIN')->with('postdis',$postdis);	
				}
				break;
			case '3':
				$postids = DB::table('postlinks')->where('omg',3)->select('post_id')->distinct()->get();
				$postdis = DB::table('posts')->orderByRaw("RAND()")->take(9)->get();
				if(Auth::check())
				{
					return View::make('feeds.userfeed')->with('postids',$postids)->with('feed','OMG')->with('postdis',$postdis);
				}
				else
				{
					return View::make('feeds.feed')->with('postids',$postids)->with('feed','OMG')->with('postdis',$postdis);	
				}
				break;
			case '4':
				$postids = DB::table('postlinks')->where('cute',4)->select('post_id')->distinct()->get();
				$postdis = DB::table('posts')->orderByRaw("RAND()")->take(9)->get();
				if(Auth::check())
				{
					return View::make('feeds.userfeed')->with('postids',$postids)->with('feed','CUTE')->with('postdis',$postdis);
				}
				else
				{
					return View::make('feeds.feed')->with('postids',$postids)->with('feed','CUTE')->with('postdis',$postdis);	
				}
				break;
			case '5':
				$postids = DB::table('postlinks')->where('trashy',5)->select('post_id')->distinct()->get();
				$postdis = DB::table('posts')->orderByRaw("RAND()")->take(9)->get();
				if(Auth::check())
				{
					return View::make('feeds.userfeed')->with('postids',$postids)->with('feed','TRASHY')->with('postdis',$postdis);
				}
				else
				{
					return View::make('feeds.feed')->with('postids',$postids)->with('feed','TRASHY')->with('postdis',$postdis);	
				}
				break;
			case '6':
				$postids = DB::table('postlinks')->where('fail',6)->select('post_id')->distinct()->get();
				$postdis = DB::table('posts')->orderByRaw("RAND()")->take(9)->get();
				if(Auth::check())
				{
					return View::make('feeds.userfeed')->with('postids',$postids)->with('feed','FAIL')->with('postdis',$postdis);
				}
				else
				{
					return View::make('feeds.feed')->with('postids',$postids)->with('feed','FAIL')->with('postdis',$postdis);	
				}
				break;
			case '7':
				$postids = DB::table('postlinks')->where('wtf',7)->select('post_id')->distinct()->get();
				$postdis = DB::table('posts')->orderByRaw("RAND()")->take(9)->get();
				if(Auth::check())
				{
					return View::make('feeds.userfeed')->with('postids',$postids)->with('feed','WTF')->with('postdis',$postdis);
				}
				else
				{
					return View::make('feeds.feed')->with('postids',$postids)->with('feed','WTF')->with('postdis',$postdis);	
				}
				break;
			case '8':
				$postids = DB::table('postlinks')->where('trend',8)->select('post_id')->distinct()->get();
				$postdis = DB::table('posts')->orderByRaw("RAND()")->take(9)->get();
				if(Auth::check())
				{
					return View::make('feeds.userfeed')->with('postids',$postids)->with('feed','TREND')->with('postdis',$postdis);
				}
				else
				{
					return View::make('feeds.feed')->with('postids',$postids)->with('feed','TREND')->with('postdis',$postdis);	
				}
				break;
			default:
				# code...
				break;
		}

	}

	/**
	 * Show the form for creating a new resource.
	 * GET /feeds/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /feeds
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /feeds/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /feeds/{id}/edit
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
	 * PUT /feeds/{id}
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
	 * DELETE /feeds/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}