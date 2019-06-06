<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Products extends Officefront_Controller {

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
		
		$this->load->model('frontend/pages_model');
		$this->load->model('frontend/products_model');
		$this->load->model('frontend/productcategory_model');
		$this->load->model('frontend/testimonial_model');
		//$this->outputCache();
		$this->load->model('frontend/insidegallerycategory_model');
		
		$this->load->model('frontend/insidegallery_model');
		$insidebanner=$this->insidegallerycategory_model->get_row_cond(array("slug"=>'products'));
		if(@$insidebanner)
		{
		$this->pagebannners=$this->insidegallery_model->get_row_cond2(array("category_id"=>$insidebanner->id));
		}
		
		$catcontent=$this->productcategory_model->get_array_cond(array('parent_id'=>0,'status'=>'Y'));
		
		if(@$_REQUEST['type']!="")
		{
			$type=1;
		}
		else
		{
			$type=0;
		}
		
        //$id = $id==''?$catcontent[0]['slug']:$id;
		
		if($id!="")
		{
		$cat= $lists['pcat']=$this->productcategory_model->get_row_cond(array('slug'=>@$id));
		
		$childs=$this->productcategory_model->get_array_cond(array('parent_id'=>@$cat->id));
		}
		if(@$this->input->get_post('brands')!="")
		{
		$lists['brand']=$this->testimonial_model->load2(@$_REQUEST['brands']);
		if($id!="")
		{
		$cond=array('category_id'=>$cat->id,'make_id'=>@$lists['brand']->id);
		}
		else
		{
		$cond=array('make_id'=>@$lists['brand']->id);
		}
		}
		else
		{
		if($id!="")
		{
		$cond=array('category_id'=>$cat->id);
		}
		else
		{
		$cond=array('type'=>$type);
		}
		}
		//echo @$cat->id;exit;
		//print_r($childs);
		
		$va="";
		
//		foreach(@$childs as $child)
//		{
//			$va.=$child['id'].",";
//		}
//		
//		$va=trim($va,",");
//		
//		if(@$va=="")
//		{
//			@$va=@$cat->id;
//		}
		
		//echo $va;
		
		//if(!$catcontent){redirect('home');}
        
if($id!="")
{
		if($cat->name!=''){$this->pagetitle=$cat->name; }

		if($cat->short_desc!=''){$this->short_desc=$cat->short_desc; }

		if($cat->keywords!=''){$this->keys=$cat->keywords; }	
		
		$pagemeta=$lists['pcat']=$this->pages_model->get_row_cond(array('key'=>'products'));

		//if(@$pagemeta->title!=''){$this->pagetitle=@$pagemeta->title; }

		//if(@$contents->meta_desc!=''){$this->desc=@$contents->meta_desc; }

		//if(@$contents->name!=''){$this->keys=@$contents->name; }
		if(@$cat->banner_image!="")
		{
			$this->pagebannner=base_url('public/uploads/products/'.@$cat->banner_image);
		}
		elseif(@$contents->banner_image!="")
		{
			$this->pagebannner=base_url('public/uploads/products/'.@$contents->banner_image);
		}
		else
		{
			$this->pagebannner=base_url('public/uploads/pages/'.$pagemeta->banner_image);
		}
		
		
}
/*elseif(@$_REQUEST['type']!="")
		{
			$pagemeta=$lists['pcat']=$this->pages_model->get_row_cond(array('key'=>$_REQUEST['type']));
            if(@$pagemeta->title!=''){$this->pagetitle=@$pagemeta->title; }

    		if(@$contents->meta_desc!=''){$this->desc=@$contents->meta_desc; }
    
    		if(@$contents->name!=''){$this->keys=@$contents->name; }
    		if(@$contents->banner_image!="")
    		{
    			$this->pagebannner=base_url('public/uploads/products/'.@$contents->banner_image);
    		}
    		else
    		{
    			$this->pagebannner=base_url('public/uploads/pages/'.$pagemeta->banner_image);
    		}
		}*/
else
{
		 	
		$pagemeta=$lists['pcat']=$this->pages_model->get_row_cond(array('key'=>'products'));

		if(@$pagemeta->title!=''){$this->pagetitle=@$pagemeta->title; }

		if(@$contents->meta_desc!=''){$this->desc=@$contents->meta_desc; }

		if(@$contents->name!=''){$this->keys=@$contents->name; }
		if(@$contents->banner_image!="")
		{
			$this->pagebannner=base_url('public/uploads/products/'.@$contents->banner_image);
		}
		else
		{
			$this->pagebannner=base_url('public/uploads/pages/'.$pagemeta->banner_image);
		}
}
		//$menurow=$this->menuitems_model->get_currentmenurow($contents->id,'nolink');

		//if($menurow){

		//	$breadcrumbs=array_reverse($this->menuitems_model->get_menu_path($menurow->id));			

		//} else {

	    //   	$breadcrumbs=array_reverse($this->productcategory_model->get_category_path($catcontent->id));

		//}

		$this->breadcrumbarr=array(site_url('/')=>$this->alphasettings['BREADCRUMB_START'],'javascript:void(0);'=>'Products');
		
        $parentcat=$this->productcategory_model->get_row_cond(array('id'=>@$cat->parent_id)); 
		//print_r($parentcat);
		if($parentcat){
        @$parentcat2=$this->productcategory_model->get_row_cond(array('id'=>@$parentcat->parent_id)); 
		}
        if($parentcat){$this->breadcrumbarr['javascript:void();']=$parentcat->name;}
        if(@$parentcat2){$this->breadcrumbarr[site_url('products/lists/'.@$parentcat2->slug)]=@$parentcat2->name;}
        if(@$cat){$this->breadcrumbarr[site_url('products/lists/'.$cat->slug)]=$cat->name;}
       //if($cat){ $this->breadcrumbarr[site_url('products/lists/'.$cat->slug)]=@$cat->name; }
	   
		//$lists['pagelists']=$this->products_model->get_catcontents($id);
		
		//$lists['procontent']=$this->contents_model->get_row_cond(array('slug'=>'products'));
		
		$this->load->library('pagination');
				
		$config['base_url'] = base_url().$this->session->userdata('front_language').'/products/lists/'.$id."?";
		
			foreach ($_GET as $key=>$value) {
			   if ($key != 'search' && $key != 'offset') {
				   $config['base_url'] .= '&'.$key.'='.$value;
			   }
			}
//		if(is_numeric($id))
//		{
//			$id="";
//		}
			if(@$cat->parent_id==0)
			{
					$config['total_rows'] = $this->products_model->get_pagination_count($cond);
					
					$config['per_page'] = '12';
					//$config['uri_segment'] = 4;
			}
			else
			{
					$config['total_rows'] = $this->products_model->get_pagination_count($cond);
					//$config['total_rows'] = $this->products_model->get_pagination_count("category_id in ($va)");
			
					$config['per_page'] = '12';
					//$config['uri_segment'] = 5;
			}
			$config['query_string_segment'] = 'offset'; 
			
 			$config['page_query_string'] = true;
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
		
			if (!empty($_GET['offset'])) {
			   $offset = $_GET['offset'];
			} else {
			   $offset = 0;
			}
				if(@$cat->parent_id==0)
				{
		$lists['pagelists']=$this->products_model->get_pagination($config['per_page'],$offset,$cond);
				}
				else
				{
		//$lists['pagelists']=$this->products_model->get_pagination($config['per_page'],$offset,"category_id in ($va)");
		$lists['pagelists']=$this->products_model->get_pagination($config['per_page'],$offset,$cond);
				}
	 	$lists['categories']=$catcontent;
	 	$lists['brands']=$this->testimonial_model->get_featured_active();
		$lists['procat']=(@$cat)?@$cat:$catcontent;
		$lists['parents']=@$parentcat;
	//	$lists['content'] = $contents;
		$frontcontent=$this->load->view('frontend/products/lists',$lists,true);
		//print_r($frontcontent);exit;
		//$currentobj=$this->menuitems_model->get_currentmenu($catcontent->id,'contentlist');

//		$currentmenus=explode(':',$currentobj);
//
//		$this->currentmenu=$currentmenus[0];
//
//		$this->currentparentmenu=$currentmenus[1];

		//$main['contents']=$this->frontproductcontent($frontcontent,true,true,$id);
		
		$main['contents'] = $frontcontent;

		$main['header']=$this->frontheader();

		$main['footer']=$this->frontfooter();

		$main['meta']=$this->frontmetahead();

		$this->load->view('frontend/main',$main);

	}

	public function view($id='')
	{

		//$this->outputCache();
		$this->load->model('frontend/gallery_model');
		//$this->load->model('frontend/video_model');
		$this->load->model('frontend/pages_model');
		$this->load->model('frontend/downloads_model');
		//if($id==''){ redirect('home'); }
		$this->load->model('frontend/insidegallerycategory_model');
		
		$this->load->model('frontend/insidegallery_model');
		$insidebanner=$this->insidegallerycategory_model->get_row_cond(array("slug"=>'products'));
		if(@$insidebanner)
		{
		$this->pagebannners=$this->insidegallery_model->get_row_cond2(array("category_id"=>$insidebanner->id));
		}
		
		$contents=$this->products_model->get_row_cond(array('slug'=>$id));
		
		$catcontent2=$this->productcategory_model->get_array_cond(array('parent_id'=>0,'status'=>'Y'));
		
		$this->load->model('frontend/login_model');

		$this->section='products';

		if(!$contents){redirect('pagenotfound');}
		
		$pagemeta=$this->pages_model->get_row_cond(array('key'=>'products'));
		$catcontent=$this->productcategory_model->load(@$contents->category_id);

		if(@$contents->title!=''){$this->pagetitle=@$contents->title; }

		if(@$contents->meta_desc!=''){$this->desc=@$contents->meta_desc; }

		if(@$contents->name!=''){$this->keys=@$contents->name; }
		
		if(@$catcontent->banner_image!="")
		{
			$this->pagebannner=base_url('public/uploads/products/'.@$catcontent->banner_image);
		}elseif(@$contents->banner_image!="")
		{
			$this->pagebannner=base_url('public/uploads/products/'.@$contents->banner_image);
		}
		else
		{
			@$this->pagebannner=base_url('public/uploads/pages/'.@$pagemeta->banner_image);
		}
		
		//if($pagemeta->banner_image!=''){$this->pagebannner=base_url('public/uploads/pages/'.$pagemeta->banner_image); }

		/*if(@$contents->banner_image!=''){$this->pagebannner=base_url('public/uploads/products/'.@$contents->banner_image); }

		if(@$contents->banner_text!=''){$this->pagebannnertext=@$contents->banner_text; }*/
		
		//$this->load->model('frontend/pages_model');
		//$pagemeta=$this->pages_model->get_row_cond(array('key'=>'products-services'));
		
		/*if($pagemeta->title!=''){$this->pagetitle=$pagemeta->title;}
		if($pagemeta->short_desc!=''){$this->desc=$pagemeta->short_desc; }
		if($pagemeta->desc!=''){$this->fulldesc=$pagemeta->desc; }
		if($pagemeta->keywords!=''){$this->keys=$pagemeta->keywords; }
		if(@$pagemeta->banner_image!=''){$this->pagebannner=base_url('public/uploads/pages/'.$pagemeta->banner_image); }
		if(@$pagemeta->banner_text!=''){$this->pagebannnertext=$pagemeta->banner_text; }	*/	

		//$comm=$this->products_model->get_comments(@$contents->contents_id);
		
		//$this->left_widgets=$this->widgets_model->get_pagewidgets($contents->widgets);

		$menurow=$this->menuitems_model->get_currentmenurow(@$contents->id,'products');

		if($menurow){
		
			$breadcrumbs=array_reverse($this->menuitems_model->get_menu_path($menurow->id));

		} else {
	
			$breadcrumbs=array_reverse($this->productcategory_model->get_category_path(@$catcontent->id));

		}
		//echo $catcontent->id;
		
        $this->breadcrumbarr=array(site_url('/')=>$this->alphasettings['BREADCRUMB_START'],'javascript:void(0);'=>'Products');
        $parentcat=$this->productcategory_model->get_row_cond(array('id'=>@$catcontent->parent_id)); 
        if($parentcat){$this->breadcrumbarr['javascript:void()']=$parentcat->name;}
        if($catcontent){ $this->breadcrumbarr[site_url('products/lists/'.$catcontent->slug)]=@$catcontent->name; }
       	if($contents){ $this->breadcrumbarr[site_url('products/view/'.$contents->slug)]=@$contents->title; }
		//$this->breadcrumbarr=array('/'=>$this->alphasettings['BREADCRUMB_START'],site_url('nolink') => $catcontent->name,site_url('products/view/'.$contents->slug) => $contents->title);

		foreach($breadcrumbs as $index => $breadcrumb):

			$this->breadcrumbarr[$breadcrumb['link']]=$breadcrumb['name'];

		endforeach;

		//$this->breadcrumbarr[site_url('products/view/'.@$contents->slug)]=@$contents->name;

		$currentobj=$this->menuitems_model->get_currentmenu($contents->id,'contents');

		$currentmenus = explode(':',$currentobj);

		$this->currentmenu = $currentmenus[0];

		$this->currentparentmenu = $currentmenus[1];
		
/*		$this->load->library('pagination');
		
		$config['base_url'] = site_url('products/lists/');

		$config['total_rows'] = $this->productcategory_model->get_pagination_count();

		$config['per_page'] = '10';

		$config['uri_segment'] = 4;

		$config['first_link'] = 'First';

		$config['last_link'] = 'Last';

		$config['cur_tag_open'] = '<span>';

		$config['cur_tag_close'] = '</span>';

		$this->pagination->initialize($config)*/	
		
	//	$content['contacts']=$this->contacts_model->get_pagination($config['per_page'],$this->uri->segment($config['uri_segment']));
		
		$main['content'] =	$contents;	
		
		$main['category'] =	$catcontent;	
		
		$main['downloads'] = $this->downloads_model->get_active(array('category_id'=>$contents->id));
		
		$main['images'] = $this->gallery_model->get_array_cond2($contents->id);
		
		$main['related'] = $this->products_model->get_array_cond(array('category_id'=>$contents->category_id,'id != '=>$contents->id));
		
	 	$main['categories']=$catcontent2;
	 	$main['brands']=$this->testimonial_model->get_featured_active();
		
		$main['parents']=@$parentcat;
				
		//$main['videos'] = $this->video_model->get_row_cond(array('category_id'=>$contents->id));
		
		//$main['comments'] =	$comm;
		
		//print_r($main['content']);

		$frontcontent=$this->load->view('frontend/products/view',$main,true);

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
		//$contents=$this->products_model->get_row_cond(array('slug'=>$id));
		//print_r($contents);
		
		//$this->load->model('frontend/login_model');

		//$this->section='products';

		//if(!$contents){redirect('pagenotfound');}
		
		//$pagemeta=$this->pages_model->get_row_cond(array('key'=>'search'));

		//if(@$contents->title!=''){$this->pagetitle=@$contents->title; }

		//if(@$contents->meta_desc!=''){$this->desc=@$contents->meta_desc; }

		//if(@$contents->name!=''){$this->keys=@$contents->name; }
		//if($pagemeta->banner_image!=''){$this->pagebannner=base_url('public/uploads/pages/'.$pagemeta->banner_image); }

		/*if(@$contents->banner_image!=''){$this->pagebannner=base_url('public/uploads/products/'.@$contents->banner_image); }

		if(@$contents->banner_text!=''){$this->pagebannnertext=@$contents->banner_text; }*/
		
		//$this->load->model('frontend/pages_model');
		//$pagemeta=$this->pages_model->get_row_cond(array('key'=>'products-services'));
		
		/*if($pagemeta->title!=''){$this->pagetitle=$pagemeta->title;}
		if($pagemeta->short_desc!=''){$this->desc=$pagemeta->short_desc; }
		if($pagemeta->desc!=''){$this->fulldesc=$pagemeta->desc; }
		if($pagemeta->keywords!=''){$this->keys=$pagemeta->keywords; }
		if(@$pagemeta->banner_image!=''){$this->pagebannner=base_url('public/uploads/pages/'.$pagemeta->banner_image); }
		if(@$pagemeta->banner_text!=''){$this->pagebannnertext=$pagemeta->banner_text; }	*/	

		//$catcontent=$this->productcategory_model->load(@$contents->category_id);
		//$comm=$this->products_model->get_comments(@$contents->contents_id);
		
		//$this->left_widgets=$this->widgets_model->get_pagewidgets($contents->widgets);

		//$menurow=$this->menuitems_model->get_currentmenurow(@$contents->id,'products');

//		if($menurow){
//		
//			$breadcrumbs=array_reverse($this->menuitems_model->get_menu_path($menurow->id));
//
//		} else {
//	
//			$breadcrumbs=array_reverse($this->productcategory_model->get_category_path(@$catcontent->id));
//
//		}
		//echo $catcontent->id;
		
//		$this->breadcrumbarr=array('/'=>$this->alphasettings['BREADCRUMB_START'],site_url('nolink') => $catcontent->name,site_url('products/view/'.$contents->slug) => $contents->title);
//
//		foreach($breadcrumbs as $index => $breadcrumb):
//
//			$this->breadcrumbarr[$breadcrumb['link']]=$breadcrumb['name'];
//
//		endforeach;

		//$this->breadcrumbarr[site_url('products/view/'.@$contents->slug)]=@$contents->name;

//		$currentobj=$this->menuitems_model->get_currentmenu($contents->id,'contents');
//
//		$currentmenus = explode(':',$currentobj);
//
//		$this->currentmenu = $currentmenus[0];
//
//		$this->currentparentmenu = $currentmenus[1];
		
/*		$this->load->library('pagination');
		
		$config['base_url'] = site_url('products/lists/');

		$config['total_rows'] = $this->productcategory_model->get_pagination_count();

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
//		$main['related'] = $this->products_model->get_array_cond(array('make_id'=>$contents->make_id,'id != '=>$contents->id));
//		
//		$main['videos'] = $this->video_model->get_row_cond(array('category_id'=>$contents->id));
		
		$main['downloads'] = $this->downloads_model->get_active(array('category_id'=>$id));
		
		//$main['comments'] =	$comm;
		
		//print_r($main['content']);

		$this->load->view('frontend/products/popup',$main);

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
		$contents=$this->products_model->get_row_cond(array('slug'=>$id));
		
		//print_r($contents);
		
		$this->load->model('frontend/login_model');

		$this->section='products';

		if(!$contents){redirect('pagenotfound');}
		
		$pagemeta=$this->pages_model->get_row_cond(array('key'=>'search'));

		if(@$contents->title!=''){$this->pagetitle=@$contents->title; }

		if(@$contents->meta_desc!=''){$this->desc=@$contents->meta_desc; }

		if(@$contents->name!=''){$this->keys=@$contents->name; }
		
		if($pagemeta->banner_image!=''){$this->pagebannner=base_url('public/uploads/pages/'.$pagemeta->banner_image); }

		/*if(@$contents->banner_image!=''){$this->pagebannner=base_url('public/uploads/products/'.@$contents->banner_image); }

		if(@$contents->banner_text!=''){$this->pagebannnertext=@$contents->banner_text; }*/
		
		//$this->load->model('frontend/pages_model');
		//$pagemeta=$this->pages_model->get_row_cond(array('key'=>'products-services'));
		
		/*if($pagemeta->title!=''){$this->pagetitle=$pagemeta->title;}
		if($pagemeta->short_desc!=''){$this->desc=$pagemeta->short_desc; }
		if($pagemeta->desc!=''){$this->fulldesc=$pagemeta->desc; }
		if($pagemeta->keywords!=''){$this->keys=$pagemeta->keywords; }
		if(@$pagemeta->banner_image!=''){$this->pagebannner=base_url('public/uploads/pages/'.$pagemeta->banner_image); }
		if(@$pagemeta->banner_text!=''){$this->pagebannnertext=$pagemeta->banner_text; }	*/	

		$catcontent=$this->productcategory_model->load(@$contents->category_id);
		//$comm=$this->products_model->get_comments(@$contents->contents_id);
		
		//$this->left_widgets=$this->widgets_model->get_pagewidgets($contents->widgets);

		$menurow=$this->menuitems_model->get_currentmenurow(@$contents->id,'products');

		if($menurow){
		
			$breadcrumbs=array_reverse($this->menuitems_model->get_menu_path($menurow->id));

		} else {
	
			$breadcrumbs=array_reverse($this->productcategory_model->get_category_path(@$catcontent->id));

		}
		//echo $catcontent->id;
		
		$this->breadcrumbarr=array('/'=>$this->alphasettings['BREADCRUMB_START'],site_url('nolink') => $catcontent->name,site_url('products/view/'.$contents->slug) => $contents->title);

		foreach($breadcrumbs as $index => $breadcrumb):

			$this->breadcrumbarr[$breadcrumb['link']]=$breadcrumb['name'];

		endforeach;

		//$this->breadcrumbarr[site_url('products/view/'.@$contents->slug)]=@$contents->name;

		$currentobj=$this->menuitems_model->get_currentmenu($contents->id,'contents');

		$currentmenus = explode(':',$currentobj);

		$this->currentmenu = $currentmenus[0];

		$this->currentparentmenu = $currentmenus[1];
		
/*		$this->load->library('pagination');
		
		$config['base_url'] = site_url('products/lists/');

		$config['total_rows'] = $this->productcategory_model->get_pagination_count();

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
		$main['related'] = $this->products_model->get_array_cond(array('make_id'=>$contents->make_id,'id != '=>$contents->id));
		
		$main['videos'] = $this->video_model->get_row_cond(array('category_id'=>$contents->id));
		
		//$main['comments'] =	$comm;
		
		
		//print_r($main['content']);

		$frontcontent=$this->load->view('frontend/products/printview',$main,true);

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
		$contents=$this->products_model->get_row_cond(array('slug'=>$file));
		//echo base_url().'public/uploads/pdf/'.$contents->pdf;
		$data = file_get_contents(base_url().'public/uploads/products/'.$contents->pdf); // Read the file's contents
		//echo $data;exit;
		$name = $contents->pdf;
		force_download($name, $data); 
		echo $data."/".$name;
   }
   
   	public function catalogue($file="")
	{
		$this->load->helper('download');
		$contents=$this->productcategory_model->get_row_cond(array('slug'=>$file));
		//echo base_url().'public/uploads/pdf/'.$contents->pdf;
		$data = file_get_contents(base_url().'public/uploads/products/'.$contents->pdf); // Read the file's contents
		//echo $data;exit;
		$name = $contents->pdf;
		force_download($name, $data); 
		echo $data."/".$name;
   }


	public function listview($id='')
	{

		$contents=$this->productcategory_model->get_row_cond(array('slug'=>$id));

		$this->section='products';

		//if(!$contents){redirect('pagenotfound');}

		if($contents->name!=''){$this->pagetitle=$contents->name; }

		//if($contents->meta_desc!=''){$this->desc=$contents->meta_desc; }

		if($contents->keywords!=''){$this->keys=$contents->keywords; }

		//if($contents->image!=''){$this->pagebannner=base_url('public/uploads/products/'.$contents->image); }

		//if($contents->banner_text!=''){$this->pagebannnertext=$contents->banner_text; }

		//$catcontent=$this->productcategory_model->load($contents->category_id);

	//$this->left_widgets=$this->widgets_model->get_pagewidgets($contents->widgets);

		$menurow=$this->menuitems_model->get_currentmenurow($contents->id,'products');

		if($menurow){
		
			$breadcrumbs=array_reverse($this->menuitems_model->get_menu_path($menurow->id));

		} else {
		
			$breadcrumbs=array_reverse($this->productcategory_model->get_category_path($contents->id));

		}

		$this->breadcrumbarr=array('/'=>$this->alphasettings['BREADCRUMB_START'],site_url('products/lists/products') => "Products",site_url('products/listview/'.$contents->slug) => $contents->name);

		foreach($breadcrumbs as $index => $breadcrumb):

			$this->breadcrumbarr[$breadcrumb['link']]=$breadcrumb['name'];
		endforeach;

		$lists['catid']=$this->productcategory_model->get_row_cond(array('slug'=>$id));
		$lists['procategory']=$this->products_model->get_array_cond(array('category_id'=>$lists['catid']->id));
		$frontcontent=$this->load->view('frontend/products/productlist',$lists,true);

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

		$contents=$this->products_model->get_row_cond(array('slug'=>$id));

		$this->section='contents';

		if(!$contents){redirect('pagenotfound');}

		$main['content'] =	$contents;	

		$this->load->view('frontend/products/listview',$main);*/

	}

}

/* End of file contents.php */

/* Location: ./application/controllers/contents.php */