<? $courses = $this->Resume_model->get_courses(); ?>
<div id="uni_edit" class="span12">
<div class="span5">
<?	echo form_open("resume/modify");
	$attributes = array(
				"name" => "name",
				"placeholder" => "School Name",
				"value" => $item->name,
				"class" => "span12",
    			 "rel" => "tooltip",
    			 "data-title" => "School Name",
    			 "required" => "",
				);
	echo form_input($attributes); 
	$attributes = array(
				"name" => "gpa",
				"placeholder" => "GPA",
				"value" => $item->gpa,
				"class" => "span12",
    			 "rel" => "tooltip",
    			 "data-title" => "GPA<br />Example: 3.200/4.000",
				);
	echo form_input($attributes);
	$attributes = array(
				"name" => "degree",
				"placeholder" => "Degree",
				"value" => $item->degree,
				"class" => "span12",
    			 "rel" => "tooltip",
    			 "data-title" => "Degree<br />Separate multiple degrees with ;",
				);
	echo form_input($attributes);
	$attributes = array(
				"name" => "description",
				"placeholder" => "Description",
				"value" => $item->description,
				"class" => "span12",
				"rows" => "4",
    			 "rel" => "tooltip",
    			 "data-title" => "Short description",
				);
	echo form_textarea($attributes);
	$this->Common->write_date($item->start, "start_month", "start_year", 12, "Join Year");
	$this->Common->write_date($item->finish, "finish_month", "finish_year", 12, "(Expected) Gradution Year");
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
	echo form_open('resume/add_course');
	$attributes = array(
		    	"name" => "title",
    			"placeholder" => "New courses's name",
    			"class" => "span12",
    			 "rel" => "tooltip",
    			 "data-title" => "Enter a course's name",
    			 "required"=> "",
				);
	echo form_input($attributes);
	echo form_close();
	echo "<hr />";
	if(sizeof($courses) > 0 ) {
		foreach($courses as $course) {
			$attributes = array(
				"value" => $course->course,
				"class" => "btn info_btn",
			);
			echo form_submit($attributes);
			echo anchor('resume/deleteitem/course/' . $course->id ,'<i class="icon-remove" style="margin-left:-25px;"></i>');
		}
	} else 
		echo "<p>You have no courses recorded!</p>"; ?>
</div>
</div>
