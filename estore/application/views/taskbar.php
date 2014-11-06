<?php
echo form_open_multipart('login');
?>

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
			<a class="navbar-brand" href="#">Baseball Cards</a>
		</div>

		<!-- Collect the nav links, forms, and other content for toggling -->
		<div id="navbar"
			class="navbar-collapse collapse">
			<ul class="nav navbar-nav">
				<li class="active"><a href="#">Catalogue</a></li>
				<li><a href="#">Shopping Cart</a></li>
				<li><a href="#">Checkout</a></li>
			</ul>
			<form class="navbar-form navbar-right" role="form">
			
          	<?php
			echo form_error('username');
			$username_type = array('type'=>'text', 'class'=>'form-control', 
					'name'=>'username', 'required'=>'', 'value'=>'Username');
			echo form_input($username_type,"required"); 
			?>
				
			<?php
			echo form_error('password');
			$password_type = array('type'=>'text', 'class'=>'form-control',
					'name'=>'password', 'required'=>'', 'value'=>'Password');
			echo form_input($password_type);
			?>
			<button type="submit" class="btn btn-success">Sign in</button>
			</form>
			<ul class="nav navbar-nav navbar-right">
				<li><a href="#">Create A New Account</a></li>
			</ul>
		</div>
		<!-- /.navbar-collapse -->
	</div>
	<!-- /.container-fluid -->
</nav>




