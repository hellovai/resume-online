<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Table_model extends CI_Model {
	function __construct()
    {
        parent::__construct();
    }
    
    function uni($details) {
    	$details = (array) $details;
    	
    	if(isset($details['id']))
			$object->id = $details['id'];
		if(isset($details['cat_id']))
			$object->cat_id = $details['cat_id'];
		if(isset($details['title']))
			$object->name = $details['title'];
		if(isset($details['name']))
			$object->name = $details['name'];
		if(isset($details['gpa']))
			$object->gpa = $details['gpa'];
		if(isset($details['degree']))
			$object->degree = $details['degree'];
		if(isset($details['description']))
			$object->description = $details['description'];
		if(isset($details['start_month']) && isset($details['start_year']))
			$object->start = $details['start_month'] * 10000 + ($details['start_year'] % 10000);
		if(isset($details['finish_month']) && isset($details['finish_year']))
			$object->finish = $details['finish_month'] * 10000 + ($details['finish_year'] % 10000);
		if(isset($detials['current']) && $detaials['current'] == TRUE)
			$object->finish *= -1;
		if(isset($details['order_id']))
			$object->order_id = $details['order_id'];	
		return $object;
    }
    
}
