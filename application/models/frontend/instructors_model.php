<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Instructors_model extends CI_Model {
    function __construct()
    {
        parent::__construct();
		$this->lang_table_name='languages';
		$this->table_name='instructors';
		
		//$this->primary_key ='id';
		//$this->foreign_key='faqs_id';
    }
	
		function login_check($user,$pass)
	{
		$user=$this->db->escape_str($user);
		$pass=$this->db->escape_str($pass);
		$pass=md5($pass);
		$cond=array('username'=>$user,'password'=>$pass,'status'=>'Y');
		$this->db->where($cond);
		$query = $this->db->get($this->table_name);
        $result = $query->num_rows();
		if($result>0){
			return true;
		} else {
			return false;
		}
	}
	function get_row_cond($cond)
	{
		$this->db->where($cond);
		$query = $this->db->get($this->table_name);
        return $query->row();
	}
}