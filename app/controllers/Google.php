<?php

class Google extends BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /google
	 *
	 * @return Response
	 */
	public function loginGoogle()
	{
		// get data from input
    $code = Input::get( 'code' );

    // get google service
    $googleService = OAuth::consumer( 'Google', URL::route('account-google') );

    // check if code is valid

    // if code is provided get user data and sign in
    if ( !empty( $code ) ) {

        // This was a callback request from google, get the token
        $token = $googleService->requestAccessToken( $code );
        $token = $token->getAccessToken();

        // Send a request with it
        $result = json_decode( $googleService->request( 'https://www.googleapis.com/oauth2/v1/userinfo' ), true );

 
        $user = User::where('email', $result['email'])->first();

        		if($user)
        		{

        			$ggkey = Usermeta::where('usr_id', $user->id)->where('options', 'google_token')->update(['value' => $token]);
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

        			$ggkey = new Usermeta;
        			$ggkey->usr_id = $new->id;
        			$ggkey->options = 'google_token';
        			$ggkey->value = $token;
        			$ggkey->save();

        			Auth::login($new);
        			return Redirect::route('user-home');
        		}

    }
    // if not ask for permission first
    else {
        // get googleService authorization
        $url = $googleService->getAuthorizationUri();

        // return to google login url
        return Redirect::to( (string)$url );
    }
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /google/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /google
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /google/{id}
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
	 * GET /google/{id}/edit
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
	 * PUT /google/{id}
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
	 * DELETE /google/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}