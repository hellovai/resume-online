<h2>Create an Account!</h2>
<hr />
<div class="span3"></div>
<div id="signup_form" class="span4 well">
	<?php
	   
	echo form_open('login/create_member');
	$attributes = array(
					'class' => "span12",
					'name' => "first_name",
					'value' => set_value('first_name', ''),
					"placeholder" => "First Name",
					"required" => ""
					);
	echo form_input($attributes);
	$attributes = array(
					'class' => "span12",
					'name' => "last_name",
					'value' => set_value('last_name', ''),
					"placeholder" => "Last Name",
					"required" => ""
					);
	echo form_input($attributes);

	$attributes = array(
					'class' => "span12",
					'name' => "email_address",
					'value' => set_value('email_address', ''),
					"placeholder" => "Email Address",
					"required" => ""
					);
	echo form_input($attributes);	
	
	
	$attributes = array(
					'class' => "span12",
					'name' => "password",
					'value' => set_value('password', ''),
					"placeholder" => "Password",
					"required" => ""
					);
	echo form_password($attributes);
	
	$attributes = array(
					'class' => "span12",
					'name' => "password2",
					'value' => set_value('password2', ''),
					"placeholder" => "Confirm Password",
					"required" => ""
					);
	echo form_password($attributes);
    $attributes = array(
					"class" => "btn btn-primary span12",
					'name' => "submit",
					'value' => 'Create Account'
					);	
	echo form_submit($attributes);
	echo form_close();
	echo validation_errors('<p class="error">'); 
	?>
</div>
<div class="span3"></div>

