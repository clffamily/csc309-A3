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
			tablestr += '<td> <div class="form-group">';
			tablestr += '<input type="text" pattern="\\d+" class="form-control quantity" ';
			tablestr += 'oninvalid="setCustomValidity(\'Please enter a positive numeric value\')" ';
			tablestr += 'onchange="try{setCustomValidity(\'\')}catch(e){}" ';
			tablestr += 'required= "" value ="'+ htmlEncode(shoppingCart[i].quantity) +'">';
			tablestr += '</div>' + '</td>';
		    tablestr += '<td><button type="button" class="btn btn-xs btn-success">' + 
			'Remove</button></td></tr>';
		}
		tablestr += '<tr>';
		tablestr += '<td></td><td colspan=2><ul class="list-group"><ul class="list-group">';
	    tablestr += '<li class="list-group-item disabled"><b>Total Price</b><div class="cartprice">'
		tablestr += getTotal(shoppingCart) + '</div></li></ul></td>';
		tablestr +=	'<td></td><td><input id="cartbutton" class="btn btn-primary cart" type="submit" value="Update Cart"></input></td>';
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
		tableStr = '<form id="cartinventory" role="form">';
		tableStr += '<div class="panel panel-default">';
		tableStr += '<div class="panel-heading"><h3>Cart Inventory</h3></div>';
		tableStr += '<table class="table cart">' + tableInteriorStr;
		tableStr += '</table></div></form>';
		
		$('.inventory').html(tableStr);
	}
	
	else {
		$('.inventory').html('<div class="alert alert-info" role="alert"><h3>Hey, you forgot something!</h3>' +
				'<p><b>Unfortunately, there are currently no items in your cart. Go back <a href="'+ 
				 '<?= base_url()?>' + '">here</a> and' 
				+ ' make a selection from the catalogue, and when you\'re ready to place an order, come back.</b></div>');
	}

	// Prevents form submission for cartinventory but still preserves validation messages
	$('#cartinventory').on( "submit", function( event ) {
    	if ( this.checkValidity && !this.checkValidity() ) {
        	$( this ).find( ":invalid" ).first().focus();
        	event.preventDefault();
        }
        return false;
     });

	 // Changes border color red for quantity field if it differs from original quantity value
	 $('.form-control.quantity').change(function() {
		if ($(this).val() != $(this).attr('value')) {
			$(this).css('border-color', 'red');
		}
		else {
			$(this).css('border-color', '#CCC');
		}
	 });
	
	//$('#cartbutton').click(function() {
		//var tablehtml = $(this).parent().parent().parent().html();

		//alert($('#cartinventory')[0]);
		
		//$('#cartinventory').checkValidity;
		
		//$('.form-control.quantity').each(function() {
			//$(this)[0].checkValidity();
		//});

		//return false;
		//$('.form-control.quantity').valid();
	//});
});


</script>

<div class="inventory"></div>