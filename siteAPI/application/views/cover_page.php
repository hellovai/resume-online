<h2 class="page_header">Cover Letters</h2>
<hr>

<div id="cover_titles" class="span3 well">
    <div class="fixed-height row-fluid">
    <?php 
    if(sizeof($titles) > 0 )
    {
    	$count = 0;
		foreach($titles as $title)
		{
		    echo form_open('cover/index');
		    echo form_hidden('cover_id', $title->id);
		    $attributes = array(
		    	'class' => "btn span10",
		    	'name' => "submit",
		    	'value' => $title->title,
		    );
		    if($count < 1 )
		    	$attributes['class'] .= " btn-primary";
		    	
			echo form_submit($attributes);
			echo anchor('cover/delete/' . $title->id, '<i class="icon-remove icon"></i>');
			echo form_close();
			$count++;
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
    	"style" => "width:100%",
    	"class" => "span10"
    );
	echo form_input($attributes);
	echo form_close();
	?>

</div><!-- end cover_titles-->

<div id="cover_edit" class="span8 pull-right">
	<? if(sizeof($titles) > 0) { ?>
    <?php
   	echo form_open('cover/save');
    echo form_hidden('id',$cover->id);
    echo "<p>" . form_input('title', $cover->title, 'style="border:none"') . " Last edited: " . $cover->updated . "</p>";
    $attributes = array(
    	"name" => "info",
    	"value" => $cover->info,
    	"style" => "width:100%"
    );    
	echo form_textarea($attributes);
	echo "<br />";
	echo form_submit('submit', 'Update');
	echo form_close();
	} ?>
</div><!-- end cover_edit-->
<div class ></div>
