<?php
	// Config
	include( '../config/config.php' );

	if( $_SESSION[ 'use_fb' ] == 1 ) {
		$_SESSION[ 'use_fb' ] = 0;
	}
	else
	if( $_SESSION[ 'use_fb' ] == 0 ) {
		$_SESSION[ 'use_fb' ] = 1;
	}
?>