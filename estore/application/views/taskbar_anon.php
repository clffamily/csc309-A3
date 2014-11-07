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
				<li class="active"><a href="#">Catalogue</a></li>
				<li><a href="#">Shopping Cart <span class="badge">0</span></a></li>
				<li><a href="#">Checkout</a></li>
			</ul>
			<?php 
			$attributes = array('class' => 'navbar-form navbar-right', 'role' => 'form');
			echo form_open("main/login", $attributes);
			?>
			<div class="form-group">
          	<?php
          	
			//echo form_error('username');
			$username_type = array('type'=>'text', 'class'=>'form-control', 
					'id'=>'username', 'name'=>'username', 'required'=>'', 'placeholder'=>'Username');
			echo form_input($username_type); 
			?>
			</div>
			<div class="form-group">	
			<?php
			//echo form_error('password');
			$password_type = array('type'=>'text', 'class'=>'form-control',
					'id'=>'password', 'name'=>'password', 'required'=>'', 'placeholder'=>'Password');
			echo form_input($password_type);
			?>
			</div>
			<?php 
			$submit_type = array('type'=>'submit', 'class'=>'btn btn-default', 'value'=>'Sign in');
			echo form_submit($submit_type);
			echo form_close();
			?>
			<ul class="nav navbar-nav navbar-right">
				<li><a href="#">Create A New Account</a></li>
			</ul>
		</div>
		<!-- /.navbar-collapse -->
	</div>
	<!-- /.container-fluid -->
</nav>



