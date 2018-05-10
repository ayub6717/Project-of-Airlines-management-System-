

<?php
function is_admin($user_id) {
	$user_id = (int)$user_id;
	
	return (mysql_result(mysql_query("SELECT COUNT(`user_id`) FROM `users` WHERE `user_id` = $user_id AND `type` = 1"), 0) == 1) ? true : false;
}
function activate($email, $email_code) {
	$email = mysql_real_escape_string($email);
	$email_code = mysql_real_escape_string($email_code);
	
	if (mysql_result(mysql_query("SELECT COUNT(`user_id`) FROM `users` WHERE `email` = '$email' AND `email_code` = '$email_code' AND `active` = 0"), 0) == 1) {
		mysql_query("UPDATE `users` SET `active` = 1 WHERE `email` = '$email'");
		return true;
	}else{
		return false;
	}
}
function change_password($user_id, $password) {
	$user_id = (int)$user_id;
	$password = md5($password);
	mysql_query("UPDATE `users` SET `password` = '$password' WHERE `user_id` = $user_id");
}
function register_user($register_data) {
	array_walk($register_data,'array_sanitize');
	$register_data['password'] = md5($register_data['password']);
	$fields = '`' . implode('`, `', array_keys($register_data)) . '`';
	$data = '\'' . implode('\', \'', $register_data) . '\'';
	mysql_query("INSERT INTO `users` ($fields) VALUES ($data)");
	email($register_data['email'], 'Activate your account', "Hello" . $register_data['first_name'] . ",\n\n you need to activate your account, click the link given below:\n\n http://localhost/test/activate.php?email=" . $register_data['email'] . "&email_code=" . $register_data['email_code'] . "\n\n -AN AIRLINES");

}

function register_flight($register_data1) {
	//array_walk($register_data1,'array_sanitize');
	//$register_data['password'] = md5($register_data['password']);
	$fields = '`' . implode('`, `', array_keys($register_data1)) . '`';
	$data = '\'' . implode('\', \'', $register_data1) . '\'';
	mysql_query("INSERT INTO `members` ($fields) VALUES ($data)");
	//email($register_data['email'], 'Activate your account', "Hello" . $register_data['first_name'] . ",\n\n you need to activate your account, click the link given below:\n\n http://localhost/test/activate.php?email=" . $register_data['email'] . "&email_code=" . $register_data['email_code'] . "\n\n -AN AIRLINES");

}
function register_passenger($register_data2) {
	//array_walk($register_data1,'array_sanitize');
	//$register_data['password'] = md5($register_data['password']);
	$fields = '`' . implode('`, `', array_keys($register_data2)) . '`';
	$data = '\'' . implode('\', \'', $register_data2) . '\'';
	mysql_query("INSERT INTO `passengers` ($fields) VALUES ($data)");
	//email($register_data['email'], 'Activate your account', "Hello" . $register_data['first_name'] . ",\n\n you need to activate your account, click the link given below:\n\n http://localhost/test/activate.php?email=" . $register_data['email'] . "&email_code=" . $register_data['email_code'] . "\n\n -AN AIRLINES");

}


function user_count() {
	return mysql_result(mysql_query("SELECT COUNT('user_id') FROM `users` WHERE `active` = 1"), 0);
}
function user_data($user_id) {
	$data = array();
	$user_id = (int)$user_id;
	$func_num_args = func_num_args();
	$func_get_args = func_get_args();
	if ($func_num_args > 1) {
		unset($func_get_args[0]);
		$fields = '`' . implode('`, `', $func_get_args) . '`';
		$data = mysql_fetch_assoc(mysql_query("SELECT $fields FROM `users` WHERE `user_id` = $user_id"));
		
		return $data;
	}
}

function logged_in() {
	return (isset($_SESSION['user_id'])) ? true : false;
}
//checking for book

function payment_restrict() {
	return (isset($_SESSION['sessionvar'])) ? true : false;
}





function user_exists($username) {
    $username = sanitize($username);


  return (mysql_result( mysql_query("SELECT COUNT(`user_id`) FROM `users` WHERE `username` ='$username' "), 0) == 1) ? true : false;

}
function email_exists($email) {
    $email = sanitize($email);


  return (mysql_result( mysql_query("SELECT COUNT(`user_id`) FROM `users` WHERE `email` ='$email' "), 0) == 1) ? true : false;

}
function user_active($username) {
    $username = sanitize($username);


  return (mysql_result( mysql_query("SELECT COUNT(`user_id`) FROM `users` WHERE `username` ='$username' AND  `active` = 1 "), 0) == 1) ? true : false;

}
function user_id_from_username($username) {
	$username=sanitize($username);
	return mysql_result(mysql_query("SELECT `user_id` FROM `users` WHERE `username` = '$username'"), 0 ,'user_id');
}
function login($username, $password) {
	$user_id= user_id_from_username($username);
	$username=sanitize($username);
	$password=md5($password);
	return (mysql_result(mysql_query("SELECT COUNT(`user_id`) FROM `users` WHERE `username` = '$username' AND `password`='$password'"), 0)== 1) ? $user_id : false;

	
	
	
}
?>
