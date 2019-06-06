<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Location extends Web_Controller {
	function __construct()
    {
		// Call the Model constructor
		parent::__construct();
		if(!$this->session->userdata('admin_logged_in'))
		{
		   redirect('admin/login');		
		}
		$this->load->model('location_model');
		//$this->load->model('productcategory_model');	
		//$this->load->model('teamcategory_model');
	}
		
	public function index()
	{
		redirect('admin/careers/location/lists');		
	}
	
	public function lists()
	{
		$this->load->library('pagination');
		$main['page_title']=$this->config->item('site_name').' - Job Location';
		$main['header']=$this->adminheader();
		$main['footer']=$this->adminfooter();
		$main['left']=$this->adminleftmenu();
		$config['base_url'] = site_url('admin/careers/location/lists/');
		$config['total_rows'] = $this->location_model->get_pagination_count();
		$config['per_page'] = '10';
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['cur_tag_open'] = '<span>';
		$config['cur_tag_close'] = '</span>';
		$this->pagination->initialize($config);
		$content['galleryfields'] = $this->location_model->get_fields();
		$content['sortorders'] = array('asc'=>'Ascending','desc'=>'Descending');
		//$content['gallerycats'] = $this->teamlocation_model->get_array();
		$content['galleries']=$this->location_model->get_pagination($config['per_page'],$this->uri->segment($config['uri_segment']));
		$main['content']=$this->load->view('admin/careers/location/lists',$content,true);
		$this->load->view('admin/main',$main);
	}
	
	function add()
	{
		
		//$this->form_validation->set_rules('category_id', 'Category', 'required');
		$this->form_validation->set_rules('title', 'Title', '');
		//$this->form_validation->set_rules('designation', 'Designation', '');
		$this->form_validation->set_rules('status', 'Status', 'required');
		$this->form_validation->set_message('required', 'required');
		$this->form_validation->set_error_delimiters('<span class="red">(', ')</span>');
		if ($this->form_validation->run() == FALSE)
		{
			$main['page_title']=$this->config->item('site_name').' - Job Location';
			$main['header']=$this->adminheader();
			$main['footer']=$this->adminfooter();
			$main['left']=$this->adminleftmenu();
			$add['contentcats'] = $this->productlocation_model->get_array();
			$add['categories']=$this->teamlocation_model->get_array();
			$main['content']=$this->load->view('admin/careers/category/add',$add,true);
			$this->load->view('admin/main',$main);
		} else {
			$image='';
			$config['upload_path'] = 'public/uploads/gallery';
			$config['allowed_types'] = 'jpg|png|gif';
			$this->load->library('upload', $config);
			if($this->upload->do_upload('image'))
			{
				$imagedata=$this->upload->data();
				$image=$imagedata['file_name'];
				$this->load->library('image_lib');
				$configSize1['image_library']   = 'gd2';
				$configSize1['source_image']    = 'public/uploads/gallery/'.$image;
				$configSize1['maintain_ratio']  = TRUE;
				$configSize1['width']           = 200;
				$configSize1['height']          = 70;
				$configSize1['master_dim'] 		= 'height';
				$configSize1['new_image']   	= 'public/uploads/gallery/thumb_'.$image;				
				$this->image_lib->initialize($configSize1);
				$this->image_lib->resize();
				$this->image_lib->clear();
				$configSize3['image_library']   = 'gd2';
				$configSize3['source_image']    = 'public/uploads/gallery/'.$image;
				$configSize3['maintain_ratio']  = TRUE;
				$configSize3['width']           = 1600;
				$configSize3['height']          = 1000;
				$configSize3['new_image']   	= 'public/uploads/gallery/main_'.$image;				
				$this->image_lib->initialize($configSize3);
				$this->image_lib->resize();
				$this->image_lib->clear();
				$this->resizecrop($imagedata,'view_','936','460');
			}			
			$maindata=array('status'=>$this->input->post('status'),'category_id'=>$this->input->post('category_id'));
			$descdata=array('category_id'=>$this->input->post('category_id'),'type'=>$this->input->post('title'),'is_active'=>$this->input->post('status'));
			$insertid=$this->location_model->insert($maindata,$descdata);
			if($insertid){
				$this->session->set_flashdata('message', '<div class="n_ok flash_messages"><p>Category added Successfully.</p></div>');
				redirect('admin/location/lists');
			} else {
				$this->session->set_flashdata('message', '<div class="n_error flash_messages"><p>Error!! - Category not added.</p></div>');
				redirect('admin/location/lists');
			}
		}
	}
	
	function edit($id,$return)
	{
		//$this->form_validation->set_rules('category_id', 'Category', 'required');
		$this->form_validation->set_rules('title', 'Title', '');
		//$this->form_validation->set_rules('designation', 'Designation', '');
		$this->form_validation->set_rules('status', 'Status', 'required');
		$this->form_validation->set_message('required', 'required');
		$this->form_validation->set_error_delimiters('<span class="red">(', ')</span>');
		if ($this->form_validation->run() == FALSE)
		{
			$main['page_title']=$this->config->item('site_name').' - Job Location';
			$main['header']=$this->adminheader();
			$main['footer']=$this->adminfooter();
			$main['left']=$this->adminleftmenu();
			$edit['return']=$return;
			$edit['gallery']= $this->location_model->load($id);
			$edit['contentcats'] = $this->productlocation_model->get_array();
			//$edit['categories']=$this->teamlocation_model->get_array();
			$main['content']=$this->load->view('admin/careers/category/edit',$edit,true);
			$this->load->view('admin/main',$main);
		} else {
			$maindata=array('is_active'=>$this->input->post('status'),'category_id'=>$this->input->post('category_id'));
			$descdata=array('category_id'=>$this->input->post('category_id'),'type'=>$this->input->post('title'),'is_active'=>$this->input->post('status'));
			$config['upload_path'] = 'public/uploads/gallery';
			$config['allowed_types'] = 'jpg|png|gif';
			$this->load->library('upload', $config);
			if($this->upload->do_upload('image'))
			{
				$imagedata=$this->upload->data();
				$descdata['image']=$imagedata['file_name'];
				$this->load->library('image_lib');
				$configSize1['image_library']   = 'gd2';
				$configSize1['source_image']    = 'public/uploads/gallery/'.$descdata['image'];
				$configSize1['maintain_ratio']  = TRUE;
				$configSize1['width']           = 200;
				$configSize1['height']          = 70;
				$configSize1['master_dim'] 		= 'height';
				$configSize1['new_image']   	= 'public/uploads/gallery/thumb_'.$descdata['image'];				
				$this->image_lib->initialize($configSize1);
				$this->image_lib->resize();
				$this->image_lib->clear();				
				$configSize3['image_library']   = 'gd2';
				$configSize3['source_image']    = 'public/uploads/gallery/'.$descdata['image'];
				$configSize3['maintain_ratio']  = TRUE;
				$configSize3['width']           = 1600;
				$configSize3['height']          = 1000;
				$configSize3['new_image']   	= 'public/uploads/gallery/main_'.$descdata['image'];				
				$this->image_lib->initialize($configSize3);
				$this->image_lib->resize();
				$this->image_lib->clear();
				$this->resizecrop($imagedata,'view_','936','460');
				$gallery= $this->location_model->load($id);
				if($gallery->image!='' && file_exists('public/uploads/gallery/'.$gallery->image)){ unlink('public/uploads/gallery/'.$gallery->image); }
			}
			$loginid=$this->location_model->update($maindata,$descdata,$id);
			if($loginid){
				$this->session->set_flashdata('message', '<div class="n_ok flash_messages"><p>Category updated Successfully.</p></div>');
				redirect('admin/location/lists/'.$return);
			} else {
				$this->session->set_flashdata('message', '<div class="n_error flash_messages"><p>Error!! - Type not updated.</p></div>');
				redirect('admin/location/lists/'.$return);
			}
		}
	}
	
	function delete($id,$return)
	{
		//$gallery= $this->team_model->load($id);
		//if($gallery->image!='' && file_exists('public/uploads/gallery/'.$gallery->image)){ unlink('public/uploads/gallery/'.$gallery->image); }
		$loginid=$this->location_model->delete($id);
		if($loginid){
			$this->session->set_flashdata('message', '<div class="n_ok flash_messages"><p>Category deleted Successfully.</p></div>');
			redirect('admin/location/lists/'.$return);
		} else {
			$this->session->set_flashdata('message', '<div class="n_error flash_messages"><p>Error!! - Type not deleted.</p></div>');
			redirect('admin/location/lists/'.$return);
		}
	}
	
	function actions()
	{
		$loginid=false;
		$ids=$this->input->post('id');
		$sort_orders=$this->input->post('sort_order');
		if(isset($_POST['reset']) && $this->input->post('reset')=='Reset'){
			$newdata = array(
				   'gallery_key'  => '',
				   'gallery_field'  => '',
				   'gallery_category_id'  => '',
				   'order_field'=>'',
				   'sort_field' =>''
			);
			$this->session->unset_userdata($newdata);
			redirect('admin/location/lists/');
		}
		if(isset($_POST['search']) && $this->input->post('search')=='Search'){
			if($this->input->post('keyword')!='' || $this->input->post('category')!='' ||  $this->input->post('sortby')!=''){
				$newdata = array(
					   'gallery_key'  => $this->input->post('keyword'),
					   'gallery_field'  => $this->input->post('field'),
					   'gallery_category_id'  => $this->input->post('category'),
					   'order_field' =>  $this->input->post('orderby'),
					   'sort_field' => $this->input->post('sortby') 
				);
				$this->session->set_userdata($newdata);
			} else {
				$newdata = array(
					   'gallery_key'  => '',
					   'gallery_field' => '',
					   'gallery_category_id'  => '',
					   'order_field' => '',
					   'sort_field' =>''
				);
				$this->session->unset_userdata($newdata);
			}
			redirect('admin/location/lists/');
		}
		
		if(isset($_POST['enable']) && $this->input->post('enable')=='Enable'){ $status='Y';$data=array('is_active'=>$status);}
		if(isset($_POST['disable']) && $this->input->post('disable')=='Disable'){ $status='N';$data=array('is_active'=>$status);}
		if(isset($status) && isset($_POST['id'])){
			//echo $status;print_r($data);exit;
			foreach($ids as $id):
				$loginid=$this->location_model->update(array(),$data,$id);	
				$flashmsg = 'Category updated Successfully.';	
			endforeach;			
		}
		if(isset($_POST['sortsave']) && $this->input->post('sortsave')=='Save' && count($sort_orders)>0){
			foreach($sort_orders as $id => $sort_order):
				$data=array('sort_order'=>$sort_order);
				$loginid=$this->location_model->update(array(),$data,$id);	
				$flashmsg = 'Category updated Successfully.';	
			endforeach;			
		}
		if(isset($_POST['delete']) && $ids){			
			foreach($ids as $id):
				//$gallery= $this->location_model->load($id);
				//if($gallery->image!='' && file_exists('public/uploads/gallery/'.$gallery->image)){ unlink('public/uploads/gallery/'.$gallery->image); }
				$loginid=$this->location_model->delete($id);
				$flashmsg = 'Category deleted Successfully.';				
			endforeach;
		}
		if($loginid){
			$this->session->set_flashdata('message', '<div class="n_ok flash_messages"><p>'.$flashmsg.'</p></div>');
		} else {
			$this->session->set_flashdata('message', '<div class="n_error flash_messages"><p>Error!! - Category not updated.</p></div>');
		}
		redirect('admin/location/lists/'.$this->input->post('return'));
	}
	
	public function categories()
	{
		$this->load->library('pagination');
		$main['page_title']=$this->config->item('site_name').' - Type Categories';
		$main['header']=$this->adminheader();
		$main['footer']=$this->adminfooter();
		$main['left']=$this->adminleftmenu();
		$config['base_url'] = site_url('admin/team/categories/');
		$config['total_rows'] = $this->teamlocation_model->get_pagination_count();
		$config['per_page'] = '10';
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['cur_tag_open'] = '<span>';
		$config['cur_tag_close'] = '</span>';
		$this->pagination->initialize($config);
		$content['galleries']=$this->teamlocation_model->get_pagination($config['per_page'],$this->uri->segment($config['uri_segment']));
		$main['content']=$this->load->view('admin/team/category/lists',$content,true);
		$this->load->view('admin/main',$main);
	}
	
	function addcategory()
	{
		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');
		$this->form_validation->set_message('required', 'required');
		$this->form_validation->set_error_delimiters('<span class="red">(', ')</span>');
		if ($this->form_validation->run() == FALSE)
		{
			$main['page_title']=$this->config->item('site_name').' - Gallery Categories';
			$main['header']=$this->adminheader();
			$main['footer']=$this->adminfooter();
			$main['left']=$this->adminleftmenu();
			$main['content']=$this->load->view('admin/team/category/add','',true);
			$this->load->view('admin/main',$main);
		} else {
			$image='';
			$config['upload_path'] = 'public/uploads/gallery';
			$config['allowed_types'] = 'jpg|png|gif';
			$this->load->library('upload', $config);
			if($this->upload->do_upload('image'))
			{
				$imagedata=$this->upload->data();
				$image=$imagedata['file_name'];
				$this->load->library('image_lib');
				$this->resizecrop($imagedata,'list_','296','183');
			}		
			$slug=$this->teamlocation_model->create_slug($this->input->post('title'));
			$maindata=array('status'=>$this->input->post('status'),'slug'=>$slug);
			$descdata=array('title'=>$this->input->post('title'),'image'=>$image);			
			$insertid=$this->teamlocation_model->insert($maindata,$descdata);
			if($insertid){
				$this->session->set_flashdata('message', '<div class="n_ok flash_messages"><p>Gallery category added Successfully.</p></div>');
				redirect('admin/team/categories');
			} else {
				$this->session->set_flashdata('message', '<div class="n_error flash_messages"><p>Error!! - Gallery category not added.</p></div>');
				redirect('admin/team/categories');
			}
		}
	}
	
	function editcategory($id,$return)
	{
		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('slug', 'Url Slug', 'required|callback_code_exists');
		$this->form_validation->set_rules('status', 'Status', 'required');
		$this->form_validation->set_message('required', 'required');
		$this->form_validation->set_error_delimiters('<span class="red">(', ')</span>');
		if ($this->form_validation->run() == FALSE)
		{
			$main['page_title']=$this->config->item('site_name').' - Team Categories';
			$main['header']=$this->adminheader();
			$main['footer']=$this->adminfooter();
			$main['left']=$this->adminleftmenu();
			$edit['return']=$return;
			$edit['gallery']= $this->teamlocation_model->load($id);
			$main['content']=$this->load->view('admin/team/category/edit',$edit,true);
			$this->load->view('admin/main',$main);
		} else {
			$slug=$this->teamlocation_model->update_slug($this->input->post('slug'),$id);
			$maindata=array('status'=>$this->input->post('status'),'slug'=>$slug);
			$descdata=array('title'=>$this->input->post('title'));
			$config['upload_path'] = 'public/uploads/gallery';
			$config['allowed_types'] = 'jpg|png|gif';
			$this->load->library('upload', $config);
			if($this->upload->do_upload('image'))
			{
				$imagedata=$this->upload->data();
				$descdata['image']=$imagedata['file_name'];
				$this->load->library('image_lib');
				$this->resizecrop($imagedata,'list_','296','183');
				$gallery= $this->teamlocation_model->load($id);
				if($gallery->image!='' && file_exists('public/uploads/gallery/'.$gallery->image)){ unlink('public/uploads/gallery/'.$gallery->image); }
			}
			$loginid=$this->teamlocation_model->update($maindata,$descdata,$id);
			if($loginid){
				$this->session->set_flashdata('message', '<div class="n_ok flash_messages"><p>Gallery category updated Successfully.</p></div>');
				redirect('admin/team/categories/'.$return);
			} else {
				$this->session->set_flashdata('message', '<div class="n_error flash_messages"><p>Error!! - Gallery category not updated.</p></div>');
				redirect('admin/team/categories/'.$return);
			}
		}
	}
	function deletecategory($id,$return)
	{
		$gallery= $this->teamlocation_model->load($id);
		if($gallery->image!='' && file_exists('public/uploads/gallery/'.$gallery->image)){ unlink('public/uploads/gallery/'.$gallery->image); }
		$loginid=$this->teamlocation_model->delete($id);
		if($loginid){
			$this->session->set_flashdata('message', '<div class="n_ok flash_messages"><p>Gallery category deleted Successfully.</p></div>');
			redirect('admin/team/categories/'.$return);
		} else {
			$this->session->set_flashdata('message', '<div class="n_error flash_messages"><p>Error!! - Gallery category not deleted.</p></div>');
			redirect('admin/team/categories/'.$return);
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
				$loginid=$this->teamlocation_model->update($data,array(),$id);				
			endforeach;
		}
		if(isset($_POST['sortsave']) && $this->input->post('sortsave')=='Save' && count($sort_orders)>0){
			foreach($sort_orders as $id => $sort_order):
				$data=array('sort_order'=>$sort_order);
				$loginid=$this->teamlocation_model->update($data,array(),$id);				
			endforeach;			
		}
		if($loginid){
			$this->session->set_flashdata('message', '<div class="n_ok flash_messages"><p>Gallery category updated Successfully.</p></div>');
		} else {
			$this->session->set_flashdata('message', '<div class="n_error flash_messages"><p>Error!! - Gallery category not updated.</p></div>');
		}
		if(isset($_POST['delete']) && $ids){			
			foreach($ids as $id):
				$gallery= $this->teamlocation_model->load($id);
				if($gallery->image!='' && file_exists('public/uploads/gallery/'.$gallery->image)){ unlink('public/uploads/gallery/'.$gallery->image); }
				$loginid=$this->teamlocation_model->delete($id);				
			endforeach;
			if($loginid){
				$this->session->set_flashdata('message', '<div class="n_ok flash_messages"><p>Gallery category Deleted Successfully.</p></div>');
			} 
		}
		redirect('admin/team/categories/'.$this->input->post('return'));
	}
	
	function resizecrop($promotiondata,$name,$width,$height)
	{
		$image=$promotiondata['file_name'];
		$dimwidth = (intval($promotiondata["image_width"]) / intval($promotiondata["image_height"]));
		$dimheight = (intval($promotiondata["image_height"]) / intval($promotiondata["image_width"]));
		$newheight=$dimwidth*$height;
		$newwidth=$dimheight*$width;
		if($newheight>$height){ 
			$resizewidth=$width;
			$resizeheight=$newheight;
			$master_dim='height';
		} else {
			$resizewidth=$newwidth;
			$resizeheight=$height;
			$master_dim='width';
		}
		$configSize['image_library']   = 'gd2';
		$configSize['source_image']    = 'public/uploads/gallery/'.$image;
		$configSize['maintain_ratio']  = TRUE;
		$configSize['width']           = $resizewidth;
		$configSize['height']          = $resizeheight;
		$configSize['master_dim'] 	   = $master_dim;
		$configSize['quality'] 		   = 100;
		$configSize['new_image']       = 'public/uploads/gallery/resize_'.$name.$image;		
		$this->image_lib->initialize($configSize);
		$this->image_lib->resize();
		$this->image_lib->clear();
		$configCrop['image_library']   = 'gd2';
		$configCrop['source_image']    = 'public/uploads/gallery/resize_'.$name.$image;
		$configCrop['width']           = $width;
		$configCrop['height']          = $height;
		$configCrop['x_axis'] = 0;
    	$configCrop['y_axis'] = 0;
		$configCrop['quality'] = 100;
		$configCrop['maintain_ratio'] = FALSE;
		$configCrop['new_image']   = 'public/uploads/gallery/'.$name.$image;
		$this->image_lib->initialize($configCrop);
		$this->image_lib->crop();
		$this->image_lib->clear();
		unlink('public/uploads/gallery/resize_'.$name.$image);

	}
}
/* End of file gallery.php */
/* Location: ./application/controllers/admin/gallery.php */