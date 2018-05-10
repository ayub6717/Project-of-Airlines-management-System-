<?php
function email($to, $subject, $body) {
	mail($to, $subject, $body, 'From: Anairlines.com');
}
function logged_in_redirect() {
	if (logged_in() === true) {
		header('Location: index.php');
		exit();
	}
}
function protect_page() {
	if (logged_in() === false) {
		header('Location: protected.php');
		exit();
	}
}
//for book
function check_book() {
	if (payment_restrict() === false) {
		header('Location: flight.php');
		exit();
	}
}


function admin_protect() {
	global $user_data;
	if (is_admin($user_data['user_id']) === false) {
		header('Location: index.php');
		exit();
	}
	
}

function array_sanitize(&$item) {
	$item = mysql_real_escape_string($item);
}
function sanitize($data) {
	return mysql_real_escape_string($data);
	
}
function output_errors($errors) {
	return '<ul><li>' . implode('</li><li>', $errors) . '</li></ul>';
}
//function output_error($errors) {
	//return '<ul><li>' . implode('</li><li>', $errors) . '</li></ul>';
//}


?>