<?php
include 'core/init.php';
//logged_in_redirect();
protect_page();
admin_protect();

include 'includes/overall/header.php';
?>



<nav>
                <ul>
                <li><a href="admin.php">Add admin</a></li>
                <li><a href="addflights.php">Add flight</a></li>
                <li><a href="modify.php">Modify flight</a></li>
                <li><a href="delete_flight.php">Delete flight</a></li>
                </ul>
</nav>
		<br>
		<br>
		
		
		
		
		
		
		
		
		
			<?php
 if(isset($_POST['search'])) {
	 $q = "SELECT * FROM members WHERE flight_id = $_POST[flight_id]";
	 $result = mysql_query($q);
	 $person = mysql_fetch_array($result);
							}
			?>
	<?php
if(empty($_POST) === false) {
	$required_fields = array('flight_name', 'leaving_from', 'going_to', 'depart_date', 'depart_time', 'arrival_time','fare');
	foreach($_POST as $key=>$value) {
		if (empty($value) && in_array($key, $required_fields) === true) {
			$errors[] = 'Fields marked with an asterisk are required';
			break 1;
		}
		
	}
}
?>	
				

		
<?php
if (isset($_GET['success']) && empty($_GET['success'])) {
	echo 'flight has been deleted successfully!';
}
else {
if (empty($_POST['delete']) === false && empty($errors) === true) {
	mysql_query("DELETE FROM `members` WHERE `flight_id` = '$_POST[flight_id]'"); //or die(mysql_error());
	header('Location: delete_flight.php?success');
	exit();
	
}else if (empty($errors) === false) {
	echo output_errors($errors);
}

 ?>
<form action="" method="post">
		<ul>

		<li>
		Enter the flight id to be deleted*:<br>
		<input type="text" name="flight_id" required placeholder="Enter the existing flight id...">
		</li>
		<li>
		<input type="submit" name="search" value="Extract data">
		</li>
		</ul>
</form>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
<ul>
<li>
<h2>Modify flight</h2>
</li>
<li>
Flight id*:<br>
<input type="text" name="flight_id" value="<?php echo $person['flight_id']; ?>">
</li>
<li>
Flight name*:<br>
<input type="text" name="flight_name" value="<?php echo $person['flight_name']; ?>">
</li>
<li>
Leaving from*:<br>
<input type="text" name="leaving_from" value="<?php echo $person['leaving_from']; ?>">
</li>
<li>
Going to*:<br>
<input type="text" name="going_to" value="<?php echo $person['going_to']; ?>"></li>
<li>
Departure date*:<br>
<input type="text" name="depart_date" value="<?php echo $person['depart_date']; ?>">
</li>
<li>
Departure time*:<br>
<input type="text" name="depart_time" value="<?php echo $person['time']; ?>">
</li>
<li>
Arrival time*:<br>
<input type="text" name="arrival_time" value="<?php echo $person['dest_time']; ?>">
</li>
<li>
Fare*:<br>
<input type="text" name="fare" value="<?php echo $person['fare']; ?>">

</li>
<li>
<input type="submit" name="delete" value="Delete flight">
</li>
</ul>
</form>
<?php
}
include 'includes/overall/footer.php'; ?>