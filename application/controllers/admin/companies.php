<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Companies extends Web_Controller {

	function __construct()

    {

		// Call the Model constructor

		parent::__construct();

		if(!$this->session->userdata('admin_logged_in'))

		{

		   redirect('admin/login');		

		}

		$this->load->model('admin_model');	
		$this->load->model('location_model');	
		$this->load->model('countries_model');
		$this->load->model('company_model');
		$this->load->model('config_model');
	}

		

	public function index()

	{

		redirect('admin/companies/lists');		

	}

	

	public function lists()

	{

		$this->load->library('pagination');

		$main['page_title']=$this->config->item('site_name').' - Users';

		$main['header']=$this->adminheader();

		$main['footer']=$this->adminfooter();

		$main['left']=$this->adminleftmenu();

		$config['base_url'] = site_url('admin/companies/lists/');

		$config['total_rows'] = $this->admin_model->get_pagination_count(array('admin.roles_id != '=>1));

		$config['per_page'] = '10';

		$config['uri_segment'] = 4;

		$config['first_link'] = 'First';

		$config['last_link'] = 'Last';

		$config['cur_tag_open'] = '<span>';

		$config['cur_tag_close'] = '</span>';

		$this->pagination->initialize($config);
		
		$content['companies']=$this->company_model->get_pagination($config['per_page'],$this->uri->segment($config['uri_segment']));

		$main['content']=$this->load->view('admin/companies/lists',$content,true);

		$this->load->view('admin/main',$main);

	}

		public function config_lists()

	{

		$this->load->library('pagination');

		$main['page_title']=$this->config->item('site_name').' - Users';

		$main['header']=$this->adminheader();

		$main['footer']=$this->adminfooter();

		$main['left']=$this->adminleftmenu();

		$config['base_url'] = site_url('admin/companies/config_lists/');

		$config['total_rows'] = $this->admin_model->get_pagination_count(array('admin.roles_id != '=>1));

		$config['per_page'] = '10';

		$config['uri_segment'] = 4;

		$config['first_link'] = 'First';

		$config['last_link'] = 'Last';

		$config['cur_tag_open'] = '<span>';

		$config['cur_tag_close'] = '</span>';

		$this->pagination->initialize($config);
		
		$content['configuration']=$this->config_model->get_pagination($config['per_page'],$this->uri->segment($config['uri_segment']));

		$main['content']=$this->load->view('admin/companies/config_list',$content,true);

		$this->load->view('admin/main',$main);

	}

	

	function add()

	{

		$this->form_validation->set_rules('name', 'Name', 'required');

		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');

		$this->form_validation->set_rules('username', 'Username', 'required|is_unique[admin.username]');

		$this->form_validation->set_rules('password', 'Password', 'required|matches[passwordconf]');

		$this->form_validation->set_rules('passwordconf', 'Confirm Password', 'required');

		$this->form_validation->set_rules('status', 'Status', 'required');

		$this->form_validation->set_rules('roles_id', 'roles_id', 'required');
         $this->form_validation->set_rules('trn', 'TRN', 'required');
        $this->form_validation->set_rules('country', 'Country', 'required');
		$this->form_validation->set_message('required', 'required');

		$this->form_validation->set_message('valid_email', 'invalid email');

		$this->form_validation->set_message('is_unique', 'already exists');

		$this->form_validation->set_message('matches', 'password mismatch');

		$this->form_validation->set_error_delimiters('<span class="red">(', ')</span>');

		if ($this->form_validation->run() == FALSE)

		{

			$main['page_title']=$this->config->item('site_name').' - Users';

			$main['header']=$this->adminheader();

			$main['footer']=$this->adminfooter();

			$main['left']=$this->adminleftmenu();

			$content['roles']=$this->admin_model->get_roles_array();
			
		    $content['locations']=$this->location_model->get_active();
		    $content['countries']=$this->countries_model->get_active();

			$main['content']=$this->load->view('admin/companies/add',$content,true);

			$this->load->view('admin/main',$main);

		} else {

			$password=md5($this->input->post('password'));

			
			    $result=$this->company_model->get_details();
			   
			    if($result)
			    {
			    	$id=$result+1;
			    	$numlength = strlen((string)$id);
if($numlength<=3)
{
	if($numlength==1)
	{
		$id='000'.$id;
	}
	elseif($numlength==2)
	{
		$id='00'.$id;
	}
	elseif($numlength==3)
	{
		$id='0'.$id;
	}
}
else
{
	$id=$result+1;
}
}
else
{
	$id='0001';
}
$ref_id=$id;
			$company_data=array(
				'ref_id'=>$id,

				'name'=>$this->input->post('name'),

				'email'=>$this->input->post('email'),
				
				'city'=>$this->input->post('city'),
				'country'=>$this->input->post('country'),
				'phone'=>$this->input->post('phone'),
				'trn'=>$this->input->post('trn'),
				'address'=>$this->input->post('address'),
				'status'=>$this->input->post('status')
			);

            $companyid=$this->company_model->insert($company_data);
            if($companyid){
            	$data=array(

				'name'=>$this->input->post('name'),

				'email'=>$this->input->post('email'),
				
				'location'=>$this->input->post('location'),

				'username'=>$this->input->post('username'),

				'password'=>$password,
				'roles_id'=>$this->input->post('roles_id'),
                'company_ref_no'=>$id,
				'status'=>$this->input->post('status'));
			$loginid=$this->admin_model->insert($data);

			if($loginid){

				$this->session->set_flashdata('message', '<div class="n_ok flash_messages"><p>User added Successfully.</p></div>');

				redirect('admin/companies/lists');

			} else {

				$this->session->set_flashdata('message', '<div class="n_error flash_messages"><p>Error!! - User not added.</p></div>');

				redirect('admin/companies/lists');

			}
		}

		}

	}

	

	function edit($id,$return)

	{

	    $this->form_validation->set_rules('name', 'Name', 'required');

		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');		

		$this->form_validation->set_rules('status', 'Status', 'required');

		$this->form_validation->set_rules('roles_id', 'roles_id', 'required');
         $this->form_validation->set_rules('trn', 'TRN', 'required');
        $this->form_validation->set_rules('country', 'Country', 'required');
		$this->form_validation->set_message('required', 'required');

		$this->form_validation->set_message('valid_email', 'invalid email');

		$this->form_validation->set_message('is_unique', 'already exists');

		$this->form_validation->set_message('matches', 'password mismatch');

		$this->form_validation->set_error_delimiters('<span class="red">(', ')</span>');

		if ($this->form_validation->run() == FALSE)

		{

			$main['page_title']=$this->config->item('site_name').' - Users';

			$main['header']=$this->adminheader();

			$main['footer']=$this->adminfooter();

			$main['left']=$this->adminleftmenu();

			$edit['return']=$return;

			$edit['roles']=$this->admin_model->get_roles_array();

			$edit['company']= $this->company_model->load($id);
			 $edit['countries']=$this->countries_model->get_active();
			
		    $edit['locations']=$this->location_model->get_active();

			$main['content']=$this->load->view('admin/companies/edit',$edit,true);

			$this->load->view('admin/main',$main);

		} else { 

			$data=array(

				'name'=>$this->input->post('name'),

				'email'=>$this->input->post('email'),
				
				'location'=>$this->input->post('location'),				

				'roles_id'=>$this->input->post('roles_id'),

				'status'=>$this->input->post('status'));
				$company_data=array(			

				'name'=>$this->input->post('name'),

				'email'=>$this->input->post('email'),
				
				'city'=>$this->input->post('city'),
				'country'=>$this->input->post('country'),
				'phone'=>$this->input->post('phone'),
				'trn'=>$this->input->post('trn'),
				'address'=>$this->input->post('address'),
				'status'=>$this->input->post('status')
			);           					
            
			$cond=array('id'=>$id);			
            $ref_no=$this->company_model->get_row_cond($cond);
            $cond1=array('ref_id'=>$ref_no->ref_id);
            $companyid=$this->company_model->update($company_data,$cond1);		
			$loginid=$this->admin_model->update($data,$cond);

			if($loginid){

				$this->session->set_flashdata('message', '<div class="n_ok flash_messages"><p>Company Details updated Successfully.</p></div>');

				redirect('admin/companies/lists/'.$return);

			} else {

				$this->session->set_flashdata('message', '<div class="n_error flash_messages"><p>Error!! - Company Details not updated.</p></div>');

				redirect('admin/companies/lists/'.$return);

			}

		}

	}

	

	function delete($id,$return)

	{

		$cond=array('id'=>$id);		
		 $ref_no=$this->company_model->get_row_cond($cond);
         $cond1=array('company_ref_no'=>$ref_no->ref_id);
         $companyid=$this->company_model->delete($cond);	
        if($companyid){
        $loginid=$this->admin_model->delete($cond1);	
        }
		if($loginid){

			$this->session->set_flashdata('message', '<div class="n_ok flash_messages"><p>User deleted Successfully.</p></div>');

			redirect('admin/companies/lists/'.$return);

		} else {

			$this->session->set_flashdata('message', '<div class="n_error flash_messages"><p>Error!! - User not deleted.</p></div>');

			redirect('admin/companies/lists/'.$return);

		}

	}

	function add_configuration($id="",$return=""){
		$this->load->library('ckeditor');

		$this->load->library('ckfinder');

		$this->ckeditor->basePath = base_url('public/admin/ckeditor/');

		$this->ckeditor->config['language'] = 'en';

		$this->ckeditor->config['width'] = '100%';

		$this->ckeditor->config['height'] = '200px';

		//Add Ckfinder to Ckeditor

		$this->ckfinder->SetupCKEditor($this->ckeditor,base_url('public/admin/ckfinder/'));

		$this->form_validation->set_rules('company_id', 'Company', 'required');

		$this->form_validation->set_rules('head_color', 'Header Color', 'required');

		$this->form_validation->set_rules('footer_color', 'Footer Color', 'required');

		$this->form_validation->set_rules('banner_image', 'Banner Image', 'required]');

		$this->form_validation->set_rules('banner_message', 'Banner Message', 'required');

		$this->form_validation->set_rules('status', 'Status', 'required');

		$this->form_validation->set_rules('terms', 'Terms And Conditions', 'required');
        $this->form_validation->set_message('required', 'required');

		$this->form_validation->set_error_delimiters('<span class="red">(', ')</span>');

		if ($this->form_validation->run() == FALSE)

		{

			$main['page_title']=$this->config->item('site_name').' - Users';

			$main['header']=$this->adminheader();

			$main['footer']=$this->adminfooter();

			$main['left']=$this->adminleftmenu();

			$content['companies']=$this->company_model->get_array();			
		  if($id!=""){
		  	$cond=array('company_id'=>$id);
		  	$content['frmdata']=$this->config_model->get_row_cond($cond);	
		    }
			$main['content']=$this->load->view('admin/companies/add_config',$content,true);

			$this->load->view('admin/main',$main);

		} else {
			$data=array(

				'company_id'=>$this->input->post('company_id'),

				'header_color'=>$this->input->post('head_color'),
				
				'footer_color'=>$this->input->post('footer_color'),				

				'banner_text'=>$this->input->post('banner_message'),
				'terms'=>$this->input->post('terms')               
				);
			$this->load->library('upload');
			$banner_image=$this->input->post('banner_image');

			$config['upload_path'] = 'public/uploads/banners';

			$config['allowed_types'] = 'gif|jpg|png|pdf';

								
			$this->upload->initialize($config); 

			if($this->upload->do_upload('banner_image'))

			{

				$banner_imagedata=$this->upload->data();

				$data['banner_image']=$banner_imagedata['file_name'];

			}
           
            	
				$id=$this->input->post('company_id');
				$cond=array('company_id'=>$id);
				$successid=$this->config_model->insert($data);
				// $id_check=$this->config_model->check_access($cond);
				// if($id_check>0){
				// $successid=$this->config_model->update($data,$cond);
				// }
				// else{
					
				// }			    

			    if($successid){

				$this->session->set_flashdata('message', '<div class="n_ok flash_messages"><p>Company Configuration added Successfully.</p></div>');

				redirect('admin/companies/config_lists');

			  } else {

				$this->session->set_flashdata('message', '<div class="n_error flash_messages"><p>Error!! - Company Configuration not added.</p></div>');

				redirect('admin/companies/config_lists');

			}
	

		}

	}

	function edit_configuration($id,$return){
       $this->load->library('ckeditor');

		$this->load->library('ckfinder');

		$this->ckeditor->basePath = base_url('public/admin/ckeditor/');

		$this->ckeditor->config['language'] = 'en';

		$this->ckeditor->config['width'] = '100%';

		$this->ckeditor->config['height'] = '200px';

		//Add Ckfinder to Ckeditor

		$this->ckfinder->SetupCKEditor($this->ckeditor,base_url('public/admin/ckfinder/'));

		$this->form_validation->set_rules('company_id', 'Company', 'required');

		$this->form_validation->set_rules('head_color', 'Header Color', 'required');

		$this->form_validation->set_rules('footer_color', 'Footer Color', 'required');

		//$this->form_validation->set_rules('banner_image', 'Banner Image', 'required]');

		$this->form_validation->set_rules('banner_message', 'Banner Message', 'required');

		

		$this->form_validation->set_rules('terms', 'Terms And Conditions', 'required');
        $this->form_validation->set_message('required', 'required');

		$this->form_validation->set_error_delimiters('<span class="red">(', ')</span>');

		if ($this->form_validation->run() == FALSE)

		{

			$main['page_title']=$this->config->item('site_name').' - Users';

			$main['header']=$this->adminheader();

			$main['footer']=$this->adminfooter();

			$main['left']=$this->adminleftmenu();
			$content['return']=$return;

			$content['companies']=$this->company_model->get_array();			
		    if($id!=""){
		  	$cond=array('company_id'=>$id);
		  	$content['frmdata']=$this->config_model->get_row_cond($cond);	
		    }
			$main['content']=$this->load->view('admin/companies/config_edit',$content,true);

			$this->load->view('admin/main',$main);

		} else {
			$data=array(

				'company_id'=>$this->input->post('company_id'),

				'header_color'=>$this->input->post('head_color'),
				
				'footer_color'=>$this->input->post('footer_color'),				

				'banner_text'=>$this->input->post('banner_message'),
				'terms'=>$this->input->post('terms')               
				);
			$this->load->library('upload');
			$banner_image=$this->input->post('banner_image');

			$config['upload_path'] = 'public/uploads/banners';

			$config['allowed_types'] = 'gif|jpg|png|pdf';

								
			$this->upload->initialize($config); 

			if($this->upload->do_upload('banner_image'))

			{

				$banner_imagedata=$this->upload->data();

				$data['banner_image']=$banner_imagedata['file_name'];

			}           
            	
				$id=$this->input->post('company_id');
				$cond=array('company_id'=>$id);
				$successid=$this->config_model->update($data,$cond);
			    if($successid){

				$this->session->set_flashdata('message', '<div class="n_ok flash_messages"><p>Configuration Edited Successfully.</p></div>');

				redirect('admin/companies/config_lists');

			  } else {

				$this->session->set_flashdata('message', '<div class="n_error flash_messages"><p>Error!! - Configuration not updated.</p></div>');

				redirect('admin/companies/config_lists');

			}
	

		}

	}

	

	function changepwd($id,$return)

	{

		$this->form_validation->set_rules('pass', 'Password', 'required|matches[passconf]');

		$this->form_validation->set_rules('passconf', 'Confirm Password', 'required');

		$this->form_validation->set_message('required', 'required');

		$this->form_validation->set_message('matches', 'password mismatch');

		$this->form_validation->set_error_delimiters('<span class="red">(', ')</span>');

		if ($this->form_validation->run() == FALSE)

		{

			$changepwd['id']=$id;

			$changepwd['return']=$return;

			$main['page_title']=$this->config->item('site_name').' - Users';

			$main['header']=$this->adminheader();

			$main['footer']=$this->adminfooter();

			$main['left']=$this->adminleftmenu();

			$main['content']=$this->load->view('admin/companies/changepwd',$changepwd,true);

			$this->load->view('admin/main',$main);

		} else {

			$pass=md5($this->input->post('pass'));

			$data=array('password'=>$pass);

			$cond=array('id'=>$id);

			$loginid=$this->admin_model->update($data,$cond);			

			if($loginid){

				$this->session->set_flashdata('message', '<div class="n_ok flash_messages"><p>Password Changed Successfully.</p></div>');

				redirect('admin/companies/lists/'.$return);

			} else {

				$this->session->set_flashdata('message', '<div class="n_error flash_messages"><p>Error!! - Password Change Failed.</p></div>');

				redirect('admin/companies/lists/'.$return);

			}

		}

	}

	

	function code_exists($code)

	{

		$id= $this->input->post('id');

		if ($this->admin_model->code_exists($code,$id))

		{

			$this->form_validation->set_message('code_exists', 'already exists');

			return FALSE;

		}

		else

		{

			return TRUE;

		}

	}

	

	public function roles()

	{

		$main['page_title']=$this->config->item('site_name').' - Roles';

		$main['header']=$this->adminheader();

		$main['footer']=$this->adminfooter();

		$main['left']=$this->adminleftmenu();

		$config['base_url'] = site_url('admin/companies/roles/');

		$content['roles']=$this->admin_model->get_roles_array();

		$main['content']=$this->load->view('admin/companies/roles',$content,true);

		$this->load->view('admin/main',$main);

	}

	

	public function permission()

	{

		//$this->form_validation->set_rules("roleid[]", 'Options', 'required');

		if ($this->form_validation->run() == FALSE)

		{

			$main['page_title']=$this->config->item('site_name').' - Permission';

			$main['header']=$this->adminheader();

			$main['footer']=$this->adminfooter();

			$main['left']=$this->adminleftmenu();

			$config['base_url'] = site_url('admin/companies/permission/');

			$content['permissions']=$this->admin_model->get_permission_array();

			$content['roles']=$this->admin_model->get_roles_array();

			foreach($content['roles'] as $key => $val):

			$content['access'][$val['roles_id']]=$this->admin_model->get_access_array(array('roles_id'=>$val['roles_id']));

			endforeach;

			$main['content']=$this->load->view('admin/companies/permission',$content,true);

			$this->load->view('admin/main',$main);

		}

		if($this->input->post())

		{

			$loginid=false;

			foreach($content['roles'] as $key => $val):

			if(isset($_POST['roleid'.$val['roles_id']])){ 

				$this->admin_model->clear_access(array('roles_id'=>$val['roles_id']));	

				foreach($_POST['roleid'.$val['roles_id']] as $id => $access): 

					$data=array('roles_id'=>$val['roles_id'],'permissions_id'=>$access); 

					$loginid=$this->admin_model->permission_access($data);				

				endforeach;			

			}

			endforeach;

			if($loginid){

				$this->session->set_flashdata('message', '<div class="n_ok flash_messages"><p>Permission updated Successfully.</p></div>');

				redirect('admin/companies/permission');

			} else {

				$this->session->set_flashdata('message', '<div class="n_error flash_messages"><p>Error!! - Permission not updated.</p></div>');

				redirect('admin/companies/permission');

			}

		}

	}

}

/* End of file users.php */

/* Location: ./application/controllers/admin/users.php */