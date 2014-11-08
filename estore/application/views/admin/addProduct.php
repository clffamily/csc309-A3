<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
<title>Baseball Cards Store</title>
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap-theme.min.css">

<link rel = "stylesheet" href="<?= base_url();?>css/template.css">
<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
<script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>


</head>
<body>
<script>
$(document).ready(function () {
	$('li').removeClass();
	$('#<?= $taskbarLinkId ?>').addClass('active');
	$('li > a').click(function() {
		$('li').removeClass();
		$(this).parent().addClass('active');
	});
});
</script>

	<?php $this->load->view('templates/taskbar_admin.php')?>
	<div class="container-all">
	<?php 
	if (isset($message)) { 
	?>
	<div class="alert alert-warning" role="alert"><?= $message ?></div>
	<?php
	}
	?>
	<div class="jumbotron"> 
	<title>Add Products</title>
	<p>
	<?php $this->load->view('product/newForm.php')?>
	</div>
	</div>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
</body>

</html>
