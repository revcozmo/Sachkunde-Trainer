<?php
	// Config
	include( '../config/config.php' );

	if( $_SESSION[ 'use_exclude_questions' ] == 1 ) {
		$_SESSION[ 'use_exclude_questions' ] = 0;
		$_SESSION[ 'exclude_questions' ] = array();
	}
	else
	if( $_SESSION[ 'use_exclude_questions' ] == 0 ) {
		$_SESSION[ 'use_exclude_questions' ] = 1;
		$_SESSION[ 'exclude_questions' ] = array();
	}
?>