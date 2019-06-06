<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Contactcategory_model extends CI_Model {
    function __construct()
    {
        parent::__construct();
		$this->lang_table_name='languages';
		$this->table_name='contact_category';
		$this->desc_table_name='contact_category_desc';
		$this->contact_table_name='contacts';
		$this->primary_key ='id';
		$this->foreign_key='contact_category_id';
		$this->category_key='category_id';
    }
	
	function get_array()
	{
		$this->db->from($this->table_name);
		$this->db->join($this->desc_table_name, "$this->desc_table_name.$this->foreign_key = $this->table_name.$this->primary_key");
		$this->db->where('language',$this->session->userdata('admin_language'));
		$this->db->order_by('sort_order','ASC');
		$query = $this->db->get();
        return $query->result_array();
	}
	function get_active()
	{
		$this->db->where('status','Y');
		$this->db->from($this->table_name);
		$this->db->join($this->desc_table_name, "$this->desc_table_name.$this->foreign_key = $this->table_name.$this->primary_key");
		$this->db->where('language',$this->session->userdata('admin_language'));
		$this->db->order_by('sort_order','ASC');
		$query = $this->db->get();
        return $query->result_array();
	}
	
	function get_array_limit($limit)
	{
		$this->db->limit($limit);
		$this->db->from($this->table_name);
		$this->db->join($this->desc_table_name, "$this->desc_table_name.$this->foreign_key = $this->table_name.$this->primary_key");
		$this->db->where('language',$this->session->userdata('admin_language'));
		$this->db->order_by('sort_order','ASC');
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
		$this->db->where('language',$this->session->userdata('admin_language'));
		$query = $this->db->get();
        return $query->row();
	}
	
	function get_row_cond($cond)
	{
		$this->db->where($cond);
		$this->db->from($this->table_name);
		$this->db->join($this->desc_table_name, "$this->desc_table_name.$this->foreign_key = $this->table_name.$this->primary_key");
		$this->db->where('language',$this->session->userdata('front_language'));
		$this->db->order_by('sort_order','ASC');
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
		$this->db->order_by('sort_order','ASC');
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
		$this->db->order_by('sort_order','ASC');
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
	
	function get_contact_category()
	{
		$this->db->select("$this->table_name.id,$this->desc_table_name.name,$this->desc_table_name.language");    
		$this->db->where("$this->table_name.status",'Y');
		$this->db->from($this->table_name);
		$this->db->join($this->contact_table_name, "$this->contact_table_name.$this->category_key = $this->table_name.$this->primary_key",'inner');
		$this->db->join($this->desc_table_name, "$this->desc_table_name.$this->foreign_key = $this->table_name.$this->primary_key");
		$this->db->where('language',$this->session->userdata('admin_language'));
		$this->db->order_by("$this->table_name.sort_order",'ASC');
		$this->db->group_by("$this->table_name.id");
		$query = $this->db->get();
        return $query->result_array();
	}
}