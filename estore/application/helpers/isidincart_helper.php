<?php
/*
 * Given an id and a cart if there is an item with id matching the 
 * provided id, return true, otherwise return false.
 */
function isIdInCart($id, $cart) {
	foreach ($cart as $item) {
		if ($item['id'] == $id) {
			return true;
		}
	}
	return false;
}