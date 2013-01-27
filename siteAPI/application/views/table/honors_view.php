<div id="honors_edit" class="span12">
<div class="span5">
<?	echo form_open("resume/modify");
	$attributes = array(
				"name" => "name",
				"placeholder" => "Honor Title",
				"value" => $item->name,
				"class" => "span12",
    			 "rel" => "tooltip",
    			 "data-title" => "Company Name",
    			 "required" => "",
				);
	echo form_input($attributes); 
	$attributes = array(
				"name" => "description",
				"placeholder" => "Description",
				"value" => $item->description,
				"class" => "span12",
    			 "rel" => "tooltip",
    			 "data-title" => "Description of your honor",
				"rows" => 4
				);
	echo form_textarea($attributes);
	$attributes = array(
				"name" => "location",
				"placeholder" => "Location",
				"value" => $item->location,
				"class" => "span12",
    			 "rel" => "tooltip",
    			 "data-title" => "Location of Award",
				);
	echo form_input($attributes);

	$this->Common->write_date($item->acquired, "start_month", "start_year", 12, "Year Acquired");
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
</div>
