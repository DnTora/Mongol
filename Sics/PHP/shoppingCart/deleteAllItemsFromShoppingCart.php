<?php
	if(isset($_POST['submit'])) {
		include_once 'functions_shoppingCart.php';
		deleteAllItemsFromShoppingCart();
		header('Location: ' . $_SERVER["HTTP_REFERER"]);
	}
	exit();
?>
