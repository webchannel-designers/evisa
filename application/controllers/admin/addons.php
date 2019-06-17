<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Addons extends Web_Controller {

	function __construct()

    {

		// Call the Model constructor

		parent::__construct();

		if(!$this->session->userdata('admin_logged_in'))

		{

		   redirect('admin/login');		

		}

		$this->load->model('servicecategory_model');
		
		$this->load->model('makes_model');
		
		$this->load->model('model_model');
		
		$this->load->model('location_model');

		$this->load->model('addons_model');	

		$this->load->model('widgets_model');
		$this->load->model('company_model');
		
		$this->load->model('types_model');	

	}

		

	public function index()

	{

		redirect('admin/addons/lists');		

	}

	

	public function lists($id)

	{
	    $cond=array('company_id'=>$id);

		$this->load->library('pagination');

		$main['page_title']=$this->config->item('site_name').' - Products';

		$main['header']=$this->adminheader();

		$main['footer']=$this->adminfooter();

		$main['left']=$this->adminleftmenu();

		$config['base_url'] = site_url('admin/addons/lists/');

		$config['total_rows'] = $this->addons_model->get_pagination_count($cond);

		$config['per_page'] = '50';

		$config['uri_segment'] =  5;

		$config['first_link'] = 'First';

		$config['last_link'] = 'Last';

		$config['cur_tag_open'] = '<span>';

		$config['cur_tag_close'] = '</span>';

		$this->pagination->initialize($config);

		$content['contentfields'] = $this->addons_model->get_fields();

		$content['sortorders'] = array('asc'=>'Ascending','desc'=>'Descending');
		
		$content['contentcats'] = $this->servicecategory_model->get_array();
		
		$content['contents']=$this->addons_model->get_pagination($config['per_page'],$this->uri->segment($config['uri_segment']),$cond,NULL,'sort_order ASC');
				
		$content['categories']=$this->servicecategory_model->get_idpair();
		
		$main['content']=$this->load->view('admin/addons/lists',$content,true);

		$this->load->view('admin/main',$main);

	}

	function add()

	{		
		$this->form_validation->set_rules('title', 'Title', 'required');	
		$this->form_validation->set_rules('price', 'price', 'required');		
		$this->form_validation->set_rules('company_id', 'Company', 'required');
		$this->form_validation->set_message('required', 'required');
		$this->form_validation->set_error_delimiters('<span class="red">(', ')</span>');

		if ($this->form_validation->run() == FALSE)

		{

			$main['page_title']=$this->config->item('site_name').' - Products';

			$main['header']=$this->adminheader();

			$main['footer']=$this->adminfooter();

			$main['left']=$this->adminleftmenu();

			
			$add['companies']=$this->company_model->get_array();
			
			//$add['suppliers'] = $this->types_model->get_active();
			
			//$add['makes'] = $this->makes_model->get_active();
			
			//$add['models'] = $this->model_model->get_active();
			
			//$add['locations'] = $this->location_model->get_active();

			$add['widgets']=$this->widgets_model->get_rightwidgets();

			$main['content']=$this->load->view('admin/addons/add',$add,true);

			$this->load->view('admin/main',$main);

		} else {			

		
			$maindata=array('name'=>$this->input->post('title'),'status'=>$this->input->post('status'),'company_id'=>$this->input->post('company_id'),'price'=>$this->input->post('price'));		

			$insertid=$this->addons_model->insert($maindata,$descdata);

			if($insertid){

				$this->session->set_flashdata('message', '<div class="n_ok flash_messages"><p>Addon added Successfully.</p></div>');

				redirect('admin/addons/add');

			} else {

				$this->session->set_flashdata('message', '<div class="n_error flash_messages"><p>Error!! - Addon not added.</p></div>');

				redirect('admin/addons/add');

			}

		}

	}

	function load_model()
	{
		$add['models']=$this->model_model->load_model($this->input->post('make'));
		$add['mode']=$this->input->post('model');
		$this->load->view('admin/addons/model',$add);//print_r($models);
	}
	
	function load_make()
	{
		
		$add['makes']=$this->makes_model->get_active($this->input->post('category_id'));
		$add['mode']=$this->input->post('make_id');
		$this->load->view('admin/addons/make',$add);			//print_r($models);
	}
	
	function load_type()
	{
		$add['types']=$this->types_model->get_active($this->input->post('type'));
		$add['mode']=$this->input->post('model');
		$this->load->view('frontend/register/type',$add);//print_r($models);
	}

	function edit($id,$return)

	{

		

		$this->form_validation->set_rules('title', 'Title', 'required');	
		$this->form_validation->set_rules('price', 'price', 'required');		
		$this->form_validation->set_rules('company_id', 'Company', 'required');
		$this->form_validation->set_message('required', 'required');
		$this->form_validation->set_error_delimiters('<span class="red">(', ')</span>');

		$this->form_validation->set_message('required', 'required');

		$this->form_validation->set_error_delimiters('<span class="red">(', ')</span>');

		if ($this->form_validation->run() == FALSE)

		{

			$main['page_title']=$this->config->item('site_name').' - Contents';

			$main['header']=$this->adminheader();

			$main['footer']=$this->adminfooter();

			$main['left']=$this->adminleftmenu();

			$edit['return']=$return;	
			$edit['companies']=$this->company_model->get_array();

			$edit['content']= $this->addons_model->load($id);

			$edit['widgets']=$this->widgets_model->get_rightwidgets();

			$main['content']=$this->load->view('admin/addons/edit',$edit,true);

			$this->load->view('admin/main',$main);

		} else {

			
			$maindata=array('name'=>$this->input->post('title'),'status'=>$this->input->post('status'),'company_id'=>$this->input->post('company_id'),'price'=>$this->input->post('price'));
		
			$config['upload_path'] = 'public/uploads/products';			

			$loginid=$this->addons_model->update($maindata,$id);

			if($loginid){

				$this->session->set_flashdata('message', '<div class="n_ok flash_messages"><p>Addons updated Successfully.</p></div>');

				redirect('admin/addons/lists/'.$return);

			} else {

				$this->session->set_flashdata('message', '<div class="n_error flash_messages"><p>Error!! - Addons not updated.</p></div>');

				redirect('admin/addons/lists/'.$return);

			}

		}

	}

	function get_editwidgets($productrow,$new_widgets){

		    $cur_widgets=array();

			$cur_widgets_sort=array();

			$higest_sort=0;

			if($productrow->widgets!=''){								

				$current_widgets= explode(',',$productrow->widgets);

				foreach($current_widgets as $current_widget):

					$cur_arr=explode(':',$current_widget);

					$cur_widgets[]=$cur_arr['0'];

					$cur_widgets_sort[$cur_arr['0']]=$cur_arr['1'];

					if($higest_sort<$cur_arr['1']){

						$higest_sort=$cur_arr['1'];

					}

				endforeach;

				$widgets=array();

				if($new_widgets!=''){	

					foreach($new_widgets as $widgetrow):

						if(isset($cur_widgets_sort[$widgetrow])){

							$neworder=$cur_widgets_sort[$widgetrow];

						} else {

							$neworder=$higest_sort+1;

						}

						$widgets[]=$widgetrow.':'.$neworder;

					endforeach;

					$widgets=implode(',',$widgets);

					}else{

					$widgets='';	

				}

			}else{

				$i=0;

				$widgets=array();

				if($new_widgets) foreach($new_widgets as $widgetrow): $i++;

					$widgets[]=$widgetrow.':'.$i;

				endforeach;

				$widgets=implode(',',$widgets);

			}

			return $widgets;

	}

	

	public function contentwidgets($id)

	{

		$main['page_title']=$this->config->item('site_name').' - content Widgets';

		$main['header']=$this->adminheader();

		$main['footer']=$this->adminfooter();

		$main['left']=$this->adminleftmenu();

		$cond=array('id'=>$id);				

		$content['content'] = $this->addons_model->get_row_cond($cond);				

		$content['widgets'] = $this->widgets_model->get_idpair();		

		$main['content']=$this->load->view('admin/addons/content/widget/lists',$content,true);

		$this->load->view('admin/main',$main);

	}

	

	function widgetactions($contentid)

	{

		$loginid=false;		

		$sort_orders=$this->input->post('sort_order');		

		if(isset($_POST['sortsave']) && $this->input->post('sortsave')=='Save' && count($sort_orders)>0){

			foreach($sort_orders as $id => $val):

				$sort_order[]=	$id.':'.$val;							

			endforeach;

			$sort_order=implode(',',$sort_order);

			$data=array('widgets'=>$sort_order);

			$loginid=$this->addons_model->update($data,array(),$contentid);			

		}		

		if($loginid){

			$this->session->set_flashdata('message', '<div class="n_ok flash_messages"><p>content updated Successfully.</p></div>');

		} else {

			$this->session->set_flashdata('message', '<div class="n_error flash_messages"><p>Error!! - content not updated.</p></div>');

		}

		redirect('admin/addons/lists/'.$this->input->post('return'));

	}

	function delete($id,$return)

	{

		$loginid=$this->addons_model->delete($id);

		if($loginid){

			$this->session->set_flashdata('message', '<div class="n_ok flash_messages"><p>Content deleted Successfully.</p></div>');

			redirect('admin/addons/lists/'.$return);

		} else {

			$this->session->set_flashdata('message', '<div class="n_error flash_messages"><p>Error!! - Content not deleted.</p></div>');

			redirect('admin/addons/lists/'.$return);

		}

	}

	

	function actions()

	{

		$ids=$this->input->post('id');
		
		$sort_orders=$this->input->post('orderby');

		$loginid=false;
		
		if(isset($_POST['sortsave']) && $this->input->post('sortsave')=='Save' && count($sort_orders)>0){

			foreach($sort_orders as $id => $sort_order):

				$data=array('sort_order'=>$sort_order);

				$loginid=$this->addons_model->update($data,array(),$id);				

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

			redirect('admin/addons/lists/');

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

			redirect('admin/addons/lists/');

		}

		if(isset($_POST['enable']) && $this->input->post('enable')=='Enable'){ $status='Y';}
		
		if(isset($_POST['featured']) && $this->input->post('featured')=='Featured'){ $fstatus='Y';}
		
		if(isset($_POST['unfeatured']) && $this->input->post('unfeatured')=='UnFeatured'){ $fstatus='N';}

		if(isset($_POST['disable']) && $this->input->post('disable')=='Disable'){ $status='N';}

		if(isset($status) && $ids){

			foreach($ids as $id):

				$data=array('status'=>$status);

				$loginid=$this->addons_model->update($data,array(),$id);				

			endforeach;

			if($loginid){

				$this->session->set_flashdata('message', '<div class="n_ok flash_messages"><p>Product updated Successfully.</p></div>');

			} 

		}
		
		if(isset($fstatus) && $ids){

			foreach($ids as $id):

				$data=array('featured'=>$fstatus);

				$loginid=$this->addons_model->update($data,array(),$id);				

			endforeach;

			if($loginid){

				$this->session->set_flashdata('message', '<div class="n_ok flash_messages"><p>Product updated Successfully.</p></div>');

			} 

		}
		

		if(isset($_POST['delete']) && $ids){			

			foreach($ids as $id):

				$loginid=$this->addons_model->delete($id);				

			endforeach;

			if($loginid){

				$this->session->set_flashdata('message', '<div class="n_ok flash_messages"><p>Content Deleted Successfully.</p></div>');

			} 

		}

		if(!$loginid){

			$this->session->set_flashdata('message', '<div class="n_error flash_messages"><p>Error!! - Content not updated.</p></div>');

		}

		redirect('admin/addons/lists/'.$this->input->post('return'));

	}

	

	function code_exists($code)

	{

		$id= $this->input->post('id');

		if ($this->addons_model->code_exists($code,$id))

		{

			$this->form_validation->set_message('code_exists', 'already exists');

			return FALSE;

		}

		else

		{

			return TRUE;

		}

	}

	

	public function categories()

	{

		$this->load->library('pagination');

		$main['page_title']=$this->config->item('site_name').' - Content Categories';

		$main['header']=$this->adminheader();

		$main['footer']=$this->adminfooter();

		$main['left']=$this->adminleftmenu();

		$config['base_url'] = site_url('admin/addons/categories/');

		$config['total_rows'] = $this->servicecategory_model->get_pagination_count();

		$config['per_page'] = '10';

		$config['uri_segment'] = 4;

		$config['first_link'] = 'First';

		$config['last_link'] = 'Last';

		$config['cur_tag_open'] = '<span>';

		$config['cur_tag_close'] = '</span>';

		$this->pagination->initialize($config);

		$content['contents']=$this->servicecategory_model->get_pagination($config['per_page'],$this->uri->segment($config['uri_segment']));

		$content['categories']=$this->servicecategory_model->get_idpair();

		$main['content']=$this->load->view('admin/addons/category/lists',$content,true);

		$this->load->view('admin/main',$main);

	}

	

	function addcategory()
	{
		$this->load->library('ckeditor');
		$this->load->library('ckfinder');
		$this->ckeditor->basePath = base_url('public/admin/ckeditor/');

		$this->ckeditor->config['language'] = 'en';

		$this->ckeditor->config['width'] = '100%';

		$this->ckeditor->config['height'] = '200px';

		//Add Ckfinder to Ckeditor

		$this->ckfinder->SetupCKEditor($this->ckeditor,base_url('public/admin/ckfinder/'));
		$this->form_validation->set_rules('parent_id', 'parent', 'required');

		$this->form_validation->set_rules('name', 'Name', 'required');

		$this->form_validation->set_rules('short_desc', 'Short Desc', '');
		$this->form_validation->set_rules('desc', 'Description', 'required');

		$this->form_validation->set_rules('keywords', 'Keywords', '');

		$this->form_validation->set_rules('breadcrumb_status', 'Breadcrumb Status', 'required');

		$this->form_validation->set_rules('status', 'Status', 'required');

		$this->form_validation->set_message('required', 'required');

		$this->form_validation->set_error_delimiters('<span class="red">(', ')</span>');

		if ($this->form_validation->run() == FALSE)

		{

			$main['page_title']=$this->config->item('site_name').' - Content Categories';

			$main['header']=$this->adminheader();

			$main['footer']=$this->adminfooter();

			$main['left']=$this->adminleftmenu();

			$add['widgets']=$this->widgets_model->get_rightwidgets();

			$add['contentcats'] = $this->servicecategory_model->get_array();

			$main['content']=$this->load->view('admin/addons/category/add',$add,true);

			$this->load->view('admin/main',$main);

		} else {
		
		
		$content_image='';

			$config['upload_path'] = 'public/uploads/products';

			$config['allowed_types'] = 'gif|jpg|png';
			$this->load->library('upload', $config);
			$this->upload->initialize($config); 

				if($this->upload->do_upload('image'))

			{

				$contentimagedata=$this->upload->data();

				@$content_image=$contentimagedata['file_name'];

			}
			$config['allowed_types'] = 'pdf|doc';
			 
			$this->load->library('upload', $config);
			$this->upload->initialize($config);
				if($this->upload->do_upload('pdf'))

			{

				$contentpdfdata=$this->upload->data();

				@$content_pdf=$contentpdfdata['file_name'];

			}

				$i=0;

			$widgets=array();

			if($this->input->post('widgets'))

			foreach($this->input->post('widgets') as $widgetrow): $i++;

				$widgets[]=$widgetrow.':'.$i;

			endforeach;

			$widgets=implode(',',$widgets);	

			$slug=$this->servicecategory_model->create_slug($this->input->post('name'));

			$maindata=array('parent_id'=>$this->input->post('parent_id'),'status'=>$this->input->post('status'),'breadcrumb_status'=>$this->input->post('breadcrumb_status'),'slug'=>$slug,'widgets'=>$widgets);

			$descdata=array('name'=>$this->input->post('name'),'short_desc'=>$this->input->post('short_desc'),'desc'=>$this->input->post('desc'),'image'=>$content_image,'pdf'=>@$content_pdf,'keywords'=>$this->input->post('keywords'));

			$insertid=$this->servicecategory_model->insert($maindata,$descdata);

			if($insertid){

				$this->session->set_flashdata('message', '<div class="n_ok flash_messages"><p>Product category added Successfully.</p></div>');

				redirect('admin/addons/categories');

			} else {

				$this->session->set_flashdata('message', '<div class="n_error flash_messages"><p>Error!! - Product category not added.</p></div>');

				redirect('admin/addons/categories');

			}

		}

	}

	

	function editcategory($id,$return)

	{
		$this->load->library('ckeditor');
		$this->load->library('ckfinder');
		$this->ckeditor->basePath = base_url('public/admin/ckeditor/');

		$this->ckeditor->config['language'] = 'en';

		$this->ckeditor->config['width'] = '100%';

		$this->ckeditor->config['height'] = '200px';

		//Add Ckfinder to Ckeditor

		$this->ckfinder->SetupCKEditor($this->ckeditor,base_url('public/admin/ckfinder/'));
		$this->form_validation->set_rules('parent_id', 'parent', 'required');

		$this->form_validation->set_rules('name', 'Name', 'required');

		$this->form_validation->set_rules('short_desc', 'Short Desc', '');
		$this->form_validation->set_rules('desc', 'Description', 'required');

		$this->form_validation->set_rules('keywords', 'Keywords', '');

		$this->form_validation->set_rules('breadcrumb_status', 'Breadcrumb Status', 'required');

		$this->form_validation->set_rules('slug', 'Url Slug', 'required|callback_catcode_exists');

		$this->form_validation->set_rules('status', 'Status', 'required');

		$this->form_validation->set_message('required', 'required');

		$this->form_validation->set_error_delimiters('<span class="red">(', ')</span>');

		if ($this->form_validation->run() == FALSE)

		{

			$main['page_title']=$this->config->item('site_name').' - Content Categories';

			$main['header']=$this->adminheader();

			$main['footer']=$this->adminfooter();

			$main['left']=$this->adminleftmenu();

			$edit['return']=$return;

			$edit['content']= $this->servicecategory_model->load($id);

			$edit['widgets']=$this->widgets_model->get_rightwidgets();

			$edit['contentcats'] = $this->servicecategory_model->get_array();

			$main['content']=$this->load->view('admin/addons/category/edit',$edit,true);

			$this->load->view('admin/main',$main);

		} else {

			$new_widgets=$this->input->post('widgets');

			$categoryrow=$this->servicecategory_model->load($id);

			$widgets=$this->get_editwidgets($categoryrow,$new_widgets);	

			$slug=$this->servicecategory_model->update_slug($this->input->post('slug'),$id);

			$maindata=array('parent_id'=>$this->input->post('parent_id'),'status'=>$this->input->post('status'),'breadcrumb_status'=>$this->input->post('breadcrumb_status'),'slug'=>$slug,'widgets'=>$widgets);

			$descdata=array('name'=>$this->input->post('name'),'short_desc'=>$this->input->post('short_desc'),'desc'=>$this->input->post('desc'),'keywords'=>$this->input->post('keywords'));
			
			$config['upload_path'] = 'public/uploads/products';

			$config['allowed_types'] = 'gif|jpg|png';

			$this->load->library('upload', $config);
			$this->upload->initialize($config); 

			
			if($this->upload->do_upload('image'))

			{

				$contentimagedata=$this->upload->data();

				$descdata['image']=$contentimagedata['file_name'];

			}
			$config['allowed_types'] = 'pdf|doc';
			
			$this->load->library('upload', $config);
			$this->upload->initialize($config); 
			if($this->upload->do_upload('pdf'))

			{

				$contentpdfdata=$this->upload->data();

				$descdata['pdf']=$contentpdfdata['file_name'];

			}

			$loginid=$this->servicecategory_model->update($maindata,$descdata,$id);

			if($loginid){

				$this->session->set_flashdata('message', '<div class="n_ok flash_messages"><p>Product category updated Successfully.</p></div>');

				redirect('admin/addons/categories/'.$return);

			} else {

				$this->session->set_flashdata('message', '<div class="n_error flash_messages"><p>Error!! - Product category not updated.</p></div>');

				redirect('admin/addons/categories/'.$return);

			}

		}

	}

	public function categorywidgets($id)

	{

		$main['page_title']=$this->config->item('site_name').' - product Widgets';

		$main['header']=$this->adminheader();

		$main['footer']=$this->adminfooter();

		$main['left']=$this->adminleftmenu();

		$cond=array('id'=>$id);				

		$content['category'] = $this->servicecategory_model->get_row_cond($cond);				

		$content['widgets'] = $this->widgets_model->get_idpair();		

		$main['content']=$this->load->view('admin/addons/category/widget/lists',$content,true);

		$this->load->view('admin/main',$main);

	}

	

	function categorywidgetactions($categoryid)

	{

		$loginid=false;		

		$sort_orders=$this->input->post('sort_order');		

		if(isset($_POST['sortsave']) && $this->input->post('sortsave')=='Save' && count($sort_orders)>0){

			foreach($sort_orders as $id => $val):

				$sort_order[]=	$id.':'.$val;							

			endforeach;

			$sort_order=implode(',',$sort_order);

			$data=array('widgets'=>$sort_order);

			$loginid=$this->servicecategory_model->update($data,array(),$categoryid);			

		}		

		if($loginid){

			$this->session->set_flashdata('message', '<div class="n_ok flash_messages"><p>Product updated Successfully.</p></div>');

		} else {

			$this->session->set_flashdata('message', '<div class="n_error flash_messages"><p>Error!! - Product not updated.</p></div>');

		}

		redirect('admin/addons/lists/'.$this->input->post('return'));

	}

	

	function deletecategory($id,$return)

	{

		$loginid=$this->servicecategory_model->delete($id);

		if($loginid){

			$this->session->set_flashdata('message', '<div class="n_ok flash_messages"><p>Product category deleted Successfully.</p></div>');

			redirect('admin/addons/categories/'.$return);

		} else {

			$this->session->set_flashdata('message', '<div class="n_error flash_messages"><p>Error!! - Product category not deleted.</p></div>');

			redirect('admin/addons/categories/'.$return);

		}

	}

	

	function categoryactions()

	{

		$ids=$this->input->post('id');

		$loginid=false;

		if(isset($_POST['enable']) && $this->input->post('enable')=='Enable'){ $status='Y';}

		if(isset($_POST['disable']) && $this->input->post('disable')=='Disable'){ $status='N';}
		
		if(isset($_POST['featured']) && $this->input->post('featured')=='Featured'){ $fstatus='Y';}
		
		if(isset($_POST['unfeatured']) && $this->input->post('unfeatured')=='UnFeatured'){ $fstatus='N';}

		if(isset($status) && $ids ){

			foreach($ids as $id):

				$data=array('status'=>$status);

				$loginid=$this->servicecategory_model->update($data,array(),$id);				

			endforeach;

			if($loginid){

				$this->session->set_flashdata('message', '<div class="n_ok flash_messages"><p>Product category updated Successfully.</p></div>');

			} else {

				$this->session->set_flashdata('message', '<div class="n_error flash_messages"><p>Error!! - Product category not updated.</p></div>');

			}

		}
		
		
		if(isset($fstatus) && $ids){

			foreach($ids as $id):

				$data=array('featured'=>$fstatus);

				$loginid=$this->servicecategory_model->update($data,array(),$id);				

			endforeach;
			

			if($loginid){

				$this->session->set_flashdata('message', '<div class="n_ok flash_messages"><p>Product updated Successfully.</p></div>');

			} 

		}
		

		

		if(isset($_POST['delete']) && $ids){			

			foreach($ids as $id):

				$loginid=$this->servicecategory_model->delete($id);				

			endforeach;

			if($loginid){

				$this->session->set_flashdata('message', '<div class="n_ok flash_messages"><p>Product category Deleted Successfully.</p></div>');

			} 

		}

		redirect('admin/addons/categories/'.$this->input->post('return'));

	}

	

	function catcode_exists($code)

	{

		$id= $this->input->post('id');

		if ($this->servicecategory_model->code_exists($code,$id))

		{

			$this->form_validation->set_message('catcode_exists', 'already exists');

			return FALSE;

		}

		else

		{

			return TRUE;

		}

	}

	

	

}

/* End of file products.php */

/* Location: ./application/controllers/admin/products.php */