<script type="text/javascript">
$(document).ready(function(){
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
					</div>
			    	
				</div>
				
    		</div>
	<?php 
		}
?>
	
</div>