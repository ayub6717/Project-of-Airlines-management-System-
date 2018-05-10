
<?php
include 'core/init.php';
include 'includes/overall/header.php';?>
<h2>Ticket cancellation</h2>
<form action="" method="post">
		<ul>

		<li>
		PIN*:<br>
		<input type="text" name="pin" required placeholder="Enter the given PIN...">
		</li>
		<li>
		<input type="submit" name="cancel" value="Proceed">
		</li>
		</ul>
</form>
<?php
if (isset($_POST['cancel'])) {
	$query = "SELECT * FROM passengers WHERE `pin` = '$_POST[pin]'";
    $result = mysql_query($query);


echo "Ticket has been cancelled!";
while($row = mysql_fetch_array($result)){ 
echo "&nbsp;<br> Dear&nbsp;";
echo '<b>';
echo $row['first_name'];
echo '</b>';
echo "! &nbsp;<BR>As per the <b>term and conditions </b> 23% amount will be deducted from the paid amount and you will be paid with RS.";

echo ($row['fare'] + $row['grand_fare']) -(($row['fare'] + $row['grand_fare'])*0.23);
echo '<br>';

}
mysql_query("DELETE FROM `passengers` WHERE `pin` = '$_POST[pin]'"); //or die(mysql_error());
	

	
	}
	?>

<?php include 'includes/overall/footer.php';?>