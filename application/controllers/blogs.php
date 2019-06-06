<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 class Blogs extends Ecsfront_Controller {
 	public function index($id='')
 	{
 		redirect('home');
 	}
	
	public function findblogs()
	{
		if($this->input->post('year')!='' || $this->input->post('month')!='' ||  $this->input->post('blogs')!=''){
			$newdata = array(
				   'year'  => $this->input->post('year'),
				   'month'  => $this->input->post('month'),
				   'blogs'  => $this->input->post('blogs')
			);
			$this->session->set_userdata($newdata);
		} else {
			$newdata = array(
				   'year'  => '',
				   'month' => '',
				   'blogs'  => '', 
			);
			$this->session->unset_userdata($newdata);
		}
		redirect('blogs/lists/');
	}
	
 	public function lists($id='')
 	{
 		//echo $id;exit;
 		//$this->outputCache();
 		//if($id==''){ redirect('home'); }
 		
 		$this->load->model('frontend/blogscategory_model');
 		
 		$this->load->model('frontend/blogs_model');
		
 		$catcontent=$this->blogscategory_model->get_row_cond(array('slug'=>$id));
 				
 		//if(!$catcontent){redirect('home');}
 		//if($catcontent->name!=''){$this->pagetitle=$catcontent->name; }
 		//if($catcontent->short_desc!=''){$this->desc=$catcontent->short_desc; }
 		//if($catcontent->keywords!=''){$this->keys=$catcontent->keywords; }	
 		
 		$this->load->model('frontend/pages_model');
 		$pagemeta=$this->pages_model->get_row_cond(array('key'=>'blogs'));
 		if($pagemeta->title!=''){$this->pagetitle=$pagemeta->title;}
 		if($pagemeta->short_desc!=''){$this->desc=$pagemeta->short_desc; }
 		if($pagemeta->keywords!=''){$this->keys=$pagemeta->keywords; }
 		if($pagemeta->banner_image!=''){$this->pagebannner=base_url('public/uploads/pages/'.$pagemeta->banner_image); }
 		if($pagemeta->banner_text!=''){$this->pagebannnertext=$pagemeta->banner_text; }	
 		//if($pagemeta->alt!=''){$this->alt=$pagemeta->alt; }
 		//$this->left_widgets=$this->widgets_model->get_pagewidgets('12:3,14:2,10:1');	
 		
         if(is_numeric($id) or $id=="")
         {
         		$this->breadcrumbarr=array('/'=>$this->alphasettings['BREADCRUMB_START'],site_url('blog/lists/') => 'Blogs');
         }
         else if($id!="")
         {
         
         		$this->breadcrumbarr=array('/'=>$this->alphasettings['BREADCRUMB_START'],site_url('blog/lists/'.$catcontent->slug) => $catcontent->name);
         		
         }
 		
 		$this->load->library('pagination');
         if(is_numeric($id) or $id=="")
         {
         		$config['base_url'] = base_url($this->session->userdata('front_language').'/blog/lists/');
 				
         		$config['total_rows'] = $this->blogs_model->get_pagination_count();
 				
         		if($this->uri->segment(5)=="")
         		{
         		$config['uri_segment'] = 4;
         		}
         		else
         		{
         		$config['uri_segment'] = 5;
         		}
         }
         else if($id!="")
         {
         		$config['base_url'] = base_url($this->session->userdata('front_language').'/blog/lists/'.$id);
 				
         		$config['total_rows'] = $this->blogs_model->get_pagination_count($catcontent->id);
 				
         		$config['uri_segment'] = 5;
 				
         }
		 
            $config['per_page'] = '14';
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
 		
 		//$lists['pagelists']=$this->blogs_model->get_catnews($id);
 		if(is_numeric($id) or $id=="")
 		{
 			//echo $this->uri->segment($config['uri_segment']);
 		$lists['pagelists']=$this->blogs_model->get_pagination($config['per_page'],$this->uri->segment($config['uri_segment']),'','date_time DESC');
 		}
 		else if($id!="")
 		{
 		$lists['pagelists']=$this->blogs_model->get_pagination($config['per_page'],$this->uri->segment($config['uri_segment']),$catcontent->id,'date_time DESC');
 		}
 	    //$lists['categories']=$this->blogscategory_model->get_active();
		 
         //$lists['practices']=$this->contents_model->get_array_in("category_id in (55,56)");
		 //$lists['blogyears']=$this->blogs_model->get_article_years(); 
         //$lists['views']=$this->blogs_model->get_active2();
 		
 		//$lists['facility']=$this->contents_model->get_row_cond(array('slug'=>$this->alphasettings['FACILITY_SLUG']));
 		
 		//print_r($lists['pagelists']);exit;
 		$frontcontent=$this->load->view('frontend/blog/lists',$lists,true);
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
 		$this->load->model('frontend/blogscategory_model');
 		
 		$this->load->model('frontend/blogs_model');
		
 		$this->load->model('frontend/register_model');
 		//$this->outputCache();
 		if($id==''){ redirect('home'); }
 		
 		$news=$this->blogs_model->get_row_cond(array('slug'=>$id));
 		
 		@$count=$news->views+1;
 		
 		$this->blogs_model->update2(array('views'=>$count),$news->id);
 		
 		$this->section='news';
 		if(!$news){redirect('pagenotfound');}
 		if($news->title!=''){$this->pagetitle=$news->title; }
 		if($news->meta_desc!=''){$this->desc=$news->meta_desc; }
 		if($news->keywords!=''){$this->keys=$news->keywords; }
 		if($news->banner_image!=''){$this->pagebannner=base_url('public/uploads/pages/'.$news->banner_image); }
 		if($news->banner_text!=''){$this->pagebannnertext=$news->banner_text; }
 		if($news->alt!=''){$this->alt=$news->alt; }
 		
 		$this->load->model('frontend/pages_model');
 		
 		$pagemeta=$this->pages_model->get_row_cond(array('key'=>'blogs'));
 		
 		//print_r($pagemeta);
 		if($news->title!=''){$this->pagetitle=$news->title; }
 		if($pagemeta->short_desc!=''){$this->desc=$pagemeta->short_desc; }
 		if($pagemeta->keywords!=''){$this->keys=$pagemeta->keywords; }
 		if($pagemeta->banner_image!=''){$this->pagebannner=base_url('public/uploads/pages/'.$pagemeta->banner_image); }
 		if($pagemeta->banner_text!=''){$this->pagebannnertext=$pagemeta->banner_text; }	
 		$catcontent=$this->blogscategory_model->load($news->category_id);
 		$this->left_widgets=$this->widgets_model->get_pagewidgets('12:3,14:2,10:1');
 		
 		$this->breadcrumbarr=array('/'=>$this->alphasettings['BREADCRUMB_START'],site_url('blog/lists/') => 'Blogs',site_url('news/view/'.$news->slug) => $news->title );
 //		if($catcontent->breadcrumb_status=='N'){
 //
 //			$this->breadcrumbarr=array('/'=>$this->alphasettings['BREADCRUMB_START'],site_url('news/view/'.$news->slug) => $news->title );
 //
 //		} else {
 //
 //			$this->breadcrumbarr=array('/'=>$this->alphasettings['BREADCRUMB_START'],site_url('news/lists/'.$catcontent->slug) => $catcontent->name,site_url('news/view/'.$news->slug) => $news->title );
 //
 //		}		
 //		$currentobj=$this->menuitems_model->get_currentnewsmenu($news->id,'newslist');
 //
 //		$currentmenus=explode(':',$currentobj);
 //
 //		$this->currentmenu=$currentmenus[0];
 //
 //		$this->currentparentmenu=$currentmenus[1];
 		$main['content'] =$news;	
 		
 		$main['views']=$this->blogs_model->get_active2();
 		
 		$main['categories']=$this->blogscategory_model->get_active();
 				
 	    $main['homenews']=$this->blogs_model->get_array_limit(2);
         
        $this->load->model('admin_model');
		
        $main['users'] = $this->admin_model->get_array();
		
        $main['users2'] = $this->register_model->get_active();
 		//$main['facility']=$this->contents_model->get_row_cond(array('slug'=>$this->alphasettings['FACILITY_SLUG']));
 		$frontcontent=$this->load->view('frontend/blog/view',$main,true);
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
 		$news=$this->blogs_model->get_row_cond(array('slug'=>$id));
 		$this->section='news';
 		if(!$news){redirect('pagenotfound');}
 		if($news->title!=''){$this->pagetitle=$news->title; }
 		if($news->meta_desc!=''){$this->desc=$news->meta_desc; }
 		if($news->keywords!=''){$this->keys=$news->keywords; }
 		if($news->banner_image!=''){$this->pagebannner=base_url('public/uploads/news/'.$news->banner_image); }
 		if($news->banner_text!=''){$this->pagebannnertext=$news->banner_text; }
 		$catcontent=$this->blogscategory_model->load($news->category_id);
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
 		$main['header']='<div class="header-wrap">
 		    <div class="navbar navbar-default page-scroll" role="navigation">
       <div class="container">
         <div class="navbar-header">
           <a class="navbar-brand" href="'.site_url('/').'"><img src="'.base_url('public/frontend/images/logo.png').'" alt="'.$this->alphasettings['SITE_NAME'].'"></a>
         </div>
       </div>
     </div>
 		  </div>';
 		$main['footer']='<footer>
 		
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