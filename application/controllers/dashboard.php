<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		
			$this->load->model('dashboard_model');	

			}

	//redirect if needed, otherwise display the user list

	function index()
	{
		if (!$this->session->userdata('identity'))
		{
			//redirect them to the login page
			redirect('admin/login', 'refresh');
		}
		
		else
		{

           $data['error'] = $this->session->flashdata('error');
			
			//list the users
			
			//$data['message']= $this->data['message'];
			$data['onload']='home';
            //$data['dashboard']=$this->dashboard_model->dashboard_list();
			//$data['error'] = ;
			$id=$this->session->userdata('user_id');  
		   $data['viewUser']=$this->ion_auth_model->editUser($id);
            $data['main_content']="dashboard_view";
             $this->load->view('deshboard_templete', $data);
			//$this->load->view('admin/index', $this->data);
		}
	}
	//User Delete
	function user_del($id){
	  	
	$this->dashboard_model->user_del($id);
	
	redirect('admin');
	
	}
	
	
	


	//activate the user
	function activate($id)
	{

			$activation = $this->dashboard_model->activate($id);
		
                    redirect('dashboard', 'refresh');
	}
	
	
	
	function default_photo()
	{

			$id=$this->input->post('id');
			$default_photo_id=$this->input->post('default_photo_id');
			
		$this->gallery_model->default_photo($id, $default_photo_id);				
				
		
		
        //redirect('dashboard/edit_staff/'.$id, 'refresh'); 
		redirect('dashboard/edit_staff/'.$id, 'refresh');
	}
	
	function photo_del($id){
	
	//$id = ltrim($id, '_');
	$id = explode('_', $id);
	//print_r($id);
	$this->gallery_model->photo_del($id[0]);

	redirect('dashboard/edit_staff/'.$id[1]);
	
	}
	
	
	//$tablig_jamat= array( 'kalema namaj', 'jikir imil', 'ikramul muslimin', 'daoate tablig');
	
	

	//deactivate the user
	function deactivate($id )
	{
		

		$this->dashboard_model->deactivate($id);

	

			//redirect them back to the admin page
			redirect('dashboard', 'refresh');
		
	}


	//create a new user
	function add_staff()
	{
		$this->data['title'] = "Create User";

		if (!$this->session->userdata('identity'))
		{
			//redirect them to the login page
			redirect('admin/login', 'refresh');
		}

		//validate form input
		$this->form_validation->set_rules('first_name', 'First Name', 'trim|required|max_length[12]|alpha|xss_clean');
		$this->form_validation->set_rules('last_name', 'Last Name', 'trim|required|max_length[12]|alpha|xss_clean');
		$this->form_validation->set_rules('email', 'Email Address', 'required|valid_email');
		$this->form_validation->set_rules('type', 'Type', 'required|xss_clean');
		

		if ($this->form_validation->run() == true)
		{
			
			$data = array(
				'first_name' => $this->input->post('first_name'),
				'last_name'  => $this->input->post('last_name'),
				'email'  => $this->input->post('email'),
				'active'  => 0,
				'type'    => $this->input->post('type')
			);
			    $this->dashboard_model->addStaff($data);
	
					//if( ){
				  
				//	redirect('dashboard', 'refresh');
				//	}
			
			redirect('dashboard', 'refresh');
		} else {	
		
		$this->session->set_flashdata('error', validation_errors() );	
		redirect('dashboard', 'refresh');
		
		//$data['message']='Error:'.validation_errors();		
		} 
		
		
		 
	}
	
	function edit_staff($id){
	
		
		if (!$this->session->userdata('identity'))
		{
			//redirect them to the login page
			redirect('admin/login', 'refresh');
		}
		
		else
		{
		//if(($this->dashboard_model->dashboard_option_1($id))==0){$this->dashboard_model->dashboard_option_init($id);}
		//$this->dashboard_model->dashboard_option_init($id);
		
		$data['onload']='dashboard';			
        $data['dashboardEdit']=$this->dashboard_model->dashboard_edit($id);
		
		$data['dashboardOption_1']=$this->dashboard_model->dashboard_option_1($id);
		
		
		
		$data['dashboardOption_2']=$this->dashboard_model->dashboard_option_2($id);
		$data['dashboardOption_3']=$this->dashboard_model->dashboard_option_3($id);
		$data['dashboardOption_4']=$this->dashboard_model->dashboard_option_4($id);
		$data['dashboardOption_5']=$this->dashboard_model->dashboard_option_5($id);
		$data['dashboardOption_6']=$this->dashboard_model->dashboard_option_6($id);
		$data['dashboardOption_7']=$this->dashboard_model->dashboard_option_7($id);
		$data['imageMain'] = $this->gallery_model->imageMain($id); 
		$data['images'] = $this->gallery_model->imagesData($id); 
		$data['error'] = $this->session->flashdata('error');
		
		$data['main_content']="edit_staff_view";
        $this->load->view('template', $data);
		}
	}
	
	
	
	
	//update staff data
	function update_staff()
	{
		$this->data['title'] = "Edit Profile";

		if (!$this->session->userdata('identity'))
		{
			//redirect them to the login page
			redirect('admin/login', 'refresh');
		}

		//validate form input
		
			
			$data = array(
				'p_statement' => $this->input->post('p_statement'),
				'gender'  => $this->input->post('gender'),
				'patients_accepted'  => $this->input->post('patients_accepted'),
				'npi_num'    => $this->input->post('npi_num')
			);
			
			$p_id=$this->input->post('id');
			

          	$this->dashboard_model->updateStaff($p_id,$data);
					
			redirect('dashboard/edit_staff/'.$p_id, 'refresh');
			
		//}
		
	}
	
	
	//Education edit Option
	function dashboard_del($id){
	
	$this->dashboard_model->dashboard_del($id);
	
	
	
	redirect('dashboard');
	
	}
	

	
