<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reports_model extends CI_Model {

    function __construct()

    {

        parent::__construct();

		$this->lang_table_name='languages';

		$this->table_name='reports';

		$this->desc_table_name='reports_desc';

		$this->primary_key ='id';

		$this->foreign_key='downloads_id';

    }

	

	function get_array()

	{

		$this->db->from($this->table_name);

		$this->db->join($this->desc_table_name, "$this->desc_table_name.$this->foreign_key = $this->table_name.$this->primary_key");

		$this->db->where('language',$this->session->userdata('admin_language'));

		$query = $this->db->get();

        return $query->result_array();

	}

	function get_active()

	{

		$this->db->where('status','Y');

		$this->db->from($this->table_name);

		$this->db->join($this->desc_table_name, "$this->desc_table_name.$this->foreign_key = $this->table_name.$this->primary_key");

		$this->db->where('language',$this->session->userdata('admin_language'));

		$query = $this->db->get();

        return $query->result_array();

	}

	

	function get_array_limit($limit)

	{

		$this->db->limit($limit);

		$this->db->from($this->table_name);

		$this->db->join($this->desc_table_name, "$this->desc_table_name.$this->foreign_key = $this->table_name.$this->primary_key");

		$this->db->where('language',$this->session->userdata('admin_language'));

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

		$this->db->where('language',$this->session->userdata('admin_language'));

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

		$desccond['language']=$this->session->userdata('admin_language');

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

		if($this->session->userdata('download_category_id')!=''){

			$this->db->where('category_id',$this->session->userdata('download_category_id'));

		}

		if($this->session->userdata('download_key')!=''){

			$this->db->like($this->session->userdata('download_field'),$this->session->userdata('download_key'),'both');

		}

        $this->db->from($this->table_name);

		$this->db->join($this->desc_table_name, "$this->desc_table_name.$this->foreign_key = $this->table_name.$this->primary_key");

		$this->db->where('language',$this->session->userdata('admin_language'));

		$query = $this->db->get();

        return $query->num_rows();

    }

	

	function get_pagination($num, $offset, $cond='')

    {

        $this->db->select('*');

		if(is_array($cond) && count($cond)>0){

		$this->db->where($cond);

		}

		if($this->session->userdata('download_category_id')!=''){

			$this->db->where('category_id',$this->session->userdata('download_category_id'));

		}

		if($this->session->userdata('download_key')!=''){

			$this->db->like($this->session->userdata('download_field'),$this->session->userdata('download_key'),'both');

		}

		if($this->session->userdata('order_field')!='' && $this->session->userdata('sort_field')!=''){

			$this->db->order_by($this->session->userdata('sort_field'), $this->session->userdata('order_field'));

		}

		$this->db->limit($num, $offset);

        $this->db->from($this->table_name);

		$this->db->join($this->desc_table_name, "$this->desc_table_name.$this->foreign_key = $this->table_name.$this->primary_key");

		$this->db->where('language',$this->session->userdata('admin_language'));

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

		$this->db->where('language',$this->session->userdata('admin_language'));

		$query = $this->db->get();

        foreach($query->result_array() as $row):

			$idpair[$row['id']]=$row['title'];

		endforeach;

		return $idpair;

	}

	function get_categories()

	{

		return array('applications'=>'Application Forms','tutorials'=>'Tutorials');

	}

	function get_fields()

	{

		return array('title'=>'Title');

	}

}