<?php
if (isIdInCart($product->id, $cartcontents))
{
	?>
						<div><a href="<?= base_url()?>store/removefromcart/<?= $product->id ?>">
						<button type="button" class="btn btn-xs btn-success remove" data-toggle="tooltip" data-placement="top" title="Remove from cart">
						Remove From Cart
						</button>
						</a></div>
						<?php
						}
						else
						{
						?>
						<div class="btn-group"><a href="<?= base_url()?>store/addtocart/<?= $product->id ?>">
						<button type="button" class="btn btn-xs btn-primary btn-group-sm add" data-toggle="tooltip" data-placement="top" title="Add to cart"> 
						Add to Cart
						</button>
						</a></div>
						<?php
						} 
						?>