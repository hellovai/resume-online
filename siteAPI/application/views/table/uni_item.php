<div class="span11">
	<p><?= $name ?>
	<font class="pull-right"><?= $this->Common->html_date($date) ?></font><br />
	<font class="hideme">
	<? if(strlen($degree) > 0 ) { ?><?= $degree ?><br /> <? } ?>
	<? if(strlen($gpa) > 0 ) { ?>GPA:  <?= $gpa ?><br /><? } ?>
	<? if(strlen($description) > 0 ) { ?><?= $description ?><br /><? } ?>
	<? foreach($courses as $course) { 
		$attributes = array(
			"name" => "course_".$id."[]",
			"value" => $course->id,
			"checked" => FALSE,
			"class" => "pull-left",
			"style" => ""
		);
		echo form_checkbox($attributes);
	?>
		<font class="offset1"><?= $course->course ?></font><br />
	<? } ?>
	</font></p><hr />
</div>
