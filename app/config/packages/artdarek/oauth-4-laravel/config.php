<?php 

return array( 
	
	/*
	|--------------------------------------------------------------------------
	| oAuth Config
	|--------------------------------------------------------------------------
	*/

	/**
	 * Storage
	 */
	'storage' => 'Session', 

	/**
	 * Consumers
	 */
	'consumers' => array(

		/**
		 * Facebook
		 */
        'Facebook' => array(
            'client_id'     => '304152423122304',
            'client_secret' => 'd00f583eb2386c272ce51f36dfcdd32e',
            'scope'         =>  array('email','read_friendlists','user_online_presence'),
        ),	

        //google login

        'Google' => array(
   		 'client_id'     => '461219408974-f00qmqe8qokmvjii8hp363ku9eg724ok.apps.googleusercontent.com',
   		 'client_secret' => 'FGyiak4ih8xz7N2-OPRx7MOP',
   		 'scope'         => array('userinfo_email', 'userinfo_profile'),
		),  	

	)

);