<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

	Route::get('/',array(
	'as' => 'home',
	'uses' => 'HomeController@home'
	));


	//create account (post)
		Route::post('/create', array(
		'as' => 'account-create-post',
		'uses' => 'AccountController@postCreate'
	 ));

	Route::get('/search', array(
		'as' => 'search',
		'uses' => 'UpdateController@search'
	 ));;

	Route::get('/searchKey/{data}', array(
		'as' => 'searchKey',
		'uses' => 'UpdateController@searchKey'
	));

	Route::get('/user/{name}', array(
			'as' => 'userDashboard',
			'uses' => 'UserController@userDashbo'
	));

		//sign in (get)
	Route::get('/login', array(
		'as' => 'account-sign-in',
		'uses' => 'AccountController@getSignIn'
	 ))->before('guest');

	Route::post('/login', array(
		'as' => 'account-sign-in-post',
		'uses' => 'AccountController@postSignIn'
	 ))->before('guest');

	Route::get('/userhome', array(
		'as' => 'user-home',
		'uses' => 'AccountController@userPage'
	))->before('auth');

	Route::get('/postdata/{postid}', array(
		'as' => 'postdata',
		'uses' => 'PostsController@postData'
	));

		Route::get('/postLikecount/{like}/{postid}', array(
		'as' => 'postLikecount',
		'uses' => 'PostsController@postLikeCount'
	))->before('auth');

	Route::get('/forgotPassword', array(
		'as' => 'forgotPass',
		'uses' => 'RemindersController@getRemind'
	 ));

	Route::post('/forgotPassword', array(
		'as' => 'forgotPassPost',
		'uses' => 'RemindersController@postRemind'
	 ));

	Route::get('/password/reset/{token}', array(
		'as' => 'passReset',
		'uses' => 'RemindersController@getReset'
	 ));

	Route::post('/password/new', array(
		'as' => 'resetPassNew',
		'uses' => 'RemindersController@postReset'
	 ));

	Route::get('/userdetails', array(
		'as' =>'userdetails',
		'uses' => 'UserController@userDetail'
	));

	Route::get('/logout', array(
		'as' => 'account-logout',
		'uses' => 'AccountController@logout'
	 ));

	Route::get('/post/{like}/{data}', array(
		'as' => 'post-like',
		'uses' => 'PostsController@postLike'
	 ));

	//sign in (post)
	



		Route::get('/account/fbcreate', array(
			'as' => 'account-fbcreate',
			'uses' =>'Facebook@loginFacebook'
		));

		Route::get('/account/google', array(
			'as' => 'account-google',
			'uses' =>'Google@loginGoogle'
		));

		Route::get('/update/updatedel', array(
			'as' => 'update-details',
			'uses' => 'UpdateController@updateDel'
		))->before('auth');

		Route::post('/update/updatedel', array(
			'as' => 'update-details-post',
			'uses' => 'UpdateController@updateDelPost'
		))->before('auth');

		Route::get('/update/updatepass', array(
			'as' => 'update-password',
			'uses' => 'UpdateController@updatePass'
		))->before('auth');
	
		Route::post('/update/updatepass', array(
			'as' => 'update-password-post',
			'uses' => 'UpdateController@updatePassPost'
		));

		Route::get('/delete', array(
			'as' => 'delete-account',
			'uses' => 'UpdateController@deleteAcc'
		))->before('auth');


		Route::get('/update/viewimg', array(
			'as' => 'view-image',
			'uses' => 'UpdateController@viewImage'
		))->before('auth');

		Route::get('/update/setting', array(
			'as' => 'update-setting',
			'uses' => 'UpdateController@setting'
		))->before('auth');

		Route::get('/posts/mainposts', array(
			'as' => 'account-post',
			'uses' => 'PostsController@mainPost'
		));

		Route::get('/posts/postcat/{postval}', array(
			'as' => 'post-catg',
			'uses' => 'PostsController@postCatg'
		));

		Route::get('/posts/addpost', array(
			'as' => 'add-post',
			'uses' => 'PostsController@addPosts'
		))->before('auth');

		Route::post('/posts/addpost', array(
			'as' => 'adding-post',
			'uses' => 'PostsController@addingPosts'
		));

		Route::get('posts/edit/{postid}', array(
			'as' => 'edit-post',
			'uses' => 'PostsController@editPost'
		))->before('auth');


		Route::post('posts/edit/{postid}', array(
			'as' => 'edit-post-form',
			'uses' => 'PostsController@editPostForm'
		));

		Route::get('posts/delete/{postid}', array(
			'as' => 'delete-post',
			'uses' => 'PostsController@deletePost'
		))->before('auth');

#		Route::get('posts/{id}', array('as' => 'delete-post' ,'uses' => 'PostsController@deletePost'))->before('auth');

		Route::get('/useractivity/{name}', array(
			'as' => 'userActivity',
			'uses' => 'UserController@userActivity'
		));

		Route::get('/activity', array(
			'as' => 'activity',
			'uses' => 'UserController@activity'
		))->before('auth');
	

		Route::get('/dashboard', array(
			'as' => 'post-dashboard',
			'uses' => 'PostsController@dashboard'
		))->before('auth');

		Route::get('/posts/viewpost', array(
			'as' => 'view-post',
			'uses' => 'PostsController@viewPosts'
		))->before('auth');

		Route::get('/posts/viewallpost', array(
			'as' => 'view-all-post',
			'uses' => 'PostsController@viewAllPost'
		));

		Route::get('/feeds/{feed}', array(
			'as' => 'feeds',
			'uses' => 'FeedsController@feeds'));

//admin panel


Route::group(array('prefix' => 'admin', 'before' => 'admin'), function(){


	Route::get('/',array('as' => 'adminDashboard', 'uses' => 'adminController@dashboard'));

	Route::get('/dashboard',array('as'=>'adminDashboard1', 'uses' => 'adminController@dashboard1'));

	Route::get('/user/management',array('as' => 'adminUserManagement','uses' => 'adminController@userManagement'));

	Route::get('/post/management',array('as' => 'adminPostManagement','uses' => 'adminController@postManagement'));

	// Delete user

	Route::get('delete/{id}','adminController@userDelete');

	Route::get('deleteOption','adminController@deleteOption');

	Route::get('postdelete/{id}','adminController@postDelete');

	Route::get('postView/{id}', array('as'=> 'adminPostView','uses' => 'adminController@viewPost'));

	Route::get('settings',array('as' => 'adminSettings', 'uses' => 'adminController@settings'));

	Route::post('settings',array('as' => 'updateSettings', 'uses' => 'adminController@updateSettings'));
	Route::get('ads/management', array('as'=>'adminAdsManagement','uses'=>'adminController@adsManagement'));

	Route::post('ads/management/update',array('as'=>'updateAds','uses'=>'adminController@updateAds'));

});


Route::get('admin/install',array('as' => 'install',function(){
	return View::make('admin.install');
}))->before('new_installation');

Route::post('admin/install','adminController@install');


	Route::get('admin/login',array(
				'as' => 'adminLogin',
				'uses' => 'adminController@adminLogin'));
	Route::post('admin/login',array(
				'as' =>'adminLoginpost',
				'uses' => 'adminController@adminLoginpost'));
