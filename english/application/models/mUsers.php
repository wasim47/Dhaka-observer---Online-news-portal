<?php 





class mUsers extends CI_Model
{

public function __construct()
	{
		parent::__construct();
		
	}
 
    public function getAll($name) {
 
        //get all records from users table
        $query = $this->db
						  ->where('id', $name)
						  ->get( 'doctors' );
 
        if( $query->num_rows() > 0 ) {
		
            return $query->result();
        } else {
            return array();
        }
 
    } //end getAll
 
} //end class
?>