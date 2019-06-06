<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Web_Controller extends CI_Controller {
	
    function __construct()
    {
        parent::__construct();
		$this->load->model('language_model');		
         $this->load->model('settings_model');
		$settings=$this->settings_model->get_array();
		foreach($settings as $setting):
			$this->alphasettings[$setting['settingkey']]=$setting['settingvalue'];
		endforeach;
		$this->languagesarr = $this->language_model->get_active_array();
		$this->langcodes=$this->language_model->language_conversion();
		if(!$this->session->userdata('admin_logged_in'))
		{
		   redirect('admin/login');		
		}
		if($this->session->userdata('admin_role')!='1'){
			$this->checkpermissions(); 
		}
    }
	
	function adminheader()
	{
		$this->load->model('login_model');
		$this->load->model('adminmenu_model');	
		$this->load->model('menu_model');	
		$header['login']=$this->login_model->get_lastlogin();
		$header['menus']=$this->adminmenu_model->get_menu();
		$header['frontmenus']=$this->menu_model->get_array();
		$header['langs']=$this->language_model->get_active();
		return  $this->load->view('admin/include/header',$header,true);
	}
	
	function adminfooter()
	{
		$footer['menus']='';
		return $this->load->view('admin/include/footer',$footer,true);
	}
	
	function adminleftmenu()
	{
		$this->load->model('adminmenu_model');	
		$this->load->model('menu_model');	
		$left['menus']=$this->adminmenu_model->get_menu();
		$left['frontmenus']=$this->menu_model->get_array();
		return $this->load->view('admin/include/left',$left,true);
	}
	
	function sendfromadmin($to,$subject,$message)
	{
		$this->load->library('email');
		$config['mailtype'] = 'html';
		$config['wordwrap'] = TRUE;		
		$this->email->initialize($config);
		
		$this->email->from($this->alphasettings['FROM_EMAIL'], 'AL MAJID TRAVEL & TOURISM');
		$this->email->to($to);
		$this->email->subject($subject);
		$this->email->message($message);		
		if($this->email->send()){ return true; } else { return false; }
	}
	
	function get_featurecategory_tree($id='0',$selected='')
	{
		$this->load->model('featurecategory_model');
		return $this->featurecategory_model->get_category_tree($id,$selected);
	}
	
	function get_menu_tree($menuid='',$id='0',$selected='')
	{
		$this->load->model('menuitems_model');
		return $this->menuitems_model->get_category_tree($menuid,$id,$selected);
	}
	
	function render_menuitems_lists($menucond,$selected='')
	{
		$this->load->model('menuitems_model');
		return $this->menuitems_model->get_menu_list_tree($menucond,$selected);
	}
	
	public function clear_all_cache()
    {
        $CI =& get_instance();
		
		$path = $CI->config->item('cache_path');
        
        $cache_path = ($path == '') ? APPPATH.'cache/' : $path;
        
        $handle = opendir($cache_path);

        while (($file = readdir($handle))!== FALSE) 
        {
            //Leave the directory protection alone
            if ($file != '.htaccess' && $file != 'index.html')
            {
               @unlink($cache_path.'/'.$file);
            }
        }
        closedir($handle);
    }
		
	function checkpermissions(){	
		$this->load->model('admin_model');
		$link=$this->uri->segment(1);
		if($this->uri->segment(2))
		$link.='/'.$this->uri->segment(2);
		if($this->uri->segment(3))
		$link.='/'.$this->uri->segment(3);
		if(($link=='admin') || ($link=='admin/home') || ($link=='admin/home/logout') || ($link=='admin/accessdenied')){			
			//redirect($link);	
		}else{   
			$cond=array('url'=>$link);		
			$permission=$this->admin_model->check_permission($cond);		
			if($permission)
			{
				$acc_cond=array('permissions_id'=>$permission->permissions_id,'roles_id'=>$this->session->userdata('admin_role')); 
				$access=$this->admin_model->check_access($acc_cond);	
				if($access==0){
					redirect('admin/accessdenied');
				}
			}
		}
	}
}

