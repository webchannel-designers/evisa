<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pages extends Web_Controller {

	function __construct()

    {

		// Call the Model constructor

		parent::__construct();

		if(!$this->session->userdata('admin_logged_in'))

		{

		   redirect('admin/login');		

		}

		

		$this->load->model('pages_model');

		$this->load->model('widgets_model');	

	}

		

	public function index()

	{

		redirect('admin/pages/lists');		

	}

	

	public function lists()

	{

		$this->load->library('pagination');

		$main['page_title']=$this->config->item('site_name').' - Page Meta';

		$main['header']=$this->adminheader();

		$main['footer']=$this->adminfooter();

		$main['left']=$this->adminleftmenu();

		$config['base_url'] = site_url('admin/pages/lists/');

		$config['total_rows'] = $this->pages_model->get_pagination_count();

		$config['per_page'] = '10';

		$config['uri_segment'] = 4;

		$config['first_link'] = 'First';

		$config['last_link'] = 'Last';

		$config['cur_tag_open'] = '<span>';

		$config['cur_tag_close'] = '</span>';

		$this->pagination->initialize($config);

		$content['pages']=$this->pages_model->get_pagination($config['per_page'],$this->uri->segment($config['uri_segment']));

		$main['content']=$this->load->view('admin/pages/lists',$content,true);

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

		$this->form_validation->set_rules('key', 'Key', 'required');

		$this->form_validation->set_rules('short_desc', 'Short Description', '');

		$this->form_validation->set_rules('keywords', 'Keywords', '');

		$this->form_validation->set_rules('desc', 'Description', 'required');		

		$this->form_validation->set_rules('status', 'Status', 'required');

		$this->form_validation->set_message('required', 'required');

		$this->form_validation->set_error_delimiters('<span class="red">(', ')</span>');

		if ($this->form_validation->run() == FALSE)

		{

			$main['page_title']=$this->config->item('site_name').' - Page Meta';

			$main['header']=$this->adminheader();

			$main['footer']=$this->adminfooter();

			$main['left']=$this->adminleftmenu();	

			$add['widgets']=$this->widgets_model->get_rightwidgets();		

			$main['content']=$this->load->view('admin/pages/add',$add,true);

			$this->load->view('admin/main',$main);

		} else {

			

			$banner_image='';

							

			$config['upload_path'] = 'public/uploads/pages';

			$config['allowed_types'] = 'gif|jpg|png';

			$this->load->library('upload', $config);

			if($this->upload->do_upload('banner_image'))

			{

				$banner_imagedata=$this->upload->data();

				$banner_image=$banner_imagedata['file_name'];

			}

			$i=0;

			$widgets=array();

			if($this->input->post('widgets'))

			foreach($this->input->post('widgets') as $widgetrow): $i++;

				$widgets[]=$widgetrow.':'.$i;

			endforeach;

			$widgets=implode(',',$widgets);	

			

			$maindata=array('status'=>$this->input->post('status'),'key'=>$this->input->post('key'),'widgets'=>$widgets);

			$descdata=array('title'=>$this->input->post('title'),'short_desc'=>$this->input->post('short_desc'),'keywords'=>$this->input->post('keywords'),'desc'=>$this->input->post('desc'),'banner_text'=>$this->input->post('banner_text'),'banner_image'=>$banner_image);

			$insertid=$this->pages_model->insert($maindata,$descdata);

			if($insertid){

				$this->session->set_flashdata('message', '<div class="n_ok flash_messages"><p>Content added Successfully.</p></div>');

				redirect('admin/pages/lists');

			} else {

				$this->session->set_flashdata('message', '<div class="n_error flash_messages"><p>Error!! - Content not added.</p></div>');

				redirect('admin/pages/lists');

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

		$this->form_validation->set_rules('key', 'Key', 'required');

		$this->form_validation->set_rules('short_desc', 'Short Description', '');

		$this->form_validation->set_rules('keywords', 'Keywords', '');

		$this->form_validation->set_rules('desc', 'Description', 'required');		

		$this->form_validation->set_rules('status', 'Status', 'required');

		$this->form_validation->set_message('required', 'required');

		$this->form_validation->set_error_delimiters('<span class="red">(', ')</span>');

		if ($this->form_validation->run() == FALSE)

		{

			$main['page_title']=$this->config->item('site_name').' - Page Meta';

			$main['header']=$this->adminheader();

			$main['footer']=$this->adminfooter();

			$main['left']=$this->adminleftmenu();

			$edit['return']=$return;		

			$edit['page']= $this->pages_model->load($id);

			$edit['widgets']=$this->widgets_model->get_rightwidgets();

			$main['content']=$this->load->view('admin/pages/edit',$edit,true);

			$this->load->view('admin/main',$main);

		} else {

			@$new_widgets=$this->input->post('widgets');

			$pagerow=$this->pages_model->load($id);

			@$widgets=$this->get_editwidgets($pagerow,$new_widgets);				

			$maindata=array('status'=>$this->input->post('status'),'key'=>$this->input->post('key'),'widgets'=>$widgets);

			$descdata=array('title'=>$this->input->post('title'),'short_desc'=>$this->input->post('short_desc'),'keywords'=>$this->input->post('keywords'),'desc'=>$this->input->post('desc'),'banner_text'=>$this->input->post('banner_text'));

			$config['upload_path'] = 'public/uploads/pages';

			$config['allowed_types'] = 'gif|jpg|png';

			$this->load->library('upload', $config);

			if($this->upload->do_upload('banner_image'))

			{

				$banner_imagedata=$this->upload->data();

				$descdata['banner_image']=$banner_imagedata['file_name'];

			}		

			

			$loginid=$this->pages_model->update($maindata,$descdata,$id);

			if($loginid){

				$this->session->set_flashdata('message', '<div class="n_ok flash_messages"><p>Content updated Successfully.</p></div>');

				redirect('admin/pages/lists/'.$return);

			} else {

				$this->session->set_flashdata('message', '<div class="n_error flash_messages"><p>Error!! - Content not updated.</p></div>');

				redirect('admin/pages/lists/'.$return);

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

				foreach($new_widgets as $widgetrow): $i++;

					$widgets[]=$widgetrow.':'.$i;

				endforeach;

				$widgets=implode(',',$widgets);

			}

			return $widgets;

	}

	

	public function pagewidgets($id)

	{

		$main['page_title']=$this->config->item('site_name').' - page Widgets';

		$main['header']=$this->adminheader();

		$main['footer']=$this->adminfooter();

		$main['left']=$this->adminleftmenu();

		$cond=array('id'=>$id);				

		$content['page'] = $this->pages_model->get_row_cond($cond);				

		$content['widgets'] = $this->widgets_model->get_idpair();		

		$main['content']=$this->load->view('admin/pages/widget/lists',$content,true);

		$this->load->view('admin/main',$main);

	}

	

	function widgetactions($pageid)

	{

		$loginid=false;		

		$sort_orders=$this->input->post('sort_order');		

		if(isset($_POST['sortsave']) && $this->input->post('sortsave')=='Save' && $sort_orders){

			foreach($sort_orders as $id => $val):

				$sort_order[]=	$id.':'.$val;							

			endforeach;

			$sort_order=implode(',',$sort_order);

			$data=array('widgets'=>$sort_order);

			$loginid=$this->pages_model->update($data,array(),$pageid);			

		}		

		if($loginid){

			$this->session->set_flashdata('message', '<div class="n_ok flash_messages"><p>page updated Successfully.</p></div>');

		} else {

			$this->session->set_flashdata('message', '<div class="n_error flash_messages"><p>Error!! - page not updated.</p></div>');

		}

		redirect('admin/pages/lists/'.$this->input->post('return'));

	}

	

	function delete($id,$return)

	{

		$loginid=$this->pages_model->delete($id);

		if($loginid){

			$this->session->set_flashdata('message', '<div class="n_ok flash_messages"><p>Content deleted Successfully.</p></div>');

			redirect('admin/pages/lists/'.$return);

		} else {

			$this->session->set_flashdata('message', '<div class="n_error flash_messages"><p>Error!! - Content not deleted.</p></div>');

			redirect('admin/pages/lists/'.$return);

		}

	}

	

	function actions()

	{

		$loginid = false;

		$ids=$this->input->post('id');

		if(isset($_POST['enable']) && $this->input->post('enable')=='Enable'){ $status='Y';}

		if(isset($_POST['disable']) && $this->input->post('disable')=='Disable'){ $status='N';}

		if($ids && isset($status)){

			foreach($ids as $id):

				$data=array('status'=>$status);

				$loginid=$this->pages_model->update($data,array(),$id);				

			endforeach;

		}

		if($loginid){

			$this->session->set_flashdata('message', '<div class="n_ok flash_messages"><p>Page Meta updated Successfully.</p></div>');

		} else {

			$this->session->set_flashdata('message', '<div class="n_error flash_messages"><p>Error!! - Page Meta not updated.</p></div>');

		}

		if(isset($_POST['delete']) && $ids){			

			foreach($ids as $id):

				$loginid=$this->pages_model->delete($id);				

			endforeach;

			if($loginid){

				$this->session->set_flashdata('message', '<div class="n_ok flash_messages"><p>Page Meta Deleted Successfully.</p></div>');

			} 

		}

		redirect('admin/pages/lists/'.$this->input->post('return'));	

	}

	

	

}

/* End of file pages.php */

/* Location: ./application/controllers/admin/pages.php */