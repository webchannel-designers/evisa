<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Enquires extends Web_Controller {
	function __construct()
    {
		// Call the Model constructor
		parent::__construct();
		if(!$this->session->userdata('admin_logged_in'))
		{
		   redirect('admin/login');		
		}
		$this->load->model('callback_model');
		$this->load->model('withdrawal_model');
		$this->load->model('transfers_model');
		$this->load->model('leverages_model');	
		$this->load->model('demoaccounts_model');
		$this->load->model('individualaccount_model');
		$this->load->model('corporateaccount_model');			
	}
		
	public function index()
	{
		redirect('admin/enquires/lists');		
	}
	
	public function callback()
	{
		$this->load->library('pagination');
		$main['page_title']=$this->config->item('site_name').' - Callbacks';
		$main['header']=$this->adminheader();
		$main['footer']=$this->adminfooter();
		$main['left']=$this->adminleftmenu();
		$config['base_url'] = site_url('admin/enquires/callback/');
		$config['total_rows'] = $this->callback_model->get_pagination_count();
		$config['per_page'] = '10';
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['cur_tag_open'] = '<span>';
		$config['cur_tag_close'] = '</span>';
		$this->pagination->initialize($config);
		$content['callbacks']=$this->callback_model->get_pagination($config['per_page'],$this->uri->segment($config['uri_segment']));
		$main['content']=$this->load->view('admin/enquires/callback/lists',$content,true);
		$this->load->view('admin/main',$main);		
	}
		
	function callback_view($id,$return)
	{
		$main['page_title']=$this->config->item('site_name').' - Enquires';
		$main['header']=$this->adminheader();
		$main['footer']=$this->adminfooter();
		$main['left']=$this->adminleftmenu();
		$edit['return']=$return;
		$edit['callback']= $this->callback_model->load($id);
		$main['content']=$this->load->view('admin/enquires/callback/view',$edit,true);
		$this->load->view('admin/main',$main);		
	}
	
	function callback_delete($id,$return)
	{
		$cond=array('id'=>$id);
		$calbackid=$this->callback_model->delete($cond);
		if($calbackid){
			$this->session->set_flashdata('message', '<div class="n_ok flash_messages"><p>Record deleted Successfully.</p></div>');
			redirect('admin/enquires/callback/'.$return);
		} else {
			$this->session->set_flashdata('message', '<div class="n_error flash_messages"><p>Error!! - Record not deleted.</p></div>');
			redirect('admin/enquires/callback/'.$return);
		}
	}
	
	
	public function withdrawal()
	{
		$this->load->library('pagination');
		$main['page_title']=$this->config->item('site_name').' - Withdrawals';
		$main['header']=$this->adminheader();
		$main['footer']=$this->adminfooter();
		$main['left']=$this->adminleftmenu();
		$config['base_url'] = site_url('admin/enquires/withdrawal/');
		$config['total_rows'] = $this->withdrawal_model->get_pagination_count();
		$config['per_page'] = '10';
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['cur_tag_open'] = '<span>';
		$config['cur_tag_close'] = '</span>';
		$this->pagination->initialize($config);
		$content['withdrawals']=$this->withdrawal_model->get_pagination($config['per_page'],$this->uri->segment($config['uri_segment']));
		$main['content']=$this->load->view('admin/enquires/withdrawal/lists',$content,true);
		$this->load->view('admin/main',$main);		
	}
	
	function withdrawal_view($id,$return)
	{
		$main['page_title']=$this->config->item('site_name').' - Enquires';
		$main['header']=$this->adminheader();
		$main['footer']=$this->adminfooter();
		$main['left']=$this->adminleftmenu();
		$edit['return']=$return;
		$edit['withdrawal']= $this->withdrawal_model->load($id);
		$main['content']=$this->load->view('admin/enquires/withdrawal/view',$edit,true);
		$this->load->view('admin/main',$main);		
	}
	
	function withdrawal_delete($id,$return)
	{
		$cond=array('id'=>$id);
		$withdrawalid=$this->withdrawal_model->delete($cond);
		if($withdrawalid){
			$this->session->set_flashdata('message', '<div class="n_ok flash_messages"><p>Record deleted Successfully.</p></div>');
			redirect('admin/enquires/withdrawal/'.$return);
		} else {
			$this->session->set_flashdata('message', '<div class="n_error flash_messages"><p>Error!! - Record not deleted.</p></div>');
			redirect('admin/enquires/withdrawal/'.$return);
		}
	}
	
	
	public function transfer()
	{
		$this->load->library('pagination');
		$main['page_title']=$this->config->item('site_name').' - Transfers';
		$main['header']=$this->adminheader();
		$main['footer']=$this->adminfooter();
		$main['left']=$this->adminleftmenu();
		$config['base_url'] = site_url('admin/enquires/transfer/');
		$config['total_rows'] = $this->transfers_model->get_pagination_count();
		$config['per_page'] = '10';
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['cur_tag_open'] = '<span>';
		$config['cur_tag_close'] = '</span>';
		$this->pagination->initialize($config);
		$content['transfers']=$this->transfers_model->get_pagination($config['per_page'],$this->uri->segment($config['uri_segment']));
		$main['content']=$this->load->view('admin/enquires/transfer/lists',$content,true);
		$this->load->view('admin/main',$main);		
	}
	
	function transfer_view($id,$return)
	{
		$main['page_title']=$this->config->item('site_name').' - Enquires';
		$main['header']=$this->adminheader();
		$main['footer']=$this->adminfooter();
		$main['left']=$this->adminleftmenu();
		$edit['return']=$return;
		$edit['transfer']= $this->transfers_model->load($id);
		$main['content']=$this->load->view('admin/enquires/transfer/view',$edit,true);
		$this->load->view('admin/main',$main);		
	}
	
	function transfer_delete($id,$return)
	{
		$cond=array('id'=>$id);
		$transferid=$this->transfers_model->delete($cond);
		if($transferid){
			$this->session->set_flashdata('message', '<div class="n_ok flash_messages"><p>Record deleted Successfully.</p></div>');
			redirect('admin/enquires/transfer/'.$return);
		} else {
			$this->session->set_flashdata('message', '<div class="n_error flash_messages"><p>Error!! - Record not deleted.</p></div>');
			redirect('admin/enquires/transfer/'.$return);
		}
	}
	
	
	public function leverage()
	{
		$this->load->library('pagination');
		$main['page_title']=$this->config->item('site_name').' - Leverage Change';
		$main['header']=$this->adminheader();
		$main['footer']=$this->adminfooter();
		$main['left']=$this->adminleftmenu();
		$config['base_url'] = site_url('admin/enquires/leverage/');
		$config['total_rows'] = $this->leverages_model->get_pagination_count();
		$config['per_page'] = '10';
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['cur_tag_open'] = '<span>';
		$config['cur_tag_close'] = '</span>';
		$this->pagination->initialize($config);
		$content['leverages']=$this->leverages_model->get_pagination($config['per_page'],$this->uri->segment($config['uri_segment']));
		$main['content']=$this->load->view('admin/enquires/leverage/lists',$content,true);
		$this->load->view('admin/main',$main);		
	}
	
	function leverage_view($id,$return)
	{
		$main['page_title']=$this->config->item('site_name').' - Enquires';
		$main['header']=$this->adminheader();
		$main['footer']=$this->adminfooter();
		$main['left']=$this->adminleftmenu();
		$edit['return']=$return;
		$edit['leverage']= $this->leverages_model->load($id);
		$main['content']=$this->load->view('admin/enquires/leverage/view',$edit,true);
		$this->load->view('admin/main',$main);		
	}
	
	function leverage_delete($id,$return)
	{
		$cond=array('id'=>$id);
		$leverageid=$this->leverages_model->delete($cond);
		if($leverageid){
			$this->session->set_flashdata('message', '<div class="n_ok flash_messages"><p>Record deleted Successfully.</p></div>');
			redirect('admin/enquires/leverage/'.$return);
		} else {
			$this->session->set_flashdata('message', '<div class="n_error flash_messages"><p>Error!! - Record not deleted.</p></div>');
			redirect('admin/enquires/leverage/'.$return);
		}
	}
	
	public function demo()
	{
		$this->load->library('pagination');
		$main['page_title']=$this->config->item('site_name').' - Demo Accounts';
		$main['header']=$this->adminheader();
		$main['footer']=$this->adminfooter();
		$main['left']=$this->adminleftmenu();
		$config['base_url'] = site_url('admin/enquires/demo/');
		$config['total_rows'] = $this->demoaccounts_model->get_pagination_count();
		$config['per_page'] = '10';
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['cur_tag_open'] = '<span>';
		$config['cur_tag_close'] = '</span>';
		$this->pagination->initialize($config);
		$content['demos']=$this->demoaccounts_model->get_pagination($config['per_page'],$this->uri->segment($config['uri_segment']));
		$main['content']=$this->load->view('admin/enquires/demo/lists',$content,true);
		$this->load->view('admin/main',$main);		
	}
	
	function demo_view($id,$return)
	{
		$main['page_title']=$this->config->item('site_name').' - Enquires';
		$main['header']=$this->adminheader();
		$main['footer']=$this->adminfooter();
		$main['left']=$this->adminleftmenu();
		$edit['return']=$return;
		$edit['demo']= $this->demoaccounts_model->load($id);
		$main['content']=$this->load->view('admin/enquires/demo/view',$edit,true);
		$this->load->view('admin/main',$main);		
	}
	
	function demo_delete($id,$return)
	{
		$cond=array('id'=>$id);
		$demoid=$this->demoaccounts_model->delete($cond);
		if($demoid){
			$this->session->set_flashdata('message', '<div class="n_ok flash_messages"><p>Record deleted Successfully.</p></div>');
			redirect('admin/enquires/demo/'.$return);
		} else {
			$this->session->set_flashdata('message', '<div class="n_error flash_messages"><p>Error!! - Record not deleted.</p></div>');
			redirect('admin/enquires/demo/'.$return);
		}
	}
	
	public function individual()
	{
		$this->load->library('pagination');
		$main['page_title']=$this->config->item('site_name').' - Individual Accounts';
		$main['header']=$this->adminheader();
		$main['footer']=$this->adminfooter();
		$main['left']=$this->adminleftmenu();
		$config['base_url'] = site_url('admin/enquires/individual/');
		$config['total_rows'] = $this->individualaccount_model->get_pagination_count();
		$config['per_page'] = '10';
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['cur_tag_open'] = '<span>';
		$config['cur_tag_close'] = '</span>';
		$this->pagination->initialize($config);
		$content['individuals']=$this->individualaccount_model->get_pagination($config['per_page'],$this->uri->segment($config['uri_segment']));
		$main['content']=$this->load->view('admin/enquires/individual/lists',$content,true);
		$this->load->view('admin/main',$main);		
	}
	
	function individual_view($id,$return)
	{
		$main['page_title']=$this->config->item('site_name').' - Enquires';
		$main['header']=$this->adminheader();
		$main['footer']=$this->adminfooter();
		$main['left']=$this->adminleftmenu();
		$edit['return']=$return;
		$edit['individual']= $this->individualaccount_model->load($id);
		$main['content']=$this->load->view('admin/enquires/individual/view',$edit,true);
		$this->load->view('admin/main',$main);		
	}
	
	function individual_delete($id,$return)
	{
		$cond=array('id'=>$id);
		$individualid=$this->individualaccount_model->delete($cond);
		if($individualid){
			$this->session->set_flashdata('message', '<div class="n_ok flash_messages"><p>Record deleted Successfully.</p></div>');
			redirect('admin/enquires/individual/'.$return);
		} else {
			$this->session->set_flashdata('message', '<div class="n_error flash_messages"><p>Error!! - Record not deleted.</p></div>');
			redirect('admin/enquires/individual/'.$return);
		}
	}
	
	public function corporate()
	{
		$this->load->library('pagination');
		$main['page_title']=$this->config->item('site_name').' - Corporate Accounts';
		$main['header']=$this->adminheader();
		$main['footer']=$this->adminfooter();
		$main['left']=$this->adminleftmenu();
		$config['base_url'] = site_url('admin/enquires/corporate/');
		$config['total_rows'] = $this->corporateaccount_model->get_pagination_count();
		$config['per_page'] = '10';
		$config['uri_segment'] = 4;
		$config['first_link'] = 'First';
		$config['last_link'] = 'Last';
		$config['cur_tag_open'] = '<span>';
		$config['cur_tag_close'] = '</span>';
		$this->pagination->initialize($config);
		$content['corporates']=$this->corporateaccount_model->get_pagination($config['per_page'],$this->uri->segment($config['uri_segment']));
		$main['content']=$this->load->view('admin/enquires/corporate/lists',$content,true);
		$this->load->view('admin/main',$main);		
	}
	
	function corporate_view($id,$return)
	{
		$main['page_title']=$this->config->item('site_name').' - Enquires';
		$main['header']=$this->adminheader();
		$main['footer']=$this->adminfooter();
		$main['left']=$this->adminleftmenu();
		$edit['return']=$return;
		$edit['corporate']= $this->corporateaccount_model->load($id);
		$main['content']=$this->load->view('admin/enquires/corporate/view',$edit,true);
		$this->load->view('admin/main',$main);		
	}
	
	function corporate_delete($id,$return)
	{
		$cond=array('id'=>$id);
		$corporateid=$this->corporateaccount_model->delete($cond);
		if($corporateid){
			$this->session->set_flashdata('message', '<div class="n_ok flash_messages"><p>Record deleted Successfully.</p></div>');
			redirect('admin/enquires/corporate/'.$return);
		} else {
			$this->session->set_flashdata('message', '<div class="n_error flash_messages"><p>Error!! - Record not deleted.</p></div>');
			redirect('admin/enquires/corporate/'.$return);
		}
	}
	
	
}
/* End of file users.php */
/* Location: ./application/controllers/admin/users.php */