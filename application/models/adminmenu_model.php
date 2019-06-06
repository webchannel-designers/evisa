<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Adminmenu_model extends CI_Model {
    function __construct()
    {
        parent::__construct();
		$this->table_name='admin_menu';
    }
	
	function get_array()
	{
		$query = $this->db->get($this->table_name);
        return $query->result_array();
	}
	
	function load($id)
	{
		$id=$this->db->escape_str($id);
		$cond=array('id'=>$id);
		$this->db->where($cond);
		$query = $this->db->get($this->table_name);
        return $query->row();
	}
	
	function get_row_cond($cond)
	{
		$this->db->where($cond);
		$query = $this->db->get($this->table_name);
        return $query->row();
	}
	function update($data,$cond)
	{
		$this->db->update($this->table_name,$data,$cond);
	}
	
	function insert($data)
	{
		$this->db->insert($this->table_name,$data);
		return $this->db->insert_id();
	}
	
	function get_menu(){
		$menu=array();
		$this->db->where('status','Y');
		$this->db->where('parent_id','0');
		$this->db->order_by('sort_order','ASC');
		$query = $this->db->get($this->table_name);
        $main_menus=$query->result_array();
		foreach($main_menus as $main_menu):
			$this->db->where('status','Y');
			$this->db->where('parent_id',$main_menu['id']);
			$this->db->order_by('sort_order','ASC');
			$query = $this->db->get($this->table_name);
			$sub_menus=$query->result_array();
			$menu[]=array(
					'id' => $main_menu['id'],
					'name' => $main_menu['name'],
					'class' => $main_menu['class'],
					'link' => $main_menu['link'],
					'sub_menu' => $sub_menus
					);
		endforeach;
		return $menu;
	}
}