//###################################################################################################################
//##########################Staff--Edit--Form##Start#####################################################
//###################################################################################################################	
	
		function p_suffixes_edit($id){
	
	$this->data['dashboardOption_1'] = $this->dashboard_model->dashboard_option_1($id);
	
	$data['id']=$id;   
	$data['dashboardOption_1']=$this->data['dashboardOption_1'];   
	
	$this->load->view('p_suffixes_edit_view',$data);
	
	}
	
		//working on
	//update professional suffixe data of staff
	function p_suffixes_update()
	{
		if (!$this->session->userdata('identity'))
		{
			
			redirect('admin/login', 'refresh');
		}else{		
			
						
			
			$id=$this->input->post('pid');
			$data=$this->input->post('professional_suffixes');
			
						
		$this->dashboard_model->p_suffixes_update($id,$data);			
		
		
        redirect('dashboard/edit_staff/'.$id, 'refresh'); 
		
		
			
		}		
	}
	
	


function specialties_edit($id){
	
	 
	
	$data['id']=$id;   
	$data['dashboardOption_2']=$this->dashboard_model->dashboard_option_2($id);   
	
	$this->load->view('specialties_edit_view',$data);
	
	}
	
	
		
	//update specialties data of staff
	function specialties_update()
	{
		if (!$this->session->userdata('identity'))
		{
			
			redirect('admin/login', 'refresh');
		}else{		
			
						
			
			$id=$this->input->post('pid');
			$data=$this->input->post('specialties');
			
						
		$this->dashboard_model->specialties_update($id,$data);			
		
		
        redirect('dashboard/edit_staff/'.$id, 'refresh'); 
		
		
			
		}		
	}
	
	
	

	function visit_reasons_edit($id){
	
	$this->data['dashboardOption_3'] = $this->dashboard_model->dashboard_option_3($id);
	
	$data['id']=$id;   
	$data['dashboardOption_3']=$this->data['dashboardOption_3'];   
	
	$this->load->view('visit_reasons_view',$data);
	
	}
	
	
	//update visit_reasons data of staff
	function visit_reasons_update()
	{
	
		if (!$this->session->userdata('identity'))
		{
			
			redirect('admin/login', 'refresh');
		}else{		
			
			
			
			$id =$this->input->post('pid');
			//$time =$this->input->post('time');
			$data =$this->input->post('visit_reasons');
			
	
	    $this->dashboard_model->visit_reasons_update($id,$data);	
		
        redirect('dashboard/edit_staff/'.$id, 'refresh'); 
		
		
			
		}		
	}
	
	//Education edit Option
	function education_edit($id){
	
	$this->data['dashboardOption_4'] = $this->dashboard_model->dashboard_option_4($id);
	
	$data['id']=$id;   
	$data['dashboardOption_4']=$this->data['dashboardOption_4'];   
	
	$this->load->view('education_edit_view',$data);
	
	}
	
	
	
		//update education data of staff
	function education_update()
	{
		if (!$this->session->userdata('identity'))
		{
			
			redirect('admin/login', 'refresh');
		}else{		
			
						
			
			$id=$this->input->post('pid');
			$data=$this->input->post('education');
			
						
		$this->dashboard_model->education_update($id,$data);			
		
		
        redirect('dashboard/edit_staff/'.$id, 'refresh'); 
		
		
			
		}		
	}
	
	
	
	
	
	
