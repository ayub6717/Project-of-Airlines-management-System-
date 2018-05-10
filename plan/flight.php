<?php
include 'core/init.php';
protect_page();
include 'includes/overall/header.php';
//$output ='';
?>
 <script type="text/javascript">
        function display() {
			document.getElementById("datepicker1").style.display='block';
			document.getElementById("label1").style.display='block';
        }
		function hide() {
		document.getElementById("datepicker1").style.display='none';
		document.getElementById("label1").style.display='none';
		}
</script>
<h2>Flight booking  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <a href="cancelTicket.php">Ticket cancellation</a> </h2>
<div id="flights">

						<form action="searched.php" method="post">
						<input type="radio" value="1" name="radio" checked="checked" id="radio1" onclick="display()"></input>
						<label for="radio1">Round trip</label>
						<input type="radio" value="2" name="radio" id="radio2" onclick="hide()" ></input>
						<label for="radio2">One way</label>
						<div>
					
							<select id="cmbMake" name="Make"     onchange="document.getElementById('selected_text').value=this.options[this.selectedIndex].text">
									<option value="0" disabled="disabled" selected="selected" id="place">Leaving from...</option>
									<option value="1">Bangladesh</option>
									<option value="2">Bangalore</option>
									<option value="3">Islamabad</option>
									<option value="4">Singapore</option>
									<option value="5">New York</option>
									<option value="6">Paris</option>
									<option value="7">Chili</option>
									<option value="8">Mumbai</option>
							</select>
							<select id="cmbMake" name="Make1"     onchange="document.getElementById('selected_text1').value=this.options[this.selectedIndex].text">
									<option value="0" disabled="disabled" selected="selected" id="place">Going to...</option>
									<option value="1">Bangladesh</option>
									<option value="2">Bangalore</option>
									<option value="3">Islamabad</option>
									<option value="4">Singapore</option>
									<option value="5">New York</option>
									<option value="6">Paris</option>
									<option value="7">Chili</option>
									<option value="8">Mumbai</option>
							</select>
						
						</div>
						
						<p><label style="display:block" id="label0">Depart date:</label>
						<input type="text" name="depart_date"  id="datepicker" placeholder="Pick a date" /></p>
						<p><label style="display:block" id="label1">Return date:</label>
						 <input type="text" name="return_date"  id="datepicker1" placeholder="Pick a date" /></p>
						<div>
							<select id="cmbMake" name="adult" onchange="document.getElementById('selected_text2').value=this.options[this.selectedIndex].text">
										<option value="0" selected="selected" id="place">Adult</option>
										<option value="1">1</option>
										<option value="2">2</option>
										<option value="3">3</option>
										<option value="4">4</option>
										<option value="5">5</option>
										
							</select>
							<select id="cmbMake" name="children" onchange="document.getElementById('selected_text3').value=this.options[this.selectedIndex].text">
										<option value="0" disabled="disabled" selected="selected" id="place1">Children</option>
										<option value="1">1</option>
										<option value="1">2</option>
										<option value="1">3</option>
										<option value="1">4</option>
										<option value="1">5</option>
										
							</select>
						
						</div>
						<input type="hidden" name="selected_text" id="selected_text" value="" />
						<input type="hidden" name="selected_text1" id="selected_text1" value="" />
						<input type="hidden" name="selected_text2" id="selected_text2" value="" />
						<input type="hidden" name="selected_text3" id="selected_text3" value="" />
					
						<input type="submit" name="search" id="find" value="Search Flights"/>
						</form>
						</div>
					<div id="banner">
					<img src="banner1.jpg">
					</div>
		
					
					
<?php include 'includes/overall/footer.php';?>

