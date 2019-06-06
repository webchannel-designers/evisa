<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Newsgallery extends Web_Controller {
	function __construct()
    {
		// Call the Model constructor
		parent::__construct();
		if(!$this->session->userdata('admin_logged_in'))
		{
		   redirect('admin/login');		
		}
		$this->load->model('newsgallery_model');	
		$this->load->model('newsgallerycategory_model');
	}
		
	public function index()
	{
		redirect('admin/newsgallery/lists');		
	}
	
	public function lists()
	{
		$this->load->library('pagination');
		$main['page_title']=$this->config->item('site_name').' - Gallery';
		$main['header']=$this->adminheader();
		$main['footer']=$this->adminfooter();
		$main['left']=$this->adminleftmenu();
		$config['base_url'] = site_url('admin/newsgallery/lists/');
		$config['total_rows'] = $this->newsgallery_model->get_pagination_count();
		$config['per_page'] = '10';
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['cur_tag_open'] = '<span>';
		$config['cur_tag_close'] = '</span>';
		$this->pagination->initialize($config);
		$content['galleryfields'] = $this->newsgallery_model->get_fields();
		$content['sortorders'] = array('asc'=>'Ascending','desc'=>'Descending');
		$content['gallerycats'] = $this->newsgallerycategory_model->get_array();
		$content['galleries']=$this->newsgallery_model->get_pagination($config['per_page'],$this->uri->segment($config['uri_segment']));
		$main['content']=$this->load->view('admin/newsgallery/lists',$content,true);
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
		$this->form_validation->set_rules('title', 'Title', '');
		$this->form_validation->set_rules('short_desc', 'short_desc', '');//,'short_desc'=>$this->input->post('short_desc')
		$this->form_validation->set_rules('status', 'Status', 'required');
		$this->form_validation->set_message('required', 'required');
		$this->form_validation->set_error_delimiters('<span class="red">(', ')</span>');
		if ($this->form_validation->run() == FALSE)
		{
			$main['page_title']=$this->config->item('site_name').' - Gallery';
			$main['header']=$this->adminheader();
			$main['footer']=$this->adminfooter();
			$main['left']=$this->adminleftmenu();
			$add['categories']=$this->newsgallerycategory_model->get_array();
			$main['content']=$this->load->view('admin/newsgallery/add',$add,true);
			$this->load->view('admin/main',$main);
		} else {
			$image='';
			//$config['upload_path'] = 'public/uploads/gallery';
			//$config['allowed_types'] = 'jpg|png|gif';
			//$this->load->library('upload', $config);
			$files = $_FILES;
			$filesCount = count($_FILES['image']['name']);
            for($i = 0; $i < $filesCount; $i++){
				$_FILES['image']['name']= $files['image']['name'][$i];
                $_FILES['image']['type']= $files['image']['type'][$i];
                $_FILES['image']['tmp_name']= $files['image']['tmp_name'][$i];
                $_FILES['image']['error']= $files['image']['error'][$i];
                $_FILES['image']['size']= $files['image']['size'][$i];
			$config['upload_path'] = 'public/uploads/gallery';
			$config['allowed_types'] = 'jpg|png|gif|pdf';
			$this->load->library('upload', $config);
            $this->upload->initialize($config);
			$this->upload->do_upload('image');
			$fileName = $_FILES['image']['name'];	
			$maindata=array('status'=>$this->input->post('status'),'viewstat'=>$this->input->post('viewstat'),'category_id'=>$this->input->post('category_id'));
			$descdata=array('title'=>$this->input->post('title'),'link'=>$this->input->post('link'),'image'=>$fileName,'short_desc'=>$this->input->post('short_desc'));
			$insertid=$this->newsgallery_model->insert($maindata,$descdata);
			
            }	
//			if($this->upload->do_upload('image'))
//			{
//				$imagedata=$this->upload->data();
//				$image=$imagedata['file_name'];
//				$this->load->library('image_lib');
//				$configSize1['image_library']   = 'gd2';
//				$configSize1['source_image']    = 'public/uploads/gallery/'.$image;
//				$configSize1['maintain_ratio']  = TRUE;
//				$configSize1['width']           = 200;
//				$configSize1['height']          = 70;
//				$configSize1['master_dim'] = 'height';
//				$configSize1['new_image']   = 'public/uploads/gallery/thumb_'.$image;				
//				$this->image_lib->initialize($configSize1);
//				$this->image_lib->resize();
//				$this->image_lib->clear();
//				$configSize3['image_library']   = 'gd2';
//				$configSize3['source_image']    = 'public/uploads/gallery/'.$image;
//				$configSize3['maintain_ratio']  = TRUE;
//				$configSize3['width']           = 1600;
//				$configSize3['height']          = 1000;
//				$configSize3['new_image']   = 'public/uploads/gallery/main_'.$image;				
//				$this->image_lib->initialize($configSize3);
//				$this->image_lib->resize();
//				$this->image_lib->clear();
//				$this->resizecrop($imagedata,'view_','936','460');
//			}			
			if($insertid){
				$this->session->set_flashdata('message', '<div class="n_ok flash_messages"><p>Gallery added Successfully.</p></div>');
				redirect('admin/newsgallery/lists');
			} else {
				$this->session->set_flashdata('message', '<div class="n_error flash_messages"><p>Error!! - Gallery not added.</p></div>');
				redirect('admin/newsgallery/lists');
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
 		$this->ckfinder->SetupCKEditor($this->ckeditor,base_url('public/admin/ckfinder/'));$this->form_validation->set_rules('category_id', 'Category', 'required');
		$this->form_validation->set_rules('title', 'Title', '');
		$this->form_validation->set_rules('short_desc', 'short_desc', '');//,'short_desc'=>$this->input->post('short_desc')
		$this->form_validation->set_rules('status', 'Status', 'required');
		$this->form_validation->set_message('required', 'required');
		$this->form_validation->set_error_delimiters('<span class="red">(', ')</span>');
		if ($this->form_validation->run() == FALSE)
		{
			$main['page_title']=$this->config->item('site_name').' - Gallery';
			$main['header']=$this->adminheader();
			$main['footer']=$this->adminfooter();
			$main['left']=$this->adminleftmenu();
			$edit['return']=$return;
			$edit['gallery']= $this->newsgallery_model->load($id);
			$edit['categories']=$this->newsgallerycategory_model->get_array();
			$main['content']=$this->load->view('admin/newsgallery/edit',$edit,true);
			$this->load->view('admin/main',$main);
		} else {
		    $slug = url_title($this->input->post('slug') ? $this->input->post('slug') : $this->input->post('title'));
			$maindata=array('status'=>$this->input->post('status'),'viewstat'=>$this->input->post('viewstat'),'category_id'=>$this->input->post('category_id'),'slug'=>$slug);
			$descdata=array('title'=>$this->input->post('title'),'link'=>$this->input->post('link'),'short_desc'=>$this->input->post('short_desc'));
			$config['upload_path'] = 'public/uploads/gallery';
			$config['allowed_types'] = 'jpg|png|gif|pdf';
			$this->load->library('upload', $config);
			if($this->upload->do_upload('image'))
			{
				$imagedata=$this->upload->data();
				$descdata['image']=$imagedata['file_name'];
//				$this->load->library('image_lib');
//				$configSize1['image_library']   = 'gd2';
//				$configSize1['source_image']    = 'public/uploads/gallery/'.$descdata['image'];
//				$configSize1['maintain_ratio']  = TRUE;
//				$configSize1['width']           = 200;
//				$configSize1['height']          = 70;
//				$configSize1['master_dim'] 		= 'height';
//				$configSize1['new_image']   	= 'public/uploads/gallery/thumb_'.$descdata['image'];				
//				$this->image_lib->initialize($configSize1);
//				$this->image_lib->resize();
//				$this->image_lib->clear();				
//				$configSize3['image_library']   = 'gd2';
//				$configSize3['source_image']    = 'public/uploads/gallery/'.$descdata['image'];
//				$configSize3['maintain_ratio']  = TRUE;
//				$configSize3['width']           = 1600;
//				$configSize3['height']          = 1000;
//				$configSize3['new_image']   	= 'public/uploads/gallery/main_'.$descdata['image'];				
//				$this->image_lib->initialize($configSize3);
//				$this->image_lib->resize();
//				$this->image_lib->clear();
//				$this->resizecrop($imagedata,'view_','936','460');
//				$gallery= $this->newsgallery_model->load($id);
//				if($gallery->image!='' && file_exists('public/uploads/gallery/'.$gallery->image)){ unlink('public/uploads/gallery/'.$gallery->image); }
			}
			$loginid=$this->newsgallery_model->update($maindata,$descdata,$id);
			if($loginid){
				$this->session->set_flashdata('message', '<div class="n_ok flash_messages"><p>Gallery updated Successfully.</p></div>');
				redirect('admin/newsgallery/lists/'.$return);
			} else {
				$this->session->set_flashdata('message', '<div class="n_error flash_messages"><p>Error!! - Gallery not updated.</p></div>');
				redirect('admin/newsgallery/lists/'.$return);
			}
		}
	}
	
	function delete($id,$return)
	{
		$gallery= $this->newsgallery_model->load($id);
		if($gallery->image!='' && file_exists('public/uploads/gallery/'.$gallery->image)){ unlink('public/uploads/gallery/'.$gallery->image); }
		$loginid=$this->newsgallery_model->delete($id);
		if($loginid){
			$this->session->set_flashdata('message', '<div class="n_ok flash_messages"><p>Gallery deleted Successfully.</p></div>');
			redirect('admin/newsgallery/lists/'.$return);
		} else {
			$this->session->set_flashdata('message', '<div class="n_error flash_messages"><p>Error!! - Gallery not deleted.</p></div>');
			redirect('admin/newsgallery/lists/'.$return);
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
			redirect('admin/newsgallery/lists/');
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
			redirect('admin/newsgallery/lists/');
		}
		
		if(isset($_POST['enable']) && $this->input->post('enable')=='Enable'){ $status='Y';$data=array('status'=>$status);}
		if(isset($_POST['disable']) && $this->input->post('disable')=='Disable'){ $status='N';$data=array('status'=>$status);}
		if(isset($status) && isset($_POST['id'])){
			foreach($ids as $id):
				$loginid=$this->newsgallery_model->update($data,array(),$id);	
				$flashmsg = 'Gallery updated Successfully.';	
			endforeach;			
		}
		if(isset($_POST['sortsave']) && $this->input->post('sortsave')=='Save' && count($sort_orders)>0){
			foreach($sort_orders as $id => $sort_order):
				$data=array('sort_order'=>$sort_order);
				$loginid=$this->newsgallery_model->update($data,array(),$id);	
				$flashmsg = 'Gallery updated Successfully.';	
			endforeach;			
		}
		if(isset($_POST['delete']) && $ids){			
			foreach($ids as $id):
				$gallery= $this->newsgallery_model->load($id);
				if($gallery->image!='' && file_exists('public/uploads/gallery/'.$gallery->image)){ unlink('public/uploads/gallery/'.$gallery->image); }
				$loginid=$this->newsgallery_model->delete($id);
				$flashmsg = 'Gallery deleted Successfully.';				
			endforeach;
		}
		if($loginid){
			$this->session->set_flashdata('message', '<div class="n_ok flash_messages"><p>'.$flashmsg.'</p></div>');
		} else {
			$this->session->set_flashdata('message', '<div class="n_error flash_messages"><p>Error!! - Gallery not updated.</p></div>');
		}
		redirect('admin/newsgallery/lists/'.$this->input->post('return'));
	}
	
	public function categories()
	{
		$this->load->library('pagination');
		$main['page_title']=$this->config->item('site_name').' - Gallery Categories';
		$main['header']=$this->adminheader();
		$main['footer']=$this->adminfooter();
		$main['left']=$this->adminleftmenu();
		$config['base_url'] = site_url('admin/newsgallery/categories/');
		$config['total_rows'] = $this->newsgallerycategory_model->get_pagination_count();
		$config['per_page'] = '10';
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['cur_tag_open'] = '<span>';
		$config['cur_tag_close'] = '</span>';
		$this->pagination->initialize($config);
		$content['galleries']=$this->newsgallerycategory_model->get_pagination($config['per_page'],$this->uri->segment($config['uri_segment']));
		$main['content']=$this->load->view('admin/newsgallery/category/lists',$content,true);
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
			$main['content']=$this->load->view('admin/newsgallery/category/add','',true);
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
			$slug=$this->newsgallerycategory_model->create_slug($this->input->post('title'));
			$maindata=array('status'=>$this->input->post('status'),'slug'=>$slug);
			$descdata=array('title'=>$this->input->post('title'),'image'=>$image);			
			$insertid=$this->newsgallerycategory_model->insert($maindata,$descdata);
			if($insertid){
				$this->session->set_flashdata('message', '<div class="n_ok flash_messages"><p>Gallery category added Successfully.</p></div>');
				redirect('admin/newsgallery/categories');
			} else {
				$this->session->set_flashdata('message', '<div class="n_error flash_messages"><p>Error!! - Gallery category not added.</p></div>');
				redirect('admin/newsgallery/categories');
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
			$main['page_title']=$this->config->item('site_name').' - Gallery Categories';
			$main['header']=$this->adminheader();
			$main['footer']=$this->adminfooter();
			$main['left']=$this->adminleftmenu();
			$edit['return']=$return;
			$edit['gallery']= $this->newsgallerycategory_model->load($id);
			$main['content']=$this->load->view('admin/newsgallery/category/edit',$edit,true);
			$this->load->view('admin/main',$main);
		} else {
			$slug=$this->newsgallerycategory_model->update_slug($this->input->post('slug'),$id);
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
				$gallery= $this->newsgallerycategory_model->load($id);
				if($gallery->image!='' && file_exists('public/uploads/gallery/'.$gallery->image)){ unlink('public/uploads/gallery/'.$gallery->image); }
			}
			$loginid=$this->newsgallerycategory_model->update($maindata,$descdata,$id);
			if($loginid){
				$this->session->set_flashdata('message', '<div class="n_ok flash_messages"><p>Gallery category updated Successfully.</p></div>');
				redirect('admin/newsgallery/categories/'.$return);
			} else {
				$this->session->set_flashdata('message', '<div class="n_error flash_messages"><p>Error!! - Gallery category not updated.</p></div>');
				redirect('admin/newsgallery/categories/'.$return);
			}
		}
	}
	function deletecategory($id,$return)
	{
		$gallery= $this->newsgallerycategory_model->load($id);
		if($gallery->image!='' && file_exists('public/uploads/gallery/'.$gallery->image)){ unlink('public/uploads/gallery/'.$gallery->image); }
		$loginid=$this->newsgallerycategory_model->delete($id);
		if($loginid){
			$this->session->set_flashdata('message', '<div class="n_ok flash_messages"><p>Gallery category deleted Successfully.</p></div>');
			redirect('admin/newsgallery/categories/'.$return);
		} else {
			$this->session->set_flashdata('message', '<div class="n_error flash_messages"><p>Error!! - Gallery category not deleted.</p></div>');
			redirect('admin/newsgallery/categories/'.$return);
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
				$loginid=$this->newsgallerycategory_model->update($data,array(),$id);				
			endforeach;
		}
		if(isset($_POST['sortsave']) && $this->input->post('sortsave')=='Save' && count($sort_orders)>0){
			foreach($sort_orders as $id => $sort_order):
				$data=array('sort_order'=>$sort_order);
				$loginid=$this->newsgallerycategory_model->update($data,array(),$id);				
			endforeach;			
		}
		if($loginid){
			$this->session->set_flashdata('message', '<div class="n_ok flash_messages"><p>Gallery category updated Successfully.</p></div>');
		} else {
			$this->session->set_flashdata('message', '<div class="n_error flash_messages"><p>Error!! - Gallery category not updated.</p></div>');
		}
		if(isset($_POST['delete']) && $ids){			
			foreach($ids as $id):
				$gallery= $this->newsgallerycategory_model->load($id);
				if($gallery->image!='' && file_exists('public/uploads/gallery/'.$gallery->image)){ unlink('public/uploads/gallery/'.$gallery->image); }
				$loginid=$this->newsgallerycategory_model->delete($id);				
			endforeach;
			if($loginid){
				$this->session->set_flashdata('message', '<div class="n_ok flash_messages"><p>Gallery category Deleted Successfully.</p></div>');
			} 
		}
		redirect('admin/newsgallery/categories/'.$this->input->post('return'));
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
		$configCrop['x_axis'] 		   = 0;
    	$configCrop['y_axis'] 		   = 0;
		$configCrop['quality'] 		   = 100;
		$configCrop['maintain_ratio']  = FALSE;
		$configCrop['new_image']       = 'public/uploads/gallery/'.$name.$image;
		$this->image_lib->initialize($configCrop);
		$this->image_lib->crop();
		$this->image_lib->clear();
		unlink('public/uploads/gallery/resize_'.$name.$image);

	}
}
/* End of file gallery.php */
/* Location: ./application/controllers/admin/gallery.php */