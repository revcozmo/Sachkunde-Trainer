<div class="container">
	<div class="row">
		<div class="container col-md-8 col-md-offset-2">
<?php
	// Get question
	if( !empty( $_REQUEST[ 'load_question_id' ] ) ) {
		$question = $db -> fetch_object( $db -> query( "SELECT * FROM textquestion WHERE 1 AND textquestion_id='" . intval( $_REQUEST[ 'load_question_id' ] ) . "';" ) );
	}
	else {
		$excludeSql = '';
		if( !empty( $_SESSION[ 'use_exclude_questions' ] ) ) {
			if( is_array( $_SESSION[ 'exclude_textquestions' ] ) && count( $_SESSION[ 'exclude_textquestions' ] ) ) {
				$excludeSql = " AND textquestion_id NOT IN ( " . implode( ',', $_SESSION[ 'exclude_textquestions' ] ) . " ) ";
			}
		}
		$question = $db -> fetch_object( $db -> query( "SELECT * FROM textquestion WHERE 1 $excludeSql ORDER BY RAND()" ) );
		// Store question in exclude array
		if( !empty( $_SESSION[ 'use_exclude_questions' ] ) ) {
			if( !empty( $question -> textquestion_id ) ) {
				$_SESSION[ 'exclude_textquestions' ][] = $question -> textquestion_id;
			}
		}
	}
?>
			<div class="panel panel-primary">
				<div class="panel-heading"><h3 class="panel-title"><span class="glyphicon glyphicon-question-sign"></span> Freie Fragen</h3></div>
				<div class="panel-body">
					<h4>Frage</h4>
					<div class="well">
						<?php echo $question -> question; ?>
					</div>
					<h4>Antwort</h4>
					<div class="well text-center" id="showAnswere">
						<a href="javascript:void(0);" onclick="$('#showAnswere').hide(); $('#answere').show(); return false;" class="btn btn-primary">Antwort anzeigen</a>
					</div>
					<div class="well" id="answere" style="display:none">
						<?php echo nl2br( $question -> answere ); ?>
						<div class="text-right">
							<a href="?do=textquestion" class="btn btn-primary">Nächste Frage</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php if( $_SESSION['use_fb'] ) { ?>
			<div class="container col-md-8 col-md-offset-2">
				<div class="panel panel-primary">
					<div class="panel-heading"><h3 class="panel-title"><span class="glyphicon glyphicon-comment"></span> Tausche Dich über diese Frage mit anderen Nutzern aus</h3></div>
					<div class="panel-body">
						<div class="row">
							<div class="fb-comments" style="width:100%" data-href="<?php echo PRJ_URL . '/?do=textquestion&load_question_id=' . $question -> textquestion_id; ?>" data-num-posts="5" data-width="100%" data-mobile="auto-detect"></div>
						</div>
					</div>
				</div>
			</div>
		<?php } ?>
	</div>
</div>
