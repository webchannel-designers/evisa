<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Team extends Ecsfront_Controller {
	
	public function index($id='')

	{

		redirect('home');

	}

	public function lists($id='')

	{
		
		$this->load->model('frontend/pages_model');
		//$this->outputCache();
		
		if($id==''){ redirect('home'); }
		
		$contents=$this->contents_model->get_row_cond(array('slug'=>$id));
		
		$pagemeta=$this->pages_model->get_row_cond(array('key'=>$id));
		
		if(@$pagemeta->title!=''){$this->pagetitle=@$pagemeta->title;}

		if(@$pagemeta->short_desc!=''){$this->desc=@$pagemeta->short_desc; }

		if(@$pagemeta->desc!=''){$this->fulldesc=@$pagemeta->desc; }

		if(@$pagemeta->keywords!=''){$this->keys=@$pagemeta->keywords; }

		if(@$pagemeta->banner_image!=''){$this->pagebannner=base_url('public/uploads/pages/'.@$pagemeta->banner_image); }

		if(@$pagemeta->banner_text!=''){$this->pagebannnertext=@$pagemeta->banner_text; }
		
		$catcontent=$this->teamcategory_model->get_row_cond(array('slug'=>$id));
		
		if(!$catcontent){redirect('home');}

		if(@$catcontent->name!=''){$this->pagetitle=@$catcontent->name; }

		if(@$catcontent->short_desc!=''){$this->desc=@$catcontent->short_desc; }

		if(@$catcontent->keywords!=''){$this->keys=@$catcontent->keywords; }	

		$this->left_widgets=$this->widgets_model->get_pagewidgets('12:3,14:2,10:1');	

		$this->breadcrumbarr=array('/'=>$this->alphasettings['BREADCRUMB_START'],site_url('team/lists/'.@$catcontent->slug) => @$catcontent->name);

		$lists['pagelists']=$this->team_model->get_row_cond(array('category_id'=>1));
		
		$lists['events']=$this->events_model->get_array_limit(2);
		
		$lists['content']=$catcontent;
		
		$lists['eventcontents']=$contents;	
		
		$lists['print']=1;

		$frontcontent=$this->load->view('frontend/team/lists',$lists,true);

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

//		$currentobj=$this->menuitems_model->get_currentnewsmenu($news->id,'newslist');
//
//		$currentmenus=explode(':',$currentobj);
//
//		$this->currentmenu=$currentmenus[0];
//
//		$this->currentparentmenu=$currentmenus[1];
		
		$main['catcontent']=$catcontent;

		$main['content'] =$news;
		
		$frontcontent=$this->load->view('frontend/events/view',$main,true);

		//$main['contents']=$this->frontcontent($frontcontent,true);
		
		$main['contents']=$frontcontent;

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