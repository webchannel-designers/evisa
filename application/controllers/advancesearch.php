<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Advancesearch extends Satpifront_Controller {
	public function index()
	{
		$this->outputCache();
		$this->load->model('frontend/pages_model');
		
		$pagemeta=$this->pages_model->get_row_cond(array('key'=>'advance-search'));
		if($pagemeta->title!=''){$this->pagetitle=$pagemeta->title;}
		if($pagemeta->short_desc!=''){$this->desc=$pagemeta->short_desc; }
		if($pagemeta->keywords!=''){$this->keys=$pagemeta->keywords; }
		if($pagemeta->banner_image!=''){$this->pagebannner=base_url('public/uploads/pages/'.$pagemeta->banner_image); }
		if($pagemeta->banner_text!=''){$this->pagebannnertext=$pagemeta->banner_text; }
		//$this->left_widgets=$this->widgets_model->get_pagewidgets($pagemeta->widgets);
		$this->breadcrumbarr=array('/'=>$this->alphasettings['BREADCRUMB_START'],site_url('advancesearch') =>$this->pagetitle);
		$this->load->model('frontend/contacts_model');
		$this->load->model('frontend/makes_model');
		$this->load->model('frontend/model_model');
		$this->load->model('frontend/location_model');
		
			$home['contentcats'] = $this->productcategory_model->get_array();
			
			$home['makes'] = $this->makes_model->get_active();
			
			$home['models'] = $this->model_model->get_active();
			
			$home['locations'] = $this->location_model->get_active();
		
		$home['contacts']=$this->contacts_model->get_active();
		$home['events']=$this->events_model->get_array_limit(2);
		
		//print_r($home['contacts']);exit;
		$frontcontent=$this->load->view('frontend/content/advance-search',$home,true);
		//$main['contents']=$this->frontcontent($frontcontent,true);
		
		$main['contents']=$frontcontent;
		$main['header']=$this->frontheader();
		$main['footer']=$this->frontfooter();
		$main['meta']=$this->frontmetahead();
		$this->load->view('frontend/main',$main);
	}
	
	public function enquiry()
	{
		$this->load->model('frontend/countries_model');
		$this->form_validation->set_rules('fullname', 'Your Name', 'required|callback_alphaspace_check');
		
		//$this->form_validation->set_rules('companyname', 'Company Name', 'required');	
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		//$this->form_validation->set_rules('phone', 'Phone', 'required|numeric');
		
		$this->form_validation->set_rules('mobile', 'Mobile', 'required|numeric');
		$this->form_validation->set_rules('subject', 'Subject', 'required');
		
		//$this->form_validation->set_rules('country', 'Country', 'required');
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
			$list['cap'] = $cap;
			
			$list['countries'] = $this->countries_model->get_active();			
			$this->load->view('frontend/content/contactform',$list);
		} else {
			$maindata=array('enq_name'=>$this->input->post('fullname'),'enq_email'=>$this->input->post('email'),'enq_mobile'=>$this->input->post('mobile'),'enq_subject'=>$this->input->post('subject'),'enq_message'=>$this->input->post('message'));
			
			$this->load->model('frontend/enquiry_model');
			
			$descdata = "";
			
			$insertid = $this->enquiry_model->insert($maindata,$descdata);
			$message = $this->load->view('frontend/mail/contactus',$maindata,TRUE);
			$this->adminnotification( convert_lang($this->config->item('contact_request'),$this->alphalocalization),$message);
			$this->load->view('frontend/content/contactsuccess');			
	   	}
	}
	
	
	public function enquiry2()
	{
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
			$list['cap'] = $cap;			
			$this->load->view('frontend/content/enquiryform',$list);
		} else {
			$maindata=array('enq_name'=>$this->input->post('fullname'),'enq_company'=>$this->input->post('companyname'),'enq_email'=>$this->input->post('email'),'enq_phone'=>$this->input->post('phone'),'enq_subject'=>$this->input->post('subject'),'enq_message'=>$this->input->post('message'));
			
			$this->load->model('frontend/enquiry_model');
			
			$descdata = "";
			
			$insertid = $this->enquiry_model->insert($maindata,$descdata);
			$message = $this->load->view('frontend/mail/enquiry',$maindata,TRUE);
			$this->adminnotification( convert_lang($this->config->item('contact_request'),$this->alphalocalization),$message);
			$this->load->view('frontend/content/contactsuccess');			
	   	}
	}
	
	public function comment()
	{
		$this->form_validation->set_rules('fullname', 'Your Name', 'required|callback_alphaspace_check');
		
		//$this->form_validation->set_rules('companyname', 'Company Name', 'required');	
		//$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		//$this->form_validation->set_rules('phone', 'Phone', 'required|numeric');
		//$this->form_validation->set_rules('subject', 'Subject', 'required');
		//$this->form_validation->set_rules('message', 'Message', 'required');
		//$this->form_validation->set_rules('captcha', 'Captcha', 'required|callback_captcha_check');
		//$this->form_validation->set_message('required', convert_lang('required',$this->alphalocalization));
		//$this->form_validation->set_message('valid_email', convert_lang('Invalid Email',$this->alphalocalization));
		//$this->form_validation->set_message('numeric', convert_lang('numbers only',$this->alphalocalization));
		//$this->form_validation->set_error_delimiters('<span class="red">(', ')</span>');
//		if ($this->form_validation->run() == FALSE)
//		{
//			$this->load->helper('captcha');
//			$vals = array(
//				'img_path' => 'public/captcha/',
//				'img_url' => base_url('public/captcha/').'/',
//				'font_path' => 'public/frontend/fonts/opensans-bold-webfont.ttf',
//				'img_width' => '100',
//    			'img_height' => '32'
//				);			
//			$cap = create_captcha($vals);			
//			$data = array(
//				'captcha_time' => $cap['time'],
//				'ip_address' => $this->input->ip_address(),
//				'word' => $cap['word']
//				);			
//			$query = $this->db->insert_string('captcha', $data);
//			$this->db->query($query);	
//			$list['cap'] = $cap;			
//			//$this->load->view('frontend/content/commentform',$list);
//		} else {
			$maindata=array('pid'=>$this->input->post('pid'),'name'=>$this->input->post('fullname'),'email'=>$this->input->post('email'),'comments'=>$this->input->post('message'));
			
			$this->load->model('frontend/enquiry_model');
			
			$descdata = "";
			
			$insertid = $this->enquiry_model->insert2($maindata,$descdata);
			//$message = $this->load->view('frontend/mail/enquiry',$maindata,TRUE);
			//$this->adminnotification( convert_lang($this->config->item('contact_request'),$this->alphalocalization),$message);
			$this->session->set_flashdata('message','<h3 class="reg-success">Thank you for your comments. This comment will be published after reviewed by the team.</h3>');
			redirect('products/view/'.$this->input->post('slug'));			
	   	//}
	}
	
	public function download($id)
	{
		$this->load->model('frontend/contacts_model');
		$contact_val=$this->contacts_model->load($id);
		$this->load->helper('download');
		$data = file_get_contents(base_url()."public/uploads/contents/".$contact_val->image); // Read the file's contents
		$name = 'Contact-Details.pdf';
		force_download($name, $data);
	}
	
	public function location($id)
	{
			$this->load->model('frontend/contacts_model');
			$home['location']=$this->contacts_model->load($id);
			$this->load->view('frontend/content/location',$home);
	}
}
/* End of file contents.php */
/* Location: ./application/controllers/contents.php */