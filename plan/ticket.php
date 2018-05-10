<style>
#main,td{
	padding-left:15px;
	padding-right:15px;
	border:1px;
}

</style>
<?php
include 'core/init.php';
protect_page();
check_book();
include 'includes/overall/header.php';
protect_page();
?>


<table border="1" style="width:68%">
  <tr>
    <td><h3 align="center">  Your E-Ticket as on <?php echo date("Y/m/d");?> </h3><br></td>
    
  </tr>
  <tr>
    <td><p>
	<h5>
To fly easy please present the E-Ticket with a valid photo identification at the airport and check-in counter. <br>
The check-in counters are open 3 hours prior to departure and close strictly 2 hours prior to departure. </h5>
</p></td>
    
  </tr>
</table>



<?php

echo '<table border="1" style="width:68%">

<tr><td id=main>First name</td>
    <td id=main>Last name</td>
    <td id=main>Passport</td>
    <td id=main>Visa</td>
	<td id=main>PIN</td>
	</tr>';
session_start();
$i=0;
while($i<=($_SESSION['sessionvar']*5)){
	//echo $_SESSION['ticket'][];
	//echo '<pre>';
	if($i %5==0)
		echo '<tr>';
	if($i %5==0)
		echo '</tr>';
	echo '<td>';
	print_r($_SESSION['ticket'][$i]);
	echo '</td>';
	
	
	
    //echo '</pre>';
	
   //var_dump(each($_SESSION['ticket'][$i]));

//foreach ($_SESSION['ticket'][$i] as $item) {
	//echo '<pre>';
// print_r($item);
 //echo '</pre>';
//}
$i = $i +1;
}
echo '<table>';
?>

<?php
echo '<table border="1" style="width:68%">';
echo '<tr>';
echo '<td>';
echo "From";
echo '</td>';
echo '<td>';
echo "To";
echo '</td>';
echo '<td>';
echo "Date";
echo '</td>';
echo '<td>';
echo "Dept time";
echo '</td>';
echo '<td>';
echo "Arrival time";
echo '</td>';
echo '<td>';
echo "Fare";
echo '</td>';


echo '</tr>';
echo '<tr>';
echo '<td>';
print_r($_SESSION['ticket1']);
echo '</td>';
echo '<td>';
print_r($_SESSION['ticket2']);
echo '</td>';
echo '<td>';
print_r($_SESSION['ticket3']);
echo '</td>';
echo '<td>';
print_r($_SESSION['ticket4']);
echo '</td>';
echo '<td>';
print_r($_SESSION['ticket5']);
echo '</td>';
echo '<td>';
print_r($_SESSION['ticket6']);
echo '</td>';
echo '</tr>';


echo '<tr>';
echo '<td>';
print_r($_SESSION['ticket11']);
echo '</td>';
echo '<td>';
print_r($_SESSION['ticket22']);
echo '</td>';
echo '<td>';
print_r($_SESSION['ticket33']);
echo '</td>';
echo '<td>';
print_r($_SESSION['ticket44']);
echo '</td>';
echo '<td>';
print_r($_SESSION['ticket55']);
echo '</td>';
echo '<td>';
print_r($_SESSION['ticket66']);
echo '</td>';
echo '</tr>';
echo '</table>';
?>

<table border="1" style="width:68%">
  <tr>
    <td> Please note:<br></td>
    
  </tr>
  <tr>
    <td> <h6> All Guests, including children and infants, must present valid identification at check-in. </h6> </td>
    </tr>
	
</table>
<a href="generate_ticket.php" target="_blank">Generate ticket</a>

<?php include 'includes/overall/footer.php';?>