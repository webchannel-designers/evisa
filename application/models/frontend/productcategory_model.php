<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Productcategory_model extends CI_Model {
    function __construct()
    {
        parent::__construct();
		$this->lang_table_name='languages';
		$this->table_name='products_category';
		$this->desc_table_name='products_category_desc';
		$this->primary_key ='id';
		$this->foreign_key='content_category_id';
    }
	function get_array($cond='')
	{
	   	if($cond)$this->db->where($cond);
		$this->db->where('status','Y');
		$this->db->from($this->table_name);
		$this->db->join($this->desc_table_name, "$this->desc_table_name.$this->foreign_key = $this->table_name.$this->primary_key");
		$this->db->where('language',$this->session->userdata('front_language'));
		$this->db->order_by("sort_order", "asc");
		$query = $this->db->get();
        return $query->result_array();
	}
	
	function get_catalogue($id='')
	{
		$this->db->from($this->table_name);
		$this->db->join($this->desc_table_name, "$this->desc_table_name.$this->foreign_key = $this->table_name.$this->primary_key");
		$this->db->where('language',$this->session->userdata('front_language'));
		$this->db->order_by("sort_order", "asc");
		$this->db->where('content_category_id',$id);
		$query = $this->db->get();
        return $query->result_array();
	}
	function get_active()
	{
		$this->db->where('status','Y');
		$this->db->from($this->table_name);
		$this->db->join($this->desc_table_name, "$this->desc_table_name.$this->foreign_key = $this->table_name.$this->primary_key");
		$this->db->where('language',$this->session->userdata('front_language'));
		$this->db->order_by("sort_order", "asc");
		$query = $this->db->get();
        return $query->result_array();
	}
	function get_featured_active()
	{
		$this->db->where('status','Y');
		$this->db->where('featured','Y');
		
		$this->db->from($this->table_name);
		$this->db->join($this->desc_table_name, "$this->desc_table_name.$this->foreign_key = $this->table_name.$this->primary_key");
		$this->db->where('language',$this->session->userdata('front_language'));
		$this->db->order_by("sort_order", "asc");
		$query = $this->db->get();
        return $query->result_array();
	}
	function get_array_limit($limit)
	{
		$this->db->limit($limit);
		$this->db->from($this->table_name);
		$this->db->join($this->desc_table_name, "$this->desc_table_name.$this->foreign_key = $this->table_name.$this->primary_key");
		$this->db->where('language',$this->session->userdata('front_language'));
		$this->db->order_by("sort_order", "asc");
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
		$this->db->order_by("sort_order", "asc");
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
		$this->db->order_by("sort_order", "asc");
		$query = $this->db->get();
		
        return $query->row();
	}
	function get_row_cond($cond)
	{
		$this->db->where($cond);
		$this->db->from($this->table_name);
		$this->db->join($this->desc_table_name, "$this->desc_table_name.$this->foreign_key = $this->table_name.$this->primary_key");
		$this->db->where('language',$this->session->userdata('front_language'));
		$this->db->order_by("sort_order", "asc");
		$query = $this->db->get(); 
        return $query->row();
	}
	
	function get_row_cond2($cond)
	{
		$this->db->where($cond);
		$this->db->from($this->table_name);
		$this->db->join($this->desc_table_name, "$this->desc_table_name.$this->foreign_key = $this->table_name.$this->primary_key");
		$this->db->where('language',$this->session->userdata('front_language')); 
		$this->db->order_by("sort_order", "asc");
		$query = $this->db->get(); 
        return $query->result_array();
	}
	
	function get_array_cond($cond)
	{
		$this->db->where($cond);
		$this->db->from($this->table_name);
		$this->db->join($this->desc_table_name, "$this->desc_table_name.$this->foreign_key = $this->table_name.$this->primary_key");
		$this->db->where('language',$this->session->userdata('front_language'));
		$this->db->order_by("sort_order", "asc");
		$query = $this->db->get(); 
        return $query->result_array();
	}
	function get_cats($cond)
	{
		$this->db->where($cond);
		$this->db->from($this->table_name);
		$this->db->join($this->desc_table_name, "$this->desc_table_name.$this->foreign_key = $this->table_name.$this->primary_key");
		$this->db->where('language',$this->session->userdata('front_language'));
        $this->db->order_by("sort_order", "asc");
		$query = $this->db->get(); 
        $results = $query->result_array(); 
		if($results) foreach($results as $key=> $result):
			$results[$key]['sub'] = $this->get_array_cond(array('parent_id'=>$result['id']));
		endforeach;
		return $results;
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
		$this->db->order_by("sort_order", "asc");
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
		$this->db->order_by("sort_order", "asc");
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
	function get_idpair()
	{
		$idpair=array();
		$this->db->from($this->table_name);
		$this->db->join($this->desc_table_name, "$this->desc_table_name.$this->foreign_key = $this->table_name.$this->primary_key");
		$this->db->where('language',$this->session->userdata('front_language'));
		$this->db->order_by("sort_order", "asc");
		$query = $this->db->get();
        foreach($query->result_array() as $row):
			$idpair[$row['id']]=$row['name'];
		endforeach;
		return $idpair;
	}
    function get_slugpair($brandid='')
	{
		$idpair=array();
		$this->db->select("$this->table_name.slug,brand_categories.catslug");
		$this->db->from($this->table_name);
		$this->db->join($this->desc_table_name, "$this->desc_table_name.$this->foreign_key = $this->table_name.$this->primary_key");
		$this->db->join('brand_categories', "brand_categories.category_id = $this->table_name.$this->primary_key and brand_categories.brand_id = '$brandid'");
		$this->db->where('language',$this->session->userdata('front_language'));
		$this->db->order_by("sort_order", "asc");
		$query = $this->db->get();
        foreach($query->result_array() as $row):
			$idpair[$row['catslug']]=$row['slug'];
		endforeach; 
		return $idpair;
	}
	function get_category_path($id)
	{
		$catpath=array();
		$catcontent=$this->contentcategory_model->load($id);
		$i=0;
		while($catcontent){
			$i++;
			if($catcontent->breadcrumb_status=='Y'){
				$catpath[$i]['link']=site_url('contents/lists/'.$catcontent->slug);
				$catpath[$i]['name']=$catcontent->name;
			}
			$catcontent=$this->contentcategory_model->load($catcontent->parent_id);
		}
		return $catpath;
	}
}