<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Buysell extends Pianofront_Controller {	
	public function index($id='')
	{

		$this->load->model('frontend/pages_model');		
		$home['content'] =$pagemeta=$this->pages_model->get_row_cond(array('key'=>'buysell'));		
		if($pagemeta->title!=''){$this->pagetitle=$pagemeta->title;}
		if($pagemeta->short_desc!=''){$this->desc=$pagemeta->short_desc; }
		if($pagemeta->keywords!=''){$this->keys=$pagemeta->keywords; }
		if($pagemeta->banner_image!=''){$this->pagebannner=base_url('public/uploads/pages/'.$pagemeta->banner_image); }
		if($pagemeta->banner_text!=''){$this->pagebannnertext=$pagemeta->banner_text; } 
		$this->breadcrumbarr=array('/'=>$this->alphasettings['BREADCRUMB_START'],site_url('contactus') =>$this->pagetitle);
		$this->load->model('frontend/contacts_model'); 
        
		$frontcontent=$this->load->view('frontend/buysell/index',$home,true); 		
		$main['contents']=$frontcontent;
		$main['header']=$this->frontheader();
		$main['footer']=$this->frontfooter();
		$main['meta']=$this->frontmetahead();
		$this->load->view('frontend/main',$main);

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
	public function request()
	{
	    $this->load->library('recaptcha');
		$this->load->model('frontend/countries_model');
		$this->form_validation->set_rules('firstname', 'Name', 'required|trim'); 
		$this->form_validation->set_rules('lastname', ' Name', 'required|trim'); 
		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('city', 'city', 'required');
 		$this->form_validation->set_rules('mobile', 'Mobile', 'required|regex_match[/^[0-9().-]+$/]');
		$this->form_validation->set_rules('country', 'country', '');
		$this->form_validation->set_rules('iwantto', 'iwantto', 'required');
		$this->form_validation->set_rules('type', 'type', 'required');
		$this->form_validation->set_rules('model', 'model', 'required');
		$this->form_validation->set_rules('brand', 'brand', 'required');
		$this->form_validation->set_rules('color', 'color', 'required');
		$this->form_validation->set_rules('condition', 'condition', 'required');
		$this->form_validation->set_rules('serialno', 'serialno', 'required');
		$this->form_validation->set_rules('reason', 'reason', 'required');
		$this->form_validation->set_rules('sellprice', 'sellprice', '');
		$this->form_validation->set_rules('selltime', 'selltime', 'required'); 
		$this->form_validation->set_rules('iaccept', 'iaccept', 'required'); 
        $this->form_validation->set_rules('captcha', 'Captcha', 'callback_veryfy_captcha');
		$this->form_validation->set_message('required', convert_lang('required',$this->alphalocalization));
		$this->form_validation->set_message('valid_email', convert_lang('Invalid Email',$this->alphalocalization));
		$this->form_validation->set_message('numeric', convert_lang('numbers only',$this->alphalocalization)); 
		if ($this->form_validation->run() == FALSE)
		{ 
			$list['countries'] = $this->countries_model->get_active();			
			$this->load->view('frontend/buysell/request',$list);
		} else {
		    $config['upload_path'] = 'public/uploads/buysell';
			$config['allowed_types'] = 'gif|png|jpg';
			$this->load->library('upload', $config);
			$this->upload->initialize($config);$images='';$attachments=$image=array(); 
			if($this->upload->do_multi_upload('photos'))
			{   
				foreach($this->upload->get_multi_upload_data() as $imgdata):  
				$image[] = $imgdata['file_name']; 
                $attachments[] = 'public/uploads/buysell/'.$imgdata['file_name']; 
 				endforeach; 	
                $images = implode('|',$image);
                
			}	
			$maindata=array('firstname'=>$this->input->post('firstname'),
            'lastname'=>$this->input->post('lastname'),
            'mobile'=>$this->input->post('mobile'),
            'email'=>$this->input->post('email'),
            'country'=>$this->input->post('country'),
            'city'=>$this->input->post('city'),
            'iwantto'=>$this->input->post('iwantto'),
            'type'=>$this->input->post('type'),
            'model'=>$this->input->post('model'),
            'brand'=>$this->input->post('brand'),
            'color'=>$this->input->post('color'),
            'condition'=>$this->input->post('condition'),
            'serialno'=>$this->input->post('serialno'),
            'reason'=>$this->input->post('reason'),
            'sellprice'=>$this->input->post('sellprice'),
            'selltime'=>$this->input->post('selltime'),
            'photos'=>$images
            );
			$this->db->insert('buysell',$maindata); 
			$message = $this->load->view('frontend/mail/buysell',$maindata,TRUE);            
			$notify = $this->load->view('frontend/mail/notify',$maindata,TRUE);
			$this->sendfromadmin($this->input->post('email'),'Thank you for your Request',$notify,$attachments);
			$this->adminnotification(convert_lang('Buy & Sell Request',$this->alphalocalization),$message,$attachments); 
			$this->load->view('frontend/buysell/success');			
	   	}
	}
}
/* End of file buysell.php */
/* Location: ./application/controllers/buysell.php */    