/* Frontend Controller*/

class Visafront_Controller extends CI_Controller {
	
    function __construct()
    {
        parent::__construct();
		$this->load->model('language_model');		
		$this->load->helper('text');
		$this->languagesarr = $this->language_model->get_active_array();
		$this->langcodes=$this->language_model->language_conversion();
		if($this->config->item('language')!=''){
			$newdata=array('front_language'=>$this->langcodes[$this->config->item('language')]);
		}
		$this->load->library('user_agent');
		$this->mobileversion = $this->agent->is_mobile();	
		$this->data['agent'] = ($this->agent->is_mobile())? 'mobile' : 'desktop';
		$this->session->set_userdata($newdata);
		$this->alphasettings=array();
		$this->alphalocalization=array();
		$this->fronthead();	
		$this->clear_all_cache();	
    }
	
	public function clear_all_cache()
    {
		
        $CI =& get_instance();
		
	    $path = $CI->config->item('cache_path');
        
        $cache_path = ($path == '') ? APPPATH.'cache/' : $path;
        
        $handle = opendir($cache_path);

        while (($file = readdir($handle))!== FALSE) 
        {
		
            //Leave the directory protection alone
            if ($file != '.htaccess' && $file != 'index.html')
            {
               @unlink($cache_path.'/'.$file);
			 
            }
        }

        closedir($handle);
    }
		
	function get_featurecategory_tree($id='0',$selected='')
	{
		$this->load->model('featurecategory_model');
		return $this->featurecategory_model->get_category_tree($id,$selected);
	}
	
	function get_menu_tree($menuid='',$id='0',$selected='')
	{
		$this->load->model('menuitems_model');
		return $this->menuitems_model->get_category_tree($menuid,$id,$selected);
	}
	
	function render_menuitems_lists($menucond,$selected='')
	{
		$this->load->model('menuitems_model');
		return $this->menuitems_model->get_menu_list_tree($menucond,$selected);
	}
	
	function fronthead()
	{
		$this->load->model('frontend/menuitems_model');
		$this->load->model('frontend/widgets_model');
		$this->load->model('frontend/settings_model');
		$this->load->model('frontend/localization_model');
		$this->load->model('frontend/contents_model');
		$this->load->model('frontend/contentcategory_model');
		//$this->load->model('frontend/events_model');
		//$this->load->model('frontend/eventscategory_model');
		//$this->load->model('frontend/team_model');
		//$this->load->model('frontend/teamcategory_model');
		$this->load->model('frontend/gallery_model');
		$this->load->model('frontend/newsgallery_model');
		$this->load->model('frontend/imagegallery_model');
		$this->load->model('frontend/contacts_model');
		$this->load->model('frontend/location_model');
		$this->load->model('frontend/countries_model');
		$this->load->model('frontend/testimonial_model');
		$this->load->model('frontend/products_model');
		$this->load->model('frontend/services_model');
		$this->load->model('frontend/productcategory_model');
		
		$this->brands=$this->testimonial_model->get_active();

		$settings=$this->settings_model->get_array();
		foreach($settings as $setting):
			$this->alphasettings[$setting['settingkey']]=$setting['settingvalue'];
		endforeach;
		$localizations=$this->localization_model->get_array();
		foreach($localizations as $localization):
			$this->alphalocalization[$localization['lang_key']]=$localization['lang_value'];
		endforeach;
		$contents=$this->contents_model->get_array();
		foreach($contents as $content):
			$this->contentslugs[$content['id']]=$content['slug'];
		endforeach;
		$catcontents=$this->contentcategory_model->get_array();
		foreach($catcontents as $catcontent):
			$this->contentcategoryslugs[$catcontent['id']]=$catcontent['slug'];
		endforeach;
		$this->pagetitle=$this->alphasettings['DEFAULT_META_TITLE']; 
		$this->desc=$this->alphasettings['DEFAULT_META_DESCRIPTION']; 
		$this->keys=$this->alphasettings['DEFAULT_META_KEYWORDS'];
		if($this->session->userdata('front_language')=='ar'){ 
			//$this->pagebannner=base_url('public/frontend/images/content-ban.png');  
		} else {
			//$this->pagebannner=base_url('public/frontend/images/content-ban.png');  
		}
		$this->pagebannnertext='';
		$this->breadcrumbarr=array('/'=>$this->alphasettings['BREADCRUMB_START']);
		$this->currentmenu='';
		$this->currentparentmenu='';
		$this->left_widgets=$this->widgets_model->get_pagewidgets('12:3,14:2,16:1');
	}
	
