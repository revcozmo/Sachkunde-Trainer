<?php
	if( $_REQUEST['reset']=='1') {
		$_SESSION[ 'q_total' ] = 0;
		$_SESSION[ 'q_correct' ] = 0;
		$_SESSION[ 'q_not_correct' ] = 0;
		$_SESSION[ 'exclude_questions' ] = array();
	}
	if( $_SESSION[ 'q_total' ] ) {
		$c_percent = round( ($_SESSION[ 'q_correct' ] / $_SESSION[ 'q_total' ]) * 100, 2 );
		$nc_percent = round( ($_SESSION[ 'q_not_correct' ] / $_SESSION[ 'q_total' ]) * 100, 2 );
	}
	else {
		$c_percent = 0;
		$nc_percent = 0;
	}
?>
<div class="container">
	<div class="container col-md-12 center-block">
		<div class="row">
			<div class="page-header"><h2><span class="glyphicon glyphicon-stats"></span> Deine Statistiken</h2></div>
			<div class="panel panel-primary">
				<div class="panel-heading"><h3 class="panel-title"><span class="glyphicon glyphicon-file"></span> Deine Ergebnisse zu beantworteten Fragen</h3></div>
				<div class="panel-body">
					<div class="row">
						<table class="table">
							<tr><th class="col-md-6">Insgesamt beantwortete Fragen</th><td class="col-md-6"><?php echo $_SESSION[ 'q_total' ]; ?></td></tr>
							<tr><th class="col-md-6">Richtig beantwortete Fragen</th><td class="col-md-6"><?php echo $_SESSION[ 'q_correct' ]; ?></td></tr>
							<tr><th class="col-md-6">Falsch beantwortete Fragen</th><td class="col-md-6"><?php echo $_SESSION[ 'q_not_correct' ]; ?></td></tr>
						</table>
					</div>
					<div class="row">
						<table class="table">
							<tr><th class="col-md-6">Richtig %</th><th class="col-md-6">Falsch %</th></tr>
							<tr><td class="col-md-6"><?php echo number_format( $c_percent, 2, ',', '.' ); ?> %</td><td class="col-md-6"><?php echo number_format( $nc_percent, 2, ',', '.' ); ?> %</td></tr>
							<tr>
								<td class="col-md-6">
									<div class="progress">
										<div class="progress-bar" role="progressbar" aria-valuenow="<?php echo round( $c_percent ); ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo round( $c_percent ); ?>%;">
											<?php echo number_format( $c_percent, 2, ',', '.' ); ?>%
										</div>
									</div>
								</td>
								<td class="col-md-6">
									<div class="progress">
										<div class="progress-bar" role="progressbar" aria-valuenow="<?php echo round( $nc_percent ); ?>" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo round( $nc_percent ); ?>%;">
											<?php echo number_format( $nc_percent, 2, ',', '.' ); ?>%
										</div>
									</div>
								</td>
							</tr>
						</table>
					</div>
				</div>
			</div>

			<div class="panel panel-primary">
				<div class="panel-heading"><h3 class="panel-title"><span class="glyphicon glyphicon-asterisk"></span> Dein Prüfungsergebnis</h3></div>
				<div class="panel-body">
					<p>
					<?php
						if( $_SESSION[ 'q_total' ] >= 100 ) {
							if( $c_percent >= 75 )
								echo '<div class="alert alert-success">Herzlichen Glückwunsch. Du hättest <strong>bestanden</strong>!</div>';
							else
							if( $c_percent < 75 && $c_percent >= 60 )
								echo '<div class="alert alert-warning">Du müsstest in die <strong>mündliche Prüfung</strong>! Übe noch mehr, denn sicher ist sicher!</div>';
							else
								echo '<div class="alert alert-danger">Schade. Du hättest <strong>nicht bestanden</strong>! Übe noch mehr, dann schaffst Du es!</div>';
						}
						else {
							echo '<div class="alert alert-info">Du musst erst wenigstens 100 Fragen beantworten, um dein Ergebnis beurteilen zu können.</div>';
						}
					?>
					</p>

					<h4>Voraussetzungen und Ablauf der theoretischen Prüfung</h4>
					<p>Die Prüfungsdauer schriftlicher Teil beträgt in der Regel 120 Minuten (Multiple Choice). Der Prüfungsumfang des theoretischen Teils umfasst insgesamt 100 Fragen aus dem amtlichen Fragenkatalolg für die Sachkundeprüfung gemäß § 7 WaffG:</p>
					<p>
						<ul>
							<li>Teil 1: 60 Fragen Waffen- und Munitionskunde / Waffenrecht, Notwehr und Notstand</li>
							<li>Teil 2: 10 gezielte Fragen Notwehr / Notstand, 20 gezielte Fragen Waffen, Munition und Waffenrecht, 10 gezielte Fragen Standaufsicht / Waffentechnik</li>
						</ul>
					</p>
					<p>In Teil 1 sind pro Frage mehrere Antworten a) b) c) vorgegeben. Die richtige Anwort muss auf dem Lösungsbogen angekreuzt werden. In Teil 2 sind pro Frage ebenfalls mehrere Antworten vorgegeben, hier können jedoch mehrere Antworten richtig sein.</p>
					<p>Die Auswertung der Fragebogen erfolgt dann unmittelbar nach Ende des schriftlichen Teils.</p>
					<p>
						<ul>
							<li>75 – 100 Punkte (richtige Antworten) - Prüfung bestanden</li>
							<li>60 – 74 Punkte - zusätzlich mündliche Prüfung</li>
							<li>0 – 60 Punkte - Prüfung nicht bestanden</li>
						</ul>
					</p>
					<p><strong>Du solltest also auf jeden Fall über 75% der Fragen richtig beantworten, dann bist Du auf der sicheren Seite!</strong></p>
				</div>
			</div>
			<div class="panel panel-primary">
				<div class="panel-heading"><h3 class="panel-title"><span class="glyphicon glyphicon-remove"></span> Statistiken zurücksetzen</h3></div>
				<div class="panel-body">
					<p>Die Statistiken verfallen in der Regel, wenn Du diese Seiten für längere Zeit in deinem Browser nicht aufrufst, oder deinen Browser schließt. Natürlich kannst Du die Statistiken aber auch auf Wunsch sofort zurücksetzen.</p>
					<p>Wenn Du die Statistiken zurücksetzt, wird auch die Liste der bereits beantworteten Fragen zurückgesetzt. Das wirkt sich also auf die Option aus, die doppelte Fragen unterdrückt!</p>
					<p><a class="btn btn-primary btn-lg" role="button" href="?do=stats&amp;reset=1">Statistiken zurücksetzen!</a></p>
				</div>
			</div>
		</div>
	</div>
</div>