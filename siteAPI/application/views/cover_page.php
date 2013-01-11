<h2 class="page_header">Cover Letters</h2>
<hr>

<div id="cover_titles" class="span3 well">
    <div class="fixed-height row-fluid">
    <?php 
    if(sizeof($titles) > 0 )
    {
		foreach($titles as $title)
		{
		    echo form_open('cover');
		    echo form_hidden('cover_id', $title->id);
		    $attributes = array(
		    	'class' => "btn span12",
		    	'name' => "submit",
		    	'value' => $title->title,
		    );
		    if($title->id == $cover->id ) {
		    	$attributes['class'] .= " btn-primary";
		   		$attributes['disabled'] = "";
		   	}
			
			echo form_submit($attributes);
			echo anchor('cover/delete/' . $title->id, '<i class="icon-remove icon"></i>', 'class="confirm"');
			echo form_close();
		}
    }
    else
    {
    	echo "<p>You don't have any cover letters!</p>";
    }
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

</div><!-- end cover_titles-->

<div id="cover_edit" class="span8 pull-right">
	<? if(sizeof($titles) > 0) { 
   	echo form_open('cover/save');
    echo form_hidden('id',$cover->id);
    $attributes = array(
    	"name" => "title",
    	"value" => $cover->title,
    	"style" => "border:one",
    	"required"=> "",
    	);
    echo form_input($attributes);
	echo form_submit('submit', "Update", 'class="btn btn-primary pull-right span4"');
    $attributes = array(
    	"name" => "info",
    	"value" => $cover->info,
    	"class" => "pull-right",
    	"style" => "min-width:97%;max-width:97%;",
    	"rows" => "18",
    	"autofocus" => ""
    );    
	echo form_textarea($attributes);
	echo "<br />";
	echo "<p class='pull-right'>Last edited: " . $cover->updated . "</p>";
	echo form_close();
	} ?>
</div><!-- end cover_edit-->
<div class ></div>
