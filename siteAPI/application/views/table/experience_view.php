<? $phrases = $this->Resume_model->get_phrases(); ?>
<div id="experience_edit" class="span12">
<div class="span5">
<?	echo form_open("resume/modify");
	$attributes = array(
				"name" => "company",
				"placeholder" => "Company Name",
				"value" => $item->company,
				"class" => "span12",
    			 "rel" => "tooltip",
    			 "data-title" => "Company Name",
    			 "required" => "",
				);
	echo form_input($attributes); 
	$attributes = array(
				"name" => "position",
				"placeholder" => "Position",
				"value" => $item->position,
				"class" => "span12",
    			 "rel" => "tooltip",
    			 "data-title" => "Position at Company",
				"required" => "",
				);
	echo form_input($attributes);
	$attributes = array(
				"name" => "location",
				"placeholder" => "Location",
				"value" => $item->location,
				"class" => "span12",
    			 "rel" => "tooltip",
    			 "data-title" => "Location of Company",
				);
	echo form_input($attributes);

	$this->Common->write_date($item->start, "start_month", "start_year", 12, "Join Year");
	$this->Common->write_date($item->finish, "finish_month", "finish_year", 12, "Leave Year");
	$attributes = array(
				"class" => "btn btn-primary span7",
				'name' => "action",
				'value' => 'Update',
				);
	echo form_submit($attributes);   
#	$attributes = array(
#				"class" => "btn span7",
#				'name' => "action",
#				'value' => 'Delete',
#				);	
#	echo form_submit($attributes);
	echo form_close(); ?>
</div>
<div class="offset1 span6">
	<?
	echo form_open('resume/add_phrase');
	$attributes = array(
		    	"name" => "phrase",
    			"placeholder" => "New description",
    			"class" => "span12",
    			 "rel" => "tooltip",
    			 "data-title" => "Enter a bullet point for this position",
    			 "required"=> "",
				);
	echo form_input($attributes);
	echo form_close();
	echo "<hr />";
	if(sizeof($phrases) > 0 ) 
	{
		foreach($phrases as $phrase) 
		{
		echo form_open('resume/update_phrase/' . $phrase->id);
			$attributes = array(
				"name" => "phrase",
				"value" => $phrase->phrase,
				"class" => "hover-only-border span12",
				//"style" => "margin:5px; padding-right:25px; cursor:default",
			);
			echo form_input($attributes);
			echo anchor('resume/deleteitem/phrase/' . $phrase->id ,'<i class="icon-remove" style="margin-left:-25px;"></i>');
			echo "<br />";
		echo form_close();
		}
	} 
	else 
		echo "<p>You have no phrases recorded!</p>"; ?>
</div>
</div>
