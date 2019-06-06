<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Pagenotfound extends Visafront_Controller {
	public function index()
	{
		$this->load->model('frontend/pages_model');
		$pagemeta=$this->pages_model->get_row_cond(array('key'=>'pagenotfound'));
		if($pagemeta->title!=''){$this->pagetitle=$pagemeta->title;}
		if($pagemeta->short_desc!=''){$this->desc=$pagemeta->short_desc; }
		if($pagemeta->keywords!=''){$this->keys=$pagemeta->keywords; }
		if($pagemeta->banner_image!=''){$this->pagebannner=base_url('public/uploads/pages/'.$pagemeta->banner_image); }
		if($pagemeta->banner_text!=''){$this->pagebannnertext=$pagemeta->banner_text; }
		$this->left_widgets=$this->widgets_model->get_pagewidgets($pagemeta->widgets);
		$this->breadcrumbarr=array('/'=>$this->alphasettings['BREADCRUMB_START'],site_url('contactus') =>$this->pagetitle);
		$frontcontent=$this->load->view('frontend/content/pagenotfound',array('page'=>$pagemeta),true);
		$main['contents']=$this->frontcontent($frontcontent,true);
		$main['header']=$this->frontheader();
		$main['footer']=$this->frontfooter();
		$main['meta']=$this->frontmetahead();
		$this->load->view('frontend/main',$main);
	}
	
}
/* End of file contents.php */
/* Location: ./application/controllers/contents.php */