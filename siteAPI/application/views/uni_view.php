<div id="uni_edit">

	<h1>Education</h1>
	<br />
    <?php 
    
    print_r($info);
    if(sizeof($info) > 0 )
    {
    	foreach($info as $cat)
    	{
    		echo form_open("resume/modify");
    		echo form_hidden('cat_id', $cat->cat_id);
    		echo form_hidden('order_id', $cat->order_id);
			echo form_input('name', $cat->name);
			echo "<br />";
			$attributes = array(
						"name" => "gpa",
						"placeholder" => "GPA",
						"value" => $cat->gpa
						);
 			echo form_input($attributes);
			$attributes = array(
						"name" => "degree",
						"placeholder" => "Degree",
						"value" => $cat->degree
						);
 			echo form_input($attributes);
 			$attributes = array(
						"name" => "description",
						"placeholder" => "Description",
						"value" => $cat->description
						);
 			echo form_textarea($attributes);
 			$attributes = array(
						"name" => "start",
						"placeholder" => "Start Date",
						"value" => $cat->start
						);
 			echo form_input($attributes);
			$attributes = array(
						"name" => "finish",
						"placeholder" => "End Date",
						"value" => $cat->finish
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
    
    
    $attributes = array(
    			"id" => "add"
    			);
    			
	echo form_open("resume/modify", $attributes);
	
	$attributes = array(
			"name" => "type_id",
			"value" => $type_id,
			"type" => "hidden"
			);
	echo form_input($attributes);
	$attributes = array(
			"name" => "cat_id",
			"value" => $cat_id,
			"type" => "hidden"
			);
	echo form_input($attributes);
	
	$attributes = array(
				"name" => "gpa",
				"placeholder" => "GPA",
				);
	echo form_input($attributes);
	$attributes = array(
				"name" => "degree",
				"placeholder" => "Degree",
				);
	echo form_input($attributes);
	$attributes = array(
				"name" => "description",
				"placeholder" => "Description",
				);
	echo form_textarea($attributes);
	$attributes = array(
				"name" => "start",
				"placeholder" => "Start Date",
				);
	echo form_input($attributes);
	$attributes = array(
				"name" => "finish",
				"placeholder" => "End Date",
				);
	echo form_input($attributes);
	echo form_submit('action', 'Add');
	echo form_close();		

	?>
</div><!-- end resume education_page-->
