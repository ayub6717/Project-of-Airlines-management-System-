
<?php
include 'core/init.php';
protect_page();
check_book();
include 'includes/overall/header.php';

 ?>



<?php
$passengers = $_SESSION['sessionvar'];

?>
<?php


?>
<?php
$pass = $_SESSION['booked'];
$pieces= explode(" ", $pass);

//echo $pieces[17];


$pass1 = $_SESSION['booked1'];
$pieces1= explode(" ", $pass1);
//echo $pieces1[0];
$grand_total = ($_SESSION['sessionvar']*$pieces[22] + $_SESSION['sessionvar']*$pieces1[21]);
echo '<h3> Make the payment of Tk.</h3>';
echo "<h2> $grand_total </h2>";	

if (isset($_POST['continue'])) {
	$j=0;
	while ($j < $passengers)
	{
	
$register_data2 = array(
	'first_name'		=> $_POST["fname"][$j],
	'last_name'			=> $_POST["lname"][$j],
	'passport'			=> $_POST["passport"][$j],
	'visa'				=> $_POST["visa"][$j],
	'address1'			=> $_POST["address1"][$j],
	'address2'			=> $_POST["address2"][$j],
	'email'				=> $_POST["email"][$j],
	'contact'    		=> $_POST["contact"][$j],
	'pin'    			=> $_POST["pin"][$j],
	'leaving_from'      => $pieces[0],
	'going_to'      	=> $pieces[2],
	'depart_date'       => $pieces[7],
	'depart_time'       => $pieces[12],
	'arrival_time'      => $pieces[17],
	'grand_fare'      	=> $pieces[22],
	'returning_from'    => $pieces1[0],
	'returning_to'      => $pieces1[2],
	'returning_date'    => $pieces1[7],
	'returning_time'    => $pieces1[11],
	'reaching_time'     => $pieces1[16],
	'fare'      		=> $pieces1[21]
	);
	//print_r($register_data2);
	//$_SESSION['ticket'][] = $register_data2;
session_start();
	$_SESSION['ticket'][] = $_POST["fname"][$j];
	$_SESSION['ticket'][] = $_POST["lname"][$j];
	$_SESSION['ticket'][] = $_POST["passport"][$j];
	$_SESSION['ticket'][] = $_POST["visa"][$j];
	$_SESSION['ticket'][] = $_POST["pin"][$j];
	register_passenger($register_data2);
  
	$j = $j+1;
	
}
	
$_SESSION['ticket1'] = $pieces[0];
$_SESSION['ticket2'] = $pieces[2];
$_SESSION['ticket3'] = $pieces[7];
$_SESSION['ticket4'] = $pieces[12];
$_SESSION['ticket5'] = $pieces[17];
$_SESSION['ticket6'] = $pieces[22];


$_SESSION['ticket11'] = $pieces1[0];
$_SESSION['ticket22'] = $pieces1[2];
$_SESSION['ticket33'] = $pieces1[7];
$_SESSION['ticket44'] = $pieces1[11];
$_SESSION['ticket55'] = $pieces1[16];
$_SESSION['ticket66'] = $pieces1[21];
	
}
?>
<?php
if (isset($_POST['pay'])){
if ($_POST['cash'] != $grand_total) {
echo "*Pay the given amount!"."<br>";
}
else{
header ('Location: ticket.php');
}
}
?>
<h2> Select payment method </h2>
<form action="payment.php" method="post">
<input type="radio" name="payment" id="cash" checked="checked" value="cash">
<label for="cash">Cash</label>
<input type="number" id="cash" name="cash" size="8"><br><br>


<input type="radio" name="payment" id="card" value="card">
<label for="card">Card</label>
<select>
<option>Debit card</option>
<option>Cridet card</option>
</select>
<br>
<img src="Credit.jpg">
<br>
<input type="submit" name="pay" value="Make payment">
</form>


<?php

 include 'includes/overall/footer.php';?>