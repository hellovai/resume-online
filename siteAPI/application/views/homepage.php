<div id="homepage" class="row-fluid">
	<div class="span3">
	<div class="well well-small">
	<div class="navbar navbar-inverse">
		<div class="navbar-inner">
			<a class="brand" href="cover">Cover Letters</a>
	  	</div>
	</div>
	<?php
		if(sizeof($covers)>0)
		{
			foreach($covers as $letter)
			{	
				echo form_open('cover/');
				echo form_hidden('cover_id', $letter->id);
				$attributes = array(
					"name" => "submit",
					"value" => $letter->title,
					"class" => "btn span11",
				);
				echo form_submit($attributes);
				echo anchor('cover/delete/' . $letter->id . '/site', '<i class="icon-remove icon"></i>', 'class="confirm"');
				echo form_close();
			}
		}
		else
			echo "<p>No Cover Letters!</p>";
	?><hr><?
    echo form_open('cover/create');
    $attributes = array(
    	"name" => "title",
    	"placeholder" => "New Cover Letter",
    	"class" => "span11",
    	"required"=> "",
    	"autocomplete" => "off"    
    );
	echo form_input($attributes);
	echo form_close();
	?>
	</div>
	
	<div class="well well-small">
	<div class="navbar navbar-inverse">
		<div class="navbar-inner">
			<a class="brand" href="reference">References</a>
	  	</div>
	</div>	
	<?php
		if(sizeof($references)>0)
		{
			foreach($references as $refs)
			{	
				echo form_open('reference/');
				echo form_hidden('ref_id', $refs->id);
				$attributes = array(
					"name" => "submit",
					"value" => $refs->name,
					"class" => "btn span11"
				);
				echo form_submit($attributes);
				echo form_close();
			}
		}
		else
			echo "<p>No References!</p>";
	?><hr><?
    echo form_open('#');
    $attributes = array(
    	"name" => "reference",
    	"placeholder" => "New Reference",
    	"class" => "span11",
    	"required"=> "",
    	"autocomplete" => "off"    
    );
	echo form_input($attributes);
	echo form_close();
	?>
	</div>
	<?php
	if(sizeof($documents)>0)
	{ ?>
	<div class="well well-small">
	<div class="navbar navbar-inverse">
		<div class="navbar-inner">
			<a class="brand" href="reference">Previous Resumes</a>
	  	</div>
	</div>	
<?
			foreach($documents as $docs)
			{	
				echo form_open('site/index');
				echo form_hidden('doc_id', $docs->id);
				echo form_submit('submit', $docs->title);
				echo form_close();
			}
?>
	</div>
	<? } ?>
</div>

<div class="span7">
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
		echo form_submit('action', 'Add Category');
		echo form_close();
	?>

	</div>
