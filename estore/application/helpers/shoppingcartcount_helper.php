<?php
/*
 * Return a count of the number of objects in cart
 */
function shoppingCartCount($cart){
	if ($cart) {
		return count($cart);
	}
	else {
		return 0;
	}
}