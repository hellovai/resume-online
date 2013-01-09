<div id="profile_form">

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
	
	<?php 
	foreach($address as $addr)
		{
		echo form_open('profile/modify/address/address');
		form_hidden('type','address');
		echo form_input('def', $addr->def);
		echo form_input('address', $addr->address);
		echo form_submit('action', 'Change');
		echo form_submit('action', 'Delete');
		echo form_close();
		}
	echo form_open('profile/modify/address/address');
	echo form_input('def', 'Type');
	echo form_input('address', 'Address Here');
	echo form_submit('action', 'Add');
	echo form_close();
	foreach($website as $web)
		{
		echo form_open('profile/modify/website/url');
		form_hidden('id',$web->id);
		form_hidden('type','website');
		echo form_input('def', $web->def);
		echo form_input('url', $web->url);
		echo form_submit('action', 'Change');
		echo form_submit('action', 'Delete');
		echo form_close();
		}
	echo form_open('profile/modify/website/url');
	form_hidden('type','website');
	echo form_input('def', 'Type');
	echo form_input('website', 'Website Here');
	echo form_submit('action', 'Add');
	echo form_close();
	foreach($phone as $pho) //i like to eat pho!
		{
		echo form_open('profile/modify/phone/numbers');
		form_hidden('id',$pho->id);
		form_hidden('type','address');
		echo form_input('def', $pho->def);
		echo form_input('numbers', $pho->numbers);
		echo form_submit('action', 'Change');
		echo form_submit('action', 'Delete');
		echo form_close();
		}
	echo form_open('profile/modify/phone/numbers');
	form_hidden('type','phone');
	echo form_input('def', 'Type');
	echo form_input('numbers', 'Number Here');
	echo form_submit('action', 'Add');
	echo form_close();
	?>
</div><!-- end login_form-->
