<div class="span11">
	<p>
		<?= $name ?> <? if( strlen($name) > 0 && $num_set > 1) echo ", "; ?>
		<?= $award ?> <? if($num_set > 2) echo "<br />"; else if( strlen($award) > 0  && strlen($location) > 0) echo ", "; ?>
		<?= $location ?>
	</p>
</div>
