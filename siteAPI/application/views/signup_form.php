<h1>Create an Account!</h1>
<fieldset>
<legend>Personal Information</legend>
<?php
   
echo form_open('login/create_member');

echo form_input('first_name', set_value('first_name', 'First Name'));
echo form_input('last_name', set_value('last_name', 'Last Name'));
?>
</fieldset>

<fieldset>
<legend>Login Info</legend>
<?php
echo form_input('email_address', set_value('email_address', 'Email Address'));
echo form_password('password', set_value('password', 'Password'));
echo form_password('password2', 'Password');

echo form_submit('submit', 'Create Acccount');
echo form_close();
?>

<?php echo validation_errors('<p class="error">'); ?>
</fieldset>
