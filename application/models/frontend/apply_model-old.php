<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Apply_model extends CI_Model {
    function __construct()
    {
        parent::__construct();
		$this->lang_table_name='languages';
		$this->table_name='students_details';
		$this->country_table_name='countries';
		$this->primary_key ='id';
    }	
	function get_arraycountry()
	{
	
	$this->db->from($this->country_table_name);
	$this->db->where('status','Y');
	$query = $this->db->get();
	return $query->result_array();
	}
	function insert($maindata)
	{
		$this->db->insert($this->table_name,$maindata);
		$prime=$this->db->insert_id();			
		return $prime;
	}
	function get_array()
	{
		$this->db->from($this->table_name);
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
		$this->db->where('language',$this->session->userdata('front_language'));
		$query = $this->db->get();
        return $query->row();
	}
	
	function get_row_cond($cond)
	{
		$this->db->where($cond);
		$this->db->from($this->table_name);
		$this->db->where('language',$this->session->userdata('front_language'));
		$query = $this->db->get();
        return $query->row();
	}	
	
	function delete($id)
	{
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
}