<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*!
* HybridAuth
* http://hybridauth.sourceforge.net | http://github.com/hybridauth/hybridauth
* (c) 2009-2012, HybridAuth authors | http://hybridauth.sourceforge.net/licenses.html
*/

// ----------------------------------------------------------------------------------------
//	HybridAuth Config file: http://hybridauth.sourceforge.net/userguide/Configuration.html
// ----------------------------------------------------------------------------------------

$config =
	array(
		// set on "base_url" the relative url that point to HybridAuth Endpoint
		'base_url' => '/Hauth/endpoint/',

		"providers" => array (
			// openid providers
			

			"Google" => array (
				"enabled" => true,
				"keys"    => array ( "id" => "141084469157-p5pfarb9qt0gu49atca12j9durhv4t9s.apps.googleusercontent.com", "secret" => "8FQNTpRiQ-Junpb_ZNc_f5Em" ),
			),

			"Facebook" => array ( 
				"enabled" => true,
				"keys"    => array ( "id" => "1258663720844024", "secret" => "8fb8551279771044268f14b2423b9373" ),
				"trustForwarded" => false
			),

			"Twitter" => array (
				"enabled" => true,
				"keys"    => array ( "key" => "uRlP374X88ipClt3ZiBtXnoKU", "secret" => "pJDmk3tYsO8zpOV3rjP5uThsGkCNUIswVjURLIwTmH6RcqFtpL" )
			),

			
		),

		// if you want to enable logging, set 'debug_mode' to true  then provide a writable file by the web server on "debug_file"
		"debug_mode" => (ENVIRONMENT == 'development'),

		"debug_file" => APPPATH.'/logs/hybridauth.log',
	);


/* End of file hybridauthlib.php */
/* Location: ./application/config/hybridauthlib.php */