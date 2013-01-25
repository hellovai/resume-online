<div id="uni_edit">

	<h2>Education</h2>
	<h3><?= $title ?></h3>
	<br />
    <?php 
    
    if(sizeof($info) > 0 )
    {
    	echo '<div class="accordion span6" id="accordion2">';
		$var=0;
		
    	foreach($info as $cat)
    	{ ?>
    	<div class="accordion-group"> 
				<div class="accordion-heading" style="overflow: auto;">
					<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapse<?= $var ?>">	
						<div class="span9">
							<h4><?= $cat->name ?></h4>
						</div>
					</a>
					<div class="span1">
						<?if($var!=0)
							echo anchor('resume/swap/' . $cat->order_id . '/' . ($cat->order_id-1), '<i class="icon-chevron-up icon"></i>');?>
					</div>
					<div class="span1">
						<?if($var<sizeof($info)-1)
							echo anchor('resume/swap/' . $cat->order_id . '/' . ($cat->order_id+1), '<i class="icon-chevron-down icon"></i>'); ?>
					 </div>
					 <div class="span1">
					 	<?= anchor('resume/delete/' . $cat->cat_id . '/' . $cat->order_id, '<i class="icon-remove icon"></i>', 'class="confirm"'); ?>
					 </div>
				</div>

				<div id="collapse<?= $var ?>" class="accordion-body collapse">
					<div class="accordion-inner">
							<? 
							echo form_open("resume/modify");
							echo form_hidden('cat_id', $cat->cat_id);
							echo form_hidden('order_id', $cat->order_id);
							echo form_input('name', $cat->name); 
							echo "<br />";
							$attributes = array(
										"name" => "gpa",
										"placeholder" => "GPA",
										"value" => $cat->gpa
										);
				 			echo form_input($attributes);
							$attributes = array(
										"name" => "schoolname",
										"placeholder" => "School Name",
										"value" => $cat->name
										);
				 			echo form_input($attributes);
							$attributes = array(
										"name" => "degree",
										"placeholder" => "Degree",
										"value" => $cat->degree
										);
				 			echo form_input($attributes);
				 			$attributes = array(
										"name" => "description",
										"placeholder" => "Description",
										"value" => $cat->description
										);
				 			echo form_textarea($attributes);
				 			$attributes = array(
										"name" => "start",
										"placeholder" => "Start Date",
										"value" => $cat->start
										);
				 			echo form_input($attributes);
							$attributes = array(
										"name" => "finish",
										"placeholder" => "End Date",
										"value" => $cat->finish
										);
				 			echo form_input($attributes);
				 			echo form_submit('action', 'Update');
							echo form_submit('action', 'Delete');
							echo form_close();
							?>
					</div>
				</div>
			</div>
		<?php 
		$var++;	
    	}
    	echo "</div>";
    }
    else
    	echo "<p>You don't have any items!</p>";
    
    
 	echo '<br />';
    echo '<div class="span5 pull-right">';
    			
	echo form_open("resume/modify");
	$attributes = array(
			"name" => "type_id",
			"value" => $type_id,
			"type" => "hidden"
			);
	echo form_input($attributes);
	$attributes = array(
			"name" => "cat_id",
			"value" => $cat_id,
			"type" => "hidden"
			);
	echo form_input($attributes);
	$attributes = array(
				"name" => "gpa",
				"placeholder" => "GPA",
				);
	echo form_input($attributes);
	$attributes = array(
				"name" => "degree",
				"placeholder" => "Degree",
				);
	echo form_input($attributes);
	$attributes = array(
				"name" => "description",
				"placeholder" => "Description",
				);
	echo form_textarea($attributes);
	$attributes = array(
				"name" => "start",
				"placeholder" => "Start Date",
				);
	echo form_input($attributes);
	$attributes = array(
				"name" => "finish",
				"placeholder" => "End Date",
				);
	echo form_input($attributes);
	echo form_submit('action', 'Add');
	echo form_close();		
	echo '</div>';
	?>
</div><!-- end resume education_page-->
