<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Subusers extends Web_Controller {

	function __construct()

    {

		// Call the Model constructor

		parent::__construct();

		if(!$this->session->userdata('admin_logged_in'))

		{

		   redirect('admin/login');		

		}

		$this->load->model('user_model');	

	}

		

	public function index()

	{

		redirect('admin/subusers/lists');		

	}

	

	public function lists()

	{

		$this->load->library('pagination');

		$main['page_title']=$this->config->item('site_name').' - Sub Users';

		$main['header']=$this->adminheader();

		$main['footer']=$this->adminfooter();

		$main['left']=$this->adminleftmenu();

		$config['base_url'] = site_url('admin/subusers/lists/');

		$config['total_rows'] = $this->user_model->get_pagination_count();

		$config['per_page'] = '10';

		$config['uri_segment'] = 4;

		$config['first_link'] = 'First';

		$config['last_link'] = 'Last';

		$config['cur_tag_open'] = '<span>';

		$config['cur_tag_close'] = '</span>';

		$this->pagination->initialize($config);

		$content['users']=$this->user_model->get_pagination($config['per_page'],$this->uri->segment($config['uri_segment']));

		$main['content']=$this->load->view('admin/subusers/lists',$content,true);

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

		//$this->form_validation->set_rules('roles_id', 'roles_id', 'required');

		$this->form_validation->set_message('required', 'required');

		$this->form_validation->set_message('valid_email', 'invalid email');

		$this->form_validation->set_message('is_unique', 'already exists');

		$this->form_validation->set_message('matches', 'password mismatch');

		$this->form_validation->set_error_delimiters('<span class="red">(', ')</span>');

		if ($this->form_validation->run() == FALSE)

		{

			$main['page_title']=$this->config->item('site_name').' - Sub Users';

			$main['header']=$this->adminheader();

			$main['footer']=$this->adminfooter();

			$main['left']=$this->adminleftmenu();

			$content['roles']=$this->user_model->get_roles_array();

			$main['content']=$this->load->view('admin/subusers/add',$content,true);

			$this->load->view('admin/main',$main);

		} else {

			$password=md5($this->input->post('password'));

			$data=array(

				'name'=>$this->input->post('name'),

				'email'=>$this->input->post('email'),

				'username'=>$this->input->post('username'),

				'password'=>$password,

				'roles_id'=>$this->input->post('roles_id'),

				'status'=>$this->input->post('status'));

			$loginid=$this->user_model->insert($data);

			if($loginid){

				$this->session->set_flashdata('message', '<div class="n_ok flash_messages"><p>Sub User added Successfully.</p></div>');

				redirect('admin/subusers/lists');

			} else {

				$this->session->set_flashdata('message', '<div class="n_error flash_messages"><p>Error!! - Sub User not added.</p></div>');

				redirect('admin/subusers/lists');

			}

		}

	}

	

	function edit($id,$return)

	{

		$this->form_validation->set_rules('name', 'Name', 'required');

		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');

		$this->form_validation->set_rules('username', 'Username', 'required|callback_code_exists');

		//$this->form_validation->set_rules('roles_id', 'roles_id', 'required');

		$this->form_validation->set_rules('status', 'Status', 'required');

		$this->form_validation->set_message('required', 'required');

		$this->form_validation->set_message('valid_email', 'invalid email');

		$this->form_validation->set_error_delimiters('<span class="red">(', ')</span>');

		if ($this->form_validation->run() == FALSE)

		{

			$main['page_title']=$this->config->item('site_name').' - Sub Users';

			$main['header']=$this->adminheader();

			$main['footer']=$this->adminfooter();

			$main['left']=$this->adminleftmenu();

			$edit['return']=$return;

			$edit['roles']=$this->user_model->get_roles_array();

			$edit['user']= $this->user_model->load($id);

			$main['content']=$this->load->view('admin/subusers/edit',$edit,true);

			$this->load->view('admin/main',$main);

		} else { 

			$data=array(

				'name'=>$this->input->post('name'),

				'email'=>$this->input->post('email'),

				'username'=>$this->input->post('username'),

				'roles_id'=>$this->input->post('roles_id'),

				'status'=>$this->input->post('status'));						

			$cond=array('id'=>$id);

			$loginid=$this->user_model->update($data,$cond);

			if($loginid){

				$this->session->set_flashdata('message', '<div class="n_ok flash_messages"><p>Sub User updated Successfully.</p></div>');

				redirect('admin/subusers/lists/'.$return);

			} else {

				$this->session->set_flashdata('message', '<div class="n_error flash_messages"><p>Error!! - Sub User not updated.</p></div>');

				redirect('admin/subusers/lists/'.$return);

			}

		}

	}

	

	function delete($id,$return)

	{

		$cond=array('id'=>$id);

		$loginid=$this->user_model->delete($cond);

		if($loginid){

			$this->session->set_flashdata('message', '<div class="n_ok flash_messages"><p>Sub User deleted Successfully.</p></div>');

			redirect('admin/subusers/lists/'.$return);

		} else {

			$this->session->set_flashdata('message', '<div class="n_error flash_messages"><p>Error!! - Sub User not deleted.</p></div>');

			redirect('admin/subusers/lists/'.$return);

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

			$main['page_title']=$this->config->item('site_name').' - Sub Users';

			$main['header']=$this->adminheader();

			$main['footer']=$this->adminfooter();

			$main['left']=$this->adminleftmenu();

			$main['content']=$this->load->view('admin/subusers/changepwd',$changepwd,true);

			$this->load->view('admin/main',$main);

		} else {

			$pass=md5($this->input->post('pass'));

			$data=array('password'=>$pass);

			$cond=array('id'=>$id);

			$loginid=$this->user_model->update($data,$cond);			

			if($loginid){

				$this->session->set_flashdata('message', '<div class="n_ok flash_messages"><p>Password Changed Successfully.</p></div>');

				redirect('admin/subusers/lists/'.$return);

			} else {

				$this->session->set_flashdata('message', '<div class="n_error flash_messages"><p>Error!! - Password Change Failed.</p></div>');

				redirect('admin/subusers/lists/'.$return);

			}

		}

	}

	

	function code_exists($code)

	{

		$id= $this->input->post('id');

		if ($this->user_model->code_exists($code,$id))

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

		$config['base_url'] = site_url('admin/users/roles/');

		$content['roles']=$this->user_model->get_roles_array();

		$main['content']=$this->load->view('admin/users/roles',$content,true);

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

			$config['base_url'] = site_url('admin/users/permission/');

			$content['permissions']=$this->user_model->get_permission_array();

			$content['roles']=$this->user_model->get_roles_array();

			foreach($content['roles'] as $key => $val):

			$content['access'][$val['roles_id']]=$this->user_model->get_access_array(array('roles_id'=>$val['roles_id']));

			endforeach;

			$main['content']=$this->load->view('admin/users/permission',$content,true);

			$this->load->view('admin/main',$main);

		}

		if($this->input->post())

		{

			$loginid=false;

			foreach($content['roles'] as $key => $val):

			if(isset($_POST['roleid'.$val['roles_id']])){ 

				$this->user_model->clear_access(array('roles_id'=>$val['roles_id']));	

				foreach($_POST['roleid'.$val['roles_id']] as $id => $access): 

					$data=array('roles_id'=>$val['roles_id'],'permissions_id'=>$access); 

					$loginid=$this->user_model->permission_access($data);				

				endforeach;			

			}

			endforeach;

			if($loginid){

				$this->session->set_flashdata('message', '<div class="n_ok flash_messages"><p>Permission updated Successfully.</p></div>');

				redirect('admin/users/permission');

			} else {

				$this->session->set_flashdata('message', '<div class="n_error flash_messages"><p>Error!! - Permission not updated.</p></div>');

				redirect('admin/users/permission');

			}

		}

	}

}

/* End of file users.php */

/* Location: ./application/controllers/admin/users.php */