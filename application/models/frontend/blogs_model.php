<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
 class Blogs_model extends CI_Model {
     function __construct()
     {
         parent::__construct();
 		$this->lang_table_name='languages';
 		$this->table_name='blogs';
 		$this->desc_table_name='blogs_desc';
 		$this->primary_key ='id';
 		$this->foreign_key='contents_id';
     }
 	function get_array()
 	{
 		$this->db->from($this->table_name);
 		$this->db->join($this->desc_table_name, "$this->desc_table_name.$this->foreign_key = $this->table_name.$this->primary_key");
 		$this->db->where('language',$this->session->userdata('front_language'));
 		$this->db->where('status','Y');
 		$query = $this->db->get();
        return $query->result_array();
 	}
	function get_rss($cond='')
 	{
		if($cond) $this->db->where($cond);
		$date = date('Y-m-d');
		//$this->db->where("date(date_time) ='$date'",null,false); $this->db->where('archieve','N');
 		$this->db->where('status','Y');
 		$this->db->from($this->table_name);
 		$this->db->join($this->desc_table_name, "$this->desc_table_name.$this->foreign_key = $this->table_name.$this->primary_key");
 		$this->db->where('language',$this->session->userdata('front_language'));
 		$this->db->order_by("date_time desc, trim(title) asc");
 		$query = $this->db->get();
        return $query->result_array();
 	}
	function get_rss_caterory($category='')
 	{
		if($category!=""){
 			$where = "FIND_IN_SET('".$category."', category)";
 			$this->db->where($where);
 		}
		$date = date('Y-m-d');
		//$this->db->where("date(date_time) ='$date'",null,false); $this->db->where('archieve','N');
 		$this->db->where('status','Y');
 		$this->db->from($this->table_name);
 		$this->db->join($this->desc_table_name, "$this->desc_table_name.$this->foreign_key = $this->table_name.$this->primary_key");
 		$this->db->where('language',$this->session->userdata('front_language'));
 		$this->db->order_by("date_time desc, trim(title) asc");
 		$query = $this->db->get();
        return $query->result_array();
 	}
 	function get_active($cond='')
 	{
		if($cond) $this->db->where($cond);
 		$this->db->where('status','Y');
 		$this->db->from($this->table_name);
 		$this->db->join($this->desc_table_name, "$this->desc_table_name.$this->foreign_key = $this->table_name.$this->primary_key");
 		$this->db->where('language',$this->session->userdata('front_language'));
 		$this->db->order_by("date_time desc, trim(title) asc");
 		$query = $this->db->get();
        return $query->result_array();
 	}
	function related_articles($blogs='')
	{
		$blogs = $blogs?$blogs:0;
		$this->db->where('status','Y');
 		$this->db->where(" $this->table_name.$this->primary_key in ($blogs)",NULL, FALSE);
 		$this->db->from($this->table_name);
		$this->db->join($this->desc_table_name, "$this->desc_table_name.$this->foreign_key = $this->table_name.$this->primary_key");
		$this->db->where('language',$this->session->userdata('front_language'));
		$this->db->order_by('date_time DESC');
		$query = $this->db->get();
        return $query->result_array();
	}
 	
	function get_article_years(){
		 $this->db->select("year(date_time) as year");
 		$this->db->from($this->desc_table_name);
		$this->db->group_by('year(date_time)');
		$query = $this->db->get();
		/*$query = $this->db->query("SELECT year( date_time ) AS year
FROM `blogs_desc`
WHERE 1
GROUP BY year( date_time ) ");  */
        return $query->result_array();
	}
 	function get_active2()
 	{
 		$this->db->where('status','Y');
 		$this->db->from($this->table_name);
 		$this->db->join($this->desc_table_name, "$this->desc_table_name.$this->foreign_key = $this->table_name.$this->primary_key");
 		$this->db->where('language',$this->session->userdata('front_language'));
 		
 		$this->db->order_by("views", "desc");
 		
 		$this->db->limit(25); 
 		$query = $this->db->get();
         return $query->result_array();
 	}
 	function get_array_limit($limit)
 	{
 		$this->db->limit($limit);
 		
 		$this->db->order_by('date_time','desc');
 		$this->db->from($this->table_name);
 		$this->db->join($this->desc_table_name, "$this->desc_table_name.$this->foreign_key = $this->table_name.$this->primary_key");
 		$this->db->where('language',$this->session->userdata('front_language'));
 		
 		$this->db->where('status','Y');
 		$query = $this->db->get();
 		
 		//echo $this->db->last_query();
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
 		
 		$this->db->where('status','Y');
 		$query = $this->db->get();
         return $query->row();
 	}
 	function get_active_list($category_id)
 	{		
 		if($category_id!=''){
 			$cond=array('slug'=>$category_id);
 			$this->db->where($cond); 
 		}	
 		$this->db->where('status','Y');
 		$this->db->from($this->table_name);
 		$this->db->join($this->desc_table_name, "$this->desc_table_name.$this->foreign_key = $this->table_name.$this->primary_key");
 		$this->db->where('language',$this->session->userdata('front_language'));
 		$this->db->order_by('id','asc');
 		$query = $this->db->get();
         return $query->result_array();
 	}	
 	function get_row_cond($cond)
 	{
 		$this->db->where($cond);
 		$this->db->from($this->table_name);
 		$this->db->join($this->desc_table_name, "$this->desc_table_name.$this->foreign_key = $this->table_name.$this->primary_key");
 		$this->db->where('language',$this->session->userdata('front_language'));
 		
 		$this->db->where('status','Y');
 		$query = $this->db->get();
         return $query->row();
 	}
 	
 	function get_row_cond2($cond)
 	{
 		$this->db->where($cond);
 		$this->db->from($this->table_name);
 		$this->db->join($this->desc_table_name, "$this->desc_table_name.$this->foreign_key = $this->table_name.$this->primary_key");
 		$this->db->where('language',$this->session->userdata('front_language'));
 		
 		$this->db->where('status','Y');
 		$query = $this->db->get();
         return $query->result_array();
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
 	
 	function update2($descdata,$id)
 	{
 		$desccond[$this->foreign_key]=$id;
 		$this->db->update($this->desc_table_name,$descdata,$desccond);
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
 		if($cond!=""){
  			$where = "FIND_IN_SET('".$cond."', category)";
 			$this->db->where($where);
 		}
		if($this->session->userdata('year')!=''){
 			$this->db->where('year(date_time)',$this->session->userdata('year'));
 		}
 		if($this->session->userdata('month')!=''){
 			$this->db->where('month(date_time)',$this->session->userdata('month'));
 		} 
		
 		if($this->session->userdata('blogs')!=''){
 			$blogs = $this->session->userdata('blogs'); 
 			$this->db->where(" $this->table_name.$this->primary_key in ($blogs)",NULL, FALSE);
 		}
         $this->db->from($this->table_name);
 		$this->db->join($this->desc_table_name, "$this->desc_table_name.$this->foreign_key = $this->table_name.$this->primary_key");
 		$this->db->where('language',$this->session->userdata('front_language'));
 		
 		$this->db->where('status','Y');
 		$query = $this->db->get();
          return $query->num_rows();
     }
 	function get_pagination($num, $offset, $cond='')
     {
         $this->db->select('*');
 		if($cond!=""){
 			$where = "FIND_IN_SET('".$cond."', category)";
 			$this->db->where($where);
 		}
 		if($this->session->userdata('year')!=''){
 			$this->db->where('year(date_time)',$this->session->userdata('year'));
 		}
 		if($this->session->userdata('month')!=''){
 			$this->db->where('month(date_time)',$this->session->userdata('month'));
 		} 
		
 		if($this->session->userdata('blogs')!=''){
 			$blogs = $this->session->userdata('blogs'); 
 			$this->db->where(" $this->table_name.$this->primary_key in ($blogs)",NULL, FALSE);
 		}
  
 		$this->db->limit($num, $offset);
        $this->db->from($this->table_name);
 		$this->db->join($this->desc_table_name, "$this->desc_table_name.$this->foreign_key = $this->table_name.$this->primary_key");
 		$this->db->where('language',$this->session->userdata('front_language'));
 		
 		$this->db->where('status','Y');
 		
 		$this->db->order_by("date_time", "desc");
 		$query = $this->db->get();
          return $query->result_array();
     }
 	function code_exists($code,$id)
 	{
 		$this->db->where('slug',$code);
 		$this->db->where('id !=',$id);
 		$this->db->from($this->table_name);
 		$this->db->join($this->desc_table_name, "$this->desc_table_name.$this->foreign_key = $this->table_name.$this->primary_key");
 		$this->db->where('language',$this->session->userdata('front_language'));
 		$query = $this->db->get();
         $result = $query->num_rows();
 		if($result>0){
 			return true;
 		} else {
 			return false;
 		}
 	}
 	function get_idpair()
 	{
 		$idpair=array();
 		$this->db->from($this->table_name);
 		$this->db->join($this->desc_table_name, "$this->desc_table_name.$this->foreign_key = $this->table_name.$this->primary_key");
 		$this->db->where('language',$this->session->userdata('front_language'));
 		$query = $this->db->get();
         foreach($query->result_array() as $row):
 			$idpair[$row['id']]=$row['title'];
 		endforeach;
 		return $idpair;
 	}
 	function get_fields()
 	{
 		return array('title'=>'Title','short_desc'=>'Short Description');
 	}
 	function create_slug($title)
 	{
 		$slug=sanitizeStringForUrl($title);
 		$this->db->where('slug',$slug);
 		$this->db->from($this->table_name);
 		$this->db->join($this->desc_table_name, "$this->desc_table_name.$this->foreign_key = $this->table_name.$this->primary_key");
 		$this->db->where('language',$this->session->userdata('front_language'));
 		$query = $this->db->get();
         $result = $query->num_rows();
 		if($result>0){
 			return $slug.date('ymdhis');
 		} else {
 			return $slug;
 		}
 	}
 	function update_slug($slug,$id)
 	{
 		$slug=sanitizeStringForUrl($slug);
 		$this->db->where('slug',$slug);
 		$this->db->where('id !=',$id);
 		$this->db->from($this->table_name);
 		$this->db->join($this->desc_table_name, "$this->desc_table_name.$this->foreign_key = $this->table_name.$this->primary_key");
 		$this->db->where('language',$this->session->userdata('front_language'));
 		$query = $this->db->get();
         $result = $query->num_rows();
 		if($result>0){
 			return $slug.date('ymdhis');
 		} else {
 			return $slug;
 		}
 	}
 	function get_catnews($slug,$limit='')
 	{
 		$this->db->where('slug',$slug);
 		$this->db->from('news_category');
 		$query = $this->db->get();
         $row=$query->row();
 		if($row){
 		if($limit!=''){
 		$this->db->limit($limit);
 		}
 		$this->db->where(array('category_id'=>$row->id));
 		$this->db->from($this->table_name);
 		$this->db->join($this->desc_table_name, "$this->desc_table_name.$this->foreign_key = $this->table_name.$this->primary_key");
 		$this->db->where('language',$this->session->userdata('front_language'));
 		
 		$this->db->where('status','Y');
 		$this->db->order_by('date_time','desc');
 		$query = $this->db->get();
 		
         return $query->result_array();
 		}
 	}
 }