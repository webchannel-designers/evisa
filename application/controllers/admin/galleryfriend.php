<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Galleryfriend extends Web_Controller {

	function __construct()

    {

		// Call the Model constructor

		parent::__construct();

		if(!$this->session->userdata('admin_logged_in'))

		{

		   redirect('admin/login');		

		}

		$this->load->model('galleryfriend_model');	

	}

		

	public function index()

	{

		redirect('admin/galleryfriend/add');		

	}

	

	public function lists()

	{

		$this->load->library('pagination');

		$main['page_title']=$this->config->item('site_name').' - Banners';

		$main['header']=$this->adminheader();

		$main['footer']=$this->adminfooter();

		$main['left']=$this->adminleftmenu();

		$config['base_url'] =base_url().'admin/banners/lists/';

		$config['total_rows'] = $this->banners_model->get_pagination_count();

		$config['per_page'] = '10';

		$config['uri_segment'] = 4;

		$config['first_link'] = 'First';

		$config['last_link'] = 'Last';

		$config['cur_tag_open'] = '<span>';

		$config['cur_tag_close'] = '</span>';

		$this->pagination->initialize($config);

		$content['banners']=$this->banners_model->get_pagination($config['per_page'],$this->uri->segment($config['uri_segment']),NULL,'sort_order ASC');

		$main['content']=$this->load->view('admin/banners/lists',$content,true);

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

		$this->form_validation->set_rules('title', 'Title', 'required');
	
		$this->form_validation->set_message('required', 'required');

		$this->form_validation->set_error_delimiters('<span class="red">(', ')</span>');
		
			$main['page_title']=$this->config->item('site_name').' - Gallery';

			$main['header']=$this->adminheader();

			$main['footer']=$this->adminfooter();

			$main['left']=$this->adminleftmenu();
				
			$icon='';

			$image='';

			$config['upload_path'] = 'public/uploads/gallery';

			$config['allowed_types'] = 'jpg|png|gif';

			$this->load->library('upload', $config);
			$product_id = $this->uri->segment(4);
		if (empty($_FILES['image']['name']))

		{
			$edit['records']=$this->galleryfriend_model->get_array_cond($product_id);		
			$main['content']=$this->load->view('admin/galleryfriend/add',$edit,true);
			$this->load->view('admin/main',$main);

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

			if($this->upload->do_upload('image'))

			{

				$bannerdata=$this->upload->data();

				$image=$bannerdata['file_name'];

			}			
			
		
			$maindata="";

			$descdata=array('parent_id'=>$product_id,'image'=>$image,'title'=>$this->input->post('title'),'url'=>$this->input->post('url'),'language'=>$this->session->userdata('admin_language'));

			$insertid=$this->galleryfriend_model->insert($maindata,$descdata);

			if($insertid){

				$this->session->set_flashdata('message', '<div class="n_ok flash_messages"><p>Image added Successfully.</p></div>');
				
				redirect('admin/galleryfriend/add/'.$product_id);

			} else {

				$this->session->set_flashdata('message', '<div class="n_error flash_messages"><p>Error!! - Image not added.</p></div>');

				redirect('admin/galleryfriend/add/'.$product_id);

			}

		}
				//$records=$this->galleryfriend_model->get_array();
				//$main['records']=$this->load->view('admin/gallery/add',$records,true);
				//$this->load->view('admin/main',$main);

	}
	
	
	function update()

	{

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

			$main['header']=$this->adminheader();

			$main['footer']=$this->adminfooter();

			$main['left']=$this->adminleftmenu();


//		if ($this->form_validation->run() == FALSE)
//
//		{
//			$edit['records']=$this->galleryfriend_model->get_array();			
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
			//$edit['records']=$this->galleryfriend_model->get_array();
			
			$edit['records']=$this->galleryfriend_model->get_array_cond($product_id);	
			
			foreach($edit['records'] as $key)
			{	

			$descdata=array('sort_order'=>$this->input->post('sort_'.$key['id']),'title'=>$this->input->post('title_'.$key['id']),'url'=>$this->input->post('url_'.$key['id']));

			$insertid=$this->galleryfriend_model->update($maindata,$descdata,$key['id']);
			
			}


				$this->session->set_flashdata('message', '<div class="n_ok flash_messages"><p>Sort Order Updated Successfully.</p></div>');
				
				redirect('admin/galleryfriend/add/'.$product_id);


		//}
				//$records=$this->galleryfriend_model->get_array();
				//$main['records']=$this->load->view('admin/gallery/add',$records,true);
				//$this->load->view('admin/main',$main);
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

		$this->form_validation->set_rules('short_desc', 'Short Description', 'required');

		$this->form_validation->set_rules('status', 'Status', 'required');

		$this->form_validation->set_message('required', 'required');

		$this->form_validation->set_error_delimiters('<span class="red">(', ')</span>');

		if ($this->form_validation->run() == FALSE)

		{

			$main['page_title']=$this->config->item('site_name').' - Banners';

			$main['header']=$this->adminheader();

			$main['footer']=$this->adminfooter();

			$main['left']=$this->adminleftmenu();

			$edit['return']=$return;

			$edit['banner']= $this->banners_model->load($id);

			$main['content']=$this->load->view('admin/banners/edit',$edit,true);

			$this->load->view('admin/main',$main);

		} else {

			$maindata=array('status'=>$this->input->post('status'));

			$descdata=array('title'=>$this->input->post('title'),'short_desc'=>$this->input->post('short_desc'));

			$config['upload_path'] = 'public/uploads/banners';

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

			$loginid=$this->banners_model->update($maindata,$descdata,$id);

			if($loginid){

				$this->session->set_flashdata('message', '<div class="n_ok flash_messages"><p>Banner updated Successfully.</p></div>');

				redirect('admin/banners/lists/'.$return);

			} else {

				$this->session->set_flashdata('message', '<div class="n_error flash_messages"><p>Error!! - Banner not updated.</p></div>');

				redirect('admin/banners/lists/'.$return);

			}

		}

	}

	

	function delete($id)

	{
		$product_id = $this->uri->segment(5);
		$loginid=$this->galleryfriend_model->delete($id);

		if($loginid){

			$this->session->set_flashdata('message', '<div class="n_ok flash_messages"><p>Image deleted Successfully.</p></div>');

			redirect('admin/galleryfriend/add/'.$product_id);

		} else {

			$this->session->set_flashdata('message', '<div class="n_error flash_messages"><p>Error!! - Image not deleted.</p></div>');

			redirect('admin/galleryfriend/add/'.$product_id);

		}

	}

	function setdefault($val,$id,$reurn='')

	{
		//$gallerydata = $this->galleryfriend_model->load($id);
		$this->galleryfriend_model->updateall(array('is_default'=>'N'),array('parent_id'=>$reurn));
		$result = $this->galleryfriend_model->update(array(),array('is_default'=>$val),$id);
		//if($result){
			$this->session->set_flashdata('message', '<div class="n_ok flash_messages"><p>Default image updated.</p></div>');

			redirect('admin/galleryfriend/add/'.$reurn);

		/*//} else {

			$this->session->set_flashdata('message', '<div class="n_error flash_messages"><p>Error!! -Default Image not updated.</p></div>');

			redirect('admin/gallery/add/'.$reurn);

		}*/

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

				$loginid=$this->banners_model->update($data,array(),$id);				

			endforeach;			

		}

		if(isset($_POST['sortsave']) && $this->input->post('sortsave')=='Save' && count($sort_orders)>0){

			foreach($sort_orders as $id => $sort_order):

				$data=array('sort_order'=>$sort_order);

				$loginid=$this->banners_model->update($data,array(),$id);				

			endforeach;			

		}

		if($loginid){

			$this->session->set_flashdata('message', '<div class="n_ok flash_messages"><p>Banner updated Successfully.</p></div>');

		} else {

			$this->session->set_flashdata('message', '<div class="n_error flash_messages"><p>Error!! - Banner not updated.</p></div>');

		}

		if(isset($_POST['delete']) && $ids){			

			foreach($ids as $id):

				$loginid=$this->banners_model->delete($id);				

			endforeach;

			if($loginid){

				$this->session->set_flashdata('message', '<div class="n_ok flash_messages"><p>Banner Deleted Successfully.</p></div>');

			} 

		}

		redirect('admin/banners/lists/'.$this->input->post('return'));

	}	

	

}

/* End of file banner.php */

/* Location: ./application/controllers/admin/banners.php */