<?php
include 'core/init.php';
logged_in_redirect();
include 'includes/overall/header.php';
if(empty($_POST) === false) {
	$required_fields = array('username', 'password', 'password_again', 'first_name', 'email');
	foreach($_POST as $key=>$value) {
		if (empty($value) && in_array($key, $required_fields) === true) {
			$errors[] = 'Fields marked with an asterisk are required';
			break 1;
		}
		
	}
	if (empty($errors) === true) {
		if (user_exists($_POST['username']) === true) {
			$errors[] = 'sorry, the username \'' . $_POST['username'] . '\' is already taken.';
		}
		if (preg_match("/\\s/", $_POST['username']) == true) {
			$errors[] = 'Your username must not contain any spaces.';
			
			}
			if (strlen($_POST['password']) < 6) {
				$errors[] = 'Your password must be at least 6 character';
				
				
			}
			if ($_POST['password'] !== $_POST['password_again']) {
				$errors[] = 'Your passwords do not match';
			}
			if (filter_var($_POST['email'],FILTER_VALIDATE_EMAIL) === false) {
				$errors[] = 'A valid email address is required';
			}
			if (email_exists($_POST['email']) === true) {
				$errors[] = 'sorry,the email \'' . $_POST['email'] . '\' is already in use';
			}
	}
	
	
}

?>

<?php
if (isset($_GET['success']) && empty($_GET['success'])) {
	echo 'You\'ve been registered successfully! please check your email to activate your account! ';
}
else {
if (empty($_POST) === false && empty($errors) === true) {
	$register_data = array(
	'username'		=> $_POST['username'],
	'password'		=> $_POST['password'],
	'first_name'	=> $_POST['first_name'],
	'last_name'		=> $_POST['last_name'],
	'email'			=> $_POST['email'],
	'email_code'    => md5($_POSt['username'] + microtime())
	
	
	
	
	);
	register_user($register_data);
	header('Location: register.php?success');
	exit();
	
}else if (empty($errors) === false) {
	echo output_errors($errors);
}

 ?>
<h1>Register</h1>
<form action="" method="post">
<ul>
<li>
User name*:<br>
<input type="text" name="username" placeholder="Enter username...">
</li>
<li>
Password*:<br>
<input type="password" name="password" placeholder="Enter password...">
</li>
<li>
Password again*:<br>
<input type="password" name="password_again" placeholder="Enter password again..."></li>
<li>
First name*:<br>
<input type="text" name="first_name" onkeypress="return onlyAlphabets(event,this);"  placeholder="Enter your firstname...">
</li>
<li>
Last name:<br>
<input type="text" name="last_name" onkeypress="return onlyAlphabets(event,this);"  placeholder="Enter your lastname...">
</li>
<li>
Email*:<br>
<input type="text" name="email" placeholder="Enter your e-mail...">

</li>
<li>
<input type="submit" value="Register">
</li>










</ul>
<?php
}
 include 'includes/overall/footer.php';?>
