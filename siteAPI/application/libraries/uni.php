<?php

class uni
	{
		private $id;
		private $cat_id;
		private $name;
		private $gpa;
		private $degree;
		private $description;
		private $start;
		private $finish;
		private $order_id;
	
		public function __construct($details)
		{
			//parent::__construct();
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
