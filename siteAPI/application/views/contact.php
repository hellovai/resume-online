<h2>Contact Us</h2>
<hr />
<div class="span5 well">
	<p>Feel free to drop us a line at <a href="mailto:kacxdak@gmail.com">kacxdak@gmail.com</a> or use the form on your right to send us a message</p>
	<hr />
	<p>We try and answer each response promtly, so send use your comments, suggestions, and just general hello's!</p>
</div>
<div class="span6 well">
<div class="alert">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>Sorry!</strong> This feature is currently under process.
</div>
<?
	echo form_open('contact/send');
	$attributes = array(
		"name" => "name",
		"placeholder" => "Your name",
		"class" => "span12",
		"autofocus" => ""
		);
	echo form_input($attributes);	
	$attributes = array(
		"name" => "email",
		"placeholder" => "Your Email",
		"class" => "span12",
		"required" => ""
		);
	echo form_input($attributes);
	$attributes = array(
		"name" => "subject",
		"placeholder" => "The Jist",
		"class" => "span12",
		"required" => ""
		);
	echo form_input($attributes);
	$attributes = array(
		"name" => "message",
		"placeholder" => "Your Message",
		"class" => "span12 no-resize",
		"rows" => "7",
		"required" => ""
		);
	echo form_textarea($attributes);
	$attributes = array(
		"name" => "submit",
		"value" => "Communicate My Wishes",
		"class" => "span12 btn btn-primary",
		"disabled" => "true"
		);
	echo form_submit($attributes);
	echo form_close();
?>
</div>
