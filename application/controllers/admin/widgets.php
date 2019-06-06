<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Widgets extends Web_Controller {
	function __construct()
    {
		// Call the Model constructor
		parent::__construct();
		if(!$this->session->userdata('admin_logged_in'))
		{
		   redirect('admin/login');		
		}
		$this->load->model('widgets_model');	
		$this->load->model('menuitems_model');
		$this->load->model('contentcategory_model');
	}
	public function index()
	{
		redirect('admin/widgets/lists');		
	}
	public function lists()
	{
		$this->load->library('pagination');
		$main['page_title']=$this->config->item('site_name').' - Widgets';
		$main['header']=$this->adminheader();
		$main['footer']=$this->adminfooter();
		$main['left']=$this->adminleftmenu();
		$config['base_url'] = site_url('admin/widgets/lists/');
		$config['total_rows'] = $this->widgets_model->get_pagination_count();
		$config['per_page'] = '10';
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['cur_tag_open'] = '<span>';
		$config['cur_tag_close'] = '</span>';
		$this->pagination->initialize($config);
		$content['widgetfields'] = $this->widgets_model->get_fields();
		$content['sortorders'] = array('asc'=>'Ascending','desc'=>'Descending');
		$content['widget_types']=$this->widgets_model->get_widgettypes();
		$content['widgets']=$this->widgets_model->get_pagination($config['per_page'],$this->uri->segment($config['uri_segment']));
		$main['content']=$this->load->view('admin/widgets/lists',$content,true);
		$this->load->view('admin/main',$main);
	}
	function add()
	{
		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('widget_type', 'Widget Type', 'required');
		$this->form_validation->set_rules('widget_position', 'Widget Postion', 'required');
		$this->form_validation->set_rules('key', 'Key', 'required');
		//$this->form_validation->set_rules('html', 'Html', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');
		$this->form_validation->set_message('required', 'required');
		$this->form_validation->set_error_delimiters('<span class="red">(', ')</span>');
		if ($this->form_validation->run() == FALSE)
		{
			$main['page_title']=$this->config->item('site_name').' - Widgets';
			$main['header']=$this->adminheader();
			$main['footer']=$this->adminfooter();
			$main['left']=$this->adminleftmenu();
			$add['widget_position']=$this->widgets_model->get_widgettypes();
			$add['widget_type']=array('sub_menu'=>'Automatic Sub Menu','menu'=>'Menu Widget','content'=>'Content Menu Widget','html'=>'HTML Widget');
			//$add['widget_submenu']=$this->menuitems_model->get_array(array('parent_id'=>''));
			$add['widget_submenu']=$this->menuitems_model->get_menu_withsubmenu('5');
			$add['content_menu']=$this->contentcategory_model->get_array();
			//$add['check']=$this->menuitems_model->get_array_sub();			
			//print_r($add['widget_submenu1']);			
			$main['content']=$this->load->view('admin/widgets/add',$add,true);
			$this->load->view('admin/main',$main);
		} else {		
			if(@$fldwid!='')
			{
			@$fldwid=implode(",",$this->input->post('widget_parent'));
			}
			else
			{
			@$fldwid='';
			}
			$maindata=array('status'=>$this->input->post('status'),'title'=>$this->input->post('title'),'key'=>$this->input->post('key'),'widget_position'=>$this->input->post('widget_position'),'widget_type'=>$this->input->post('widget_type'),'parent_menu_id'=>$fldwid,'content_category_id'=>$this->input->post('content_menu'));
			$descdata=array('html'=>$this->input->post('html'));
			$insertid=$this->widgets_model->insert($maindata,$descdata);
			if($insertid){
				$this->session->set_flashdata('message', '<div class="n_ok flash_messages"><p>Widget added Successfully.</p></div>');
				redirect('admin/widgets/lists');
			} else {
				$this->session->set_flashdata('message', '<div class="n_error flash_messages"><p>Error!! - Widget not added.</p></div>');
				redirect('admin/widgets/lists');
			}
		}
	}
	
	function edit($id,$return)
	{
		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('widget_type', 'Widget Type', 'required');
		$this->form_validation->set_rules('key', 'Key', 'required');
		//$this->form_validation->set_rules('html', 'Html', 'required');
		$this->form_validation->set_rules('status', 'Status', 'required');
		$this->form_validation->set_message('required', 'required');
		$this->form_validation->set_error_delimiters('<span class="red">(', ')</span>');
		if ($this->form_validation->run() == FALSE)
		{
			$main['page_title']=$this->config->item('site_name').' - Widgets';
			$main['header']=$this->adminheader();
			$main['footer']=$this->adminfooter();
			$main['left']=$this->adminleftmenu();
			$edit['return']=$return;
			$edit['widget_types']=$this->widgets_model->get_widgettypes();
			$edit['widget']= $this->widgets_model->load($id);
			
			@$parentm=$edit['widget']->parent_menu_id;
			
			$edit['widget_type']=array('sub_menu'=>'Automatic Sub Menu','menu'=>'Menu Widget','content'=>'Content Menu Widget','html'=>'HTML Widget');
			$edit['widget_submenu']=$this->menuitems_model->get_menu_withsubmenu('5');
			//$edit['multiple']=$this->menuitems_model->get_mutiple(array('content_category_id'=>$parentm));
			@$fldwid = explode(",",stripslashes($parentm));
			
			
			$edit['content_menu']=$this->contentcategory_model->get_array();
			$main['content']=$this->load->view('admin/widgets/edit',$edit,true);
			$this->load->view('admin/main',$main);
		} else {
		@$fldwid=$this->input->post('widget_parent');
		if(@$fldwid!='')
		{
		@$fldwid=implode(",",$this->input->post('widget_parent'));
		}
		else
		{
		@$fldwid='';
		}
			$maindata=array('status'=>$this->input->post('status'),'title'=>$this->input->post('title'),'key'=>$this->input->post('key'),'widget_type'=>$this->input->post('widget_type'),'widget_position'=>$this->input->post('widget_position'),'parent_menu_id'=>$fldwid,'content_category_id'=>$this->input->post('content_menu'));
			$descdata=array('html'=>$this->input->post('html'));
			$loginid=$this->widgets_model->update($maindata,$descdata,$id);
			if($loginid){
				$this->session->set_flashdata('message', '<div class="n_ok flash_messages"><p>Widget updated Successfully.</p></div>');
				redirect('admin/widgets/lists/'.$return);
			} else {
				$this->session->set_flashdata('message', '<div class="n_error flash_messages"><p>Error!! - Widget not updated.</p></div>');
				redirect('admin/widgets/lists/'.$return);
			}
		}
	}
	
	function actions()
	{
		$loginid = false;
		$ids=$this->input->post('id');
		$sort_orders=$this->input->post('sort_order');
		if(isset($_POST['enable']) && $this->input->post('enable')=='Enable'){ $status='Y';}
		if(isset($_POST['disable']) && $this->input->post('disable')=='Disable'){ $status='N';}
		if(isset($_POST['sortsave']) && $this->input->post('sortsave')=='Save' && count($sort_orders)>0){
			foreach($sort_orders as $id => $sort_order):
				$data=array('sort_order'=>$sort_order);
				$loginid=$this->widgets_model->update($data,array(),$id);				
			endforeach;			
		}
		if(isset($_POST['reset']) && $this->input->post('reset')=='Reset'){
			$newdata = array(
				   'widget_key'  => '',
				   'widget_field'  => '',
				   'widget_type_key'  => '',
				   'order_field'=>'',
				   'sort_field' =>''
			);
			$this->session->unset_userdata($newdata);
			redirect('admin/widgets/lists/');
		}
		if(isset($_POST['search']) && $this->input->post('search')=='Search'){
			if($this->input->post('keyword')!='' || $this->input->post('widget_type')!='' ||  $this->input->post('sortby')!=''){
				$newdata = array(
					   'widget_key'  => $this->input->post('keyword'),
					   'widget_field'  => $this->input->post('field'),
					   'widget_type_key'  => $this->input->post('widget_type'),
					   'order_field' =>  $this->input->post('orderby'),
					   'sort_field' => $this->input->post('sortby') 
				);
				$this->session->set_userdata($newdata);
			} else {
				$newdata = array(
					   'widget_key'  => '',
					   'widget_field' => '',
					   'widget_type_key'  => '',
					   'order_field' => '',
					   'sort_field' =>''
				);
				$this->session->unset_userdata($newdata);
			}
			redirect('admin/widgets/lists/');
		}
		if(isset($status) && $ids){
				foreach($ids as $id):
					$data=array('status'=>$status);
					$loginid=$this->widgets_model->update($data,array(),$id);	
				endforeach;
		}
		if($loginid){
			$this->session->set_flashdata('message', '<div class="n_ok flash_messages"><p>Widget updated Successfully</p></div>');
		} else {
			$this->session->set_flashdata('message', '<div class="n_error flash_messages"><p>Error!! - Widget not updated.</p></div>');
		}
		redirect('admin/widgets/lists/'.$this->input->post('return'));
	}	
	
	public function replacewidget()
	{
		$this->load->library('pagination');
		$main['page_title']=$this->config->item('site_name').' - Widgets';
		$main['header']=$this->adminheader();
		$main['footer']=$this->adminfooter();
		$main['left']=$this->adminleftmenu();		
		$content['widgets']=$this->widgets_model->get_array();
		$main['content']=$this->load->view('admin/widgets/replacewidget',$content,true);
		$this->load->view('admin/main',$main);
	}	
	
}
/* End of file widgets.php */
/* Location: ./application/controllers/admin/widgets.php */