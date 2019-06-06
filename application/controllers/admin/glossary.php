<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Glossary extends Web_Controller {
	function __construct()
    {
		// Call the Model constructor
		parent::__construct();
		if(!$this->session->userdata('admin_logged_in'))
		{
		   redirect('admin/login');		
		}
		$this->load->model('glossary_model');	
	}
		
	public function index()
	{
		redirect('admin/glossary/lists');		
	}
	
	public function lists()
	{
		$this->load->library('pagination');
		$main['page_title']=$this->config->item('site_name').' - Glossary';
		$main['header']=$this->adminheader();
		$main['footer']=$this->adminfooter();
		$main['left']=$this->adminleftmenu();
		$config['base_url'] = site_url('admin/glossary/lists/');
		$config['total_rows'] = $this->glossary_model->get_pagination_count();
		$config['per_page'] = '10';
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['cur_tag_open'] = '<span>';
		$config['cur_tag_close'] = '</span>';
		$this->pagination->initialize($config);
		$content['glossary']=$this->glossary_model->get_pagination($config['per_page'],$this->uri->segment($config['uri_segment']));
		$main['content']=$this->load->view('admin/glossary/lists',$content,true);
		$this->load->view('admin/main',$main);
	}
	
	function add()
	{
		$this->load->library('ckeditor');
		$this->load->library('ckfinder');
		$this->ckeditor->basePath = base_url('public/admin/ckeditor/');
		$this->ckeditor->config['language'] = 'en';
		$this->ckeditor->config['width'] = '100%';
		$this->ckeditor->config['height'] = '200px';
		//Add Ckfinder to Ckeditor
		$this->ckfinder->SetupCKEditor($this->ckeditor,base_url('public/admin/ckfinder/'));
		$this->form_validation->set_rules('question', 'Question', 'required');
		$this->form_validation->set_rules('answer', 'Answer', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');
		$this->form_validation->set_message('required', 'required');
		$this->form_validation->set_error_delimiters('<span class="red">(', ')</span>');
		if ($this->form_validation->run() == FALSE)
		{
			$main['page_title']=$this->config->item('site_name').' - Glossary';
			$main['header']=$this->adminheader();
			$main['footer']=$this->adminfooter();
			$main['left']=$this->adminleftmenu();
			$main['content']=$this->load->view('admin/glossary/add','',true);
			$this->load->view('admin/main',$main);
		} else {
			$maindata=array('status'=>$this->input->post('status'),'question'=>$this->input->post('question'),'answer'=>$this->input->post('answer'),'language'=>$this->session->userdata('admin_language'));
			$insertid=$this->glossary_model->insert($maindata);
			if($insertid){
				$this->session->set_flashdata('message', '<div class="n_ok flash_messages"><p>Glossary added Successfully.</p></div>');
				redirect('admin/glossary/lists');
			} else {
				$this->session->set_flashdata('message', '<div class="n_error flash_messages"><p>Error!! - Glossary not added.</p></div>');
				redirect('admin/glossary/lists');
			}
		}
	}
	
	function edit($id,$return)
	{
		$glossary= $this->glossary_model->load($id);
		if(!$glossary){redirect('admin/glossary/lists');}
		$this->load->library('ckeditor');
		$this->load->library('ckfinder');
		$this->ckeditor->basePath = base_url('public/admin/ckeditor/');
		$this->ckeditor->config['language'] = 'en';
		$this->ckeditor->config['width'] = '100%';
		$this->ckeditor->config['height'] = '200px';
		//Add Ckfinder to Ckeditor
		$this->ckfinder->SetupCKEditor($this->ckeditor,base_url('public/admin/ckfinder/'));
		$this->form_validation->set_rules('question', 'Question', 'required');
		$this->form_validation->set_rules('answer', 'Answer', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');
		$this->form_validation->set_message('required', 'required');
		$this->form_validation->set_error_delimiters('<span class="red">(', ')</span>');
		if ($this->form_validation->run() == FALSE)
		{
			$main['page_title']=$this->config->item('site_name').' - Glossary';
			$main['header']=$this->adminheader();
			$main['footer']=$this->adminfooter();
			$main['left']=$this->adminleftmenu();
			$edit['return']=$return;
			$edit['glossary']= $glossary;
			$main['content']=$this->load->view('admin/glossary/edit',$edit,true);
			$this->load->view('admin/main',$main);
		} else {
			$maindata=array('status'=>$this->input->post('status'),'question'=>$this->input->post('question'),'answer'=>$this->input->post('answer'),'language'=>$this->session->userdata('admin_language'));
			$loginid=$this->glossary_model->update($maindata,array('id'=>$id));
			if($loginid){
				$this->session->set_flashdata('message', '<div class="n_ok flash_messages"><p>Glossary updated Successfully.</p></div>');
				redirect('admin/glossary/lists/'.$return);
			} else {
				$this->session->set_flashdata('message', '<div class="n_error flash_messages"><p>Error!! - Glossary not updated.</p></div>');
				redirect('admin/glossary/lists/'.$return);
			}
		}
	}
	
	function delete($id,$return)
	{
		$loginid=$this->glossary_model->delete(array('id'=>$id));
		if($loginid){
			$this->session->set_flashdata('message', '<div class="n_ok flash_messages"><p>Glossary deleted Successfully.</p></div>');
			redirect('admin/glossary/lists/'.$return);
		} else {
			$this->session->set_flashdata('message', '<div class="n_error flash_messages"><p>Error!! - Glossary not deleted.</p></div>');
			redirect('admin/glossary/lists/'.$return);
		}
	}
	
	function actions()
	{
		$ids=$this->input->post('id');
		if(isset($_POST['enable']) && $this->input->post('enable')=='Enable'){ $status='Y';}
		if(isset($_POST['disable']) && $this->input->post('disable')=='Disable'){ $status='N';}
		if(count($ids)>0){
			foreach($ids as $id):
				$data=array('status'=>$status);
				$loginid=$this->glossary_model->update($data,array(),$id);				
			endforeach;
			if($loginid){
				$this->session->set_flashdata('message', '<div class="n_ok flash_messages"><p>Glossary updated Successfully.</p></div>');
			} else {
				$this->session->set_flashdata('message', '<div class="n_error flash_messages"><p>Error!! - Glossary not updated.</p></div>');
			}
		}
		redirect('admin/glossary/lists/'.$this->input->post('return'));
	}	
	
}
/* End of file glossary.php */
/* Location: ./application/controllers/admin/glossary.php */