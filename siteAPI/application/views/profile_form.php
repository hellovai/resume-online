<div id="login_form">

	<h1>Change stuff, Fool!</h1>
    <?php 
	echo form_open('profile/update');
	echo form_input('email', $info->email);
	echo form_input('name', $info->name);
	echo form_password('old_pass', '');
	echo form_password('new_pass', '');
	echo form_password('new_pass_confirm', '');
	echo form_submit('submit', 'Update');
	echo form_close();
	?>
	
<?php echo validation_errors('<p class="error">'); ?>
<?php echo $success; ?>
</div><!-- end login_form-->
