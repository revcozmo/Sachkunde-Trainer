<div class="container">
	<div class="blog-header">
		<h1 class="blog-title">Danke für deine Spende!</h1>
		<p class="lead blog-description">Das Du mich unterstützt ist wunderbar!</p>
	</div>
	<div class="row">
        <div class="col-sm-8 blog-main">
			<div class="blog-post">
				<h2 class="blog-post-title">Vielen Dank für die Wertschätzung meine Arbeit!</h2>
				<p>Hallo <?php echo htmlentities($_REQUEST['sofortspende_name']); ?>!</p>
				<p>Du hast gerade <?php echo htmlentities($_REQUEST['sofortspende_amount']); ?> € dafür gespendet, dass ich den Sachkundetrainer kostenlos zur Verfügung stelle.</p>
				<p>Dafür danke ich Dir ganz persönlich, denn Arbeit sollte auch immer irgendwie honoriert werden. Leider ist es nur so, dass ich von Anerkennung kein Brot kaufen kann, deswegen kommt deine Spende gerade recht.</p>
				<p>Also vielen lieben Dank nochmal!</p>
				<p>Marc Schieferdecker</p>
			</div>
		</div>
		<div class="col-sm-3 col-sm-offset-1 blog-sidebar">
			<?php include( 'sidebar.php' ); ?>
		</div>
	</div>
</div>