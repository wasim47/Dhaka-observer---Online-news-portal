<?php
Class Sport_model extends CI_Model
{
	
	function get_sport() 
	{
			  $result	= $this->db->get('sports');
			  $result	= $result->result();
			  return $result;
	}
	function get_sportlist()
	{
		$query = $this
				->db
				->select('*')
				->get('sports');
		$row = $query->row_array();		
		return $row;
	}

	function save($sportId,$sport_venue,$sporttime,$team1,$team2,$seotitle,$keyword,$details)
	{
			$j=count($sportId);
			$date= date('y-m-d');
			for($i=1; $i<=3; $i++)
			{
		$query='update sports set sport_venue="'.$sport_venue[$i].'", time="'.$sporttime[$i].'", team2="'.$team2[$i].'", team1="'.$team1[$i].'", seo_title="'.$seotitle.'",  key_word ="'.$keyword.'", seo_details="'.$details.'", date_time="'.$date.'" where sport_id="'.$i.'"';
				mysql_query($query);
			}

	}
	
	

}