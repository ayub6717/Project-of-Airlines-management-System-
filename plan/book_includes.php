
<div class="widget">
                <h2> Flight details </h2>
			
                <div class="inner">
					<form action="" method="post">
				    <ul id="login">
					<li>
					<?php echo $_POST['hi']; ?>
					</li>
					<li>
					<?php
					$fare1 = $_POST['hi'];
					$pieces = explode(" ", $fare1);
					//echo $pieces[17];
					?>
					
					
					</li>
					
					<li>
					
					</li>
					
				
					<li>
					<?php echo $_POST['hii']; ?>
					</li>
					<li>
					<?php
					$fare2 = $_POST['hii'];
					$pieces1 = explode(" ", $fare2);
					//echo $pieces1[17];
					?>
					
					
					</li>
					<li>
					
					<?php 
			        //session_start();
					$grand_total = ($_SESSION['sessionvar']*$pieces[22] + $_SESSION['sessionvar']*$pieces1[21]);
			        echo "Total fare:";
			        //echo $_SESSION['sessionvar'];
			        echo $grand_total;
			
			        ?>
					
					</li>
					
					</ul>
				 </form>
                </div>
				</div>
				
