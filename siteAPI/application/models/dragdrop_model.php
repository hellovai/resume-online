<?

class Dragdrop_model extends CI_Model {
	function __construct()
    {
        parent::__construct();
    }
    
    function update($data,$table_name)
    {
		foreach($data as $position => $id)
		{
			$info = array('order_id' => $position+1);
			switch($table_name)
				{
				case "reference": 
					$this->db->where('user_id', $this->Common->user_id());
					break;
				}
			$this->db->where('id', $id);
		    $this->db->update($table_name, $info); 
		}
    	
    }  
}
