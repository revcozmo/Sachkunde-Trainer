<?php
	/**
	 * No changes after here!
	 **************************************************/
	session_start();
	$_SESSION['q_total'] = !isset( $_SESSION['q_total'] ) ? 0 : $_SESSION['q_total'];
	$_SESSION['q_correct'] = !isset( $_SESSION['q_correct'] ) ? 0 : $_SESSION['q_correct'];
	$_SESSION['q_not_correct'] = !isset( $_SESSION['q_not_correct'] ) ? 0 : $_SESSION['q_not_correct'];
	$_SESSION['use_fb'] = !isset( $_SESSION['use_fb'] ) ? 1 : $_SESSION['use_fb'];
	$_SESSION['use_theme_dark'] = !isset( $_SESSION['use_theme_dark'] ) ? 0 : $_SESSION['use_theme_dark'];
	$_SESSION['use_exclude_questions'] = !isset( $_SESSION['use_exclude_questions'] ) ? 1 : $_SESSION['use_exclude_questions'];
	$_SESSION['exclude_questions'] = !isset( $_SESSION['exclude_questions'] ) ? array() : $_SESSION['exclude_questions'];
	$_SESSION['exclude_textquestions'] = !isset( $_SESSION['exclude_textquestions'] ) ? array() : $_SESSION['exclude_textquestions'];
?>