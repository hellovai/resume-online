<? echo form_open('generate/preview'); ?>
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
				<p>Name: <b><?= $info->name ?></b></p>
				<p>Email: <b><?= $info->email ?></b></p>
				<p>Address:	<? if(sizeof($address) == 0) echo "None on record"; else echo "<br />"; ?><?
					foreach($address as $addr) {
							$data = array(
								'name'        => 'profile_addr[]',
								'id'          => 'profile_addr',
								'value'       => $addr->id,
								'checked'     => TRUE,
								'style'       => 'margin:10px',
								);
								echo form_radio($data);
								echo "$addr->address ( $addr->def ) <br />";
					}
				?> 
				</p>
				<p>Phone:	<? if(sizeof($phone) == 0) echo "None on record"; else echo "<br />"; ?><?
					foreach($phone as $phn) {
							$data = array(
								'name'        => 'profile_phn[]',
								'id'          => 'profile_phn[]',
								'value'       => $phn->id,
								'checked'     => TRUE,
								'style'       => 'margin:10px',
								);
								echo form_radio($data);
								echo "$phn->numbers ( $phn->def ) <br />";
					}
				?> 
				</p>
				<p>Website:	<? if(sizeof($website) == 0) echo "None on record"; else echo "<br />"; ?><?
					foreach($website as $web) {
							$data = array(
								'name'        => 'profile_web[]',
								'id'          => 'profile_web',
								'value'       => $web->id,
								'checked'     => TRUE,
								'style'       => 'margin:10px',
								);
								echo form_checkbox($data);
								echo "$web->url ( $web->def )<br />";
					}
				?>
				</p>
			</div>
		<?	foreach($category as $cat) { ?>
			<div class="tab-pane" id="tab<?= $cat->cat_id ?>" style="overflow:hidden">
					<div class=""></div>
				<? $items = $details[$cat->cat_id]; 
					foreach($items as $item) {
					echo '<div class="span12">';
					$attributes = array(
						"name" => "category_".$cat->cat_id."[]",
						"value" => $item->id,
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
<div class="span5">
	<? 
		$attributes = array(
		"name" => "submit",
		"value" => "Generate",
		"class" => "span12 btn btn-primary",
		
		
		
		
		
		
		);
	echo form_submit($attributes);
	echo form_close();
	?>
</div>
