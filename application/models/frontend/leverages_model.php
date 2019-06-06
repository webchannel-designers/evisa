<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Leverages_model extends CI_Model {
    function __construct()
    {
        parent::__construct();
		$this->lang_table_name='languages';
		$this->table_name='leverages';		
		$this->primary_key ='id';		
    }
	
	function get_array()
	{
		$this->db->from($this->table_name);		
		$query = $this->db->get();
        return $query->result_array();
	}
	
	function get_active()
	{
		$this->db->where('status','Y');
		$this->db->from($this->table_name);		
		$query = $this->db->get();
        return $query->result_array();
	}
	
	function get_array_limit($limit)
	{
		$this->db->limit($limit);
		$this->db->from($this->table_name);		
		$query = $this->db->get();
        return $query->result_array();
	}
	
	function load($id)
	{
		$id=$this->db->escape_str($id);
		$cond=array('id'=>$id);
		$this->db->where($cond);
		$this->db->from($this->table_name);		
		$query = $this->db->get();
        return $query->row();
	}
	
	function get_row_cond($cond)
	{
		$this->db->where($cond);
		$this->db->from($this->table_name);
		$query = $this->db->get();
        return $query->row();
	}
	
	function insert($maindata)
	{
		$this->db->insert($this->table_name,$maindata);
		$prime=$this->db->insert_id();			
		return $prime;
	}
	
	function update($maindata,$id)
	{
		$cond[$this->primary_key]=$id;		
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
		$this->db->order_by('id');
		$query = $this->db->get();
        return $query->result_array();
    }
}