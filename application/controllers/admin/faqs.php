<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Faqs extends Web_Controller {
	function __construct()
    {
		// Call the Model constructor
		parent::__construct();
		if(!$this->session->userdata('admin_logged_in'))
		{
		   redirect('admin/login');		
		}
		$this->load->model('faqcategory_model');
		$this->load->model('faqs_model');	
	}
		
	public function index()
	{
		redirect('admin/faqs/lists');		
	}
	
	public function lists()
	{
		$this->load->library('pagination');
		$main['page_title']=$this->config->item('site_name').' - Faqs';
		$main['header']=$this->adminheader();
		$main['footer']=$this->adminfooter();
		$main['left']=$this->adminleftmenu();
		$config['base_url'] = site_url('admin/faqs/lists/');
		$config['total_rows'] = $this->faqs_model->get_pagination_count();
		$config['per_page'] = '10';
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['cur_tag_open'] = '<span>';
		$config['cur_tag_close'] = '</span>';
		$this->pagination->initialize($config);
		$content['faqfields'] = $this->faqs_model->get_fields();
		$content['sortorders'] = array('asc'=>'Ascending','desc'=>'Descending');
		$content['faqcats'] = $this->faqcategory_model->get_array();
		$content['faqs']=$this->faqs_model->get_pagination($config['per_page'],$this->uri->segment($config['uri_segment']));
		$main['content']=$this->load->view('admin/faqs/faq/lists',$content,true);
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
		$this->form_validation->set_rules('category_id', 'Category', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');
		$this->form_validation->set_message('required', 'required');
		$this->form_validation->set_error_delimiters('<span class="red">(', ')</span>');
		if ($this->form_validation->run() == FALSE)
		{
			$main['page_title']=$this->config->item('site_name').' - Faqs';
			$main['header']=$this->adminheader();
			$main['footer']=$this->adminfooter();
			$main['left']=$this->adminleftmenu();
			$add['faqcats'] = $this->faqcategory_model->get_array();
			$main['content']=$this->load->view('admin/faqs/faq/add',$add,true);
			$this->load->view('admin/main',$main);
		} else {
			$maindata=array('status'=>$this->input->post('status'),'category_id'=>$this->input->post('category_id'));
			$descdata=array('question'=>$this->input->post('question'),'answer'=>$this->input->post('answer'));
			$insertid=$this->faqs_model->insert($maindata,$descdata);
			if($insertid){
				$this->session->set_flashdata('message', '<div class="n_ok flash_messages"><p>Faq added Successfully.</p></div>');
				redirect('admin/faqs/lists');
			} else {
				$this->session->set_flashdata('message', '<div class="n_error flash_messages"><p>Error!! - Faq not added.</p></div>');
				redirect('admin/faqs/lists');
			}
		}
	}
	
	function edit($id,$return)
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
		$this->form_validation->set_rules('category_id', 'Category', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');
		$this->form_validation->set_message('required', 'required');
		$this->form_validation->set_error_delimiters('<span class="red">(', ')</span>');
		if ($this->form_validation->run() == FALSE)
		{
			$main['page_title']=$this->config->item('site_name').' - Faqs';
			$main['header']=$this->adminheader();
			$main['footer']=$this->adminfooter();
			$main['left']=$this->adminleftmenu();
			$edit['return']=$return;
			$edit['faqcats'] = $this->faqcategory_model->get_array();
			$edit['faq']= $this->faqs_model->load($id);
			$main['content']=$this->load->view('admin/faqs/faq/edit',$edit,true);
			$this->load->view('admin/main',$main);
		} else {
			$maindata=array('status'=>$this->input->post('status'),'category_id'=>$this->input->post('category_id'));
			$descdata=array('question'=>$this->input->post('question'),'answer'=>$this->input->post('answer'));
			$loginid=$this->faqs_model->update($maindata,$descdata,$id);
			if($loginid){
				$this->session->set_flashdata('message', '<div class="n_ok flash_messages"><p>Faq updated Successfully.</p></div>');
				redirect('admin/faqs/lists/'.$return);
			} else {
				$this->session->set_flashdata('message', '<div class="n_error flash_messages"><p>Error!! - Faq not updated.</p></div>');
				redirect('admin/faqs/lists/'.$return);
			}
		}
	}
	
	function delete($id,$return)
	{
		$loginid=$this->faqs_model->delete($id);
		if($loginid){
			$this->session->set_flashdata('message', '<div class="n_ok flash_messages"><p>Faq deleted Successfully.</p></div>');
			redirect('admin/faqs/lists/'.$return);
		} else {
			$this->session->set_flashdata('message', '<div class="n_error flash_messages"><p>Error!! - Faq not deleted.</p></div>');
			redirect('admin/faqs/lists/'.$return);
		}
	}
	
	function actions()
	{
		$loginid=false;
		$ids=$this->input->post('id');
		$sort_orders=$this->input->post('sort_order');
		if(isset($_POST['reset']) && $this->input->post('reset')=='Reset'){
			$newdata = array(
				   'faq_key'  => '',
				   'faq_field'  => '',
				   'faq_category_id'  => '',
				   'order_field'=>'',
				   'sort_field' =>''
			);
			$this->session->unset_userdata($newdata);
			redirect('admin/faqs/lists/');
		}
		if(isset($_POST['search']) && $this->input->post('search')=='Search'){
			if($this->input->post('keyword')!='' || $this->input->post('category')!='' ||  $this->input->post('sortby')!=''){
				$newdata = array(
					   'faq_key'  => $this->input->post('keyword'),
					   'faq_field'  => $this->input->post('field'),
					   'faq_category_id'  => $this->input->post('category'),
					   'order_field' =>  $this->input->post('orderby'),
					   'sort_field' => $this->input->post('sortby') 
				);
				$this->session->set_userdata($newdata);
			} else {
				$newdata = array(
					   'faq_key'  => '',
					   'faq_field' => '',
					   'faq_category_id'  => '',
					   'order_field' => '',
					   'sort_field' =>''
				);
				$this->session->unset_userdata($newdata);
			}
			redirect('admin/faqs/lists/');
		}
		if(isset($_POST['enable']) && $this->input->post('enable')=='Enable'){ $status='Y';}
		if(isset($_POST['disable']) && $this->input->post('disable')=='Disable'){ $status='N';}
		if(isset($status) && $ids){
			foreach($ids as $id):
				$data=array('status'=>$status);
				$loginid=$this->faqs_model->update($data,array(),$id);
				$flashmsg = 'Faq updated Successfully.';
			endforeach;
		}
		if(isset($_POST['delete']) && $ids){			
			foreach($ids as $id):
				$loginid=$this->faqs_model->delete($id);
				$flashmsg = 'Faq deleted Successfully.';				
			endforeach;
		}
		if(isset($_POST['sortsave']) && $this->input->post('sortsave')=='Save' && count($sort_orders)>0 && $ids){
			foreach($sort_orders as $id => $sort_order):
				$data=array('sort_order'=>$sort_order);
				$loginid=$this->faqs_model->update($data,array(),$id);	
				$flashmsg = 'Faq updated Successfully.';			
			endforeach;	
		}
		if($loginid){
			$this->session->set_flashdata('message', '<div class="n_ok flash_messages"><p>'.$flashmsg.'</p></div>');
		}else{
			$this->session->set_flashdata('message', '<div class="n_error flash_messages"><p>Error!! - Faq not Updated.</p></div>');
		}
		redirect('admin/faqs/lists/'.$this->input->post('return'));
	}
	
	public function categories()
	{
		$this->load->library('pagination');
		$main['page_title']=$this->config->item('site_name').' - Faq Categories';
		$main['header']=$this->adminheader();
		$main['footer']=$this->adminfooter();
		$main['left']=$this->adminleftmenu();
		$config['base_url'] = site_url('admin/faqs/categories/');
		$config['total_rows'] = $this->faqcategory_model->get_pagination_count();
		$config['per_page'] = '10';
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['cur_tag_open'] = '<span>';
		$config['cur_tag_close'] = '</span>';
		$this->pagination->initialize($config);
		$content['faqs']=$this->faqcategory_model->get_pagination($config['per_page'],$this->uri->segment($config['uri_segment']));
		$main['content']=$this->load->view('admin/faqs/category/lists',$content,true);
		$this->load->view('admin/main',$main);
	}
	
	function addcategory()
	{
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');
		$this->form_validation->set_message('required', 'required');
		$this->form_validation->set_error_delimiters('<span class="red">(', ')</span>');
		if ($this->form_validation->run() == FALSE)
		{
			$main['page_title']=$this->config->item('site_name').' - Faq Categories';
			$main['header']=$this->adminheader();
			$main['footer']=$this->adminfooter();
			$main['left']=$this->adminleftmenu();
			$main['content']=$this->load->view('admin/faqs/category/add','',true);
			$this->load->view('admin/main',$main);
		} else {
			$maindata=array('status'=>$this->input->post('status'));
			$descdata=array('name'=>$this->input->post('name'));
			$insertid=$this->faqcategory_model->insert($maindata,$descdata);
			if($insertid){
				$this->session->set_flashdata('message', '<div class="n_ok flash_messages"><p>Faq category added Successfully.</p></div>');
				redirect('admin/faqs/categories');
			} else {
				$this->session->set_flashdata('message', '<div class="n_error flash_messages"><p>Error!! - Faq category not added.</p></div>');
				redirect('admin/faqs/categories');
			}
		}
	}
	
	function editcategory($id,$return)
	{
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');
		$this->form_validation->set_message('required', 'required');
		$this->form_validation->set_error_delimiters('<span class="red">(', ')</span>');
		if ($this->form_validation->run() == FALSE)
		{
			$main['page_title']=$this->config->item('site_name').' - Faq Categories';
			$main['header']=$this->adminheader();
			$main['footer']=$this->adminfooter();
			$main['left']=$this->adminleftmenu();
			$edit['return']=$return;
			$edit['faq']= $this->faqcategory_model->load($id);
			$main['content']=$this->load->view('admin/faqs/category/edit',$edit,true);
			$this->load->view('admin/main',$main);
		} else {
			$maindata=array('status'=>$this->input->post('status'));
			$descdata=array('name'=>$this->input->post('name'));
			$loginid=$this->faqcategory_model->update($maindata,$descdata,$id);
			if($loginid){
				$this->session->set_flashdata('message', '<div class="n_ok flash_messages"><p>Faq category updated Successfully.</p></div>');
				redirect('admin/faqs/categories/'.$return);
			} else {
				$this->session->set_flashdata('message', '<div class="n_error flash_messages"><p>Error!! - Faq category not updated.</p></div>');
				redirect('admin/faqs/categories/'.$return);
			}
		}
	}
	function deletecategory($id,$return)
	{
		$loginid=$this->faqcategory_model->delete($id);
		if($loginid){
			$this->session->set_flashdata('message', '<div class="n_ok flash_messages"><p>Faq category deleted Successfully.</p></div>');
			redirect('admin/faqs/categories/'.$return);
		} else {
			$this->session->set_flashdata('message', '<div class="n_error flash_messages"><p>Error!! - Faq category not deleted.</p></div>');
			redirect('admin/faqs/categories/'.$return);
		}
	}
	
	function categoryactions()
	{
		$loginid=false;
		$ids=$this->input->post('id');
		$sort_orders=$this->input->post('sort_order');
		if(isset($_POST['enable']) && $this->input->post('enable')=='Enable'){ $status='Y';}
		if(isset($_POST['disable']) && $this->input->post('disable')=='Disable'){ $status='N';}
		if(isset($status) && isset($_POST['id'])){
			foreach($ids as $id):
				$data=array('status'=>$status);
				$loginid=$this->faqcategory_model->update($data,array(),$id);				
			endforeach;
		}
		if(isset($_POST['sortsave']) && $this->input->post('sortsave')=='Save' && count($sort_orders)>0){
			foreach($sort_orders as $id => $sort_order):
				$data=array('sort_order'=>$sort_order);
				$loginid=$this->faqcategory_model->update($data,array(),$id);				
			endforeach;			
		}
		
		if($loginid){
			$this->session->set_flashdata('message', '<div class="n_ok flash_messages"><p>Faq category updated Successfully.</p></div>');
		} else {
			$this->session->set_flashdata('message', '<div class="n_error flash_messages"><p>Error!! - Faq category not updated.</p></div>');
		}
		if(isset($_POST['delete']) && $ids){			
			foreach($ids as $id):
				$loginid=$this->faqcategory_model->delete($id);				
			endforeach;
			if($loginid){
				$this->session->set_flashdata('message', '<div class="n_ok flash_messages"><p>Faq category Deleted Successfully.</p></div>');
			} 
		}
		redirect('admin/faqs/categories/'.$this->input->post('return'));
	}
}
/* End of file faqs.php */
/* Location: ./application/controllers/admin/faqs.php */