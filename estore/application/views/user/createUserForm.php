<?php 
			$attributes = array('role' => 'form');
			echo form_open("accounts/create", $attributes);
?>
<div class="create-account">
<div class="form-group">
<label for="firstName">First Name</label>

<?php 
$firstname_type = array('type'=>'text', 'class'=>'form-control',
		'id'=>'firstname', 'name'=>'firstname', 'required'=>'', 'placeholder'=>'Enter your first name');
echo form_input($firstname_type);
?>

</div>
<div class="form-group">
<label for="lastName">Last Name</label>

<?php 
$lastname_type = array('type'=>'text', 'class'=>'form-control',
		'id'=>'lastname', 'name'=>'lastname', 'required'=>'', 'placeholder'=>'Enter your last name');
echo form_input($lastname_type);
?>

</div>
<div class="form-group">
<label for="login">Username</label>

<?php 
$username_type = array('type'=>'text', 'class'=>'form-control',
		'id'=>'username', 'name'=>'username', 'required'=>'', 'placeholder'=>'Enter a username');
echo form_input($username_type);
?>

</div>
<div class="form-group">
<label for="password">Password</label>

<?php 
$password_type = array('type'=>'password', 'class'=>'form-control',
		'id'=>'password', 'name'=>'password', 'required'=>'', 'placeholder'=>'Enter a password');
echo form_input($password_type);
?>

</div>
<div class="form-group">
<label for="email">Email</label>

<?php 
$email_type = array('type'=>'email', 'class'=>'form-control',
		'id'=>'email', 'name'=>'email', 'required'=>'', 'placeholder'=>'Enter an email');
echo form_input($email_type);
?>

</div>
<?php 
$submit_type = array('name'=>'createAccount', 'type'=>'button', 'class'=>'btn btn-default');
echo form_button($submit_type, 'Submit');
//echo form_submit($submit_type);
echo form_close();
?>
</div>