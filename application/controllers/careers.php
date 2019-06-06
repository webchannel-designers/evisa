<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Careers extends Ecsfront_Controller {
	public function index()
	{
		$this->load->model('frontend/pages_model');
		$career['content']=$pagemeta=$this->pages_model->get_row_cond(array('key'=>'careers'));
		if($pagemeta->title!=''){$this->pagetitle=$pagemeta->title;}
		if($pagemeta->short_desc!=''){$this->desc=$pagemeta->short_desc; }
		if($pagemeta->keywords!=''){$this->keys=$pagemeta->keywords; }
		if($pagemeta->banner_image!=''){$this->pagebannner=base_url('public/uploads/pages/'.$pagemeta->banner_image); }
		if($pagemeta->banner_text!=''){$this->pagebannnertext=$pagemeta->banner_text; }	
		$this->right_widgets=$this->widgets_model->get_pagewidgets($pagemeta->widgets);
		$this->breadcrumbarr=array('/'=>$this->alphasettings['BREADCRUMB_START'],site_url('careers') =>$this->pagetitle);	
		$this->load->model('frontend/jobs_model');
		$this->load->library('pagination');			
		$config['base_url'] = site_url('careers/index/');
		$config['total_rows'] = $this->jobs_model->get_pagination_count(array('status'=>'Y'));
		$config['per_page'] = '10';
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['cur_tag_open'] = '<span>';
		$config['cur_tag_close'] = '</span>';
		$this->pagination->initialize($config);		
		$career['jobs']=$this->jobs_model->get_pagination($config['per_page'],$this->uri->segment($config['uri_segment']),array('status'=>'Y'));
 		$career['latestnews']=$this->news_model->get_catnews('latest-news',10);
		$frontcontent=$this->load->view('frontend/careers/index',$career,true);
		$main['meta']=$this->frontmetahead();	
		$main['contents']=$frontcontent;
		$main['header']=$this->frontheader();
		$main['footer']=$this->frontfooter();
 		$this->load->view('frontend/main',$main);
	}
	public function details($slug='')
	{
		$this->load->model('frontend/jobs_model');
		$career['jobs']=$this->jobs_model->get_row_cond(array('slug'=>$slug,'status'=>'Y'));
 		$this->load->model('frontend/pages_model');
 		$pagemeta=$this->pages_model->get_row_cond(array('key'=>'careers'));
		if($pagemeta->title!=''){$this->pagetitle=$pagemeta->title;}
		if($pagemeta->short_desc!=''){$this->desc=$pagemeta->short_desc; }
		if($pagemeta->keywords!=''){$this->keys=$pagemeta->keywords; }
		if($pagemeta->banner_image!=''){$this->pagebannner=base_url('public/uploads/pages/'.$pagemeta->banner_image); }
		if($pagemeta->banner_text!=''){$this->pagebannnertext=$pagemeta->banner_text; }	
 		$this->breadcrumbarr=array('/'=>'Home',site_url('careers') =>'Careers',site_url('careers/details/'.$career['jobs']->slug) => $career['jobs']->title );
 		$career['latestnews']=$this->news_model->get_catnews('latest-news',10);
		$main['contents']=$this->load->view('frontend/careers/details',$career,true);
		$main['meta']=$this->frontmetahead(); 
		$main['header']=$this->frontheader();
		$main['footer']=$this->frontfooter(); 
		$this->load->view('frontend/main',$main);
	} 
	function apply($slug='')
	{
		$this->load->model('frontend/jobs_model');
		$this->load->model('frontend/applications_model');
 		$this->load->model('frontend/pages_model');
		$pagemeta=$this->pages_model->get_row_cond(array('key'=>'careers'));
		if($pagemeta->title!=''){$this->pagetitle=$pagemeta->title;}
		if($pagemeta->short_desc!=''){$this->desc=$pagemeta->short_desc; }
		if($pagemeta->keywords!=''){$this->keys=$pagemeta->keywords; }
		if($pagemeta->banner_image!=''){$this->pagebannner=base_url('public/uploads/pages/'.$pagemeta->banner_image); }
		if($pagemeta->banner_text!=''){$this->pagebannnertext=$pagemeta->banner_text; }	
		$this->form_validation->set_rules('firstname', 'First Name', 'required');
		$this->form_validation->set_rules('lastname', 'Last Name', 'required');
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('phone', 'Phone', 'required');	
		$this->form_validation->set_rules('coverletter', 'Cover Letter', 'required');
		$this->form_validation->set_message('required', 'required');
		$this->form_validation->set_error_delimiters('<span class="red">(', ')</span>');
 		$career['latestnews']=$this->news_model->get_catnews('latest-news',10);
		if ($this->form_validation->run() == FALSE)
		{
			if($slug!='')
			{		
			$career['jobs']=$this->jobs_model->get_row_cond(array('slug'=>$slug));
			}
			else
			{
			$career['jobs']='';	
			}
 			$this->load->model('frontend/pages_model');
 			$pagemeta=$this->pages_model->get_row_cond(array('key'=>'apply'));
 			if($pagemeta->title!=''){$this->pagetitle=$pagemeta->title;}
			if($pagemeta->short_desc!=''){$this->desc=$pagemeta->short_desc; }
			if($pagemeta->keywords!=''){$this->keys=$pagemeta->keywords; }
			if($pagemeta->banner_image!=''){$this->pagebannner=base_url('public/uploads/pages/'.$pagemeta->banner_image); }
			if($pagemeta->banner_text!=''){$this->pagebannnertext=$pagemeta->banner_text; }	
			$this->right_widgets=$this->widgets_model->get_pagewidgets($pagemeta->widgets);
			$this->breadcrumbarr=array('/'=>$this->alphasettings['BREADCRUMB_START'],site_url('careers') =>'Careers','apply'=>@$career['jobs']->title);
 			$main['contents']=$this->load->view('frontend/careers/apply',$career,true);
			$main['meta']=$this->frontmetahead();
			$main['header']=$this->frontheader();
			$main['footer']=$this->frontfooter();
			$this->load->view('frontend/main',$main);
		} else {
			$resume='';				
			$config['upload_path'] = 'public/uploads/resumes';
			$config['allowed_types'] = 'docx|doc|pdf|rtf|txt';
			$this->load->library('upload', $config);
			if($this->upload->do_upload('resume'))
			{
				$resumedata=$this->upload->data();
				$resume=$resumedata['file_name'];
			}						
			$maindata=array('jobs_id'=>$this->input->post('jobs_id'),'title'=>$this->input->post('title'),'firstname'=>$this->input->post('firstname'),'lastname'=>$this->input->post('lastname'),'email'=>$this->input->post('email'),'phone'=>$this->input->post('phone'),'resume'=>$resume,'coverletter'=>$this->input->post('coverletter'));			
			$insertid=$this->applications_model->insert($maindata);
			if($insertid){
				$message=$this->load->view('frontend/mail/jobapplication',$maindata,TRUE);								
    			$this->sendfromadmin($maindata["email"],'Ishraqah - Job Application',$message);
				$message=$this->load->view('frontend/mail/adminjobapplication',$maindata,TRUE);
				$fromname = $maindata["firstname"]." ".$maindata["lastname"];
				$attachment	= 'public/uploads/resumes/'.$maindata["resume"] ;	
    			$this->sendtoadmin($maindata["email"],$fromname,$attachment,'Ishraqah - Job Application',$message,'hr');
 				redirect('contents/view/careers');
			} else {
 				redirect('contents/view/careers');
			}
		}
	}
 }
/* End of file contents.php */
/* Location: ./application/controllers/careers.php */
