<?php
	// Config
	include( 'config/config.php' );

	// Edit HTML title
	if( !empty( $_REQUEST[ 'load_question_id' ] ) ) {
		$question = $db -> fetch_object( $db -> query( "SELECT * FROM question WHERE question_id='" . intval( $_REQUEST[ 'load_question_id' ] ) . "';" ) );
		$htmlTitle = 'Frage Nr. ' . $question->question_id . ': ' . $question->question;
	}
	else
	if( $_REQUEST[ 'do' ] == 'hard' ) {
		$htmlTitle = 'Die 25 schwierigsten Fragen';
	}
	else
	if( $_REQUEST[ 'do' ] == 'about' ) {
		$htmlTitle = 'Über den Waffensachkundetrainer';
	}
	else
	if( $_REQUEST[ 'do' ] == 'contact' ) {
		$htmlTitle = 'Impressum / Kontakt';
	}
	else
	if( $_REQUEST[ 'do' ] == 'changelog' ) {
		$htmlTitle = 'Changelog zur Waffensachkunde Trainer Software';
	}
	else {
		$htmlTitle = 'Waffensachkunde Trainer - German Rifle Association';
	}
?><!DOCTYPE html>
<html lang="de-DE">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="description" content="Waffensachkunde Trainer, Übungen für die in Deutschland vorgeschiebene Sachkunde nach §7 WaffG im Umgang mit Schusswaffen, zur Erlangung einer Waffenbesitzkarte (WBK).">
    <meta name="author" content="Marc Schieferdecker">
    <link rel="icon" href="/favicon.ico">
	<title><?php echo $htmlTitle; ?></title>

	<!-- Bootstrap + jQuery -->
	<link rel="stylesheet" href="/css/bootstrap.min.css">
	<link rel="stylesheet" href="/css/bootstrap-theme.min.css">
	<script type="text/javascript" src="/js/jquery-1.11.1.min.js"></script>
	<script type="text/javascript" src="/js/bootstrap.min.js"></script>
	
	<!-- CSS Hacks -->
	<link rel="stylesheet" href="/css/hacks.css?v=0.9beta">
	<?php if( $_SESSION['use_theme_dark'] ) { ?>
		<link rel="stylesheet" href="/css/theme-dark.css?v=0.9beta">
	<?php } ?>
	
	<!-- Sharing Image -->
	<link rel="image_src" href="http://sachkundetrainer.german-rifle-association.de/images/sachkundetrainer_logo.png"/>
</head>
<body>
	<!-- Sharing Image -->
	<img src="http://sachkundetrainer.german-rifle-association.de/images/sachkundetrainer_logo.png" style="position:absolute;left:-8000px;top:-8000px"/>
	<script>
	  window.fbAsyncInit = function() {
		FB.init({
		  appId      : '1591588067735925',
		  xfbml      : true,
		  version    : 'v2.1'
		});
	  };
	  (function(d, s, id){
		 var js, fjs = d.getElementsByTagName(s)[0];
		 if (d.getElementById(id)) {return;}
		 js = d.createElement(s); js.id = id;
		 js.src = "//connect.facebook.net/de_DE/sdk.js";
		 fjs.parentNode.insertBefore(js, fjs);
	   }(document, 'script', 'facebook-jssdk'));
	</script>
	<?php
		include( PRJ_INC . '/menu.php' );
	?>
	<?php
		// Parse actions
		$do = $_REQUEST[ 'do' ];
		if( $do == 'home' || empty( $do ) ) {
			include( PRJ_INC . '/home.php' );
		}
		if( $do == 'question' ) {
			include( PRJ_INC . '/question.php' );
		}
		if( $do == 'about' ) {
			include( PRJ_INC . '/about.php' );
		}
		if( $do == 'contact' ) {
			include( PRJ_INC . '/contact.php' );
		}
		if( $do == 'search' ) {
			include( PRJ_INC . '/search.php' );
		}
		if( $do == 'stats' ) {
			include( PRJ_INC . '/stats.php' );
		}
		if( $do == 'danke' ) {
			include( PRJ_INC . '/danke.php' );
		}
		if( $do == 'changelog' ) {
			include( PRJ_INC . '/changelog.php' );
		}
		if( $do == 'hard' ) {
			include( PRJ_INC . '/hard.php' );
		}
	?>
	<?php
		include( PRJ_INC . '/footer.php' );
	?>
</body>
</html>