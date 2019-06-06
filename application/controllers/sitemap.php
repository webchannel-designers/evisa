<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Sitemap extends Officefront_Controller {
	public function index()
	{
		$this->load->model('frontend/pages_model');
		$pagemeta=$this->pages_model->get_row_cond(array('key'=>'sitemap'));
 		if($pagemeta->title!=''){$this->pagetitle=$pagemeta->title;}
		if($pagemeta->short_desc!=''){$this->desc=$pagemeta->short_desc; }
		if($pagemeta->keywords!=''){$this->keys=$pagemeta->keywords; }
		if($pagemeta->banner_image!=''){  $this->pagebannner=base_url('public/uploads/pages/'.$pagemeta->banner_image); }
		if($pagemeta->banner_text!=''){$this->pagebannnertext=$pagemeta->banner_text; }
 		@$breadcrumbs=array_reverse($this->menuitems_model->get_menu_path($menurow->id));	
		$this->breadcrumbarr=array('/'=>$this->alphasettings['BREADCRUMB_START'],site_url('sitemap') => "Site Map",);
		foreach($breadcrumbs as $index => $breadcrumb):
			$this->breadcrumbarr[$breadcrumb['link']]=$breadcrumb['name'];
		endforeach;
 		//$home['mainmenu']=$this->menuitems_model->get_sitemap('top_menu');
 		$home['about']=$this->menuitems_model->get_menu_ul('about');
		$home['categories']=$this->productcategory_model->get_array(array('parent_id'=>0));
		$home['other']=$this->menuitems_model->get_menu_ul('other');
		$frontcontent=$this->load->view('frontend/include/sitemap',$home,true); 
		$main['contents']=$this->frontcontent($frontcontent,true); 
		$main['contents'] = $frontcontent; 
		$main['header']=$this->frontheader();
		$main['footer']=$this->frontfooter();
		$main['meta']=$this->frontmetahead();
		$this->load->view('frontend/main',$main);
	}
}
/* End of file news.php */
/* Location: ./application/controllers/news.php */