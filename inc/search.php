<?php
	$q = preg_replace( '#[^a-z0-9äöüß ]#iu', '', $_REQUEST[ 'q' ] );
?>
<div class="container">
	<div class="page-header"><h2><span class="glyphicon glyphicon-search"></span> Suchergebnisse für "<?php echo $q; ?>"</h2></div>
<?php
	$result = $db -> query( "SELECT * FROM question WHERE question LIKE '%$q%' ORDER BY question_id;" );
	if( $db -> rowsfound( $result ) ) {
		echo '<div class="list-group">';
		while( $question = $db -> fetch_object( $result ) ) {
			echo '<a href="?do=question&amp;load_question_id=' . $question -> question_id . '" class="list-group-item">' . str_ireplace( $q, '<strong>' . $q . '</strong>', $question -> question ) . '</a>';
		}
		echo '</div>';
	}
	else {
		echo '<div class="alert alert-danger" role="alert"><strong>Leider wurden keine Ergebnisse zu diesem Suchbegriff gefunden.</strong></div>';
	}
?>
</div>
