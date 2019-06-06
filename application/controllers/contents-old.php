<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contents extends Ecsfront_Controller {

	public function index($id='')

	{

		redirect('home');

	}

	public function lists($id='')

	{
		//$this->outputCache();
		
		$this->load->model('frontend/jobs_model');
		
		$this->load->model('location_model');
		
		$this->load->model('category_model');
		
		$this->load->model('frontend/pages_model');
		
		$lists['jobs']=$this->jobs_model->get_active();
		
		if($id==''){ redirect('home'); }

		$catcontent=$this->contentcategory_model->get_row_cond(array('slug'=>$id));

		if(!$catcontent){redirect('home');}

		if($catcontent->name!=''){$this->pagetitle=$catcontent->name; }

		if($catcontent->short_desc!=''){$this->desc=$catcontent->short_desc; }

		if($catcontent->keywords!=''){$this->keys=$catcontent->keywords; }	
		$pagemeta=$this->pages_model->get_row_cond(array('key'=>$id));
		
		if($pagemeta->title!=''){$this->pagetitle=$pagemeta->title;}

		if($pagemeta->short_desc!=''){$this->desc=$pagemeta->short_desc; }

		if($pagemeta->keywords!=''){$this->keys=$pagemeta->keywords; }

		if($pagemeta->banner_image!=''){$this->pagebannner=base_url('public/uploads/pages/'.$pagemeta->banner_image); }

		if($pagemeta->desc!=''){$this->pagebannnertext=$pagemeta->desc; }	

		$this->left_widgets=$this->widgets_model->get_pagewidgets($catcontent->widgets);

		$menurow=$this->menuitems_model->get_currentmenurow($catcontent->id,'contentlist');

		if($menurow){

			$breadcrumbs=array_reverse($this->menuitems_model->get_menu_path($menurow->id));			

		} else {

			$breadcrumbs=array_reverse($this->contentcategory_model->get_category_path($catcontent->id));

		}

		$this->breadcrumbarr=array('/'=>$this->alphasettings['BREADCRUMB_START']);

		foreach($breadcrumbs as $index => $breadcrumb):

			$this->breadcrumbarr[$breadcrumb['link']]=$breadcrumb['name'];

		endforeach;

		$lists['pagelists']=$this->contents_model->get_catcontents($id);
		
		$frontcontent=$this->load->view('frontend/contents/lists',$lists,true);

		$currentobj=$this->menuitems_model->get_currentmenu($catcontent->id,'contentlist');

		$currentmenus=explode(':',$currentobj);

		$this->currentmenu=$currentmenus[0];

		$this->currentparentmenu=$currentmenus[1];

		//$main['contents']=$this->frontcontent($frontcontent,true);
		
		$main['contents']=$frontcontent;

		$main['header']=$this->frontheader();

		$main['footer']=$this->frontfooter();

		$main['meta']=$this->frontmetahead();

		$this->load->view('frontend/main',$main);

	}
	
	public function offers($id='')

	{
		//$this->outputCache();
		
		$this->load->model('frontend/jobs_model');
		
		$lists['jobs']=$this->jobs_model->get_active();

		if($id==''){ redirect('home'); }

		$catcontent=$this->contentcategory_model->get_row_cond(array('slug'=>$id));

		if(!$catcontent){redirect('home');}

		if($catcontent->name!=''){$this->pagetitle=$catcontent->name; }

		if($catcontent->short_desc!=''){$this->desc=$catcontent->short_desc; }

		if($catcontent->keywords!=''){$this->keys=$catcontent->keywords; }	
		
		$this->load->model('frontend/pages_model');
		
		$pagemeta=$this->pages_model->get_row_cond(array('key'=>'special-offers'));
		
		if($pagemeta->title!=''){$this->pagetitle=$pagemeta->title;}

		if($pagemeta->short_desc!=''){$this->desc=$pagemeta->short_desc; }

		if($pagemeta->keywords!=''){$this->keys=$pagemeta->keywords; }

		if($pagemeta->banner_image!=''){$this->pagebannner=base_url('public/uploads/pages/'.$pagemeta->banner_image); }

		if($pagemeta->banner_text!=''){$this->pagebannnertext=$pagemeta->banner_text; }	

		$this->left_widgets=$this->widgets_model->get_pagewidgets($catcontent->widgets);

		$menurow=$this->menuitems_model->get_currentmenurow($catcontent->id,'contentlist');

		if($menurow){

			$breadcrumbs=array_reverse($this->menuitems_model->get_menu_path($menurow->id));			

		} else {

			$breadcrumbs=array_reverse($this->contentcategory_model->get_category_path($catcontent->id));

		}

		$this->breadcrumbarr=array('/'=>$this->alphasettings['BREADCRUMB_START']);

		foreach($breadcrumbs as $index => $breadcrumb):

			$this->breadcrumbarr[$breadcrumb['link']]=$breadcrumb['name'];

		endforeach;

		//$lists['pagelists']=$this->contents_model->get_catcontents($id);
		
		$this->load->library('pagination');

		$config['base_url'] = base_url($this->session->userdata('front_language').'/contents/offers/'.$id);

		$config['total_rows'] = $this->contents_model->get_pagination_count(array('category_id'=>8));

		$config['per_page'] = '6';

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
		
//
		//$lists['pagelists']=$this->news_model->get_catnews($id);
		
		$lists['pagelists']=$this->contents_model->get_pagination($config['per_page'],$this->uri->segment($config['uri_segment']),array('category_id'=>8));

		//$lists['pagelists']=$this->news_model->get_catnews($id);
		
		$lists['news']=$this->news_model->get_array_limit(6);
		
		$frontcontent=$this->load->view('frontend/contents/lists',$lists,true);

		$currentobj=$this->menuitems_model->get_currentmenu($catcontent->id,'contentlist');

		$currentmenus=explode(':',$currentobj);

		$this->currentmenu=$currentmenus[0];

		$this->currentparentmenu=$currentmenus[1];

		//$main['contents']=$this->frontcontent($frontcontent,true);
		
		$main['contents']=$frontcontent;

		$main['header']=$this->frontheader();

		$main['footer']=$this->frontfooter();

		$main['meta']=$this->frontmetahead();

		$this->load->view('frontend/main',$main);

	}

	public function view($id='')

	{
		$this->load->model('frontend/jobs_model');
		
		$this->load->model('frontend/events_model');
		
		$this->load->model('frontend/contacts_model');
		
		$this->outputCache();

		if($id==''){ redirect('home'); }

		$contents=$this->contents_model->get_row_cond(array('slug'=>$id));

		$this->section='contents';

		if(!$contents){redirect('pagenotfound');}

		if($contents->title!=''){$this->pagetitle=$contents->title; }

		if($contents->meta_desc!=''){$this->desc=$contents->meta_desc; }

		if($contents->keywords!=''){$this->keys=$contents->keywords; }

		if($contents->banner_image!=''){$this->pagebannner=base_url('public/uploads/contents/'.$contents->banner_image); }

		if($contents->banner_text!=''){$this->pagebannnertext=$contents->banner_text; }

		$catcontent=$this->contentcategory_model->load($contents->category_id);
		
		//$this->left_widgets=$this->widgets_model->get_pagewidgets($contents->widgets);

		$menurow=$this->menuitems_model->get_currentmenurow($contents->id,'contents');

		if($menurow){

			$breadcrumbs=array_reverse($this->menuitems_model->get_menu_path($menurow->id));

		} else {

			$breadcrumbs=array_reverse($this->contentcategory_model->get_category_path($catcontent->id));

		}

		$this->breadcrumbarr=array('/'=>$this->alphasettings['BREADCRUMB_START']);

		foreach($breadcrumbs as $index => $breadcrumb):

			$this->breadcrumbarr[$breadcrumb['link']]=$breadcrumb['name'];

		endforeach;

		$this->breadcrumbarr[site_url('contents/view/'.$contents->slug)]=$contents->title;

		$currentobj=$this->menuitems_model->get_currentmenu($contents->id,'contents');

		$currentmenus=explode(':',$currentobj);

		$this->currentmenu=$currentmenus[0];

		$this->currentparentmenu=$currentmenus[1];

		$main['content'] =	$contents;	
		
		$this->load->library('pagination');			

		$config['base_url'] = site_url('careers/index/');

		$config['total_rows'] = $this->jobs_model->get_pagination_count(array('status'=>'Y'));

		$config['per_page'] = '10';

		$config['uri_segment'] = 4;

		$config['first_link'] = 'First';

		$config['last_link'] = 'Last';

		$config['cur_tag_open'] = '<span>';

		$config['cur_tag_close'] = '</span>';

		$this->pagination->initialize($config);		

		$main['jobs']=$this->jobs_model->get_pagination($config['per_page'],$this->uri->segment($config['uri_segment']),array('status'=>'Y'));
		
		//$main['jobs']=$this->jobs_model->get_active();
		
		$main['mission']=$this->contents_model->get_row_cond(array('slug'=>$this->alphasettings['MISSION_SLUG']));
		
		$main['vission']=$this->contents_model->get_row_cond(array('slug'=>$this->alphasettings['VISSION_SLUG']));
		
		$main['events']=$this->events_model->get_array_limit(2);
		
		$main['contacts']=$this->contacts_model->get_active();
		
		//print_r($main['jobs']);
		
		//print_r($main['content']);exit;

		$frontcontent=$this->load->view('frontend/contents/view',$main,true);

		$main['contents']=$this->frontcontent($frontcontent,true);
		
		$main['contents'] = $frontcontent;
		
		$main['header']=$this->frontheader();

		$main['footer']=$this->frontfooter();

		$main['meta']=$this->frontmetahead();

		$this->load->view('frontend/main',$main);

	}
	
	public function printcontent($id='')

	{
		$this->load->model('frontend/jobs_model');
		
		$this->outputCache();

		if($id==''){ redirect('home'); }

		$contents=$this->contents_model->get_row_cond(array('slug'=>$id));

		$this->section='contents';

		if(!$contents){redirect('pagenotfound');}

		if($contents->title!=''){$this->pagetitle=$contents->title; }

		if($contents->meta_desc!=''){$this->desc=$contents->meta_desc; }

		if($contents->keywords!=''){$this->keys=$contents->keywords; }

		if($contents->banner_image!=''){$this->pagebannner=base_url('public/uploads/contents/'.$contents->banner_image); }

		if($contents->banner_text!=''){$this->pagebannnertext=$contents->banner_text; }

		$catcontent=$this->contentcategory_model->load($contents->category_id);
		
		//$this->left_widgets=$this->widgets_model->get_pagewidgets($contents->widgets);

		$menurow=$this->menuitems_model->get_currentmenurow($contents->id,'contents');

		if($menurow){

			$breadcrumbs=array_reverse($this->menuitems_model->get_menu_path($menurow->id));

		} else {

			$breadcrumbs=array_reverse($this->contentcategory_model->get_category_path($catcontent->id));

		}

		$this->breadcrumbarr=array('/'=>$this->alphasettings['BREADCRUMB_START']);

		foreach($breadcrumbs as $index => $breadcrumb):

			$this->breadcrumbarr[$breadcrumb['link']]=$breadcrumb['name'];

		endforeach;

		$this->breadcrumbarr[site_url('contents/view/'.$contents->slug)]=$contents->title;

		$currentobj=$this->menuitems_model->get_currentmenu($contents->id,'contents');

		$currentmenus=explode(':',$currentobj);

		$this->currentmenu=$currentmenus[0];

		$this->currentparentmenu=$currentmenus[1];

		$main['content'] =	$contents;	
		
		$main['jobs']=$this->jobs_model->get_active();
		
		$main['mission']=$this->contents_model->get_row_cond(array('slug'=>$this->alphasettings['MISSION_SLUG']));
		
		$main['vission']=$this->contents_model->get_row_cond(array('slug'=>$this->alphasettings['VISSION_SLUG']));
		
		//print_r($main['jobs']);
		
		//print_r($main['content']);exit;

		$frontcontent=$this->load->view('frontend/contents/printcontent',$main,true);

		$main['contents']=$this->frontcontent($frontcontent,true);
		
		$main['contents'] = $frontcontent;
		
		$main['header']='<div class="header-wrap print-wrap">
		    <div class="navbar navbar-default page-scroll" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <a class="navbar-brand" href="'.site_url('/').'"><img src="'.base_url('public/frontend/images/print-logo.png').'" alt="'.$this->alphasettings['SITE_NAME'].'"></a>
        </div>
				<ul class="tools">
            <li class="print-icon"><a>print</a></li>
          </ul>

      </div>
    </div>
		  </div>';

		$main['footer']='<footer class="print-wrap">
		
  <div class="container">   
    
<div class="clearfix"></div>

<div class="footer-below text-center">
  
  <div class="col-md-4 col-md-offset-4">
     
	  <p>&copy; '.convert_lang($this->config->item('copy_right'),$this->alphalocalization).'<br>
	   '. convert_lang('Designed & Developed by',$this->alphalocalization).'<br>
       </p>
	   
   </div>
     
</div>
	
  </div>
</footer>';

		$main['meta']=$this->frontmetahead();

		$this->load->view('frontend/main',$main);

	}

	public function listview($id='')

	{

		$this->outputCache();

		if($id==''){ redirect('home'); }

		$contents=$this->contents_model->get_row_cond(array('slug'=>$id));

		$this->section='contents';

		if(!$contents){redirect('pagenotfound');}

		$main['content'] =	$contents;	

		$this->load->view('frontend/contents/listview',$main);

	}

}

/* End of file contents.php */

/* Location: ./application/controllers/contents.php */