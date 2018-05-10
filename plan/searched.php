<?php
include 'core/init.php';
protect_page();
include 'includes/overall/header.php';
$output = array();
$output1 = array();
global $count;
global $count1;
global $maker;
global $maker1;
$maker='';
$maker1='';
$count=0;
$count1=0;

?>

<div>
					<img src="flightBanner.jpg">
					</div>

<?php //include 'search_panel.php'; ?>				

<?php
if (isset($_POST['search'])) {

	
	
	
	
    $leaving_from = $_POST['Make']; // make value
	
    $going_to = $_POST['Make1'];
	$dd_date = $_POST['depart_date'];
	$rr_date = $_POST['return_date'];
    $maker = mysql_real_escape_string($_POST['selected_text']); // get the selected text
    $maker1 = mysql_real_escape_string($_POST['selected_text1']);
    $d_date = mysql_real_escape_string($_POST['depart_date']);
    $r_date = mysql_real_escape_string($_POST['return_date']);
	$adults = mysql_real_escape_string($_POST['selected_text2']);
	$child = mysql_real_escape_string($_POST['selected_text3']);
	$adult=$adults + $child;
	//session for adult
	session_start();
	$_SESSION['sessionvar'] = $adult;
	
    //echo $maker, $maker1;
    //echo $r_date; 
    //echo $dd_date, $rr_date, $leaving_from, $going_to;
}
 ?>
 
 <?php
 $value = '';
 if (isset($_POST['search']) ){
    switch($_POST['radio']) {
        case "1":
            $value = "round_trip";
            break;
        case "2":
            $value = "one_way";
            break;
      }
	  //echo $value;
 }
?>

