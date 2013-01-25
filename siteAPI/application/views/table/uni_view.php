<div id="uni_edit" class="span8">
<?	echo form_open("resume/modify");
	$attributes = array(
				"name" => "name",
				"placeholder" => "School Name",
				"value" => $item->name,
				"class" => "span7",
				);
	echo form_input($attributes); 
	$attributes = array(
				"name" => "gpa",
				"placeholder" => "GPA",
				"value" => $item->gpa,
				"class" => "span7",
				);
	echo form_input($attributes);
	$attributes = array(
				"name" => "degree",
				"placeholder" => "Degree",
				"value" => $item->degree,
				"class" => "span7",
				);
	echo form_input($attributes);
	$attributes = array(
				"name" => "description",
				"placeholder" => "Description",
				"value" => $item->description,
				"class" => "span7",
				);
	echo form_textarea($attributes);
	$this->Common->write_date($item->start, "start_month", "start_year", 7);
	$this->Common->write_date($item->finish, "finish_month", "finish_year", 7);
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
