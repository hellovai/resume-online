<div id="reference_page">

	<h1>References</h1>
	<br />
    <?php 
    if(sizeof($refs) > 0 )
    {
    	foreach($refs as $ref)
    	{
    		echo form_open('reference/modify');
    		echo form_hidden('id', $ref->id);
			echo form_input('name', $ref->name);
			echo "<br />";
			$attributes = array(
						"name" => "company",
						"placeholder" => "Company Name",
						"value" => $ref->company
						);
 			echo form_input($attributes);
			$attributes = array(
						"name" => "email",
						"placeholder" => "Email Address",
						"value" => $ref->email
						);
 			echo form_input($attributes);
			$attributes = array(
						"name" => "phone",
						"placeholder" => "Phone Number",
						"value" => $ref->phone
						);
 			echo form_input($attributes);
			$attributes = array(
						"name" => "address",
						"placeholder" => "Mailing Address",
						"value" => $ref->address
						);
 			echo form_input($attributes); 	
			echo form_submit('action', 'Update');
			echo form_submit('action', 'Delete');
			echo form_close();		 
			echo "<br />";			    		
    	}
    }
    else
    {
    	echo "<p>You don't have any references!</p>";
    }    		
    echo form_open('reference/create');
	$attributes = array(
				"name" => "name",
				"placeholder" => "Reference Name"
				);
	echo form_input($attributes);
	echo "<br />";	
	$attributes = array(
				"name" => "company",
				"placeholder" => "Company Name"
				);
	echo form_input($attributes);
	$attributes = array(
				"name" => "email",
				"placeholder" => "Email Address"
				);
	echo form_input($attributes);
	$attributes = array(
				"name" => "phone",
				"placeholder" => "Phone Number"

				);
	echo form_input($attributes);
	$attributes = array(
				"name" => "address",
				"placeholder" => "Mailing Address"
				);
	echo form_input($attributes); 	
	echo form_submit('submit', 'Create New Reference');
	echo form_close();		

	?>
</div><!-- end reference_page-->