<?php
//$output[] = '';
if (isset($_POST['search']) ){
//if (empty($_POST['leaving_from']) === false && empty($_POST['going_to']) === false ) {
	
	if ($value == "one_way") {
    //echo $maker, $maker1;
$d_date = date('y-m-d', strtotime($d_date)); //date format
//echo $d_date;
    
	$query = mysql_query("SELECT * FROM `members` WHERE leaving_from='$maker' AND going_to='$maker1' AND depart_date LIKE '%$d_date%'") or die("couldnot search data");
	$count = mysql_num_rows($query);
	//echo $count;
	
	if($count == 0) {
		$output = 'There was no search results!';
	} 
	else {
		//$output = mysql_query("SELECT * FROM `members` WHERE firstname LIKE '%$searchq%'");
		
		while($row = mysql_fetch_array($query)) {
			$from1 = $row['leaving_from'];
			$to1 = $row['going_to'];
			$flight_id = $row['flight_id'];
			$depart_date = $row['depart_date'];
			$return_date = $row['return_date'];
			$fare = $row['fare'];
			$time = $row['time'];
			$dest_time = $row['dest_time'];
			$output[] = $from1.' To '.$to1.' '."</br>".' '."</br>".' Depart date: '.$depart_date.' '."</br>".' '."</br>".' Depart time: '.$time.' '."</br>".' '."</br>".' Arrival time: '.$dest_time.' '."</br>".' '."</br>".' '."Price: ".' '.$fare.' '."</br>";
			
			 
			
		}
		


		
	}
	
}
 
else if ($value = "round_trip") {
	//$d_date ='';
	//echo $maker, $maker1;
	//echo $d_date;
	$d_date = date('y-m-d', strtotime($d_date)); //date format
	//$maker = '';
	//$maker1 = '';
	//echo $d_date;

	$query = mysql_query("SELECT * FROM `members` WHERE leaving_from='$maker' AND going_to='$maker1' AND depart_date LIKE '%$d_date%'") or die("couldnot search data");
	
	$count = mysql_num_rows($query);
	//echo $count;
	if($count == 0) {
		$output[] = 'There was no flights while going!';
	}
	else {
		//$output = mysql_query("SELECT * FROM `members` WHERE firstname LIKE '%$searchq%'");
	
		while($row = mysql_fetch_array($query)) {
			$from1 = $row['leaving_from'];
			$to1 = $row['going_to'];
			$flight_id = $row['flight_id'];
			$depart_date = $row['depart_date'];
			//$return_date = $row['return_date'];
			$fare = $row['fare'];
			$time = $row['time'];
			$dest_time = $row['dest_time'];
			
			//$output .= '<div>'.$from1.' '.$to1.' '."Rs:".' '.$fare.' '."</br>".' '.$depart_date.'</div>';
			$output[] = $from1.' To '.$to1.' '."</br>".' '."</br>".' Depart date: '.$depart_date.' '."</br>".' '."</br>".' Depart time: '.$time.' '."</br>".' '."</br>".' Arival time: '.$dest_time.' '."</br>".' '."</br>".' '."Price: ".' '.$fare.' '."</br>";
			
		}
	

	}

	
	//to come back
	//$r_date ='';
	$r_date = date('y-m-d', strtotime($r_date)); //date format
	//$maker = '';
	//$maker1 = '';
	  // echo $r_date;
	  // echo $count1;
	   

	$query = mysql_query("SELECT * FROM `members` WHERE leaving_from='$maker1' AND  going_to='$maker' AND depart_date LIKE '%$r_date%'") or die("couldnot search data");
	$count1 = mysql_num_rows($query);
	//echo $count1;
	if($count1 == 0) {
		$output1[] = 'There was no flights while coming!';
	}
	else {
		//$output = mysql_query("SELECT * FROM `members` WHERE firstname LIKE '%$searchq%'");
		
		while($row = mysql_fetch_array($query)) {
			$from1 = $row['leaving_from'];
			$to1 = $row['going_to'];
			$flight_id = $row['flight_id'];
			//$depart_date = $row['depart_date'];
			$return_date = $row['depart_date'];
			$fare = $row['fare'];
			$dest_time = $row['dest_time'];
			
			$output1[] = $from1.' To '.$to1.' '."</br>".' '."</br>".' Depart date: '.$return_date.' '."</br>".''."</br>".' Depart time: '.$time.' '."</br>".' '."</br>".' Arrival time: '.$dest_time.' '."</br>".' '."</br>".' '."Price: ".' '.$fare.' '."</br>";
			
		}

	}
	
}
			
else {
	$output[] = '';
	
}
}else{
	$output[] = 'please select the locations!';
}
	


?>
<?php
//echo output_errors($output);
//print_r("$output[]");

//echo '<pre>';
//print_r($output);
//echo '</pre>';


//print("$count");
?>


<form action="book.php" method="post">

<?php

//check
if ($value == "round_trip"){
echo '<h3>Going flights</h3>';
$i = 0;
if ($count > 0 ) {
	while ($i < $count) {
		$output[$i];
		echo '<input type="radio" name="hi" checked="checked" value="' . $output[$i] . '" >';
	echo $output[$i];
	
	echo '</br>';
		$i = $i+1;
	}
}
else{
	echo "No going flights are available...";
}


//returning flights printing
echo '<h3>Returning flights</h3>';
$j = 0;
if ($count1 > 0 ) {
	while ($j < $count1) {
		echo '<input type="radio" name="hii" checked="checked" value="' . $output1[$j] . '" >';
	echo $output1[$j]; 
	
	echo '</br>';
		$j = $j+1;
	}
}
else{
	echo "No returning flights are available...";
}
}//closing of round_trip
else{
	echo '<h3>Going flights</h3>';
$i = 0;
if ($count > 0 ) {
	while ($i < $count) {
		$output[$i];
		echo '<input type="radio" name="hi" checked="checked" value="' . $output[$i] . '" >';
	echo $output[$i];
	
	echo '</br>';
		$i = $i+1;
	}
}
else{
	echo "No going flights are available...";
}
}
?>

<br>
<?php
if ($count1 > 0 | $count > 0) {
echo '<input type="submit" value="Continue >>"/>';
}
?>
</form>

<?php include 'includes/overall/footer.php';?>