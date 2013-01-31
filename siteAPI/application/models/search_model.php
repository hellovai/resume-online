<?

class Search_model extends CI_Model {
	function __construct()
    {
        parent::__construct();
    }
    
    function get_skill() {
    	if(isset($_GET['term']))
			$term = strip_tags( $_GET['term'] ); //retrieve the search term that autocomplete sends
		else
			$term = "";
		
		$this->db->like('name', $term);
		$query = $this->db->get('skill_list');

		if ( $query -> num_rows() > 0 ) {
			foreach ( $query -> result() as $row ) {
				$item['value']=htmlentities(stripslashes($row->name));
				$row_set[] = $item;
			}
			return $row_set;
		}
		return false;
    }
}
