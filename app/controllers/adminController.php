<?php

class AdminController extends \BaseController {


	public function dashboard()
	{

		$user = Sentry::getUser();
    if(Session::has('admin'))
    {
      $admin = Session::get('admin');
      Session::put('admin',$admin);
      $statistics = array();
      $statistics['users'] = User::count();

      $statistics['posts'] = Post::count();
    //  $statistics['revenue'] = Transaction::sum('amount');
      $recentuser = DB::table('users')->orderby('created_at','desc')->first();
  		return View::make('admin.dashboard')->withUser($user)->withStatistics($statistics)->with('recentuser',$recentuser);
    }
    else
    {
      return View::make('admin.login');
    }

	}
  public function dashboard1()
  {

    $user = Sentry::getUser();
    
      $statistics = array();
      $statistics['users'] = User::count();

      $statistics['posts'] = Post::count();
    //  $statistics['revenue'] = Transaction::sum('amount');
      $recentuser = DB::table('users')->orderby('created_at','desc')->first();
      return View::make('admin.dashboard')->withUser($user)->withStatistics($statistics)->with('recentuser',$recentuser);
    
  }

public function deleteOption()
{
	return "This page is Disabled in demo";
}

	public function install()
	{
		$setting1 = new Setting;
		$setting1->option = "title";
		$setting1->value = Input::get('title');
		$setting1->save();

    $setting2 = new Setting;
    $setting2->option = "keywords";
    $setting2->value = Input::get('keywords');
    $setting2->save();

    $setting3 = new Setting;
    $setting3->option = "footer";
    $setting3->value = Input::get('footer');
    $setting3->save();

    $setting4 = new Setting;
    $setting4->option = "email";
    $setting4->value = Input::get('email');
    $setting4->save();

    $setting5 = new Setting;
    $setting5->option = "banner1";
    $setting5->value = "";
    $setting5->save();

		try
      {
        
        // Create the user
        $user = Admin::create(array(
                                     'email'      => Input::get('email'),
                                     'password'   => Input::get('password'),
                                     'name'   => "admin"
                                     ));

        // Find the group using the group name
        // $userGroup = Sentry::findGroupByName('admin');

        // // Assign the group to the user
        // $user->addGroup($userGroup);

        //Sentry::login($user,false);
        Auth::login($user);

        return Redirect::route('adminDashboard')->with('success','Your site is installed successfully');

      }
      catch (Cartalyst\Sentry\Users\LoginRequiredException $e)
      {
        return Redirect::route('install')->withInput(Input::except('password'))->with('error', 'Login Field is Required');
      }
      catch (Cartalyst\Sentry\Users\PasswordRequiredException $e)
      {
        return Redirect::route('install')->withInput()->with('error', 'Password Field is Required');
      }
      catch (Cartalyst\Sentry\Users\UserExistsException $e)
      {
        return Redirect::route('install')->withInput(Input::except('password'))->with('error', 'User Already Exists');
      }
      catch (Cartalyst\Sentry\Groups\GroupNotFoundException $e)
      {
        return Redirect::route('install')->withInput(Input::except('password'))->with('error', 'Group Not Found');
      }

	}

	public function userManagement(){

		 // $group = Sentry::findGroupByName('users');

     // $users = Sentry::findAllUsersInGroup($group);
      $users = DB::table('users')->get();

      $user = Sentry::getUser();

      return View::make('admin.userManagement')->withUser($user)->with('users',$users);
	}

  public function postManagement()
  {
    $post = DB::table('posts')->get();
    return View::make('admin.postManagement')->with('posts',$post);
  }

  public function userDelete($id)
    {
      try
      {
          // Find the user using the user id
          $user = Sentry::findUserById($id);

          $post = DB::table('posts')->where('usr_id',$id)->delete();
          $postlike = DB::table('postlinks')->where('usr_id',$id)->delete();
          $users = DB::table('users')->where('id',$id)->delete();
          
          return Redirect::route('adminUserManagement')->withSuccess('User is deleted successfully');
      }
      catch (Cartalyst\Sentry\Users\UserNotFoundException $e)
      {
          return Redirect::route('adminUserManagement')->withError('User was not found.');
      }

    }

  public function postDelete($id)
  {
    $post = DB::table('posts')->where('id',$id)->delete();
    $post = DB::table('postlinks')->where('post_id',$id)->delete();
    return Redirect::route('adminPostManagement')->withSuccess('Post is deleted successfully'); 
  }

  public function viewPost($id)
  {
    $posts = DB::table('posts')->where('id',$id)->first();
    return View::make('admin.viewpost')->with('data',$posts);
  }

  public function settings(){
    $user = Sentry::getUser();
    return View::make('admin.settings')->withUser($user);
  }

  public function updateSettings(){
    $setting = Setting::where('option','title')->update(array('value' => Input::get('title')));

    $setting = Setting::where('option','keywords')->update(array('value' => Input::get('keywords')));
    
    $setting = Setting::where('option','footer')->update(array('value' => Input::get('footer')));

    $setting = Setting::where('option','email')->update(array('value' => Input::get('email')));

    return Redirect::route('adminSettings')->withSuccess('You Settings updated successfully');
  }
  public function viewEdit($id){
    $user = Sentry::getUser();
    $edit_log = Edit_log::find($id);

    if($edit_log->status == NULL)
    {
      $business = Business::with('city','state','country','user','category','sub_category')->where('id',$edit_log->business_id)->first();
      $edit_log = json_decode($edit_log->edits);
      return View::make('admin.viewEdit')->withUser($user)->withEdit_log($edit_log)->withBusiness($business)->withId($id);
    }
  }

  public function adsManagement(){
    $user = Sentry::getUser();
    //$transactions = Transaction::with('user','business')->paginate(10);
    return View::make('admin.adsManagement')->withUser($user);
  }

  public function updateAds(){
    $setting = Setting::where('option','banner1')->update(array('value' => Input::get('banner1')));

    $setting = Setting::where('option','featuredAdCost')->update(array('value' => Input::get('featuredAdCost')));

    return Redirect::route('adminAdsManagement')->withSuccess('Ads are updated successfully');
  }

  public function adminLogin()
  {
    return View::make('admin.login');
  }
  public function adminLoginpost()
  {
      $email = Input::get('email');
      $password = Input::get('password');  
      $admin = DB::table('admins')->where('email',$email)->where('password',$password)->first();
      Session::put('admin',$admin);
      if($admin)
      {
        return Redirect::route('adminDashboard')->with('admin',$admin);
      }
      else
      {
        return Redirect::back();
      }
  }
}
