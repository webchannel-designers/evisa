<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends Ecsfront_Controller {

//	function __construct()
//    {
//		// Call the Model constructor
//		parent::__construct();
//		if(!$this->session->userdata('userid'))
//		{
//		   redirect('home');		
//		}
//	}

	public function index($msg = NULL)

	{

		//redirect('home');
		$data['msg'] = $msg;
		$this->load->view('frontend/register/login',$data);

	}
	
	public function comments($id="")

	{
		if(!$this->session->userdata('userid'))
		{
		   redirect('home');		
		}		
        $this->load->model('frontend/login_model');
		
		$this->load->model('frontend/pages_model');
		
		$pagemeta=$this->pages_model->get_row_cond(array('key'=>'comments'));
		if($pagemeta->title!=''){$this->pagetitle=$pagemeta->title;}
		if($pagemeta->short_desc!=''){$this->desc=$pagemeta->short_desc; }
		if($pagemeta->keywords!=''){$this->keys=$pagemeta->keywords; }
		if($pagemeta->banner_image!=''){$this->pagebannner=base_url('public/uploads/pages/'.$pagemeta->banner_image); }
		if($pagemeta->banner_text!=''){$this->pagebannnertext=$pagemeta->banner_text; }
		//$this->left_widgets=$this->widgets_model->get_pagewidgets($pagemeta->widgets);
		$this->breadcrumbarr=array('/'=>$this->alphasettings['BREADCRUMB_START'],site_url('login/comments/'.$id) =>$this->pagetitle);
		
		$this->load->library('pagination');

		$main['page_title']=$this->config->item('site_name').' - Comments';

		$main['header']=$this->frontheader();
			
		$main['footer']=$this->frontfooter();
			
		$main['meta']=$this->frontmetahead();

		$config['base_url'] = site_url('login/comments/'.$id);

		$config['total_rows'] = $this->login_model->get_pagination_count2(array('pid'=>$id));

		$config['per_page'] = '50';

		$config['uri_segment'] = 5;

		$config['first_link'] = 'First';

		$config['last_link'] = 'Last';

		$config['cur_tag_open'] = '<span>';

		$config['cur_tag_close'] = '</span>';

		$this->pagination->initialize($config);

		//$content['contentfields'] = $this->login_model->get_fields2();

		$content['sortorders'] = array('asc'=>'Ascending','desc'=>'Descending');
		
		$content['contentcats'] = $this->productcategory_model->get_array();
		
		$content['contents']=$this->login_model->get_pagination2($config['per_page'],$this->uri->segment($config['uri_segment']),array('pid'=>$id));
		
		//print_r($content['contents']);
						
		//$content['categories']=$this->productcategory_model->get_idpair();
		
		$main['contents']=$this->load->view('frontend/register/listscomment',$content,true);

		$this->load->view('frontend/main',$main);

	}
	
	public function process(){
        // Load the model
        
        $this->load->model('frontend/login_model');
        // Validate the user can login
        $result = $this->login_model->validate();
       
        // Now we verify the result
        if(! $result){
            // If user did not validate, then show them login page again
            $msg = '<label class="error">Invalid username and/or password.</label>';
            $this->index($msg);
        }else{
            // If user did validate, 
            // Send them to members area
  			echo "<script>window.parent.location.href='".site_url('login/myhome')."'</script>";
            //redirect('home');
        }        
    }	
	
	public function forgot(){
        // Load the model
        
        $this->load->model('frontend/login_model');
        // Validate the user can login
		$email = $this->input->post('email');
        $result = $this->login_model->forgot($email);
       
        // Now we verify the result
        if($result==0){
            // If user did not validate, then show them login page again
            $msg = '<label class="error">Email-Id does not exists.</label>';
            $this->index($msg);
        }else{
            // If user did validate, 
            // Send them to members area
        	$maindata = $this->login_model->forgotmail($email);
			$message = $this->load->view('frontend/mail/forgot',$maindata,TRUE);
			$this->adminnotification3( 'Forgot Password',$message,$email);
			$this->load->view('frontend/register/forgotsuccess');	
            //redirect('home');
        }        
    }	
	
	public function register()
	{
		
		$this->outputCache();
		$this->load->model('frontend/pages_model');
		
		$pagemeta=$this->pages_model->get_row_cond(array('key'=>'register'));
		if($pagemeta->title!=''){$this->pagetitle=$pagemeta->title;}
		if($pagemeta->short_desc!=''){$this->desc=$pagemeta->short_desc; }
		if($pagemeta->keywords!=''){$this->keys=$pagemeta->keywords; }
		if($pagemeta->banner_image!=''){$this->pagebannner=base_url('public/uploads/pages/'.$pagemeta->banner_image); }
		if($pagemeta->banner_text!=''){$this->pagebannnertext=$pagemeta->banner_text; }
		//$this->left_widgets=$this->widgets_model->get_pagewidgets($pagemeta->widgets);
		$this->breadcrumbarr=array('/'=>$this->alphasettings['BREADCRUMB_START'],site_url('login/register') =>$this->pagetitle);
		$this->load->model('frontend/register_model');
		$home['contacts']=$this->register_model->get_active();
		$home['events']=$this->events_model->get_array_limit(2);
		
		//print_r($home['contacts']);exit;
		$frontcontent=$this->load->view('frontend/register/register',$home,true);
		//$main['contents']=$this->frontcontent($frontcontent,true);
		
		$main['contents']=$frontcontent;
		$main['header']=$this->frontheader();
		$main['footer']=$this->frontfooter();
		$main['meta']=$this->frontmetahead();
		$this->load->view('frontend/main',$main);
		
	}
	
	public function activation($id="")
	{
        $this->load->model('frontend/login_model');
		$this->outputCache();
		$this->load->model('frontend/pages_model');
		
		$pagemeta=$this->pages_model->get_row_cond(array('key'=>'activation'));
		if($pagemeta->title!=''){$this->pagetitle=$pagemeta->title;}
		if($pagemeta->short_desc!=''){$this->desc=$pagemeta->short_desc; }
		if($pagemeta->keywords!=''){$this->keys=$pagemeta->keywords; }
		if($pagemeta->banner_image!=''){$this->pagebannner=base_url('public/uploads/pages/'.$pagemeta->banner_image); }
		if($pagemeta->banner_text!=''){$this->pagebannnertext=$pagemeta->banner_text; }
		//$this->left_widgets=$this->widgets_model->get_pagewidgets($pagemeta->widgets);
		$this->breadcrumbarr=array('/'=>$this->alphasettings['BREADCRUMB_START'],site_url('login/register') =>$this->pagetitle);
		$this->load->model('frontend/register_model');
		$home['contacts']=$this->register_model->get_active();
		$home['active']=$this->login_model->make_active($id);
		$home['events']=$this->events_model->get_array_limit(2);
		
		//print_r($home['contacts']);exit;
		$frontcontent=$this->load->view('frontend/register/activation',$home,true);
		//$main['contents']=$this->frontcontent($frontcontent,true);
		
		$main['contents']=$frontcontent;
		$main['header']=$this->frontheader();
		$main['footer']=$this->frontfooter();
		$main['meta']=$this->frontmetahead();
		$this->load->view('frontend/main',$main);
		
	}
	
	public function register2()
	{
		$this->load->model('frontend/countries_model');
		$this->form_validation->set_rules('fullname', 'Your Name', 'required|callback_alphaspace_check');
		
		$this->form_validation->set_rules('city', 'City', 'required');	
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		//$this->form_validation->set_rules('phone', 'Phone', 'required|numeric');
		
		$this->form_validation->set_rules('mobile', 'Mobile', 'required|numeric');
		$this->form_validation->set_rules('password', 'Password', 'required');
		
		//$this->form_validation->set_rules('country', 'Country', 'required');
		//$this->form_validation->set_rules('message', 'Message', 'required');
		$this->form_validation->set_rules('captcha', 'Captcha', 'required|callback_captcha_check');
		$this->form_validation->set_message('required', convert_lang('required',$this->alphalocalization));
		$this->form_validation->set_message('valid_email', convert_lang('Invalid Email',$this->alphalocalization));
		$this->form_validation->set_message('numeric', convert_lang('numbers only',$this->alphalocalization));
		$this->form_validation->set_error_delimiters('<span class="red">(', ')</span>');
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->helper('captcha');
			$vals = array(
				'img_path' => 'public/captcha/',
				'img_url' => base_url('public/captcha/').'/',
				'font_path' => 'public/frontend/fonts/opensans-bold-webfont.ttf',
				'img_width' => '100',
    			'img_height' => '32'
				);			
			$cap = create_captcha($vals);			
			$data = array(
				'captcha_time' => $cap['time'],
				'ip_address' => $this->input->ip_address(),
				'word' => $cap['word']
				);			
			$query = $this->db->insert_string('captcha', $data);
			$this->db->query($query);	
			$list['cap'] = $cap;
			
			$list['countries'] = $this->countries_model->get_active();			
			$this->load->view('frontend/register/registerform',$list);
		} else {
			$uniq = uniqid();
			$maindata=array('key'=>$uniq,'fname'=>$this->input->post('fullname'),'email'=>$this->input->post('email'),'city'=>$this->input->post('city'),'phone'=>$this->input->post('mobile'),'phone2'=>$this->input->post('phone'),'passwordcopy'=>$this->input->post('password'),'password'=>md5($this->input->post('password')));
			
			$this->load->model('frontend/register_model');
			
			$descdata = "";
			
			$coun = $this->register_model->check($this->input->post('email'));
			if($coun>0)
			{
			$this->load->view('frontend/register/registererror');	
			}
			else
			{
			$insertid = $this->register_model->insert($maindata,$descdata);
			$message = $this->load->view('frontend/mail/register',$maindata,TRUE);
			$this->adminnotification2( 'Emirates Cardiac Society - Registration Details',$message,$this->input->post('email'));
			$this->load->view('frontend/register/registersuccess');	
			}
	   	}
	}
	
	public function myhome()
	{
		if(!$this->session->userdata('userid'))
		{
		   redirect('home');		
		}		
		$this->outputCache();
		$this->load->model('frontend/pages_model');
		$this->load->model('frontend/login_model');
		
		$pagemeta=$this->pages_model->get_row_cond(array('key'=>'myhome'));
		if($pagemeta->title!=''){$this->pagetitle=$pagemeta->title;}
		if($pagemeta->short_desc!=''){$this->desc=$pagemeta->short_desc; }
		if($pagemeta->keywords!=''){$this->keys=$pagemeta->keywords; }
		if($pagemeta->banner_image!=''){$this->pagebannner=base_url('public/uploads/pages/'.$pagemeta->banner_image); }
		if($pagemeta->banner_text!=''){$this->pagebannnertext=$pagemeta->banner_text; }
		//$this->left_widgets=$this->widgets_model->get_pagewidgets($pagemeta->widgets);
		$this->breadcrumbarr=array('/'=>$this->alphasettings['BREADCRUMB_START'],site_url('login/myhome') =>$this->pagetitle);
		$this->load->model('frontend/register_model');
		$home['contacts']=$this->register_model->get_active();
		$home['events']=$this->events_model->get_array_limit(2);
		
		$this->load->library('pagination');

		$config['base_url'] = base_url($this->session->userdata('front_language').'/login/myhome/list/');

		$config['total_rows'] = $this->login_model->get_pagination_count();

		$config['per_page'] = '2';

		$config['uri_segment'] = 5;

			$config['first_link'] = FALSE;

			$config['last_link'] = FALSE;

			$config['next_link'] = 'Next';

			$config['prev_link'] = 'Prev';

			$config['cur_tag_open'] = '<li class="active"><a>';

			$config['cur_tag_close'] = '</a></li>';

			$config['full_tag_open'] = '<ul class="pagination">';

			$config['full_tag_close'] = '</ul>';

			$config['num_tag_open'] = '<li>';

			$config['num_tag_close'] = '</li>';

			$config['next_tag_open'] = '<li class="right">';

			$config['next_tag_close'] = '</li>';

			$config['prev_tag_open'] = '<li class="left">';

			$config['prev_tag_close'] = '</li>';

		$this->pagination->initialize($config);

		$home['contentfields'] = $this->login_model->get_fields();

		$home['sortorders'] = array('asc'=>'Ascending','desc'=>'Descending');
		
		//$home['contentcats'] = $this->productcategory_model->get_array();
		
		$home['contents']=$this->login_model->get_pagination($config['per_page'],$this->uri->segment($config['uri_segment']),NULL,'sort_order ASC');
				
		//print_r($home['contacts']);exit;
		$frontcontent=$this->load->view('frontend/register/myhome',$home,true);
		//$main['contents']=$this->frontcontent($frontcontent,true);
		
		$main['contents']=$frontcontent;
		$main['header']=$this->frontheader();
		$main['footer']=$this->frontfooter();
		$main['meta']=$this->frontmetahead();
		$this->load->view('frontend/main',$main);
		
	}
	
	public function myhome2()
	{
		
		$this->load->model('frontend/countries_model');
		$this->form_validation->set_rules('fullname', 'Your Name', 'required|callback_alphaspace_check');
		
		$this->form_validation->set_rules('city', 'City', 'required');	
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		//$this->form_validation->set_rules('phone', 'Phone', 'required|numeric');
		
		$this->form_validation->set_rules('mobile', 'Mobile', 'required|numeric');
		//$this->form_validation->set_rules('password', 'Password', 'required');
		
		//$this->form_validation->set_rules('country', 'Country', 'required');
		//$this->form_validation->set_rules('message', 'Message', 'required');
		//$this->form_validation->set_rules('captcha', 'Captcha', 'required|callback_captcha_check');
		$this->form_validation->set_message('required', convert_lang('required',$this->alphalocalization));
		$this->form_validation->set_message('valid_email', convert_lang('Invalid Email',$this->alphalocalization));
		$this->form_validation->set_message('numeric', convert_lang('numbers only',$this->alphalocalization));
		$this->form_validation->set_error_delimiters('<span class="red">(', ')</span>');
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->helper('captcha');
			$this->load->model('frontend/register_model');

			$vals = array(
				'img_path' => 'public/captcha/',
				'img_url' => base_url('public/captcha/').'/',
				'font_path' => 'public/frontend/fonts/opensans-bold-webfont.ttf',
				'img_width' => '100',
    			'img_height' => '32'
				);			
			$cap = create_captcha($vals);			
			$data = array(
				'captcha_time' => $cap['time'],
				'ip_address' => $this->input->ip_address(),
				'word' => $cap['word']
				);			
			$query = $this->db->insert_string('captcha', $data);
			$this->db->query($query);	
			$list['cap'] = $cap;
			
			$list['details'] = $this->register_model->load($this->session->userdata('userid'));
			$list['countries'] = $this->countries_model->get_active();			
			$this->load->view('frontend/register/myhomeform',$list);
		} else {
			$maindata=array('fname'=>$this->input->post('fullname'),'email'=>$this->input->post('email'),'city'=>$this->input->post('city'),'phone'=>$this->input->post('mobile'),'phone2'=>$this->input->post('phone'));
			
			$this->load->model('frontend/register_model');
			
			$descdata = "";
			
			$insertid = $this->register_model->update($maindata,$descdata,$this->session->userdata('userid'));
			//$message = $this->load->view('frontend/mail/register',$maindata,TRUE);
			//$this->adminnotification( convert_lang($this->config->item('contact_request'),$this->alphalocalization),$message);
			$this->load->view('frontend/register/myhomesuccess');	
			$list['details'] = $this->register_model->load($this->session->userdata('userid'));
			$this->load->view('frontend/register/myhomeform',$list);		
	   	}
	}
	
	public function changepass()
	{
		if(!$this->session->userdata('userid'))
		{
		   redirect('home');		
		}		
		$this->outputCache();
		$this->load->model('frontend/pages_model');
		
		$pagemeta=$this->pages_model->get_row_cond(array('key'=>'changepass'));
		if($pagemeta->title!=''){$this->pagetitle=$pagemeta->title;}
		if($pagemeta->short_desc!=''){$this->desc=$pagemeta->short_desc; }
		if($pagemeta->keywords!=''){$this->keys=$pagemeta->keywords; }
		if($pagemeta->banner_image!=''){$this->pagebannner=base_url('public/uploads/pages/'.$pagemeta->banner_image); }
		if($pagemeta->banner_text!=''){$this->pagebannnertext=$pagemeta->banner_text; }
		//$this->left_widgets=$this->widgets_model->get_pagewidgets($pagemeta->widgets);
		$this->breadcrumbarr=array('/'=>$this->alphasettings['BREADCRUMB_START'],site_url('login/changepass') =>$this->pagetitle);
		$this->load->model('frontend/register_model');
		$home['contacts']=$this->register_model->get_active();
		$home['events']=$this->events_model->get_array_limit(2);
		
		//print_r($home['contacts']);exit;
		$frontcontent=$this->load->view('frontend/register/changepass',$home,true);
		//$main['contents']=$this->frontcontent($frontcontent,true);
		
		$main['contents']=$frontcontent;
		$main['header']=$this->frontheader();
		$main['footer']=$this->frontfooter();
		$main['meta']=$this->frontmetahead();
		$this->load->view('frontend/main',$main);
		
	}
	
	public function changepass2()
	{
		
		$this->load->model('frontend/countries_model');
		//$this->form_validation->set_rules('fullname', 'Your Name', 'required|callback_alphaspace_check');
		
		$this->form_validation->set_rules('currentpassword', 'Current Password', 'required');	
		//$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		//$this->form_validation->set_rules('phone', 'Phone', 'required|numeric');
		
		//$this->form_validation->set_rules('mobile', 'Mobile', 'required|numeric');
		$this->form_validation->set_rules('password', 'Password', 'required');
		
		//$this->form_validation->set_rules('country', 'Country', 'required');
		//$this->form_validation->set_rules('message', 'Message', 'required');
		//$this->form_validation->set_rules('captcha', 'Captcha', 'required|callback_captcha_check');
		$this->form_validation->set_message('required', convert_lang('required',$this->alphalocalization));
		$this->form_validation->set_message('valid_email', convert_lang('Invalid Email',$this->alphalocalization));
		$this->form_validation->set_message('numeric', convert_lang('numbers only',$this->alphalocalization));
		$this->form_validation->set_error_delimiters('<span class="red">(', ')</span>');
		if ($this->form_validation->run() == FALSE)
		{
			$this->load->helper('captcha');
			$this->load->model('frontend/register_model');

			$vals = array(
				'img_path' => 'public/captcha/',
				'img_url' => base_url('public/captcha/').'/',
				'font_path' => 'public/frontend/fonts/opensans-bold-webfont.ttf',
				'img_width' => '100',
    			'img_height' => '32'
				);			
			$cap = create_captcha($vals);			
			$data = array(
				'captcha_time' => $cap['time'],
				'ip_address' => $this->input->ip_address(),
				'word' => $cap['word']
				);			
			$query = $this->db->insert_string('captcha', $data);
			$this->db->query($query);	
			$list['cap'] = $cap;
			
			$list['details'] = $this->register_model->load($this->session->userdata('userid'));
			$list['countries'] = $this->countries_model->get_active();			
			$this->load->view('frontend/register/changepassform',$list);
		} else {
			$maindata=array('passwordcopy'=>$this->input->post('password'),'password'=>md5($this->input->post('password')));
			//$maindata2=array('passwordcopy'=>$this->input->post('currentpassword'));
				
			$this->load->model('frontend/register_model');
			$chkid = $this->register_model->chkpass($this->input->post('currentpassword'),$this->session->userdata('userid'));
			
			$descdata = "";
			
			if($chkid > 0)
			{
			$insertid = $this->register_model->update($maindata,$descdata,$this->session->userdata('userid'));
			//$message = $this->load->view('frontend/mail/register',$maindata,TRUE);
			//$this->adminnotification( convert_lang($this->config->item('contact_request'),$this->alphalocalization),$message);
			$this->load->view('frontend/register/myhomesuccess');	
			$list['details'] = $this->register_model->load($this->session->userdata('userid'));
			$this->load->view('frontend/register/changepassform',$list);
			}
			else
			{
			$this->load->view('frontend/register/myhomepassmismatch');	
			$list['details'] = $this->register_model->load($this->session->userdata('userid'));
			$this->load->view('frontend/register/changepassform',$list);
			}
	   	}
	}
	
	function add()
	{
		if(!$this->session->userdata('userid'))
		{
		   redirect('home');		
		}		
		
        $this->load->model('frontend/login_model');
		
		$this->load->model('frontend/pages_model');
		
		$pagemeta=$this->pages_model->get_row_cond(array('key'=>'vehicle'));
		if($pagemeta->title!=''){$this->pagetitle=$pagemeta->title;}
		if($pagemeta->short_desc!=''){$this->desc=$pagemeta->short_desc; }
		if($pagemeta->keywords!=''){$this->keys=$pagemeta->keywords; }
		if($pagemeta->banner_image!=''){$this->pagebannner=base_url('public/uploads/pages/'.$pagemeta->banner_image); }
		if($pagemeta->banner_text!=''){$this->pagebannnertext=$pagemeta->banner_text; }
		//$this->left_widgets=$this->widgets_model->get_pagewidgets($pagemeta->widgets);
		$this->breadcrumbarr=array('/'=>$this->alphasettings['BREADCRUMB_START'],site_url('login/add') =>$this->pagetitle);
		
		//$this->load->library('ckeditor');

		//$this->load->library('ckfinder');

		//$this->ckeditor->basePath = base_url('public/admin/ckeditor/');

		$this->ckeditor->config['language'] = 'en';

		$this->ckeditor->config['width'] = '100%';

		$this->ckeditor->config['height'] = '200px';

		//Add Ckfinder to Ckeditor

		//$this->ckfinder->SetupCKEditor($this->ckeditor,base_url('public/admin/ckfinder/'));

		$this->form_validation->set_rules('title', 'Title', 'required');

		$this->form_validation->set_rules('short_desc', 'Short Description', 'required');

		$this->form_validation->set_rules('keywords', 'Keywords', '');

		$this->form_validation->set_rules('desc', 'Description', 'required');
		
		//$this->form_validation->set_rules('feat', 'Features', 'required');

		$this->form_validation->set_rules('meta_desc', 'Meta Description', '');

		$this->form_validation->set_rules('category_id', 'Category', 'required');
		
		$this->form_validation->set_rules('make_id', 'Make', 'required');
		
		//$this->form_validation->set_rules('model_id', 'Model', 'required');
		
		$this->form_validation->set_rules('location_id', 'Location', 'required');

		//$this->form_validation->set_rules('status', 'Status', 'required');
		
		//$this->form_validation->set_rules('featured', 'Featured', 'required');

		$this->form_validation->set_message('required', 'required');

		$this->form_validation->set_error_delimiters('<span class="red">(', ')</span>');

		if ($this->form_validation->run() == FALSE)

		{

			$main['page_title']=$this->config->item('site_name').' - Products';

			$main['header']=$this->frontheader();
			
			$main['footer']=$this->frontfooter();
			
			$main['meta']=$this->frontmetahead();

			//$main['left']=$this->adminleftmenu();

			$add['contentcats'] = $this->productcategory_model->get_array();
			
			$add['makes'] = $this->makes_model->get_active();
			
			$add['models'] = $this->model_model->get_active();
			
			$add['locations'] = $this->location_model->get_active();
			
			//$add['widgets']=$this->widgets_model->get_rightwidgets();

			$main['contents']=$this->load->view('frontend/register/addvehicle',$add,true);

			$this->load->view('frontend/main',$main);

		} else {
			
			$banner_image='';

			$content_image='';

			$config['upload_path'] = 'public/uploads/products';

			$config['allowed_types'] = 'gif|jpg|png';

			$this->load->library('upload', $config);

			if($this->upload->do_upload('banner_image'))

			{

				$banner_imagedata=$this->upload->data();

				$banner_image=$banner_imagedata['file_name'];

			}

			if($this->upload->do_upload('image'))

			{

				$contentimagedata=$this->upload->data();

				$content_image=$contentimagedata['file_name'];

			}

			$i=0;

			$widgets=array();

			if($this->input->post('widgets'))

			foreach($this->input->post('widgets') as $widgetrow): $i++;

				$widgets[]=$widgetrow.':'.$i;

			endforeach;

			$widgets = implode(',',$widgets);

			$slug = $this->login_model->create_slug($this->input->post('title'));

			$date_time = date("Y-m-d H:i:s");

			if($this->input->post('date_time')!='')

			{ 

				$date_time = date("Y-m-d H:i:s", strtotime($this->input->post('date_time')));

			}

			$maindata=array('featured'=>$this->input->post('featured'),'status'=>'N','category_id'=>$this->input->post('category_id'),'slug'=>$slug,'widgets'=>$widgets);

			$descdata=array('type_id'=>$this->input->post('veh-type'),'year'=>$this->input->post('year'),'milage'=>$this->input->post('milage'),'uid'=>$this->session->userdata('userid'),'categoryid'=>$this->input->post('category_id'),'type'=>$this->input->post('type_id'),'title'=>$this->input->post('title'),'make_id'=>$this->input->post('make_id'),'model_id'=>$this->input->post('model_id'),'location_id'=>$this->input->post('location_id'),'kilometer'=>$this->input->post('kilometer'),'engine'=>$this->input->post('engine'),'fuel_type'=>$this->input->post('fuel'),'color'=>$this->input->post('color'),'transmission'=>$this->input->post('transmission'),'steering_wheel'=>$this->input->post('steering'),'drive_type'=>$this->input->post('drive'),'condition'=>$this->input->post('condition'),'price'=>$this->input->post('price'),'short_desc'=>$this->input->post('short_desc'),'meta_desc'=>$this->input->post('meta_desc'),'keywords'=>$this->input->post('keywords'),'desc'=>$this->input->post('desc'),'feat'=>$this->input->post('feat'),'banner_text'=>$this->input->post('banner_text'),'banner_image'=>$banner_image,'image'=>$content_image,'date_time'=>$date_time);

			$insertid=$this->login_model->insert($maindata,$descdata);

			if($insertid){

				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
							 	<p>Vehicle details added successfully</p>
								<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							</div>');

				//redirect('login/lists');
				echo "<script language='javascript'>window.location='".site_url('login/myhome/list/')."'</script>";

			} else {

				$this->session->set_flashdata('message', '<div class="n_error flash_messages"><p>Error!! - Content not added.</p></div>');
				echo "<script language='javascript'>window.location='".site_url('login/myhome/list/')."'</script>";
				//redirect('login/lists');

			}

		}

	}
	
	function addgal()

	{
		if(!$this->session->userdata('userid'))
		{
		   redirect('home');		
		}		
        $this->load->model('frontend/login_model');
		
		$this->load->model('frontend/pages_model');
		
		$pagemeta=$this->pages_model->get_row_cond(array('key'=>'gallery'));
		if($pagemeta->title!=''){$this->pagetitle=$pagemeta->title;}
		if($pagemeta->short_desc!=''){$this->desc=$pagemeta->short_desc; }
		if($pagemeta->keywords!=''){$this->keys=$pagemeta->keywords; }
		if($pagemeta->banner_image!=''){$this->pagebannner=base_url('public/uploads/pages/'.$pagemeta->banner_image); }
		if($pagemeta->banner_text!=''){$this->pagebannnertext=$pagemeta->banner_text; }
		//$this->left_widgets=$this->widgets_model->get_pagewidgets($pagemeta->widgets);
		$this->breadcrumbarr=array('/'=>$this->alphasettings['BREADCRUMB_START'],site_url('login/addgal/'.$this->uri->segment(4)) =>$this->pagetitle);
		
		$this->load->library('ckeditor');

		$this->load->library('ckfinder');

		$this->ckeditor->basePath = base_url('public/admin/ckeditor/');

		$this->ckeditor->config['language'] = 'en';

		$this->ckeditor->config['width'] = '100%';

		$this->ckeditor->config['height'] = '200px';

		//Add Ckfinder to Ckeditor

		$this->ckfinder->SetupCKEditor($this->ckeditor,base_url('public/admin/ckfinder/'));

		$this->form_validation->set_rules('title', 'Title', 'required');
	
		$this->form_validation->set_message('required', 'required');

		$this->form_validation->set_error_delimiters('<span class="red">(', ')</span>');
		
			$main['page_title']=$this->config->item('site_name').' - Gallery';

			$main['header']=$this->frontheader();
			
			$main['footer']=$this->frontfooter();
			
			$main['meta']=$this->frontmetahead();

			$icon='';

			$image='';

			$config['upload_path'] = 'public/uploads/gallery';

			$config['allowed_types'] = 'jpeg|jpg|png|gif';

			$this->load->library('upload',$config);
			
			$product_id = $this->uri->segment(4);
			
			if (empty($_FILES['image']['size']))
	
			{
				$edit['records']=$this->login_model->get_array_cond($product_id);		
				$main['contents']=$this->load->view('frontend/register/addimg',$edit,true);
				$this->load->view('frontend/main',$main);
	
			} else {

//			if($this->upload->do_upload('icon'))
//
//			{
//
//				$icondata=$this->upload->data();
//
//				$icon=$icondata['file_name'];
//
//			}
			$files = $_FILES;
			$cpt = count($_FILES['image']['name']);
			for($i=0; $i<$cpt; $i++) {
				$_FILES['image']['name']= $files['image']['name'][$i];
                $_FILES['image']['type']= $files['image']['type'][$i];
                $_FILES['image']['tmp_name']= $files['image']['tmp_name'][$i];
                $_FILES['image']['error']= $files['image']['error'][$i];
                $_FILES['image']['size']= $files['image']['size'][$i];	
				$this->upload->initialize($config);
				$image = $_FILES['image']['name'];
				$this->upload->do_upload();		
			if($this->upload->do_upload('image'))
			{

				$bannerdata=$this->upload->data();

				$image=$bannerdata['file_name'];

			}	

//			$_FILES['image']['name']= $value['name'][$s];
//			$_FILES['image']['type']= $value['type'][$s];
//			$_FILES['image']['tmp_name']= $value['tmp_name'][$s];
//			$_FILES['image']['error']= $value['error'][$s];
//			$_FILES['image']['size']= $value['size'][$s]; 
			
			$maindata="";

			$descdata=array('parent_id'=>$product_id,'image'=>$image,'title'=>$this->input->post('title'),'language'=>$this->session->userdata('admin_language'));
			
			//print_r($descdata);exit;

			$insertid=$this->login_model->insertimg($maindata,$descdata);
			}

			if($insertid){

				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
							 	<p>Images added successfully</p>
								<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							</div>');
				
				//redirect('login/addgal/'.$product_id);
				
				echo "<script language='javascript'>window.location='".site_url('login/addgal/'.$product_id)."'</script>";

			} else {

				$this->session->set_flashdata('message', '<div class="n_error flash_messages"><p>Error!! - Image not added.</p></div>');

				//redirect('login/addgal/'.$product_id);
				
				echo "<script language='javascript'>window.location='".site_url('login/addgal/'.$product_id)."'</script>";

			}

		}
				//$records=$this->gallery_model->get_array();
				//$main['records']=$this->load->view('admin/gallery/add',$records,true);
				//$this->load->view('admin/main',$main);

	}
	
 	private function set_upload_options()
    {   

            $config = array();
            $config['upload_path'] = 'public/uploads/gallery';
            $config['allowed_types'] = 'jpeg|gif|jpg|png';
            $config['overwrite']     = FALSE;
            return $config;
    }	
	
	function updateimg()

	{
		if(!$this->session->userdata('userid'))
		{
		   redirect('home');		
		}		
        $this->load->model('frontend/login_model');
		
		$this->load->library('ckeditor');

		$this->load->library('ckfinder');

		$this->ckeditor->basePath = base_url('public/admin/ckeditor/');

		$this->ckeditor->config['language'] = 'en';

		$this->ckeditor->config['width'] = '100%';

		$this->ckeditor->config['height'] = '200px';

		//Add Ckfinder to Ckeditor

		$this->ckfinder->SetupCKEditor($this->ckeditor,base_url('public/admin/ckfinder/'));

		//$this->form_validation->set_rules('title', 'Title', 'required');

		//$this->form_validation->set_rules('short_desc', 'Short Description', 'required');

		//$this->form_validation->set_rules('status', 'Status', 'required');

		//$this->form_validation->set_message('required', 'required');

		//$this->form_validation->set_error_delimiters('<span class="red">(', ')</span>');
		
			$main['page_title']=$this->config->item('site_name').' - Gallery';

			$main['header']=$this->frontheader();
			
			$main['footer']=$this->frontfooter();
			
			$main['meta']=$this->frontmetahead();

//		if ($this->form_validation->run() == FALSE)
//
//		{
//			$edit['records']=$this->gallery_model->get_array();			
//			$main['content']=$this->load->view('admin/gallery/add',$edit,true);
//			$this->load->view('admin/main',$main);
//
//		} else {

			$icon='';

			$image='';

			//$config['upload_path'] = 'public/uploads/gallery';

			//$config['allowed_types'] = 'jpg|png|gif';

			//$this->load->library('upload', $config);

//			if($this->upload->do_upload('icon'))
//
//			{
//
//				$icondata=$this->upload->data();
//
//				$icon=$icondata['file_name'];
//
//			}

//			if($this->upload->do_upload('image'))
//
//			{
//
//				$bannerdata=$this->upload->data();
//
//				$image=$bannerdata['file_name'];
//
//			}			
			$product_id = $this->uri->segment(4);
			
			$maindata="";
			//$edit['records']=$this->gallery_model->get_array();
			
			$edit['records']=$this->login_model->get_array_cond($product_id);	
			
			foreach($edit['records'] as $key)
			{	

			$descdata=array('sort_order'=>$this->input->post('sort_'.$key['id']),'title'=>$this->input->post('title_'.$key['id']));

			$insertid=$this->login_model->updateimg($maindata,$descdata,$key['id']);
			
			}

				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
							 	<p>Sort order updated successfully</p>
								<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							</div>');
				
				//redirect('login/addimg/'.$product_id);
				echo "<script language='javascript'>window.location='".site_url('login/addgal/'.$product_id)."'</script>";

		//}
				//$records=$this->gallery_model->get_array();
				//$main['records']=$this->load->view('admin/gallery/add',$records,true);
				//$this->load->view('admin/main',$main);
	}
	
	function deleteimg($id)

	{
		if(!$this->session->userdata('userid'))
		{
		   redirect('home');		
		}		
		//echo 123;exit;
        $this->load->model('frontend/login_model');
		$product_id = $this->uri->segment(5);
		$loginid=$this->login_model->deleteimg($id);

		if($loginid){

			$this->session->set_flashdata('message', '<div class="n_ok flash_messages"><p>Image deleted Successfully.</p></div>');

			//redirect('login/add/'.$product_id);
			echo "<script language='javascript'>window.location='".site_url('login/addgal/'.$product_id)."'</script>";

		} else {

			$this->session->set_flashdata('message', '<div class="n_error flash_messages"><p>Error!! - Image not deleted.</p></div>');

			//redirect('login/add/'.$product_id);
			echo "<script language='javascript'>window.location='".site_url('login/addgal/'.$product_id)."'</script>";

		}

	}
	
	function setdefault($val,$id,$reurn='')

	{
		if(!$this->session->userdata('userid'))
		{
		   redirect('home');		
		}		
        $this->load->model('frontend/login_model');
		//$gallerydata = $this->gallery_model->load($id);
		$product_id = $this->uri->segment(5);
		$this->login_model->updateall(array('is_default'=>'N'),array('parent_id'=>$reurn));
		$result = $this->login_model->updateimg(array(),array('is_default'=>$val),$id);
		//if($result){
			$this->session->set_flashdata('message', '<div class="n_ok flash_messages"><p>Default image updated.</p></div>');

			//redirect('login/add/'.$reurn);
				echo "<script language='javascript'>window.location='".site_url('login/addgal/'.$reurn)."'</script>";
		/*//} else {

			$this->session->set_flashdata('message', '<div class="n_error flash_messages"><p>Error!! -Default Image not updated.</p></div>');

			redirect('admin/gallery/add/'.$reurn);

		}*/

	}
	
	function view($id,$return='')

	{
		if(!$this->session->userdata('userid'))
		{
		   redirect('home');		
		}		
		
        $this->load->model('frontend/login_model');
		
		$this->load->library('ckeditor');

		$this->load->library('ckfinder');

		$this->ckeditor->basePath = base_url('public/admin/ckeditor/');
		
		$this->load->model('frontend/pages_model');
		
		$pagemeta=$this->pages_model->get_row_cond(array('key'=>'events'));
		if($pagemeta->title!=''){$this->pagetitle=$pagemeta->title;}
		if($pagemeta->short_desc!=''){$this->desc=$pagemeta->short_desc; }
		if($pagemeta->keywords!=''){$this->keys=$pagemeta->keywords; }
		if($pagemeta->banner_image!=''){$this->pagebannner=base_url('public/uploads/pages/'.$pagemeta->banner_image); }
		if($pagemeta->banner_text!=''){$this->pagebannnertext=$pagemeta->banner_text; }
		//$this->left_widgets=$this->widgets_model->get_pagewidgets($pagemeta->widgets);
		$this->breadcrumbarr=array('/'=>$this->alphasettings['BREADCRUMB_START'],site_url('login/lists') =>$this->pagetitle,site_url('login/edit/'.$id.'/'.$return) =>'Edit '.$this->pagetitle);

		$this->ckeditor->config['language'] = 'en';

		$this->ckeditor->config['width'] = '100%';

		$this->ckeditor->config['height'] = '200px';

		//Add Ckfinder to Ckeditor

		$this->ckfinder->SetupCKEditor($this->ckeditor,base_url('public/admin/ckfinder/'));

		$this->form_validation->set_rules('title', 'Title', 'required');

		//$this->form_validation->set_rules('slug', 'Url Slug', 'required|callback_code_exists');

		$this->form_validation->set_rules('short_desc', 'Short Description', 'required');

		$this->form_validation->set_rules('keywords', 'Keywords', '');

		$this->form_validation->set_rules('desc', 'Description', 'required');
		
		//$this->form_validation->set_rules('feat', 'Features', 'required');

		$this->form_validation->set_rules('meta_desc', 'Meta Description', '');

		$this->form_validation->set_rules('category_id', 'Category', 'required');

		//$this->form_validation->set_rules('status', 'Status', 'required');
		
		//$this->form_validation->set_rules('featured', 'Featured', 'required');

		$this->form_validation->set_message('required', 'required');

		$this->form_validation->set_error_delimiters('<span class="red">(', ')</span>');

		if ($this->form_validation->run() == FALSE)

		{

			$main['page_title']=$this->config->item('site_name').' - Contents';

			$main['header']=$this->frontheader();
			
			$main['footer']=$this->frontfooter();
			
			$main['meta']=$this->frontmetahead();

			$edit['return']=$return;

			$edit['contentcats'] = $this->productcategory_model->get_array();
			
			//$edit['makes'] = $this->makes_model->get_active();
			
			//$edit['models'] = $this->model_model->get_active();
			
			//$edit['locations'] = $this->location_model->get_active();

			$edit['content']= $this->login_model->load($id);

			//$edit['widgets']=$this->widgets_model->get_rightwidgets();

			$main['contents']=$this->load->view('frontend/register/editvehicle',$edit,true);

			$this->load->view('frontend/main',$main);

		} else {

			$new_widgets=$this->input->post('widgets');

			$contentrow=$this->login_model->load($id);

			//$widgets=$this->get_editwidgets($contentrow,$new_widgets);	

			$slug=$this->login_model->update_slug($this->input->post('slug'),$id);

			$date_time = date("Y-m-d H:i:s");

			if($this->input->post('date_time')!='')

			{ 

				$date_time = date("Y-m-d H:i:s", strtotime($this->input->post('date_time')));

			}

			$maindata=array('category_id'=>$this->input->post('category_id'),'slug'=>$slug,'widgets'=>@$widgets);

			$descdata=array('type_id'=>$this->input->post('veh-type'),'year'=>$this->input->post('year'),'milage'=>$this->input->post('milage'),'categoryid'=>$this->input->post('category_id'),'type'=>$this->input->post('type_id'),'title'=>$this->input->post('title'),'make_id'=>$this->input->post('make_id'),'model_id'=>$this->input->post('model_id'),'location_id'=>$this->input->post('location_id'),'kilometer'=>$this->input->post('kilometer'),'engine'=>$this->input->post('engine'),'fuel_type'=>$this->input->post('fuel'),'color'=>$this->input->post('color'),'transmission'=>$this->input->post('transmission'),'steering_wheel'=>$this->input->post('steering'),'drive_type'=>$this->input->post('drive'),'condition'=>$this->input->post('condition'),'price'=>$this->input->post('price'),'short_desc'=>$this->input->post('short_desc'),'meta_desc'=>$this->input->post('meta_desc'),'keywords'=>$this->input->post('keywords'),'desc'=>$this->input->post('desc'),'feat'=>$this->input->post('feat'),'banner_text'=>$this->input->post('banner_text'),'banner_image'=>@$banner_image,'image'=>@$content_image);

			$config['upload_path'] = 'public/uploads/products';

			$config['allowed_types'] = 'gif|jpg|png';

			$this->load->library('upload', $config);

			if($this->upload->do_upload('banner_image'))

			{

				$banner_imagedata=$this->upload->data();

				$descdata['banner_image']=$banner_imagedata['file_name'];

			}

			if($this->upload->do_upload('image'))

			{

				$contentimagedata=$this->upload->data();

				$descdata['image']=$contentimagedata['file_name'];

			}

			$loginid=$this->login_model->update($maindata,$descdata,$id);

			if($loginid){

				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
							 	<p>Vehicle details updated successfully</p>
								<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							</div>');

				redirect('login/myhome/list/');
			/*echo "<script language='javascript'>wondow.location='".site_url('login/lists/'.$return)."'</script>";*/

			} else {

				$this->session->set_flashdata('message', '<div class="n_error flash_messages"><p>Error!! - Content not updated.</p></div>');

				redirect('login/myhome/list/');
				/*echo "<script language='javascript'>wondow.location='".site_url('login/lists/'.$return)."'</script>";*/

			}

		}

	}
	
	function editcomment($id,$return)

	{
		if(!$this->session->userdata('userid'))
		{
		   redirect('home');		
		}		
        $this->load->model('frontend/login_model');
		
		$this->load->library('ckeditor');

		$this->load->library('ckfinder');

		$this->ckeditor->basePath = base_url('public/admin/ckeditor/');
		
		$this->load->model('frontend/pages_model');
		
		$contentrow=$this->login_model->loadcomment($id);
		
		$pagemeta=$this->pages_model->get_row_cond(array('key'=>'comments'));
		if($pagemeta->title!=''){$this->pagetitle=$pagemeta->title;}
		if($pagemeta->short_desc!=''){$this->desc=$pagemeta->short_desc; }
		if($pagemeta->keywords!=''){$this->keys=$pagemeta->keywords; }
		if($pagemeta->banner_image!=''){$this->pagebannner=base_url('public/uploads/pages/'.$pagemeta->banner_image); }
		if($pagemeta->banner_text!=''){$this->pagebannnertext=$pagemeta->banner_text; }
		//$this->left_widgets=$this->widgets_model->get_pagewidgets($pagemeta->widgets);
		$this->breadcrumbarr=array('/'=>$this->alphasettings['BREADCRUMB_START'],site_url('login/comments/'.$contentrow->pid) =>$this->pagetitle,site_url('login/editcomment/'.$id.'/'.$return) =>'Edit '.$this->pagetitle);

		$this->ckeditor->config['language'] = 'en';

		$this->ckeditor->config['width'] = '100%';

		$this->ckeditor->config['height'] = '200px';

		//Add Ckfinder to Ckeditor

		$this->ckfinder->SetupCKEditor($this->ckeditor,base_url('public/admin/ckfinder/'));

		$this->form_validation->set_rules('name', 'Name', 'required');

		//$this->form_validation->set_rules('slug', 'Url Slug', 'required|callback_code_exists');

		$this->form_validation->set_rules('comment', 'Comment', 'required');

		$this->form_validation->set_rules('email', 'Email', '');

		//$this->form_validation->set_rules('desc', 'Description', 'required');
		
		//$this->form_validation->set_rules('feat', 'Features', 'required');

		//$this->form_validation->set_rules('meta_desc', 'Meta Description', '');

		//$this->form_validation->set_rules('category_id', 'Category', 'required');

		//$this->form_validation->set_rules('status', 'Status', 'required');
		
		//$this->form_validation->set_rules('featured', 'Featured', 'required');

		$this->form_validation->set_message('required', 'required');

		$this->form_validation->set_error_delimiters('<span class="red">(', ')</span>');

		if ($this->form_validation->run() == FALSE)

		{

			$main['page_title']=$this->config->item('site_name').' - Comments';

			$main['header']=$this->frontheader();
			
			$main['footer']=$this->frontfooter();
			
			$main['meta']=$this->frontmetahead();

			$edit['return']=$return;

//			$edit['contentcats'] = $this->productcategory_model->get_array();
//			
//			$edit['makes'] = $this->makes_model->get_active();
//			
//			$edit['models'] = $this->model_model->get_active();
//			
//			$edit['locations'] = $this->location_model->get_active();
//
			$edit['content']= $this->login_model->loadcomment($id);

			//$edit['widgets']=$this->widgets_model->get_rightwidgets();

			$main['contents']=$this->load->view('frontend/register/editcomment',$edit,true);

			$this->load->view('frontend/main',$main);

		} else {

			//$new_widgets=$this->input->post('widgets');

			$contentrow=$this->login_model->loadcomment($id);

			//$widgets=$this->get_editwidgets($contentrow,$new_widgets);	

			//$slug=$this->login_model->update_slug($this->input->post('slug'),$id);

			$date_time = date("Y-m-d H:i:s");

			if($this->input->post('date_time')!='')

			{ 

				$date_time = date("Y-m-d H:i:s", strtotime($this->input->post('date_time')));

			}

			$maindata='';

			$descdata=array('name'=>$this->input->post('name'),'email'=>$this->input->post('email'),'comments'=>$this->input->post('comment'));

			$config['upload_path'] = 'public/uploads/products';

			$config['allowed_types'] = 'gif|jpg|png';

			$this->load->library('upload', $config);

			if($this->upload->do_upload('banner_image'))

			{

				$banner_imagedata=$this->upload->data();

				$descdata['banner_image']=$banner_imagedata['file_name'];

			}

			if($this->upload->do_upload('image'))

			{

				$contentimagedata=$this->upload->data();

				$descdata['image']=$contentimagedata['file_name'];

			}

			$loginid=$this->login_model->updatecomment($maindata,$descdata,$id);

			if($loginid){

				$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
							 	<p>Comment updated successfully</p>
								<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							</div>');

				redirect('login/comments/'.$contentrow->pid.'/'.$return);
			/*echo "<script language='javascript'>wondow.location='".site_url('login/comments/'.$return)."'</script>";*/

			} else {

				$this->session->set_flashdata('message', '<div class="n_error flash_messages"><p>Error!! - Comment not updated.</p></div>');

				redirect('login/comments/'.$contentrow->pid.'/'.$return);
				/*echo "<script language='javascript'>wondow.location='".site_url('login/comments/'.$return)."'</script>";*/

			}

		}

	}	
	
	public function lists()

	{
		if(!$this->session->userdata('userid'))
		{
		   redirect('home');		
		}		
		
        $this->load->model('frontend/login_model');
		
		$this->load->model('frontend/pages_model');
		
		$pagemeta=$this->pages_model->get_row_cond(array('key'=>'events'));
		if($pagemeta->title!=''){$this->pagetitle=$pagemeta->title;}
		if($pagemeta->short_desc!=''){$this->desc=$pagemeta->short_desc; }
		if($pagemeta->keywords!=''){$this->keys=$pagemeta->keywords; }
		if($pagemeta->banner_image!=''){$this->pagebannner=base_url('public/uploads/pages/'.$pagemeta->banner_image); }
		if($pagemeta->banner_text!=''){$this->pagebannnertext=$pagemeta->banner_text; }
		//$this->left_widgets=$this->widgets_model->get_pagewidgets($pagemeta->widgets);
		$this->breadcrumbarr=array('/'=>$this->alphasettings['BREADCRUMB_START'],site_url('login/lists') =>$this->pagetitle);
		
		$this->load->library('pagination');

		$main['page_title']=$this->config->item('site_name').' - Products';

		$main['header']=$this->frontheader();
			
		$main['footer']=$this->frontfooter();
			
		$main['meta']=$this->frontmetahead();

		$config['base_url'] = site_url('login/lists');

		$config['total_rows'] = $this->login_model->get_pagination_count();

		$config['per_page'] = '50';

		$config['uri_segment'] = 4;

		$config['first_link'] = 'First';

		$config['last_link'] = 'Last';

		$config['cur_tag_open'] = '<span>';

		$config['cur_tag_close'] = '</span>';

		$this->pagination->initialize($config);

		$content['contentfields'] = $this->login_model->get_fields();

		$content['sortorders'] = array('asc'=>'Ascending','desc'=>'Descending');
		
		$content['contentcats'] = $this->productcategory_model->get_array();
		
		$content['contents']=$this->login_model->get_pagination($config['per_page'],$this->uri->segment($config['uri_segment']),NULL,'sort_order ASC');
				
		//$content['categories']=$this->productcategory_model->get_idpair();
		
		$main['contents']=$this->load->view('frontend/register/listsvehicle',$content,true);

		$this->load->view('frontend/main',$main);

	}
	
	public function commentlists()

	{
		if(!$this->session->userdata('userid'))
		{
		   redirect('home');		
		}		
		
        $this->load->model('frontend/login_model');
		
		$this->load->model('frontend/pages_model');
		
		$pagemeta=$this->pages_model->get_row_cond(array('key'=>'comments'));
		if($pagemeta->title!=''){$this->pagetitle=$pagemeta->title;}
		if($pagemeta->short_desc!=''){$this->desc=$pagemeta->short_desc; }
		if($pagemeta->keywords!=''){$this->keys=$pagemeta->keywords; }
		if($pagemeta->banner_image!=''){$this->pagebannner=base_url('public/uploads/pages/'.$pagemeta->banner_image); }
		if($pagemeta->banner_text!=''){$this->pagebannnertext=$pagemeta->banner_text; }
		//$this->left_widgets=$this->widgets_model->get_pagewidgets($pagemeta->widgets);
		$this->breadcrumbarr=array('/'=>$this->alphasettings['BREADCRUMB_START'],site_url('login/commentlists') =>$this->pagetitle);
		
		$this->load->library('pagination');

		$main['page_title']=$this->config->item('site_name').' - Comments';

			$main['header']=$this->frontheader();
			
			$main['footer']=$this->frontfooter();
			
			$main['meta']=$this->frontmetahead();

		$config['base_url'] = site_url('login/lists');

		$config['total_rows'] = $this->login_model->get_pagination_count();

		$config['per_page'] = '50';

		$config['uri_segment'] = 4;

		$config['first_link'] = 'First';

		$config['last_link'] = 'Last';

		$config['cur_tag_open'] = '<span>';

		$config['cur_tag_close'] = '</span>';

		$this->pagination->initialize($config);

		$content['contentfields'] = $this->login_model->get_fields();

		$content['sortorders'] = array('asc'=>'Ascending','desc'=>'Descending');
		
		$content['contentcats'] = $this->productcategory_model->get_array();
		
		$content['contents']=$this->login_model->get_pagination($config['per_page'],$this->uri->segment($config['uri_segment']),NULL,'sort_order ASC');
				
		//$content['categories']=$this->productcategory_model->get_idpair();
		
		$main['contents']=$this->load->view('frontend/register/listsvehicle',$content,true);

		$this->load->view('frontend/main',$main);

	}
	
	function actions()

	{
		if(!$this->session->userdata('userid'))
		{
		   redirect('home');		
		}		
        $this->load->model('frontend/login_model');
		
		$ids=$this->input->post('id');
		
		$sort_orders=$this->input->post('sort_order');

		$loginid=false;
		
		if(isset($_POST['sortsave']) && $this->input->post('sortsave')=='Save' && count($sort_orders)>0){

			foreach($sort_orders as $id => $sort_order):

				$data=array('sort_order'=>$sort_order);

				$loginid=$this->login_model->update($data,array(),$id);				

			endforeach;			

		}

		if(isset($_POST['reset']) && $this->input->post('reset')=='Reset'){

			$newdata = array(

				   'content_key'  => '',

				   'content_field'  => '',

				   'content_category_id'  => '',

				   'order_field'=>'',

				   'sort_field' =>''

			);

			$this->session->unset_userdata($newdata);

			redirect('login/lists/');

		}

		if(isset($_POST['search']) && $this->input->post('search')=='Search'){

			if($this->input->post('keyword')!='' || $this->input->post('category')!='' ||  $this->input->post('sortby')!=''){

				$newdata = array(

					   'content_key'  => $this->input->post('keyword'),

					   'content_field'  => $this->input->post('field'),

					   'content_category_id'  => $this->input->post('category'),

					   'order_field' =>  $this->input->post('orderby'),

					   'sort_field' => $this->input->post('sortby') 

				);

				$this->session->set_userdata($newdata);

			} else {

				$newdata = array(

					   'content_key'  => '',

					   'content_field' => '',

					   'content_category_id'  => '',

					   'order_field' => '',

					   'sort_field' =>''

				);

				$this->session->unset_userdata($newdata);

			}

			redirect('login/lists/');

		}

		if(isset($_POST['enable']) && $this->input->post('enable')=='Enable'){ $status='Y';}
		
		if(isset($_POST['featured']) && $this->input->post('featured')=='Featured'){ $fstatus='Y';}
		
		if(isset($_POST['unfeatured']) && $this->input->post('unfeatured')=='UnFeatured'){ $fstatus='N';}

		if(isset($_POST['disable']) && $this->input->post('disable')=='Disable'){ $status='N';}

		if(isset($status) && $ids){

			foreach($ids as $id):

				$data=array('status'=>$status);

				$loginid=$this->login_model->update($data,array(),$id);				

			endforeach;

			if($loginid){

				$this->session->set_flashdata('message', '<div class="n_ok flash_messages"><p>Product updated Successfully.</p></div>');

			} 

		}
		
		if(isset($fstatus) && $ids){

			foreach($ids as $id):

				$data=array('featured'=>$fstatus);

				$loginid=$this->login_model->update($data,array(),$id);				

			endforeach;

			if($loginid){

				$this->session->set_flashdata('message', '<div class="n_ok flash_messages"><p>Product updated Successfully.</p></div>');

			} 

		}
		
		if(isset($_POST['delete']) && $ids){			

			foreach($ids as $id):

				$loginid=$this->login_model->delete($id);				

			endforeach;

			if($loginid){

				$this->session->set_flashdata('message', '<div class="n_ok flash_messages"><p>Content Deleted Successfully.</p></div>');

			} 

		}

		if(!$loginid){

			$this->session->set_flashdata('message', '<div class="n_error flash_messages"><p>Error!! - Content not updated.</p></div>');

		}

		redirect('login/lists/'.$this->input->post('return'));

	}
	
	function delete($id,$return="")

	{
		
		if(!$this->session->userdata('userid'))
		{
		   redirect('home');		
		}		
		$loginid=$this->products_model->delete($id);

		if($loginid){

			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
							 	<p>Vehicle details deleted successfully</p>
								<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							</div>');

			redirect('login/myhome/list/'.$return);

		} else {

			$this->session->set_flashdata('message', '<div class="n_error flash_messages"><p>Error!! - Content not deleted.</p></div>');

			redirect('login/myhome/list/'.$return);

		}

	}
	
	function deletecomment($id,$return)

	{
        $this->load->model('frontend/login_model');
		if(!$this->session->userdata('userid'))
		{
		   redirect('home');		
		}		
		$loginid=$this->login_model->deletecomment($id);

		if($loginid){

			$this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
							 	<p>Comment deleted successfully</p>
								<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							</div>');

			redirect('login/comments/'.$return);

		} else {

			$this->session->set_flashdata('message', '<div class="n_error flash_messages"><p>Error!! - Content not deleted.</p></div>');

			redirect('login/comments/'.$return);

		}

	}

	function load_model()
	{
		$add['models']=$this->model_model->load_model($this->input->post('make'));
		$add['mode']=$this->input->post('model');
		$this->load->view('frontend/register/model',$add);//print_r($models);
	}
	
	function load_make()
	{
		$add['makes']=$this->makes_model->get_active($this->input->post('make'));
		$add['mode']=$this->input->post('model');
		$this->load->view('frontend/register/make',$add);//print_r($models);
	}
	
	function load_type()
	{
		$add['types']=$this->types_model->get_active($this->input->post('type'));
		$add['mode']=$this->input->post('model');
		$this->load->view('frontend/register/type',$add);//print_r($models);
	}
	
