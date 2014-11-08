<?php
	// verifica a url atual e,
	// se for verdadeira,
	// adiciona class="active" no menu
	function verifyUrl($file) {
		$current = $_SERVER['PHP_SELF'];
		$findme  = $file . '.php';

		if( strpos($current, $findme) ) {
			echo ' class="active" ';
		}

		return;
	}
?>
<div class="menu">
	<ul>
		<li <?php verifyUrl('index'); ?>>
			<a href="index.php">Home</a>
		</li>
		<li <?php verifyUrl('about'); ?>>
			<a href="about.php">About</a>
		</li>
		<li <?php verifyUrl('services'); ?>>
			<a href="services.php">Services</a>
		</li>
		<li <?php verifyUrl('404'); ?>>
			<a href="404.php">Clients</a>
		</li>
		<li <?php verifyUrl('contact'); ?>>
			<a href="contact.php">Contact</a>
		</li>

		<div class="clear"></div>
	</ul>
</div>
