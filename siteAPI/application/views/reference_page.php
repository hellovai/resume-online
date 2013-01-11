<div id="reference_page">

	<h2>References</h2>
	<hr />
	<br />
    <?php 
    if(sizeof($refs) > 0 )
    {
    
		echo '<div class="accordion span6" id="accordion2">';
		$var=0;
    	foreach($refs as $ref) 
    	{ ?>
    	    <div class="accordion-group">
				<div class="accordion-heading" style="overflow: auto;width: 100%;">
					<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapse<?= $var ?>">				
						<?php 
						//echo '<div style="overflow: auto;width: 100%;border: 1px solid #000000;">';	
						echo '<div style="float:left">';
						echo "<h3>$ref->name</h3>";
						echo '</div>';
						echo '<div style="float:right;">';
						echo anchor('reference/delete/' . $ref->id, '<i class="icon-remove icon"></i>', 'class="confirm"'); 
						echo '</div>';
						//echo '</div>';
						?>
						
					</a>
					
				 
				</div>
				<div id="collapse<?= $var ?>" class="accordion-body collapse">
					<div class="accordion-inner well">
						<?php
						echo "<br />";
						echo form_open('reference/modify');
						echo form_hidden('id', $ref->id);
						$attributes = array(
									"name" => "name",
									"style" => "border:none",
									"value" => $ref->name
									);
			 			echo form_input($attributes);
						echo "<br />";
						$attributes = array(
									"name" => "company",
									"placeholder" => "Company Name",
									"value" => $ref->company
									);
			 			echo form_input($attributes);
						echo "<br />";
						$attributes = array(
									"name" => "email",
									"placeholder" => "Email Address",
									"value" => $ref->email
									);
			 			echo form_input($attributes);
						echo "<br />";
						$attributes = array(
									"name" => "phone",
									"placeholder" => "Phone Number",
									"value" => $ref->phone
									);
			 			echo form_input($attributes);
						echo "<br />";
						$attributes = array(
									"name" => "address",
									"placeholder" => "Mailing Address",
									"value" => $ref->address,
									"rows" => 4
									);
			 			echo form_textarea($attributes); 
						echo "<br />";	
						$attributes = array(
							"class" => "btn btn-primary span6",
							'name' => "submit",
							'value' => 'Update'
							);	
						echo form_submit($attributes);
						echo "<br />";
						echo form_close();
						?>
						<br />
					</div>
				</div>
			</div>
		<?php 
		$var++;	
    	}
    	echo "</div>";
    }
    else
    {
    	echo "<p>You don't have any references!</p>";
    }    		
    
    echo '<br />';
    echo '<div class="span5 pull-right">';
    echo form_open('reference/create');
	$attributes = array(
				"name" => "name",
				"placeholder" => "Reference Name"
				);
	echo form_input($attributes);
	echo "<br />";	
	$attributes = array(
				"name" => "company",
				"placeholder" => "Company Name"
				);
	echo form_input($attributes);
	echo "<br />";
	$attributes = array(
				"name" => "email",
				"placeholder" => "Email Address"
				);
	echo form_input($attributes);
	echo "<br />";
	$attributes = array(
				"name" => "phone",
				"placeholder" => "Phone Number"

				);
	echo form_input($attributes);
	echo "<br />";
	$attributes = array(
				"name" => "address",
				"placeholder" => "Mailing Address",
				"rows" => 4
				);
	echo form_textarea($attributes); 
	echo "<br />";
    $attributes = array(
					"class" => "btn btn-primary span6",
					'name' => "submit",
					'value' => 'Create New Reference'
					);	
	echo form_submit($attributes);
	echo form_close();		
	echo '</div>';

	?>
</div><!-- end reference_page-->
