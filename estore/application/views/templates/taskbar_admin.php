<nav class="navbar navbar-default" role="navigation">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed"
				data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span> <span
					class="icon-bar"></span> <span class="icon-bar"></span> <span
					class="icon-bar"></span>
			</button>
			<div class="navbar-brand"><b>Baseball Cards Shop</b></div> 
			<div class="navbar-brand">
			<img alt="Brand" class="img-responsive" src="<?= base_url(); ?>/images/glyphicons_311_baseball.png">
			</div>
		</div>

		<!-- These are the taskbar elements, this is similar to the normal user taskbar, except that is has
			 a dropdown admin menu -->
		<div id="navbar"
			class="navbar-collapse collapse">
			<ul class="nav navbar-nav">
				<li id="catalogue"><?php echo anchor("/",'Catalogue') ?></li>
				<li id="shoppingcart"><?php echo anchor("main/shoppingcart",'Shopping Cart <span class="badge">0</span>') ?></li>
				<li id="admin" class="dropdown">
          <a  href="#" class="dropdown-toggle" data-toggle="dropdown">Admin <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            
            <li><?php echo anchor('admin/addProduct','Add Products') ?></li>
            <li><?php echo anchor('admin/editProduct','Edit Products') ?></li>
            <li><?php echo anchor('admin/getOrders','Remove Orders') ?></li>
            <li><?php echo anchor('admin/getUsers','Remove Users') ?></li>
          </ul>
        </li>
			</ul>
			<?php 
			$attributes = array('class' => 'navbar-form navbar-right', 'role' => 'form');
			echo form_open("accounts/logout", $attributes);
			?>
			<?php 
			$submit_type = array('type'=>'submit', 'class'=>'btn btn-default', 'value'=>'Logout');
			echo form_submit($submit_type);
			echo form_close();
			?>
		</div>
	</div>
</nav>




