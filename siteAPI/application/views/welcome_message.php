<div id="container">

	<div id="body" class="hero-unit min-padding span 12">
		
		
		<div id="signup_form" class="span4 well gray-back">
			<h2>Sign Up Now!</h2>
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
		
		<div class="span8 pull-right" style="text-align:right;">
			<h1> Resume Builder</h1>
			<p>With Resume Builder, you can easily make resumes, cover letters, and reference pages online for free.</p>
			<div><img src="http://placehold.it/500x200" class='welcome-image'/> </div>
		</div>

	</div>

</div>


