<div id="homepage" class="row-fluid">
	<div class="span3">
	<div class="well well-small">
	<div class="navbar navbar-inverse">
		<div class="navbar-inner">
			<a class="brand full-width" href="<?= site_url('cover') ?>" rel="tooltip" title="Click to see all your cover letters">Cover Letters</a>
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
					"class" => "btn span12",
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
    	"class" => "span12",
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
			<a class="brand full-width" href="<?= site_url('reference') ?>" rel="tooltip" title="Click to see all your references">References</a>
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
					"class" => "btn span12"
				);
				echo form_submit($attributes);
				echo form_close();
			}
		}
		else
			echo "<p>No References!</p>";
	?><hr><?
    echo form_open('reference/create');
    $attributes = array(
    	"name" => "name",
    	"placeholder" => "New Reference's Name",
    	"class" => "span12",
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
			<a class="brand full-width" href="<?= site_url('history') ?>">| Previous Resumes</a>
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
				echo form_open('resume');
				echo form_hidden('type_id', $cat->type_id);
				echo form_hidden('cat_id', $cat->cat_id);
<<<<<<< HEAD
				echo form_submit('title', $cat->title);
=======
				$attributes = array(
						"name" => "action",
						"value" => $cat->title,
						"class" => "span4 btn "
						);
				echo form_submit($attributes);
>>>>>>> 86dc14d6a3c35ca9c96450c2df5bdfcdb708d379
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
		$attributes = array(
					"name" => "action",
					"value" => "Add Category",
					"class" => "span4 btn btn-primary"
					);
		echo form_submit($attributes);
		echo form_close();
	?>

	</div>
