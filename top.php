<?php include 'head.php'; ?>

<div class="header">
	<div class="header_top">
		<div class="wrap">
			<div class="logo">
				<a href="index.php">
					<img src="images/logo.png" alt="" />
				</a>
			</div>

			<?php include 'menu.php'; ?>

			<div class="clear"></div>
		</div>
	</div>

	<?php
		$atual = $_SERVER['PHP_SELF'];
		if( strpos($atual, 'index.php') ) {
	?>
		<!--start-image-slider---->
		<div class="image-slider">
			<ul class="rslides" id="slider1">
				<li><img src="images/slider3.jpg" alt="" /></li>
				<li><img src="images/slider2.jpg" alt="" /></li>
				<li><img src="images/slider1.jpg" alt="" /></li>
				<li><img src="images/slider4.jpg" alt="" /></li>
			</ul>
		</div>
		<!--End-image-slider---->
	<?php } ?>
</div>
