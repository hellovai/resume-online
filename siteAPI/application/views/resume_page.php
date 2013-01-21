<div id="resume_page">

	<h1>Editing Resume:</h1>
	<br />
	
	<?php 
		$data['info'] = $info;
		$data['title'] = $title;
		$data['type_id'] = $type_id;
		$data['cat_id'] = $cat_id;
		
		$this->load->view($type . '_view', $data);

	?>

    	 
</div><!-- end reference_page-->
