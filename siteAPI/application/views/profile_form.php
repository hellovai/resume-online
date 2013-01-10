<div id="profile_form">

	<h1>Change stuff, Fool!</h1>
		<h2>Account Information</h2>
		<br />
    <?php 
	echo form_open('profile/update');
	echo form_input('name', $info->name);
	echo "<br />";
	echo form_input('email', $info->email);
	echo "<br />";
	$attributes = array(
  				"name" => "old_pass",
  				"placeholder" => "Current Password"
  				);
 	echo form_password($attributes);
 	echo "<br />";
	$attributes = array(
  				"name" => "new_pass",
  				"placeholder" => "New Password"
  				);
 	echo form_password($attributes);
    echo "<br />";
	$attributes = array(
  				"name" => "new_pass_confirm",
  				"placeholder" => "Confirm New Password"
  				);
 	echo form_password($attributes);
 	echo "<br />";
	echo form_submit('submit', 'Update');
	echo form_close();
	

	
	echo "<h2>Addresses</h2><br />";
	foreach($address as $addr)
	{
		echo form_open('profile/modify/address/address');
		echo form_hidden('id',$addr->id);
		$options = array(
                  ''  => '',
                  'Home'    => 'Home',
                  'Permanent'   => 'Permanent',
                  'Current' => 'Current',
                  'Business' => 'Business'
                );
		echo form_dropdown('def', $options, $addr->def);
		echo form_input('address', $addr->address);
		echo form_submit('action', 'Change');
		echo form_submit('action', 'Delete');
		echo form_close();
	}
	echo form_open('profile/modify/address/address');
	$options = array(
              ''  => '',
              'Home'    => 'Home',
              'Permanent'   => 'Permanent',
              'Current' => 'Current',
              'Business' => 'Business'
            );
	echo form_dropdown('def', $options, '');
	$attributes = array(
			"name" => "address",
			"placeholder" => "Address Here"
			);
	echo form_input($attributes);
	echo form_submit('action', 'Add');
	echo form_close();
	
	echo "<h2>Websites</h2><br />";
	foreach($website as $web)
	{
		echo form_open('profile/modify/website/url');
		
		echo form_hidden('id',$web->id);
		echo form_input('def', $web->def);
		echo form_input('url', $web->url);
		echo form_submit('action', 'Change');
		echo form_submit('action', 'Delete');
		echo form_close();
	}
	echo form_open('profile/modify/website/url');
	$attributes = array(
			"name" => "def",
			"placeholder" => "Type"
			);
	echo form_input($attributes);
	$attributes = array(
			"name" => "url",
			"placeholder" => "Website Here"
			);
	echo form_input($attributes);
	echo form_submit('action', 'Add');
	echo form_close();
	echo "<h2>Phone Numbers</h2><br />";
	
	echo validation_errors('<p class="error">'); 
	
	foreach($phone as $pho) //i like to eat yummy pho!
	{
		echo form_open('profile/modify/phone/numbers');
		echo form_hidden('id',$pho->id);
		$options = array(
                  ''  => '',
                  'Home'    => 'Home',
                  'Cell'   => 'Cell',
                  'Fax' => 'Fax',
                  'Business' => 'Business',
                  'Other' => 'Other'
                );
		echo form_dropdown('def', $options, $pho->def);
		echo form_input('numbers', $pho->numbers);
		echo form_submit('action', 'Change');
		echo form_submit('action', 'Delete');
		echo form_close();
	}
	echo form_open('profile/modify/phone/numbers');
	$options = array(
              ''  => '',
              'Home'    => 'Home',
              'Cell'   => 'Cell',
              'Fax' => 'Fax',
              'Business' => 'Business',
              'Other' => 'Other'
            );
	echo form_dropdown('def', $options, '');
	$attributes = array(
			"name" => "numbers",
			"placeholder" => "Number Here"
			);
	echo form_input($attributes);

	echo form_submit('action', 'Add');
	echo form_close();
	 
	?>
</div><!-- end profile_form-->
