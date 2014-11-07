<nav class="navbar navbar-default" role="navigation">
	<div class="container-fluid">
		<!-- Brand and toggle get grouped for better mobile display -->
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed"
				data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span> <span
					class="icon-bar"></span> <span class="icon-bar"></span> <span
					class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="#">Baseball Cards Store</a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div id="navbar"
			class="navbar-collapse collapse">
			<ul class="nav navbar-nav">
				<li id="catalogue"><a href="#">Catalogue</a></li>
				<li><a href="#" id="shoppingcart">Shopping Cart <span class="badge">0</span></a></li>
				<li><a href="#" id="checkout">Checkout</a></li>
				<li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Admin <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="#">Add card</a></li>
            <li><a href="#">Edit cards</a></li>
            <li><a href="#">Remove orders</a></li>
            <li><a href="#">Remove users</a></li>
          </ul>
        </li>
			</ul>
			<?php 
			$attributes = array('class' => 'navbar-form navbar-right', 'role' => 'form');
			echo form_open("uservalidation/logout", $attributes);
			?>
			<?php 
			$submit_type = array('type'=>'submit', 'class'=>'btn btn-default', 'value'=>'Logout');
			echo form_submit($submit_type);
			echo form_close();
			?>
		</div>
		<!-- /.navbar-collapse -->
	</div>
	<!-- /.container-fluid -->
</nav>