	function frontmetahead()
	{
		return  $this->load->view('frontend/include/meta','',true);		
	}
	
	function frontheader()
	{
		$frontheader['langs']=$this->language_model->get_active();
		$frontheader['language_pair']=$this->language_model->language_pair();
		$frontheader['mainmenu']=$this->menuitems_model->get_menu_ul_top('top_menu');
		$frontheader['locations']=$this->location_model->get_active();
		return $this->load->view('frontend/include/header',$frontheader,true);
	}
	
	function frontproductcontent($frontcontents,$leftboxoption=true,$products=true,$id='')
	{
		if($leftboxoption){
			$frontcontent['leftsection']=$this->frontleftmenu();
		} 
		
		$frontcontent['maintcontent']=$frontcontents;
		$frontcontent['leftbox']=$leftboxoption;
		
		return $this->load->view('frontend/include/product',$frontcontent,true);
	}
	
	function frontcontent($frontcontents, $leftboxoption=true,$products=true)
	{
		if($leftboxoption){
			$frontcontent['leftsection']=$this->frontleftmenu();
		} 
		else {
			$frontcontent['applywidget']=$this->widgets_model->get_widgets(array('home_apply'));
			$frontcontent['banners']=$this->banners_model->get_active();
		}
		
		$frontcontent['maintcontent']=$frontcontents;
		$frontcontent['leftbox']=$leftboxoption;
		return $this->load->view('frontend/include/content',$frontcontent,true);
	}
	
	function frontprintcontent($frontcontents, $leftboxoption=true,$products=true)
	{
		if($leftboxoption){
			$frontcontent['leftsection']=$this->frontleftmenu();
		} 
		else {
			$frontcontent['applywidget']=$this->widgets_model->get_widgets(array('home_apply'));
			$frontcontent['banners']=$this->banners_model->get_active();
		}

		$frontcontent['maintcontent']=$frontcontents;
		$frontcontent['leftbox']=$leftboxoption;
		return $this->load->view('frontend/include/printcontent',$frontcontent,true);
	}
	
	function frontfooter($latestnews=false)
	{
		$footermenus=array();
		$footer['footermenus']=$this->menuitems_model->get_single_levelmenu('footer');
		$footerwidgets=$this->widgets_model->get_footerwidgets();
		foreach($footerwidgets as $footerwidget):
			$footermenulinks = explode(',',$footerwidget['parent_menu_id']);
			foreach($footermenulinks as $footermenulink):
				$menu=$this->menuitems_model->load($footermenulink);
				@$footermenus[$footermenulink]['head']=$menu->name;
				$footermenus[$footermenulink]['menus']=$this->menuitems_model->get_single_levelsubmenu('top_menu',$footermenulink);
			endforeach;	
		endforeach;
		$footerlinks['footermenus']=$footermenus;
		$footer['sitemap']=$this->load->view('frontend/include/footerlinks',$footerlinks,true);
		//$footer["products"]=$this->products_model->get_active();
		$config['per_page'] = '12';
		$config['uri_segment'] = 4;
		$footer['submenus'] = $this->menuitems_model->get_single_levelsubmenu('top_menu',34);
		$footer['contacts']=$this->contacts_model->get_active();
		$footer['footer']=$this->menuitems_model->get_menu_ul('footer');
		$footer['about']=$this->menuitems_model->get_menu_ul('about');
		$footer['product']=$this->products_model->get_array_limit(6);
		$footer['brand']=$this->menuitems_model->get_menu_ul('brand');
		$footer['service']=$this->services_model->get_active();
		//$footer['categories']=$this->productcategory_model->get_row_cond2("content_category_id in (24,23,21,20,17,19,16,14,25,27,28,29,32,33,35,36,38,39,40,41)"); 
		$footer['categories']=$this->productcategory_model->get_array(array('parent_id'=>0));
		$footer['market']=$this->menuitems_model->get_menu_ul('market');
		$footer['other']=$this->menuitems_model->get_menu_ul('other');
		
		if($latestnews){
		$footer['homenews']=$this->news_model->get_array_limit(2);
		}
		return $this->load->view('frontend/include/footer',$footer,true);	
	}
	
