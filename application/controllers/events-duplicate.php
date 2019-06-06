<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Events extends Ecsfront_Controller {
	
	public function index($id='')

	{

		redirect('home');

	}

	public function lists($id='')

	{
 		$this->outputCache();
 		$this->load->model('frontend/gallery_model');
 		$this->load->model('frontend/gallerycategory_model');
		if($id==''){ redirect('home'); }
		$catcontent=$this->eventscategory_model->get_row_cond(array('slug'=>$id));
		if(!$catcontent){redirect('home');}
		if($catcontent->name!=''){$this->pagetitle=$catcontent->name; }
		if($catcontent->short_desc!=''){$this->desc=$catcontent->short_desc; }
		if($catcontent->keywords!=''){$this->keys=$catcontent->keywords; }	
		
		$this->load->model('frontend/pages_model');
		$pagemeta=$this->pages_model->get_row_cond(array('key'=>'events'));
		
		if($pagemeta->title!=''){$this->pagetitle=$pagemeta->title;}
		if($pagemeta->short_desc!=''){$this->desc=$pagemeta->short_desc; }
		if($pagemeta->keywords!=''){$this->keys=$pagemeta->keywords; }
		if($pagemeta->banner_image!=''){$this->pagebannner=base_url('public/uploads/pages/'.$pagemeta->banner_image); }
		if($pagemeta->banner_text!=''){$this->pagebannnertext=$pagemeta->banner_text; }	
		$this->breadcrumbarr=array('/'=>$this->alphasettings['BREADCRUMB_START'],site_url('events/lists/'.$catcontent->slug) => $catcontent->name);
 		$this->load->library('pagination');
		$config['base_url'] = base_url($this->session->userdata('front_language').'/events/lists/'.$id);
		$config['total_rows'] = $this->events_model->get_pagination_count();
		$config['per_page'] = '6';
		$config['uri_segment'] = 5;
			$config['first_link'] = FALSE;
			$config['last_link'] = FALSE;
			$config['next_link'] = '&gt;';
			$config['prev_link'] = '&lt;';
			$config['cur_tag_open'] = '<li><a class="active">';
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

		//$lists['pagelists']=$this->news_model->get_catnews($id);
		
		$lists['pagelists']=$this->events_model->get_pagination($config['per_page'],$this->uri->segment($config['uri_segment']),NULL,'date_time DESC');
		
		//$lists['pagelists']=$this->news_model->get_catnews($id);
		
		$lists['news']=$this->events_model->get_array_limit(6);
		
		$lists['facility']=$this->contents_model->get_row_cond(array('slug'=>$this->alphasettings['FACILITY_SLUG']));
		
		//$cat = $this->gallerycategory_model->get_row_cond(array('slug'=>'gallery'));
		
		//$lists['galleries'] = $this->gallery_model->get_row_cond(array('category_id'=>$cat->id));
		
		$lists['albums'] = $this->gallerycategory_model->get_active();
		$photos = $this->gallery_model->get_active(); $galleryphotos = array();
		if($photos)foreach($photos as $photo):
			$galleryphotos[$photo['category_id']][] = $photo;
		endforeach;
		$lists['photos'] = $photos;//$galleryphotos;
		$frontcontent=$this->load->view('frontend/events/lists',$lists,true);
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

		$this->breadcrumbarr=array('/'=>$this->alphasettings['BREADCRUMB_START'],site_url('events/lists/'.$catcontent->slug) => $catcontent->name);

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
		$this->outputCache();
		if($id==''){ redirect('home'); }
		$news=$this->events_model->get_row_cond(array('slug'=>$id));
		$this->section='events';
		if(!$news){redirect('pagenotfound');}
		if($news->title!=''){$this->pagetitle=$news->title; }
		if($news->meta_desc!=''){$this->desc=$news->meta_desc; }
		if($news->keywords!=''){$this->keys=$news->keywords; }
		//if($news->banner_image!=''){$this->pagebannner=base_url('public/uploads/news/'.$news->banner_image); }
		//if($news->banner_text!=''){$this->pagebannnertext=$news->banner_text; }
		$this->load->model('frontend/pages_model');
		$pagemeta=$this->pages_model->get_row_cond(array('key'=>'events'));
		
		if($pagemeta->title!=''){$this->pagetitle=$pagemeta->title;}
		if($pagemeta->short_desc!=''){$this->desc=$pagemeta->short_desc; }
		if($pagemeta->keywords!=''){$this->keys=$pagemeta->keywords; }
		if($pagemeta->banner_image!=''){$this->pagebannner=base_url('public/uploads/pages/'.$pagemeta->banner_image); }
		if($pagemeta->banner_text!=''){$this->pagebannnertext=$pagemeta->banner_text; }	
		$catcontent=$this->eventscategory_model->load($news->category_id);
		$this->left_widgets=$this->widgets_model->get_pagewidgets('12:3,14:2,10:1');
		if($catcontent->breadcrumb_status=='N'){
			$this->breadcrumbarr=array('/'=>$this->alphasettings['BREADCRUMB_START'],site_url('events/view/'.$news->slug) => $news->title );
		} else {
			$this->breadcrumbarr=array('/'=>$this->alphasettings['BREADCRUMB_START'],site_url('events/lists/'.$catcontent->slug) => $catcontent->name,site_url('events/view/'.$news->slug) => $news->title );
		}		
//		$currentobj=$this->menuitems_model->get_currentnewsmenu($news->id,'eventslist');
//		$currentmenus=explode(':',$currentobj);
//		$this->currentmenu=$currentmenus[0];
//		$this->currentparentmenu=$currentmenus[1];
		$main['content'] =$news;	
		
		$main['facility']=$this->contents_model->get_row_cond(array('slug'=>$this->alphasettings['FACILITY_SLUG']));
		
		$main['news']=$this->news_model->get_array_limit(6);
		$frontcontent=$this->load->view('frontend/events/view',$main,true);
		//$main['contents']=$this->frontcontent($frontcontent,true);
		
		$main['contents'] = $frontcontent;
		$main['header']=$this->frontheader();
		$main['footer']=$this->frontfooter();
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