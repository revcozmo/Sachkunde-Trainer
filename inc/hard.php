<div class="container">
	<div class="container col-md-12 center-block">
		<div class="row">
			<div class="well introduction">
				<h2><span class="glyphicon glyphicon-signal"></span> Die 25 schwierigsten Fragen</h2>
				<p>Dies hier sind die 25 Fragen, die von allen Benutzern am häufigsten falsch beantwortet wurden.</p>
		<?php
			$result = $db -> query( "SELECT * FROM question WHERE 1 ORDER BY count_wrong DESC LIMIT 0,25;" );
			echo '<div class="list-group">';
			while( $question = $db -> fetch_object( $result ) ) {
				echo '<a href="?do=question&amp;load_question_id=' . $question -> question_id . '" class="list-group-item">' . $question -> question . ' <small>(Nr. ' . $question -> question_id . ')</small></a>';
			}
			echo '</div>';
		?>
			</div>
		</div>
	</div>
</div>