<div class="container">
<?php
	if( !empty( $_REQUEST[ 'question_id' ] ) )
		echo '<form name="questionform" method="post" action="/">';
	else
		echo '<form name="questionform" method="post" action="/#answers">';
?>	
		<input type="hidden" name="do" value="question"/>
		<div class="container col-md-8 center-block">
<?php
	// Get question
	$category = $db -> escape( $_REQUEST[ 'category' ] );
	$categorySql = !empty( $category ) ? " AND category LIKE '$category' " : "";
	if( !empty( $_REQUEST[ 'question_id' ] ) ) {
		$question = $db -> fetch_object( $db -> query( "SELECT * FROM question WHERE question_id='" . intval( $_REQUEST[ 'question_id' ] ) . "';" ) );
		$correct = true;
	}
	else {
		if( !empty( $_REQUEST[ 'load_question_id' ] ) )
			$question = $db -> fetch_object( $db -> query( "SELECT * FROM question WHERE 1 AND question_id='" . intval( $_REQUEST[ 'load_question_id' ] ) . "';" ) );
		else
			$question = $db -> fetch_object( $db -> query( "SELECT * FROM question WHERE 1 $categorySql ORDER BY RAND()" ) );
	}
	echo '<div class="page-header"><h2><span class="glyphicon glyphicon-chevron-right"></span> ' . $question -> category . '</h2></div>';

	// Panel start
	echo '<div class="panel panel-primary" id="answers">';
	echo '<div class="panel-heading"><h3 class="panel-title"><span class="glyphicon glyphicon-question-sign"></span> ' . $question -> question . '</h3></div>';

	// Get answers
	echo '<div class="panel-body">';
	echo '<div class="row">';
	echo '<table class="table answeres">';
	$dbresult = $db -> query( "SELECT * FROM answere WHERE question_id='{$question->question_id}' ORDER BY answere_id;" );
	echo '<thead>';
	echo '<tr><th class="col-md-10">Antwort</th><th class="col-md-2">Zutreffend?</th>';
	echo '</thead>';
	if( empty( $_REQUEST[ 'question_id' ] ) ) {
		echo '<input type="hidden" name="question_id" value="' . $question -> question_id . '"/>';
		while( $answere = $db -> fetch_object( $dbresult ) ) {
			echo '<tr><th>' . $answere -> answere . '</th><td><input type="checkbox" name="answere' . $answere -> answere_id . '" value="1"/></td></tr>';
			echo '<input type="hidden" name="correct' . $answere -> answere_id . '" value="' . $answere -> correct . '"/>';
		}
	}
	// Result
	else {
		while( $answere = $db -> fetch_object( $dbresult ) ) {
			echo '<tr><th>' . $answere -> answere . '</th><td><input type="checkbox" name="answere' . $answere -> answere_id . '" value="1" ' . (!empty($_REQUEST['answere'.$answere -> answere_id]) ? ' checked="checked"' : '') . '/> ';
			if( intval( $_REQUEST['answere'.$answere -> answere_id] ) == intval( $_REQUEST['correct'.$answere -> answere_id] ) ) {
				if( !empty( $_REQUEST['correct'.$answere -> answere_id] ) )
					echo '<button type="button" class="btn btn-xs btn-success"><span class="glyphicon glyphicon-thumbs-up"></span></button></td>';
			}
			else {
				$correct = false;
				echo '<button type="button" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-thumbs-down"></span></button></td>';
			}
			echo '</tr>';
		}
	}
	// Result msg and table end
	if( isset( $correct ) && $correct == true ) {
		$alert = '<div class="alert alert-success" role="alert"><strong>Deine Antwort war richtig. Gut gemacht!</strong></div>';
		$_SESSION['q_total']++;
		$_SESSION['q_correct']++;
	}
	else
	if( isset( $correct ) && $correct == false ) {
		$alert = '<div class="alert alert-danger" role="alert"><strong>Deine Antwort war leider falsch!</strong></div>';
		$_SESSION['q_total']++;
		$_SESSION['q_not_correct']++;
		$db -> query( "UPDATE question SET count_wrong=count_wrong+1 WHERE question_id='{$question->question_id}';" );
	}
	else {
		$alert = '&nbsp;';
	}
	echo '<tr><td>';
	// Category select next question
	if( isset( $correct ) ) {
		echo '<select class="form-control pull-right" name="category">';
		echo '<option value="">- Alle Kategorien verwenden -</option>';
		$result = $db -> query( "SELECT category FROM question GROUP BY category ORDER BY category;" );
		while( $cat = $db -> fetch_object( $result ) ) {
			if( $cat -> category == $category )
				echo '<option value="' . $cat -> category . '" selected="selected">' . $cat -> category . '</option>';
			else
				echo '<option value="' . $cat -> category . '">' . $cat -> category . '</option>';
		}
		echo '</select>';
	}
	else {
		echo '<input type="hidden" name="category" value="' . $category . '"/>';
	}
	echo '</td><td><input class="form-control btn btn-primary" type="submit" value="Weiter"/></tr>';
	echo '<tr><td colspan="2">' . $alert . '</td></tr>';
	echo '</table>';
	// Mention questions that are identified as "BVA BULLSHIT"...
	if( $question -> question_id == 177 ) {
		echo '<div class="alert alert-danger col-md-10 center-block" role="alert"><strong>Diese Frage des BVA hat keinerlei rechtliche Grundlage, dennoch muss sie in der Prüfung evtl. korrekt beantwortet werden. Bitte merk Dir also die richtige Antwort, auch wenn das mit der Realität wenig zu tun hat.</strong></div>';
	}
	echo '</div>';
	echo '</div>';
	echo '<div class="panel-footer">Frage Nr. ' . $question -> question_id . ' | <a href="http://sachkundetrainer.german-rifle-association.de/?do=question&load_question_id=' . $question -> question_id . '">Permalink</a>';
		if( $_SESSION['use_fb'] ) {
			echo ' | <div class="fb-like" data-href="' . PRJ_URL . '/?do=question&load_question_id=' . $question -> question_id . '" data-layout="button_count" data-action="like" data-show-faces="false" data-share="true"></div>';
		}
		echo '</div>';
	echo '</div>';
?>
		</div>
	</form>
	<?php if( $_SESSION['use_fb'] ) { ?>
		<div class="container col-md-8 center-block">
			<div class="panel panel-primary">
				<div class="panel-heading"><h3 class="panel-title"><span class="glyphicon glyphicon-comment"></span> Tausche Dich über diese Frage mit anderen Nutzern aus</h3></div>
				<div class="panel-body">
					<div class="row">
						<div class="fb-comments" data-href="<?php echo PRJ_URL . '/?do=question&load_question_id=' . $question -> question_id; ?>" data-num-posts="5" data-width="100%" data-mobile="auto-detect"></div>
					</div>
				</div>
			</div>
		</div>
	<?php } ?>
</div>
