<div class="tabbable span6">
	<a href="#" class="pull-right" rel="tooltip" data-original-title="Empty sections will be disabled!" data-placement="right"><i class="icon-question-sign"></i></a><br />
	<ul class="nav nav-pills">
		<li class="active"><a href="#tabprofile" data-toggle="tab">Profile</a></li>
	<?	foreach($category as $cat) {
		$class = "";
		$size = sizeof($details[$cat->cat_id]);
		if($size == 0)
			$class .= " disabled";
		echo '<li class="'.$class.'"><a href="#tab'.$cat->cat_id.'" data-toggle="tab" style="padding-left:25px;" class="new-icon-'.$cat->type_id.'">'.$cat->title.' ('.$size.')</a></li>';
	} ?>
	</ul>
	<hr />
	<div class="tab-content">
			<div class="tab-pane active" id="tabprofile">
				<p>Put profile info here</p>
			</div>
		<?	foreach($category as $cat) { ?>
			<div class="tab-pane" id="tab<?= $cat->cat_id ?>" style="overflow:hidden">
					<div class=""></div>
				<? $items = $details[$cat->cat_id]; 
					foreach($items as $item) {
					echo '<div class="span12">';
					$attributes = array(
						"name" => "newsletter",
						"value" => "accept",
						"checked" => TRUE,
						"class" => "pull-left",
						"style" => ""
					);
					echo form_checkbox($attributes);
					$str = '$this->Resume_model->write_'.$this->Common->type_table($cat->type_id).'($item);';
					eval($str);
					echo "</div>";
				} ?>
			</div>
		<? } ?>
	</div>
</div>
