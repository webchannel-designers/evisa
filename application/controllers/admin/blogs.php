<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 class Blogs extends Web_Controller {
 	function __construct()
     {
 		// Call the Model constructor
 		parent::__construct();
 		if(!$this->session->userdata('admin_logged_in'))
 		{
 		   redirect('admin/login');		
 		}
 		$this->load->model('blogscategory_model');
 		$this->load->model('blogs_model');
 		
 		$this->load->model('contents_model');	
 		$this->load->model('widgets_model');
 		
 		$this->load->model('admin_model');
		$this->load->model('clients_model');
 	}
 	public function index()
 	{
 		redirect('admin/blogs/lists');		
 	}
 	public function lists($id="")
 	{
 		$this->load->library('pagination');
 		$main['page_title']=$this->config->item('site_name').' - Blogs';
 		$main['header']=$this->adminheader();
 		$main['footer']=$this->adminfooter();
 		$main['left']=$this->adminleftmenu();
 		$config['base_url'] = site_url('admin/blogs/lists/'.$id);
 		
 		if($this->session->userdata('admin_role')==1)
 		{
 		$config['total_rows'] = $this->blogs_model->get_pagination_count(array('archieve'=>$id));
 		}
 		else
 		{
 		$config['total_rows'] = $this->blogs_model->get_pagination_count(array('user_id'=>$this->session->userdata('admin_id'),'archieve'=>$id));
 		}
 		$config['per_page'] = '50';
 		$config['uri_segment'] = 5;
 		$config['first_link'] = 'First';
 		$config['last_link'] = 'Last';
 		$config['cur_tag_open'] = '<span>';
 		$config['cur_tag_close'] = '</span>';
 		$this->pagination->initialize($config);
 		$content['contentfields'] = $this->blogs_model->get_fields();
 		$content['sortorders'] = array('asc'=>'Ascending','desc'=>'Descending');
 		$content['contentcats'] = $this->blogscategory_model->get_array();
 		if($this->session->userdata('admin_role')==1)
 		{
 		$content['contents']=$this->blogs_model->get_pagination($config['per_page'],$this->uri->segment($config['uri_segment']),array('archieve'=>$id));
 		}
 		else
 		{
 		$content['contents']=$this->blogs_model->get_pagination($config['per_page'],$this->uri->segment($config['uri_segment']),array('user_id'=>$this->session->userdata('admin_id'),'archieve'=>$id));
 		}
 		$main['content']=$this->load->view('admin/blogs/content/lists',$content,true);
 		$this->load->view('admin/main',$main);
 	}
 	function add($stat)
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
 		//$this->form_validation->set_rules('keywords', 'Keywords', '');
 		//$this->form_validation->set_rules('desc', 'Description', 'required');
 		//$this->form_validation->set_rules('meta_desc', 'Meta Description', '');
 		$this->form_validation->set_rules('category_id', 'Category', 'required');
 		$this->form_validation->set_rules('status', 'Status', 'required');
 		$this->form_validation->set_message('required', 'required');
 		$this->form_validation->set_error_delimiters('<span class="red">(', ')</span>');
 		if ($this->form_validation->run() == FALSE)
 		{
 			$main['page_title']=$this->config->item('site_name').' - Blogs';
 			$main['header']=$this->adminheader();
 			$main['footer']=$this->adminfooter();
 			$main['left']=$this->adminleftmenu();
 			$add['contentcats'] = $this->blogscategory_model->get_array();
 			//$add['contents'] = $this->contents_model->get_active();
 			$add['contents'] = $this->blogs_model->get_active();
 			$add['users'] = $this->admin_model->get_array();
			$add['members'] = $this->clients_model->get_active();
 			//$add['widgets']=$this->widgets_model->get_rightwidgets();
 			$main['content']=$this->load->view('admin/blogs/content/add',$add,true);
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
 			$slug=$this->blogs_model->create_slug($this->input->post('title'));
 //			if($this->input->post('date_time')!='')
 //
 //			{
 //
 //			if($this->input->post('date_time'))
 //
 //			{ 
 //
 //				@$date_time = date("Y-m-d", strtotime($this->input->post('date_time'))).' '. date("H:i:s",strtotime($this->input->post('date_time')));
 //
 //			}
 //
 //			}
 //
 //			else
 //
 //			{
 //
 //			$date_time=date("Y-m-d H:i:s");
 //
 //			}
 			if($this->input->post('date_time')!='')
 			{
 			if($this->input->post('date_time'))
 			{ 
 				@$date_time = date("Y-m-d", strtotime($this->input->post('date_time'))).' '. date("H:i:s",strtotime($this->input->post('date_time')));
 			}
 			}
 			else
 			{
 			$date_time=date("Y-m-d H:i:s");
 			}
 			
 		
 			$uid=$this->session->userdata('admin_id');
 			
 			$maindata=array('status'=>$this->input->post('status'),'slug'=>$slug,'widgets'=>$widgets);
 			
 			if(is_array($this->input->post('cross')) && count($this->input->post('cross'))>0)
 			{
 			$cross=implode(",",$this->input->post('cross'));
 			}
             
             if(is_array($this->input->post('author')) && count($this->input->post('author'))>0)
 			{
 			$author=(count($this->input->post('author'))>1)? implode(",",$this->input->post('author')):implode(',',$this->input->post('author'));
 			}
             
 			$cat=implode(",",$this->input->post('category_id'));
 			
 			$descdata=array('user_id'=>$uid,'category'=>$cat,'crosslinks'=>@$cross,'title'=>$this->input->post('title'),'author'=>$author,'desc'=>$this->input->post('desc'),'keywords'=>$this->input->post('keywords'),'meta_desc'=>$this->input->post('meta_desc'),'alt'=>$this->input->post('alt'),'image'=>$content_image,'banner_image'=>$banner_image,'date_time'=>$date_time);
 			$insertid=$this->blogs_model->insert($maindata,$descdata);
 			if($insertid){
 				$this->session->set_flashdata('message', '<div class="n_ok flash_messages"><p>Blog added Successfully.</p></div>');
 				redirect('admin/blogs/lists/'.$stat);
 			} else {
 				$this->session->set_flashdata('message', '<div class="n_error flash_messages"><p>Error!! - Blog not added.</p></div>');
 				redirect('admin/blogs/lists/'.$stat);
 			}
 		}
 	}
 	function edit($id,$stat,$return)
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
 		//$this->form_validation->set_rules('short_desc', 'Short Description', 'required');
 		//$this->form_validation->set_rules('keywords', 'Keywords', '');
 		//$this->form_validation->set_rules('desc', 'Description', 'required');
 		//$this->form_validation->set_rules('meta_desc', 'Meta Description', '');
 		$this->form_validation->set_rules('category_id', 'Category', 'required');
 		$this->form_validation->set_rules('status', 'Status', 'required');
 		$this->form_validation->set_message('required', 'required');
 		$this->form_validation->set_error_delimiters('<span class="red">(', ')</span>');
 		if ($this->form_validation->run() == FALSE)
 		{
 			$main['page_title']=$this->config->item('site_name').' - Blogs';
 			$main['header']=$this->adminheader();
 			$main['footer']=$this->adminfooter();
 			$main['left']=$this->adminleftmenu();
 			$edit['return']=$return;
 			$edit['contentcats'] = $this->blogscategory_model->get_array();
 			//$edit['contents'] = $this->contents_model->get_active();
 			$edit['users'] = $this->admin_model->get_array();
			$edit['members'] = $this->clients_model->get_active();
 			$edit['content']= $blog =$this->blogs_model->load($id);
 			//print_r($edit['content']);
 			$edit['contents'] = $this->blogs_model->get_row_cond2(array('id !='=>$edit['content']->id));
 			//$edit['widgets']=$this->widgets_model->get_rightwidgets();
 			$main['content']=$this->load->view('admin/blogs/content/edit',$edit,true);
 			$this->load->view('admin/main',$main);
 		} else {
 			//$new_widgets=$this->input->post('widgets');
 			$contentrow=$this->blogs_model->load($id);
 			
 			//echo $this->input->post('title');exit;
 			//$widgets=$this->get_editwidgets($contentrow,$new_widgets);	
 			
 			if($contentrow->title!=$this->input->post('title'))
 			{
 			$slug=$this->blogs_model->update_slug($this->input->post('title'),$id);
 			}
 			else
 			{
 			$slug=$this->blogs_model->update_slug($this->input->post('slug'),$id);
 			}
 //			if($this->input->post('date_time'))
 //
 //			{ 
 //
 //				//@$date_time = date("Y-m-d", strtotime($this->input->post('date_time'))).' '. date("H:i:s",strtotime($this->input->post('date_time')));
 //@$date_time =$this->input->post('date_time');
 //			}
 //
 //			else
 //
 //			{
 //
 //			$date_time = date("Y-m-d H:i:s");
 //
 //			}
 			//echo $this->input->post('date_time').',';
 			//echo $date_time;exit;
 			$date_time = date("Y-m-d H:i:s");
 			if($this->input->post('date_time')!='')
 			{
 				$date1=$this->input->post('date_time');
 				$date=explode(" ",$date1);
 				$newdate=date("Y-m-d", strtotime($date[0]));
 				$date_time=$newdate." ".$date[1];
 				
 				//echo $date_time = date("Y-m-d h:i:s", strtotime($date1));
 				//echo "qqq".$date=date('Y-m-d h:i:s', strtotime($this->input->post('date_timen')));
 				//exit(); 
 			}
 			//echo $date_time =  date('Y-m-d H:i:s',strtotime($this->input->post('date_time')));exit;
 			
             if(is_array($this->input->post('author')) && count($this->input->post('author'))>0)
 			{
 			$author=(count($this->input->post('author'))>1)? implode(",",$this->input->post('author')):implode(',',$this->input->post('author'));
 			}
             
 		
 			$uid=$this->session->userdata('admin_id');
 			
 			$maindata=array('status'=>$this->input->post('status'),'slug'=>$slug,'widgets'=>'');
 			
 			if(is_array($this->input->post('cross')) && count($this->input->post('cross'))>0)
 			{
 			$cross=implode(",",$this->input->post('cross'));
 			}
             
             
 			$cat=implode(",",$this->input->post('category_id'));
 			
 			$descdata=array('user_id'=>$uid,'category'=>$cat,'crosslinks'=>@$cross,'title'=>$this->input->post('title'),'keywords'=>$this->input->post('keywords'),'meta_desc'=>$this->input->post('meta_desc'),'author'=>$author,'desc'=>$this->input->post('desc'),'date_time'=>$date_time,'alt'=>$this->input->post('alt'));
 			$config['upload_path'] = 'public/uploads/contents';
 			$config['allowed_types'] = 'gif|jpg|png|pdf';
 			$this->load->library('upload', $config);
			$bannerimg=$contentrow->banner_image;$img=$contentrow->image;
 			if($this->upload->do_upload('banner_image'))
 			{
 				$banner_imagedata=$this->upload->data();
 				$descdata['banner_image']=$bannerimg=$banner_imagedata['file_name'];
 			}
 			if($this->upload->do_upload('image'))
 			{
 				$contentimagedata=$this->upload->data();
 				$descdata['image']=$img = $contentimagedata['file_name'];
 			}
 			$loginid=$this->blogs_model->update($maindata,$descdata,$id);
 			if($loginid){
				if($this->session->userdata('admin_language') == 'en'){
					$this->blogs_model->updatecrosslinks(array('category'=>$cat,'crosslinks'=>@$cross,'author'=>$author,'banner_image'=>$bannerimg,'image'=>$img),$id);}
 				$this->session->set_flashdata('message', '<div class="n_ok flash_messages"><p>Blog updated Successfully.</p></div>');
 				redirect('admin/blogs/lists/'.$stat.'/'.$return);
 			} else {
 				$this->session->set_flashdata('message', '<div class="n_error flash_messages"><p>Error!! - Blog not updated.</p></div>');
 				redirect('admin/blogs/lists/'.$stat.'/'.$return);
 			}
 		}
 	}
	function update_crosslink_mannual(){
		$blogs = $this->blogs_model->get_array();
		if($blogs) foreach($blogs as $blog):
		$this->blogs_model->updatecrosslinks(array('category'=>$blog['category'],'crosslinks'=>$blog['crosslinks'],'author'=>$blog['author'],'banner_image'=>$blog['banner_image'],'image'=>$blog['image'],'title'=>$blog['title'],'keywords'=>$blog['keywords'],'meta_desc'=>$blog['meta_desc'],'desc'=>$blog['desc'],'date_time'=>$blog['date_time'],'alt'=>$blog['alt'],'views'=>$blog['views']),$blog['id']);
		echo $this->db->last_query();	
		endforeach;
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
 		$content['content'] = $this->blogs_model->get_row_cond($cond);				
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
 			$loginid=$this->blogs_model->update($data,array(),$contentid);			
 		}		
 		if($loginid){
 			$this->session->set_flashdata('message', '<div class="n_ok flash_messages"><p>content updated Successfully.</p></div>');
 		} else {
 			$this->session->set_flashdata('message', '<div class="n_error flash_messages"><p>Error!! - content not updated.</p></div>');
 		}
 		redirect('admin/blogs/lists/'.$this->input->post('return'));
 	}
 	function delete($id,$stat,$return)
 	{
 		$loginid=$this->blogs_model->delete($id);
 		if($loginid){
 			$this->session->set_flashdata('message', '<div class="n_ok flash_messages"><p>Blogs deleted Successfully.</p></div>');
 			redirect('admin/blogs/lists/'.$stat.'/'.$return);
 		} else {
 			$this->session->set_flashdata('message', '<div class="n_error flash_messages"><p>Error!! - Blogs not deleted.</p></div>');
 			redirect('admin/blogs/lists/'.$stat.'/'.$return);
 		}
 	}
 	function actions($stat)
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
 			redirect('admin/blogs/lists/'.$stat);
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
 			redirect('admin/blogs/lists/'.$stat);
 		}
 		if(isset($_POST['enable']) && $this->input->post('enable')=='Enable'){ $status='Y';}
 		if(isset($_POST['disable']) && $this->input->post('disable')=='Disable'){ $status='N';}
 		if(isset($status) && $ids){
 			foreach($ids as $id):
 				$data=array('status'=>$status);
 				$loginid=$this->blogs_model->update($data,array(),$id);				
 			endforeach;
 			if($loginid){
 				$this->session->set_flashdata('message', '<div class="n_ok flash_messages"><p>Blog updated Successfully.</p></div>');
 			} 
 		}
 		
 		if(isset($_POST['archieve']) && $this->input->post('archieve')=='Make Archieve'){ $status2='Y';}
 		if(isset($_POST['dearchieve']) && $this->input->post('dearchieve')=='Remove Archieve'){ $status2='N';}
 		if(isset($status2) && $ids){
 			foreach($ids as $id):
 				$data=array('archieve'=>$status2);
 				$loginid=$this->blogs_model->update($data,array(),$id);				
 			endforeach;
 			if($loginid){
 				$this->session->set_flashdata('message', '<div class="n_ok flash_messages"><p>Blog updated Successfully.</p></div>');
 			} 
 		}
 		if(isset($_POST['delete']) && $ids){			
 			foreach($ids as $id):
 				$loginid=$this->blogs_model->delete($id);				
 			endforeach;
 			if($loginid){
 				$this->session->set_flashdata('message', '<div class="n_ok flash_messages"><p>Blog Deleted Successfully.</p></div>');
 			} 
 		}
 		if(!$loginid){
 			$this->session->set_flashdata('message', '<div class="n_error flash_messages"><p>Error!! - Blog not updated.</p></div>');
 		}
 		redirect('admin/blogs/lists/'.$stat.'/'.$this->input->post('return'));
 	}
 	function code_exists($code)
 	{
 		$id= $this->input->post('id');
 		if ($this->blogs_model->code_exists($code,$id))
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
 		$main['page_title']=$this->config->item('site_name').' - Blog Categories';
 		$main['header']=$this->adminheader();
 		$main['footer']=$this->adminfooter();
 		$main['left']=$this->adminleftmenu();
 		$config['base_url'] = site_url('admin/blogs/categories/');
 		$config['total_rows'] = $this->blogscategory_model->get_pagination_count();
 		$config['per_page'] = '10';
 		$config['uri_segment'] = 4;
 		$config['first_link'] = 'First';
 		$config['last_link'] = 'Last';
 		$config['cur_tag_open'] = '<span>';
 		$config['cur_tag_close'] = '</span>';
 		$this->pagination->initialize($config);
 		$content['contents']=$this->blogscategory_model->get_pagination($config['per_page'],$this->uri->segment($config['uri_segment']));
 		$main['content']=$this->load->view('admin/blogs/category/lists',$content,true);
 		$this->load->view('admin/main',$main);
 	}
 	function addcategory()
 	{
 		$this->form_validation->set_rules('name', 'Name', 'required');
 		//$this->form_validation->set_rules('short_desc', 'Short Desc', '');
 		//$this->form_validation->set_rules('keywords', 'Keywords', '');
 		//$this->form_validation->set_rules('breadcrumb_status', 'Breadcrumb Status', 'required');
 		$this->form_validation->set_rules('status', 'Status', 'required');
 		//$this->form_validation->set_message('required', 'required');
 		$this->form_validation->set_error_delimiters('<span class="red">(', ')</span>');
 		if ($this->form_validation->run() == FALSE)
 		{
 			$main['page_title']=$this->config->item('site_name').' - Blog Categories';
 			$main['header']=$this->adminheader();
 			$main['footer']=$this->adminfooter();
 			$main['left']=$this->adminleftmenu();
 			//$add['widgets']=$this->widgets_model->get_rightwidgets();
 			$main['content']=$this->load->view('admin/blogs/category/add','',true);
 			$this->load->view('admin/main',$main);
 		} else {
 			$i=0;
 			$widgets=array();
 			if($this->input->post('widgets'))
 			foreach($this->input->post('widgets') as $widgetrow): $i++;
 				$widgets[]=$widgetrow.':'.$i;
 			endforeach;
 			$widgets=implode(',',$widgets);	
 			$slug=$this->blogscategory_model->create_slug($this->input->post('name'));
 			$maindata=array('status'=>$this->input->post('status'),'breadcrumb_status'=>$this->input->post('breadcrumb_status'),'slug'=>$slug,'widgets'=>$widgets);
 			$descdata=array('name'=>$this->input->post('name'),'short_desc'=>$this->input->post('short_desc'),'keywords'=>$this->input->post('keywords'));
 			$insertid=$this->blogscategory_model->insert($maindata,$descdata);
 			if($insertid){
 				$this->session->set_flashdata('message', '<div class="n_ok flash_messages"><p>Blog category added Successfully.</p></div>');
 				redirect('admin/blogs/categories');
 			} else {
 				$this->session->set_flashdata('message', '<div class="n_error flash_messages"><p>Error!! - Blog category not added.</p></div>');
 				redirect('admin/blogs/categories');
 			}
 		}
 	}
 	function editcategory($id,$return)
 	{
 		$this->form_validation->set_rules('name', 'Name', 'required');
 		//$this->form_validation->set_rules('short_desc', 'Short Desc', '');
 		//$this->form_validation->set_rules('keywords', 'Keywords', '');
 		//$this->form_validation->set_rules('breadcrumb_status', 'Breadcrumb Status', 'required');
 		//$this->form_validation->set_rules('slug', 'Url Slug', 'required|callback_catcode_exists');
 		$this->form_validation->set_rules('status', 'Status', 'required');
 		//$this->form_validation->set_message('required', 'required');
 		$this->form_validation->set_error_delimiters('<span class="red">(', ')</span>');
 		if ($this->form_validation->run() == FALSE)
 		{
 			$main['page_title']=$this->config->item('site_name').' - Blog Categories';
 			$main['header']=$this->adminheader();
 			$main['footer']=$this->adminfooter();
 			$main['left']=$this->adminleftmenu();
 			$edit['return']=$return;
 			$edit['content']= $this->blogscategory_model->load($id);
 			$edit['widgets']=$this->widgets_model->get_rightwidgets();
 			$main['content']=$this->load->view('admin/blogs/category/edit',$edit,true);
 			$this->load->view('admin/main',$main);
 		} else {
 			$new_widgets=$this->input->post('widgets');
 			$categoryrow=$this->blogscategory_model->load($id);
 			$widgets=$this->get_editwidgets($categoryrow,$new_widgets);	
 			$slug=$this->blogscategory_model->update_slug($this->input->post('name'),$id);
 			$maindata=array('status'=>$this->input->post('status'),'breadcrumb_status'=>$this->input->post('breadcrumb_status'),'slug'=>$slug,'widgets'=>$widgets);
 			$descdata=array('name'=>$this->input->post('name'),'short_desc'=>$this->input->post('short_desc'),'keywords'=>$this->input->post('keywords'));
 			$loginid=$this->blogscategory_model->update($maindata,$descdata,$id);
 			if($loginid){
 				$this->session->set_flashdata('message', '<div class="n_ok flash_messages"><p>Blog category updated Successfully.</p></div>');
 				redirect('admin/blogs/categories/'.$return);
 			} else {
 				$this->session->set_flashdata('message', '<div class="n_error flash_messages"><p>Error!! - Blog category not updated.</p></div>');
 				redirect('admin/blogs/categories/'.$return);
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
 		$content['category'] = $this->blogscategory_model->get_row_cond($cond);				
 		$content['widgets'] = $this->widgets_model->get_idpair();		
 		$main['content']=$this->load->view('admin/blogs/category/widget/lists',$content,true);
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
 			$loginid=$this->blogscategory_model->update($data,array(),$categoryid);			
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
 		$loginid=$this->blogscategory_model->delete($id);
 		if($loginid){
 			$this->session->set_flashdata('message', '<div class="n_ok flash_messages"><p>Blog category deleted Successfully.</p></div>');
 			redirect('admin/blogs/categories/'.$return);
 		} else {
 			$this->session->set_flashdata('message', '<div class="n_error flash_messages"><p>Error!! - Blog category not deleted.</p></div>');
 			redirect('admin/blogs/categories/'.$return);
 		}
 	}
 	function categoryactions()
 	{
 		$ids=$this->input->post('id');
 		
 		$sort_orders=$this->input->post('sort_order');
 		$loginid=false;
 		if(isset($_POST['enable']) && $this->input->post('enable')=='Enable'){ $status='Y';}
 		if(isset($_POST['disable']) && $this->input->post('disable')=='Disable'){ $status='N';}
 		if(isset($status) && $ids ){
 			foreach($ids as $id):
 				$data=array('status'=>$status);
 				$loginid=$this->blogscategory_model->update($data,array(),$id);				
 			endforeach;
 			
 			if($loginid){
 				$this->session->set_flashdata('message', '<div class="n_ok flash_messages"><p>Blog category updated Successfully.</p></div>');
 			} else {
 				$this->session->set_flashdata('message', '<div class="n_error flash_messages"><p>Error!! - Blog category not updated.</p></div>');
 			}
 		}
 		
 		if(isset($_POST['sortsave']) && $this->input->post('sortsave')=='Save'){
 		if($sort_orders){
 			foreach($sort_orders as $id => $sort_order):
 				$data=array('sort_order'=>$sort_order);
 				$loginid=$this->blogscategory_model->update($data,array(),$id);				
 			endforeach;		
 			
 			if($loginid){
 				$this->session->set_flashdata('message', '<div class="n_ok flash_messages"><p>Sort order updated Successfully.</p></div>');
 			} else {
 				$this->session->set_flashdata('message', '<div class="n_error flash_messages"><p>Error!! - Sort order not updated.</p></div>');
 			}
 				
 		}
 		}
 		if(isset($_POST['delete']) && $ids){			
 			foreach($ids as $id):
 				$loginid=$this->blogscategory_model->delete($id);				
 			endforeach;
 			if($loginid){
 				$this->session->set_flashdata('message', '<div class="n_ok flash_messages"><p>Blog category Deleted Successfully.</p></div>');
 			} 
 		}
 		redirect('admin/blogs/categories/'.$this->input->post('return'));
 	}
 	function catcode_exists($code)
 	{
 		$id= $this->input->post('id');
 		if ($this->blogs_model->code_exists($code,$id))
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