<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Apply extends Ecsfront_Controller {

	public function index()
	{
		$this->load->model('frontend/pages_model');
		$pagemeta=$this->pages_model->get_row_cond(array('key'=>'apply'));
		if($pagemeta->title!=''){$this->pagetitle=$pagemeta->title;}
		if($pagemeta->short_desc!=''){$this->desc=$pagemeta->short_desc; }
		if($pagemeta->keywords!=''){$this->keys=$pagemeta->keywords; }
		if($pagemeta->banner_image!=''){$this->pagebannner=base_url('public/uploads/pages/'.$pagemeta->banner_image); }
		if($pagemeta->banner_text!=''){$this->pagebannnertext=$pagemeta->banner_text; }
		$this->left_widgets=$this->widgets_model->get_pagewidgets($pagemeta->widgets);
		$this->breadcrumbarr=array('/'=>$this->alphasettings['BREADCRUMB_START'],site_url('contactus') =>$this->pagetitle);
		$home['content']=$pagemeta;
		$frontcontent=$this->load->view('frontend/apply/index',$home,true);
		$main['contents']=$this->frontcontent($frontcontent,true);
		$main['header']=$this->frontheader();
		$main['footer']=$this->frontfooter();
		$main['meta']=$this->frontmetahead();
		$this->load->view('frontend/main',$main);
	}
	
	public function applyform()
	{
		$this->load->model('frontend/countries_model');
		$this->load->model('frontend/apply_model');
		$this->form_validation->set_rules('academic_degree', 'Degree', 'required');
		$this->form_validation->set_rules('first_name', 'First Name', 'required');
		$this->form_validation->set_rules('father_name', 'Father name', 'required');
		$this->form_validation->set_rules('grandfather_name', 'Grand Father Name', 'required');
		$this->form_validation->set_rules('family_name', 'Family Name', 'required');
		$this->form_validation->set_rules('mother_name', 'Mother Name', 'required');
		$this->form_validation->set_rules('nationality', 'Nationality', 'required');
		$this->form_validation->set_rules('dob', 'DOB', 'required');
		$this->form_validation->set_rules('pob', 'POB', 'required');
		$this->form_validation->set_rules('gender', 'gender', 'required');
		$this->form_validation->set_rules('martial', 'martial', 'required');
		$this->form_validation->set_rules('mobile', 'mobile', 'required');		
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('passport_number', 'Passport Number', 'required');
		$this->form_validation->set_rules('place_of_issue', 'Place of issue', 'required');
		$this->form_validation->set_rules('date_of_issue', 'Date of issue', 'required');
		$this->form_validation->set_rules('careof', 'Care Of', 'required');
		$this->form_validation->set_rules('zipcode', 'Zipcode', 'required');
		$this->form_validation->set_rules('city', 'City', 'required');
		$this->form_validation->set_rules('country', 'Country', 'required');
		$this->form_validation->set_rules('parent_name', 'parent_name', 'required');
		$this->form_validation->set_rules('parent_profession', 'parent_profession', 'required');
		$this->form_validation->set_rules('parent_homephone', 'parent_homephone', 'required');
		$this->form_validation->set_rules('parent_workphone', 'parent_workphone', 'required');
		$this->form_validation->set_rules('parent_fax', 'parent_fax', 'required');
		$this->form_validation->set_rules('parent_mobile', 'parent_mobile', 'required');
		$this->form_validation->set_rules('parent_email', 'parent_email', 'required|valid_email');
		$this->form_validation->set_rules('relation', 'relation', 'required');
		$this->form_validation->set_rules('school[1][name]', 'School name', 'required');
		$this->form_validation->set_rules('school[1][location]', 'School location', 'required');
		$this->form_validation->set_rules('school[1][doa_from]', 'School doafrom', 'required');
		$this->form_validation->set_rules('school[1][doa_to]', 'School doato', 'required');
		for($i=2;$i<=3;$i++){
		$this->form_validation->set_rules('school['.$i.'][name]', 'School name'.$i, '');
		$this->form_validation->set_rules('school['.$i.'][location]', 'School location'.$i, '');
		$this->form_validation->set_rules('school['.$i.'][doa_from]', 'School doafrom'.$i, '');
		$this->form_validation->set_rules('school['.$i.'][doa_to]', 'School doato'.$i, '');
		}		
		$this->form_validation->set_rules('certificate', 'Certificate', 'required');
		$this->form_validation->set_rules('date_recieved', 'Date Recieved', 'required');
		$this->form_validation->set_rules('other_certificate', 'Other Certificate', 'callback_othercertificate_check');
		for($i=1;$i<=10;$i++){
		$this->form_validation->set_rules('subject['.$i.'][name]', 'Subject name'.$i, '');
		$this->form_validation->set_rules('subject['.$i.'][level]', 'Subject level'.$i, '');
		$this->form_validation->set_rules('subject['.$i.'][result]', 'Subject result'.$i, '');
		}
		$this->form_validation->set_rules('test_name', 'Test Name', 'required');
		$this->form_validation->set_rules('test_score', 'Test Score', 'required');
		$this->form_validation->set_rules('test_date', 'Test Date', 'required');
		$this->form_validation->set_rules('disablities', 'Disablities', 'required');
		$this->form_validation->set_rules('other_disablities', 'Otehr Disablities', 'callback_otherdisability_check');
		$this->form_validation->set_rules('programs', 'Programs', 'required');
		$this->form_validation->set_rules('applyas', 'Apply As', 'required');
		$this->form_validation->set_rules('terms', 'Terms', 'required');
		$this->form_validation->set_rules('captcha', 'Captcha', 'required|callback_captcha_check');
		$this->form_validation->set_message('required', convert_lang('required',$this->alphalocalization));
		$this->form_validation->set_message('valid_email', convert_lang('invalid Email',$this->alphalocalization));
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
			$list['countries']=$this->countries_model->get_active();	
			$this->load->view('frontend/apply/form',$list);
		} else {
			$maindata=array('academic_degree'=>$this->input->post('academic_degree'),'first_name'=>$this->input->post('first_name'),'father_name'=>$this->input->post('father_name'),'grandfather_name'=>$this->input->post('grandfather_name'),'family_name'=>$this->input->post('family_name'),'mother_name'=>$this->input->post('mother_name'),'nationality'=>$this->input->post('nationality'),'dob'=>date('Y-m-d',strtotime($this->input->post('dob'))),'pob'=>$this->input->post('pob'),'gender'=>$this->input->post('gender'),'martial'=>$this->input->post('martial'),'mobile'=>$this->input->post('mobile'),'email'=>$this->input->post('email'),'passport_number'=>$this->input->post('passport_number'),'place_of_issue'=>$this->input->post('place_of_issue'),'date_of_issue'=>date('Y-m-d',strtotime($this->input->post('date_of_issue'))),'careof'=>$this->input->post('careof'),'zipcode'=>$this->input->post('zipcode'),'city'=>$this->input->post('city'),'country'=>$this->input->post('country'),'parent_name'=>$this->input->post('parent_name'),'parent_profession'=>$this->input->post('parent_profession'),'parent_homephone'=>$this->input->post('parent_homephone'),'parent_workphone'=>$this->input->post('parent_workphone'),'parent_fax'=>$this->input->post('parent_fax'),'parent_mobile'=>$this->input->post('parent_mobile'),'parent_email'=>$this->input->post('parent_email'),'relation'=>$this->input->post('relation'),'school'=>serialize($this->input->post('school')),'certificate'=>$this->input->post('certificate'),'date_recieved'=>date('Y-m-d',strtotime($this->input->post('date_recieved'))),'other_certificate'=>$this->input->post('other_certificate'),'subject'=>serialize($this->input->post('subject')),'test_name'=>$this->input->post('test_name'),'test_score'=>$this->input->post('test_score'),'test_date'=>$this->input->post('test_date'),'disablities'=>$this->input->post('disablities'),'other_disablities'=>$this->input->post('other_disablities'),'programs'=>$this->input->post('programs'),'applyas'=>$this->input->post('applyas'),'terms'=>$this->input->post('terms'),'language'=>$this->session->userdata('front_language'));
			$this->apply_model->insert($maindata);
			$message=$this->load->view('frontend/mail/adminapplynow',$maindata,TRUE);
			$this->adminnotification( convert_lang('ECUC - Apply Now Request',$this->alphalocalization),$message);
			$message=$this->load->view('frontend/mail/applynow',$maindata,TRUE);
			$this->sendfromadmin($maindata['email'],convert_lang('ECUC - Apply Now Request',$this->alphalocalization),$message);
			$this->load->view('frontend/apply/success');			
	   	}
	}
	
	function othercertificate_check($str)
	{
		$certificate=$this->input->post('certificate');
		if($certificate=='Others' && $str=='')
		{
			$this->form_validation->set_message('othercertificate_check', convert_lang('required',$this->alphalocalization));
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}
	function otherdisability_check($str)
	{
		$certificate=$this->input->post('disablities');
		if($certificate=='Others' && $str=='')
		{
			$this->form_validation->set_message('otherdisability_check', convert_lang('required',$this->alphalocalization));
			return FALSE;
		}
		else
		{
			return TRUE;
		}
	}

}
/* End of file contents.php */
/* Location: ./application/controllers/contents.php */