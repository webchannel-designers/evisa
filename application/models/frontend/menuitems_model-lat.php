<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Menuitems_model extends CI_Model {
    function __construct()
    {
        parent::__construct();
		$this->lang_table_name='languages';
		$this->table_name='menuitems';
		$this->desc_table_name='menuitems_desc';
		$this->primary_key ='id';
		$this->foreign_key='menuitems_id';
		$this->menuprimary_key ='id';
		$this->menuforeign_key='menu_id';
		$this->menutable_name='menus';
		$this->depth=0;
		$this->height=0;
		$this->exclude=array();
		$this->menuarr=array();
    }
	
	function get_array($cond='')
	{
		if(isset($cond)){
			$this->db->where($cond);
		}
		$this->db->from($this->table_name);
		$this->db->join($this->desc_table_name, "$this->desc_table_name.$this->foreign_key = $this->table_name.$this->primary_key");
		$this->db->where('language',$this->session->userdata('front_language'));
		$query = $this->db->get();
        return $query->result_array();
	}
	
	function get_array_cond_limit($cond,$limit)
	{
		$this->db->where($cond);
		$this->db->limit($limit);
		$this->db->from($this->table_name);
		$this->db->join($this->desc_table_name, "$this->desc_table_name.$this->foreign_key = $this->table_name.$this->primary_key");
		$this->db->where('language',$this->session->userdata('front_language'));
		$query = $this->db->get();
        return $query->result_array();
	}
	
	function get_active()
	{
		$this->db->where('status','Y');
		$this->db->from($this->table_name);
		$this->db->join($this->desc_table_name, "$this->desc_table_name.$this->foreign_key = $this->table_name.$this->primary_key");
		$this->db->where('language',$this->session->userdata('front_language'));
		$query = $this->db->get();
        return $query->result_array();
	}
	
	function get_array_limit($limit)
	{
		$this->db->limit($limit);
		$this->db->from($this->table_name);
		$this->db->join($this->desc_table_name, "$this->desc_table_name.$this->foreign_key = $this->table_name.$this->primary_key");
		$this->db->where('language',$this->session->userdata('front_language'));
		$query = $this->db->get();
        return $query->result_array();
	}
	
	function load($id)
	{
		$id=$this->db->escape_str($id);
		$cond=array('id'=>$id);
		$this->db->where($cond);
		$this->db->from($this->table_name);
		$this->db->join($this->desc_table_name, "$this->desc_table_name.$this->foreign_key = $this->table_name.$this->primary_key");
		$this->db->where('language',$this->session->userdata('front_language'));
		$query = $this->db->get();
        return $query->row();
	}
	
	function get_row_cond($cond)
	{
		$this->db->where($cond);
		$this->db->from($this->table_name);
		$this->db->join($this->desc_table_name, "$this->desc_table_name.$this->foreign_key = $this->table_name.$this->primary_key");
		$this->db->where('language',$this->session->userdata('front_language'));
		$query = $this->db->get();
        return $query->row();
	}
	function get_row_cond_current($cond)
	{
		$this->db->where($cond);
		$this->db->from($this->table_name);
		$this->db->join($this->desc_table_name, "$this->desc_table_name.$this->foreign_key = $this->table_name.$this->primary_key");
		$this->db->where('language',$this->session->userdata('front_language'));
		$query = $this->db->get();
        return $query->row();
	}
	function get_array_cond_parent($cond)
	{
		$this->db->where($cond);
		$this->db->from($this->table_name);
		$this->db->join($this->desc_table_name, "$this->desc_table_name.$this->foreign_key = $this->table_name.$this->primary_key");
		
		$this->db->join('contents', "contents.id = $this->table_name.link_object");
		$this->db->where('language',$this->session->userdata('front_language'));
		$query = $this->db->get();
        return $query->result_array();
	}
	function get_row_cond_parent($cond)
	{
		$this->db->where($cond);
		$this->db->from($this->table_name);
		$this->db->join($this->desc_table_name, "$this->desc_table_name.$this->foreign_key = $this->table_name.$this->primary_key");
		$this->db->where('language',$this->session->userdata('front_language'));
		$query = $this->db->get();
        return $query->row();
	}
	
	function insert($maindata,$descdata)
	{
		$this->db->insert($this->table_name,$maindata);
		$prime=$this->db->insert_id();
		$query = $this->db->get($this->lang_table_name);
        foreach($query->result_array() as $row):
			$rowdata=$descdata;
			$rowdata[$this->foreign_key]=$prime;
			$rowdata['language']=$row['code'];
			$this->db->insert($this->desc_table_name,$rowdata);
			unset($rowdata);
		endforeach;		
		return $prime;
	}
	
	function update($maindata,$descdata,$id)
	{
		$cond[$this->primary_key]=$id;
		$desccond[$this->foreign_key]=$id;
		$desccond['language']=$this->session->userdata('front_language');
		if(count($descdata)>0){
			$this->db->update($this->desc_table_name,$descdata,$desccond);
		}
		return $this->db->update($this->table_name,$maindata,$cond);
	}
	
	function delete($id)
	{
		$desccond=array($this->foreign_key=>$id);
		$this->db->delete($this->desc_table_name,$desccond);
		$cond=array('id'=>$id);
		return $this->db->delete($this->table_name,$cond);
	}
	
	function get_pagination_count($cond='')
    {
        $this->db->select('*');
		if(is_array($cond) && count($cond)>0){
		$this->db->where($cond);
		}
        $this->db->from($this->table_name);
		$this->db->join($this->desc_table_name, "$this->desc_table_name.$this->foreign_key = $this->table_name.$this->primary_key");
		$this->db->where('language',$this->session->userdata('front_language'));
		$query = $this->db->get();
        return $query->num_rows();
    }
	
	function get_pagination($num, $offset, $cond='')
    {
        $this->db->select('*');
		if(is_array($cond) && count($cond)>0){
		$this->db->where($cond);
		}
		$this->db->limit($num, $offset);
        $this->db->from($this->table_name);
		$this->db->join($this->desc_table_name, "$this->desc_table_name.$this->foreign_key = $this->table_name.$this->primary_key");
		$this->db->where('language',$this->session->userdata('front_language'));
		$query = $this->db->get();
        return $query->result_array();
    }
	
	function code_exists($code,$id)
	{
		$this->db->where('code',$code);
		$this->db->where('id !=',$id);
		$query = $this->db->get($this->table_name);
        $result = $query->num_rows();
		if($result>0){
			return true;
		} else {
			return false;
		}
	}
	
	function get_subcategories($cond)

	{

		$this->db->from($this->table_name);

		$this->db->join($this->desc_table_name, "$this->desc_table_name.$this->foreign_key = $this->table_name.$this->primary_key");

		$this->db->where('language',$this->session->userdata('front_language'));

		$this->db->where($cond);
		$this->db->order_by('sort_order','asc');
		$query = $this->db->get();
		//echo $this->db->last_query();
        return $query->result_array();

	}
//	function get_subcategories($cond)
//	{
//		$this->db->from($this->table_name);
//		$this->db->join($this->desc_table_name, "$this->desc_table_name.$this->foreign_key = $this->table_name.$this->primary_key");
//		$this->db->where('language',$this->session->userdata('front_language'));
//		$this->db->where($cond);
//		$this->db->order_by("sort_order", "asc");
//		$query = $this->db->get();
//        return $query->result_array();
//	}
	function get_subcategories_home($cond='')
	{
		$this->db->from($this->table_name);
		$this->db->join($this->desc_table_name, "$this->desc_table_name.$this->foreign_key = $this->table_name.$this->primary_key");
		$this->db->where('language',$this->session->userdata('front_language'));
		$this->db->where('parent_id','8');
		$query = $this->db->get();
        return $query->result_array();
	}
	function get_subcategories1($cond)
	{
	$this->load->model('widgets_model');
	$fmenu=$this->widgets_model->load_footer();
	$cond1=$fmenu->parent_menu_id;
	@$fldwid = explode(",",stripslashes($cond1));
	//$this->db->distinct('id');
		$this->db->from($this->table_name);
		$this->db->join($this->desc_table_name, "$this->desc_table_name.$this->foreign_key = $this->table_name.$this->primary_key");
		$this->db->where('language',$this->session->userdata('front_language'));
		$this->db->where($cond);
		$this->db->where_in('menuitems_id',$fldwid);
		$query = $this->db->get();
        return $query->result_array();
	}
	
	function get_menu_list_tree($cond,$selected='')
	{
		$activearr=array('Y'=>'Active','N'=>'Inactive');
		$temp_tree = "";            
		$children = $this->get_subcategories($cond);
		foreach ($children as $child)
		{
			$temp_tree .='<tr>
				<td class="align-center"><input type="checkbox" name="id[]" value="'.$child['id'].'" /></td>
				<td>';
			for ( $c=0;$c<$this->depth;$c++ )            // Indent over so that there is distinction between levels
			{$temp_tree .= "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"; }
			$temp_tree .= '<span class="menutitle" style="background-image:url('.base_url('public/admin/images/arrows/'.$this->depth.'.png').')">';
			$temp_tree .=$child['name'].'</span></td>
				<td align="center"><input style="text-align:center;" type="text" size="2" name="sort_order['.$child['id'].']" value="'.$child['sort_order'].'" /></td>
				<td align="center">'.$activearr[$child['status']].'</td>
				<td>
					<a href="'.site_url('admin/menus/menuitemedit/'.$child['menu_id'].'/'.$child['id']).'" class="table-icon edit" title="Edit"></a>					
				</td>
			</tr>';
			$this->depth++;	
			$cond['parent_id']=	$child['id'];	
			$temp_tree .= $this->get_menu_list_tree($cond,$selected);			
			$this->depth--;
			array_push($this->exclude, $child['id']);
			$this->height++;
		}		
		return $temp_tree;
	}
	
	function get_category_tree($menuid,$id='0',$selected='')
	{
		$temp_tree = "";
		$cond=array('menu_id'=>$menuid,'parent_id'=>$id);    
		$children = $this->get_subcategories($cond);
		foreach ($children as $child)
		{
			$temp_tree .='<option value="'.$child['id'].'"';
			if($selected==$child['id']){$temp_tree .= ' selected="selected" ';}
			$temp_tree .= '>';
			for ( $c=0;$c<$this->depth;$c++ )            // Indent over so that there is distinction between levels
			{$temp_tree .= "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"; }
			if($this->depth>0){$temp_tree .= '----&nbsp;';}
			$temp_tree .=$child['name'].'</option>';
			$this->depth++;			
			$temp_tree .= $this->get_category_tree($menuid,$child['id'],$selected);			
			$this->depth--;
			array_push($this->exclude, $child['id']);
			$this->height++;
		}		
		return $temp_tree;
	}
	
	function get_target_types()
	{
		return array('_self'=>'Self','_blank'=>'Blank','_new'=>'New','_parent'=>'Parent','_top'=>'Top');
	}
	function get_link_types()
	{
		return array('contents'=>'Contents','news'=>'News','contentlist'=>'Contents Listing','external'=>'External Link','internal'=>'Internal Link');
	}
	
	function get_single_levelmenu($menuid)
	{
		$menus=array();
		$cond=array('code'=>$menuid,'parent_id'=>'0','menuitems.status'=>'Y');	
		$this->db->select('menuitems.*, menuitems_desc.*');		
		$this->db->from($this->table_name);
		$this->db->join($this->desc_table_name, "$this->desc_table_name.$this->foreign_key = $this->table_name.$this->primary_key");
		$this->db->join('menus', "menus.id = $this->table_name.menu_id");
		$this->db->where('language',$this->session->userdata('front_language'));
		$this->db->where($cond);
		$this->db->order_by('sort_order','ASC');
		$query = $this->db->get();
        $results=$query->result_array();
		if(count($results)>0){
		foreach($results as $result):
			$link='';
			if($result['link_type']=='attachments'){
				$link=base_url('public/uploads/menus/'.$result['attachment']);
			}
			if($result['link_type']=='internal'){
				$link=site_url($result['link']);
			}
			if($result['link_type']=='contents'){
				if(isset($this->contentslugs[$result['link_object']])){
					@$link=site_url('contents/view/'.$this->contentslugs[$result['link_object']]);
				} else {
					@$link=site_url('/');
				}
			}
			if($result['link_type']=='contentlist'){
				if(isset($this->contentcategoryslugs[$result['link_object']])){
					$link=site_url('contents/lists/'.$this->contentcategoryslugs[$result['link_object']]);
				} else {
					@$link=site_url('/');
				}				
			}
			if($result['link_type']=='newslist'){
				if(isset($this->newcategoryslugs[$result['link_object']])){
					$link=site_url('news/lists/'.$this->newcategoryslugs[$result['link_object']]);
				} else {
					@$link=site_url('/');
				}				
			}				
			if($result['link_type']=='news'){
				if(isset($this->newslugs[$result['link_object']])){
					@$link=site_url('news/view/'.$this->newslugs[$result['link_object']]);
				} else {
					@$link=site_url('/');
				}				
			}				
			if($result['link_type']=='nolink'){
				$link="javascript:void(0);";
			}						
			$menu['link']=$link;
			$menu['name']=$result['name'];
			$menu['windowtype']=$result['target_type'];
			$menus[]=$menu;
			unset($menu);
		endforeach;
		}
		return $menus;
	}
	function get_singlelevel_submenu($menuid,$limit)
	{
		$menuvars=explode(':',$menuid);
		$menuid=$menuvars[0];
		$parentid=$menuvars[1];
		$menus=array();
		$cond=array('menu_id'=>$menuid,'parent_id'=>$parentid,'menuitems.status'=>'Y');	
		$this->db->select('menuitems.*, menuitems_desc.*');		
		$this->db->from($this->table_name);
		$this->db->join($this->desc_table_name, "$this->desc_table_name.$this->foreign_key = $this->table_name.$this->primary_key");
		$this->db->join('menus', "menus.id = $this->table_name.menu_id");
		$this->db->where('language',$this->session->userdata('front_language'));
		$this->db->where($cond);
		$this->db->limit($limit);
		$this->db->order_by('sort_order','ASC');
		$query = $this->db->get();
        $results=$query->result_array();
		if(count($results)>0){
		foreach($results as $result):
			$link='';
			if($result['link_type']=='attachments'){
				$link=base_url('public/uploads/menus/'.$result['attachment']);
			}
			if($result['link_type']=='internal'){
				$link=site_url($result['link']);
			}
			if($result['link_type']=='contents'){
				if(isset($this->contentslugs[$result['link_object']])){
					@$link=site_url('contents/view/'.$this->contentslugs[$result['link_object']]);
				} else {
					@$link=site_url('/');
				}
			}
			if($result['link_type']=='contentlist'){
				if(isset($this->contentcategoryslugs[$result['link_object']])){
					$link=site_url('contents/lists/'.$this->contentcategoryslugs[$result['link_object']]);
				} else {
					@$link=site_url('/');
				}				
			}
			if($result['link_type']=='newslist'){
				if(isset($this->newcategoryslugs[$result['link_object']])){
					$link=site_url('news/lists/'.$this->newcategoryslugs[$result['link_object']]);
				} else {
					@$link=site_url('/');
				}				
			}				
			if($result['link_type']=='news'){
				if(isset($this->newslugs[$result['link_object']])){
					@$link=site_url('news/view/'.$this->newslugs[$result['link_object']]);
				} else {
					@$link=site_url('/');
				}				
			}				
			if($result['link_type']=='nolink'){
				$link="javascript:void(0);";
			}						
			$menu['link']=$link;
			$menu['name']=$result['name'];
			$menu['windowtype']=$result['target_type'];
			$menus[]=$menu;
			unset($menu);
		endforeach;
		}
		return $menus;
	}
	function get_menu_ul($menuid,$id='0')

	{
		$this->load->model('menu_model');
		$this->load->model('productcategory_model');
		$menu=$this->menu_model->get_row_cond(array('code'=>$menuid));
		$temp_tree ='';
		if($menu){		
		$cond=array('menu_id'=>$menu->id,'parent_id'=>$id,'menuitems.status'=>'Y','menuitems.show_subitems'=>'Y');    
		$children = $this->get_subcategories($cond);
		$count=count($children);
		if($count>0){
		$i=0;
		if($this->depth=='1') { $temp_tree .= "<div class='sub-nav'>"; }	
		$temp_tree .='<ul';
		if($this->depth==''){$temp_tree .= " class='$menu->class'";} 
		$temp_tree .= '>';	
		//echo $this->depth;exit;
		foreach ($children as $child)
		{	
		//print_r($child);
		$i++;
			$link='';
			if($child['link_type']=='attachments'){
				$link=base_url('public/uploads/menus/'.$child['attachment']);
			}
			if($child['link_type']=='internal'){
				$link=site_url($child['link']);
			}
			if($child['link_type']=='contents'){
				if(isset($this->contentslugs[$child['link_object']])){
					@$link=site_url('contents/view/'.$this->contentslugs[$child['link_object']]);
				} else {
					@$link=site_url('/');
				}
			}
			if($child['link_type']=='contentlist'){
				if(isset($this->contentcategoryslugs[$child['link_object']])){
					$link=site_url('contents/lists/'.$this->contentcategoryslugs[$child['link_object']]);
				} else {
					@$link=site_url('/');
				}				
			}
			if($child['link_type']=='newslist'){
				if(isset($this->newcategoryslugs[$child['link_object']])){
					$link=site_url('news/lists/'.$this->newcategoryslugs[$child['link_object']]);
				} else {
					@$link=site_url('/');
				}				
			}				
			if($child['link_type']=='news'){
				if(isset($this->newslugs[$child['link_object']])){
					@$link=site_url('news/view/'.$this->newslugs[$child['link_object']]);
				} else {
					@$link=site_url('/');
				}				
			}				
			if($child['link_type']=='nolink'){
				$link="javascript:void(0);";
			}
			if($child['id']!=92)
			{
			$temp_tree .='<li';
			if($i==$count){ $temp_tree .=' class="sub_nav last "';	}		
			$temp_tree .='><a style="text-decoration:none" href="'. substr($link, 0, -5).'"';
			if($link==current_url()){ $activeclass=" active"; } else { $activeclass=""; }
			if($this->depth==''){$temp_tree .= ' class="menulink'.$activeclass.'"';}
			$temp_tree .= ' target="'.$child['target_type'].'"';
			$temp_tree .='>'.$child['name'].'</a>';
			$this->depth++;
			$temp_tree .= $this->get_menu_ul($menuid,$child['id']);
			$this->depth--;
			array_push($this->exclude, $child['id']);
			$this->height++;
			$temp_tree .='</li>	';
			}
			else
			{
									$categories=$this->productcategory_model->get_active();
									print_r($categories);
				$temp_tree .='<li class="dropdown megamenu-fw active"><a class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" href="#">Products</a>
									<ul class="dropdown-menu megamenu-content" role="menu">
										<li>
											<div class="row">
												<div class="col-md-12 no-padding">
													<ul class="mcd-menu">';
													
													$temp_tree .=	'<li>
															<a href="">
																<i><img src="images/mega-sub-1-1.png" alt="cmc" /></i>
																<span>Concrete Solutions</span>
															</a>
															<ul>
																<li>
																	<a href="">Brands</a>
																</li>
																<li>
																	<a href="">SILLA</a>
																	<ul>
																		<li>
																			<h3>SILLA</h3>
																			<dl>
																				<dt>
																					<div class="drop-down-image">
																						<a href=""><img src="images/drop-down-list-1.jpg" alt="cmc" /></a>
																						
																					</div>
																					<a href="">Mini Excavators</a>
																				</dt>
																				<dt>
																					<div class="drop-down-image">
																						<a href=""><img src="images/drop-down-list-2.jpg" alt="cmc" /></a>
																						
																					</div>
																					<a href="">Wheel Dumper</a>
																				</dt>
																				<dt>
																					<div class="drop-down-image">
																						<a href=""><img src="images/drop-down-list-3.jpg" alt="cmc" /></a>
																						
																					</div>
																					<a href="">Mini cavators</a>
																				</dt>
																				<dt>
																					<div class="drop-down-image">
																						<a href=""><img src="images/drop-down-list-4.jpg" alt="cmc" /></a>
																						
																					</div>
																					<a href="">Mini cavators</a>
																				</dt>
																				<dt>
																					<div class="drop-down-image">
																						<a href=""><img src="images/drop-down-list-5.jpg" alt="cmc" /></a>
																						
																					</div>
																					<a href="">Mini cavators</a>
																				</dt>
																				<dt>
																					<div class="drop-down-image">
																						<a href=""><img src="images/drop-down-list-6.jpg" alt="cmc" /></a>
																						
																					</div>
																					<a href="">Mini cavators</a>
																				</dt>
																				<dt>
																					<div class="drop-down-image">
																						<a href=""><img src="images/drop-down-list-7.jpg" alt="cmc" /></a>
																						
																					</div>
																					<a href="">Mini cavators</a>
																				</dt>
																				<dt>
																					<div class="drop-down-image">
																						<a href=""><img src="images/drop-down-list-8.jpg" alt="cmc" /></a>
																						
																					</div>
																					<a href="">Mini cavators</a>
																				</dt>
																				<dt>
																					<div class="drop-down-image">
																						<a href=""><img src="images/drop-down-list-9.jpg" alt="cmc" /></a>
																						
																					</div>
																					<a href="">Mini cavators</a>
																				</dt>
																				<dt>
																					<div class="drop-down-image">
																						<a href=""><img src="images/drop-down-list-10.jpg" alt="cmc" /></a>
																						
																					</div>
																					<a href="">Wheel Dumper</a>
																				</dt>
																				<dt>
																					<div class="drop-down-image">
																						<a href=""><img src="images/drop-down-list-11.jpg" alt="cmc" /></a>
																						
																					</div>
																					<a href="">Wheel Dumper</a>
																				</dt>
																				<dt>
																					<div class="drop-down-image">
																						<a href=""><img src="images/drop-down-list-12.jpg" alt="cmc" /></a>
																						
																					</div>
																					<a href="">Tandem Rollers</a>
																				</dt>
																				
																			</dl>
																		</li>
																	</ul>
																</li>
																<li>
																	<a href="">IRMAIR</a>
																	<ul>
																		<li>
																			<h3>IRMAIR</h3>
																			<dl>
																				<dt>
																					<div class="drop-down-image">
																						<a href=""><img src="images/drop-down-list-1.jpg" alt="cmc" /></a>
																						
																					</div>
																					<a href="">Mini Excavators</a>
																				</dt>
																				<dt>
																					<div class="drop-down-image">
																						<a href=""><img src="images/drop-down-list-2.jpg" alt="cmc" /></a>
																						
																					</div>
																					<a href="">Wheel Dumper</a>
																				</dt>
																				<dt>
																					<div class="drop-down-image">
																						<a href=""><img src="images/drop-down-list-3.jpg" alt="cmc" /></a>
																						
																					</div>
																					<a href="">Mini cavators</a>
																				</dt>
																				<dt>
																					<div class="drop-down-image">
																						<a href=""><img src="images/drop-down-list-4.jpg" alt="cmc" /></a>
																						
																					</div>
																					<a href="">Mini cavators</a>
																				</dt>
																				<dt>
																					<div class="drop-down-image">
																						<a href=""><img src="images/drop-down-list-5.jpg" alt="cmc" /></a>
																						
																					</div>
																					<a href="">Mini cavators</a>
																				</dt>
																				<dt>
																					<div class="drop-down-image">
																						<a href=""><img src="images/drop-down-list-6.jpg" alt="cmc" /></a>
																						
																					</div>
																					<a href="">Mini cavators</a>
																				</dt>
																				<dt>
																					<div class="drop-down-image">
																						<a href=""><img src="images/drop-down-list-7.jpg" alt="cmc" /></a>
																						
																					</div>
																					<a href="">Mini cavators</a>
																				</dt>
																				<dt>
																					<div class="drop-down-image">
																						<a href=""><img src="images/drop-down-list-8.jpg" alt="cmc" /></a>
																						
																					</div>
																					<a href="">Mini cavators</a>
																				</dt>
																				<dt>
																					<div class="drop-down-image">
																						<a href=""><img src="images/drop-down-list-9.jpg" alt="cmc" /></a>
																						
																					</div>
																					<a href="">Mini cavators</a>
																				</dt>
																				<dt>
																					<div class="drop-down-image">
																						<a href=""><img src="images/drop-down-list-10.jpg" alt="cmc" /></a>
																						
																					</div>
																					<a href="">Wheel Dumper</a>
																				</dt>
																				<dt>
																					<div class="drop-down-image">
																						<a href=""><img src="images/drop-down-list-11.jpg" alt="cmc" /></a>
																						
																					</div>
																					<a href="">Wheel Dumper</a>
																				</dt>
																				<dt>
																					<div class="drop-down-image">
																						<a href=""><img src="images/drop-down-list-12.jpg" alt="cmc" /></a>
																						
																					</div>
																					<a href="">Tandem Rollers</a>
																				</dt>
																				
																			</dl>
																		</li>
																	</ul>
																</li>

																<li>
																	<a href="">WACKER-NEUSON</a>
																	<ul>
																		<li>
																			<h3>WACKER-NEUSON</h3>
																			<dl>
																				<dt>
																					<div class="drop-down-image">
																						<a href=""><img src="images/drop-down-list-1.jpg" alt="cmc" /></a>
																						
																					</div>
																					<a href="">Mini Excavators</a>
																				</dt>
																				<dt>
																					<div class="drop-down-image">
																						<a href=""><img src="images/drop-down-list-2.jpg" alt="cmc" /></a>
																						
																					</div>
																					<a href="">Wheel Dumper</a>
																				</dt>
																				<dt>
																					<div class="drop-down-image">
																						<a href=""><img src="images/drop-down-list-3.jpg" alt="cmc" /></a>
																						
																					</div>
																					<a href="">Mini cavators</a>
																				</dt>
																				<dt>
																					<div class="drop-down-image">
																						<a href=""><img src="images/drop-down-list-4.jpg" alt="cmc" /></a>
																						
																					</div>
																					<a href="">Mini cavators</a>
																				</dt>
																				<dt>
																					<div class="drop-down-image">
																						<a href=""><img src="images/drop-down-list-5.jpg" alt="cmc" /></a>
																						
																					</div>
																					<a href="">Mini cavators</a>
																				</dt>
																				<dt>
																					<div class="drop-down-image">
																						<a href=""><img src="images/drop-down-list-6.jpg" alt="cmc" /></a>
																						
																					</div>
																					<a href="">Mini cavators</a>
																				</dt>
																				<dt>
																					<div class="drop-down-image">
																						<a href=""><img src="images/drop-down-list-7.jpg" alt="cmc" /></a>
																						
																					</div>
																					<a href="">Mini cavators</a>
																				</dt>
																				<dt>
																					<div class="drop-down-image">
																						<a href=""><img src="images/drop-down-list-8.jpg" alt="cmc" /></a>
																						
																					</div>
																					<a href="">Mini cavators</a>
																				</dt>
																				<dt>
																					<div class="drop-down-image">
																						<a href=""><img src="images/drop-down-list-9.jpg" alt="cmc" /></a>
																						
																					</div>
																					<a href="">Mini cavators</a>
																				</dt>
																				<dt>
																					<div class="drop-down-image">
																						<a href=""><img src="images/drop-down-list-10.jpg" alt="cmc" /></a>
																						
																					</div>
																					<a href="">Wheel Dumper</a>
																				</dt>
																				<dt>
																					<div class="drop-down-image">
																						<a href=""><img src="images/drop-down-list-11.jpg" alt="cmc" /></a>
																						
																					</div>
																					<a href="">Wheel Dumper</a>
																				</dt>
																				<dt>
																					<div class="drop-down-image">
																						<a href=""><img src="images/drop-down-list-12.jpg" alt="cmc" /></a>
																						
																					</div>
																					<a href="">Tandem Rollers</a>
																				</dt>
																				
																			</dl>
																		</li>
																	</ul>
																</li>
																<li>
																	<a href="">BARANITE</a>
																	<ul>
																		<li>
																			<h3>WACKER-NEUSON</h3>
																			<dl>
																				<dt>
																					<div class="drop-down-image">
																						<a href=""><img src="images/drop-down-list-1.jpg" alt="cmc" /></a>
																						
																					</div>
																					<a href="">Mini Excavators</a>
																				</dt>
																				<dt>
																					<div class="drop-down-image">
																						<a href=""><img src="images/drop-down-list-2.jpg" alt="cmc" /></a>
																						
																					</div>
																					<a href="">Wheel Dumper</a>
																				</dt>
																				<dt>
																					<div class="drop-down-image">
																						<a href=""><img src="images/drop-down-list-3.jpg" alt="cmc" /></a>
																						
																					</div>
																					<a href="">Mini cavators</a>
																				</dt>
																				<dt>
																					<div class="drop-down-image">
																						<a href=""><img src="images/drop-down-list-4.jpg" alt="cmc" /></a>
																						
																					</div>
																					<a href="">Mini cavators</a>
																				</dt>
																				<dt>
																					<div class="drop-down-image">
																						<a href=""><img src="images/drop-down-list-5.jpg" alt="cmc" /></a>
																						
																					</div>
																					<a href="">Mini cavators</a>
																				</dt>
																				<dt>
																					<div class="drop-down-image">
																						<a href=""><img src="images/drop-down-list-6.jpg" alt="cmc" /></a>
																						
																					</div>
																					<a href="">Mini cavators</a>
																				</dt>
																				<dt>
																					<div class="drop-down-image">
																						<a href=""><img src="images/drop-down-list-7.jpg" alt="cmc" /></a>
																						
																					</div>
																					<a href="">Mini cavators</a>
																				</dt>
																				<dt>
																					<div class="drop-down-image">
																						<a href=""><img src="images/drop-down-list-8.jpg" alt="cmc" /></a>
																						
																					</div>
																					<a href="">Mini cavators</a>
																				</dt>
																				<dt>
																					<div class="drop-down-image">
																						<a href=""><img src="images/drop-down-list-9.jpg" alt="cmc" /></a>
																						
																					</div>
																					<a href="">Mini cavators</a>
																				</dt>
																				<dt>
																					<div class="drop-down-image">
																						<a href=""><img src="images/drop-down-list-10.jpg" alt="cmc" /></a>
																						
																					</div>
																					<a href="">Wheel Dumper</a>
																				</dt>
																				<dt>
																					<div class="drop-down-image">
																						<a href=""><img src="images/drop-down-list-11.jpg" alt="cmc" /></a>
																						
																					</div>
																					<a href="">Wheel Dumper</a>
																				</dt>
																				<dt>
																					<div class="drop-down-image">
																						<a href=""><img src="images/drop-down-list-12.jpg" alt="cmc" /></a>
																						
																					</div>
																					<a href="">Tandem Rollers</a>
																				</dt>
																				
																			</dl>
																		</li>
																	</ul>
																</li>
																<li>
																	<a href="">HAYASHI</a>
																	<ul>
																		<li>
																			<h3>WACKER-NEUSON</h3>
																			<dl>
																				<dt>
																					<div class="drop-down-image">
																						<a href=""><img src="images/drop-down-list-1.jpg" alt="cmc" /></a>
																						
																					</div>
																					<a href="">Mini Excavators</a>
																				</dt>
																				<dt>
																					<div class="drop-down-image">
																						<a href=""><img src="images/drop-down-list-2.jpg" alt="cmc" /></a>
																						
																					</div>
																					<a href="">Wheel Dumper</a>
																				</dt>
																				<dt>
																					<div class="drop-down-image">
																						<a href=""><img src="images/drop-down-list-3.jpg" alt="cmc" /></a>
																						
																					</div>
																					<a href="">Mini cavators</a>
																				</dt>
																				<dt>
																					<div class="drop-down-image">
																						<a href=""><img src="images/drop-down-list-4.jpg" alt="cmc" /></a>
																						
																					</div>
																					<a href="">Mini cavators</a>
																				</dt>
																				<dt>
																					<div class="drop-down-image">
																						<a href=""><img src="images/drop-down-list-5.jpg" alt="cmc" /></a>
																						
																					</div>
																					<a href="">Mini cavators</a>
																				</dt>
																				<dt>
																					<div class="drop-down-image">
																						<a href=""><img src="images/drop-down-list-6.jpg" alt="cmc" /></a>
																						
																					</div>
																					<a href="">Mini cavators</a>
																				</dt>
																				<dt>
																					<div class="drop-down-image">
																						<a href=""><img src="images/drop-down-list-7.jpg" alt="cmc" /></a>
																						
																					</div>
																					<a href="">Mini cavators</a>
																				</dt>
																				<dt>
																					<div class="drop-down-image">
																						<a href=""><img src="images/drop-down-list-8.jpg" alt="cmc" /></a>
																						
																					</div>
																					<a href="">Mini cavators</a>
																				</dt>
																				<dt>
																					<div class="drop-down-image">
																						<a href=""><img src="images/drop-down-list-9.jpg" alt="cmc" /></a>
																						
																					</div>
																					<a href="">Mini cavators</a>
																				</dt>
																				<dt>
																					<div class="drop-down-image">
																						<a href=""><img src="images/drop-down-list-10.jpg" alt="cmc" /></a>
																						
																					</div>
																					<a href="">Wheel Dumper</a>
																				</dt>
																				<dt>
																					<div class="drop-down-image">
																						<a href=""><img src="images/drop-down-list-11.jpg" alt="cmc" /></a>
																						
																					</div>
																					<a href="">Wheel Dumper</a>
																				</dt>
																				<dt>
																					<div class="drop-down-image">
																						<a href=""><img src="images/drop-down-list-12.jpg" alt="cmc" /></a>
																						
																					</div>
																					<a href="">Tandem Rollers</a>
																				</dt>
																				
																			</dl>
																		</li>
																	</ul>
																</li>
																<li>
																	<a href="">TOKU</a>
																	<ul>
																		<li>
																			<h3>WACKER-NEUSON</h3>
																			<dl>
																				<dt>
																					<div class="drop-down-image">
																						<a href=""><img src="images/drop-down-list-1.jpg" alt="cmc" /></a>
																						
																					</div>
																					<a href="">Mini Excavators</a>
																				</dt>
																				<dt>
																					<div class="drop-down-image">
																						<a href=""><img src="images/drop-down-list-2.jpg" alt="cmc" /></a>
																						
																					</div>
																					<a href="">Wheel Dumper</a>
																				</dt>
																				<dt>
																					<div class="drop-down-image">
																						<a href=""><img src="images/drop-down-list-3.jpg" alt="cmc" /></a>
																						
																					</div>
																					<a href="">Mini cavators</a>
																				</dt>
																				<dt>
																					<div class="drop-down-image">
																						<a href=""><img src="images/drop-down-list-4.jpg" alt="cmc" /></a>
																						
																					</div>
																					<a href="">Mini cavators</a>
																				</dt>
																				<dt>
																					<div class="drop-down-image">
																						<a href=""><img src="images/drop-down-list-5.jpg" alt="cmc" /></a>
																						
																					</div>
																					<a href="">Mini cavators</a>
																				</dt>
																				<dt>
																					<div class="drop-down-image">
																						<a href=""><img src="images/drop-down-list-6.jpg" alt="cmc" /></a>
																						
																					</div>
																					<a href="">Mini cavators</a>
																				</dt>
																				<dt>
																					<div class="drop-down-image">
																						<a href=""><img src="images/drop-down-list-7.jpg" alt="cmc" /></a>
																						
																					</div>
																					<a href="">Mini cavators</a>
																				</dt>
																				<dt>
																					<div class="drop-down-image">
																						<a href=""><img src="images/drop-down-list-8.jpg" alt="cmc" /></a>
																						
																					</div>
																					<a href="">Mini cavators</a>
																				</dt>
																				<dt>
																					<div class="drop-down-image">
																						<a href=""><img src="images/drop-down-list-9.jpg" alt="cmc" /></a>
																						
																					</div>
																					<a href="">Mini cavators</a>
																				</dt>
																				<dt>
																					<div class="drop-down-image">
																						<a href=""><img src="images/drop-down-list-10.jpg" alt="cmc" /></a>
																						
																					</div>
																					<a href="">Wheel Dumper</a>
																				</dt>
																				<dt>
																					<div class="drop-down-image">
																						<a href=""><img src="images/drop-down-list-11.jpg" alt="cmc" /></a>
																						
																					</div>
																					<a href="">Wheel Dumper</a>
																				</dt>
																				<dt>
																					<div class="drop-down-image">
																						<a href=""><img src="images/drop-down-list-12.jpg" alt="cmc" /></a>
																						
																					</div>
																					<a href="">Tandem Rollers</a>
																				</dt>
																				
																			</dl>
																		</li>
																	</ul>
																</li>
																<li>
																	<a href="">MONDIAL MEC</a>
																	<ul>
																		<li>
																			<h3>MONDIAL MEC</h3>
																			<dl>
																				<dt>
																					<div class="drop-down-image">
																						<a href=""><img src="images/drop-down-list-1.jpg" alt="cmc" /></a>
																						
																					</div>
																					<a href="">Mini Excavators</a>
																				</dt>
																				<dt>
																					<div class="drop-down-image">
																						<a href=""><img src="images/drop-down-list-2.jpg" alt="cmc" /></a>
																						
																					</div>
																					<a href="">Wheel Dumper</a>
																				</dt>
																				<dt>
																					<div class="drop-down-image">
																						<a href=""><img src="images/drop-down-list-3.jpg" alt="cmc" /></a>
																						
																					</div>
																					<a href="">Mini cavators</a>
																				</dt>
																				<dt>
																					<div class="drop-down-image">
																						<a href=""><img src="images/drop-down-list-4.jpg" alt="cmc" /></a>
																						
																					</div>
																					<a href="">Mini cavators</a>
																				</dt>
																				<dt>
																					<div class="drop-down-image">
																						<a href=""><img src="images/drop-down-list-5.jpg" alt="cmc" /></a>
																						
																					</div>
																					<a href="">Mini cavators</a>
																				</dt>
																				<dt>
																					<div class="drop-down-image">
																						<a href=""><img src="images/drop-down-list-6.jpg" alt="cmc" /></a>
																						
																					</div>
																					<a href="">Mini cavators</a>
																				</dt>
																				<dt>
																					<div class="drop-down-image">
																						<a href=""><img src="images/drop-down-list-7.jpg" alt="cmc" /></a>
																						
																					</div>
																					<a href="">Mini cavators</a>
																				</dt>
																				<dt>
																					<div class="drop-down-image">
																						<a href=""><img src="images/drop-down-list-8.jpg" alt="cmc" /></a>
																						
																					</div>
																					<a href="">Mini cavators</a>
																				</dt>
																				<dt>
																					<div class="drop-down-image">
																						<a href=""><img src="images/drop-down-list-9.jpg" alt="cmc" /></a>
																						
																					</div>
																					<a href="">Mini cavators</a>
																				</dt>
																				<dt>
																					<div class="drop-down-image">
																						<a href=""><img src="images/drop-down-list-10.jpg" alt="cmc" /></a>
																						
																					</div>
																					<a href="">Wheel Dumper</a>
																				</dt>
																				<dt>
																					<div class="drop-down-image">
																						<a href=""><img src="images/drop-down-list-11.jpg" alt="cmc" /></a>
																						
																					</div>
																					<a href="">Wheel Dumper</a>
																				</dt>
																				<dt>
																					<div class="drop-down-image">
																						<a href=""><img src="images/drop-down-list-12.jpg" alt="cmc" /></a>
																						
																					</div>
																					<a href="">Tandem Rollers</a>
																				</dt>
																				
																			</dl>
																		</li>
																	</ul>
																</li>
																<li>
																	<a href="">FARYMANN</a>
																	<ul>
																		<li>
																			<h3>FARYMANN</h3>
																			<dl>
																				<dt>
																					<div class="drop-down-image">
																						<a href=""><img src="images/drop-down-list-1.jpg" alt="cmc" /></a>
																						
																					</div>
																					<a href="">Mini Excavators</a>
																				</dt>
																				<dt>
																					<div class="drop-down-image">
																						<a href=""><img src="images/drop-down-list-2.jpg" alt="cmc" /></a>
																						
																					</div>
																					<a href="">Wheel Dumper</a>
																				</dt>
																				<dt>
																					<div class="drop-down-image">
																						<a href=""><img src="images/drop-down-list-3.jpg" alt="cmc" /></a>
																						
																					</div>
																					<a href="">Mini cavators</a>
																				</dt>
																				<dt>
																					<div class="drop-down-image">
																						<a href=""><img src="images/drop-down-list-4.jpg" alt="cmc" /></a>
																						
																					</div>
																					<a href="">Mini cavators</a>
																				</dt>
																				<dt>
																					<div class="drop-down-image">
																						<a href=""><img src="images/drop-down-list-5.jpg" alt="cmc" /></a>
																						
																					</div>
																					<a href="">Mini cavators</a>
																				</dt>
																				<dt>
																					<div class="drop-down-image">
																						<a href=""><img src="images/drop-down-list-6.jpg" alt="cmc" /></a>
																						
																					</div>
																					<a href="">Mini cavators</a>
																				</dt>
																				<dt>
																					<div class="drop-down-image">
																						<a href=""><img src="images/drop-down-list-7.jpg" alt="cmc" /></a>
																						
																					</div>
																					<a href="">Mini cavators</a>
																				</dt>
																				<dt>
																					<div class="drop-down-image">
																						<a href=""><img src="images/drop-down-list-8.jpg" alt="cmc" /></a>
																						
																					</div>
																					<a href="">Mini cavators</a>
																				</dt>
																				<dt>
																					<div class="drop-down-image">
																						<a href=""><img src="images/drop-down-list-9.jpg" alt="cmc" /></a>
																						
																					</div>
																					<a href="">Mini cavators</a>
																				</dt>
																				<dt>
																					<div class="drop-down-image">
																						<a href=""><img src="images/drop-down-list-10.jpg" alt="cmc" /></a>
																						
																					</div>
																					<a href="">Wheel Dumper</a>
																				</dt>
																				<dt>
																					<div class="drop-down-image">
																						<a href=""><img src="images/drop-down-list-11.jpg" alt="cmc" /></a>
																						
																					</div>
																					<a href="">Wheel Dumper</a>
																				</dt>
																				<dt>
																					<div class="drop-down-image">
																						<a href=""><img src="images/drop-down-list-12.jpg" alt="cmc" /></a>
																						
																					</div>
																					<a href="">Tandem Rollers</a>
																				</dt>
																				
																			</dl>
																		</li>
																	</ul>
																</li>
																<li>
																	<a href="">TAEYEON</a>
																</li>
																<li>
																	<a href="">CHICAGO PNEUMATIC</a>
																</li>
																<li>
																	<a href="">TEREX  </a>
																</li>
																<li>
																	<a href="">CONQUIP</a>
																</li>
																<li>
																	<a href="">TEREX TRUCKS</a>
																</li>
																	<li>
																	<a href="">BATTIPAV</a>
																</li>
																	<li>
																	<a href="">ROCKWHEEL</a>
																	<ul>
																		<li>
																			<h3>WACKER-NEUSON</h3>
																			<dl>
																				<dt>
																					<div class="drop-down-image">
																						<a href=""><img src="images/drop-down-list-1.jpg" alt="cmc" /></a>
																						
																					</div>
																					<a href="">Mini Excavators</a>
																				</dt>
																				<dt>
																					<div class="drop-down-image">
																						<a href=""><img src="images/drop-down-list-2.jpg" alt="cmc" /></a>
																						
																					</div>
																					<a href="">Wheel Dumper</a>
																				</dt>
																				<dt>
																					<div class="drop-down-image">
																						<a href=""><img src="images/drop-down-list-3.jpg" alt="cmc" /></a>
																						
																					</div>
																					<a href="">Mini cavators</a>
																				</dt>
																				<dt>
																					<div class="drop-down-image">
																						<a href=""><img src="images/drop-down-list-4.jpg" alt="cmc" /></a>
																						
																					</div>
																					<a href="">Mini cavators</a>
																				</dt>
																				<dt>
																					<div class="drop-down-image">
																						<a href=""><img src="images/drop-down-list-5.jpg" alt="cmc" /></a>
																						
																					</div>
																					<a href="">Mini cavators</a>
																				</dt>
																				<dt>
																					<div class="drop-down-image">
																						<a href=""><img src="images/drop-down-list-6.jpg" alt="cmc" /></a>
																						
																					</div>
																					<a href="">Mini cavators</a>
																				</dt>
																				<dt>
																					<div class="drop-down-image">
																						<a href=""><img src="images/drop-down-list-7.jpg" alt="cmc" /></a>
																						
																					</div>
																					<a href="">Mini cavators</a>
																				</dt>
																				<dt>
																					<div class="drop-down-image">
																						<a href=""><img src="images/drop-down-list-8.jpg" alt="cmc" /></a>
																						
																					</div>
																					<a href="">Mini cavators</a>
																				</dt>
																				<dt>
																					<div class="drop-down-image">
																						<a href=""><img src="images/drop-down-list-9.jpg" alt="cmc" /></a>
																						
																					</div>
																					<a href="">Mini cavators</a>
																				</dt>
																				<dt>
																					<div class="drop-down-image">
																						<a href=""><img src="images/drop-down-list-10.jpg" alt="cmc" /></a>
																						
																					</div>
																					<a href="">Wheel Dumper</a>
																				</dt>
																				<dt>
																					<div class="drop-down-image">
																						<a href=""><img src="images/drop-down-list-11.jpg" alt="cmc" /></a>
																						
																					</div>
																					<a href="">Wheel Dumper</a>
																				</dt>
																				<dt>
																					<div class="drop-down-image">
																						<a href=""><img src="images/drop-down-list-12.jpg" alt="cmc" /></a>
																						
																					</div>
																					<a href="">Tandem Rollers</a>
																				</dt>
																				
																			</dl>
																		</li>
																	</ul>
																</li>
															</ul>
														</li>
														<li>
															<a href="">
																<i><img src="images/mega-sub-1-2.png" alt="cmc" /></i>
																<span>Construction Equipment</span>
																
															</a>
														</li>
														<li>
															<a href="">
																<i><img src="images/mega-sub-1-3.png" alt="cmc" /></i>
																<span>Power & Air Solutions</span>
																
															</a>
														</li>
														<li>
															<a href="">
																<i><img src="images/mega-sub-1-4.png" alt="cmc" /></i>
																<span>Material Handling</span>
																
															</a>
														</li>
														<li>
															<a href="">
																<i><img src="images/mega-sub-1-5.png" alt="cmc" /></i>
																<span>Waste Management Solutions</span>
																
															</a>
														</li>
														<li>
															<a href="">
																<i><img src="images/mega-sub-1-6.png" alt="cmc" /></i>
																<span>Quarry Solutions</span>
																
															</a>
														</li>

													</ul>
												</div>
											</div>
										</li>
									</ul>

								</li>';
			}
			}
			$temp_tree .='</ul>';
			if($this->depth=='1') { $temp_tree .= "</div>"; }	
	
		}
		}
		return $temp_tree;
	}
	
	
	
	function get_menu_ul2($menuid,$id='0')

	{
		$this->load->model('menu_model');
		$menu=$this->menu_model->get_row_cond(array('code'=>$menuid));
		$temp_tree ='';
		if($menu){		
		$cond=array('menu_id'=>$menu->id,'parent_id'=>$id,'menuitems.status'=>'Y','menuitems.show_subitems'=>'Y');    
		$children = $this->get_subcategories($cond);
		$count=count($children);
		if($count>0){
		$i=0;
		if($this->depth=='1') { $temp_tree .= "<div class='sub-nav'>"; }	
		$temp_tree .='<ul class="dropdown-menu megamenu-content" role="menu"';
		if($this->depth==''){$temp_tree .= " class='$menu->class'";} 
		$temp_tree .= '>';	
		//echo $this->depth;exit;
		foreach ($children as $child)
		{	
		$i++;
			$link='';
			if($child['link_type']=='attachments'){
				$link=base_url('public/uploads/menus/'.$child['attachment']);
			}
			if($child['link_type']=='internal'){
				$link=site_url($child['link']);
			}
			if($child['link_type']=='contents'){
				if(isset($this->contentslugs[$child['link_object']])){
					@$link=site_url('contents/view/'.$this->contentslugs[$child['link_object']]);
				} else {
					@$link=site_url('/');
				}
			}
			if($child['link_type']=='contentlist'){
				if(isset($this->contentcategoryslugs[$child['link_object']])){
					$link=site_url('contents/lists/'.$this->contentcategoryslugs[$child['link_object']]);
				} else {
					@$link=site_url('/');
				}				
			}
			if($child['link_type']=='newslist'){
				if(isset($this->newcategoryslugs[$child['link_object']])){
					$link=site_url('news/lists/'.$this->newcategoryslugs[$child['link_object']]);
				} else {
					@$link=site_url('/');
				}				
			}				
			if($child['link_type']=='news'){
				if(isset($this->newslugs[$child['link_object']])){
					@$link=site_url('news/view/'.$this->newslugs[$child['link_object']]);
				} else {
					@$link=site_url('/');
				}				
			}				
			if($child['link_type']=='nolink'){
				$link="javascript:void(0);";
			}
			$temp_tree .='<li';
			$temp_tree .=' class="'.$child['class'].'" ';
			if($i==$count){ $temp_tree .=' class="sub_nav last "';	}		
			$temp_tree .='><div class="row"><div class="col-md-12 no-padding"><ul class="mcd-menu"><li><a href="">
																<i><img src="images/mega-sub-1-1.png" alt="cmc" /></i>
																<span>Concrete Solutions</span>
															</a>
															<ul>
																<li>
																	<a href="">Brands</a>
																</li>
																<li>
																	<a href="">SILLA</a><ul>
																		<li>
																			<h3>SILLA</h3>
																			<dl>
																				<dt>
																					<div class="drop-down-image">
																						<a href=""><img src="images/drop-down-list-1.jpg" alt="cmc" /></a>
																						
																					</div>
																					<a href="">Mini Excavators</a>';
			$this->depth++;
			$temp_tree .= $this->get_menu_ul2($menuid,$child['id']);
			$this->depth--;
			array_push($this->exclude, $child['id']);
			$this->height++;
			$temp_tree .='</li>	';
			}
			$temp_tree .='</ul>';
			if($this->depth=='1') { $temp_tree .= "</div>"; }	
	
		}
		}
		return $temp_tree;
	}
	
	
	
//	function get_menu_ul($menuid,$id='0')
//	{
//		$this->load->model('menu_model');
//		//echo $menuid;
//		$menu=$this->menu_model->get_row_cond(array('code'=>$menuid));
//		$temp_tree ='';
//		//print_r($menu);
//		if($menu){		
//		$cond=array('menu_id'=>$menu->id,'parent_id'=>$id,'menuitems.status'=>'Y','menuitems.show_subitems'=>'N');    
//		$children = $this->get_subcategories($cond);
//		print_r($children);
//		$count=count($children);
//		if($count>0){
//		$i=0;
//		//echo $cla = $menu->class;exit;
//		$temp_tree .='<ul';
//		if($this->depth==''){$temp_tree .= " class='$menu->class'";}
//		$temp_tree .= '>';		
//		foreach ($children as $child)
//		{	
//		//print_r($child);
//		
//		$i++;
//			$link='';
//			if($child['link_type']=='attachments'){
//				$link=base_url('public/uploads/menus/'.$child['attachment']);
//			}
//			if($child['link_type']=='internal'){
//				$link=site_url($child['link']);
//			}
//			if($child['link_type']=='contents'){
//				if(isset($this->contentslugs[$child['link_object']])){
//					@$link=site_url('contents/view/'.$this->contentslugs[$child['link_object']]);
//				} else {
//					@$link=site_url('/');
//				}
//			}
//			if($child['link_type']=='contentlist'){
//				if(isset($this->contentcategoryslugs[$child['link_object']])){
//					$link=site_url('contents/lists/'.$this->contentcategoryslugs[$child['link_object']]);
//				} else {
//					@$link=site_url('/');
//				}				
//			}
//			if($child['link_type']=='newslist'){
//				if(isset($this->newcategoryslugs[$child['link_object']])){
//					$link=site_url('news/lists/'.$this->newcategoryslugs[$child['link_object']]);
//				} else {
//					@$link=site_url('/');
//				}				
//			}				
//			if($child['link_type']=='news'){
//				if(isset($this->newslugs[$child['link_object']])){
//					@$link=site_url('news/view/'.$this->newslugs[$child['link_object']]);
//				} else {
//					@$link=site_url('/');
//				}				
//			}				
//			if($child['link_type']=='nolink'){
//			$link=$child['link'];
//				//$link="javascript:void(0);";
//			}
//			if($this->depth==''){
//			
//			if($i==4)
//			{
//			$temp_tree .='<li class="middle"></li>';
//			}
//			
//			}
//			$temp_tree .='<li';
//			if($this->depth==''){
//			
//			if($i==4)
//			{
//			
//			$temp_tree .= ' class="no-bg"';
//			}
//			
//			
//			
//			}
//			if($i==1){ $temp_tree .=' class="first" '; }
//			if($i==$count){ $temp_tree .=' class="last" ';	}		
//			$temp_tree .='>';
//			
//			$temp_tree .='<a style="text-decoration:none" href="'.$link.'"';
//			$temp_tree .= ' target="'.$child['target_type'].'"';
//			$temp_tree .='>'.$child['name'].'</a>';
//			$this->depth++;
//			$temp_tree .= $this->get_menu_ul($menuid,$child['id']);
//			$this->depth--;
//			array_push($this->exclude, $child['id']);
//			$this->height++;
//			$temp_tree .='</li>';
//		}
//		$temp_tree .='</ul>';	
//		}
//		}
//		return $temp_tree;
//	}
	function get_single_levelsubmenu($menuid,$parentid)
	{
		$menus=array();
		$cond=array('code'=>$menuid,'parent_id'=>$parentid,'menuitems.status'=>'Y');	
		$this->db->select('menuitems.*, menuitems_desc.*');		
		$this->db->from($this->table_name);
		$this->db->join($this->desc_table_name, "$this->desc_table_name.$this->foreign_key = $this->table_name.$this->primary_key");
		$this->db->join('menus', "menus.id = $this->table_name.menu_id");
		$this->db->where('language',$this->session->userdata('front_language'));
		$this->db->where($cond);
		$this->db->order_by('sort_order','ASC');
		$query = $this->db->get();
        $results=$query->result_array();
		if(count($results)>0){
		foreach($results as $result):
			$link='';
			if($result['link_type']=='attachments'){
				$link=base_url('public/uploads/menus/'.$result['attachment']);
			}
			if($result['link_type']=='internal'){
				$link=site_url($result['link']);
			}
			if($result['link_type']=='contents'){
				if(isset($this->contentslugs[$result['link_object']])){
					@$link=site_url('contents/view/'.$this->contentslugs[$result['link_object']]);
				} else {
					@$link=site_url('/');
				}
			}
			if($result['link_type']=='contentlist'){
				if(isset($this->contentcategoryslugs[$result['link_object']])){
					$link=site_url('contents/lists/'.$this->contentcategoryslugs[$result['link_object']]);
				} else {
					@$link=site_url('/');
				}				
			}
			if($result['link_type']=='newslist'){
				if(isset($this->newcategoryslugs[$result['link_object']])){
					$link=site_url('news/lists/'.$this->newcategoryslugs[$result['link_object']]);
				} else {
					@$link=site_url('/');
				}				
			}				
			if($result['link_type']=='news'){
				if(isset($this->newslugs[$result['link_object']])){
					@$link=site_url('news/view/'.$this->newslugs[$result['link_object']]);
				} else {
					@$link=site_url('/');
				}				
			}				
			if($result['link_type']=='nolink'){
				$link="javascript:void(0);";
			}		
			$menu['link']=$link;
			$menu['id']=$result['id'];
			$menu['name']=$result['name'];
			$menu['windowtype']=$result['target_type'];
			$menus[]=$menu;
			unset($menu);
		endforeach;
		}
		return $menus;
	}
	
	function get_currentmenu($id,$link_type){
	
		if($link_type=='internal'){
			$cond=array('link_type'=>$link_type,'code'=>'top_menu','link'=>$id);
		} else {	
			$cond=array('link_type'=>$link_type,'link_object' => $id,'code'=>'top_menu');
		}
		$this->db->where($cond);
		$this->db->from($this->table_name);
		$this->db->select($this->table_name.'.*');
		$this->db->join($this->menutable_name, "$this->table_name.$this->menuforeign_key = $this->menutable_name.$this->menuprimary_key");
		
		$this->db->join($this->desc_table_name, "$this->desc_table_name.$this->foreign_key = $this->table_name.$this->primary_key");
		$this->db->where('language',$this->session->userdata('front_language'));
		$query = $this->db->get();
        $row = $query->row();
		if($row){
		$this->db->where(array('parent_id'=>$row->id,'menu_id'=>$row->menu_id));
        $this->db->from($this->table_name);
		$query = $this->db->get();
        $count = $query->num_rows();
		if($count>0){
			 return $row->id.':'.$row->id;
		} else {
			return $row->id.':'.$row->parent_id;
		}
		} else {
			return ':';
		}	
	}
	
	function get_currentnewsmenu($id,$link_type){
		$cond=array('id' => $id);
		$this->db->where($cond);
		$this->db->from('news');
		$query = $this->db->get();
        $row = $query->row();
		$cond=array('link_type'=>$link_type,'link_object' =>$row->category_id,'code'=>'top_menu');
		$this->db->where($cond);
		$this->db->from($this->table_name);
		$this->db->select($this->table_name.'.*');
		$this->db->join($this->menutable_name, "$this->table_name.$this->menuforeign_key = $this->menutable_name.$this->menuprimary_key");
		$query = $this->db->get();
        $row = $query->row();
		if($row){
		return $row->id.':'.$row->parent_id;
		} else {
			return ':';
		}
	}
	function get_currentmenurow($id,$link_type){
		if($link_type=='internal'){
			$cond=array('link_type'=>$link_type,'code'=>'top_menu','link'=>$id);
		} else {	
			$cond=array('link_type'=>$link_type,'link_object' => $id,'code'=>'top_menu');
		}
		$this->db->where($cond);
		$this->db->from($this->table_name);
		$this->db->select($this->table_name.'.*');
		$this->db->join($this->menutable_name, "$this->table_name.$this->menuforeign_key = $this->menutable_name.$this->menuprimary_key");
		
		$this->db->join($this->desc_table_name, "$this->desc_table_name.$this->foreign_key = $this->table_name.$this->primary_key");
		$this->db->where('language',$this->session->userdata('front_language'));
		$query = $this->db->get();
        return $query->row();
	}
	
	function get_menu_path($id)
	{
		$catpath=array();
		$menu=$this->load($id);
		$i=0;
		while($menu){
			$i++;
			if($menu->link_type=='attachments'){
				$link=base_url('public/uploads/menus/'.$menu->attachment);
			}
			if($menu->link_type=='internal'){
				$link=site_url($menu->link);
			}
			if($menu->link_type=='contents'){
				if(isset($this->contentslugs[$menu->link_object])){
					@$link=site_url('contents/view/'.$this->contentslugs[$menu->link_object]);
				} else {
					@$link=site_url('/');
				}
			}
			if($menu->link_type=='contentlist'){
				if(isset($this->contentcategoryslugs[$menu->link_object])){
					$link=site_url('contents/lists/'.$this->contentcategoryslugs[$menu->link_object]);
				} else {
					@$link=site_url('/');
				}				
			}
			if($menu->link_type=='newslist'){
				if(isset($this->newcategoryslugs[$menu->link_object])){
					$link=site_url('news/lists/'.$this->newcategoryslugs[$menu->link_object]);
				} else {
					@$link=site_url('/');
				}				
			}				
			if($menu->link_type=='news'){
				if(isset($this->newslugs[$menu->link_object])){
					@$link=site_url('news/view/'.$this->newslugs[$menu->link_object]);
				} else {
					@$link=site_url('/');
				}				
			}				
			if($menu->link_type=='nolink'){
				$link=$menu->link_type;
			}
				$catpath[$i]['link']=$link;
				$catpath[$i]['name']=$menu->name;
			$menu=$this->load($menu->parent_id);
		}
		return $catpath;
	}
}