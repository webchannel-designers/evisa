<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Brands extends Visafront_Controller {
	
	public function index($id='')

	{

		redirect('home');

	}

	public function lists($id='')

	{
 		//$this->outputCache();
 		$this->load->model('frontend/testimonial_model');
		
		$this->load->model('frontend/pages_model');
		
		$this->load->model('frontend/insidegallerycategory_model');
		
		$this->load->model('frontend/insidegallery_model');
		
		$insidebanner=$this->insidegallerycategory_model->get_row_cond(array("slug"=>'brands'));
		
		if(@$insidebanner)
		{
		$this->pagebannners=$this->insidegallery_model->get_row_cond2(array("category_id"=>$insidebanner->id));
		}
		
		$pagemeta=$this->pages_model->get_row_cond(array('key'=>'brands'));
		
		if($pagemeta->title!=''){$this->pagetitle=$pagemeta->title;}
		if($pagemeta->short_desc!=''){$this->desc=$pagemeta->short_desc; }
		if($pagemeta->keywords!=''){$this->keys=$pagemeta->keywords; }
		if($pagemeta->banner_image!=''){$this->pagebannner=base_url('public/uploads/pages/'.$pagemeta->banner_image); }
		if($pagemeta->banner_text!=''){$this->pagebannnertext=$pagemeta->banner_text; }	
		
		$this->breadcrumbarr=array(site_url('/')=>$this->alphasettings['BREADCRUMB_START'],site_url('brands/lists') => 'Brands');
		
 		$this->load->library('pagination');
		$config['base_url'] = base_url($this->session->userdata('front_language').'/brands/lists/');
		$config['total_rows'] = $this->testimonial_model->get_pagination_count(array('status'=>'Y'));
		$config['per_page'] = '12';
		$config['uri_segment'] = 4;
		$config['first_link'] = FALSE;
		$config['last_link'] = FALSE;
		$config['next_link'] = '&gt;';
		$config['prev_link'] = '&lt;';
		$config['cur_tag_open'] = '<li class="page-item active"><a>';
		$config['cur_tag_close'] = '</a></li>';
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
		$config['num_tag_open'] = '<li class="page-item">';
		$config['num_tag_close'] = '</li>';
		$config['next_tag_open'] = '<li class="page-item">';
		$config['next_tag_close'] = '</li>';
		$config['prev_tag_open'] = '<li class="page-item">';
		$config['prev_tag_close'] = '</li>';
		$this->pagination->initialize($config);

		//$lists['pagelists']=$this->news_model->get_catnews($id);
		
		$lists['pagelists']=$this->testimonial_model->get_pagination($config['per_page'],$this->uri->segment($config['uri_segment']),array('status'=>'Y'),'date_time DESC');
		
		//$lists['pagelists']=$this->news_model->get_catnews($id);
		
		//$lists['news']=$this->events_model->get_array_limit(6);
		
		//$lists['facility']=$this->contents_model->get_row_cond(array('slug'=>$this->alphasettings['FACILITY_SLUG']));
		
		//$cat = $this->gallerycategory_model->get_row_cond(array('slug'=>'gallery'));
		
		//$lists['galleries'] = $this->gallery_model->get_row_cond(array('category_id'=>$cat->id));
		
		//$lists['albums'] = $this->gallerycategory_model->get_active();
		//$photos = $this->gallery_model->get_active(); $galleryphotos = array();
//		if($photos)foreach($photos as $photo):
//			$galleryphotos[$photo['category_id']][] = $photo;
//		endforeach;
//		$lists['photos'] = $photos;//$galleryphotos;
//if($this->session->userdata('userid'))
//{
			$frontcontent=$this->load->view('frontend/careerdevelopment/lists',$lists,true);
//}
//else
//{
//			$frontcontent=$this->load->view('frontend/careerdevelopment/message',$lists,true);
//}
		//$currentobj=$this->menuitems_model->get_currentmenu($catcontent->id,'newslist');
		//$currentmenus=explode(':',$currentobj);
		//$this->currentmenu=$currentmenus[0];
		//$this->currentparentmenu=$currentmenus[1];
		//$main['contents']=$this->frontcontent($frontcontent,true);
		
		$main['contents'] = $frontcontent;
		$main['header']=$this->frontheader();
		$main['footer']=$this->frontfooter();
		$main['meta']=$this->frontmetahead();
		$this->load->view('frontend/main',$main);
	}
	
	public function listsarchieve($id='')

	{
		//$this->outputCache();

		if($id==''){ redirect('home'); }
		
		$contents=$this->contents_model->get_row_cond(array('slug'=>$id));
		
		$catcontent=$this->eventscategory_model->get_row_cond(array('slug'=>$id));
		
		if(!$catcontent){redirect('home');}

		if($catcontent->name!=''){$this->pagetitle=$catcontent->name; }

		if($catcontent->short_desc!=''){$this->desc=$catcontent->short_desc; }

		if($catcontent->keywords!=''){$this->keys=$catcontent->keywords; }	

		$this->left_widgets=$this->widgets_model->get_pagewidgets('12:3,14:2,10:1');	

		$this->breadcrumbarr=array(site_url('/')=>$this->alphasettings['BREADCRUMB_START'],site_url('brands/lists') => 'Brands',site_url('brands/view/'.@$contents->slug) => @$contents->title);

		$lists['pagelists']=$this->events_model->get_catnews2($id);
		//print_r($lists['pagelists']);exit;
		$lists['content']=$catcontent;
		
		$lists['eventcontents']=$contents;	
		
		$lists['facility']=$this->contents_model->get_row_cond(array('slug'=>$this->alphasettings['FACILITY_SLUG']));
		
		//$main['events']=$this->events_model->get_array_limit(2);
		
		//print_r($lists['eventcontents']);exit;
		
		$lists['print']=1;

		$frontcontent=$this->load->view('frontend/events/lists',$lists,true);

		$currentobj=$this->menuitems_model->get_currentmenu($catcontent->id,'newslist');

		$currentmenus=explode(':',$currentobj);

		$this->currentmenu=$currentmenus[0];

		$this->currentparentmenu=$currentmenus[1];
		
		$main['contents']=$frontcontent;
		
		//$main['contents']=$this->frontcontent($frontcontent,true);
		
		$main['header']=$this->frontheader();

		$main['footer']=$this->frontfooter();

		$main['meta']=$this->frontmetahead();

		$this->load->view('frontend/main',$main);

	}

	

	public function view($id='')
	{

		//$this->outputCache();
		$this->load->model('frontend/testimonial_model');
 		$this->load->model('frontend/products_model');
		//$this->load->model('frontend/servicecategory_model');
		//$this->load->model('frontend/galleryservice_model');
		//$this->load->model('frontend/video_model');
		$this->load->model('frontend/pages_model');
		//$this->load->model('frontend/downloads_model');
		//if($id==''){ redirect('home'); }
		
		$this->load->model('frontend/insidegallerycategory_model');
		
		$this->load->model('frontend/insidegallery_model');
		
		$insidebanner=$this->insidegallerycategory_model->get_row_cond(array("slug"=>'brands'));
		
		
		if(@$insidebanner)
		{
		$this->pagebannners=$this->insidegallery_model->get_row_cond2(array("category_id"=>$insidebanner->id));
		}
		
		$contents=$this->testimonial_model->get_row_cond(array('slug'=>$id));
		$main['products']=$this->products_model->get_array_cond(array('make_id'=>$contents->id,"status"=>'Y'));
		//echo count($main['products']);
		//print_r($contents);
		//print_r($main['products']);
		
//		$main['categories2']=$categories2=$this->productcategory_model->get_row_cond2("content_category_id in (2,4,9,10,12)");//9,
//        
//        $catproducts = array();
//        $products=$this->products_model->get_featured_active(array('type'=>1)); 
//        if($products)foreach($products as $items) { 
//            $catproducts[$items['category_id']][] = $items;
//        }
//        $main['products']=$catproducts;
         
		$this->section='brands';

		if(!$contents){redirect('pagenotfound');}
		
		$pagemeta=$this->pages_model->get_row_cond(array('key'=>'brands'));

		if(@$contents->title!=''){$this->pagetitle=@$contents->title; }

		if(@$contents->meta_desc!=''){$this->desc=@$contents->meta_desc; }

//		if(@$contents->name!=''){$this->keys=@$contents->name; }
//		
//		if(@$contents->banner_image!="")
//		{
//			$this->pagebannner=base_url('public/uploads/services/'.@$contents->banner_image);
//		}
//		else
//		{
//			$this->pagebannner=base_url('public/uploads/pages/'.@$pagemeta->banner_image);
//		}
			$this->pagebannner=base_url('public/uploads/pages/'.@$pagemeta->banner_image);
		//if($pagemeta->banner_image!=''){$this->pagebannner=base_url('public/uploads/pages/'.$pagemeta->banner_image); }

		/*if(@$contents->banner_image!=''){$this->pagebannner=base_url('public/uploads/services/'.@$contents->banner_image); }

		if(@$contents->banner_text!=''){$this->pagebannnertext=@$contents->banner_text; }*/
		
		//$this->load->model('frontend/pages_model');
		//$pagemeta=$this->pages_model->get_row_cond(array('key'=>'products-services'));
		
		/*if($pagemeta->title!=''){$this->pagetitle=$pagemeta->title;}
		if($pagemeta->short_desc!=''){$this->desc=$pagemeta->short_desc; }
		if($pagemeta->desc!=''){$this->fulldesc=$pagemeta->desc; }
		if($pagemeta->keywords!=''){$this->keys=$pagemeta->keywords; }
		if(@$pagemeta->banner_image!=''){$this->pagebannner=base_url('public/uploads/pages/'.$pagemeta->banner_image); }
		if(@$pagemeta->banner_text!=''){$this->pagebannnertext=$pagemeta->banner_text; }	*/	

		//$catcontent=$this->servicecategory_model->load(@$contents->category_id);
		//$comm=$this->services_model->get_comments(@$contents->contents_id);
		
		//$this->left_widgets=$this->widgets_model->get_pagewidgets($contents->widgets);

		//$menurow=$this->menuitems_model->get_currentmenurow(@$contents->id,'products');

//		if($menurow){
//		
//			$breadcrumbs=array_reverse($this->menuitems_model->get_menu_path($menurow->id));
//
//		} else {
//	
//			$breadcrumbs=array_reverse($this->servicecategory_model->get_category_path(@$catcontent->id));
//
//		}
		//echo $catcontent->id;
		
		$this->breadcrumbarr=array(site_url('/')=>$this->alphasettings['BREADCRUMB_START'],site_url('brands/lists') => 'Brands',site_url('brands/view/'.@$contents->slug) => @$contents->title);

//		foreach($breadcrumbs as $index => $breadcrumb):
//
//			$this->breadcrumbarr[$breadcrumb['link']]=$breadcrumb['name'];
//
//		endforeach;

		//$this->breadcrumbarr[site_url('services/view/'.@$contents->slug)]=@$contents->name;

//		$currentobj=$this->menuitems_model->get_currentmenu($contents->id,'contents');
//
//		$currentmenus = explode(':',$currentobj);
//
//		$this->currentmenu = $currentmenus[0];
//
//		$this->currentparentmenu = $currentmenus[1];
		
/*		$this->load->library('pagination');
		
		$config['base_url'] = site_url('services/lists/');

		$config['total_rows'] = $this->servicecategory_model->get_pagination_count();

		$config['per_page'] = '10';

		$config['uri_segment'] = 4;

		$config['first_link'] = 'First';

		$config['last_link'] = 'Last';

		$config['cur_tag_open'] = '<span>';

		$config['cur_tag_close'] = '</span>';

		$this->pagination->initialize($config)*/	
		
	//	$content['contacts']=$this->contacts_model->get_pagination($config['per_page'],$this->uri->segment($config['uri_segment']));
		
		$main['content'] =	$contents;	
		
		//$main['downloads'] = $this->downloads_model->get_active(array('category_id'=>$contents->id));
		
		//$main['images'] = $this->galleryservice_model->get_array_cond2($contents->id);
		//$main['related'] = $this->services_model->get_array_cond(array('make_id'=>$contents->make_id,'id != '=>$contents->id));
		
		//$main['videos'] = $this->video_model->get_row_cond(array('category_id'=>$contents->id));
		
		//$main['comments'] =	$comm;
		
		
		//print_r($main['content']);

		$frontcontent=$this->load->view('frontend/careerdevelopment/view',$main,true);

		//$main['contents']=$this->frontproductcontent($frontcontent,true,false,$id);
		
		//print_r($frontcontent);
		
		$main['contents']=$frontcontent;

		$main['header']=$this->frontheader();

		$main['footer']=$this->frontfooter();
		
		//$main['header']="";

		//$main['footer']="";

		$main['meta']=$this->frontmetahead();

		$this->load->view('frontend/main',$main);

	}
	
	
	public function printurl($id='')

	{

		//$this->outputCache();

		if($id==''){ redirect('home'); }
		
		

		$news=$this->events_model->get_row_cond(array('slug'=>$id));

		$this->section='events';

		if(!$news){redirect('pagenotfound');}

		if($news->title!=''){$this->pagetitle=$news->title; }

		if($news->meta_desc!=''){$this->desc=$news->meta_desc; }

		if($news->keywords!=''){$this->keys=$news->keywords; }

		if($news->banner_image!=''){$this->pagebannner=base_url('public/uploads/news/'.$news->banner_image); }

		if($news->banner_text!=''){$this->pagebannnertext=$news->banner_text; }

		$catcontent=$this->eventscategory_model->load($news->category_id);

		$this->left_widgets=$this->widgets_model->get_pagewidgets('12:3,14:2,10:1');

		if($catcontent->breadcrumb_status=='N'){

			$this->breadcrumbarr=array('/'=>$this->alphasettings['BREADCRUMB_START'],site_url('events/view/'.$news->slug) => $news->title );

		} else {

			$this->breadcrumbarr=array('/'=>$this->alphasettings['BREADCRUMB_START'],site_url('events/lists/'.$catcontent->slug) => $catcontent->name,site_url('events/view/'.$news->slug) => $news->title );

		}		

		$currentobj=$this->menuitems_model->get_currentnewsmenu($news->id,'newslist');

		$currentmenus=explode(':',$currentobj);

		$this->currentmenu=$currentmenus[0];

		$this->currentparentmenu=$currentmenus[1];

		$main['content'] =$news;
		
		$frontcontent=$this->load->view('frontend/events/view',$main,true);

		$main['contents']=$this->frontprintcontent($frontcontent,true);

		/*$main['header']=$this->frontheader();

		$main['footer']=$this->frontfooter();

		$main['meta']=$this->frontmetahead();

		$this->load->view('frontend/main',$main);*/
		
		$main['meta']='';
$main['header']='';
$main['footer']='';
		$this->load->view('frontend/main',$main);

	}




}

/* End of file news.php */

/* Location: ./application/controllers/events.php */