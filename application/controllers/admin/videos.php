<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Videos extends Web_Controller {

	function __construct()

    {

		// Call the Model constructor

		parent::__construct();

		if(!$this->session->userdata('admin_logged_in'))

		{

		   redirect('admin/login');		

		}

		$this->load->model('videos_model');	

	}

		

	public function index()

	{

		redirect('admin/videos/lists');		

	}

	

	public function lists($id="")

	{

		$this->load->library('pagination');

		$main['page_title']=$this->config->item('site_name').' - Videos';

		$main['header']=$this->adminheader();

		$main['footer']=$this->adminfooter();

		$main['left']=$this->adminleftmenu();

		$config['base_url'] =base_url().'admin/videos/lists/'.$id;

		$config['total_rows'] = $this->videos_model->get_pagination_count(array('videos_id'=>$id));

		$config['per_page'] = '10';

		$config['uri_segment'] = 5;

		$config['first_link'] = 'First';

		$config['last_link'] = 'Last';

		$config['cur_tag_open'] = '<span>';

		$config['cur_tag_close'] = '</span>';

		$this->pagination->initialize($config);

		$content['banners']=$this->videos_model->get_pagination($config['per_page'],$this->uri->segment($config['uri_segment']),array('videos_id'=>$id),'sort_order ASC');

		$main['content']=$this->load->view('admin/videos/lists',$content,true);

		$this->load->view('admin/main',$main);

	}

	

	function add($id="")

	{

		$this->load->library('ckeditor');

		$this->load->library('ckfinder');

		$this->ckeditor->basePath = base_url('public/admin/ckeditor/');

		$this->ckeditor->config['language'] = 'en';

		$this->ckeditor->config['width'] = '100%';

		$this->ckeditor->config['height'] = '200px';

		//Add Ckfinder to Ckeditor

		$this->ckfinder->SetupCKEditor($this->ckeditor,base_url('public/admin/ckfinder/'));

		$this->form_validation->set_rules('title', 'Title', 'required');

		//$this->form_validation->set_rules('short_desc', 'Short Description', 'required');

		$this->form_validation->set_rules('status', 'Status', 'required');

		$this->form_validation->set_message('required', 'required');

		$this->form_validation->set_error_delimiters('<span class="red">(', ')</span>');

		if ($this->form_validation->run() == FALSE)

		{

			$main['page_title']=$this->config->item('site_name').' - Videos';

			$main['header']=$this->adminheader();

			$main['footer']=$this->adminfooter();

			$main['left']=$this->adminleftmenu();

			$main['content']=$this->load->view('admin/videos/add','',true);

			$this->load->view('admin/main',$main);

		} else {

			$icon='';

			$image='';

			$config['upload_path'] = 'public/uploads/videos';

			$config['allowed_types'] = 'jpg|png|gif';

			$this->load->library('upload', $config);

			if($this->upload->do_upload('icon'))

			{

				$icondata=$this->upload->data();

				$icon=$icondata['file_name'];

			}

			if($this->upload->do_upload('image'))

			{

				$bannerdata=$this->upload->data();

				$image=$bannerdata['file_name'];

			}			

			$maindata=array('status'=>$this->input->post('status'));

			$descdata=array('title'=>$this->input->post('title'),'videos_id'=>$id,'short_desc'=>$this->input->post('short_desc'),'icon'=>$icon,'image'=>$image);
			
			$insertid=$this->videos_model->insert($maindata,$descdata);

			if($insertid){

				$this->session->set_flashdata('message', '<div class="n_ok flash_messages"><p>Video added Successfully.</p></div>');

				redirect('admin/videos/lists/'.$id);

			} else {

				$this->session->set_flashdata('message', '<div class="n_error flash_messages"><p>Error!! - Video not added.</p></div>');

				redirect('admin/videos/lists/'.$id);

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

		$this->form_validation->set_rules('title', 'Title', 'required');

		//$this->form_validation->set_rules('short_desc', 'Short Description', 'required');

		$this->form_validation->set_rules('status', 'Status', 'required');

		$this->form_validation->set_message('required', 'required');

		$this->form_validation->set_error_delimiters('<span class="red">(', ')</span>');

		if ($this->form_validation->run() == FALSE)

		{

			$main['page_title']=$this->config->item('site_name').' - Videos';

			$main['header']=$this->adminheader();

			$main['footer']=$this->adminfooter();

			$main['left']=$this->adminleftmenu();

			$edit['return']=$return;

			$edit['banner']= $this->videos_model->load($id);

			$main['content']=$this->load->view('admin/videos/edit',$edit,true);

			$this->load->view('admin/main',$main);

		} else {

			$maindata=array('status'=>$this->input->post('status'));

			$descdata=array('title'=>$this->input->post('title'),'short_desc'=>$this->input->post('short_desc'));

			$config['upload_path'] = 'public/uploads/videos';

			$config['allowed_types'] = 'jpg|png|gif';

			$this->load->library('upload', $config);

			if($this->upload->do_upload('image'))

			{

				$imagedata=$this->upload->data();

				$descdata['image']=$imagedata['file_name'];

			}

			if($this->upload->do_upload('icon'))

			{

				$icondata=$this->upload->data();

				$descdata['icon']=$icondata['file_name'];

			}

			$loginid=$this->videos_model->update($maindata,$descdata,$id);

			if($loginid){

				$this->session->set_flashdata('message', '<div class="n_ok flash_messages"><p>Video updated Successfully.</p></div>');

				redirect('admin/videos/lists/'.$id.'/'.$return);

			} else {

				$this->session->set_flashdata('message', '<div class="n_error flash_messages"><p>Error!! - Video not updated.</p></div>');

				redirect('admin/videos/lists/'.$id.'/'.$return);

			}

		}

	}

	

	function delete($id,$return)

	{

		$loginid=$this->videos_model->delete($id);

		if($loginid){

			$this->session->set_flashdata('message', '<div class="n_ok flash_messages"><p>Video deleted Successfully.</p></div>');

			redirect('admin/videos/lists/'.$id.'/'.$return);

		} else {

			$this->session->set_flashdata('message', '<div class="n_error flash_messages"><p>Error!! - Video not deleted.</p></div>');

			redirect('admin/videos/lists/'.$id.'/'.$return);

		}

	}

	

	function actions()

	{

		$loginid=false;

		$ids=$this->input->post('id');

		$sort_orders=$this->input->post('sort_order');

		if(isset($_POST['enable']) && $this->input->post('enable')=='Enable'){ $status='Y';$data=array('status'=>$status);}

		if(isset($_POST['disable']) && $this->input->post('disable')=='Disable'){ $status='N';$data=array('status'=>$status);}

		if(isset($status) && isset($_POST['id'])){

			foreach($ids as $id):

				$loginid=$this->videos_model->update($data,array(),$id);				

			endforeach;			

		}

		if(isset($_POST['sortsave']) && $this->input->post('sortsave')=='Save' && count($sort_orders)>0){

			foreach($sort_orders as $id => $sort_order):

				$data=array('sort_order'=>$sort_order);

				$loginid=$this->videos_model->update($data,array(),$id);				

			endforeach;			

		}

		if($loginid){

			$this->session->set_flashdata('message', '<div class="n_ok flash_messages"><p>Video updated Successfully.</p></div>');

		} else {

			$this->session->set_flashdata('message', '<div class="n_error flash_messages"><p>Error!! - Video not updated.</p></div>');

		}

		if(isset($_POST['delete']) && $ids){			

			foreach($ids as $id):

				$loginid=$this->videos_model->delete($id);				

			endforeach;

			if($loginid){

				$this->session->set_flashdata('message', '<div class="n_ok flash_messages"><p>Video Deleted Successfully.</p></div>');

			} 

		}

		redirect('admin/videos/lists/'.$id.'/'.$this->input->post('return'));

	}	

}

/* End of file banner.php */

/* Location: ./application/controllers/admin/banners.php */