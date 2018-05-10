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
	echo 'flight has been added successfully!';
}
else {
if (empty($_POST) === false && empty($errors) === true) {
	$register_data1 = array(
	'flight_name'		=> $_POST['flight_name'],
	'leaving_from'		=> $_POST['leaving_from'],
	'going_to'			=> $_POST['going_to'],
	'depart_date'		=> $_POST['depart_date'],
	'time'				=> $_POST['depart_time'],
	'dest_time'    		=> $_POST['arrival_time'],
	'fare'				=> $_POST['fare']
	
	
	
	);
	register_flight($register_data1);
	header('Location: addflights.php?success');
	exit();
	
}else if (empty($errors) === false) {
	echo output_errors($errors);
}

 ?>
		
		


<form action="" method="post">
<ul>
<li>
<h2>Add flights</h2>
</li>
<li>
Flight name*:<br>
<input type="text" name="flight_name" placeholder="Flight name...">
</li>
<li>
Leaving from*:<br>
<input type="text" name="leaving_from" placeholder="Source...">
</li>
<li>
Going to*:<br>
<input type="text" name="going_to" placeholder="Destination..."></li>
<li>
Departure date*:<br>
<input type="date" name="depart_date"placeholder="mm/dd/yyyy" >
</li>
<li>
Departure time*:<br>
<input type="time" name="depart_time" placeholder="hh:mm:ss">
</li>
<li>
Arrival time*:<br>
<input type="time" name="arrival_time" placeholder="hh:mm:ss">
</li>
<li>
Fare*:<br>
<input type="number" name="fare" placeholder="The amount...">

</li>
<li>
<input type="submit" value="Add flight">
</li>










</ul>


<?php
}

include 'includes/overall/footer.php'; ?>