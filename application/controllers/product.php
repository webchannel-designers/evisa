<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product extends Officefront_Controller {
	
	public function index()

	{
		//print_r($_POST);
		$this->load->model('frontend/pages_model');
		$this->load->model('frontend/login_model');
		$this->load->model('frontend/location_model');
		$this->load->model('frontend/products_model');
		$this->load->model('frontend/productcategory_model');
		$this->load->model('frontend/makes_model');
		$this->load->model('frontend/model_model');
		
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
		
		//$keyword = $city."/".$make."/".$model."/".$category."/".$yearfrom."/".$yearto."/".$pricefrom."/".$priceto."/".$type;

			$this->load->model('frontend/search_model');

			$results['error']='';

			$this->load->library('pagination');

			$config['base_url'] = base_url($this->session->userdata('front_language').'/product/index?');
			
			foreach ($_GET as $key=>$value) {
			   if ($key != 'search' && $key != 'offset') {
				   $config['base_url'] .= '&'.$key.'='.$value;
			   }
			}
			
			$config['total_rows'] = $this->search_model->get_results_count($_GET);

			$config['per_page'] = '150';

			//$config['uri_segment'] = 14;
			
			$config['query_string_segment'] = 'offset'; 
			
 			$config['page_query_string'] = true;
			
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

			 if (!empty($_GET['offset'])) {
			   $offset = $_GET['offset'];
			} else {
			   $offset = 0;
			}
			
			//echo $start;

			$results['pagelists']=$this->search_model->get_results($_GET,$offset,$config['per_page']);
			
			$results['categories']=$this->productcategory_model->get_active();
			
			$results['brands']=$this->makes_model->get_active(@$_GET['category']);
			
			$results['models']=$this->model_model->load_model(@$_GET['make']);
			
			$results['items']=$this->products_model->get_array_cond(array('model_id'=>@$_GET['model']));

			//print_r($results['pagelists']);

		$frontcontent=$this->load->view('frontend/search/results',$results,true);

		$main['meta']=$this->frontmetahead();

		//$main['contents']=$this->frontcontent($frontcontent,true);
		
		$main['contents']=$frontcontent;

		$main['header']=$this->frontheader();

		$main['footer']=$this->frontfooter();

		$this->load->view('frontend/main',$main);

	}
	
	public function result()

	{
		$this->load->model('frontend/pages_model');
		$this->load->model('frontend/login_model');
		$this->load->model('frontend/location_model');
		$this->load->model('frontend/products_model');
		$this->load->model('frontend/productcategory_model');
		$this->load->model('frontend/makes_model');
		$this->load->model('frontend/model_model');
		
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
		
		//$keyword = $city."/".$make."/".$model."/".$category."/".$yearfrom."/".$yearto."/".$pricefrom."/".$priceto."/".$type;

			$this->load->model('frontend/search_model');

			$results['error']='';

			$this->load->library('pagination');

			$config['base_url'] = base_url($this->session->userdata('front_language').'/product/index?');
			
			foreach ($_GET as $key=>$value) {
			   if ($key != 'search' && $key != 'offset') {
				   $config['base_url'] .= '&'.$key.'='.$value;
			   }
			}
			
			$config['total_rows'] = $this->search_model->get_results_count($_GET);

			$config['per_page'] = '150';

			//$config['uri_segment'] = 14;
			
			$config['query_string_segment'] = 'offset'; 
			
 			$config['page_query_string'] = true;
			
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

			 if (!empty($_GET['offset'])) {
			   $offset = $_GET['offset'];
			} else {
			   $offset = 0;
			}
			
			//echo $start;

			$results['pagelists']=$this->search_model->get_results($_GET,$offset,$config['per_page']);
			
			$results['categories']=$this->productcategory_model->get_active();
			
			$results['brands']=$this->makes_model->get_active(@$_GET['category']);
			
			$results['models']=$this->model_model->load_model(@$_GET['make']);
			
			$results['items']=$this->products_model->get_array_cond(array('model_id'=>@$_GET['model']));

			//print_r($results['pagelists']);

		$this->load->view('frontend/search/results2',$results);

		//$main['meta']=$this->frontmetahead();

		//$main['contents']=$this->frontcontent($frontcontent,true);
		
		//$main['contents']=$frontcontent;

		//$main['header']=$this->frontheader();

		//$main['footer']=$this->frontfooter();

		//$this->load->view('frontend/main',$main);

	}


//	public function index()
//
//	{
//		//print_r($_POST);die;
//		$this->load->model('frontend/pages_model');
//		$this->load->model('frontend/login_model');
//		$this->load->model('frontend/location_model');
//		$this->load->model('frontend/products_model');
//		$this->load->model('frontend/productcategory_model');
//		$this->load->model('frontend/makes_model');
//		$this->load->model('frontend/model_model');
//		
//		$pagemeta=$this->pages_model->get_row_cond(array('key'=>'search'));
//		
//		//print_r($pagemeta);
//
//		//if($pagemeta->title!=''){$this->pagetitle=$pagemeta->title;}
//		
//		$this->pagetitle="Search";
//		
//		//if($pagemeta->short_desc!=''){$this->desc=$pagemeta->short_desc; }
//
//		//if($pagemeta->keywords!=''){$this->keys=$pagemeta->keywords; }
//
//		if($pagemeta->banner_image!=''){$this->pagebannner=base_url('public/uploads/pages/'.$pagemeta->banner_image); }
//
//		//if($pagemeta->banner_text!=''){$this->pagebannnertext=$pagemeta->banner_text; }
//
//		//$this->right_widgets=$this->widgets_model->get_pagewidgets($pagemeta->widgets);
//
//		$this->breadcrumbarr=array('/'=>$this->alphasettings['BREADCRUMB_START'],site_url('search') =>$this->pagetitle);
//		
//		//$keyword = $city."/".$make."/".$model."/".$category."/".$yearfrom."/".$yearto."/".$pricefrom."/".$priceto."/".$type;
//
//			$this->load->model('frontend/search_model');
//
//			$results['error']='';
//
//			$this->load->library('pagination');
//
//			$config['base_url'] = base_url($this->session->userdata('front_language').'/product/index?');
//			
//			foreach ($_GET as $key=>$value) {
//			   if ($key != 'search' && $key != 'offset') {
//				   $config['base_url'] .= '&'.$key.'='.$value;
//			   }
//			}
//			
//			$config['total_rows'] = $this->search_model->get_results_count($_GET);
//
//			$config['per_page'] = '150';
//
//			//$config['uri_segment'] = 14;
//			
//			$config['query_string_segment'] = 'offset'; 
//			
// 			$config['page_query_string'] = true;
//			
//			$config['first_link'] = FALSE;
//
//			$config['last_link'] = FALSE;
//
//			$config['next_link'] = 'Next';
//
//			$config['prev_link'] = 'Prev';
//
//			$config['cur_tag_open'] = '<li class="active"><a>';
//
//			$config['cur_tag_close'] = '</a></li>';
//
//			$config['full_tag_open'] = '<ul class="pagination">';
//
//			$config['full_tag_close'] = '</ul>';
//
//			$config['num_tag_open'] = '<li>';
//
//			$config['num_tag_close'] = '</li>';
//
//			$config['next_tag_open'] = '<li class="right">';
//
//			$config['next_tag_close'] = '</li>';
//
//			$config['prev_tag_open'] = '<li class="left">';
//
//			$config['prev_tag_close'] = '</li>';
//
//			$this->pagination->initialize($config);
//
//			 if (!empty($_GET['offset'])) {
//			   $offset = $_GET['offset'];
//			} else {
//			   $offset = 0;
//			}
//			
//			//echo $start;
//
//			$results['pagelists']=$this->search_model->get_results($_GET,$offset,$config['per_page']);
//			
//			$results['categories']=$this->productcategory_model->get_active();
//			
//			$results['brands']=$this->makes_model->get_active(@$_GET['category']);
//			
//			$results['models']=$this->model_model->load_model(@$_GET['make']);
//			
//			$results['items']=$this->products_model->get_array_cond(array('model_id'=>@$_GET['model']));
//
//			//print_r($results['pagelists']);
//
//		$frontcontent=$this->load->view('frontend/search/results',$results,true);
//
//		$main['meta']=$this->frontmetahead();
//
//		//$main['contents']=$this->frontcontent($frontcontent,true);
//		
//		$main['contents']=$frontcontent;
//
//		$main['header']=$this->frontheader();
//
//		$main['footer']=$this->frontfooter();
//
//		$this->load->view('frontend/main',$main);
//
//	}

	public function results($keyword='')

	{

		$this->load->model('frontend/pages_model');

		$pagemeta=$this->pages_model->get_row_cond(array('key'=>'search'));
		
		//print_r($pagemeta);

		//if($pagemeta->title!=''){$this->pagetitle=$pagemeta->title;}
		
		$this->pagetitle="Search";
		
		//if($pagemeta->short_desc!=''){$this->desc=$pagemeta->short_desc; }

		//if($pagemeta->keywords!=''){$this->keys=$pagemeta->keywords; }

		//if($pagemeta->banner_image!=''){$this->pagebannner=base_url('public/uploads/pages/'.$pagemeta->banner_image); }

		//if($pagemeta->banner_text!=''){$this->pagebannnertext=$pagemeta->banner_text; }

		//$this->right_widgets=$this->widgets_model->get_pagewidgets($pagemeta->widgets);

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
		$this->load->view('frontend/main',$main);

	}

	

}

/* End of file contents.php */

/* Location: ./application/controllers/contents.php */