	function frontleftmenu($id='')
	{
		$leftwidgets=array();
		foreach($this->left_widgets as $left_widget):
			if($left_widget['widget_type']=='sub_menu'){
				if($this->currentparentmenu!=''){
					$menu=$this->menuitems_model->load($this->currentparentmenu);
					//$leftmenus['head']=$menu->name;
					$leftmenus['menus']=$this->menuitems_model->get_single_levelsubmenu('top_menu',$this->currentparentmenu);
					$leftwidgets[$left_widget['id']]['html']=$this->load->view('frontend/include/submenu',$leftmenus,true);
				}
			} else if($left_widget['widget_type']=='menu'){
				$leftmenus=array();
				if($left_widget['parent_menu_id']!=''){
					$menulinks = explode(',',$left_widget['parent_menu_id']);
//					foreach($menulinks as $menulink):
//						$menu=$this->menuitems_model->load($menulink);
//						$leftmenus['leftmenus'][$menulink]['head']=$menu->name;
//						$leftmenus['leftmenus'][$menulink]['menus']=$this->menuitems_model->get_single_levelsubmenu('top_menu',$menulink);
//					endforeach;	
					//$leftwidgets[$left_widget['id']]['html']=$this->load->view('frontend/include/leftmenu',$leftmenus,true);
				} else {
					$leftwidgets[$left_widget['id']]['html']='';
				}
			}
			else if($left_widget['widget_type']=='content'){
			$newsmenu['homenews']=$this->news_model->get_array_limit(3);
			$leftwidgets[$left_widget['id']]['html']=$this->load->view('frontend/include/contentmenu',$newsmenu,true);	
			}
			/* else if($left_widget['widget_type']=='content'){
				$contentcatrow=$this->contentcategory_model->load($left_widget['content_category_id']);
				$contentmenu['head']=$contentcatrow->name;
				$contentmenu['menus']=$this->contents_model->get_array_cond(array('category_id'=>$left_widget['content_category_id'],'status'=>'Y'));
				$leftwidgets[$left_widget['id']]['html']=$this->load->view('frontend/include/contentmenu',$contentmenu,true);	
			} */else if($left_widget['widget_type']=='html'){
				$leftwidgets[$left_widget['id']]['html']=convert_html($left_widget['html']);	
			} else {
				$leftwidgets[$left_widget['id']]['html']='';
			}	
		endforeach;
		$left['widgets']=$leftwidgets;
		return $this->load->view('frontend/include/left',$left,true);
	}
	
	function alphaspace_check($str){ 		
			if(!preg_match('/^([a-z ]|\p{Arabic})+$/iu', trim($str))){
			 $this->form_validation->set_message('alphaspace_check', convert_lang('alphabets only',$this->alphalocalization));
		     return false;    	 		 
		}else{		 
		    return true; 
		}
	}
	
	function captcha_check($str){ 
			$expiration = time()-7200; // Two hour limit
			$this->db->query("DELETE FROM captcha WHERE captcha_time < ".$expiration);
			
			// Then see if a captcha exists:
			$sql = "SELECT COUNT(*) AS count FROM captcha WHERE word = ? AND ip_address = ? AND captcha_time > ?";
			$binds = array($str, $this->input->ip_address(), $expiration);
			$query = $this->db->query($sql, $binds);
			$row = $query->row();			
			if ($row->count == 0)
			{
			 $this->form_validation->set_message('captcha_check', convert_lang('invalid security code',$this->alphalocalization));
		     return false;    	 		 
			}else{		 
				return true; 
			}
	}
		
