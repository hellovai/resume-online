
	<h2>Login</h2>
	<hr >
<div class="span3"></div>
	<div id="signup_form" class="span4 well">
    <?php 
	echo form_open('login/validate_credentials');
	$attributes = array(
		'class' => "span12",
		'name' => "email",
		'value' => set_value('email', ''),
		"placeholder" => "Email",
		"required" => "",
		"autofocus" => ""
		);
	echo form_input($attributes);
	$attributes = array(
		'class' => "span12",
		'name' => "password",
		"placeholder" => "Password",
		"required" => ""
		);
	echo form_password($attributes);
	$attributes = array(
		'class' => "span6 btn btn-primary span12",
		'name' => "submit",
		'value' => "Login",
		);
	echo form_submit($attributes);
	
	echo anchor('login/signup', 'Create Account', 'class="btn span6 pull-right"');
	echo form_close();
	?>
	</div>
<div class="span3"></div>
