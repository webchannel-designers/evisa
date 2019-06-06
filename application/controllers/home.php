<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Home extends Visafront_Controller {
	public function index()
	{
		$this->outputCache();
		$this->load->model('frontend/banners_model');
		$this->load->model('frontend/contacts_model');
		$this->load->model('frontend/settings_model');
		//$this->load->model('frontend/events_model');
		//$this->load->model('frontend/teamcategory_model');
		//$this->load->model('frontend/team_model');
		$this->load->model('frontend/servicecategory_model');
		$this->load->model('frontend/services_model');
		$this->load->model('frontend/contentcategory_model');
		$this->load->model('frontend/friends_model');
		$this->load->model('frontend/productcategory_model');
		$this->load->model('frontend/products_model');
		
		$main['meta']=$this->frontmetahead();
					
        $home['phonenumber']=$this->settings_model->get_row_cond(array('settingvalue'=>$this->alphasettings['PHONE_SLUG']));
		
		//$home['teams']=$this->team_model->get_row_cond(array('category_id'=>1));
		
		$home['services']=$this->services_model->get_featured_active();
		
		$home['featured']=$this->products_model->get_featured_active();
		
		$home['countries'] = $this->countries_model->get_active();			
		
		//$home['categories']=$this->productcategory_model->get_row_cond2("content_category_id in (16,17,14,24,23,21,20,19,25)");
		$home['categories']=$this->productcategory_model->get_array(array('featured'=>'Y'));
		//$home['categories']=$this->productcategory_model->get_active();
		
		$home['testimonials']=$this->friends_model->get_array_limit(8);
		
		//$home['working']=$this->contentcategory_model->get_row_cond(array('slug'=>'working-groups'));
		
		$home['contact']=$this->contacts_model->get_row_cond(array('slug'=>$this->alphasettings['CONTACT_SLUG']));
		
		$home['steps']=$this->contents_model->get_row_cond(array('slug'=>'steps-to-book-your-visa'));
		
		$home['why']=$this->contents_model->get_row_cond(array('slug'=>'why-apply-with-us','status'=>'Y'));
		
		$home['catalogue']=$this->contents_model->get_row_cond(array('slug'=>'product-catalogue'));
		//$home['video']=$this->contents_model->get_row_cond(array('slug'=>'video'));
		
		$home['contacts']=$this->contacts_model->get_active();
		
		//$home['events']=$this->events_model->get_array_limit(6);
		
	  	$home['banners']=$this->banners_model->get_active();
		
	  	$main['contents']=$this->load->view('frontend/content/home',$home,true);
		//$main['contents']=$this->frontcontent($frontcontent,false);
		$main['header']=$this->frontheader();
		$main['footer']=$this->frontfooter();
		
		$main['page']="home";
		
		$this->load->view('frontend/main',$main);
	}
	public function do_logout(){
		$newdata = array(
			   'userid'  => '',
               'validated' => false
		);
		$this->session->unset_userdata($newdata);
        //$this->session->sess_destroy();
        redirect('home');
    }
	
	public function getYouTubeVideoId($url)
	{
    $video_id = false;
    $url = parse_url($url);
    if (strcasecmp($url['host'], 'youtu.be') === 0)
    {
        #### (dontcare)://youtu.be/<video id>
        $video_id = substr($url['path'], 1);
    }
    elseif (strcasecmp($url['host'], 'www.youtube.com') === 0)
    {
        if (isset($url['query']))
        {
            parse_str($url['query'], $url['query']);
            if (isset($url['query']['v']))
            {
                #### (dontcare)://www.youtube.com/(dontcare)?v=<video id>
                $video_id = $url['query']['v'];
            }
        }
        if ($video_id == false)
        {
            $url['path'] = explode('/', substr($url['path'], 1));
            if (in_array($url['path'][0], array('e', 'embed', 'v')))
            {
                #### (dontcare)://www.youtube.com/(whitelist)/<video id>
                $video_id = $url['path'][1];
            }
        }
    }
    return $video_id;
	} 
	public function enquiry()
	{
	    $this->load->library('recaptcha');
		$key=$this->input->get('key');
		$this->form_validation->set_rules('fullname', 'Your Name', 'required|callback_alphaspace_check');
 		//$this->form_validation->set_rules('companyname', 'Company Name', 'required');	
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		//$this->form_validation->set_rules('isd', 'ISD', 'required|numeric');
		$this->form_validation->set_rules('phone', 'Phone', 'required|numeric');
		//$this->form_validation->set_rules('subject', 'Subject', 'required');
		//$this->form_validation->set_rules('message', 'Message', 'required');
        //$this->form_validation->set_rules('captcha', 'Captcha', 'callback_veryfy_captcha');
		$this->form_validation->set_message('required', convert_lang('required',$this->alphalocalization));
		$this->form_validation->set_message('valid_email', convert_lang('Invalid Email',$this->alphalocalization));
		$this->form_validation->set_message('numeric', convert_lang('numbers only',$this->alphalocalization));
		$this->form_validation->set_error_delimiters('<span class="red">(', ')</span>');
		if ($this->form_validation->run() == FALSE)
		{
			/*$this->load->helper('captcha');
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
			$list['cap']=$cap;			*/
            $list['method']=$this->input->get_post('method');							$list['slug']=$this->input->get_post('slug');
			$this->load->view('frontend/content/enquiryform',$list);
		} else {
			$maindata=array('enq_products'=>$key,'enq_name'=>$this->input->post('fullname'),'enq_company'=>$this->input->post('companyname'),'enq_email'=>$this->input->post('email'),'enq_isd'=>$this->input->post('isd'),'enq_phone'=>$this->input->post('phone'),'enq_subject'=>$this->input->post('subject'),'enq_message'=>$this->input->post('message'),'enq_renttype'=>$this->input->post('renttype'),'enq_piano'=>$this->input->post('piano'),'enq_date'=>$this->input->post('date'),'pickup'=>$this->input->post('pickup'),'delivery'=>$this->input->post('delivery'),'slug'=>$this->input->post('slug'),'location'=>$this->input->post('location'));
			//print_r($maindata);exit;
			
			$this->load->model('frontend/enquiry_model');
			
			$descdata = "";
			
			$insertid=$this->enquiry_model->insert($maindata,$descdata);
			$message=$this->load->view('frontend/mail/enquiry',$maindata,TRUE);
			
			//print_r($maindata);
			$subject=$this->input->post('Subject');
			
			if($subject=='')
			{
			$sub=$subject;
			}
			else
			{
			$sub="Enquiry";
			}
			$this->adminnotification('Almajid Visa - General Enquiry',$message);
			$this->load->view('frontend/content/contactsuccess');			
	   	}
	}
	
	
	public function enquiry2()
	{
		$key=$this->input->get('key');
		$this->form_validation->set_rules('fullname', 'Your Name', 'required|callback_alphaspace_check');
		
		//$this->form_validation->set_rules('companyname', 'Company Name', 'required');	
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('phone', 'Phone', 'required|numeric');
		//$this->form_validation->set_rules('subject', 'Subject', 'required');
		//$this->form_validation->set_rules('message', 'Message', 'required');
		//$this->form_validation->set_rules('captcha', 'Captcha', 'required|callback_captcha_check');
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
			$list['cap']=$cap;			
            $list['method']=$this->input->get_post('method');							$list['slug']=$this->input->get_post('slug');
			$this->load->view('frontend/content/enquiryform2',$list);
		} else {
			$maindata=array('enq_products'=>$key,'enq_name'=>$this->input->post('fullname'),'enq_company'=>$this->input->post('companyname'),'enq_email'=>$this->input->post('email'),'enq_phone'=>$this->input->post('phone'),'enq_subject'=>$this->input->post('subject'),'enq_message'=>$this->input->post('message'),'enq_renttype'=>$this->input->post('renttype'),'enq_piano'=>$this->input->post('piano'),'enq_date'=>$this->input->post('date'),'pickup'=>$this->input->post('pickup'),'delivery'=>$this->input->post('delivery'),'slug'=>$this->input->post('slug'),'location'=>$this->input->post('location'));
			//print_r($maindata);exit;
			
			$this->load->model('frontend/enquiry_model');
			
			$descdata = "";
			
			$insertid=$this->enquiry_model->insert($maindata,$descdata);
			$message=$this->load->view('frontend/mail/enquiry',$maindata,TRUE);
			
			//print_r($maindata);
			$subject=$this->input->post('Subject');
			if($subject=='')
			{
			$sub=$subject;
			}
			else
			{
			$sub="Enquiry";
			}
			$this->adminnotification('JAM Office Equipmet - Product Enquiry',$message);
			$this->load->view('frontend/content/contactsuccess');			
	   	}
	}
	
	 public function veryfy_captcha(){
		$this->load->library('recaptcha');
		// Catch the user's answer
		$captcha_answer = $this->input->post('g-recaptcha-response');
 		// Verify user's answer
		$response = $this->recaptcha->verifyResponse($captcha_answer);  
 		// Processing ...
		if ($response['success']) { 
			// Your success code here
			return true;
		} else {
			$this->form_validation->set_message('veryfy_captcha', 'required');
			// Something goes wrong
			return false;//var_dump($response);
		}		
	}
	public function enquiry3()
	{
		
	    $this->load->library('recaptcha');
		$key=$this->input->get('key');
		$this->form_validation->set_rules('fullname', 'Your Name', 'required|callback_alphaspace_check');
		
		//$this->form_validation->set_rules('companyname', 'Company Name', 'required');	
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('phone', 'Phone', 'required|numeric');
		//$this->form_validation->set_rules('subject', 'Subject', 'required');
		//$this->form_validation->set_rules('message', 'Message', 'required');
		//$this->form_validation->set_rules('captcha', 'Captcha', 'required|callback_captcha_check');
		
        $this->form_validation->set_rules('captcha', 'Captcha', 'callback_veryfy_captcha');
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
			$list['cap']=$cap;			
            $list['method']=$this->input->get_post('method');							$list['slug']=$this->input->get_post('slug');
			$this->load->view('frontend/content/enquiryform3',$list);
		} else {
			$maindata=array('enq_products'=>$key,'enq_name'=>$this->input->post('fullname'),'enq_company'=>$this->input->post('companyname'),'enq_email'=>$this->input->post('email'),'enq_phone'=>$this->input->post('phone'),'enq_subject'=>$this->input->post('subject'),'enq_message'=>$this->input->post('message'),'enq_renttype'=>$this->input->post('renttype'),'enq_piano'=>$this->input->post('piano'),'enq_date'=>$this->input->post('date'),'pickup'=>$this->input->post('pickup'),'delivery'=>$this->input->post('delivery'),'slug'=>$this->input->post('slug'),'location'=>$this->input->post('location'),'enq_model'=>$this->input->post('model'),'enq_serial'=>$this->input->post('serial'));
			//print_r($maindata);exit;
			
			$this->load->model('frontend/enquiry_model');
			
			$descdata = "";
			
			$insertid=$this->enquiry_model->insert($maindata,$descdata);
			$message=$this->load->view('frontend/mail/enquiry',$maindata,TRUE);
			
			//print_r($maindata);
			$subject=$this->input->post('Subject');
			if($subject=='')
			{
			$sub=$subject;
			}
			else
			{
			$sub="Enquiry";
			}
			$this->adminnotification2('JAM Office Equipmet - Service Enquiry',$message,'oesrvdxb@al-majid.com');
			$this->load->view('frontend/content/contactsuccess');			
	   	}
	}
	public function login_check($user)
	{
		$this->load->model('frontend/students_model');
		$pass= $this->input->post('pass');
		if (!$this->students_model->login_check($user,$pass))
		{
			$this->form_validation->set_message('login_check', 'Invalid Login');
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}
	public function printurl($id='')
	{
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
		$this->left_widgets=$this->widgets_model->get_pagewidgets($contents->widgets);
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
		$frontcontent=$this->load->view('frontend/contents/view',$main,true);
		$main['contents']=$this->frontprintcontent($frontcontent,true);
		//$main['header']=$this->frontheader();
		//$main['footer']=$this->frontfooter();
		//$main['meta']=$this->frontmetahead();
		$main['meta']='';
		
		$main['header']='';
		
		$main['footer']='';
		
		$this->load->view('frontend/main',$main);
	}
	public function content($slug='')
	{
	if($slug=='')
	{
	$cid=$this->input->get('cid');
	if($cid==1)
	{
	$home['content']=$this->contents_model->get_row_cond(array('slug'=>$this->alphasettings['PRIVACY_SLUG']));
	}
	elseif($cid==2)
	{
	$home['content']=$this->contents_model->get_row_cond(array('slug'=>$this->alphasettings['TERMS_SLUG']));
	}
	}
	else
	{
	$home['content']=$this->contents_model->get_row_cond(array('slug'=>$slug));
	}
	$main['contents']=$this->load->view('frontend/include/contentother',$home,true);
	$main['meta']='';
		$main['header']='';
		$main['footer']='';
		$this->load->view('frontend/main',$main);
		
	}
	public function login_check_instructors($user)
	{
		$this->load->model('frontend/instructors_model');
		$pass= $this->input->post('pass');
		if (!$this->instructors_model->login_check($user,$pass))
		{
			$this->form_validation->set_message('login_check_instructors', 'Invalid Login');
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}	
	
	
	public function emailurl()
	{		
		$this->form_validation->set_rules('fromname', 'From Name', 'required');		
		$this->form_validation->set_rules('fromemail', 'From Email', 'required|valid_email');
		$this->form_validation->set_rules('toname', 'To Name', 'required');		
		$this->form_validation->set_rules('toemail', 'To Email', 'required|valid_email');
		$this->form_validation->set_message('required', 'required');
		$this->form_validation->set_message('valid_email', 'invalid email');
		$this->form_validation->set_message('numeric', 'numbers only');
		$this->form_validation->set_error_delimiters('<span class="red">(', ')</span>');
		if ($this->form_validation->run() == FALSE)
		{	
			$email['message'] = '';
			$email['form'] = $this->load->view('frontend/content/emailmeform',$email,true);
			$this->load->view('frontend/content/emailurl',$email);
		} else {
			$maindata=array('toname'=>$this->input->post('toname'),'toemail'=>$this->input->post('toemail'),'fromname'=>$this->input->post('fromname'),'fromemail'=>$this->input->post('fromemail'),'shareurl'=>$this->input->post('shareurl'));	
				$message=$this->load->view('frontend/mail/shareurl',$maindata,TRUE);
				$fromname = $maindata["fromname"];
				$toname = $maindata["toname"];
				$fromemail = $maindata["fromemail"];
				$toemail = $maindata["toemail"];			
    			$this->sendtofriend($fromemail,$fromname,$toemail,$toname,'Juma Al Majid Office Equipment - Link',$message);
				$email['message']="Email sent successfully!";
				$email['form']=	$this->load->view('frontend/content/emailmeform',$email,true);
				$this->load->view('frontend/content/emailurl',$email);
	   	}	
	}	
}
/* End of file home.php */
/* Location: ./application/controllers/home.php */