<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class News extends Visafront_Controller {
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
		$catcontent=$this->newscategory_model->get_row_cond(array('slug'=>$id));
		if(!$catcontent){redirect('home');}
		if($catcontent->name!=''){$this->pagetitle=$catcontent->name; }
		if($catcontent->short_desc!=''){$this->desc=$catcontent->short_desc; }
		if($catcontent->keywords!=''){$this->keys=$catcontent->keywords; }	
		
		$this->load->model('frontend/pages_model');
		$pagemeta=$this->pages_model->get_row_cond(array('key'=>'news'));
		
		if($pagemeta->title!=''){$this->pagetitle=$pagemeta->title;}
		if($pagemeta->short_desc!=''){$this->desc=$pagemeta->short_desc; }
		if($pagemeta->keywords!=''){$this->keys=$pagemeta->keywords; }
		if($pagemeta->banner_image!=''){$this->pagebannner=base_url('public/uploads/pages/'.$pagemeta->banner_image); }
		if($pagemeta->banner_text!=''){$this->pagebannnertext=$pagemeta->banner_text; }	
		//$this->left_widgets=$this->widgets_model->get_pagewidgets('12:3,14:2,10:1');	
		$this->breadcrumbarr=array('/'=>$this->alphasettings['BREADCRUMB_START'],site_url('news/lists/'.$catcontent->slug) => $catcontent->name);
 		$this->load->library('pagination');
		$config['base_url'] = base_url($this->session->userdata('front_language').'/news/lists/'.$id);
		$config['total_rows'] = $this->news_model->get_pagination_count();
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
		
		$lists['pagelists']=$this->news_model->get_pagination($config['per_page'],$this->uri->segment($config['uri_segment']),NULL,'date_time DESC');;
		//$lists['pagelists']=$this->news_model->get_catnews($id);
		
		$lists['news']=$this->news_model->get_array_limit(6);
		
		$lists['facility']=$this->contents_model->get_row_cond(array('slug'=>$this->alphasettings['FACILITY_SLUG']));
		
		//$cat = $this->gallerycategory_model->get_row_cond(array('slug'=>'gallery'));
		
		//$lists['galleries'] = $this->gallery_model->get_row_cond(array('category_id'=>$cat->id));
		
		$lists['albums'] = $this->gallerycategory_model->get_active();
		$photos = $this->gallery_model->get_active(); $galleryphotos = array();
		if($photos)foreach($photos as $photo):
			$galleryphotos[$photo['category_id']][] = $photo;
		endforeach;
		$lists['photos'] = $photos;//$galleryphotos;
		$frontcontent=$this->load->view('frontend/news/lists',$lists,true);
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
	
	public function view($id='')
	{
		$this->outputCache();
		if($id==''){ redirect('home'); }
		$news=$this->news_model->get_row_cond(array('slug'=>$id));
		$this->section='news';
		if(!$news){redirect('pagenotfound');}
		if($news->title!=''){$this->pagetitle=$news->title; }
		if($news->meta_desc!=''){$this->desc=$news->meta_desc; }
		if($news->keywords!=''){$this->keys=$news->keywords; }
		//if($news->banner_image!=''){$this->pagebannner=base_url('public/uploads/news/'.$news->banner_image); }
		//if($news->banner_text!=''){$this->pagebannnertext=$news->banner_text; }
		$this->load->model('frontend/pages_model');
		$pagemeta=$this->pages_model->get_row_cond(array('key'=>'news'));
		
		if($pagemeta->title!=''){$this->pagetitle=$pagemeta->title;}
		if($pagemeta->short_desc!=''){$this->desc=$pagemeta->short_desc; }
		if($pagemeta->keywords!=''){$this->keys=$pagemeta->keywords; }
		if($pagemeta->banner_image!=''){$this->pagebannner=base_url('public/uploads/pages/'.$pagemeta->banner_image); }
		if($pagemeta->banner_text!=''){$this->pagebannnertext=$pagemeta->banner_text; }	
		$catcontent=$this->newscategory_model->load($news->category_id);
		$this->left_widgets=$this->widgets_model->get_pagewidgets('12:3,14:2,10:1');
		if($catcontent->breadcrumb_status=='N'){
			$this->breadcrumbarr=array('/'=>$this->alphasettings['BREADCRUMB_START'],site_url('news/view/'.$news->slug) => $news->title );
		} else {
			$this->breadcrumbarr=array('/'=>$this->alphasettings['BREADCRUMB_START'],site_url('news/lists/'.$catcontent->slug) => $catcontent->name,site_url('news/view/'.$news->slug) => $news->title );
		}		
		$currentobj=$this->menuitems_model->get_currentnewsmenu($news->id,'newslist');
		$currentmenus=explode(':',$currentobj);
		$this->currentmenu=$currentmenus[0];
		$this->currentparentmenu=$currentmenus[1];
		$main['content'] =$news;	
		
		$main['facility']=$this->contents_model->get_row_cond(array('slug'=>$this->alphasettings['FACILITY_SLUG']));
		
		$main['news']=$this->news_model->get_array_limit(6);
		$frontcontent=$this->load->view('frontend/news/view',$main,true);
		//$main['contents']=$this->frontcontent($frontcontent,true);
		
		$main['contents'] = $frontcontent;
		$main['header']=$this->frontheader();
		$main['footer']=$this->frontfooter();
		$main['meta']=$this->frontmetahead();
		$this->load->view('frontend/main',$main);
	}
	public function printnews($id='')
	{
		$this->outputCache();
		if($id==''){ redirect('home'); }
		$news=$this->news_model->get_row_cond(array('slug'=>$id));
		$this->section='news';
		if(!$news){redirect('pagenotfound');}
		if($news->title!=''){$this->pagetitle=$news->title; }
		if($news->meta_desc!=''){$this->desc=$news->meta_desc; }
		if($news->keywords!=''){$this->keys=$news->keywords; }
		if($news->banner_image!=''){$this->pagebannner=base_url('public/uploads/news/'.$news->banner_image); }
		if($news->banner_text!=''){$this->pagebannnertext=$news->banner_text; }
		$catcontent=$this->newscategory_model->load($news->category_id);
		$this->left_widgets=$this->widgets_model->get_pagewidgets('12:3,14:2,10:1');
		if($catcontent->breadcrumb_status=='N'){
			$this->breadcrumbarr=array('/'=>$this->alphasettings['BREADCRUMB_START'],site_url('news/view/'.$news->slug) => $news->title );
		} else {
			$this->breadcrumbarr=array('/'=>$this->alphasettings['BREADCRUMB_START'],site_url('news/lists/'.$catcontent->slug) => $catcontent->name,site_url('news/view/'.$news->slug) => $news->title );
		}		
		$currentobj=$this->menuitems_model->get_currentnewsmenu($news->id,'newslist');
		$currentmenus=explode(':',$currentobj);
		$this->currentmenu=$currentmenus[0];
		$this->currentparentmenu=$currentmenus[1];
		$main['content'] =$news;	
		$frontcontent=$this->load->view('frontend/news/printnews',$main,true);
		//$main['contents']=$this->frontcontent($frontcontent,true);
		
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
}
/* End of file news.php */
/* Location: ./application/controllers/news.php */