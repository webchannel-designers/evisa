<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Video extends Cmcfront_Controller {

	public function index()

	{

		redirect('video/lists');

	}
				  public function getYoutubeIdFromUrl($url) {
					$parts = parse_url($url);
					if(isset($parts['query'])){
						parse_str($parts['query'], $qs);
						if(isset($qs['v'])){
							return $qs['v'];
						}else if($qs['vi']){
							return $qs['vi'];
						}
					}
					if(isset($parts['path'])){
						$path = explode('/', trim($parts['path'], '/'));
						return $path[count($path)-1];
					}
					return false;
				}
	
	public function lists()

	{

		//$this->outputCache();
		$this->load->library('pagination');
		
		$this->load->model('frontend/pages_model');

		$this->load->model('frontend/videocategory_model');
		
		$this->load->model('frontend/video_model');
		
		$this->load->model('frontend/banners_model');
		
		$pagemeta=$this->pages_model->get_row_cond(array('key'=>'video'));
		//$pagemeta= "Video gallery";

		if($pagemeta->title!=''){$this->pagetitle=$pagemeta->title;}

		if($pagemeta->short_desc!=''){$this->desc=$pagemeta->short_desc; }

		if($pagemeta->desc!=''){$this->fulldesc=$pagemeta->desc; }

		if($pagemeta->keywords!=''){$this->keys=$pagemeta->keywords; }

		if($pagemeta->banner_image!=''){$this->pagebannner=base_url('public/uploads/pages/'.$pagemeta->banner_image); }

		if($pagemeta->banner_text!=''){$this->pagebannnertext=$pagemeta->banner_text; }

		$this->left_widgets=$this->widgets_model->get_pagewidgets($pagemeta->widgets);

		$this->breadcrumbarr=array('/'=>$this->alphasettings['BREADCRUMB_START'],site_url('gallery/index') =>'Gallery',site_url('video/lists') =>$this->pagetitle);
		
		$lists['galleries']=$this->videocategory_model->get_active();

		$lists['categories']=$this->video_model->get_active();
		$lists['events']=$this->events_model->get_array_limit(2);
		//print_r($lists['categories']);
		//$lists['categories']='';
		$lists['content']=$pagemeta;

		$frontcontent=$this->load->view('frontend/video/lists',$lists,true);
		
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

		$this->load->model('frontend/video_model');
		
		$this->load->model('frontend/banners_model');

		$this->load->model('frontend/videocategory_model');		

		$gallerycat=$this->videocategory_model->get_row_cond(array('id'=>$id));			

		//if(!$gallerycat){redirect('pagenotfound');}

		$pagemeta=$this->pages_model->get_row_cond(array('key'=>'video'));

		//if($gallerycat->title!=''){$this->pagetitle=$gallerycat->title;}
		if($pagemeta->title!=''){$this->pagetitle=$pagemeta->title;}

		if($pagemeta->short_desc!=''){$this->desc=$pagemeta->short_desc; }

		if($pagemeta->desc!=''){$this->fulldesc=$pagemeta->desc; }

		if($pagemeta->keywords!=''){$this->keys=$pagemeta->keywords; }

		if($pagemeta->banner_image!=''){$this->pagebannner=base_url('public/uploads/pages/'.$pagemeta->banner_image); }

		if($pagemeta->banner_text!=''){$this->pagebannnertext=$pagemeta->banner_text; }

		$this->left_widgets=$this->widgets_model->get_pagewidgets($pagemeta->widgets);

	/*	$this->breadcrumbarr=array('/'=>$this->alphasettings['BREADCRUMB_START'],site_url('gallery/lists') =>$pagemeta->title,site_url('gallery/view/'.$gallerycat->slug) =>$this->pagetitle);	*/
$this->breadcrumbarr=array('/'=>$this->alphasettings['BREADCRUMB_START'],site_url('gallery/index') =>'Gallery',site_url('video/lists') =>$this->pagetitle,site_url('video/view/'.$gallerycat->id) =>$gallerycat->title);
		
		//$main['galleries'] = $this->video_model->get_catcontents($id);	
        $lists['category'] =$gallerycat;
				
		$lists['galleries'] = $this->video_model->get_row_cond(array('category_id'=>$id));
		
		$lists['events']=$this->events_model->get_array_limit(2);
		
		$lists['content']=$pagemeta;
		
		$frontcontent=$this->load->view('frontend/video/view',$lists,true);

		//$main['contents']=$this->frontcontent($frontcontent,true);
		
		$main['contents']=$frontcontent;

		$main['header']=$this->frontheader();

		$main['footer']=$this->frontfooter();

		$main['meta']=$this->frontmetahead();

		$this->load->view('frontend/main',$main);

	}
	
				  function getYoutubeIdFromUrl($url) {
					$parts = parse_url($url);
					if(isset($parts['query'])){
						parse_str($parts['query'], $qs);
						if(isset($qs['v'])){
							return $qs['v'];
						}else if($qs['vi']){
							return $qs['vi'];
						}
					}
					if(isset($parts['path'])){
						$path = explode('/', trim($parts['path'], '/'));
						return $path[count($path)-1];
					}
					return false;
				}
				
				public function view2($vname="",$id)
				{
					
					$this->load->model('frontend/video_model');
					$details[] = $this->video_model->load($id);
					$video['title'] = $details[0]->title;
					$video['desc'] = $details[0]->desc;
					$video['vname'] = $vname;
					
					$this->load->view('frontend/include/video',$video);
					//print_r($details);exit;

				}

}

/* End of file contents.php */

/* Location: ./application/controllers/contents.php */