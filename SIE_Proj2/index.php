<?php
	# To prevent direct access into other pages than index.php
	if(!isset($_COOKIE['cSession'])){
		setcookie('cSession',true,0,'/');
	}
	header ("Location: pages\Non_Auth_user\homepage.php");
?>

