<?php
include 'core/init.php';
include 'includes/overall/header.php';?>
<?php
if(isset($_POST)){
if (empty($_POST) === false) {
	
	
	$name		= $_POST['name'];
	$email		= $_POST['email'];
	$text	= $_POST['text'];

	mysql_query("INSERT INTO feedback (name, email, message) VALUES ('$name', '$email', '$text')");
	}
}
else{
	echo "something wrong!";
}

?>
<h2>Contacts us</h2>
<img src="suk.PNG"  alt="Girl in a jacket" style="width:630px;height:330px;">

<!DOCTYPE html>
<html>
<head>
<style>
div.gallery {
    margin: 23px;
    border: 1px solid #ccc;
    float: left;
    width: 180px;
}

div.gallery:hover {
    border: 1px solid #777;
}

div.gallery img {

}

div.desc {
    padding: 10px;
    text-align: center;
}
</style>
</head>
<body>

<div class="gallery">
  <a target="_blank" href="ayub.jpg">
    <img src="ayub.jpg" alt="Trolltunga Norway" width="180" height="200">
  </a>
  <div class="desc">Md.Ayub</div>
  <div class="desc">+8801731357071</div>
  <div class="desc">ahmedohan6717@gmail.com</div>
</div>

</body>
</html>
<br>
<div>
<h2>we value your feedback!</h2>
			<form action="" method="post">
			<ul>
				
		
						<li>Name:<br>
						<input type="text" name="name" onkeypress="return onlyAlphabets(event,this);"  required placeholder="Your name here...">
						</li>
						
						<li>Email:<br>
						<input type="text" name="email" required placeholder="example@mail.com">
						</li>
						<li>Feedback:<br>
						<textarea rows="10" cols="28" name="text"> 
					    </textarea>
						</li>
						<input type="submit" value="submit"/>
				
						
			<ul>
			</form>
</div>			
<?php include 'includes/overall/footer.php';?>