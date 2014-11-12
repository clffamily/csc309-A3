<script type="text/javascript">

$(document).ready(function(){
	//Does shoppingCart exist in cookies
	var shoppingCart =  getCookie('shoppingCart');

	// Determine which items are in shopping cart and change 
	// their button class
	if (shoppingCart) {
		shoppingCart = JSON.parse(shoppingCart);
		$('.thumbnail').each(function() {
			for( var i = 0; i < shoppingCart.length; i++) {
				if (shoppingCart[i].id == parseInt($( this ).find('.shoppingcartproductid').html())) {
					$( this ).find('button').attr('class', 'btn btn-xs btn-success btn-group-sm');
					$( this ).find('button').html('Remove From Cart');
				}
			}
		});
	}
	else {
		shoppingCart = [];
	}

	// set badge on shopping cart link to number of types of card in cart
	$('#shoppingcart').find('.badge').html(shoppingCart.length);
	
	$('.thumbnail').find('button').click(function() {

		// Add card to cart by getting shopping cart adding card id to cart and then adding the cart
		// to cookies
		if($(this).attr('class') == 'btn btn-xs btn-primary btn-group-sm') {
			var shoppingCartItem = 	{
					id: $( this ).parent().parent().find('.shoppingcartproductid').html(),
					quantity: 1
					};
			shoppingCart.push(shoppingCartItem);
			setCookie('shoppingCart', JSON.stringify(shoppingCart));
			$( this ).attr('class', 'btn btn-xs btn-success btn-group-sm');
			$( this ).html('Remove From Cart');
			$('#shoppingcart').find('.badge').html(shoppingCart.length);
		}

		// Remove card from cart by getting shopping cart finding card with matching id and removing 
		// the card from the cart, then adding the cart to cookies
		else {
			for( var i = 0; i < shoppingCart.length; i++) {
				if (shoppingCart[i].id == parseInt($( this ).parent().parent().find('.shoppingcartproductid').html())) {
					shoppingCart.splice(i,1);
				}
			}
			setCookie('shoppingCart', JSON.stringify(shoppingCart));
			$( this ).attr('class', 'btn btn-xs btn-primary btn-group-sm');
			$( this ).html('Add to Cart');
			$('#shoppingcart').find('.badge').html(shoppingCart.length);
		}
	});

	$('.img').popover();
});
</script>

<div class="row">

<?php  	
		$this->load->helper('isIdInCart');
		foreach ($contentsdata as $product) {
	?>	
			
			<div class="col-xs-6 col-md-3">			
				<div  class="thumbnail">
					<img class="img" src="<?= base_url()?>images/product/<?= $product->photo_url?>" 
					data-content="<?= $product->description?>" data-toggle="popover" 
					data-placement="top" title="Description" data-trigger="hover"/>
					<div class = "caption">
						<h4><?= $product->name?></h4>
						<p>$<?= $product->price?></p>
					</div>
			    	<div class="btn-group">
					<button type="button" class="btn btn-xs btn-primary btn-group-sm" data-toggle="tooltip" data-placement="top"> 
					Add to Cart
					</button>
					</div>
					<div class="shoppingcartproductid"><?= $product->id?></div>
				</div>
				
    		</div>
	<?php 
		}
?>
	
</div>