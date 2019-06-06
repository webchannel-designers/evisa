<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Contents extends Ecucfront_Controller {
	public function index($id='')
	{
		redirect('home');
	}
	
	public function lists($id='')
	{
		if($id==''){ redirect('home'); }
		$this->load->model('frontend/contents_model');
		$this->load->model('frontend/contentcategory_model');
		$catcontent=$this->contentcategory_model->get_row_cond(array('slug'=>$id));
		if(!$catcontent){redirect('home');}
		if($catcontent->name!=''){$this->pagetitle=$catcontent->name; }
		if($catcontent->short_desc!=''){$this->desc=$catcontent->short_desc; }
		if($catcontent->keywords!=''){$this->keys=$catcontent->keywords; }	
		$this->right_widgets=$this->widgets_model->get_pagewidgets($catcontent->widgets);	
		$this->breadcrumbarr=array('/'=>'Home',site_url('contents/lists/'.$catcontent->slug) => $catcontent->name);
		$lists['pagelists']=$this->contents_model->get_array_cond(array('category_id'=>$catcontent->id,'status'=>'Y'));
		$frontcontent=$this->load->view('frontend/contents/lists',$lists,true);
		
		$main['contents']=$this->frontcontent($frontcontent);	
		$main['meta']=$this->frontmetahead();
		$main['header']=$this->frontheader();
		$main['footer']=$this->frontfooter();
		$main['stockticker']=$this->frontstockticker();	
		$this->load->view('frontend/main',$main);
	}
	
	public function view($id='')
	{
		if($id==''){ redirect('home'); }
		$this->load->model('frontend/contents_model');
		$this->load->model('frontend/contentcategory_model');
		$this->load->model('frontend/menuitems_model');
		
		$contents=$this->contents_model->get_row_cond(array('slug'=>$id));
		
		$parentid_name=$this->menuitems_model->get_row_cond_parent(array('link_object'=>$contents->id));
		@$parent=$parentid_name->parent_id;
		if($parent==0)
		{
		echo $contents->id;
		}
		$current_parent1=$this->menuitems_model->get_row_cond_current(array('menuitems_id'=>$parent));
	   @$currentpage=$current_parent1->name;
		@$tlevel=$current_parent1->parent_id;
		$current_parentsub=$this->menuitems_model->get_row_cond_current(array('parent_id'=>$parent));
		@$subparent=$current_parentsub->id;
		$tsubparent=$this->menuitems_model->get_row_cond_current(array('parent_id'=>$subparent));
		@$flevel=$tsubparent->parent_id;
		/*if($subparent!=0)
		{
		echo "haiii";
		$tsubparent=$this->menuitems_model->get_row_cond_current(array('id'=>$subparent));
		if($tsubparent!='')
		{
		$parent=$subparent;
		}
		}*/
		
		
		if($tlevel!=0)
		{
		
		$current_parent2=$this->menuitems_model->get_row_cond_current(array('id'=>$tlevel));
	    $currentpage2=$current_parent2->link_object;
		$contents3=$this->contents_model->get_row_cond(array('id'=>$currentpage2));
		$tparslug=$contents3->slug;
		$tparname=$contents3->title;
		if($subparent!=0)
		{
		$tsubparent=$this->menuitems_model->get_row_cond_current(array('id'=>$subparent));
		$val=$parent;
		}
		else
		{
		$val=$subparent;
		}
		
		}
		else
		{
		if($flevel!='')
		{
		$val=$subparent;
		}
		else
		{
		$val=$parent;
		}
		}
		
		
		$main['submenus']=$this->menuitems_model->get_array_cond_parent(array('parent_id'=>$val));
		
		
		
		 @$link_id=$current_parent1->link_object;
		$contents2=$this->contents_model->get_row_cond(array('id'=>$link_id));
		@$parslug=$contents2->slug;
		if(!$contents){redirect('home');}
		if($contents->title!=''){$this->pagetitle=$contents->title; }
		if($contents->meta_desc!=''){$this->desc=$contents->meta_desc; }
		if($contents->keywords!=''){$this->keys=$contents->keywords; }
		if($contents->banner_image!=''){$this->pagebannner=base_url('public/uploads/contents/'.$contents->banner_image); }
		if($contents->image!=''){$this->pagephoto=base_url('public/uploads/contents/'.$contents->image); }
		if($contents->banner_text!=''){$this->pagebannnertext=$contents->banner_text; }
		$catcontent=$this->contentcategory_model->load($contents->category_id);
		$this->right_widgets=$this->widgets_model->get_pagewidgets($contents->widgets);
		if($catcontent->breadcrumb_status=='N'){
			$this->breadcrumbarr=array('/'=>'Home',site_url('contents/view/'.$contents->slug) => $contents->title );
		} else {
		if(@$tparname!="")
		{
		$class="";
		$subslug=$parslug;
		$this->breadcrumbarr=array('/'=>'Home',site_url('contents/view/'.$tparslug) => $tparname,site_url('contents/view/'.$parslug) => $currentpage,site_url('contents/view/'.$contents->slug) => $contents->title );
		}
		elseif($currentpage!="")
		{
		$class="class=active";
		$subslug=$contents->slug;
		$this->breadcrumbarr=array('/'=>'Home',site_url('contents/view/'.$parslug) => $currentpage,site_url('contents/view/'.$contents->slug) => $contents->title );
		}
		else
		{
		if($contents->category_id==8)
		{
		$slug=$contents->slug;
		$this->breadcrumbarr=array('/'=>'Home','contents/view/'.$contents->slug => 'Academic Calender',site_url('contents/view/'.$contents->slug) => $contents->title );
		}
		else
		{
			$this->breadcrumbarr=array('/'=>'Home',site_url('contents/view/'.$contents->slug) => $contents->title );
			}
			}
		}
		@$main['subclass']=$class;
		@$main['content'] =	$contents;	
		@$main['subslug']=$subslug;
		$main['id']=$id;
		if($flevel!='')
		{
		 $main['cpage']=$contents->title;
		@$main['tname']=$currentpage;
		}
		else
		{
		
		$main['cpage']=$currentpage;
		@$main['tname']=$tparname;
		}
		$main['parslug']=$parslug;
		
		$frontcontent=$this->load->view('frontend/contents/view',$main,true);
		$main['contents']=$this->frontcontent($frontcontent);
		$main['meta']=$this->frontmetahead();
		$main['header']=$this->frontheader();
		$main['footer']=$this->frontfooter();
		//$main['stockticker']=$this->frontstockticker();
		$this->load->view('frontend/main',$main);
	}
	
}
/* End of file contents.php */
/* Location: ./application/controllers/contents.php */