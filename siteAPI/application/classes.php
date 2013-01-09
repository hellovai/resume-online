<?php

//1 - Education
class uni
{
	var $id;
	var $cat_id;
	var $name;
	var $gpa;
	var $degree;
	var $description;
	var $start;
	var $finish;
	var $order_id;
	
	function uni($details)
	{
		if(isset($details['id']))
			$this->id = $details['id'];
		if(isset($details['cat_id']))
			$this->cat_id = $details['cat_id'];
		if(isset($details['name']))
			$this->name = $details['name'];
		if(isset($details['gpa']))
			$this->gpa = $details['gpa'];
		if(isset($details['degree']))
			$this->degree = $details['degree'];
		if(isset($details['description']))
			$this->description = $details['description'];
		if(isset($details['start']))
			$this->start = $details['start'];
		if(isset($details['finish']))
			$this->finish = $details['finish'];
		if(isset($details['order_id']))
			$this->order_id = $details['order_id'];		
	}
}

class courses
{
	var $id;
	var $uni_id;
	var $course;
	var $order_id;
	
	function courses($details)
	{
		if(isset($details['id']))
			$this->id = $details['id'];
		if(isset($details['uni_id']))
			$this->uni_id = $details['uni_id'];
		if(isset($details['course']))
			$this->course = $details['course'];
		if(isset($details['order_id']))
			$this->order_id = $details['order_id'];
	}
}

//2 - Experience
class experience
{
	var $id;
	var $cat_id;
	var $position;
	var $company;
	var $location;
	var $start;
	var $finish);
	var $order_id;
	
	function experience($details)
	{
		if(isset($details['id']))
			$this->id = $details['id'];
		if(isset($details['cat_id']))
			$this->cat_id = $details['cat_id'];
		if(isset($details['company']))
			$this->company = $details['company'];
		if(isset($details['location']))
			$this->location = $details['location'];
		if(isset($details['start']))
			$this->start = $details['start'];
		if(isset($details['finish']))
			$this->finish = $details['finish'];
		if(isset($details['order_id']))
			$this->order_id = $details['order_id'];		
	}
}

class descript
{
	var $id;
	var $exp_id;
	var $phrase;
	
	function descript($details)
	{
		if(isset($details['id']))
			$this->id = $details['id'];
		if(isset($details['exp_id']))
			$this->exp_id = $details['exp_id'];
		if(isset($details['phrase']))
			$this->phrase = $details['phrase'];
	}
}

//3 - Skills
class skill_header
{
	var $id;
	var $cat_id;
	var $name;
	var $order_id;
	
	function skill_header($details)
	{
		if(isset($details['id']))
			$this->id = $details['id'];
		if(isset($details['cat_id']))
			$this->cat_id = $details['cat_id'];
		if(isset($details['name']))
			$this->name = $details['name'];
		if(isset($details['order_id']))
			$this->order_id = $details['order_id'];
	}
}

class skills
{
	var $id;
	var $header_id;
	var $skill_id;
	var $order_id;
	
	function skills($details)
	{
		if(isset($details['id']))
			$this->id = $details['id'];
		if(isset($details['header_id']))
			$this->header_id = $details['header_id'];
		if(isset($details['skill_id']))
			$this->skill_id = $details['skill_id'];
		if(isset($details['order_id']))
			$this->order_id = $details['order_id'];
	}
}

class skill_list
{
	var $id;
	var $name;
	
	function skill_list($details)
	{
		if(isset($details['id']))
			$this->id = $details['id'];
		if(isset($details['name']))
			$this->name = $details['name'];
	}
}

class skill_queue
{
	var $id;
	var $name;
	
	function skill_queue($details)
	{
		if(isset($details['id']))
			$this->id = $details['id'];
		if(isset($details['name']))
			$this->name = $details['name'];
	}
}

//4 - Honors
class honors
{
	var $id;
	var $cat_id;
	var $name;
	var $description;
	var $location;
	var $acquired;
	var $order_id;
	
	function honors($details)
	{
		if(isset($details['id']))
			$this->id = $details['id'];
		if(isset($details['cat_id']))
			$this->cat_id = $details['cat_id'];
		if(isset($details['name']))
			$this->name = $details['name'];
		if(isset($details['description']))
			$this->description = $details['description'];
		if(isset($details['location']))
			$this->location = $details['location'];
		if(isset($details['acquired']))
			$this->acquired = $details['acquired'];
		if(isset($details['order_id']))
			$this->order_id = $details['order_id'];		
	}
}

//5 - Additional Information
class additional
{
	var $id;
	var $cat_id;
	var $field;
	
	function additional($details)
	{
		if(isset($details['id']))
			$this->id = $details['id'];
		if(isset($details['cat_id']))
			$this->cat_id = $details['cat_id'];
		if(isset($details['field']))
			$this->field = $details['field'];
	}
}
