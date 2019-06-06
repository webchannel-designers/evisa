<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contents extends Web_Controller {

	function __construct()

    {

		// Call the Model constructor

		parent::__construct();

		if(!$this->session->userdata('admin_logged_in'))

		{

		   redirect('admin/login');		

		}

		$this->load->model('contentcategory_model');

		$this->load->model('contents_model');	

		$this->load->model('widgets_model');

	}

		

	public function index()

	{

		redirect('admin/contents/lists');		

	}

	

	public function lists()

	{

		$this->load->library('pagination');

		$main['page_title']=$this->config->item('site_name').' - Contents';

		$main['header']=$this->adminheader();

		$main['footer']=$this->adminfooter();

		$main['left']=$this->adminleftmenu();

		$config['base_url'] = site_url('admin/contents/lists/');

		$config['total_rows'] = $this->contents_model->get_pagination_count();

		$config['per_page'] = '50';

		$config['uri_segment'] = 4;

		$config['first_link'] = 'First';

		$config['last_link'] = 'Last';

		$config['cur_tag_open'] = '<span>';

		$config['cur_tag_close'] = '</span>';

		$this->pagination->initialize($config);

		$content['contentfields'] = $this->contents_model->get_fields();

		$content['sortorders'] = array('asc'=>'Ascending','desc'=>'Descending');

		$content['contentcats'] = $this->contentcategory_model->get_array();

		$content['contents']=$this->contents_model->get_pagination($config['per_page'],$this->uri->segment($config['uri_segment']));

		$content['categories']=$this->contentcategory_model->get_idpair();

		$main['content']=$this->load->view('admin/contents/content/lists',$content,true);

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

		$this->form_validation->set_rules('short_desc', 'Short Description', 'required');

		$this->form_validation->set_rules('keywords', 'Keywords', '');

		$this->form_validation->set_rules('desc', 'Description', 'required');

		$this->form_validation->set_rules('meta_desc', 'Meta Description', '');

		$this->form_validation->set_rules('category_id', 'Category', 'required');

		$this->form_validation->set_rules('status', 'Status', 'required');

		$this->form_validation->set_message('required', 'required');

		$this->form_validation->set_error_delimiters('<span class="red">(', ')</span>');

		if ($this->form_validation->run() == FALSE)

		{

			$main['page_title']=$this->config->item('site_name').' - Contents';

			$main['header']=$this->adminheader();

			$main['footer']=$this->adminfooter();

			$main['left']=$this->adminleftmenu();

			$add['contentcats'] = $this->contentcategory_model->get_array();

			$add['widgets']=$this->widgets_model->get_rightwidgets();

			$main['content']=$this->load->view('admin/contents/content/add',$add,true);

			$this->load->view('admin/main',$main);

		} else {

			

			$banner_image='';

			$content_image='';

			$config['upload_path'] = 'public/uploads/contents';

			$config['allowed_types'] = 'gif|jpg|png|pdf';

			$this->load->library('upload', $config);

			if($this->upload->do_upload('banner_image'))

			{

				$banner_imagedata=$this->upload->data();

				$banner_image=$banner_imagedata['file_name'];

			}

			if($this->upload->do_upload('image'))

			{

				$contentimagedata=$this->upload->data();

				$content_image=$contentimagedata['file_name'];

			}

			$i=0;

			$widgets=array();

			if($this->input->post('widgets'))

			foreach($this->input->post('widgets') as $widgetrow): $i++;

				$widgets[]=$widgetrow.':'.$i;

			endforeach;

			$widgets=implode(',',$widgets);

			$slug=$this->contents_model->create_slug($this->input->post('title'));

			$date_time = date("Y-m-d H:i:s");

			if($this->input->post('date_time')!='')

			{ 

				$date_time = date("Y-m-d H:i:s", strtotime($this->input->post('date_time')));

			}

			$maindata=array('status'=>$this->input->post('status'),'category_id'=>$this->input->post('category_id'),'slug'=>$slug,'widgets'=>$widgets);

			$descdata=array('title'=>$this->input->post('title'),'short_desc'=>$this->input->post('short_desc'),'meta_desc'=>$this->input->post('meta_desc'),'keywords'=>$this->input->post('keywords'),'desc'=>$this->input->post('desc'),'banner_text'=>$this->input->post('banner_text'),'banner_image'=>$banner_image,'image'=>$content_image,'date_time'=>$date_time);

			$insertid=$this->contents_model->insert($maindata,$descdata);

			if($insertid){

				$this->session->set_flashdata('message', '<div class="n_ok flash_messages"><p>Content added Successfully.</p></div>');

				redirect('admin/contents/lists');

			} else {

				$this->session->set_flashdata('message', '<div class="n_error flash_messages"><p>Error!! - Content not added.</p></div>');

				redirect('admin/contents/lists');

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

		$this->form_validation->set_rules('slug', 'Url Slug', 'required|callback_code_exists');

		$this->form_validation->set_rules('short_desc', 'Short Description', 'required');

		$this->form_validation->set_rules('keywords', 'Keywords', '');

		$this->form_validation->set_rules('desc', 'Description', 'required');

		$this->form_validation->set_rules('meta_desc', 'Meta Description', '');

		$this->form_validation->set_rules('category_id', 'Category', 'required');

		$this->form_validation->set_rules('status', 'Status', 'required');

		$this->form_validation->set_message('required', 'required');

		$this->form_validation->set_error_delimiters('<span class="red">(', ')</span>');

		if ($this->form_validation->run() == FALSE)

		{

			$main['page_title']=$this->config->item('site_name').' - Contents';

			$main['header']=$this->adminheader();

			$main['footer']=$this->adminfooter();

			$main['left']=$this->adminleftmenu();

			$edit['return']=$return;

			$edit['contentcats'] = $this->contentcategory_model->get_array();

			$edit['content']= $this->contents_model->load($id);

			$edit['widgets']=$this->widgets_model->get_rightwidgets();

			$main['content']=$this->load->view('admin/contents/content/edit',$edit,true);

			$this->load->view('admin/main',$main);

		} else {

			$new_widgets=$this->input->post('widgets');

			$contentrow=$this->contents_model->load($id);

			$widgets=$this->get_editwidgets($contentrow,$new_widgets);	

			$slug=$this->contents_model->update_slug($this->input->post('slug'),$id);

			$date_time = date("Y-m-d H:i:s");

			if($this->input->post('date_time')!='')

			{ 

				$date_time = date("Y-m-d H:i:s", strtotime($this->input->post('date_time')));

			}

			$maindata=array('status'=>$this->input->post('status'),'category_id'=>$this->input->post('category_id'),'slug'=>$slug,'widgets'=>$widgets);

			$descdata=array('title'=>$this->input->post('title'),'short_desc'=>$this->input->post('short_desc'),'meta_desc'=>$this->input->post('meta_desc'),'keywords'=>$this->input->post('keywords'),'desc'=>$this->input->post('desc'),'banner_text'=>$this->input->post('banner_text'),'date_time'=>$date_time);

			$config['upload_path'] = 'public/uploads/contents';

			$config['allowed_types'] = 'gif|jpg|png|pdf';

			$this->load->library('upload', $config);

			if($this->upload->do_upload('banner_image'))

			{

				$banner_imagedata=$this->upload->data();

				$descdata['banner_image']=$banner_imagedata['file_name'];

			}

			if($this->upload->do_upload('image'))

			{

				$contentimagedata=$this->upload->data();

				$descdata['image']=$contentimagedata['file_name'];

			}

			$loginid=$this->contents_model->update($maindata,$descdata,$id);

			if($loginid){

				$this->session->set_flashdata('message', '<div class="n_ok flash_messages"><p>Content updated Successfully.</p></div>');

				redirect('admin/contents/lists/'.$return);

			} else {

				$this->session->set_flashdata('message', '<div class="n_error flash_messages"><p>Error!! - Content not updated.</p></div>');

				redirect('admin/contents/lists/'.$return);

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

		$content['content'] = $this->contents_model->get_row_cond($cond);				

		$content['widgets'] = $this->widgets_model->get_idpair();		

		$main['content']=$this->load->view('admin/contents/content/widget/lists',$content,true);

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

			$loginid=$this->contents_model->update($data,array(),$contentid);			

		}		

		if($loginid){

			$this->session->set_flashdata('message', '<div class="n_ok flash_messages"><p>content updated Successfully.</p></div>');

		} else {

			$this->session->set_flashdata('message', '<div class="n_error flash_messages"><p>Error!! - content not updated.</p></div>');

		}

		redirect('admin/contents/lists/'.$this->input->post('return'));

	}

	

	

	function delete($id,$return)

	{

		$loginid=$this->contents_model->delete($id);

		if($loginid){

			$this->session->set_flashdata('message', '<div class="n_ok flash_messages"><p>Content deleted Successfully.</p></div>');

			redirect('admin/contents/lists/'.$return);

		} else {

			$this->session->set_flashdata('message', '<div class="n_error flash_messages"><p>Error!! - Content not deleted.</p></div>');

			redirect('admin/contents/lists/'.$return);

		}

	}

	

	function actions()

	{

		$ids=$this->input->post('id');

		$loginid=false;

		if(isset($_POST['reset']) && $this->input->post('reset')=='Reset'){

			$newdata = array(

				   'content_key'  => '',

				   'content_field'  => '',

				   'content_category_id'  => '',

				   'order_field'=>'',

				   'sort_field' =>''

			);

			$this->session->unset_userdata($newdata);

			redirect('admin/contents/lists/');

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

			redirect('admin/contents/lists/');

		}

		if(isset($_POST['enable']) && $this->input->post('enable')=='Enable'){ $status='Y';}

		if(isset($_POST['disable']) && $this->input->post('disable')=='Disable'){ $status='N';}

		if(isset($status) && $ids){

			foreach($ids as $id):

				$data=array('status'=>$status);

				$loginid=$this->contents_model->update($data,array(),$id);				

			endforeach;

			if($loginid){

				$this->session->set_flashdata('message', '<div class="n_ok flash_messages"><p>Content updated Successfully.</p></div>');

			} 

		}

		if(isset($_POST['delete']) && $ids){			

			foreach($ids as $id):

				$loginid=$this->contents_model->delete($id);				

			endforeach;

			if($loginid){

				$this->session->set_flashdata('message', '<div class="n_ok flash_messages"><p>Content Deleted Successfully.</p></div>');

			} 

		}

		if(!$loginid){

			$this->session->set_flashdata('message', '<div class="n_error flash_messages"><p>Error!! - Content not updated.</p></div>');

		}

		redirect('admin/contents/lists/'.$this->input->post('return'));

	}

	

	function code_exists($code)

	{

		$id= $this->input->post('id');

		if ($this->contents_model->code_exists($code,$id))

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

		$config['base_url'] = site_url('admin/contents/categories/');

		$config['total_rows'] = $this->contentcategory_model->get_pagination_count();

		$config['per_page'] = '10';

		$config['uri_segment'] = 4;

		$config['first_link'] = 'First';

		$config['last_link'] = 'Last';

		$config['cur_tag_open'] = '<span>';

		$config['cur_tag_close'] = '</span>';

		$this->pagination->initialize($config);

		$content['contents']=$this->contentcategory_model->get_pagination($config['per_page'],$this->uri->segment($config['uri_segment']));

		$content['categories']=$this->contentcategory_model->get_idpair();

		$main['content']=$this->load->view('admin/contents/category/lists',$content,true);

		$this->load->view('admin/main',$main);

	}

	

	function addcategory()

	{

		$this->form_validation->set_rules('parent_id', 'parent', 'required');

		$this->form_validation->set_rules('name', 'Name', 'required');

		$this->form_validation->set_rules('short_desc', 'Short Desc', '');

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

			$add['contentcats'] = $this->contentcategory_model->get_array();

			$main['content']=$this->load->view('admin/contents/category/add',$add,true);

			$this->load->view('admin/main',$main);

		} else {

				$i=0;

			$widgets=array();

			if($this->input->post('widgets'))

			foreach($this->input->post('widgets') as $widgetrow): $i++;

				$widgets[]=$widgetrow.':'.$i;

			endforeach;

			$widgets=implode(',',$widgets);	

			$slug=$this->contentcategory_model->create_slug($this->input->post('name'));

			$maindata=array('parent_id'=>$this->input->post('parent_id'),'status'=>$this->input->post('status'),'breadcrumb_status'=>$this->input->post('breadcrumb_status'),'slug'=>$slug,'widgets'=>$widgets);

			$descdata=array('name'=>$this->input->post('name'),'short_desc'=>$this->input->post('short_desc'),'keywords'=>$this->input->post('keywords'));

			$insertid=$this->contentcategory_model->insert($maindata,$descdata);

			if($insertid){

				$this->session->set_flashdata('message', '<div class="n_ok flash_messages"><p>Content category added Successfully.</p></div>');

				redirect('admin/contents/categories');

			} else {

				$this->session->set_flashdata('message', '<div class="n_error flash_messages"><p>Error!! - Content category not added.</p></div>');

				redirect('admin/contents/categories');

			}

		}

	}

	

	function editcategory($id,$return)

	{

		$this->form_validation->set_rules('parent_id', 'parent', 'required');

		$this->form_validation->set_rules('name', 'Name', 'required');

		$this->form_validation->set_rules('short_desc', 'Short Desc', '');

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

			$edit['content']= $this->contentcategory_model->load($id);

			$edit['widgets']=$this->widgets_model->get_rightwidgets();

			$edit['contentcats'] = $this->contentcategory_model->get_array();

			$main['content']=$this->load->view('admin/contents/category/edit',$edit,true);

			$this->load->view('admin/main',$main);

		} else {

			$new_widgets=$this->input->post('widgets');

			$categoryrow=$this->contentcategory_model->load($id);

			$widgets=$this->get_editwidgets($categoryrow,$new_widgets);	

			$slug=$this->contentcategory_model->update_slug($this->input->post('slug'),$id);

			$maindata=array('parent_id'=>$this->input->post('parent_id'),'status'=>$this->input->post('status'),'breadcrumb_status'=>$this->input->post('breadcrumb_status'),'slug'=>$slug,'widgets'=>$widgets);

			$descdata=array('name'=>$this->input->post('name'),'short_desc'=>$this->input->post('short_desc'),'keywords'=>$this->input->post('keywords'));

			$loginid=$this->contentcategory_model->update($maindata,$descdata,$id);

			if($loginid){

				$this->session->set_flashdata('message', '<div class="n_ok flash_messages"><p>Content category updated Successfully.</p></div>');

				redirect('admin/contents/categories/'.$return);

			} else {

				$this->session->set_flashdata('message', '<div class="n_error flash_messages"><p>Error!! - Content category not updated.</p></div>');

				redirect('admin/contents/categories/'.$return);

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

		$content['category'] = $this->contentcategory_model->get_row_cond($cond);				

		$content['widgets'] = $this->widgets_model->get_idpair();		

		$main['content']=$this->load->view('admin/contents/category/widget/lists',$content,true);

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

			$loginid=$this->contentcategory_model->update($data,array(),$categoryid);			

		}		

		if($loginid){

			$this->session->set_flashdata('message', '<div class="n_ok flash_messages"><p>Product updated Successfully.</p></div>');

		} else {

			$this->session->set_flashdata('message', '<div class="n_error flash_messages"><p>Error!! - Product not updated.</p></div>');

		}

		redirect('admin/products/lists/'.$this->input->post('return'));

	}

	

	function deletecategory($id,$return)

	{

		$loginid=$this->contentcategory_model->delete($id);

		if($loginid){

			$this->session->set_flashdata('message', '<div class="n_ok flash_messages"><p>Content category deleted Successfully.</p></div>');

			redirect('admin/contents/categories/'.$return);

		} else {

			$this->session->set_flashdata('message', '<div class="n_error flash_messages"><p>Error!! - Content category not deleted.</p></div>');

			redirect('admin/contents/categories/'.$return);

		}

	}

	

	function categoryactions()

	{

		$ids=$this->input->post('id');

		$loginid=false;

		if(isset($_POST['enable']) && $this->input->post('enable')=='Enable'){ $status='Y';}

		if(isset($_POST['disable']) && $this->input->post('disable')=='Disable'){ $status='N';}

		if(isset($status) && $ids ){

			foreach($ids as $id):

				$data=array('status'=>$status);

				$loginid=$this->contentcategory_model->update($data,array(),$id);				

			endforeach;

			if($loginid){

				$this->session->set_flashdata('message', '<div class="n_ok flash_messages"><p>Content category updated Successfully.</p></div>');

			} else {

				$this->session->set_flashdata('message', '<div class="n_error flash_messages"><p>Error!! - Content category not updated.</p></div>');

			}

		}

		

		if(isset($_POST['delete']) && $ids){			

			foreach($ids as $id):

				$loginid=$this->contentcategory_model->delete($id);				

			endforeach;

			if($loginid){

				$this->session->set_flashdata('message', '<div class="n_ok flash_messages"><p>Content category Deleted Successfully.</p></div>');

			} 

		}

		redirect('admin/contents/categories/'.$this->input->post('return'));

	}

	

	function catcode_exists($code)

	{

		$id= $this->input->post('id');

		if ($this->contentcategory_model->code_exists($code,$id))

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

/* End of file contents.php */

/* Location: ./application/controllers/admin/contents.php */