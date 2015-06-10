<?php

class Facebook extends BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function loginFacebook()
	{
		$code = Input::get( 'code' );

    // get fb service
    	$fb = OAuth::consumer( 'Facebook' );

    // check if code is valid

    // if code is provided get user data and sign in
    	if ( !empty( $code ) ) {

        // This was a callback request from facebook, get the token
        	$token = $fb->requestAccessToken( $code );
        	$token = $token->getAccessToken();
        // Send a request with it
        		$result = json_decode( $fb->request( '/me' ), true );
        	    $user = User::where('email', $result['email'])->first();

        		if($user)
        		{

        			$fbkey = Usermeta::where('usr_id', $user->id)->where('options', 'facebook_token')->update(['value' => $token]);
        			Auth::login($user);
        			return Redirect::route('user-home');
        		}
        		else 
        		{
        			$new = new User;
        			$new->email = $result['email'];
        			$new->name = $result['name'];
        			$new->password = Hash::make($result['id']);
        			$new->save();

        			$fbkey = new Usermeta;
        			$fbkey->usr_id = $new->id;
        			$fbkey->options = 'facebook_token';
        			$fbkey->value = $token;
        			$fbkey->save();

        			Auth::login($new);
        			return Redirect::route('user-home');
        		}


    	}
    // if not ask for permission first
    	else {
        // get fb authorization
        	$url = $fb->getAuthorizationUri();

        // return to facebook login url
         	return Redirect::to( (string)$url );
    	}

		}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}


	/**
	 * Display the specified resource.
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
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
