<div id="homepage" class="row-fluid">
	
	<div class="well well-small span3" style="width:20%">
		<div class="navbar navbar-inverse">
			<div class="navbar-inner">
				<a class="brand full-width" href="<?= site_url('cover') ?>" rel="tooltip" title="Click to see all your cover letters">Cover Letters</a>
		  	</div>
		</div>
		<div class="fixed-small-height">
		<? if(sizeof($covers)>0)
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
		?></div><hr><?
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
	
	<div class="well well-small span3">
		<div class="navbar navbar-inverse">
			<div class="navbar-inner">
				<a class="brand full-width" href="#" >Resume</a>
		  	</div>
		</div>
		<div class="fixed-small-height">
		<?php if(sizeof($categories)>0)
			{
				foreach($categories as $cat)
				{
					echo form_open('resume');
					echo form_hidden('type_id', $cat->type_id);
					echo form_hidden('cat_id', $cat->cat_id);
					$attributes = array(
							"name" => "action",
							"value" => $cat->title,
							"class" => "span12 btn "
							);
					echo form_submit($attributes);
					echo form_close();
				}
			}
			else
				echo "<p>Your resume is empty!</p>";
		
			$options = array(
						'1' => "Education",
						'2' => "Experience",
						'3' => "Skills",
						'4' => "Honors",
						'5' => "Additional Categories"
						);

	    echo form_open('resume/modify_cats');
	    echo form_dropdown('type_id', $options, '');
		$attributes = array(
			"name" => "title",
			"placeholder" => "Title",
			"required"=> "",
			);
		echo form_input($attributes);
		$attributes = array(
					"name" => "action",
					"value" => "Add Category",
					"class" => "span4 btn btn-primary"
			echo form_open('resume/modify_cats');
			?>
			</div><hr /><div class="btn-group" data-toggle="buttons-radio">
			<? foreach($options as $key=>$option_name) { ?>
			  <button type="button" class="btn" style="width:20%" value="<?= $key ?>" rel="tooltip" data-title="<?= $option_name ?>"><i class="icon-<?= $option_name ?>"></i></button>
			<? } ?>
			  <input type="hidden" name="type_id" id="status" value="" required />
			</div>
			<?				
			$attributes = array(
						"name" => "title",
						"placeholder" => "New Category Name",
						"class" => "span12",
						"rel" => "tooltip",
						"data-title" => "New Category Name",
						"required" => "",
						);
			echo form_input($attributes);
			echo form_close();
		?>
	</div>
	
	<div class="well well-small span3" style="width:20%">
		<div class="navbar navbar-inverse">
			<div class="navbar-inner">
				<a class="brand full-width" href="<?= site_url('reference') ?>" rel="tooltip" title="Click to see all your references">References</a>
		  	</div>
		</div>	
		<div class="fixed-small-height">
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
		?></div><hr><?
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
	
	<div class="well well-small span3" style="width:20%">
		<div class="navbar navbar-inverse">
			<div class="navbar-inner">
				<a class="brand full-width" href="<?= site_url('history') ?>">Old Resume's</a>
		  	</div>
		</div>
		<div class="fixed-small-height">
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
	 	} else 
	 		echo "<p>No previously generated Resume's!</p>"?>
	 	</div><hr><?
		echo form_open('#');
		$attributes = array(
			"name" => "action",
			"value" => "Generate Resume",
			"class" => "btn btn-primary span12",  
		);
		echo form_submit($attributes);
		echo form_close(); 
		?>
	</div>
</div>
