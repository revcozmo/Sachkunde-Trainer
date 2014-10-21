<?php
	// Config
	include( '../config/config.php' );

	if( $_SESSION[ 'use_theme_dark' ] == 1 ) {
		$_SESSION[ 'use_theme_dark' ] = 0;
	}
	else
	if( $_SESSION[ 'use_theme_dark' ] == 0 ) {
		$_SESSION[ 'use_theme_dark' ] = 1;
	}
?>