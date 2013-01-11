<div id="resume_page">

	<h1>Editing Resume:</h1>
	<br />
	
	<?php 
		$data['info'] = $info;
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
		$this->load->view($type . '_view', $data);

	?>

    	 
</div><!-- end reference_page-->
