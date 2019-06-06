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
		
		$this->load->model('location_model');

		$this->load->model('widgets_model');
		
		$this->load->model('location_model');	
		
		$this->load->model('category_model');

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

		$this->form_validation->set_rules('location', 'Location', 'required');

		$this->form_validation->set_rules('short_desc', 'Short Description', 'required');

		$this->form_validation->set_rules('desc', 'Description', 'required');

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
			
			$add['category']=$this->category_model->get_active();
			
			
			$add['locations']=$this->location_model->get_active();
			

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
			
			if($this->input->post('date_time')!='')

			{

			if($this->input->post('date_time'))

			{ 

				@$date_time = date("Y-m-d", strtotime($this->input->post('date_time'))).' '. date("H:i:s",strtotime($this->input->post('date_time')));

			}

			}

			else

			{

			$date_time=date("Y-m-d H:i:s");

			}

			$maindata=array('status'=>$this->input->post('status'),'refno'=>$this->input->post('refno'),'slug'=>$slug,'widgets'=>$widgets);

			$descdata=array('title'=>$this->input->post('title'),'category'=>$this->input->post('category'),'location'=>$this->input->post('location'),'short_desc'=>$this->input->post('short_desc'),'desc'=>$this->input->post('desc'),'date_time'=>$date_time);

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

		$this->form_validation->set_rules('location', 'Location', 'required');

		$this->form_validation->set_rules('short_desc', 'Short Description', 'required');

		$this->form_validation->set_rules('desc', 'Description', 'required');

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
			
			$edit['category']=$this->category_model->get_active();
			
			
			$edit['locations']=$this->location_model->get_active();
			

			$edit['widgets']=$this->widgets_model->get_rightwidgets();

			$main['content']=$this->load->view('admin/careers/jobs/edit',$edit,true);

			$this->load->view('admin/main',$main);

		} else {

			$new_widgets=$this->input->post('widgets');

			$jobrow=$this->jobs_model->load($id);

			$widgets=$this->get_editwidgets($jobrow,$new_widgets);	

			$slug=$this->jobs_model->update_slug($this->input->post('slug'),$id);
			
			$date_time = date("Y-m-d H:i:s");

			if($this->input->post('date_time')!='')

			{
				$date1=$this->input->post('date_time');
				$date=explode(" ",$date1);
				$newdate=date("Y-m-d", strtotime($date[0]));
				$date_time=$newdate." ".$date[1];
				
				//echo $date_time = date("Y-m-d h:i:s", strtotime($date1));
				//echo "qqq".$date=date('Y-m-d h:i:s', strtotime($this->input->post('date_timen')));
				//exit(); 

			}

			$maindata=array('status'=>$this->input->post('status'),'refno'=>$this->input->post('refno'),'slug'=>$this->input->post('slug'),'widgets'=>$widgets);

			$descdata=array('title'=>$this->input->post('title'),'category'=>$this->input->post('category'),'location'=>$this->input->post('location'),'short_desc'=>$this->input->post('short_desc'),'desc'=>$this->input->post('desc'),'date_time'=>$date_time);

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

	

	public function suspend($id="")

	{

		$this->load->library('pagination');
		
		$this->load->model('frontend/countries_model');
		
		$this->load->model('jobs_model');
		
		//$cond=array('suspend'=>'Y');
		
		if($id=="Y")
		{
			$cond=array('status'=>'Y','suspend'=>'Y');
			$vsl=5;
		}
		else if($id!=0)
		{
			$cond=array('jobs_id'=>$id,'suspend'=>'Y');
			$vsl=5;
		}
		else
		{
			$cond=array('suspend'=>'Y');
			$vsl=4;
		}

		$main['page_title']=$this->config->item('site_name').' - Job Applications';

		$main['header']=$this->adminheader();

		$main['footer']=$this->adminfooter();

		$main['left']=$this->adminleftmenu();

		$config['base_url'] = site_url('admin/careers/suspend/'.$id);

		$config['total_rows'] = $this->applications_model->get_pagination_count($cond);

		$config['per_page'] = '20';

		$config['uri_segment'] = $vsl;

		$config['first_link'] = 'First';

		$config['last_link'] = 'Last';

		$config['cur_tag_open'] = '<span>';

		$config['cur_tag_close'] = '</span>';

		$this->pagination->initialize($config);
		
		$content['countries']=$this->countries_model->get_active();
		
		$content['jobs']=$this->jobs_model->get_active();
		
		//print_r($content['jobs']);

		$content['careers']=$this->applications_model->get_pagination($config['per_page'],$this->uri->segment($config['uri_segment']),$cond);

		$main['content']=$this->load->view('admin/careers/suspended/lists',$content,true);

		$this->load->view('admin/main',$main);

	}
	
	public function applications($id="")

	{

		$this->load->library('pagination');
		
		$this->load->model('frontend/countries_model');
		
		$this->load->model('jobs_model');
	
        $content['list_type']='';	
		
        if($id=="Y")
		{
			$cond=array('status'=>'Y','suspend'=>'N');
			$vsl=5;
		}
		else if($id!=0)
		{
			$cond=array('jobs_id'=>$id,'suspend'=>'N');
			$vsl=5;
		}
		else
		{
            $newdata = array('shortlist_job'  =>''	);
			
            $this->session->unset_userdata($newdata);
            
            $cond=array('suspend'=>'N','status'=>'N',);
			
            $vsl=4;
            
            $content['list_type']='pending';
		}

		$main['page_title']=$this->config->item('site_name').' - Job Applications';

		$main['header']=$this->adminheader();

		$main['footer']=$this->adminfooter();

		$main['left']=$this->adminleftmenu();

		$config['base_url'] = site_url('admin/careers/applications/'.$id);

		$config['total_rows'] = $this->applications_model->get_pagination_count($cond);

		$config['per_page'] = '20';

		$config['uri_segment'] = $vsl;

		$config['first_link'] = 'First';

		$config['last_link'] = 'Last';

		$config['cur_tag_open'] = '<span>';

		$config['cur_tag_close'] = '</span>';

		$this->pagination->initialize($config);
		
		$content['countries']=$this->countries_model->get_active();
		
		$content['jobs']=$this->jobs_model->get_active();
		
		$content['categories']=$this->category_model->get_active();
		
		//print_r($content['jobs']);

		$content['careers']=$this->applications_model->get_pagination($config['per_page'],$this->uri->segment($config['uri_segment']),$cond);

		$main['content']=$this->load->view('admin/careers/applications/lists',$content,true);

		$this->load->view('admin/main',$main);

	}
	
    function shortlistview($id)
	{
		 
        $edit['id']=$id;
		$edit['job']= $this->applications_model->load($id);
        $edit['jobslist']=$this->jobs_model->get_active();
		$edit['jobtitle']=$this->jobs_model->load($id);
		$this->load->view('admin/careers/applications/shortlistview',$edit);
        
        
	}
    
	function shortlistapplication()
	{
            
		    $shortlistjob = $this->input->post('short_list_cat');
            
            $jobId = $this->input->post('job_id');
            
            $updateId = $this->applications_model->update(array('jobs_shortlist_id'=>$shortlistjob,'status'=>'Y'), array('id'=>$jobId));
            if($updateId)
			{
				echo "<script>parent.$.fancybox.close();parent.location.reload(true);</script>"; 
			}
			//redirect('admin/careers/applications/Y');exit;
		
	}
    
    
    
	function rateview($id)
	{
		$edit['id']=$id;
		$edit['job']= $this->applications_model->load($id);
		$edit['jobtitle']=$this->jobs_model->load($id);
		$this->load->view('admin/careers/applications/rateview',$edit);
	}


	function rateapplication($id,$stat)

	{

			$lid=$this->applications_model->update(array('rating'=>$this->input->post('r1')),array('id'=>$id));
			if($lid)
			{
				//redirect('admin/careers/applications/'.$stat);
				/*echo "<script>self.parent.location.href='".base_url('admin/careers/applications/'.$stat)."'</script>";*/
				echo "<script>parent.$.fancybox.close();parent.location.reload(true);</script>";
			}
			

	}
	
//	function rateapplication()
//
//	{
//			$edit['job']= $this->applications_model->load($this->input->post('id'));
//			$edit['jobtitle']=$this->jobs_model->load($this->input->post('id'));
//			$lid=$this->applications_model->update(array('rating'=>$this->input->post('star')),array('id'=>$this->input->post('id')));
//			$this->load->view('admin/careers/applications/rateview2',$edit);
////			if($lid)
////			{
////				redirect('admin/careers/applications/'.$stat);
////			}
//
//	}

	function jobpostupdate($id,$stat)
	{

			$lid=$this->applications_model->update(array('jobs_id'=>$this->input->post('jobs')),array('id'=>$id));
			if($lid)
			{
				redirect('admin/careers/applications/'.$stat);
			}

	}

	function viewapplication($id,$stat="",$return="")

	{

			$main['page_title']=$this->config->item('site_name').' - Job Application';

			$main['header']=$this->adminheader();

			$main['footer']=$this->adminfooter();

			$main['left']=$this->adminleftmenu();

			$edit['return']=@$return;

			$edit['job']= $this->applications_model->load($id);
			
			$edit['jobtitle']=$this->jobs_model->load($id);
           
            if($id && $id) {
                
               	$data=array('read'=>1);

				$cond=array('id'=>$id);

				$updateView =$this->applications_model->update($data,$cond);
                 
            }

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

	function applicationactions($id="")

	{

		$loginid = false;

		$ids=$this->input->post('id');	
				
		if(isset($_POST['reset']) && $this->input->post('reset')=='Reset'){

			$newdata = array(
					   'content_title'  => '',
					   'content_key'  => '',
					   'content_visa'  =>'',
					   'content_notice'  => '',
					   'content_skill'  =>'',
					   'content_country'  =>'',
					   'content_experience'  => '',
					   'content_department'  => '',
					   'content_license'  => '',
					   'content_rating'  => '',
					   'content_education'  => '',
					   'content_email'  => '',
					   'content_phone'  => '',
					   'content_category'  => '',
					   'content_from'  => '',
					   'content_to'  => '',
					   'content_job'  =>'',
                       'shortlist_job'  =>''

			);

			$this->session->unset_userdata($newdata);

			redirect('admin/careers/applications/'.$id);

		}
	
         if(isset($_POST['download']) && $this->input->post('download')=='Download Resumes'){ 
          
          $this->load->helper('download');
	      $this->load->library('zip');
          if($ids){

            //print_r($ids);exit;
			foreach($ids as $jobid):
  
            //echo $jobid;
            $job = $this->applications_model->load($jobid);
			
			
		    //force_download($job->resume, $data);				
            
            $data[$job->resume] = file_get_contents("public/uploads/resumes/".$job->resume);
                
          	endforeach;  
            
            $this->zip->add_data($data);

            $this->zip->download('Short_listed_resumes_'.time().'.zip');

            
            
         }
        
        }
		if(isset($_POST['enable']) && $this->input->post('enable')=='Shortlist'){ $status='Y';}
       
        $removedfromShortlist='N';
      	
          if(isset($_POST['disable']) && $this->input->post('disable')=='Remove from shortlist'){ $status='N';}

        	if($ids && isset($status) && $this->input->post('disable')=='Remove from shortlist'){

			foreach($ids as $id1):

				$data=array('status'=>$status,'jobs_shortlist_id'=>0);

				$cond=array('id'=>$id1);

				$loginid=$this->applications_model->update($data,$cond);
                
                $removedfromShortlist='Y';				

		     	endforeach;

		}
		

		/*if($ids && isset($status)){

			foreach($ids as $id1):

				$data=array('status'=>$status);

				$cond=array('id'=>$id1);

				$loginid=$this->applications_model->update($data,$cond);				

			endforeach;

		}*/
        
        
		
		if(isset($_POST['enable2']) && $this->input->post('enable2')=='Suspend'){ $status2='Y';}

		if(isset($_POST['disable2']) && $this->input->post('disable2')=='Unsuspend'){ $status2='N';}

		if($ids && isset($status2)){

			foreach($ids as $id2):

				$data=array('suspend'=>$status2);
				
				$mail=$this->applications_model->load($id2);

				$cond=array('email'=>$mail->email);

				$loginid=$this->applications_model->update($data,$cond);				

			endforeach;

		}
		
		if(isset($_POST['search']) && $this->input->post('search')=='Search'){

			if($this->input->post('keyword')!='' || $this->input->post('visa')!='' || $this->input->post('skill')!='' || $this->input->post('country')!='' || $this->input->post('job')!='' 
            || $this->input->post('title')!='' || $this->input->post('experience')!='' || $this->input->post('department')!='' || $this->input->post('license')!='' || $this->input->post('rating')!='' 
            || $this->input->post('noticeperiod')!='' || $this->input->post('education')!='' || $this->input->post('email')!='' || $this->input->post('phone')!=''|| $this->input->post('todate')!='' 
            || $this->input->post('fromdate')!='' || $this->input->post('category')!='' || $this->input->post('shortlist_job')!='' || $this->input->post('sortby')!=''){

				$newdata = array(
					   'content_title'  => $this->input->post('title'),
					   'content_key'  => $this->input->post('keyword'),
					   'content_visa'  => $this->input->post('visa'),
					   'content_notice'  => $this->input->post('noticeperiod'),
					   'content_skill'  => $this->input->post('skill'),
					   'content_country'  => $this->input->post('country'),
					   'content_experience'  => $this->input->post('experience'),
					   'content_department'  => $this->input->post('department'),
					   'content_license'  => $this->input->post('license'),
					   'content_rating'  => $this->input->post('rating'),
					   'content_education'  => $this->input->post('education'),
					   'content_email'  => $this->input->post('email'),
					   'content_phone'  => $this->input->post('phone'),
					   'content_category'  => $this->input->post('category'),
					   'content_from'  => $this->input->post('fromdate'),
					   'content_to'  => $this->input->post('todate'),
					   'content_job'  => $this->input->post('job'),
                       'shortlist_job'  => $this->input->post('shortlist_job')
                       

				);

				$this->session->set_userdata($newdata);

			} else {

				$newdata = array(
					   'content_title' => '',
					   'content_key'  => '',
					   'content_visa'  =>'',
					   'content_notice'  => '',
					   'content_skill'  =>'',
					   'content_country'  =>'',
					   'content_experience'  => '',
					   'content_department'  => '',
					   'content_license'  => '',
					   'content_rating'  => '',
					   'content_education'  => '',
					   'content_email'  => '',
					   'content_phone'  => '',
					   'content_category'  => '',
					   'content_from'  => '',
					   'content_to'  => '',
					   'content_job'  =>'',
                       'shortlist_job'  =>'',
				);

				$this->session->unset_userdata($newdata);
			}

			redirect('admin/careers/applications/'.$id);

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
                $retunValue=$this->input->post('return');
                
                if($removedfromShortlist == 'Y') 
                { 
                    $retunValue='Y';
                }
        
        		redirect('admin/careers/applications/'.$retunValue);

	}	
	
	function suspendactions($id="")

	{

		$loginid = false;

		$ids=$this->input->post('id');	
		
		if(isset($_POST['reset']) && $this->input->post('reset')=='Reset'){

			$newdata = array(
					   'content_title'  => '',
					   'content_key'  => '',
					   'content_visa'  =>'',
					   'content_notice'  => '',
					   'content_skill'  =>'',
					   'content_country'  =>'',
					   'content_experience'  => '',
					   'content_department'  => '',
					   'content_license'  => '',
					   'content_rating'  => '',
					   'content_job'  =>''

			);

			$this->session->unset_userdata($newdata);

			redirect('admin/careers/suspend/'.$id);

		}
	

		if(isset($_POST['enable']) && $this->input->post('enable')=='Shortlist'){ $status='Y';}

		if(isset($_POST['disable']) && $this->input->post('disable')=='Remove from shortlist'){ $status='N';}

		if($ids && isset($status)){

			foreach($ids as $id1):

				$data=array('status'=>$status);

				$cond=array('id'=>$id1);

				$loginid=$this->applications_model->update($data,$cond);				

			endforeach;

		}
		
		if(isset($_POST['enable2']) && $this->input->post('enable2')=='Suspend'){ $status2='Y';}

		if(isset($_POST['disable2']) && $this->input->post('disable2')=='Unsuspend'){ $status2='N';}

		if($ids && isset($status2)){

			foreach($ids as $id2):

				$data=array('suspend'=>$status2);

				$mail=$this->applications_model->load($id2);

				$cond=array('email'=>$mail->email);

				$loginid=$this->applications_model->update($data,$cond);				

			endforeach;

		}
		
		if(isset($_POST['search']) && $this->input->post('search')=='Search'){

			if($this->input->post('keyword')!='' || $this->input->post('visa')!='' || $this->input->post('skill')!='' || $this->input->post('country')!='' || $this->input->post('job')!='' || $this->input->post('title')!='' || $this->input->post('experience')!='' || $this->input->post('department')!='' || $this->input->post('license')!='' || $this->input->post('rating')!='' || $this->input->post('noticeperiod')!='' ||   $this->input->post('sortby')!=''){

				$newdata = array(
					   'content_title'  => $this->input->post('title'),
					   'content_key'  => $this->input->post('keyword'),
					   'content_visa'  => $this->input->post('visa'),
					   'content_notice'  => $this->input->post('noticeperiod'),
					   'content_skill'  => $this->input->post('skill'),
					   'content_country'  => $this->input->post('country'),
					   'content_experience'  => $this->input->post('experience'),
					   'content_department'  => $this->input->post('department'),
					   'content_license'  => $this->input->post('license'),
					   'content_rating'  => $this->input->post('rating'),
					   'content_job'  => $this->input->post('job')

				);

				$this->session->set_userdata($newdata);

			} else {

				$newdata = array(
					   'content_title'  => '',
					   'content_key'  => '',
					   'content_visa'  =>'',
					   'content_notice'  => '',
					   'content_skill'  =>'',
					   'content_country'  =>'',
					   'content_experience'  => '',
					   'content_department'  => '',
					   'content_license'  => '',
					   'content_rating'  => '',
					   'content_job'  =>''

				);

				$this->session->unset_userdata($newdata);
			}

			redirect('admin/careers/suspend/'.$id);

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

		redirect('admin/careers/suspend/'.$this->input->post('return'));

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