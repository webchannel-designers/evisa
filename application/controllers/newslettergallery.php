<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Newslettergallery extends Ecsfront_Controller {

	public function index()

	{

		$this->load->model('frontend/pages_model');

		$this->load->model('frontend/gallerycategory_model');
		
		$this->load->model('frontend/gallery_model');
		
		$this->load->model('frontend/banners_model');
		
		$pagemeta=$this->pages_model->get_row_cond(array('key'=>'gallery'));

		if(@$pagemeta->title!=''){$this->pagetitle=@$pagemeta->title;}

		if(@$pagemeta->short_desc!=''){$this->desc=@$pagemeta->short_desc; }

		if(@$pagemeta->desc!=''){$this->fulldesc=@$pagemeta->desc; }

		if(@$pagemeta->keywords!=''){$this->keys=@$pagemeta->keywords; }

		if(@$pagemeta->banner_image!=''){$this->pagebannner=base_url('public/uploads/pages/'.@$pagemeta->banner_image); }

		if(@$pagemeta->banner_text!=''){$this->pagebannnertext=@$pagemeta->banner_text; }

		@$this->left_widgets=$this->widgets_model->get_pagewidgets(@$pagemeta->widgets);

		$this->breadcrumbarr=array('/'=>$this->alphasettings['BREADCRUMB_START'],site_url('gallery/index') =>$this->pagetitle);
		
		$lists['galleries']=$this->gallerycategory_model->get_active();
		
		$lists['categories']=$this->gallery_model->get_active();
		
		//print_r($lists['categories']);
		//$lists['categories']='';
		$lists['content']=$pagemeta;

		$frontcontent=$this->load->view('frontend/gallery/index',$lists,true);
		
		//print_r($frontcontent);

		$main['contents']=$frontcontent;
		
		//$main['contents']=$this->frontcontent($frontcontent,true);

		$main['header']=$this->frontheader();

		$main['footer']=$this->frontfooter();

		$main['meta']=$this->frontmetahead();

		$this->load->view('frontend/main',$main);
		//redirect('gallery/lists');

	}

	public function lists()

	{

		//$this->outputCache();

		$this->load->model('frontend/pages_model');

		$this->load->model('frontend/newslettergallerycategory_model');
		
		$this->load->model('frontend/newslettergallery_model');
		
		$this->load->model('frontend/banners_model');
		
		$pagemeta=$this->pages_model->get_row_cond(array('key'=>'newsletter-gallery'));

		if($pagemeta->title!=''){$this->pagetitle=$pagemeta->title;}

		$this->pagetitle = "Newsletter Gallery";
		
		if($pagemeta->short_desc!=''){$this->desc=$pagemeta->short_desc; }

		if($pagemeta->desc!=''){$this->fulldesc=$pagemeta->desc; }

		if($pagemeta->keywords!=''){$this->keys=$pagemeta->keywords; }

		if($pagemeta->banner_image!=''){$this->pagebannner=base_url('public/uploads/pages/'.$pagemeta->banner_image); }

		if($pagemeta->banner_text!=''){$this->pagebannnertext=$pagemeta->banner_text; }

		$this->left_widgets=$this->widgets_model->get_pagewidgets($pagemeta->widgets);

		$this->breadcrumbarr=array('/'=>$this->alphasettings['BREADCRUMB_START'],site_url('gallery/index') =>'Gallery',site_url('gallery/lists')=>$this->pagetitle);
		
		$lists['galleries']=$this->newslettergallerycategory_model->get_active();
		
		$lists['categories']=$this->newslettergallery_model->get_active();
		
		$lists['events']=$this->events_model->get_array_limit(2);
		
		//print_r($lists['categories']);
		//$lists['categories']='';
		$lists['content']=$pagemeta;

		$frontcontent=$this->load->view('frontend/gallery/lists',$lists,true);
		
		//print_r($frontcontent);

		//$main['contents']=$this->frontcontent($frontcontent,true);
		
		$main['contents']=$frontcontent;

		$main['header']=$this->frontheader();

		$main['footer']=$this->frontfooter();

		$main['meta']=$this->frontmetahead();

		$this->load->view('frontend/main',$main);

	}

	public function view($id='')

	{
		//$this->outputCache();

		if($id==''){ redirect('home'); }		

		$this->load->model('frontend/pages_model');

		$this->load->model('frontend/newslettergallery_model');
		
		$this->load->model('frontend/banners_model');
		
		$this->load->model('frontend/news_model');

		$this->load->model('frontend/newslettergallerycategory_model');
		
		$this->load->model('frontend/contentcategory_model');
		
		$this->load->model('frontend/teamcategory_model');
		
		$catcontent=$this->contentcategory_model->load(1);
		
		$teams=$this->teamcategory_model->get_active();
		
		$menurow2=$this->contents_model->get_catcontents($catcontent->slug);

		$gallerycat=$this->newslettergallerycategory_model->get_row_cond(array('id'=>$id));	
		
		$cat = $this->newslettergallerycategory_model->get_row_cond(array('slug'=>$id));
		//print_r($cat);
		//if(!$gallerycat){redirect('pagenotfound');}

		$pagemeta=$this->pages_model->get_row_cond(array('key'=>'gallery'));
		
		$this->pagetitle = "Gallery";
		//if($gallerycat->title!=''){$this->pagetitle=$gallerycat->title;}

		if($pagemeta->short_desc!=''){$this->desc=$pagemeta->short_desc; }

		if($pagemeta->desc!=''){$this->fulldesc=$pagemeta->desc; }

		if($pagemeta->keywords!=''){$this->keys=$pagemeta->keywords; }

		if($pagemeta->banner_image!=''){$this->pagebannner=base_url('public/uploads/pages/'.$pagemeta->banner_image); }

		if($pagemeta->banner_text!=''){$this->pagebannnertext=$pagemeta->banner_text; }

		$this->left_widgets=$this->widgets_model->get_pagewidgets($pagemeta->widgets);
		
		$this->breadcrumbarr=array('/'=>$this->alphasettings['BREADCRUMB_START'],'About Us' =>'About Us',site_url('gallery/view/'.$cat->slug) =>$cat->title);	

		//$main['galleries'] = $this->newslettergallery_model->get_catcontents($id);	
		//$lists['galleries'] = $this->newslettergallery_model->get_array();
		$lists['category'] = $cat;
		
		//$lists['events']=$this->events_model->get_array_limit(2);
		
		//print_r($cat);exit;
		if($this->session->userdata('userid'))
		{
		$lists['galleries'] = $this->newslettergallery_model->get_row_cond(array('category_id'=>$cat->id));
		}
		else
		{
		$lists['galleries'] = $this->newslettergallery_model->get_row_cond(array('category_id'=>$cat->id,'viewstat'=>'public'));
		}
		
		$lists['latestnews']=$this->news_model->get_catnews('latest-news',10);
		
		$lists['childs']=$menurow2;
		
		$lists['teams']=$teams;
		
		//$lists['category']=$catcontent;
		
		$lists['content'] = $pagemeta;
		
		$frontcontent=$this->load->view('frontend/gallery/view',$lists,true);

		//$main['contents']=$this->frontcontent($frontcontent,true);
		
		$main['contents']=$frontcontent;

		$main['header']=$this->frontheader();

		$main['footer']=$this->frontfooter();

		$main['meta']=$this->frontmetahead();

		$this->load->view('frontend/main',$main);

	}
	
	public function popup($id='')

	{
		//$this->outputCache();

		if($id==''){ redirect('home'); }		

		$this->load->model('frontend/pages_model');

		$this->load->model('frontend/gallery_model');
		
		$this->load->model('frontend/banners_model');
		
		$this->load->model('frontend/news_model');

		$this->load->model('frontend/gallerycategory_model');
		
		$this->load->model('frontend/contentcategory_model');
		
		$this->load->model('frontend/teamcategory_model');
		
		$catcontent=$this->contentcategory_model->load(1);
		
		$teams=$this->teamcategory_model->get_active();
		
		$menurow2=$this->contents_model->get_catcontents($catcontent->slug);

		$cat = $this->gallerycategory_model->get_row_cond(array('slug'=>$id));
		
		$pagemeta=$this->pages_model->get_row_cond(array('key'=>'gallery'));
		
		$this->pagetitle = "Gallery";

		if($pagemeta->short_desc!=''){$this->desc=$pagemeta->short_desc; }

		if($pagemeta->desc!=''){$this->fulldesc=$pagemeta->desc; }

		if($pagemeta->keywords!=''){$this->keys=$pagemeta->keywords; }

		if($pagemeta->banner_image!=''){$this->pagebannner=base_url('public/uploads/pages/'.$pagemeta->banner_image); }

		if($pagemeta->banner_text!=''){$this->pagebannnertext=$pagemeta->banner_text; }

		$this->left_widgets=$this->widgets_model->get_pagewidgets($pagemeta->widgets);
		
		$this->breadcrumbarr=array('/'=>$this->alphasettings['BREADCRUMB_START'],'About Us' =>'About Us',site_url('gallery/view/'.$cat->slug) =>$cat->title);	

		//$main['galleries'] = $this->gallery_model->get_catcontents($id);	
		//$lists['galleries'] = $this->gallery_model->get_array();
		//$lists['category'] = $gallerycat;
		
		//$lists['events']=$this->events_model->get_array_limit(2);
		
		//print_r($cat);exit;
		
		$lists['galleries'] = $this->gallery_model->get_row_cond(array('category_id'=>$cat->id));
		
		$lists['latestnews']=$this->news_model->get_catnews('latest-news',10);
		$lists['childs']=$menurow2;
		
		$lists['teams']=$teams;
		
		$lists['category']=$cat;
		
		$lists['content'] = $pagemeta;
		
		$this->load->view('frontend/gallery/view2',$lists);

		//$main['contents']=$this->frontcontent($frontcontent,true);
		
		//$main['contents']=$frontcontent;

		//$main['header']=$this->frontheader();

		//$main['footer']=$this->frontfooter();

		//$main['meta']=$this->frontmetahead();

		//$this->load->view('frontend/main',$main);

	}

}

/* End of file contents.php */

/* Location: ./application/controllers/contents.php */