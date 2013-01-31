<?
	//print_r($category);
	foreach($category as $cat) {
		echo $cat->title;
		echo "<hr /><ul>";
		foreach($details[$cat->cat_id] as $info) {
			if($cat->type_id == 1)
				$info->extra = $this->Resume_model->get_courses($cat->cat_id);
			else if($cat->type_id == 2)
				$info->extra = $this->Resume_model->get_phrases($cat->cat_id);
				
			echo "<li>";
			print_r($info);
			echo "</li>";
		}
		echo "</ul><br /><br />";
	}
?>
<hr />
