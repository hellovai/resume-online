<div id="education_edit">

	<h1>Education</h1>
	<br />
    <?php 
    if(sizeof($info) > 0 )
    {
    	foreach($info as $cat)
    	{
    		echo form_open('resume/modify');
    		echo form_hidden('cat_id', $info->cat_id);
    		echo form_hidden('order_id', $info->order_id);
			echo form_input('name', $info->name);
			echo "<br />";
			$attributes = array(
						"name" => "gpa",
						"placeholder" => "GPA",
						"value" => $info->gpa
						);
 			echo form_input($attributes);
			$attributes = array(
						"name" => "degree",
						"placeholder" => "Degree",
						"value" => $info->degree
						);
 			echo form_input($attributes);
 			$attributes = array(
						"name" => "description",
						"placeholder" => "Description",
						"value" => $info->description
						);
 			echo form_textdata($attributes);
 			$attributes = array(
						"name" => "start",
						"placeholder" => "Start Date",
						"value" => $info->start
						);
 			echo form_input($attributes);
			$attributes = array(
						"name" => "finish",
						"placeholder" => "End Date",
						"value" => $info->finish
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
    	echo "<p>You don't have any education?!</p>";
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
