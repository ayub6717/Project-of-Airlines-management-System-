<?php
include 'core/init.php';
logged_in_redirect();
if (empty($_POST) == false) {
	$username = $_POST['username'];
	$password = $_POST['password'];
	if (empty($username) === true || empty($password) === true) {
		$errors[] = 'Enter username and password!';
	} else if (user_exists($username) === false) {
			$errors[] = 'Username does not exist!, have you registered?';
	} else if (user_active($username)=== false){
				
			$errors[] = 'account not activated';	
			}
			else{
				$login = login($username, $password);
				if ($login === false)
				{
					$errors[] = 'Username or password is wrong';
					
				}	
				else{
					$_SESSION['user_id'] = $login;
					header('location:index.php');
					exit();
				}
				}
				}
				else {
					
					$errors[]= 'no data received!';
					}
				
			
		
	
	

include 'includes/overall/header.php';
if (empty($errors) == false) {
?>
<h2>We tried to log you in, but...</h2>
<?php

	

echo output_errors($errors);
}
include 'includes/overall/footer.php';

?>