<div id="resume_page">

	<h1>Editing</h1>
	<br />
	
	<?php 
		$data['info'] = $info;
		$data['type_id'] = $type_id;
		$data['type_id'] = $cat_id;

		$this->load->view($type . '_view', $data);

	?>

    	 
</div><!-- end reference_page-->
