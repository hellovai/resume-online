<?php
	if($item === false) {
		unset($item);
		$row['value'] = "Press enter to add skill";
		$item[] = $row;
	}
	echo json_encode($item);
?>
