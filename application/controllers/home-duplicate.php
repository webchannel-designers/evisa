<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends Ecsfront_Controller {

	public function index()

	{

		$this->outputCache();

		$this->load->model('frontend/banners_model');
		$this->load->model('frontend/productcategory_model');
		$this->load->model('frontend/products_model');
		$this->load->model('frontend/imagegallery_model');
		$this->load->model('frontend/banners_model');
		$this->load->model('frontend/jobs_model');
		$this->load->model('frontend/videos_model');
		$this->load->model('frontend/contacts_model');
		$this->load->model('frontend/settings_model');
		$this->load->model('frontend/news_model');
		$this->load->model('frontend/newscategory_model');
		$this->load->model('frontend/gallerycategory_model');
		$this->load->model('frontend/events_model');
		$this->load->model('frontend/gallery_model');
		$this->load->model('frontend/format_model');
		$this->load->model('frontend/teamcategory_model');
		$this->load->model('frontend/team_model');
		$this->load->model('frontend/contentcategory_model');
		
		$main['meta']=$this->frontmetahead();
		
		$video=$this->videos_model->get_active();
			
        $home['phonenumber']=$this->settings_model->get_row_cond(array('settingvalue'=>$this->alphasettings['PHONE_SLUG']));
		$home['suppliers']=$this->format_model->get_active();
		$home['teams']=$this->team_model->get_row_cond(array('category_id'=>1));
		//get_array_limit(11,'');
		//$home['suppliers2']=$this->format_model->get_array_limit(11,11);
		//$home['suppliers2']=$this->format_model->get_array_limit(5);
		//$home['about']=$this->contents_model->get_row_cond(array('slug'=>$this->alphasettings['ABOUT_SLUG']));
		//print_r($home['about']);
		//$aboutid=$home['about']->category_id;
		$home['working']=$this->contentcategory_model->get_row_cond(array('slug'=>'working-groups'));
		$home['why']=$this->contents_model->get_row_cond(array('slug'=>$this->alphasettings['WHY_SLUG']));
		$home['profile']=$this->contents_model->get_row_cond(array('slug'=>$this->alphasettings['PROFILE_SLUG']));
		//print_r($home['profile']);
		//$home['subprofile']=$this->contents_model->get_catcontents($this->alphasettings['PROFILE_SLUG']);
		//print_r($home['subprofile']);
		$home['mission']=$this->contents_model->get_row_cond(array('slug'=>$this->alphasettings['MISSION_SLUG']));
		$home['vission']=$this->contents_model->get_row_cond(array('slug'=>$this->alphasettings['VISSION_SLUG']));
		$home['quality']=$this->contents_model->get_row_cond(array('slug'=>$this->alphasettings['QUALITY_SLUG']));
		
		//$home['services']=$this->contents_model->get_row_cond(array('slug'=>$this->alphasettings['SERVICES_SLUG']));
		//$serviceid=$home['services']->category_id;
		//$home['subservices']=$this->contents_model->get_array_cond(array('category_id'=>$serviceid,'status'=>'Y'));
		
		/*$home['services']=$this->contents_model->get_row_cond(array('slug'=>$this->alphasettings['SERVICES_SLUG']));
		$serviceid=$home['services']->category_id;
		$home['subservices']=$this->contents_model->get_array_cond(array('category_id'=>$serviceid));*/
		
		$home['facility']=$this->contents_model->get_row_cond(array('slug'=>$this->alphasettings['FACILITY_SLUG']));
		$home['careers']=$this->contents_model->get_row_cond(array('slug'=>$this->alphasettings['CAREERS_SLUG']));
		$careersid=$home['careers']->category_id;
		$home['subcareers']=$this->contents_model->get_row_cond(array('slug'=>$this->alphasettings['BUSINESS_SLUG']));
		$home['resume']=$this->contents_model->get_row_cond(array('slug'=>$this->alphasettings['RESUME_SLUG']));
		$home['contact']=$this->contacts_model->get_row_cond(array('slug'=>$this->alphasettings['CONTACT_SLUG']));
		//$home['working']=$this->contents_model->get_row_cond(array('slug'=>$this->alphasettings['WELCOME_SLUG']));
		$home['member']=$this->contents_model->get_row_cond(array('slug'=>'about-membership'));
		$home['marketsupport']=$this->contents_model->get_row_cond(array('slug'=>'after-market-support'));
		$home['excellence']=$this->contents_model->get_row_cond(array('slug'=>'42-years-of-excellence'));
		//print_r($home['working']);
		$home['jobs']=$this->jobs_model->get_active();
		$home['testimonials']=$this->contents_model->get_row_cond(array('slug'=>$this->alphasettings['TESTMONIALS']));	
		$home['subtesti']=$this->news_model->get_catnews($this->alphasettings['TESTMONIALS']);
		$this->load->model('frontend/contacts_model');
		
		$home['contacts']=$this->contacts_model->get_active();
		
		$home['events']=$this->events_model->get_array_limit(6);
		
//		$home['galleries']=$this->gallerycategory_model->get_array_limit(6);
//		
//		foreach($home['galleries'] as $gallery)
//		{
//			
//		$home['images']=$this->gallery_model->get_row_cond(array('category_id'=>$gallery['id']));
//		
//		foreach($home['images'] as $image)
//		{
//		$cat[]=$image;
//		}
//		
//		}
//		$home['cat'] = $cat;
		//print_r($cat);exit;

		
		//print_r($home['jobs']);
		
		//$contactid=$home['contact']->category_id;
		//$home['subcontact']=$this->contents_model->get_array_cond(array('category_id'=>$contactid));
		//print_r($home['subcareers']);
		
		//$home['latestnews']=$this->contents_model->get_row_cond(array('slug'=>$this->alphasettings['ADMISSSION_SLUG']));
	//$home['featuredimages']=$menu;
		//$home['latestnews']=$this->contents_model->get_row_cond(array('slug'=>$this->alphasettings['ADMISSSION_SLUG']));
		//$home['admission']=$this->contents_model->get_row_cond(array('slug'=>$this->alphasettings['ADMISSSION_SLUG']));

		//$home['academics']=$this->menuitems_model->get_singlelevel_submenu($this->alphasettings['ACADEMIC_PARENT'],$this->alphasettings['ACADEMIC_LIMIT']);

		//$home['calenders']=$this->contents_model->get_catcontents($this->alphasettings['CALENDAR_SLUG'],$this->alphasettings['CALENDAR_LIMIT']);
		
		//print_r($home['homenews']);
		
		//$home['imagegallery']=$this->imagegallery_model->get_array();
		//$home['about']=$this->contents_model->get_row_cond(array('slug'=>"about-us"));
		
		//$home['protabs']=$this->productcategory_model->get_featured_active();
		//print_r($home['protabs']);
		//foreach($home['protabs'] as $catproducts):
		//$home['featured']=$this->products_model->get_active($catproducts['id']);
		//foreach($home['featured'] as $featuredmenus):
		//$featmenu[]=$this->gallery_model->get_array_cond($featuredmenus['id']);
		//endforeach;	
		//endforeach;
		//print_r($home['featured']);
		$home["catalogue"]=$this->productcategory_model->get_catalogue(38);
		$home["autos"]=$this->products_model->get_array_cond(array('featured'=>'Y',"category_id"=>'46'));
		$home["motos"]=$this->products_model->get_array_cond(array('featured'=>'Y',"category_id"=>'47'));
		$home["heavy"]=$this->products_model->get_array_cond(array('featured'=>'Y',"category_id"=>'48'));
		
//		print_r($home["autos"]);
//		foreach($home["products"] as $products)
//		{
//			$img[] = $this->gallery_model->get_array_cond($products['id']);
//		}
//		
//		$home['proimages'] = @$img;
		
		//print_r($home['proimages']);
		
      	//$home['featuredmenu']=$featmenu;
	  
	    $home['homenews']=$this->news_model->get_array_limit(3);
	  //print_r($home['featuredmenu']);
	  	$home['banners']=$this->banners_model->get_active();
	 //$home['projects']=$this->imagegallery_model->get_array();
	 //$home['gallery']=$this->contents_model->get_row_cond(array('slug'=>"how-can-we-help"));

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
		$key=$this->input->get('key');

		$this->form_validation->set_rules('fullname', 'Your Name', 'required|callback_alphaspace_check');
		
		$this->form_validation->set_rules('companyname', 'Company Name', 'required');	

		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');

		$this->form_validation->set_rules('phone', 'Phone', 'required|numeric');

		$this->form_validation->set_rules('subject', 'Subject', 'required');

		$this->form_validation->set_rules('message', 'Message', 'required');

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

			$list['cap']=$cap;			

			$this->load->view('frontend/content/enquiryform',$list);

		} else {
			$maindata=array('enq_products'=>$key,'enq_name'=>$this->input->post('fullname'),'enq_company'=>$this->input->post('companyname'),'enq_email'=>$this->input->post('email'),'enq_phone'=>$this->input->post('phone'),'enq_subject'=>$this->input->post('subject'),'enq_message'=>$this->input->post('message'));
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

			$this->adminnotification( convert_lang($sub,$this->alphalocalization),$message);

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

    			$this->sendtofriend($fromemail,$fromname,$toemail,$toname,'Construction Machinery Center Co (L.L.C) - Link',$message);

				$email['message']="Email sent successfully!";

				$email['form']=	$this->load->view('frontend/content/emailmeform',$email,true);

				$this->load->view('frontend/content/emailurl',$email);

	   	}	

	}	

}

/* End of file home.php */

/* Location: ./application/controllers/home.php */