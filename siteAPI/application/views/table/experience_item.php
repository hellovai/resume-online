<div class="span11">
	<p><?= $company ?><? if(strlen($company) > 0 && strlen($position) > 0 ) echo ", "; ?><?= $position ?><br />
	<font class="hideme">
	<? if(strlen($location) > 0 ) { ?><?= $location ?><? } ?>
	<font class="pull-right"><?= $this->Common->html_date($start) ?> - <?= $this->Common->html_date($finish) ?> </font><br />
	<? foreach($phrases as $phrase) { 
		$attributes = array(
			"name" => "phrase_".$id."[]",
			"value" => $phrase->id,
			"checked" => FALSE,
			"class" => "pull-left",
			"style" => ""
		);
		echo form_checkbox($attributes);
	?>
		<font class="offset1"><?= $phrase->phrase ?></font><br />
	<? } ?>
	</font></p><hr />
</div>
