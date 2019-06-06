<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Newsletter extends Visafront_Controller {

	public function index()

	{

		redirect('home');

	}
	
	public function add()
	{
			$this->load->model('frontend/newsletter_model');
			
			$descdata=array('news_email'=>$this->input->post('newsletter'),'news_name'=>$this->input->post('name'));
			
			$checkid=$this->newsletter_model->checking($this->input->post('newsletter'));
			
			if($checkid > 0)
			{
			echo "This Email-Id Already Exists";
			}
			else
			{
			$insertid=$this->newsletter_model->insert($this->input->post('newsletter'),$descdata);

			if($insertid){
			
			echo "Email added Successfully";

				//$this->session->set_flashdata('message', '<div class="n_ok flash_messages"><p>Banner added Successfully.</p></div>');

				//redirect('admin/banners/lists');

			} else {
			
			echo "!!Error";

				//$this->session->set_flashdata('message', '<div class="n_error flash_messages"><p>Error!! - Banner not added.</p></div>');

				//redirect('admin/banners/lists');

			}
			}

	}

	public function results($keyword='')

	{

		$this->load->model('frontend/pages_model');

		$pagemeta=$this->pages_model->get_row_cond(array('key'=>'search'));

		if($pagemeta->title!=''){$this->pagetitle=$pagemeta->title;}

		if($pagemeta->short_desc!=''){$this->desc=$pagemeta->short_desc; }

		if($pagemeta->keywords!=''){$this->keys=$pagemeta->keywor; }

		if($pagemeta->banner_image!=''){$this->pagebannner=base_url('public/uploads/pages/'.$pagemeta->banner_image); }

		if($pagemeta->banner_text!=''){$this->pagebannnertext=$pagemeta->banner_text; }

		$this->right_widgets=$this->widgets_model->get_pagewidgets($pagemeta->widgets);

		$this->breadcrumbarr=array('/'=>$this->alphasettings['BREADCRUMB_START'],site_url('search') =>$this->pagetitle);	

		if($keyword==''){$keyword=$this->input->post('keyword');}

		if($keyword==''){

			$results['error']='No keywords enterd';

		} else {

			$this->load->model('frontend/search_model');

			$results['error']='';

			$this->load->library('pagination');

			$config['base_url'] = base_url($this->session->userdata('front_language').'/search/results/'.$keyword);

			$config['total_rows'] = $this->search_model->get_results_count($keyword);

			$config['per_page'] = '10';

			$config['uri_segment'] = 5;

			$config['first_link'] = FALSE;

			$config['last_link'] = FALSE;

			$config['next_link'] = '<img src="'.base_url('public/frontend/images/page_next.png').'" border="0" />';

			$config['prev_link'] = '<img src="'.base_url('public/frontend/images/page_prev.png').'" border="0" />';

			$config['cur_tag_open'] = '<li class="active">';

			$config['cur_tag_close'] = '</li>';

			$config['full_tag_open'] = '<ul>';

			$config['full_tag_close'] = '</ul>';

			$config['num_tag_open'] = '<li>';

			$config['num_tag_close'] = '</li>';

			$config['next_tag_open'] = '<li>';

			$config['next_tag_close'] = '</li>';

			$config['prev_tag_open'] = '<li>';

			$config['prev_tag_close'] = '</li>';

			$this->pagination->initialize($config);

			$start=0;

			if($this->uri->segment($config['uri_segment'])!=''){ $start=$this->uri->segment($config['uri_segment']); }

			$results['pagelists']=$this->search_model->get_results($keyword,$start,$config['per_page']);

		}

		$frontcontent=$this->load->view('frontend/search/results',$results,true);

		$main['meta']=$this->frontmetahead();

		$main['contents']=$this->frontcontent($frontcontent);

		$main['header']=$this->frontheader();

		$main['footer']=$this->frontfooter();

		$main['stockticker']=$this->frontstockticker();

		$this->load->view('frontend/main',$main);

	}

	

}

/* End of file contents.php */

/* Location: ./application/controllers/contents.php */