<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Result extends Ecsfront_Controller {
/*	public function index()
	{
		redirect('home');
	}*/
	public function index($keyword='')
	{
		
		$this->load->model('frontend/pages_model');
		$pagemeta=$this->pages_model->get_row_cond(array('key'=>'search'));
		
		//print_r($pagemeta);
		//if($pagemeta->title!=''){$this->pagetitle=$pagemeta->title;}
		
		$this->pagetitle="Search";
		
		//if($pagemeta->short_desc!=''){$this->desc=$pagemeta->short_desc; }
		//if($pagemeta->keywords!=''){$this->keys=$pagemeta->keywords; }
		if($pagemeta->banner_image!=''){$this->pagebannner=base_url('public/uploads/pages/'.$pagemeta->banner_image); }
		//if($pagemeta->banner_text!=''){$this->pagebannnertext=$pagemeta->banner_text; }
		//$this->right_widgets=$this->widgets_model->get_pagewidgets($pagemeta->widgets);
		$this->breadcrumbarr=array('/'=>$this->alphasettings['BREADCRUMB_START'],site_url('search') =>$this->pagetitle);	
		if($keyword==''){$keyword=$this->input->post('keyword');}
		if($keyword==''){
			$results['error']='No keywords entered';
		} else {
			$this->load->model('frontend/result_model');
			$results['error']='';
			$this->load->library('pagination');
			$config['base_url'] = base_url($this->session->userdata('front_language').'/result/index/'.$keyword);
			$config['total_rows'] = $this->result_model->get_results_count($keyword);
			$config['per_page'] = '10';
			$config['uri_segment'] = 5;
			$config['first_link'] = FALSE;
			$config['last_link'] = FALSE;
			$config['next_link'] = 'Next';
			$config['prev_link'] = 'Prev';
			$config['cur_tag_open'] = '<li class="active"><a>';
			$config['cur_tag_close'] = '</a></li>';
			$config['full_tag_open'] = '<ul class="pagination">';
			$config['full_tag_close'] = '</ul>';
			$config['num_tag_open'] = '<li>';
			$config['num_tag_close'] = '</li>';
			$config['next_tag_open'] = '<li class="right">';
			$config['next_tag_close'] = '</li>';
			$config['prev_tag_open'] = '<li class="left">';
			$config['prev_tag_close'] = '</li>';
			$this->pagination->initialize($config);
			$start=0;
			if($this->uri->segment($config['uri_segment'])!=''){ $start=$this->uri->segment($config['uri_segment']); }
			$results['pagelists']=$this->result_model->get_results($keyword,$start,$config['per_page']);
		}
		
	    $results['homenews']=$this->news_model->get_array_limit(2);
		$frontcontent=$this->load->view('frontend/search/searchresults',$results,true);
		$main['meta']=$this->frontmetahead();
		//$main['contents']=$this->frontcontent($frontcontent,true);
		
		$main['contents']=$frontcontent;
		$main['header']=$this->frontheader();
		$main['footer']=$this->frontfooter();
		$this->load->view('frontend/main',$main);
	}
	
	function load_make()
	{
		$this->load->model('frontend/makes_model');
		$add['makes']=$this->makes_model->get_active($this->input->post('make'));
		$add['mode']=$this->input->post('model');
		$this->load->view('frontend/search/make',$add);//print_r($models);
	}
	
	function load_model()
	{
		$this->load->model('frontend/model_model');
		//$make=explode(",",$this->input->post('make'));
		$add['models']=$this->model_model->load_model($this->input->post('make'));
		$add['mode']=$this->input->post('model');
		$this->load->view('frontend/register/model',$add);//print_r($models);
	}
	
}
/* End of file contents.php */
/* Location: ./application/controllers/contents.php */