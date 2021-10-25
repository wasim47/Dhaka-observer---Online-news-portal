<?php
Class cultural_model extends CI_Model
{
	
	function get_cultural() 
	{
			  $result	= $this->db->get('culturals');
			  $result	= $result->result();
			  return $result;
	}
	function get_culturallist()
	{
		$query = $this
				->db
				->select('*')
				->get('culturals');
		$row = $query->row_array();		
		return $row;
	}

	function save($culturalId,$cultural_date,$culturaltime,$programmer_name,$programmer_type,$seotitle,$keyword,$details)
	{
			$j=count($culturalId);
			$date= date('y-m-d');
			for($i=1; $i<=3; $i++)
			{
		$query='update culturals set cultural_date="'.$cultural_date[$i].'", culturaltime="'.$culturaltime[$i].'", programmer_type="'.$programmer_type[$i].'", programmer_name="'.$programmer_name[$i].'", seo_title="'.$seotitle.'",  key_word ="'.$keyword.'", seo_details="'.$details.'", date_time="'.$date.'" where cultural_id="'.$i.'"';
				mysql_query($query);
			}

	}
	
	

}