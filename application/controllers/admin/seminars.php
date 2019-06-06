<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Seminars extends Web_Controller {
	function __construct()
    {
		// Call the Model constructor
		parent::__construct();
		if(!$this->session->userdata('admin_logged_in'))
		{
		   redirect('admin/login');		
		}
		$this->load->model('seminars_model');
	}
		
	public function index()
	{
		redirect('admin/seminars/lists/');		
	}
	
	public function lists($type='seminars')
	{		
		if($type=='webinars'){ 
			$semcond=array('seminar_type'=>'webinars');
			$content['subhead']="Manage Webinars - Lists";
			$content['newtext']="Add New Webinar";
			$content['seminartype']="webinars";
			$main['page_title']=$this->config->item('site_name').' - Webinars';
		} else {
			$semcond=array('seminar_type'=>'seminars');
			$content['subhead']="Manage Seminars - Lists";
			$content['newtext']="Add New Seminar";
			$content['seminartype']="seminars";
			$main['page_title']=$this->config->item('site_name').' - Seminars';
		}
		$this->load->library('pagination');		
		$main['header']=$this->adminheader();
		$main['footer']=$this->adminfooter();
		$main['left']=$this->adminleftmenu();
		$config['base_url'] = site_url('admin/seminars/lists/'.$type.'/');
		$config['total_rows'] = $this->seminars_model->get_pagination_count($semcond);
		$config['per_page'] = '10';
		$config['uri_segment'] = 5;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['cur_tag_open'] = '<span>';
		$config['cur_tag_close'] = '</span>';
		$this->pagination->initialize($config);
		$content['seminars']=$this->seminars_model->get_pagination($config['per_page'],$this->uri->segment($config['uri_segment']),$semcond);		
		$main['content']=$this->load->view('admin/seminars/lists',$content,true);
		$this->load->view('admin/main',$main);
	}
	
	function add($type='seminars')
	{
		if($type=='webinars'){ 
			$semcond=array('seminar_type'=>'webinars');
			$content['subhead']="Add New Webinar";
			$main['page_title']=$this->config->item('site_name').' - Webinars';
			$semtype ='Webinar';
		} else {
			$semcond=array('seminar_type'=>'seminars');
			$content['subhead']="Add New Seminar";
			$main['page_title']=$this->config->item('site_name').' - Seminars';
			$semtype ='Seminar';
		}
		$this->load->library('ckeditor');
		$this->load->library('ckfinder');
		$this->ckeditor->basePath = base_url('public/admin/ckeditor/');
		$this->ckeditor->config['language'] = 'en';
		$this->ckeditor->config['width'] = '100%';
		$this->ckeditor->config['height'] = '200px';
		//Add Ckfinder to Ckeditor
		$this->ckfinder->SetupCKEditor($this->ckeditor,base_url('public/admin/ckfinder/'));
		$this->form_validation->set_rules('name', 'Topic', 'required');
		$this->form_validation->set_rules('desc', 'Description', 'required');
		$this->form_validation->set_rules('url', 'Url', 'required|callback_check_url');
		$this->form_validation->set_rules('seminar_type', 'Type', 'required');
		$this->form_validation->set_rules('seminar_date', 'Date', 'required');
		$this->form_validation->set_rules('archive', 'Archive', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');
		$this->form_validation->set_message('required', 'required');
		$this->form_validation->set_error_delimiters('<span class="red">(', ')</span>');
		if ($this->form_validation->run() == FALSE)
		{
			$content['seminartype']=$type;
			$main['header']=$this->adminheader();
			$main['footer']=$this->adminfooter();
			$main['left']=$this->adminleftmenu();
			$main['content']=$this->load->view('admin/seminars/add',$content,true);
			$this->load->view('admin/main',$main);
		} else {
			$maindata=array('status'=>$this->input->post('status'),'archive'=>$this->input->post('archive'),'seminar_type'=>$this->input->post('seminar_type'),'seminar_date'=>date('Y-m-d H:i:s',strtotime($this->input->post('seminar_date'))));
			$descdata=array('name'=>$this->input->post('name'),'desc'=>$this->input->post('desc'),'url'=>$this->input->post('url'));
			$insertid=$this->seminars_model->insert($maindata,$descdata);
			if($insertid){
				$this->session->set_flashdata('message', '<div class="n_ok flash_messages"><p>'.$semtype.' added Successfully.</p></div>');
				redirect('admin/seminars/lists/'.$type);
			} else {
				$this->session->set_flashdata('message', '<div class="n_error flash_messages"><p>Error!! - '.$semtype.' not added.</p></div>');
				redirect('admin/seminars/lists/'.$type);
			}
		}
	}
	
	function edit($type='seminars',$id,$return)
	{
		if($type=='webinars'){ 
			$semcond=array('seminar_type'=>'webinars');
			$edit['subhead']="Edit Webinar";
			$main['page_title']=$this->config->item('site_name').' - Webinars';
			$semtype ='Webinar';
		} else {
			$semcond=array('seminar_type'=>'seminars');
			$edit['subhead']="Edit Seminar";
			$main['page_title']=$this->config->item('site_name').' - Seminars';
			$semtype ='Seminar';
		}
		$this->load->library('ckeditor');
		$this->load->library('ckfinder');
		$this->ckeditor->basePath = base_url('public/admin/ckeditor/');
		$this->ckeditor->config['language'] = 'en';
		$this->ckeditor->config['width'] = '100%';
		$this->ckeditor->config['height'] = '200px';
		//Add Ckfinder to Ckeditor
		$this->ckfinder->SetupCKEditor($this->ckeditor,base_url('public/admin/ckfinder/'));
		$this->form_validation->set_rules('name', 'Topic', 'required');
		$this->form_validation->set_rules('desc', 'Description', 'required');
		$this->form_validation->set_rules('url', 'Url', 'required|callback_check_url');
		$this->form_validation->set_rules('seminar_type', 'Type', 'required');
		$this->form_validation->set_rules('seminar_date', 'Date', 'required');
		$this->form_validation->set_rules('archive', 'Archive', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');
		$this->form_validation->set_message('required', 'required');
		$this->form_validation->set_error_delimiters('<span class="red">(', ')</span>');
		if ($this->form_validation->run() == FALSE)
		{
			$edit['seminartype']=$type;
			$main['header']=$this->adminheader();
			$main['footer']=$this->adminfooter();
			$main['left']=$this->adminleftmenu();
			$edit['return']=$return;
			$edit['seminar']= $this->seminars_model->load($id);
			$main['content']=$this->load->view('admin/seminars/edit',$edit,true);
			$this->load->view('admin/main',$main);
		} else {
			$maindata=array('status'=>$this->input->post('status'),'archive'=>$this->input->post('archive'),'seminar_type'=>$this->input->post('seminar_type'),'seminar_date'=>date('Y-m-d H:i:s',strtotime($this->input->post('seminar_date'))));
			$descdata=array('name'=>$this->input->post('name'),'desc'=>$this->input->post('desc'),'url'=>$this->input->post('url'));
			$loginid=$this->seminars_model->update($maindata,$descdata,$id);
			if($loginid){
				$this->session->set_flashdata('message', '<div class="n_ok flash_messages"><p>'.$semtype.' updated Successfully.</p></div>');
				redirect('admin/seminars/lists/'.$type.'/'.$return);
			} else {
				$this->session->set_flashdata('message', '<div class="n_error flash_messages"><p>Error!! - '.$semtype.' not updated.</p></div>');
				redirect('admin/seminars/lists/'.$type.'/'.$return);
			}
		}
	}
	
	function delete($type='seminars',$id,$return)
	{
		if($type=="webinars"){
			$seminartype ='Webinar';
		} else {
			$seminartype ='Seminar';
		}
		$loginid=$this->seminars_model->delete($id);
		if($loginid){
			$this->session->set_flashdata('message', '<div class="n_ok flash_messages"><p>'.$seminartype.' deleted Successfully.</p></div>');
			redirect('admin/seminars/lists/'.$type.'/'.$return);
		} else {
			$this->session->set_flashdata('message', '<div class="n_error flash_messages"><p>Error!! - '.$seminartype.' not deleted.</p></div>');
			redirect('admin/seminars/lists/'.$type.'/'.$return);
		}
	}
	
	function actions($type='seminars')
	{
		if($type=="webinars"){
			$seminartype ='Webinar';
		} else {
			$seminartype ='Seminar';
		}
		$ids=$this->input->post('id');
		if(isset($_POST['enable']) && $this->input->post('enable')=='Enable'){ $status='Y';$data=array('status'=>$status);}
		if(isset($_POST['disable']) && $this->input->post('disable')=='Disable'){ $status='N';$data=array('status'=>$status);}
		if(isset($_POST['archive']) && $this->input->post('archive')=='Archive'){ $archive='Y';$data=array('archive'=>$archive);}
		if(isset($_POST['unarchive']) && $this->input->post('unarchive')=='Unarchive'){ $archive='N';$data=array('archive'=>$archive);}
		if(count($ids)>0){
			foreach($ids as $id):				
				$loginid=$this->seminars_model->update($data,array(),$id);				
			endforeach;
			if($loginid){
				$this->session->set_flashdata('message', '<div class="n_ok flash_messages"><p>'.$seminartype.' updated Successfully.</p></div>');
			} else {
				$this->session->set_flashdata('message', '<div class="n_error flash_messages"><p>Error!! - '.$seminartype.' not updated.</p></div>');
			}
		}
		redirect('admin/seminars/lists/'.$type.'/'.$this->input->post('return'));
	}
	
	function check_url($url){
		if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $url)) {
		    $this->form_validation->set_message('check_url', 'invalid url');
			return FALSE;
		}
		else {
		    return TRUE;
		}
	}
	
	
}
/* End of file faqs.php */
/* Location: ./application/controllers/admin/faqs.php */