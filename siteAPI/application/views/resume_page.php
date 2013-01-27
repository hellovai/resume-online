<br />
<div class="span12 row-fluid">
<? foreach($categories as $category) {
			$class = "btn btn-icon new-icon-" . $category->type_id;
			if($category->cat_id == $this->session->userdata("cat_id")) $class .=" btn-primary";
?>
			<button class="<?=$class?>" style="margin:5px; padding-right:25px">
				<a class="linked" href='resume/view/<?= $category->cat_id ?>/<?= $category->type_id ?>'></a>
				<?= $category->title ?>
			</button>
<?			echo anchor('resume/delete/' . $category->cat_id ,'<i class="icon-remove btn-top" style="margin-left:-30px;"></i>', 'class="confirm"');
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
			switch($this->session->userdata("type_id"))
			{
				case 1:
				case 3:
				case 4:
		    		$title_name = $title -> name;
					break;
				case 2:
					$title_name = $title -> company;
					break;
				case 5:
					$title_name = "Item " . $title ->order_id;
			}
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
