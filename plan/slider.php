<link rel="stylesheet" href="photo.css"/>
<script type="text/javascript" script src="jquery-2.1.4.min (1).js"></script>
<script type="text/javascript" script src="jquery.cycle.all.js"></script>
<script type="text/javascript">
$('#slider').cycle({
	fx:			'scrollHorz',
	timeout:		2000,
	next:"#next",
	prev:"#prev",
	pager:"#pager"
	
	
	
	});
</script>
<div id="hero">
					<div id="pager"></div>
					<div id="next"></div>
					<div id="prev"></div>
					<div id="slider">
						<div class="slider-items">
						<img src="img\s1.jpg"/>
						</div>

						<div class="slider-items">
						<img src="img\b.jpg"/>
						</div>


						<div class="slider-items">
						<img src="img\Emirates-1.jpg"/>
						</div>


						<div class="slider-items">
						<img src="img\c.jpg"/>
						</div>


						<div class="slider-items">
						<img src="img\e.jpg"/>
						</div>


						<div class="slider-items">
						<img src="img\f.jpg"/>
						
						</div>



					</div>
</div>