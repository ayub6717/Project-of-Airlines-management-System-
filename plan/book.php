<?php
include 'core/init.php';
protect_page();
check_book();
global $total;
global $out1;
$total = array();
$out1 = array();
include 'includes/overall/header.php';
?>
<script type="text/javascript">

  function checkForm(form)
  {
    
    if(!form.terms.checked) {
      alert("Please indicate that you accept the Terms and Conditions");
      form.terms.focus();
      return false;
    }
    return true;
  }

</script>

<?php
$passengers = $_SESSION['sessionvar'];
?>
<?php
$_SESSION['booked'] = $_POST['hi'];
$_SESSION['booked1'] = $_POST['hii'];




?>

<?php
$i=1;
if($passengers >0) {
	while ($i <= $passengers)
	{
		
echo "<h2>Please provide passenger $i details:</h2>";	
echo '<form action="payment.php" method="POST"  onsubmit="return checkForm(this);">
<ul>
<li>
Title:
<select>
<option>Mr.</option>
<option>Mrs.</option>
<option>Ms.</option>
</select>
</li>
<li>
First name*:<br>
<input type="text" required name="fname[]" onkeypress="return onlyAlphabets(event,this);"  placeholder="your firstname here...">
</li>
<li>
Last name*:<br>
<input type="text" required name="lname[]" onkeypress="return onlyAlphabets(event,this);"  placeholder="your lastname here...">
</li>
<li>
Passport No.:<br>
<input type="text" name="passport[]" placeholder="your passport No."></li>
<li>
Visa No.:<br>
<input type="text" name="visa[]" placeholder="your Visa No.">
</li>
<li>
Country:
<select>
<option>Bangladesh</option>
<option>Islamabad</option>
<option>India</option>
</select>
</li>
<li>
Address1*:<br>
<input type="text" required name="address1[]" placeholder="Enter your address...">
</li>
<li>
Address2:<br>
<input type="text" name="address2[]" placeholder="Enter your address2...">
</li>
<li>
Email*:<br>
<input type="text" required  placeholder="example@mail.com" name="email[]">

</li>
<li>
Contact*:<br>
<input type="number" required  name=contact[]" placeholder="Enter your contact No...">

</li>
<li>
PIN*:<br>
<input type="text" required name="pin[]" placeholder="Enter a PIN...">
</li>
 ';

//$j= $_POST['fname'].' '.$_POST['lname'];
//echo $j;
//$out1[$i] = $_POST['fname'];


$i = $i + 1;
	}			
?>
<li>
<li>
<input type="checkbox" name="terms" value="terms"> I agree the terms and conditions of your site.<br>
</li>
<input type="submit" value="Continue" name="continue">
</li>
</ul>

</form>
<?php

}else{
	echo"Please select the number passengers while searching the flight.&nbsp;&nbsp;&nbsp;"; 
	echo '<a href="flight.php">Goto flight page&nbsp;&nbsp;>></a>';

}

?>



	<?php
	
	$_SESSION['ticket'] = $_POST;
	
	
	?>			
<?php

include 'includes/overall/footer.php';?>
