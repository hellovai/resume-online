<br />
<div class="span12 row-fluid">
<? foreach($categories as $category) {
			$attributes = array(
				"value" => $category->title,
				"class" => "btn",
				"style" => "margin:5px; padding-right:25px; cursor:default"
			);
			if($category->cat_id == $this->session->userdata("cat_id")) $attributes['class'].=" btn-primary";
			echo form_submit($attributes);
			echo anchor('resume/delete/' . $category->cat_id ,'<i class="icon-remove" style="margin-left:-25px;"></i>');
	} ?>
<hr />
	<div class="span3 well">
	<div class="fixed-height row-fluid">
    <?php 
	$data['item'] = $this->Resume_model->type_info();
	if($data['item'] == false)
		$data['item'] = $this->Resume_model->type_info();
	if($data['item'] == false)
		$data['item']->id = false;
	
    if(sizeof($info) > 0 )
    {
		foreach($info as $title)
		{
			echo form_open('resume');
		    echo form_hidden('resume_id', $title->id);
		    $title_name = $title -> name;
		    if(strlen($title_name) > 20 )
		    	$title_name = substr($title_name,0,16) . "...";
			$attributes = array(
				'class' => "btn span12",
				'name' => "submit",
				'value' => $title_name,
			);
			if($title->id === $data['item']->id ) {
				$attributes['class'] .= " btn-primary";
				//$attributes['disabled'] = "";
			}
			echo form_submit($attributes);
			echo anchor('resume/deleteitem/' . $title->id . '/' . $title->order_id, '<i class="icon-remove icon"></i>', 'class="confirm"');
			echo form_close();
		}
    }
	else
		echo "<p>You don't have any items!</p>";
    
    ?></div><hr><?
    echo form_open('resume/modify');
    $attributes = array(
    	"name" => "title",
    	"placeholder" => "New item's name",
    	"class" => "span12",
    	"required"=> "",
    	"autocomplete" => "off"
    );
	echo form_input($attributes);
	echo form_hidden('action','Add');
	echo form_close();
	?>
	</div>
	<div class="span8">
	<?
	if(sizeof ($info) > 0)
		$this->load->view('table/' . $type . '_view', $data);
	?>
	</div>
</div>
