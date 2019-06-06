<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Faqs extends Astartafront_Controller {

	public function index()

	{

		$this->load->model('frontend/pages_model');

		$pagemeta=$this->pages_model->get_row_cond(array('key'=>'faqs'));

		if($pagemeta->title!=''){$this->pagetitle=$pagemeta->title;}

		if($pagemeta->short_desc!=''){$this->desc=$pagemeta->short_desc; }

		if($pagemeta->keywords!=''){$this->keys=$pagemeta->keywords; }

		if($pagemeta->banner_image!=''){$this->pagebannner=base_url('public/uploads/pages/'.$pagemeta->banner_image); }

		if($pagemeta->banner_text!=''){$this->pagebannnertext=$pagemeta->banner_text; }

		$this->left_widgets=$this->widgets_model->get_pagewidgets($pagemeta->widgets);

		$menurow=$this->menuitems_model->get_currentmenurow('faqs','internal');

		$breadcrumbs=array_reverse($this->menuitems_model->get_menu_path($menurow->id));	

		$this->breadcrumbarr=array('/'=>$this->alphasettings['BREADCRUMB_START']);

		foreach($breadcrumbs as $index => $breadcrumb):

			$this->breadcrumbarr[$breadcrumb['link']]=$breadcrumb['name'];

		endforeach;

		$currentobj=$this->menuitems_model->get_currentmenu('faqs','internal');

		$currentmenus=explode(':',$currentobj);

		$this->currentmenu=$currentmenus[0];

		$this->currentparentmenu=$currentmenus[1];

		$this->load->model('frontend/faqs_model');

		$home['faqs']=$this->faqs_model->get_active();

		$frontcontent=$this->load->view('frontend/faqs/index',$home,true);

		$main['contents']=$this->frontcontent($frontcontent,true);

		$main['header']=$this->frontheader();

		$main['footer']=$this->frontfooter();

		$main['meta']=$this->frontmetahead();

		$this->load->view('frontend/main',$main);

	}

}

/* End of file news.php */

/* Location: ./application/controllers/news.php */