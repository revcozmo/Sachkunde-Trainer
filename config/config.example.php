<?php
	/**
	 * LOAD THIS FILE BEFORE ALL OTHERS!
	 **************************************************/
	@header( 'Content-Type:text/html;charset=UTF-8' );

	/**
	 * Define paths [no need to change!]
	 **************************************************/
	define( 'PRJ_CONF', realpath( dirname( __FILE__ ) ) );
	define( 'PRJ_PATH', realpath( dirname( __FILE__ ) . DIRECTORY_SEPARATOR . '..' ) );
	define( 'PRJ_LIB', PRJ_PATH . DIRECTORY_SEPARATOR . 'lib' );
	define( 'PRJ_INC', PRJ_PATH . DIRECTORY_SEPARATOR . 'inc' );
	define( 'PRJ_URL', 'http://' . $_SERVER[ 'SERVER_NAME' ] );

	/**
	 * Database config [enter your database connection]
	 **************************************************/
	define( 'PRJ_DB_HOST', 'localhost' );
	define( 'PRJ_DB_DATABASE', 'database' );
	define( 'PRJ_DB_USER', 'username' );
	define( 'PRJ_DB_PASSWORD', 'password' );
	include( PRJ_CONF . '/database.php' );

	/**
	 * Session config [no need to change!]
	 **************************************************/
	session_set_cookie_params( 86400 * 30 );
	include( PRJ_CONF . '/session.php' );

	/**
	 * Password SALT and password length [change salt!]
	 **************************************************/
	define( 'PRJ_PASSWORD_SALT', '#fu!!kkpo0443xcvvuzDf#*33"%&kkpwpVcX.0;342xS+' );
	define( 'PRJ_PASSWORD_MINIMUM_LENGTH', 7 );

	/**
	 * Display errors [remove in production!]
	 **************************************************/
	ini_set( 'display_errors', 'on' );
	error_reporting( E_ALL ^ E_NOTICE ^ E_DEPRECATED );
	//ini_set( 'display_errors', 'off' );
	//error_reporting( E_NONE );
?>