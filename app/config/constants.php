<?php

    #################################################
	##             THIRD-PARTY APPS                ##
    #################################################

    define('DEFAULT_REPLY_TO' , '');

    const MAILER_AUTH = [
        'username' => 'main@academymgmt.online',
        'password' => 'ir0RF^nK;ath',
        'host'     => 'academymgmt.online',
        'name'     => 'TUP ARCHIVING',
        'replyTo'  => 'donotreply@academymgmt.online',
        'replyToName' => 'donotreply@academymgmt.online'
    ];



    const ITEXMO = [
        'key' => '',
        'pwd' => ''
    ];

	#################################################
	##             SYSTEM CONFIG                ##
    #################################################


    define('GLOBALS' , APPROOT.DS.'classes/globals');

    define('SITE_NAME' , 'invborrower.cloud');

    define('COMPANY_NAME' , 'BK_POS');
    define('APP_NAME' , 'BK_POS');

    define('KEY_WORDS' , 'BK_POS');


    define('DESCRIPTION' , 'BK_POS');

    define('AUTHOR' , SITE_NAME);


    define('APP_KEY' , 'BK_POS');
    
?>