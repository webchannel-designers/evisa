<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reports extends Web_Controller {

	function __construct()

    {

		// Call the Model constructor

		parent::__construct();

		if(!$this->session->userdata('admin_logged_in'))

		{

		   redirect('admin/login');		

		}

		$this->load->model('reports_model');	

		$this->load->model('reportcategory_model');

	}

		

	public function index()

	{

		redirect('admin/reports/lists');		

	}

	

	public function lists()

	{

		$this->load->library('pagination');

		$main['page_title']=$this->config->item('site_name').' - Downloads';

		$main['header']=$this->adminheader();

		$main['footer']=$this->adminfooter();

		$main['left']=$this->adminleftmenu();

		$config['base_url'] = site_url('admin/reports/lists/');

		$config['total_rows'] = $this->reports_model->get_pagination_count();

		$config['per_page'] = '10';

		$config['uri_segment'] = 4;

		$config['first_link'] = 'First';

		$config['last_link'] = 'Last';

		$config['cur_tag_open'] = '<span>';

		$config['cur_tag_close'] = '</span>';

		$this->pagination->initialize($config);

		$content['downloadfields'] = $this->reports_model->get_fields();

		$content['sortorders'] = array('asc'=>'Ascending','desc'=>'Descending');

		$content['downloadcats'] = $this->reportcategory_model->get_array();

		$content['downloads']=$this->reports_model->get_pagination($config['per_page'],$this->uri->segment($config['uri_segment']));

		$main['content']=$this->load->view('admin/reports/lists',$content,true);

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

		$this->form_validation->set_rules('category_id', 'Category', 'required');

		$this->form_validation->set_rules('title', 'Title', 'required');

		$this->form_validation->set_rules('status', 'Status', 'required');

		$this->form_validation->set_message('required', 'required');

		$this->form_validation->set_error_delimiters('<span class="red">(', ')</span>');

		if ($this->form_validation->run() == FALSE)

		{

			$main['page_title']=$this->config->item('site_name').' - Reports';

			$main['header']=$this->adminheader();

			$main['footer']=$this->adminfooter();

			$main['left']=$this->adminleftmenu();

			$add['categories']=$this->reportcategory_model->get_array();

			$main['content']=$this->load->view('admin/reports/add',$add,true);

			$this->load->view('admin/main',$main);

		} else {

			$attachment='';

			$config['upload_path'] = 'public/uploads/downloads';

			$config['allowed_types'] = 'docx|doc|pdf|rtf|txt';

			$this->load->library('upload', $config);

			if($this->upload->do_upload('attachment'))

			{

				$attachmentdata=$this->upload->data();

				$attachment=$attachmentdata['file_name'];

			}			

			$maindata=array('status'=>$this->input->post('status'),'category_id'=>$this->input->post('category_id'));

			$descdata=array('title'=>$this->input->post('title'),'attachment'=>$attachment);

			$insertid=$this->reports_model->insert($maindata,$descdata);

			if($insertid){

				$this->session->set_flashdata('message', '<div class="n_ok flash_messages"><p>Report added Successfully.</p></div>');

				redirect('admin/reports/lists');

			} else {

				$this->session->set_flashdata('message', '<div class="n_error flash_messages"><p>Error!! - Report not added.</p></div>');

				redirect('admin/reports/lists');

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

		$this->form_validation->set_rules('category_id', 'Category', 'required');

		$this->form_validation->set_rules('title', 'Title', 'required');

		$this->form_validation->set_rules('status', 'Status', 'required');

		$this->form_validation->set_message('required', 'required');

		$this->form_validation->set_error_delimiters('<span class="red">(', ')</span>');

		if ($this->form_validation->run() == FALSE)

		{

			$main['page_title']=$this->config->item('site_name').' - Reports';

			$main['header']=$this->adminheader();

			$main['footer']=$this->adminfooter();

			$main['left']=$this->adminleftmenu();

			$edit['return']=$return;

			$edit['download']= $this->reports_model->load($id);

			$edit['categories']=$this->reportcategory_model->get_array();

			$main['content']=$this->load->view('admin/reports/edit',$edit,true);

			$this->load->view('admin/main',$main);

		} else {

			$maindata=array('status'=>$this->input->post('status'),'category_id'=>$this->input->post('category_id'));

			$descdata=array('title'=>$this->input->post('title'));

			$config['upload_path'] = 'public/uploads/downloads';

			$config['allowed_types'] = 'docx|doc|pdf|rtf|txt';

			$this->load->library('upload', $config);

			if($this->upload->do_upload('attachment'))

			{

				$attachmentdata=$this->upload->data();

				$descdata['attachment']=$attachmentdata['file_name'];

			}

			$loginid=$this->reports_model->update($maindata,$descdata,$id);

			if($loginid){

				$this->session->set_flashdata('message', '<div class="n_ok flash_messages"><p>Report updated Successfully.</p></div>');

				redirect('admin/reports/lists/'.$return);

			} else {

				$this->session->set_flashdata('message', '<div class="n_error flash_messages"><p>Error!! - Report not updated.</p></div>');

				redirect('admin/reports/lists/'.$return);

			}

		}

	}

	

	function delete($id,$return)

	{

		$loginid=$this->reports_model->delete($id);

		if($loginid){

			$this->session->set_flashdata('message', '<div class="n_ok flash_messages"><p>Report deleted Successfully.</p></div>');

			redirect('admin/reports/lists/'.$return);

		} else {

			$this->session->set_flashdata('message', '<div class="n_error flash_messages"><p>Error!! - Report not deleted.</p></div>');

			redirect('admin/reports/lists/'.$return);

		}

	}

	

	function actions()

	{

		$loginid=false;

		$ids=$this->input->post('id');

		$sort_orders=$this->input->post('sort_order');

		if(isset($_POST['reset']) && $this->input->post('reset')=='Reset'){

			$newdata = array(

				   'download_key'  => '',

				   'download_field'  => '',

				   'download_category_id'  => '',

				   'order_field'=>'',

				   'sort_field' =>''

			);

			$this->session->unset_userdata($newdata);

			redirect('admin/reports/lists/');

		}

		if(isset($_POST['search']) && $this->input->post('search')=='Search'){

			if($this->input->post('keyword')!='' || $this->input->post('category')!='' ||  $this->input->post('sortby')!=''){

				$newdata = array(

					   'download_key'  => $this->input->post('keyword'),

					   'download_field'  => $this->input->post('field'),

					   'download_category_id'  => $this->input->post('category'),

					   'order_field' =>  $this->input->post('orderby'),

					   'sort_field' => $this->input->post('sortby') 

				);

				$this->session->set_userdata($newdata);

			} else {

				$newdata = array(

					   'download_key'  => '',

					   'download_field' => '',

					   'download_category_id'  => '',

					   'order_field' => '',

					   'sort_field' =>''

				);

				$this->session->unset_userdata($newdata);

			}

			redirect('admin/reports/lists/');

		}

		

		if(isset($_POST['enable']) && $this->input->post('enable')=='Enable'){ $status='Y';$data=array('status'=>$status);}

		if(isset($_POST['disable']) && $this->input->post('disable')=='Disable'){ $status='N';$data=array('status'=>$status);}

		if(isset($_POST['featured']) && $this->input->post('featured')=='Featured'){ $status='Y';$data=array('featured'=>$status);}

		if(isset($_POST['normal']) && $this->input->post('normal')=='Regular'){ $status='N';$data=array('featured'=>$status);}

		if(isset($status) && isset($_POST['id'])){

			foreach($ids as $id):

				$loginid=$this->reports_model->update($data,array(),$id);	

				$flashmsg = 'Reports updated Successfully.';	

			endforeach;			

		}

		if(isset($_POST['sortsave']) && $this->input->post('sortsave')=='Save' && count($sort_orders)>0){

			foreach($sort_orders as $id => $sort_order):

				$data=array('sort_order'=>$sort_order);

				$loginid=$this->reports_model->update($data,array(),$id);	

				$flashmsg = 'Reports updated Successfully.';	

			endforeach;			

		}

		if(isset($_POST['delete']) && $ids){			

			foreach($ids as $id):

				$loginid=$this->reports_model->delete($id);

				$flashmsg = 'Downloads deleted Successfully.';				

			endforeach;

		}

		if($loginid){

			$this->session->set_flashdata('message', '<div class="n_ok flash_messages"><p>'.$flashmsg.'</p></div>');

		} else {

			$this->session->set_flashdata('message', '<div class="n_error flash_messages"><p>Error!! - Report not updated.</p></div>');

		}

		redirect('admin/reports/lists/'.$this->input->post('return'));

	}

	

	public function categories()

	{

		$this->load->library('pagination');

		$main['page_title']=$this->config->item('site_name').' - Report Categories';

		$main['header']=$this->adminheader();

		$main['footer']=$this->adminfooter();

		$main['left']=$this->adminleftmenu();

		$config['base_url'] = site_url('admin/reports/categories/');

		$config['total_rows'] = $this->reportcategory_model->get_pagination_count();

		$config['per_page'] = '10';

		$config['uri_segment'] = 4;

		$config['first_link'] = 'First';

		$config['last_link'] = 'Last';

		$config['cur_tag_open'] = '<span>';

		$config['cur_tag_close'] = '</span>';

		$this->pagination->initialize($config);

		$content['downloads']=$this->reportcategory_model->get_pagination($config['per_page'],$this->uri->segment($config['uri_segment']));

		$main['content']=$this->load->view('admin/reports/category/lists',$content,true);

		$this->load->view('admin/main',$main);

	}

	

	function addcategory()

	{

		$this->form_validation->set_rules('name', 'Name', 'required');

		$this->form_validation->set_rules('status', 'Status', 'required');

		$this->form_validation->set_message('required', 'required');

		$this->form_validation->set_error_delimiters('<span class="red">(', ')</span>');

		if ($this->form_validation->run() == FALSE)

		{

			$main['page_title']=$this->config->item('site_name').' - Download Categories';

			$main['header']=$this->adminheader();

			$main['footer']=$this->adminfooter();

			$main['left']=$this->adminleftmenu();

			$main['content']=$this->load->view('admin/reports/category/add','',true);

			$this->load->view('admin/main',$main);

		} else {

			$maindata=array('status'=>$this->input->post('status'));

			$descdata=array('name'=>$this->input->post('name'));

			$insertid=$this->reportcategory_model->insert($maindata,$descdata);

			if($insertid){

				$this->session->set_flashdata('message', '<div class="n_ok flash_messages"><p>Report category added Successfully.</p></div>');

				redirect('admin/reports/categories');

			} else {

				$this->session->set_flashdata('message', '<div class="n_error flash_messages"><p>Error!! - Report category not added.</p></div>');

				redirect('admin/reports/categories');

			}

		}

	}

	

	function editcategory($id,$return)

	{

		$this->form_validation->set_rules('name', 'Name', 'required');

		$this->form_validation->set_rules('status', 'Status', 'required');

		$this->form_validation->set_message('required', 'required');

		$this->form_validation->set_error_delimiters('<span class="red">(', ')</span>');

		if ($this->form_validation->run() == FALSE)

		{

			$main['page_title']=$this->config->item('site_name').' - Download Categories';

			$main['header']=$this->adminheader();

			$main['footer']=$this->adminfooter();

			$main['left']=$this->adminleftmenu();

			$edit['return']=$return;

			$edit['download']= $this->reportcategory_model->load($id);

			$main['content']=$this->load->view('admin/reports/category/edit',$edit,true);

			$this->load->view('admin/main',$main);

		} else {

			$maindata=array('status'=>$this->input->post('status'));

			$descdata=array('name'=>$this->input->post('name'));

			$loginid=$this->reportcategory_model->update($maindata,$descdata,$id);

			if($loginid){

				$this->session->set_flashdata('message', '<div class="n_ok flash_messages"><p>Report category updated Successfully.</p></div>');

				redirect('admin/reports/categories/'.$return);

			} else {

				$this->session->set_flashdata('message', '<div class="n_error flash_messages"><p>Error!! - Report category not updated.</p></div>');

				redirect('admin/reports/categories/'.$return);

			}

		}

	}

	function deletecategory($id,$return)

	{

		$loginid=$this->reportcategory_model->delete($id);

		if($loginid){

			$this->session->set_flashdata('message', '<div class="n_ok flash_messages"><p>Report category deleted Successfully.</p></div>');

			redirect('admin/reports/categories/'.$return);

		} else {

			$this->session->set_flashdata('message', '<div class="n_error flash_messages"><p>Error!! - Report category not deleted.</p></div>');

			redirect('admin/reports/categories/'.$return);

		}

	}

	

	function categoryactions()

	{

		$loginid=false;

		$ids=$this->input->post('id');

		$sort_orders=$this->input->post('sort_order');

		if(isset($_POST['enable']) && $this->input->post('enable')=='Enable'){ $status='Y';}

		if(isset($_POST['disable']) && $this->input->post('disable')=='Disable'){ $status='N';}

		if(isset($status) && isset($_POST['id'])){

			foreach($ids as $id):

				$data=array('status'=>$status);

				$loginid=$this->reportcategory_model->update($data,array(),$id);				

			endforeach;

		}

		if(isset($_POST['sortsave']) && $this->input->post('sortsave')=='Save' && count($sort_orders)>0){

			foreach($sort_orders as $id => $sort_order):

				$data=array('sort_order'=>$sort_order);

				$loginid=$this->reportcategory_model->update($data,array(),$id);				

			endforeach;			

		}

		if($loginid){

			$this->session->set_flashdata('message', '<div class="n_ok flash_messages"><p>Report category updated Successfully.</p></div>');

		} else {

			$this->session->set_flashdata('message', '<div class="n_error flash_messages"><p>Error!! - Report category not updated.</p></div>');

		}

		if(isset($_POST['delete']) && $ids){			

			foreach($ids as $id):

				$loginid=$this->reportcategory_model->delete($id);				

			endforeach;

			if($loginid){

				$this->session->set_flashdata('message', '<div class="n_ok flash_messages"><p>Report category Deleted Successfully.</p></div>');

			} 

		}

		redirect('admin/reports/categories/'.$this->input->post('return'));

	}

	

}

/* End of file downloads.php */

/* Location: ./application/controllers/admin/downloads.php */