	function sendfromadmin($to,$subject,$message,$attachment='')
	{
		//$this->load->library('email');
		//$config['mailtype'] = 'html';
		//$config['wordwrap'] = TRUE;		
		//$this->email->initialize($config);
		
		
//		$this->load->library('email');
//		$config['protocol']    = 'smtp';
//		$config['smtp_host'] =$this->config->item('smtp_host'); // SMTP Server Address.
//		$config['smtp_user'] =$this->config->item('smtp_user'); // SMTP Username.
//		//$config['smtp_pass'] =$this->config->item('smtp_pass'); // SMTP Password.
//		$config['smtp_port'] =$this->config->item('smtp_port'); // SMTP Port.
//        $config['charset']    = 'utf-8';
//        $config['newline']    = "\r\n";
//        $config['mailtype'] = 'html'; // or html
//        $config['validation'] = TRUE; // bool whether to validate email or not     
//		$config['wordwrap'] = TRUE;		
//		$this->email->initialize($config); 

		$email_config = array(
			'protocol'  => 'mail',
			'smtp_host' => '',
			'smtp_port' => '',
			'smtp_user' => '',
			'smtp_pass' => '',
			'priority' => 1,
			'mailtype'  => 'html',
			'starttls'  => true,
			'newline'   => "\r\n",
			'charset'   => 'utf-8'
		);
		$this->load->library('email', $email_config); 
		
		$this->email->from($this->alphasettings['FROM_EMAIL'], 'AL MAJID TRAVEL & TOURISM');
		$this->email->to($to);		
		$this->email->subject($subject);
		$this->email->message($message);
		 if(is_array($attachment))foreach($attachment as $key => $file){  
            $this->email->attach($file); 
        }elseif($attachment!=''){$this->email->attach($attachment);	}
		if($this->email->send()){ return true; } else { return false; }
	}
	
	function sendtoadmin($fromemail,$fromname,$attachment,$subject,$message)
	{
		//echo $message;exit;
		//echo $attachment;exit;
		$this->load->library('email');
		$config['mailtype'] = 'html';
		$config['wordwrap'] = TRUE;		
		$this->email->initialize($config);
		$this->email->from($fromemail, $fromname);
		$this->email->to($this->alphasettings['ADMIN_EMAIL']);
		$this->email->subject($subject);
		$this->email->message($message);
        if(is_array($attachment))foreach($attachment as $key => $file){  
            $this->email->attach($file); 
        }else if($attachment!=''){$this->email->attach($attachment);	}
		if($this->email->send()){ return true; } else { return false; }
	}
	
	function adminnotification($subject,$message)
	{
		//$this->load->library('email');
		//$config['mailtype'] = 'html';
		//$config['wordwrap'] = TRUE;		
		//$this->email->initialize($config);
		
//		$this->load->library('email');
//		$config['protocol']    = 'smtp';
//		$config['smtp_host'] =$this->config->item('smtp_host'); // SMTP Server Address.
//		$config['smtp_user'] =$this->config->item('smtp_user'); // SMTP Username.
//		//$config['smtp_pass'] =$this->config->item('smtp_pass'); // SMTP Password.
//		$config['smtp_port'] =$this->config->item('smtp_port'); // SMTP Port.
//        $config['charset']    = 'utf-8';
//        $config['newline']    = "\r\n";
//        $config['mailtype'] = 'html'; // or html
//        $config['validation'] = TRUE; // bool whether to validate email or not     
//		$config['wordwrap'] = TRUE;		
//		$this->email->initialize($config); 

		$email_config = array(
			'protocol'  => 'mail',
			'smtp_host' => '',
			'smtp_port' => '',
			'smtp_user' => '',
			'smtp_pass' => '',
			'priority' => 1,
			'mailtype'  => 'html',
			'starttls'  => true,
			'newline'   => "\r\n",
			'charset'   => 'utf-8'
		);
		$this->load->library('email', $email_config); 
		
		/*$this->email->from('support@Web.com', 'Support');
		$this->email->to('admin@Web.com')*/;
		$this->email->from($this->alphasettings['FROM_EMAIL'],'AL MAJID TRAVEL & TOURISM');
		$this->email->to($this->alphasettings['ADMIN_EMAIL']); 
		$this->email->subject($subject);
		$this->email->message($message);
	
		if($this->email->send()){ return true; } else { return false; }
	}
	
