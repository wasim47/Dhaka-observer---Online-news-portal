<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Dashboard_model extends CI_Model
{
	
	   
	public function __construct()
	{
		parent::__construct();
		
		
	}



	/**
	 * doctors
	 *
	 * @return object Users
	 * @author Ben Edmunds
	 **/
	public function dashboard_list()
	{
	   $query = $this
	   				->db
					->get( 'doctors' );
 
        if( $query->num_rows() > 0 ) {
		
            return $query->result();
        } else {
            return array();
        }
	}

	/**
	 * activate
	 *
	 * @return void
	 * @author Mathew
	 **/
	public function activate($id)
	{
		$data = array(
		    'active'          => 1
		);


$this->db->where('id', $id);
$this->db->update('users', $data);

		return false;
	}


	/**
	 * Deactivate
	 *
	 * @return void
	 * @author Mathew
	 **/
	public function deactivate($id)
	{
		
		
		$data = array(
		    'active'          => 0
		);


$this->db->where('id', $id);
$this->db->update('users', $data);
		
		return false;
	}
	
	
		/**
	 * Staff Education delete
	 *
	 * @return Education from db
	 * @sazedul. winux soft ltd.
	 **/
	public function user_del($id)
	{
		
		//echo $id;		
		$q=$this
                        ->db
						->where('id',$id)
                        ->delete('users');
	} 		

	
	


	/**
	 * edit_staff
	 *
	 * @return object doctor
	 * @sazedul. winux soft ltd.
	 **/
	public function doctors_edit($id)
	{
			
		$query = $this
                        ->db
						->select('*')
                        ->where('id', $id)
                        ->limit(1)
                        ->get('doctors');
		
		
		$row = $query->row_array();		
				          
		return $row;
          
	}
	
	
		/**
	 * add_staff
	 *
	 * @insert New Staff into database 
	 * @sazedul. winux soft ltd.
	 **/
	public function addStaff($data){
	
	$this->db->insert('doctors', $data); 
			
	}
	
	
	
	public function updateStaff($p_id,$data){
	
	$this->db
				   ->where('id', $p_id)
				   ->update('doctors', $data); 
	}
	
	/**
	 * Staff Education delete
	 *
	 * @return Education from db
	 * @sazedul. winux soft ltd.
	 **/
	public function doctors_del($id)
	{
	
		//echo $id;		
		$q=$this
                        ->db
						->where('doctors.id',$id)
						->delete('doctors' );
						
$table = array( 'doctors_total_location','board_certifications','doctors_location','doctors_schedule','education','h_affiliations','languages','professional_suffixes','specialties','visit_reasons','doctors_total_location' );

		$q=$this
                        ->db
						->where('person_id',$id)
						->delete($table);						
						
				
//image delete place  ########################################################################################

				

		//$phoId= $id;
						
		$query = $this
                        ->db
						->select('image_path')
						->select('thumb_path')
                        ->where('person_id',$id)
                        ->get('gallery');		
		
		//$result = 		
				          
		
		// print_r();
		 
			if( $query->num_rows() > 0 ) {
			
			foreach( $query->result_array() as $row ):
			
				$path['image_path'] = $row['image_path'];
				$path['thumb_path'] = $row['thumb_path'];
			
				unlink($path['image_path']); 
				unlink($path['thumb_path']); 
			 
				endforeach;
			
				$q=$this
						->db
						->where('person_id',$id)
						->delete('gallery');
					 
			}
				
	 		
				
		
						


         
	} 
	
			/**
	 *  professional_suffixes_update
	 *
	 * @return professional_suffixes from db
	 * @sazedul. winux soft ltd.
	 **/
	public function doctors_option_init($id){
	
	
		$q=$this
				->db
				->where('person_id', $id)
				->get('professional_suffixes');

          if($q->num_rows()== 0) {


	$query='INSERT INTO `professional_suffixes` (`professional_suffixes`, `person_id`) VALUES (" ", "'.$id.'")';
	mysql_query($query);
		
			}
	
} 
		
	
	
	
		/**
	 * Staff Option_1 == professional_suffixes
	 *
	 * @return professional_suffixes from db
	 * @sazedul. winux soft ltd.
	 **/
	public function doctors_option_1($id)
	{
		
				
		$q=$this
                        ->db
						->select('professional_suffixes')
                        ->where('person_id', $id)
                        ->get('professional_suffixes');

          if($q->num_rows() > 0) {
			foreach ($q->result() as $row) {
			    $data[] = $row;
			}
			
			sort($data);
			
		return $data;      
	}
	

	}
	
		
		/**
	 *  professional_suffixes_update
	 *
	 * @return professional_suffixes from db
	 * @sazedul. winux soft ltd.
	 **/
	public function p_suffixes_update($id, $data){
	
	
			$this->db
					->where('person_id', $id)
					->delete('professional_suffixes'); 
					
				
	foreach ($data as $p_suffixes){
		
	$query='INSERT INTO `professional_suffixes` (`professional_suffixes`, `person_id`) VALUES ("'.$p_suffixes.'", "'.$id.'")';
	mysql_query($query);
  
  
  	}		
	
} 

 
	
	/**
	 * Staff Option_2 == specialties
	 *
	 * @return visit_reasons from db
	 * @sazedul. winux soft ltd.
	 **/
	public function doctors_option_2($id)
	{
		
		//echo $id;		
		$q=$this
                        ->db
						->select('specialties')
                        ->where('person_id', $id)
                        ->get('specialties');

          if($q->num_rows() > 0) {
			foreach ($q->result() as $row) {
			    $data[] = $row;
			}
			sort($data);
		return $data;      
	}
	

	} 
	
	
	/**
	 * Staff Option_3 == visit_reasons
	 *
	 * @return visit_reasons from db
	 * @sazedul. winux soft ltd.
	 **/
	public function doctors_option_3($id)
	{
		
		
	
	
		//echo $id;		
		$q=$this
                        ->db
						->select('visit_reasons')
						->select('time')
                        ->where('person_id', $id)
                        ->get('visit_reasons');

          if($q->num_rows() > 0) {
			foreach ($q->result() as $row) {
			    $data[] = $row;
			}
			
			sort($data);
		return $data;      
	}
	

	} 	
	
	

        	
	
	
	/**
	 *  specialties_update
	 *
	 * @return professional_suffixes from db
	 * @sazedul. winux soft ltd.
	 **/
	public function specialties_update($id, $data){
	
	
			$this->db
					->where('person_id', $id)
					->delete('specialties'); 
					
				
	foreach ($data as $specialties){
		
	$query='INSERT INTO `specialties` (`specialties`, `person_id`) VALUES ("'.$specialties.'", "'.$id.'")';
	mysql_query($query);
  
  
  			}		
							
} 


/**
	 *  specialties_update
	 *
	 * @return professional_suffixes from db
	 * @sazedul. winux soft ltd.
	 **/
	public function visit_reasons_update($id, $data ){
	
	
			$this->db
					->where('person_id', $id)
					->delete('visit_reasons'); 
					
	 
	  $time=45;
	
	   		
	
foreach ($data as $visit_reasons){	
	
$query='INSERT INTO `visit_reasons` (`visit_reasons`, `person_id`, `time`) VALUES ("'.$visit_reasons.'", "'.$id.'", "'.$time.'")';
	mysql_query($query);
  
  }	
 
			
			
	
} 
	
	/**
	 * Staff Option_4 == Education
	 *
	 * @return Education from db
	 * @sazedul. winux soft ltd.
	 **/
	public function doctors_option_4($id)
	{
		
		//echo $id;		
		$q=$this
                        ->db
						->select('education')
						->select('id') 
						->select('person_id')
                        ->where('person_id', $id)
                        ->get('education');

          if($q->num_rows() > 0) {
			foreach ($q->result() as $row) {
			    $data[] = $row;
			}
			sort($data);
		return $data;      
	}
	

	} 
	
		
	/**
	 *  specialties_update
	 *
	 * @return professional_suffixes from db
	 * @sazedul. winux soft ltd.
	 **/
	public function education_update($id, $data){
	
		
	$query='INSERT INTO `education` (`education`, `person_id`) VALUES ("'.$data.'", "'.$id.'")';
	mysql_query($query);
  
  			
							
} 

	
	
	
	

	
	
	/**
	 * Staff Option_5 == Hospital_affiliations
	 *
	 * @return Education from db
	 * @sazedul. winux soft ltd.
	 **/
	public function doctors_option_5($id)
	{
		
		//echo $id;		
		$q=$this
                        ->db
						->select('h_affiliations')
						->select('id') 
						->select('person_id')
                        ->where('person_id', $id)
                        ->get('h_affiliations');

          if($q->num_rows() > 0) {
			foreach ($q->result() as $row) {
			    $data[] = $row;
			}
			sort($data);
		return $data;      
	}
	

	} 
	
		
	/**
	 *  specialties_update
	 *
	 * @return professional_suffixes from db
	 * @sazedul. winux soft ltd.
	 **/
	public function h_affiliations_update($id, $data){
	
	
		
	$query='INSERT INTO `h_affiliations` (`h_affiliations`, `person_id`) VALUES ("'.$data.'", "'.$id.'")';
	mysql_query($query);
  
  
  			
							
} 

	
	
	
	
	/**
	 * Staff Education delete
	 *
	 * @return Education from db
	 * @sazedul. winux soft ltd.
	 **/
	public function h_affiliations_del($id)
	{
		
		//echo $id;		
		$q=$this
                        ->db
						->where('id',$id)
                        ->delete('h_affiliations');

         
	} 		
	
	
//Language#################################################################################################################
	
		
		/**
	 * Staff Option_6 == Language
	 *
	 * @return professional_suffixes from db
	 * @sazedul. winux soft ltd.
	 **/
	public function doctors_option_6($id)
	{
		
				
		$q=$this
                        ->db
						->select('languages')
                        ->where('person_id', $id)
                        ->get('languages');

          if($q->num_rows() > 0) {
			foreach ($q->result() as $row) {
			    $data[] = $row;
			}
			
			sort($data);
			
		return $data;      
	}
	

	}
	
		
		/**
	 *  languages_update
	 *
	 * @return professional_suffixes from db
	 * @sazedul. winux soft ltd.
	 **/
	public function languages_update($id, $data){
	
	
	
	
			
			$this->db
					->where('person_id', $id)
					->delete('languages'); 
					
	if(!empty($data)){
				
	foreach ($data as $languages){
		
	$query='INSERT INTO `languages` (`languages`, `person_id`) VALUES ("'.$languages.'", "'.$id.'")';
	mysql_query($query);
	
				}
  
  
  	}		
	
} 

 //board_certifications#############################################################################################################
	
		
		/**
	 * Staff Option_6 == Language
	 *
	 * @return professional_suffixes from db
	 * @sazedul. winux soft ltd.
	 **/
	public function doctors_option_7($id)
	{
		
				
		$q=$this
                        ->db
						->select('board_certifications')
                        ->where('person_id', $id)
                        ->get('board_certifications');

          if($q->num_rows() > 0) {
			foreach ($q->result() as $row) {
			    $data[] = $row;
			}
			
			sort($data);
			
		return $data;      
	}
	

	}
	
		
		/**
	 *  languages_update
	 *
	 * @return professional_suffixes from db
	 * @sazedul. winux soft ltd.
	 **/
	public function board_certifications_update($id, $data){
	
	
	
	
			
			$this->db
					->where('person_id', $id)
					->delete('board_certifications'); 
					
	if(!empty($data)){
				
	foreach ($data as $board_certifications){
		
	$query='INSERT INTO `board_certifications` (`board_certifications`, `person_id`) VALUES ("'.$board_certifications.'", "'.$id.'")';
	mysql_query($query);
	
				}
  
  
  	}		
	
} 




	
	
//#################################################################################################################################	
					//END	//#################################################################################################################################	


        
	
	
	

	/**
	 * Checks email
	 *
	 * @return bool
	 * @author Mathew
	 **/
	public function email_check($email = '')
	{
		$this->trigger_events('email_check');

		if (empty($email))
		{
			return FALSE;
		}

		$this->trigger_events('extra_where');

		return $this->db->where('email', $email)
		                ->count_all_results($this->tables['users']) > 0;
	}

	/**
	 * register
	 *
	 * @return bool
	 * @author Mathew
	 **/
	public function q_register($additional_data = array())
	{
		$email=$additional_data['email'];

		if ($this->identity_column == 'email' && $this->email_check($email))
		{
			$this->set_error('account_creation_duplicate_email');
			return FALSE;
		}
		

				
		//filter out any data passed that doesnt have a matching column in the users table
		//and merge the set user data and the additional data
		$user_data = $this->_filter_data($this->tables['staff'], $additional_data);

		

		$this->db->insert($this->tables['staff'], $user_data);

		$id = $this->db->insert_id();


		//add to default group if not already set
		$default_group = $this->where('name', $this->config->item('default_group', 'ion_auth'))->group()->row();
		if ((isset($default_group->id) && !isset($groups)) || (empty($groups) && !in_array($default_group->id, $groups)))
		{
			$this->add_to_group($default_group->id, $id);
		}

		$this->trigger_events('post_register');

		return (isset($id)) ? $id : FALSE;
	}


        public function limit($limit)
	{
		$this->trigger_events('limit');
		$this->_ion_limit = $limit;

		return $this;
	}

	public function offset($offset)
	{
		$this->trigger_events('offset');
		$this->_ion_offset = $offset;

		return $this;
	}

	public function where($where, $value = NULL)
	{
		$this->trigger_events('where');

		if (!is_array($where))
		{
			$where = array($where => $value);
		}

		array_push($this->_ion_where, $where);

		return $this;
	}

	public function select($select)
	{
		$this->trigger_events('select');

		$this->_ion_select[] = $select;

		return $this;
	}

	public function order_by($by, $order='desc')
	{
		$this->trigger_events('order_by');

		$this->_ion_order_by = $by;
		$this->_ion_order    = $order;

		return $this;
	}

	public function row()
	{
		$this->trigger_events('row');

		$row = $this->response->row();
		$this->response->free_result();

		return $row;
	}

	public function row_array()
	{
		$this->trigger_events(array('row', 'row_array'));

		$row = $this->response->row_array();
		$this->response->free_result();

		return $row;
	}

	public function result()
	{
		$this->trigger_events('result');

		$result = $this->response->result();
		$this->response->free_result();

		return $result;
	}

	public function result_array()
	{
		$this->trigger_events(array('result', 'result_array'));

		$result = $this->response->result_array();
		$this->response->free_result();

		return $result;
	}


	/**
	 * update
	 *
	 * @return bool
	 * @author Phil Sturgeon
	 **/
	public function update($id, array $data)
	{
		$this->trigger_events('pre_update_user');

		$user = $this->user($id)->row();

		$this->db->trans_begin();

		if (array_key_exists($this->identity_column, $data) && $this->identity_check($data[$this->identity_column]) && $user->{$this->identity_column} !== $data[$this->identity_column])
		{
			$this->db->trans_rollback();
			$this->set_error('account_creation_duplicate_'.$this->identity_column);

			$this->trigger_events(array('post_update_user', 'post_update_user_unsuccessful'));
			$this->set_error('update_unsuccessful');

			return FALSE;
		}

		// Filter the data passed
		$data = $this->_filter_data($this->tables['users'], $data);

		if (array_key_exists('username', $data) || array_key_exists('password', $data) || array_key_exists('email', $data))
		{
			if (array_key_exists('password', $data))
			{
				if( ! empty($data['password']))
				{
					$data['password'] = $this->hash_password($data['password'], $user->salt);
				}
				else
				{
					// unset password so it doesn't effect database entry if no password passed
					unset($data['password']);
				}
			}
		}

		$this->trigger_events('extra_where');
		$this->db->update($this->tables['users'], $data, array('id' => $user->id));

		if ($this->db->trans_status() === FALSE)
		{
			$this->db->trans_rollback();

			$this->trigger_events(array('post_update_user', 'post_update_user_unsuccessful'));
			$this->set_error('update_unsuccessful');
			return FALSE;
		}

		$this->db->trans_commit();

		$this->trigger_events(array('post_update_user', 'post_update_user_successful'));
		$this->set_message('update_successful');
		return TRUE;
	}

	/**
	* delete_user
	*
	* @return bool
	* @author Phil Sturgeon
	**/
	public function delete_user($id)
	{
		$this->trigger_events('pre_delete_user');

		$this->db->trans_begin();

		// delete user from users table
		$this->db->delete($this->tables['users'], array('id' => $id));
		
		// remove user from groups
		$this->remove_from_group(NULL, $id);

		if ($this->db->trans_status() === FALSE)
		{
			$this->db->trans_rollback();
			$this->trigger_events(array('post_delete_user', 'post_delete_user_unsuccessful'));
			$this->set_error('delete_unsuccessful');
			return FALSE;
		}

		$this->db->trans_commit();

		$this->trigger_events(array('post_delete_user', 'post_delete_user_successful'));
		$this->set_message('delete_successful');
		return TRUE;
	}


	public function trigger_events($events)
	{
		if (is_array($events) && !empty($events))
		{
			foreach ($events as $event)
			{
				$this->trigger_events($event);
			}
		}
		else
		{
			if (isset($this->_ion_hooks->$events) && !empty($this->_ion_hooks->$events))
			{
				foreach ($this->_ion_hooks->$events as $name => $hook)
				{
					$this->_call_hook($events, $name);
				}
			}
		}
	}


	/**
	 * messages
	 *
	 * Get the messages
	 *
	 * @return void
	 * @author Ben Edmunds
	 **/
	public function messages()
	{
		$_output = '';
		foreach ($this->messages as $message)
		{
			$messageLang = $this->lang->line($message) ? $this->lang->line($message) : '##' . $message . '##';
			$_output .= $this->message_start_delimiter . $messageLang . $this->message_end_delimiter;
		}

		return $_output;
	}


	protected function _filter_data($table, $data)
	{
		$filtered_data = array();
		$columns = $this->db->list_fields($table);

		if (is_array($data))
		{
			foreach ($columns as $column)
			{
				if (array_key_exists($column, $data))
					$filtered_data[$column] = $data[$column];
			}
		}

		return $filtered_data;
	}
	
}