//	public function lists($id='')
//
//	{
//		//$this->outputCache();
//
//		if($id==''){ redirect('home'); }
//
//		$catcontent=$this->contentcategory_model->get_row_cond(array('slug'=>$id));
//
//		if(!$catcontent){redirect('home');}
//
//		if($catcontent->name!=''){$this->pagetitle=$catcontent->name; }
//
//		if($catcontent->short_desc!=''){$this->desc=$catcontent->short_desc; }
//
//		if($catcontent->keywords!=''){$this->keys=$catcontent->keywords; }	
//
//		$this->left_widgets=$this->widgets_model->get_pagewidgets($catcontent->widgets);
//
//		$menurow=$this->menuitems_model->get_currentmenurow($catcontent->id,'contentlist');
//
//		if($menurow){
//
//			$breadcrumbs=array_reverse($this->menuitems_model->get_menu_path($menurow->id));			
//
//		} else {
//
//			$breadcrumbs=array_reverse($this->contentcategory_model->get_category_path($catcontent->id));
//
//		}
//
//		$this->breadcrumbarr=array('/'=>$this->alphasettings['BREADCRUMB_START']);
//
//		foreach($breadcrumbs as $index => $breadcrumb):
//
//			$this->breadcrumbarr[$breadcrumb['link']]=$breadcrumb['name'];
//
//		endforeach;
//
//		$lists['pagelists']=$this->contents_model->get_catcontents($id);
//
//		$frontcontent=$this->load->view('frontend/contents/lists',$lists,true);
//
//		$currentobj=$this->menuitems_model->get_currentmenu($catcontent->id,'contentlist');
//
//		$currentmenus=explode(':',$currentobj);
//
//		$this->currentmenu=$currentmenus[0];
//
//		$this->currentparentmenu=$currentmenus[1];
//
//		$main['contents']=$this->frontcontent($frontcontent,true);
//
//		$main['header']=$this->frontheader();
//
//		$main['footer']=$this->frontfooter();
//
//		$main['meta']=$this->frontmetahead();
//
//		$this->load->view('frontend/main',$main);
//
//	}

	public function view($id='')

	{
		$this->load->model('frontend/jobs_model');
		
		$this->load->model('frontend/events_model');
		
		$this->load->model('frontend/contacts_model');
		
		$this->outputCache();

		if($id==''){ redirect('home'); }

		$contents=$this->contents_model->get_row_cond(array('slug'=>$id));

		$this->section='contents';

		if(!$contents){redirect('pagenotfound');}

		if($contents->title!=''){$this->pagetitle=$contents->title; }

		if($contents->meta_desc!=''){$this->desc=$contents->meta_desc; }

		if($contents->keywords!=''){$this->keys=$contents->keywords; }

		if($contents->banner_image!=''){$this->pagebannner=base_url('public/uploads/contents/'.$contents->banner_image); }

		if($contents->banner_text!=''){$this->pagebannnertext=$contents->banner_text; }

		$catcontent=$this->contentcategory_model->load($contents->category_id);
		
		//$this->left_widgets=$this->widgets_model->get_pagewidgets($contents->widgets);

		$menurow=$this->menuitems_model->get_currentmenurow($contents->id,'contents');

		if($menurow){

			$breadcrumbs=array_reverse($this->menuitems_model->get_menu_path($menurow->id));

		} else {

			$breadcrumbs=array_reverse($this->contentcategory_model->get_category_path($catcontent->id));

		}

		$this->breadcrumbarr=array('/'=>$this->alphasettings['BREADCRUMB_START']);

		foreach($breadcrumbs as $index => $breadcrumb):

			$this->breadcrumbarr[$breadcrumb['link']]=$breadcrumb['name'];

		endforeach;

		$this->breadcrumbarr[site_url('contents/view/'.$contents->slug)]=$contents->title;

		$currentobj=$this->menuitems_model->get_currentmenu($contents->id,'contents');

		$currentmenus=explode(':',$currentobj);

		$this->currentmenu=$currentmenus[0];

		$this->currentparentmenu=$currentmenus[1];

		$main['content'] =	$contents;	
		
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

		$main['jobs']=$this->jobs_model->get_pagination($config['per_page'],$this->uri->segment($config['uri_segment']),array('status'=>'Y'));
		
		//$main['jobs']=$this->jobs_model->get_active();
		
		$main['mission']=$this->contents_model->get_row_cond(array('slug'=>$this->alphasettings['MISSION_SLUG']));
		
		$main['vission']=$this->contents_model->get_row_cond(array('slug'=>$this->alphasettings['VISSION_SLUG']));
		
		$main['events']=$this->events_model->get_array_limit(2);
		
		$main['contacts']=$this->contacts_model->get_active();
		
		//print_r($main['jobs']);
		
		//print_r($main['content']);exit;

		$frontcontent=$this->load->view('frontend/contents/view',$main,true);

		$main['contents']=$this->frontcontent($frontcontent,true);
		
		$main['contents'] = $frontcontent;
		
		$main['header']=$this->frontheader();

		$main['footer']=$this->frontfooter();

		$main['meta']=$this->frontmetahead();

		$this->load->view('frontend/main',$main);

	}
	
	public function printcontent($id='')

	{
		$this->load->model('frontend/jobs_model');
		
		$this->outputCache();

		if($id==''){ redirect('home'); }

		$contents=$this->contents_model->get_row_cond(array('slug'=>$id));

		$this->section='contents';

		if(!$contents){redirect('pagenotfound');}

		if($contents->title!=''){$this->pagetitle=$contents->title; }

		if($contents->meta_desc!=''){$this->desc=$contents->meta_desc; }

		if($contents->keywords!=''){$this->keys=$contents->keywords; }

		if($contents->banner_image!=''){$this->pagebannner=base_url('public/uploads/contents/'.$contents->banner_image); }

		if($contents->banner_text!=''){$this->pagebannnertext=$contents->banner_text; }

		$catcontent=$this->contentcategory_model->load($contents->category_id);
		
		//$this->left_widgets=$this->widgets_model->get_pagewidgets($contents->widgets);

		$menurow=$this->menuitems_model->get_currentmenurow($contents->id,'contents');

		if($menurow){

			$breadcrumbs=array_reverse($this->menuitems_model->get_menu_path($menurow->id));

		} else {

			$breadcrumbs=array_reverse($this->contentcategory_model->get_category_path($catcontent->id));

		}

		$this->breadcrumbarr=array('/'=>$this->alphasettings['BREADCRUMB_START']);

		foreach($breadcrumbs as $index => $breadcrumb):

			$this->breadcrumbarr[$breadcrumb['link']]=$breadcrumb['name'];

		endforeach;

		$this->breadcrumbarr[site_url('contents/view/'.$contents->slug)]=$contents->title;

		$currentobj=$this->menuitems_model->get_currentmenu($contents->id,'contents');

		$currentmenus=explode(':',$currentobj);

		$this->currentmenu=$currentmenus[0];

		$this->currentparentmenu=$currentmenus[1];

		$main['content'] =	$contents;	
		
		$main['jobs']=$this->jobs_model->get_active();
		
		$main['mission']=$this->contents_model->get_row_cond(array('slug'=>$this->alphasettings['MISSION_SLUG']));
		
		$main['vission']=$this->contents_model->get_row_cond(array('slug'=>$this->alphasettings['VISSION_SLUG']));
		
		//print_r($main['jobs']);
		
		//print_r($main['content']);exit;

		$frontcontent=$this->load->view('frontend/contents/printcontent',$main,true);

		$main['contents']=$this->frontcontent($frontcontent,true);
		
		$main['contents'] = $frontcontent;
		
		$main['header']='<div class="header-wrap">
		    <div class="navbar navbar-default page-scroll" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <a class="navbar-brand" href="'.site_url('/').'"><img src="'.base_url('public/frontend/images/logo.png').'" alt="'.$this->alphasettings['SITE_NAME'].'"></a>
        </div>
      </div>
    </div>
		  </div>';

		$main['footer']='<footer>
		
  <div class="container">   
    
<div class="clearfix"></div>

<div class="footer-below text-center">
  
  <div class="col-md-4 col-md-offset-4">
     
	  <p>&copy; '.convert_lang($this->config->item('copy_right'),$this->alphalocalization).'<br>
	   '. convert_lang('Designed & Developed by',$this->alphalocalization).'<br>
       </p>
	   
   </div>
     
</div>
	
  </div>
</footer>';

		$main['meta']=$this->frontmetahead();

		$this->load->view('frontend/main',$main);

	}
	
	public function listview($id='')

	{

		$this->outputCache();

		if($id==''){ redirect('home'); }

		$contents=$this->contents_model->get_row_cond(array('slug'=>$id));

		$this->section='contents';

		if(!$contents){redirect('pagenotfound');}

		$main['content'] =	$contents;	

		$this->load->view('frontend/contents/listview',$main);

	}

}

/* End of file contents.php */

/* Location: ./application/controllers/contents.php */