	function test($subject,$message)
	{
		//$this->load->library('email');
		//$config['mailtype'] = 'html';
		//$config['wordwrap'] = TRUE;		
		//$this->email->initialize($config);
		
		$this->load->library('email');
		$config['protocol']    = 'smtp';
		$config['smtp_host'] =$this->config->item('smtp_host'); // SMTP Server Address.
		$config['smtp_user'] =$this->config->item('smtp_user'); // SMTP Username.
		//$config['smtp_pass'] =$this->config->item('smtp_pass'); // SMTP Password.
		$config['smtp_port'] =$this->config->item('smtp_port'); // SMTP Port.
        $config['charset']    = 'utf-8';
        $config['newline']    = "\r\n";
        $config['mailtype'] = 'html'; // or html
        $config['validation'] = TRUE; // bool whether to validate email or not     
		$config['wordwrap'] = TRUE;		
		$this->email->initialize($config); 
		
		/*$this->email->from('support@Web.com', 'Support');
		$this->email->to('admin@Web.com')*/;
		$this->email->from('asish@webchannel.ae','AL MAJID TRAVEL & TOURISM');
		$this->email->to('asish@webchannel.ae'); 
		$this->email->subject($subject);
		$this->email->message($message);
	
		if($this->email->send()){ return true; } else { return false; }
	}
	
	function adminnotification2($subject,$message,$tomail)
	{
		$this->load->library('email');
		$config['mailtype'] = 'html';
		$config['wordwrap'] = TRUE;		
		$this->email->initialize($config);
		
		/*$this->email->from('support@Web.com', 'Support');
		$this->email->to('admin@Web.com')*/;
		$this->email->from($this->alphasettings['FROM_EMAIL'],'AL MAJID TRAVEL & TOURISM');
		$this->email->to($tomail);
		$this->email->subject($subject);
		$this->email->message($message);
	
		if($this->email->send()){ return true; } else { return false; }
	}
	
	function adminnotification3($subject,$message,$tomail)
	{
		$this->load->library('email');
		$config['mailtype'] = 'html';
		$config['wordwrap'] = TRUE;		
		$this->email->initialize($config);
		
		/*$this->email->from('support@Web.com', 'Support');
		$this->email->to('admin@Web.com')*/;
		$this->email->from($this->alphasettings['FROM_EMAIL'],'AL MAJID TRAVEL & TOURISM');
		$this->email->to($tomail);
		$this->email->subject($subject);
		$this->email->message($message);
	
		if($this->email->send()){ return true; } else { return false; }
	}
	
	function sendtofriend($fromemail,$fromname,$toemail,$toname,$subject,$message)
	{
		$this->load->library('email');
		$config['mailtype'] = 'html';
		$config['charset'] = 'iso-8859-1';
		$config['wordwrap'] = TRUE;		
		$this->email->initialize($config);
		$this->email->from($fromemail,$fromname);
		$this->email->to($toemail,$toname);
		$this->email->subject($subject);
		$this->email->message($message);		
		if($this->email->send()){ return true; } else { return false; 							}
	}
	
	function outputCache(){
		if($this->alphasettings['CACHE_TIME']!='0'){
			$this->output->cache($this->alphasettings['CACHE_TIME']);
		}
	}
	
}