/*$vist_reasons_time = array(
'Pediatric Consultation',
'Pediatric Follow Up',
'Annual Pediatric Checkup',
'Child with Fever',
'Pre-natal Fetal Consultation',
'Pre-natal Fetal Follow Up',
'Sick Child Visit',
'Abscess',
'Acne',
'Alcoholism',
'Allergic Cough',
'Allergy Consultation',
'Annual Physical',
'Arthritis',
'Asthma',
'Cholesterol / Lipids Checkup',
'CT Scan - Head',
'CT Scan - Heart (Coronary CTA)',
'CT Scan - Lungs',
'Cystic Fibrosis',
'Daytime Sleepiness',
'Dermatology Consultation',
'Ear Infection',
'ECG / EKG',
'Eczema',
'Flu Shot',
'Food Intolerance / Allergy',
'Foot Pain',
'Frequent Urination',
'Hair Removal',
'Hearing Problems / Ringing in Ears',
'Hoarseness / Voice Disorder',
'Incontinence',
'Irritable Bowel Syndrome',
'Juvenile Diabetes',
'Migraine',
'Pediatric Cerumen Removal',
'Pediatric Emergency',
'Pediatric Freezing of Warts',
'Pediatric Joint Injection',
'Pediatric Nail Removal',
'Pediatric Pre-Surgery Consultation',
'Pediatric Second Opinion',
'Pediatric Skin Biopsy / Removal of Skin Lesion',
'Pediatric Sports Physical',
'Pediatric Travel Medicine Consultation',
'Pediatric Vaccine(s)',
'Pneumonia',
'Pneumothorax',
'Pre-Travel Checkup',
'Pre-Travel Consultation',
'Pulmonary Function Testing',
'Pyelonephritis',
'Sickle Cell Disease',
'Sinus Problems',
'Sleep Problems',
'Sleep Studies',
'Sore Throat',
'Spirometry',
'STD (Sexually Transmitted Disease)',
'Swelling in Neck',
'Thalassemia',
'Thyroid Consultation',
'Ultrasound',
'Urinary Tract Infection',
'Vertigo',
'Wart(s)',
'Wound Care',
'X-ray',
);*/ 