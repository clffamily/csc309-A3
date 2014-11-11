<script type="text/javascript">
$(document).ready(function(){
	$('.img').popover();  
});
</script>

<div class="row">


<?php  		
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
						<div><a href="#" class="btn btn-primary" role="button">Add to Chart</a></div>
						
					</div>
			    	
				</div>
				
    		</div>
	<?php 
		}
?>
	
</div>