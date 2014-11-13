<script type="text/javascript">
$(document).ready(function(){
	function htmlEncode(value){
		return $('<div/>').text(value).html();
	}

	function htmlDecode(value){
		return $('<div/>').html(value).text();
	}

	function getTotal(shoppingCart) {
		var total = 0;
		for (var i=0; i < shoppingCart.length; i++) {
			price = parseFloat(shoppingCart[i].price);
			quantity = parseInt(shoppingCart[i].quantity);
			subtotal = price * quantity;
			total += subtotal
		}
		return "$" + total.toFixed(2);
	}

	function makeShoppingCartTable(shoppingCart) {
		tablestr = "<th></th><th>Name</th><th>Price</th><th>Quantity</th><th></th>";
		for (var i=0; i < shoppingCart.length; i++) {
			price = parseFloat(shoppingCart[i].price);
			tablestr += "<tr><td><img class = 'cartphoto' src='" + "<?= base_url() ?>" +"images/product/"; 
			tablestr += shoppingCart[i].photo + "'></td>";
			tablestr += "<td>" + htmlEncode(shoppingCart[i].name) + "</td>"; 
			tablestr += "<td>$" + price.toFixed(2) + "</td>";
			tablestr += '<td> <div class="form-group">' +
		    '<input type="text" class="form-control quantity" value ="'+ 
		    htmlEncode(shoppingCart[i].quantity) +'">' +
		    '</div>' + '</td>';
		    tablestr += '<td><button type="button" class="btn btn-xs btn-success">' + 
			'Remove</button></td></tr>';
		}
		tablestr += '<tr>';
		tablestr += '<td></td><td colspan=2><ul class="list-group"><ul class="list-group">';
	    tablestr += '<li class="list-group-item disabled"><b>Total Price</b><div class="cartprice">'
		tablestr += getTotal(shoppingCart) + '</div></li></ul></td>';
		tablestr +=	'<td></td><td><button type="button" class="btn btn-md btn-primary">Update Cart</button></td>';
	    tablestr += '</tr>';
		return tablestr;
	}

	
	
	var shoppingCart =  getCookie('shoppingCart');

	// Determine if shopping cart exists in cookies
	if (shoppingCart) {
		shoppingCart = JSON.parse(shoppingCart);
	}

	else {
		shoppingCart = " ";
	}

	//alert(makeShoppingCartTable(shoppingCart));

	if(shoppingCart[0] != undefined && shoppingCart[0].id != undefined) {
		tableInteriorStr = makeShoppingCartTable(shoppingCart);
		tableStr = '<div class="panel panel-default">';
		tableStr += '<div class="panel-heading"><h3>Cart Inventory</h3></div>';
		tableStr += '<table class="table cart">' + tableInteriorStr;
		tableStr += '</table></div>';
		
		$('.inventory').html(tableStr);
	}
	
	else {
		$('.inventory').html('<div class="alert alert-info" role="alert"><h3>Hey, you forgot something!</h3>' +
				'<p><b>Unfortunately, there are currently no items in your cart. Go back <a href="'+ 
				 '<?= base_url()?>' + '">here</a> and' 
				+ ' make a selection from the catalogue, and when you\'re ready to place an order, come back.</b></div>');
	}
	
});


</script>

<div class="inventory"></div>