<?
//define some variables
$addr_options = array(
              'Home'    => 'Home',
              'Permanent'   => 'Permanent',
              'Current' => 'Current',
              'Business' => 'Business'
            );

$phn_options = array(
          'Home'    => 'Home',
          'Cell'   => 'Cell',
          'Fax' => 'Fax',
          'Business' => 'Business',
          'Other' => 'Other'
        );

?>


	<h2>Account Information</h2>
	<hr />
	<div class="well well-small span3" style="width:20%">
	<div class="navbar navbar-inverse">
		<div class="navbar-inner">
			<a class="brand span12 disabled" href="#">Profile</a>
	  	</div>
	</div>
    <?php 
	echo form_open('profile/update');
	$attributes = array(
  				"name" => "name",
  				"value" => $info->name,
  				"required" => "",
  				"class" => "span12"
  				);
	echo form_input($attributes);	
	$attributes = array(
  				"name" => "email",
  				"value" => $info->email,
  				"required" => "",
  				"class" => "span12"
  				);
	echo form_input($attributes);
	$attributes = array(
  				"name" => "old_pass",
  				"placeholder" => "Current Password",
  				"required" => "",
  				"class" => "span12"
  				);
 	echo form_password($attributes);
 	echo "<br />";
	$attributes = array(
  				"name" => "new_pass",
  				"placeholder" => "New Password",
  				"class" => "span12"
  				);
 	echo form_password($attributes);
    echo "<br />";
	$attributes = array(
  				"name" => "new_pass_confirm",
  				"placeholder" => "Confirm New Password",
  				"class" => "span12"
  				);
 	echo form_password($attributes);
 	echo "<br />";
	echo form_submit('submit', 'Update', 'class="btn btn-primary span12"');
	echo form_close();
	?>

	</div>
	<div class="well well-small span3">
	<div class="navbar navbar-inverse">
		<div class="navbar-inner">
			<a class="brand span12 disabled" href="#">Addresses</a>
	  	</div>
	</div>	
	<?foreach($address as $addr) { ?>
		<div class="span12">
		<?echo form_open('profile/modify/address/address');
		echo form_hidden('id',$addr->id);
		
		?>
		<select name="def" class="span10">
			<? foreach($addr_options as $key=>$option) {
					echo "<option value=\"$key\" ";
					if($key == $addr->def) echo 'selected="selected"';
					echo ">$option</option>";
				}
			?>
		</select><a href="profile/delete/address/<?= $addr->id?>"><i class="icon-remove"></i></a>
		<?		
		
		$attributes = array(
			"name" => "address",
			"value" => $addr->address,
			"required" => "",
			"class" => "span10 no-resize",
			"rows" => "3"
			);
		echo form_textarea($attributes);		

		//$attributes = array(
		//	"name" => "action",
		//	"value" => "Change",
		//	"class" => "span12 btn btn-primary"
		//	);
		// echo form_submit($attributes); 
		echo '<button name="action" value="Change" class="hide-button"><i class="icon-refresh"></i></button><hr />';
		echo form_close(); ?>
		</div>
	<? }
	echo form_open('profile/modify/address/address/add');
?>

		<select name="def" class="span11">
			<? foreach($addr_options as $key=>$option) {
					echo "<option value=\"$key\">$option</option>";
				}
			?>
		</select>
		
<?	$attributes = array(
			"name" => "address",
			"placeholder" => "New Address Here",
			"required" => "",
			"class" => "span11 no-resize",
			"rows" => "3"
			);
	echo form_textarea($attributes);
	$attributes = array(
			"name" => "action",
			"value" => "Add Address",
			"class" => "span12 btn btn-primary"
			);
	echo form_submit($attributes);
	echo form_close();
	?>
	</div>
	<div class="well well-small span3">
	<div class="navbar navbar-inverse">
		<div class="navbar-inner">
			<a class="brand span12 disabled" href="#">Websites</a>
	  	</div>
	</div>
	
<?	foreach($website as $web)
	{
		echo '<div class="span12">';
		echo form_open('profile/modify/website/url');
		echo form_hidden('id',$web->id);
		$attributes = array(
			"name" => "def",
			"value" => $web->def,
			"class" => "span10"
			);
		echo form_input($attributes);
		echo "<a href=\"profile/delete/website/$web->id\"><i class=\"icon-remove\"></i></a>";
		$attributes = array(
			"name" => "url",
			"value" => $web->url,
			"class" => "span10",
			"required" => ""
			);
		echo form_input($attributes);
		echo '<button name="action" value="Change" class="hide-button"><i class="icon-refresh"></i></button><hr />';
		echo form_close();
		echo "</div>";
	}
	echo form_open('profile/modify/website/url/add');
	$attributes = array(
			"name" => "def",
			"placeholder" => "Type",
			"class" => "span10"
			);
	echo form_input($attributes);
	$attributes = array(
			"name" => "url",
			"placeholder" => "Website Here",
			"class" => "span10",
			"required" => ""
			);
	echo form_input($attributes);	
	$attributes = array(
			"name" => "action",
			"value" => "Add Website",
			"class" => "span12 btn btn-primary"
			);
	echo form_submit($attributes);
	echo form_close();
	?>
	</div>
	
	<div class="well well-small span3">
	<div class="navbar navbar-inverse">
		<div class="navbar-inner">
			<a class="brand span12 disabled" href="#">Phone</a>
	  	</div>
	</div>	
	
	<?foreach($phone as $pho) //i like to eat yummy pho!
	{
		echo '<div class="span12">';
		echo form_open('profile/modify/phone/numbers');
		echo form_hidden('id',$pho->id);
?>

		<select name="def" class="span10">
			<? foreach($phn_options as $key=>$option) {
					echo "<option value=\"$key\" ";
					if($key == $pho->def) echo "selected";
					echo ">$option</option>";
				}
			?>
		</select><a href="profile/delete/phone/<?= $pho->id?>"><i class="icon-remove"></i></a>
		
<?		$attributes = array(
			"name" => "numbers",
			"value" => $pho->numbers,
			"class" => "span10",
			"required" => ""
			);
		echo form_input($attributes);
		echo '<button name="action" value="Change" class="hide-button"><i class="icon-refresh"></i></button><hr />';
		echo form_close();
		echo "</div>";
	}
	echo form_open('profile/modify/phone/numbers/add');
?>

		<select name="def" class="span10">
			<? foreach($addr_options as $key=>$option) {
					echo "<option value=\"$key\">$option</option>";
				}
			?>
		</select>
		
<?
	$attributes = array(
			"name" => "numbers",
			"placeholder" => "Number Here",
			"class" => "span10",
			"required" => ""
			);
	echo form_input($attributes);

	$attributes = array(
			"name" => "action",
			"value" => "Add Phone",
			"class" => "span12 btn btn-primary"
			);
	echo form_submit($attributes);
	echo form_close();
	 
	?>
	</div>

