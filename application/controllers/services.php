<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Services extends Visafront_Controller {

	public function index($id='')
	{

		redirect('home');

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

	public function lists($id='')
	{
		$this->load->model('frontend/services_model');
		$this->load->model('frontend/servicecategory_model');
		$this->load->model('frontend/pages_model');
		$this->load->model('frontend/galleryservice_model');
		
		$this->load->model('frontend/insidegallerycategory_model');
		
		$this->load->model('frontend/insidegallery_model');
		
		$insidebanner=$this->insidegallerycategory_model->get_row_cond(array("slug"=>$id));
		
		$this->pagebannners=$this->insidegallery_model->get_row_cond2(array("category_id"=>$insidebanner->id));
		
		//$this->outputCache();
		$catcontent=$this->servicecategory_model->get_row_cond(array('slug'=>$id));
		
		if(!$catcontent){redirect('home');}

		if($catcontent->name!=''){$this->pagetitle=$catcontent->name; }

		if($catcontent->short_desc!=''){$this->short_desc=$catcontent->short_desc; }

		if($catcontent->keywords!=''){$this->keys=$catcontent->keywords; }	
		//$this->left_widgets=$this->widgets_model->get_pagewidgets($catcontent->widgets);
		
		//echo $catcontent->id;
		
		$pagemeta=$this->pages_model->get_row_cond(array('key'=>'services'));
		
		if(@$pagemeta->title!=''){$this->pagetitle=@$pagemeta->title;}

		if(@$pagemeta->short_desc!=''){$this->desc=@$pagemeta->short_desc; }

		if(@$pagemeta->desc!=''){$this->fulldesc=@$pagemeta->desc; }

		if(@$pagemeta->keywords!=''){$this->keys=@$pagemeta->keywords; }

		if(@$pagemeta->banner_image!=''){$this->pagebannner=base_url('public/uploads/pages/'.@$pagemeta->banner_image); }

		if(@$pagemeta->banner_text!=''){$this->pagebannnertext=@$pagemeta->banner_text; }

		$menurow=$this->menuitems_model->get_currentmenurow($catcontent->id,'productlist');

		if($menurow){

			$breadcrumbs=array_reverse($this->menuitems_model->get_menu_path($menurow->id));			

		} else {

			$breadcrumbs=array_reverse($this->servicecategory_model->get_category_path($catcontent->id));

		}

		$this->breadcrumbarr=array(site_url('/')=>$this->alphasettings['BREADCRUMB_START'],site_url('services/lists/'.@$catcontent->slug) => @$catcontent->name);

//		foreach($breadcrumbs as $index => $breadcrumb):
//
//			$this->breadcrumbarr[$breadcrumb['link']]=$breadcrumb['name'];
//
//		endforeach;
		
		$lists['categories']=$this->services_model->get_array_cond(array('category_id != '=>$catcontent->id));
		
		//$lists['procontent']=$this->contents_model->get_row_cond(array('slug'=>'products'));
		
		$this->load->library('pagination');
		
		$config['base_url'] = base_url().$this->session->userdata('front_language').'/services/lists/'.$id;

		$config['total_rows'] = $this->services_model->get_pagination_count(array('category_id'=>$catcontent->id));

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
				
		$lists['pagelists']=$this->services_model->get_pagination($config['per_page'],$this->uri->segment($config['uri_segment']),array('category_id'=>$catcontent->id));
		$lists['category']=$catcontent;
		$frontcontent=$this->load->view('frontend/services/lists',$lists,true);
		//print_r($frontcontent);exit;
		$currentobj=$this->menuitems_model->get_currentmenu($catcontent->id,'contentlist');

		$currentmenus=explode(':',$currentobj);

		$this->currentmenu=$currentmenus[0];

		$this->currentparentmenu=$currentmenus[1];

		//$main['contents']=$this->frontproductcontent($frontcontent,true,true,$id);
		
		$main['contents'] = $frontcontent;

		$main['header']=$this->frontheader();

		$main['footer']=$this->frontfooter();

		$main['meta']=$this->frontmetahead();

		$this->load->view('frontend/main',$main);

	}
	
	public function load()
	{
		$this->load->model('frontend/services_model');
		$this->load->model('frontend/servicecategory_model');
		
		$contents=$this->services_model->load($_POST['serid']);
		
		// echo '<input type="hidden" name="amt" id="amt" value="'.$contents->price.'"><div class="col-md-8"><h1>'.strip_tags($contents->title).'</h1></div><div class="col-md-4 step-price text-right"><span>AED '.$contents->price.'</span></div>';

		echo '<input type="hidden" name="amt" id="amt" value="'.$contents->price.'">
		 <h5>Total</h5><h5>AED '.$contents->price;'</h5>';
          
	}

	public function view($id='')
	{

		//$this->outputCache();
		$this->load->model('frontend/services_model');
		$this->load->model('frontend/servicecategory_model');
		$this->load->model('frontend/galleryservice_model');
		//$this->load->model('frontend/video_model');
		$this->load->model('frontend/pages_model');
		//$this->load->model('frontend/downloads_model');
		//if($id==''){ redirect('home'); }
		
		$this->load->model('frontend/insidegallerycategory_model');
		
		$this->load->model('frontend/insidegallery_model');
		
		$insidebanner=$this->insidegallerycategory_model->get_row_cond(array("slug"=>'services'));
		
		$this->pagebannners=$this->insidegallery_model->get_row_cond2(array("category_id"=>$insidebanner->id));
		
		$contents=$this->services_model->get_row_cond(array('slug'=>$id));
		
		//print_r($contents);
		
		$main['categories2']=$categories2=$this->productcategory_model->get_row_cond2("content_category_id in (2,4,9,10,12)");//9,
        
        $catproducts = array();
        $products=$this->products_model->get_featured_active(array('type'=>1)); 
        if($products)foreach($products as $items) { 
            $catproducts[$items['category_id']][] = $items;
        }
        $main['products']=$catproducts;
         
		$this->section='products';

		if(!$contents){redirect('pagenotfound');}
		
		$pagemeta=$this->pages_model->get_row_cond(array('key'=>'services'));

		if(@$contents->title!=''){$this->pagetitle=@$contents->title; }

		if(@$contents->meta_desc!=''){$this->desc=@$contents->meta_desc; }

		if(@$contents->name!=''){$this->keys=@$contents->name; }
		
		if(@$contents->banner_image!="")
		{
			$this->pagebannner=base_url('public/uploads/services/'.@$contents->banner_image);
		}
		else
		{
			$this->pagebannner=base_url('public/uploads/pages/'.@$pagemeta->banner_image);
		}
		
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

		$catcontent=$this->servicecategory_model->load(@$contents->category_id);
		//$comm=$this->services_model->get_comments(@$contents->contents_id);
		
		//$this->left_widgets=$this->widgets_model->get_pagewidgets($contents->widgets);

		$menurow=$this->menuitems_model->get_currentmenurow(@$contents->id,'products');

		if($menurow){
		
			$breadcrumbs=array_reverse($this->menuitems_model->get_menu_path($menurow->id));

		} else {
	
			$breadcrumbs=array_reverse($this->servicecategory_model->get_category_path(@$catcontent->id));

		}
		//echo $catcontent->id;
		
		$this->breadcrumbarr=array(site_url('/')=>$this->alphasettings['BREADCRUMB_START'],site_url('services/lists/'.@$catcontent->slug) => @$catcontent->name,site_url('services/view/'.@$contents->slug) => @$contents->title);

//		foreach($breadcrumbs as $index => $breadcrumb):
//
//			$this->breadcrumbarr[$breadcrumb['link']]=$breadcrumb['name'];
//
//		endforeach;

		//$this->breadcrumbarr[site_url('services/view/'.@$contents->slug)]=@$contents->name;

		$currentobj=$this->menuitems_model->get_currentmenu($contents->id,'contents');

		$currentmenus = explode(':',$currentobj);

		$this->currentmenu = $currentmenus[0];

		$this->currentparentmenu = $currentmenus[1];
		
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
		
		$main['images'] = $this->galleryservice_model->get_array_cond2($contents->id);
		//$main['related'] = $this->services_model->get_array_cond(array('make_id'=>$contents->make_id,'id != '=>$contents->id));
		
		//$main['videos'] = $this->video_model->get_row_cond(array('category_id'=>$contents->id));
		
		//$main['comments'] =	$comm;
		
		
		//print_r($main['content']);

		$frontcontent=$this->load->view('frontend/services/view',$main,true);

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
	
	public function popup($id='')
	{

		//$this->outputCache();
		$this->load->model('frontend/gallery_model');
		$this->load->model('frontend/video_model');
		$this->load->model('frontend/pages_model');
		$this->load->model('frontend/downloads_model');
		//if($id==''){ redirect('home'); }
		//$contents=$this->services_model->get_row_cond(array('slug'=>$id));
		//print_r($contents);
		
		//$this->load->model('frontend/login_model');

		//$this->section='products';

		//if(!$contents){redirect('pagenotfound');}
		
		//$pagemeta=$this->pages_model->get_row_cond(array('key'=>'search'));

		//if(@$contents->title!=''){$this->pagetitle=@$contents->title; }

		//if(@$contents->meta_desc!=''){$this->desc=@$contents->meta_desc; }

		//if(@$contents->name!=''){$this->keys=@$contents->name; }
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
		
//		$this->breadcrumbarr=array('/'=>$this->alphasettings['BREADCRUMB_START'],site_url('nolink') => $catcontent->name,site_url('services/view/'.$contents->slug) => $contents->title);
//
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
		
//		$main['content'] =	$contents;	
//		
//		$main['images'] = $this->gallery_model->get_array_cond2($contents->id);
//		$main['related'] = $this->services_model->get_array_cond(array('make_id'=>$contents->make_id,'id != '=>$contents->id));
//		
//		$main['videos'] = $this->video_model->get_row_cond(array('category_id'=>$contents->id));
		
		$main['downloads'] = $this->downloads_model->get_active(array('category_id'=>$id));
		
		//$main['comments'] =	$comm;
		
		//print_r($main['content']);

		$this->load->view('frontend/services/popup',$main);

		//$main['contents']=$this->frontproductcontent($frontcontent,true,false,$id);
		
		//print_r($frontcontent);
		
		//$main['contents']=$frontcontent;

		//$main['header']=$this->frontheader();

		//$main['footer']=$this->frontfooter();
		
		//$main['header']="";

		//$main['footer']="";

		//$main['meta']=$this->frontmetahead();

		//$this->load->view('frontend/main',$main);

	}
	
	
	public function printproduct($id='')
	{

		//$this->outputCache();
		$this->load->model('frontend/gallery_model');
		$this->load->model('frontend/video_model');
		$this->load->model('frontend/pages_model');
		//if($id==''){ redirect('home'); }
		$contents=$this->services_model->get_row_cond(array('slug'=>$id));
		
		//print_r($contents);
		
		$this->load->model('frontend/login_model');

		$this->section='products';

		if(!$contents){redirect('pagenotfound');}
		
		$pagemeta=$this->pages_model->get_row_cond(array('key'=>'search'));

		if(@$contents->title!=''){$this->pagetitle=@$contents->title; }

		if(@$contents->meta_desc!=''){$this->desc=@$contents->meta_desc; }

		if(@$contents->name!=''){$this->keys=@$contents->name; }
		
		if($pagemeta->banner_image!=''){$this->pagebannner=base_url('public/uploads/pages/'.$pagemeta->banner_image); }

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

		$catcontent=$this->servicecategory_model->load(@$contents->category_id);
		//$comm=$this->services_model->get_comments(@$contents->contents_id);
		
		//$this->left_widgets=$this->widgets_model->get_pagewidgets($contents->widgets);

		$menurow=$this->menuitems_model->get_currentmenurow(@$contents->id,'products');

		if($menurow){
		
			$breadcrumbs=array_reverse($this->menuitems_model->get_menu_path($menurow->id));

		} else {
	
			$breadcrumbs=array_reverse($this->servicecategory_model->get_category_path(@$catcontent->id));

		}
		//echo $catcontent->id;
		
		$this->breadcrumbarr=array('/'=>$this->alphasettings['BREADCRUMB_START'],site_url('nolink') => $catcontent->name,site_url('services/view/'.$contents->slug) => $contents->title);

		foreach($breadcrumbs as $index => $breadcrumb):

			$this->breadcrumbarr[$breadcrumb['link']]=$breadcrumb['name'];

		endforeach;

		//$this->breadcrumbarr[site_url('services/view/'.@$contents->slug)]=@$contents->name;

		$currentobj=$this->menuitems_model->get_currentmenu($contents->id,'contents');

		$currentmenus = explode(':',$currentobj);

		$this->currentmenu = $currentmenus[0];

		$this->currentparentmenu = $currentmenus[1];
		
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
		
		$main['images'] = $this->gallery_model->get_array_cond2($contents->id);
		$main['related'] = $this->services_model->get_array_cond(array('make_id'=>$contents->make_id,'id != '=>$contents->id));
		
		$main['videos'] = $this->video_model->get_row_cond(array('category_id'=>$contents->id));
		
		//$main['comments'] =	$comm;
		
		
		//print_r($main['content']);

		$frontcontent=$this->load->view('frontend/services/printview',$main,true);

		//$main['contents']=$this->frontproductcontent($frontcontent,true,false,$id);
		
		//print_r($frontcontent);
		
		$main['contents']=$frontcontent;

		//$main['header']=$this->frontheader();

		//$main['footer']=$this->frontfooter();
		
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
	
	
	public function downloads($file="")
	{
		$this->load->helper('download');
		$contents=$this->services_model->get_row_cond(array('slug'=>$file));
		//echo base_url().'public/uploads/pdf/'.$contents->pdf;
		$data = file_get_contents(base_url().'public/uploads/services/'.$contents->pdf); // Read the file's contents
		//echo $data;exit;
		$name = $contents->pdf;
		force_download($name, $data); 
		echo $data."/".$name;
   }

	public function listview($id='')
	{

		$contents=$this->servicecategory_model->get_row_cond(array('slug'=>$id));

		$this->section='products';

		//if(!$contents){redirect('pagenotfound');}

		if($contents->name!=''){$this->pagetitle=$contents->name; }

		//if($contents->meta_desc!=''){$this->desc=$contents->meta_desc; }

		if($contents->keywords!=''){$this->keys=$contents->keywords; }

		//if($contents->image!=''){$this->pagebannner=base_url('public/uploads/services/'.$contents->image); }

		//if($contents->banner_text!=''){$this->pagebannnertext=$contents->banner_text; }

		//$catcontent=$this->servicecategory_model->load($contents->category_id);

	//$this->left_widgets=$this->widgets_model->get_pagewidgets($contents->widgets);

		$menurow=$this->menuitems_model->get_currentmenurow($contents->id,'products');

		if($menurow){
		
			$breadcrumbs=array_reverse($this->menuitems_model->get_menu_path($menurow->id));

		} else {
		
			$breadcrumbs=array_reverse($this->servicecategory_model->get_category_path($contents->id));

		}

		$this->breadcrumbarr=array('/'=>$this->alphasettings['BREADCRUMB_START'],site_url('services/lists/products') => "Products",site_url('services/listview/'.$contents->slug) => $contents->name);

		foreach($breadcrumbs as $index => $breadcrumb):

			$this->breadcrumbarr[$breadcrumb['link']]=$breadcrumb['name'];
		endforeach;

		$lists['catid']=$this->servicecategory_model->get_row_cond(array('slug'=>$id));
		$lists['procategory']=$this->services_model->get_array_cond(array('category_id'=>$lists['catid']->id));
		$frontcontent=$this->load->view('frontend/services/productlist',$lists,true);

		//$currentobj=$this->menuitems_model->get_currentmenu($catcontent->id,'contentlist');

		//$currentmenus=explode(':',$currentobj);

		//$this->currentmenu=$currentmenus[0];

		//$this->currentparentmenu=$currentmenus[1];

		$main['contents']=$this->frontproductcontent($frontcontent,true,false,$id);
		
		$main['header']=$this->frontheader();

		$main['footer']=$this->frontfooter();

		$main['meta']=$this->frontmetahead();

		$this->load->view('frontend/main',$main);

		/*$this->outputCache();

		if($id==''){ redirect('home'); }

		$contents=$this->services_model->get_row_cond(array('slug'=>$id));

		$this->section='contents';

		if(!$contents){redirect('pagenotfound');}

		$main['content'] =	$contents;	

		$this->load->view('frontend/services/listview',$main);*/

	}

}

/* End of file contents.php */

/* Location: ./application/controllers/contents.php */