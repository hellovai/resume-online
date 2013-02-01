<h2 class="page_header">References</h2>
<hr>
<div id="cover_titles" class="span3 well">
    <div class="fixed-height row-fluid">
    <?php 
    if(sizeof($refs) > 0 )
    {
		foreach($refs as $title)
		{
		    echo form_open('reference');
		    echo form_hidden('ref_id', $title->id);
		    $attributes = array(
		    	'class' => "btn span12",
		    	'name' => "submit",
		    	'value' => $title->name,
		    );
		    if($title->id == $reference->id ) {
		    	$attributes['class'] .= " btn-primary";
		   		//$attributes['disabled'] = "";
		   	}
			
			echo form_submit($attributes);
			echo anchor('reference/delete/' . $title->id , '<i class="icon-remove icon"></i>', 'class="confirm"');
			echo form_close();
		}
    }
    else
    {
    	echo "<p>You don't have any references!</p>";
    }
    ?></div><hr><?
    echo form_open('reference/create');
    $attributes = array(
    	"name" => "name",
    	"placeholder" => "New Reference's name",
    	"class" => "span12",
    	"required"=> "",
    	"autocomplete" => "off"
    );
	echo form_input($attributes);
	echo form_close();
	?>

</div><!-- end cover_titles-->

<div class="span8 row-fluid"><div class="span12 row-fluid">
<? if(sizeof($refs) > 0) { 
   	echo form_open('reference/modify');
	echo '<div id="cover_edit" class="span5">';
	echo "<h5>Reference's Info</h5>";
	$attributes = array(
				"name" => "name",
				"value" => $reference->name,
				"placeholder" => "Reference Name",
				);
	echo form_input($attributes);
	$attributes = array(
				"name" => "company",
				"value" => $reference->company,
				"placeholder" => "Company Name"
				);
	echo form_input($attributes);
	$attributes = array(
				"name" => "email",
				"value" => $reference->email,
				"placeholder" => "Email Address"
				);
	echo form_input($attributes);
	$attributes = array(
				"name" => "phone",
				"value" => $reference->phone,
				"placeholder" => "Phone Number"

				);
	echo form_input($attributes);
	$attributes = array(
				"name" => "address",
				"value" => $reference->address,
				"placeholder" => "Mailing Address",
				"rows" => 4
				);
	echo form_textarea($attributes); 
	echo "</div>";
	echo '<div class="span6 pull-right">';
	echo '<h5>Personal Notes <a href="#" rel="tooltip" data-placement="top" data-original-title="Keep notes on your last communications with ' . $reference->name . '"><i class="icon-question-sign"></i></a></h5>';
	$attributes = array(
				"name" => "notes",
				"placeholder" => "Type your notes here",
				"value" => $reference->past_info,
    			"style" => "min-width:97%;max-width:97%;",
    			"rows" => 12,
    			"autofocus" => "",
				);
	echo form_textarea($attributes);
	echo "</div></div>";
    $attributes = array(
				"class" => "btn btn-primary span6 pull-right",
				'name' => "submit",
				'value' => 'Save Changes',
				);	
	echo form_submit($attributes);
	echo form_close();
} ?>
</div>
