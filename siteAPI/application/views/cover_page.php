<div id="cover_titles">

	<h1>Cover Letters</h1>
    <?php 
    if(sizeof($titles) > 0 )
    {
		foreach($titles as $title)
		{
		    echo form_open('cover/index');
		    echo form_hidden('cover_id', $title->id);
			echo form_submit('submit', $title->title);
			echo form_close();
		}
    }
    else
    {
    	echo "You don't have any cover letters!";
    }
    echo form_open('cover/create');
	echo form_input('title', 'Title');
	echo form_submit('submit', 'Create New');
	echo form_close();
	?>

</div><!-- end cover_titles-->

<div id="cover_edit">
	<? if(sizeof($titles) > 0) { ?>
	<h1><?php echo $cover->title ?></h1>
	Last edited:
    <?php 
    echo $cover->updated . "<br />";
   	echo form_open('cover/save');
    echo form_hidden('id',$cover->id);
	echo form_input('title', $cover->title);
	echo "<br />";
	echo form_textarea('info', $cover->info);
	echo "<br />";
	echo form_submit('submit', 'Update');
	echo form_close();
	} ?>

</div><!-- end cover_edit-->
