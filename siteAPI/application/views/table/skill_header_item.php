<div class="span11">
	<p><?= $title ?><br />
	<font class="hideme">
	<? foreach($skills as $skill) { 
		$attributes = array(
			"name" => "skill[]",
			"value" => $skill->id,
			"checked" => TRUE,
			"class" => "pull-left",
			"style" => ""
		);
		echo form_checkbox($attributes);
	?>
		<font class="offset1"><?= $this->Resume_model->get_skill_name($skill->skill_id) ?></font><br />
	<? } ?>
	</font></p><hr />
</div>
