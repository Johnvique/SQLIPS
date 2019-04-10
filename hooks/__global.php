<?php
	

	function login_ok($memberInfo, &$args){

		return '';
	}

	/**
	 * This hook function is called when a login attempt fails.
	 * It can be used for example to log login errors.
	 * 
	 * @param $attempt
	 * An associative array that contains the following members:
	 * $attempt['username']: the username used to log in
	 * $attempt['password']: the password used to log in
	 * $attempt['IP']: the IP from wihich the login attempt was made
	 * 
	 * @param $args
	 * An empty array that is passed by reference. It's currently not used but is reserved for future uses.
	 * 
	 * @return
	 * None.
	*/

	function login_failed($attempt, &$args){

	}

	

	function member_activity($memberInfo, $activity, &$args){
		switch($activity){
			case 'pending':
				break;

			case 'automatic':
				break;

			case 'profile':
				break;

			case 'password':
				break;

		}
	}

	/**
	 * This hook function is called when an email is being sent
	 * 
	 * @param $pm is the PHPMailer object, passed by reference in order to easily modify its properties.
	 *            Documentation and examples can be found at https://github.com/PHPMailer/PHPMailer
	 *  
	 * @return none
	 */
	function sendmail_handler(&$pm){

	}
