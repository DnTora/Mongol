<?php
	if(isset($_POST['submit'])) {
		include_once 'functions_shoppingCart.php';
		$productNumber = $_POST['productNumber'];
		if(!empty($productNumber) && preg_match("/([0-9])/", $productNumber))
			deleteItemFromShoppingCart($productNumber);
		header('Location: ' . $_SERVER["HTTP_REFERER"]);
	}
	exit();
?>
