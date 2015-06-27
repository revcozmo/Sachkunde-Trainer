<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
	<div class="container">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a href="?do=home" class="navbar-brand hidden-md hidden-sm">Waffensachkunde Trainer</a>
			<a href="?do=home" class="navbar-brand hidden-xs hidden-lg">Home</a>
		</div>
		<div class="collapse navbar-collapse">
			<ul class="nav navbar-nav">
				<li class="drowdown-menu <?php echo $_REQUEST['do']=='question'?'active':''; ?>">
					<a class="dropdown-toggle" data-toggle="dropdown" href="#">Neue Frage <span class="caret"></span></a>
					<ul class="dropdown-menu" role="menu">
						<li role="presentation" <?php echo $_REQUEST['do']=='question'?'class="active"':''; ?>><a href="?do=question">Zufällige Frage</a></li>
						<li role="presentation" class="divider"></li>
						<?php
							$result = $db -> query( "SELECT category FROM question GROUP BY category ORDER BY category;" );
							while( $cat = $db -> fetch_object( $result ) ) {
								if( mb_strlen( $cat -> category ) > 40 ) {
									$cat -> categoryShort = mb_substr( $cat -> category, 0, 40, 'utf-8' ) . '...';
								}
								else {
									$cat -> categoryShort = $cat -> category;
								}
								echo '<li role="presentation" ' . ($_REQUEST['category']==$cat->category ? 'class="active"':'') . '><a href="?do=question&amp;category=' . $cat -> category . '">' . $cat -> categoryShort . '</a></li>';
							}
						?>
					</ul>
				</li>
				<li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" href="#">Tools <span class="caret"></span></a>
					<ul class="dropdown-menu" role="menu">
						<li <?php echo $_REQUEST['do']=='stats'?'class="active"':''; ?>><a href="?do=stats">Deine Statistiken</a></li>
						<li <?php echo $_REQUEST['do']=='hard'?'class="active"':''; ?>><a href="?do=hard">Schwierige Fragen</a></li>
						<li <?php echo $_REQUEST['do']=='books'?'class="active"':''; ?>><a href="?do=books">Hilfen und Bücher</a></li>
						<li role="presentation" class="divider"></li>
						<?php if( $_SESSION['use_fb'] ) { ?>
							<li role="presentation"><a href="#" onclick="$.ajax('ajax/toggle_fb.php').done(function() { location.reload(); });"><input type="checkbox" checked="checked"/> Facebook</a></li>
						<?php } else { ?>
							<li role="presentation"><a href="#" onclick="$.ajax('ajax/toggle_fb.php').done(function() { location.reload(); });"><input type="checkbox"/> Facebook</a></li>
						<?php } ?>
						<?php if( $_SESSION['use_theme_dark'] ) { ?>
							<li role="presentation"><a href="#" onclick="$.ajax('ajax/toggle_theme.php').done(function() { location.reload(); });"><input type="checkbox" checked="checked"/> Dunkele Anzeige</a></li>
						<?php } else { ?>
							<li role="presentation"><a href="#" onclick="$.ajax('ajax/toggle_theme.php').done(function() { location.reload(); });"><input type="checkbox"/> Dunkele Anzeige</a></li>
						<?php } ?>
						<?php if( $_SESSION['use_exclude_questions'] ) { ?>
							<li role="presentation"><a href="#" onclick="$.ajax('ajax/toggle_exclude.php').done(function() { location.reload(); });"><input type="checkbox" checked="checked"/> Doppelte Fragen unterdrücken</a></li>
						<?php } else { ?>
							<li role="presentation"><a href="#" onclick="$.ajax('ajax/toggle_exclude.php').done(function() { location.reload(); });"><input type="checkbox"/> Doppelte Fragen unterdrücken</a></li>
						<?php } ?>
					</ul>
				</li>
				<li <?php echo $_REQUEST['do']=='about'?'class="active"':''; ?>><a href="?do=about">Über</a></li>
				<li <?php echo $_REQUEST['do']=='contact'?'class="active"':''; ?>><a href="?do=contact">Kontakt</a></li>
			</ul>
			<form class="navbar-form navbar-right" role="search">
				<input type="hidden" name="do" value="search"/>
				<div class="form-group">
					<input type="text" class="form-control" name="q" placeholder="Suchen">
				</div>
			</form>
			<ul class="nav navbar-nav navbar-right">
				<li <?php echo $_REQUEST['do']=='changelog'?'class="active"':''; ?>><a href="?do=changelog"><?php echo PRJ_VERSION; ?></a></li>
			</ul>
		</div>
	</div>
</div>