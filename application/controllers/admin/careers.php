<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Careers extends Web_Controller {
	function __construct()
    {
		// Call the Model constructor
		parent::__construct();
		if(!$this->session->userdata('admin_logged_in'))
		{
		   redirect('admin/login');		
		}
		$this->load->model('applications_model');
		$this->load->model('jobs_model');
		$this->load->model('widgets_model');	
	}
		
	public function index()
	{
		redirect('admin/careers/jobs');		
	}
	
	public function jobs()
	{
		$this->load->library('pagination');
		$main['page_title']=$this->config->item('site_name').' - Jobs';
		$main['header']=$this->adminheader();
		$main['footer']=$this->adminfooter();
		$main['left']=$this->adminleftmenu();
		$config['base_url'] = site_url('admin/careers/jobs/');
		$config['total_rows'] = $this->jobs_model->get_pagination_count();
		$config['per_page'] = '10';
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['cur_tag_open'] = '<span>';
		$config['cur_tag_close'] = '</span>';
		$this->pagination->initialize($config);
		$content['careerfields'] = $this->jobs_model->get_fields();
		$content['sortorders'] = array('asc'=>'Ascending','desc'=>'Descending');
		$content['careers']=$this->jobs_model->get_pagination($config['per_page'],$this->uri->segment($config['uri_segment']));
		$main['content']=$this->load->view('admin/careers/jobs/jobs',$content,true);
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
		$this->form_validation->set_rules('refno', 'Ref. No.', 'required|is_unique[jobs.refno]');
		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('location', 'Location', '');
		$this->form_validation->set_rules('short_desc', 'Short Description', '');
		$this->form_validation->set_rules('desc', 'Description', '');
		$this->form_validation->set_rules('status', 'Status', 'required');
		$this->form_validation->set_message('required', 'required');
		$this->form_validation->set_message('is_unique', 'already exists');
		$this->form_validation->set_error_delimiters('<span class="red">(', ')</span>');
		if ($this->form_validation->run() == FALSE)
		{
			$main['page_title']=$this->config->item('site_name').' - Jobs';
			$main['header']=$this->adminheader();
			$main['footer']=$this->adminfooter();
			$main['left']=$this->adminleftmenu();
			$add['widgets']=$this->widgets_model->get_rightwidgets();
			$main['content']=$this->load->view('admin/careers/jobs/add',$add,true);
			$this->load->view('admin/main',$main);
		} else {
			$i=0;
			$widgets=array();
			if($this->input->post('widgets'))
			foreach($this->input->post('widgets') as $widgetrow): $i++;
				$widgets[]=$widgetrow.':'.$i;
			endforeach;
			$widgets=implode(',',$widgets);	
			$slugtxt = str_replace(" ",'_',$this->input->post('title'))."_".$this->input->post('refno');
			$slug=$this->jobs_model->create_slug($slugtxt);
			$maindata=array('status'=>$this->input->post('status'),'refno'=>$this->input->post('refno'),'slug'=>$slug,'widgets'=>$widgets);
			$descdata=array('title'=>$this->input->post('title'),'location'=>$this->input->post('location'),'short_desc'=>$this->input->post('short_desc'),'desc'=>$this->input->post('desc'));
			$insertid=$this->jobs_model->insert($maindata,$descdata);
			if($insertid){
				$this->session->set_flashdata('message', '<div class="n_ok flash_messages"><p>Job added Successfully.</p></div>');
				redirect('admin/careers/jobs');
			} else {
				$this->session->set_flashdata('message', '<div class="n_error flash_messages"><p>Error!! - Job not added.</p></div>');
				redirect('admin/careers/jobs');
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
		$this->form_validation->set_rules('refno', 'Ref. No.', 'required|callback_refno_exists');
		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('location', 'Location', '');
		$this->form_validation->set_rules('short_desc', 'Short Description', '');
		$this->form_validation->set_rules('desc', 'Description', '');
		$this->form_validation->set_rules('slug', 'Url Slug', 'required|callback_slug_exists');
		$this->form_validation->set_rules('status', 'Status', 'required');
		$this->form_validation->set_message('required', 'required');
		$this->form_validation->set_error_delimiters('<span class="red">(', ')</span>');
		if ($this->form_validation->run() == FALSE)
		{
			$main['page_title']=$this->config->item('site_name').' - Jobs';
			$main['header']=$this->adminheader();
			$main['footer']=$this->adminfooter();
			$main['left']=$this->adminleftmenu();
			$edit['return']=$return;
			$edit['job']= $this->jobs_model->load($id);
			$edit['widgets']=$this->widgets_model->get_rightwidgets();
			$main['content']=$this->load->view('admin/careers/jobs/edit',$edit,true);
			$this->load->view('admin/main',$main);
		} else {
			$new_widgets=$this->input->post('widgets');
			$jobrow=$this->jobs_model->load($id);
			$widgets=$this->get_editwidgets($jobrow,$new_widgets);	
			$slug=$this->jobs_model->update_slug($this->input->post('slug'),$id);
			$maindata=array('status'=>$this->input->post('status'),'refno'=>$this->input->post('refno'),'slug'=>$this->input->post('slug'),'widgets'=>$widgets);
			$descdata=array('title'=>$this->input->post('title'),'location'=>$this->input->post('location'),'short_desc'=>$this->input->post('short_desc'),'desc'=>$this->input->post('desc'));
			$loginid=$this->jobs_model->update($maindata,$descdata,$id);
			if($loginid){
				$this->session->set_flashdata('message', '<div class="n_ok flash_messages"><p>Job updated Successfully.</p></div>');
				redirect('admin/careers/jobs/'.$return);
			} else {
				$this->session->set_flashdata('message', '<div class="n_error flash_messages"><p>Error!! - Job not updated.</p></div>');
				redirect('admin/careers/jobs/'.$return);
			}
		}
	}
	
	function get_editwidgets($productrow,$new_widgets){
		   $cur_widgets=array();
			$cur_widgets_sort=array();
			$higest_sort=0;
			if($productrow->widgets!=''){								
				$current_widgets= explode(',',$productrow->widgets);
				foreach($current_widgets as $current_widget):
					$cur_arr=explode(':',$current_widget);
					$cur_widgets[]=$cur_arr['0'];
					$cur_widgets_sort[$cur_arr['0']]=$cur_arr['1'];
					if($higest_sort<$cur_arr['1']){
						$higest_sort=$cur_arr['1'];
					}
				endforeach;
				$widgets=array();
				if($new_widgets!=''){	
					foreach($new_widgets as $widgetrow):
						if(isset($cur_widgets_sort[$widgetrow])){
							$neworder=$cur_widgets_sort[$widgetrow];
						} else {
							$neworder=$higest_sort+1;
						}
						$widgets[]=$widgetrow.':'.$neworder;
					endforeach;
					$widgets=implode(',',$widgets);
					}else{
					$widgets='';	
				}
			}else{
				$i=0;
				$widgets=array();
				if($new_widgets)
				foreach($new_widgets as $widgetrow): $i++;
					$widgets[]=$widgetrow.':'.$i;
				endforeach;
				$widgets=implode(',',$widgets);
			}
			return $widgets;
	}
	
	public function jobwidgets($id)
	{
		$main['page_title']=$this->config->item('site_name').' - job Widgets';
		$main['header']=$this->adminheader();
		$main['footer']=$this->adminfooter();
		$main['left']=$this->adminleftmenu();
		$cond=array('id'=>$id);				
		$content['job'] = $this->jobs_model->get_row_cond($cond);				
		$content['widgets'] = $this->widgets_model->get_idpair();		
		$main['content']=$this->load->view('admin/careers/jobs/widget/lists',$content,true);
		$this->load->view('admin/main',$main);
	}
	
	function widgetactions($jobid)
	{
		$loginid=false;		
		$sort_orders=$this->input->post('sort_order');		
		if(isset($_POST['sortsave']) && $this->input->post('sortsave')=='Save' && count($sort_orders)>0){
			foreach($sort_orders as $id => $val):
				$sort_order[]=	$id.':'.$val;							
			endforeach;
			$sort_order=implode(',',$sort_order);
			$data=array('widgets'=>$sort_order);
			$loginid=$this->jobs_model->update($data,array(),$jobid);			
		}		
		if($loginid){
			$this->session->set_flashdata('message', '<div class="n_ok flash_messages"><p>job updated Successfully.</p></div>');
		} else {
			$this->session->set_flashdata('message', '<div class="n_error flash_messages"><p>Error!! - job not updated.</p></div>');
		}
		redirect('admin/careers/jobs/lists/'.$this->input->post('return'));
	}
	
	function delete($id,$return)
	{
		$loginid=$this->jobs_model->delete($id);
		if($loginid){
			$this->session->set_flashdata('message', '<div class="n_ok flash_messages"><p>Job deleted Successfully.</p></div>');
			redirect('admin/careers/jobs/'.$return);
		} else {
			$this->session->set_flashdata('message', '<div class="n_error flash_messages"><p>Error!! - Job not deleted.</p></div>');
			redirect('admin/careers/jobs/'.$return);
		}
	}
	
	function actions()
	{
		$ids=$this->input->post('id');
		$loginid = false;
		if(isset($_POST['enable']) && $this->input->post('enable')=='Enable'){ $status='Y';}
		if(isset($_POST['disable']) && $this->input->post('disable')=='Disable'){ $status='N';}
		if(isset($_POST['reset']) && $this->input->post('reset')=='Reset'){
			$newdata = array(
				   'career_key'  => '',
				   'career_field'  => '',
				   'order_field'=>'',
				   'sort_field' =>''
			);
			$this->session->unset_userdata($newdata);
			redirect('admin/careers/jobs/');
		}
		if(isset($_POST['search']) && $this->input->post('search')=='Search'){
			if($this->input->post('keyword')!='' ||  $this->input->post('sortby')!=''){
				$newdata = array(
					   'career_key'  => $this->input->post('keyword'),
					   'career_field'  => $this->input->post('field'),
					   'order_field' =>  $this->input->post('orderby'),
					   'sort_field' => $this->input->post('sortby') 
				);
				$this->session->set_userdata($newdata);
			} else {
				$newdata = array(
					   'career_key'  => '',
					   'career_field' => '',
					   'order_field' => '',
					   'sort_field' =>''
				);
				$this->session->unset_userdata($newdata);
			}
			redirect('admin/careers/jobs/');
		}
		if(isset($status) && $ids){
			foreach($ids as $id):
				$data=array('status'=>$status);
				$loginid=$this->jobs_model->update($data,array(),$id);	
				$flashmsg = 'Job updated Successfully.';				
			endforeach;
		}
		
		if(isset($_POST['delete']) && $ids){			
			foreach($ids as $id):
				$loginid=$this->jobs_model->delete($id);
				$flashmsg = 'Job deleted Successfully.';				
			endforeach;
		}
		if($loginid){
			$this->session->set_flashdata('message', '<div class="n_ok flash_messages"><p>'.$flashmsg.'</p></div>');
		} else {
			$this->session->set_flashdata('message', '<div class="n_error flash_messages"><p>Error!! - Job not updated.</p></div>');
		}
		redirect('admin/careers/jobs/'.$this->input->post('return'));
	}
	
	public function applications()
	{
		$this->load->library('pagination');
		$main['page_title']=$this->config->item('site_name').' - Job Applications';
		$main['header']=$this->adminheader();
		$main['footer']=$this->adminfooter();
		$main['left']=$this->adminleftmenu();
		$config['base_url'] = site_url('admin/careers/applications/');
		$config['total_rows'] = $this->applications_model->get_pagination_count();
		$config['per_page'] = '10';
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['cur_tag_open'] = '<span>';
		$config['cur_tag_close'] = '</span>';
		$this->pagination->initialize($config);
		$content['careers']=$this->applications_model->get_pagination($config['per_page'],$this->uri->segment($config['uri_segment']));
		$main['content']=$this->load->view('admin/careers/applications/lists',$content,true);
		$this->load->view('admin/main',$main);
	}
	
	function viewapplication($id,$return)
	{
			$main['page_title']=$this->config->item('site_name').' - Job Application';
			$main['header']=$this->adminheader();
			$main['footer']=$this->adminfooter();
			$main['left']=$this->adminleftmenu();
			$edit['return']=$return;
			$edit['job']= $this->applications_model->load($id);
			$main['content']=$this->load->view('admin/careers/applications/view',$edit,true);
			$this->load->view('admin/main',$main);		
	}
	function downloadresume($id)
	{
			$job = $this->applications_model->load($id);
			
			$this->load->helper('download');
			
			$data = file_get_contents("public/uploads/resumes/".$job->resume);
			force_download($job->resume, $data); 
	}
	function deleteapplication($id,$return)
	{
		$loginid=$this->applications_model->delete(array('id'=>$id));
		if($loginid){
			$this->session->set_flashdata('message', '<div class="n_ok flash_messages"><p>Job application deleted Successfully.</p></div>');
			redirect('admin/careers/applications/'.$return);
		} else {
			$this->session->set_flashdata('message', '<div class="n_error flash_messages"><p>Error!! - Job application not deleted.</p></div>');
			redirect('admin/careers/applications/'.$return);
		}
	}
	function applicationactions()
	{
		$loginid = false;
		$ids=$this->input->post('id');		
		if(isset($_POST['enable']) && $this->input->post('enable')=='Shortlist'){ $status='Y';}
		if(isset($_POST['disable']) && $this->input->post('disable')=='Remove from shortlist'){ $status='N';}
		if($ids && isset($status)){
			foreach($ids as $id):
				$data=array('status'=>$status);
				$cond=array('id'=>$id);
				$loginid=$this->applications_model->update($data,$cond);				
			endforeach;
		}
		if($loginid){
			$this->session->set_flashdata('message', '<div class="n_ok flash_messages"><p>Job application updated Successfully.</p></div>');
		} else {
			$this->session->set_flashdata('message', '<div class="n_error flash_messages"><p>Error!! - Job application not updated.</p></div>');
		}
		if(isset($_POST['delete']) && $ids){			
			foreach($ids as $id):
				$loginid=$this->applications_model->delete(array('id'=>$id));				
			endforeach;
			if($loginid){
				$this->session->set_flashdata('message', '<div class="n_ok flash_messages"><p>Job application Deleted Successfully.</p></div>');
			} 
		}
		redirect('admin/careers/applications/'.$this->input->post('return'));
	}	
	function refno_exists($refno)
	{
		$id= $this->input->post('id');
		if ($this->jobs_model->code_exists($refno,$id))
		{
			$this->form_validation->set_message('refno_exists', 'already exists');
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}
	function slug_exists($slug)
	{
		$id= $this->input->post('id');
		if ($this->jobs_model->slug_exists($slug,$id))
		{
			$this->form_validation->set_message('slug_exists', 'already exists');
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}
	
}
/* End of file careers.php */
/* Location: ./application/controllers/admin/careers.php */