<?php
include 'core/init.php';
logged_in_redirect();
include 'includes/overall/header.php';

if (isset($_GET['success']) === true && empty($_GET['success']) === true) {
?>
<h2>Thanks,we've activated your account...</h2>
<p>you're free to login.</p>
<?php

} else if (isset($_GET['email'], $_GET['email_code']) === true) {
	$email = trim($_GET['email']);
	$email_code = trim($_GET['email_code']);
	
	if (email_exists($email) === false) {
		$errors[] = 'oops, something wrong, and we couldn\'t find that email address!';
		
	}else if (activate($email, $email_code) === false) {
		$errors[] = ' we had problems activating your account';
	}
	if (empty($errors) === false) {
	?>
	<h2>Oops.....</h2>
	<?php 
	echo output_errors($errors);
	}else {
		header('Location: activate.php?success');
		exit();
	}
	
	
}else {
	header('Location: index.php');
	exit();
}
include 'includes/overall/footer.php';
?>