//hospital affiliation  details*********************************###################################*********************
	
	
		//Education edit Option
	function h_affiliations_edit($id){
	
	$this->data['dashboardOption_5'] = $this->dashboard_model->dashboard_option_5($id);
	
	$data['id']=$id;   
	$data['dashboardOption_5']=$this->data['dashboardOption_5'];   
	
	$this->load->view('h_affiliations_edit_view',$data);
	
	}
	
	
	
		//update education data of staff
	function h_affiliations_update()
	{
		if (!$this->session->userdata('identity'))
		{
			
			redirect('admin/login', 'refresh');
		}else{		
			
						
			
			$id=$this->input->post('pid');
			$data=$this->input->post('h_affiliations');
			
						
		$this->dashboard_model->h_affiliations_update($id,$data);			
		
		
        redirect('dashboard/edit_staff/'.$id, 'refresh'); 
		
		
			
		}		
	}
	
	
	
	//Education edit Option
	function h_affiliations_del($id){
	//$id = ltrim($id, '_');
	$id = explode('_', $id);
	//print_r($id);
	$this->dashboard_model->h_affiliations_del($id[0]);
	
	//$data['id']=$id;   
	//$data['dashboardOption_4']=$this->data['dashboardOption_4'];   
	
	redirect('dashboard/edit_staff/'.$id[1]);
	
	}
	
//#########################################################################################################	
//Language  details**************Start*******************###################################***************
//#########################################################################################################	
	
	
	
	
	
	
	
	function languages_edit($id){
	
	$this->data['dashboardOption_6'] = $this->dashboard_model->dashboard_option_6($id);
	
	$data['id']=$id;   
	$data['dashboardOption_6']=$this->data['dashboardOption_6'];   
	
	$this->load->view('languages_edit_view',$data);
	
	}
	
		
	//update languages data of staff
	
	function languages_update()
	{
		if (!$this->session->userdata('identity'))
		{
			
			redirect('admin/login', 'refresh');
		}else{		
			
						
			
			$id=$this->input->post('pid');
			$data=$this->input->post('languages');
			
						
		$this->dashboard_model->languages_update($id,$data);			
		
		
        redirect('dashboard/edit_staff/'.$id, 'refresh'); 
		
		
			
		}		
	}

//#########################################################################################################	
//Language  details********************EnD*************###################################*****************
//##########################################################################################################	
//						|
//				?	  |_|_|       /

//             /--|		|	   |  |
//	          /   |		| 	   |  |
//      	 |    |		|      |  |
//	          \___|_____|_____/   |
	
//#########################################################################################################	
//board_certifications_edit details**************Start*******************###################################****
//#########################################################################################################	
	
	
	
	
	
	
	
	function board_certifications_edit($id){
	
	$this->data['dashboardOption_7'] = $this->dashboard_model->dashboard_option_7($id);
	
	$data['id']=$id;   
	$data['dashboardOption_7']=$this->data['dashboardOption_7'];   
	
	$this->load->view('board_certifications_edit_view',$data);
	
	}
	
		
	//update languages data of staff
	
	function board_certifications_update()
	{
		if (!$this->session->userdata('identity'))
		{
			
			redirect('admin/login', 'refresh');
		}else{		
			
						
			
			$id=$this->input->post('pid');
			$data=$this->input->post('board_certifications');
			
						
		$this->dashboard_model->board_certifications_update($id,$data);			
		
		
        redirect('dashboard/edit_staff/'.$id, 'refresh'); 
		
		
			
		}		
	}

//#########################################################################################################	
// Board Certifications Edit  details********************EnD*************###################################*********************
//##########################################################################################################	
					//						|
					//				?	  |_|_|       /
					
					//             /--|		|	   |  |
					//	          /   |		| 	   |  |
					//      	 |    |		|      |  |
					//	          \___|_____|_____/   |

//#########################################################################################################	
// Gallery  details********************EnD*************###################################*********************
//##########################################################################################################	





		
	
	public function gallery() {   
	
    
	 $data=array();
	if($this->input->post('upload')){
	
	$id=$this->input->post('pid');
	//$this->input->post('upload');
	$this->gallery_model->doUpload($id);
	
	}
	
   	redirect('dashboard/edit_staff/'.$id, 'refresh'); 
   
    }
	
	

	 

}
