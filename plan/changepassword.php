
<?php
include 'core/init.php';
protect_page();
if(empty($_POST) === false) {
	$required_fields = array('current_password', 'password', 'password_again');
	foreach($_POST as $key=>$value) {
		if (empty($value) && in_array($key, $required_fields) === true) {
			$errors[] = 'Fields marked with an asterisk are required';
			break 1;
		}
		
	}
	if (md5($_POST['current_password']) === $user_data['password']) {
	if (trim($_POST['password']) !== trim($_POST['password_again'])) {
		$errors[] = 'your new passwords do not match';
	}else if (strlen($_POST['password']) < 6) {
		$errors[] = 'your password must be at least 6 characters';
	}	
	}else {
		$errors[] = 'Your current password is incorrect';
	}
}


include 'includes/overall/header.php';?>
<h2>Change password</h2>
<?php  
if (isset($_GET['success']) && empty($_GET['success'])) {
	echo 'Your password has been changed successfully!';
}else{
if (empty($_POST) === false && empty($errors) === true) {
	
	change_password($session_user_id, $_POST['password']);
	header('Location: changepassword.php?success');
	
	
}else if (empty($errors) === false) {
	echo output_errors($errors);
}


?>

<form action="" method="post">
<ul>
<li>Current password*:<br>
<input type="password" name="current_password" placeholder="Enter current password...">

</li>
<li>New password*:<br>
<input type="password" name="password" placeholder="Enter new password..."></li>
<li>New password again*:<br>
<input type="password" name="password_again" placeholder="Enter new password again..."></li>
<input type="submit" value="change password">
</ul>

</form>


<?php 
}
include 'includes/overall/footer.php';
?>