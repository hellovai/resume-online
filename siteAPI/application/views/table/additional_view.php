<div id="additional_edit" class="span12">
<div class="span5">
<?	echo form_open("resume/modify");

	$attributes = array(
				"name" => "field",
				"placeholder" => "Write whatever you want here!",
				"value" => $item->field,
				"class" => "span12",
    			 "rel" => "tooltip",
    			 "data-title" => "Use the Additional section to add anything necessary",
				"rows" => 8
				);
	echo form_textarea($attributes);

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
