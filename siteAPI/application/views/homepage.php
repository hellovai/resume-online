<div id="homepage">

	<h1>Home</h1>
	<h2>Cover Letters</h2>
	<?php
		if(sizeof($covers)>0)
		{
			foreach($covers as $letter)
			{	
				echo form_open('cover/');
				echo form_hidden('cover_id', $letter->id);
				echo form_submit('submit', $letter->title);
				echo form_close();
			}
		}
		else
			echo "<p>You don't have any Cover Letters!</p>";
	?>
	
	<h2>References</h2>
	<?php
		if(sizeof($references)>0)
		{
			foreach($references as $refs)
			{	
				echo form_open('reference/');
				echo form_hidden('ref_id', $refs->id);
				echo form_submit('submit', $refs->name);
				echo form_close();
			}
		}
		else
			echo "<p>You don't have any References!</p>";
	?>
	
	<h2>Old Resumes</h2>
	<?php
		if(sizeof($documents)>0)
		{
			foreach($documents as $docs)
			{	
				echo form_open('site/index');
				echo form_hidden('doc_id', $docs->id);
				echo form_submit('submit', $docs->title);
				echo form_close();
			}
		}
		else
			echo "<p>You don't have any Old Resumes!</p>";
	?>
	
	<h2>Resume</h2>
	<?php
		if(sizeof($categories)>0)
		{
			foreach($categories as $cat)
			{
				echo form_open('site/index');
				echo form_hidden('cat_id', $cat->type_id);
				echo form_submit('submit', $cat->title);
				echo form_close();
			}
		}
		else
			echo "<p>Why do you have no categories...</p>";
		
		$options = array(
					'' => "Select Category",
					'1' => "Education",
					'2' => "Experience",
					'3' => "Skills",
					'4' => "Honors",
					'5' => "Additional Categories"
					);
		
	    echo form_open('resume/modify_cats');
	    echo form_dropdown('type_id', $options, '');
		echo form_input('title', 'Title');
		echo form_input('order_id', 'Order');
		echo form_submit('action', 'Add Category');
		echo form_close();
	?>
	
</div>
