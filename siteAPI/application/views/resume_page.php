<div id="resume_page">

	<h1>Editing Resume:</h1>
	<br />
	
	<?php 
		$data['info'] = $info;
<<<<<<< HEAD
		$data['title'] = $title;
		$attributes = array(
				"name" => "type_id",
				"value" => $type_id,
				"type" => "hidden",
				"form" => "add"
				);
		echo form_input($attributes);
		$attributes = array(
				"name" => "cat_id",
				"value" => $cat_id,
				"type" => "hidden",
				"form" => "add"
				);
		echo form_input($attributes);
=======
		$data['type_id'] = $type_id;
		$data['type_id'] = $cat_id;

>>>>>>> 52e2e0b53868876542e41f56a5122a5c097c1900
		$this->load->view($type . '_view', $data);

	?>

    	 
</div><!-- end reference_page-->
