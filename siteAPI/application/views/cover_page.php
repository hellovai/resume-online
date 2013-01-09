<div id="cover_titles">

	<h1>Cover Letters</h1>
    <?php 
    foreach($titles as $title)
    {
        echo form_open('cover/index');
        form_hidden('cover_id', $title->id);
		echo form_submit('submit', $title->title);
		echo form_close();
		echo "<br />";
    }
    echo form_open('cover/create');
	echo form_input('title', 'Title');
	echo form_submit('submit', 'Create New');
	echo form_close();
	?>

</div><!-- end cover_titles-->

<div id="cover_edit">

	<h1><?php echo $cover->id ?></h1>
	Last edited:
    <?php 
    echo $cover->updated . "<br />";
    echo $success . "<br />";
   	echo form_open('cover/save');
    form_hidden('id',$cover->id);
	echo form_input('title', $cover->title);
	echo form_textarea('info', $cover->info);
	echo form_submit('submit', 'Update');
	echo form_close();
	?>

</div><!-- end cover_edit-->
