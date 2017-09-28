<?php
	function addItemToShoppingCart($itemId) {
		if (isset($_COOKIE['shoppingCart_data'])) {
			$cookieValue = $_COOKIE['shoppingCart_data'];
			setcookie("shoppingCart_data", $cookieValue . '' . $itemId . ',', time() + 100000000, "/");
		} else
			setcookie("shoppingCart_data", '' . $itemId . ',', time() + 100000000, "/");
	}
	
	function deleteAllItemsFromShoppingCart() {
		if (isset($_COOKIE['shoppingCart_data']))
			setcookie("shoppingCart_data", '', time() - 100000000, "/");
	}
	
	function deleteItemFromShoppingCart($itemId) {
		if (isset($_COOKIE['shoppingCart_data'])) {
			$cookieValue = $_COOKIE['shoppingCart_data'];
			$splittedCookieValueArray = explode(',', $cookieValue);
			$cookieNewValue = '';
			for ($i = 0; $i < count($splittedCookieValueArray) - 1; $i++) {
				if ($splittedCookieValueArray[$i] != $itemId)
					$cookieNewValue .= $splittedCookieValueArray[$i] . ',';
			}
			setcookie("shoppingCart_data", $cookieNewValue, time() + 100000000, "/");
		}
	}
	
	function isItemAlreadyInShoppingCart($itemId) {
		if (isset($_COOKIE['shoppingCart_data'])) {
			$cookieValue = $_COOKIE['shoppingCart_data'];
			if ($cookieValue != '') {
				$splittedCookieValueArray = explode(',', $cookieValue);
				for ($i = 0; $i < count($splittedCookieValueArray) - 1; $i++) {
					if ($splittedCookieValueArray[$i] == $itemId)
						return true;
				}
			}
		}
		return false;
	}
	
	function getShoppingCartItemsCount() {
		if (isset($_COOKIE['shoppingCart_data'])) {
			$cookieValue = $_COOKIE['shoppingCart_data'];
			$splittedCookieValueArray = explode(',', $cookieValue);
			return count($splittedCookieValueArray) - 1;
		}
		return 0;
	}
?>
