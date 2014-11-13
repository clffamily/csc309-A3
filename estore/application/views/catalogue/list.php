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
						<p>$<?= number_format($product->price, 2)?></p>
					</div>
			    	<div class="btn-group">
					<button type="button" class="btn btn-xs btn-primary btn-group-sm"> 
					Add to Cart
					</button>
					</div>
					<div class="shoppingcartproductid"><?= $product->id?></div>
					<div class="shoppingcartproductname"><?= $product->name?></div>
					<div class="shoppingcartproductprice"><?= $product->price?></div>
					<div class="shoppingcartproductphoto"><?= $product->photo_url?></div>
				</div>
				
    		</div>
	<?php 
		}
?>
	
</div>