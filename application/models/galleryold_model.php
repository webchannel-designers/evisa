<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Galleryold_model extends CI_Model {

    function __construct()

    {

        parent::__construct();

		$this->lang_table_name='languages';

		$this->table_name='gallery1';

		//$this->desc_table_name='banners_desc';

		$this->primary_key ='id';

		//$this->foreign_key='banners_id';

    }

	

	function get_array()

	{

		$this->db->from($this->table_name);

		//$this->db->join($this->desc_table_name, "$this->desc_table_name.$this->foreign_key = $this->table_name.$this->primary_key");

		$this->db->where('language',$this->session->userdata('admin_language'));
		
		$query = $this->db->get();
		
		//print_r($query->result_array());exit;

        return $query->result_array();

	}
	function get_array_cond($id)

	{

		$id=$this->db->escape_str($id);

		$cond=array('parent_id'=>$id);

		$this->db->where($cond);

		$this->db->from($this->table_name);

		//$this->db->join($this->desc_table_name, "$this->desc_table_name.$this->foreign_key = $this->table_name.$this->primary_key");

		$this->db->where('language',$this->session->userdata('admin_language'));

		$query = $this->db->get();

        return $query->result_array();

	}
	function get_active()

	{

		$this->db->where('status','Y');

		$this->db->from($this->table_name);

		//$this->db->join($this->desc_table_name, "$this->desc_table_name.$this->foreign_key = $this->table_name.$this->primary_key");

		$this->db->where('language',$this->session->userdata('admin_language'));

		$query = $this->db->get();

        return $query->result_array();

	}

	

	function get_array_limit($limit)

	{

		$this->db->limit($limit);

		$this->db->from($this->table_name);

		//$this->db->join($this->desc_table_name, "$this->desc_table_name.$this->foreign_key = $this->table_name.$this->primary_key");

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

		//$this->db->join($this->desc_table_name, "$this->desc_table_name.$this->foreign_key = $this->table_name.$this->primary_key");

		$this->db->where('language',$this->session->userdata('admin_language'));

		$query = $this->db->get();

        return $query->row();

	}

	

	function get_row_cond($cond)

	{

		$this->db->where($cond);

		$this->db->from($this->table_name);

		//$this->db->join($this->desc_table_name, "$this->desc_table_name.$this->foreign_key = $this->table_name.$this->primary_key");

		$this->db->where('language',$this->session->userdata('admin_language'));

		$query = $this->db->get();

        return $query->row();

	}

	

	function insert($maindata,$descdata)

	{

		$this->db->insert($this->table_name,$descdata);

		$prime=$this->db->insert_id();

		$query = $this->db->get($this->lang_table_name);

        //foreach($query->result_array() as $row):

			//$rowdata=$descdata;

			//$rowdata[$this->foreign_key]=$prime;

			//$rowdata['language']=$row['code'];

			//$this->db->insert($this->table_name,$rowdata);

			//unset($rowdata);

		//endforeach;		

		return $prime;

	}
	function updateall($maindata,$cond)

	{
		
		$this->db->where($cond);
		$this->db->update($this->table_name,$maindata);

	}
	function update($maindata,$descdata,$id)

	{
		
		$this->db->where('id', $id);
		$this->db->update($this->table_name,$descdata);

		//$prime=$this->db->insert_id();

		//$query = $this->db->get($this->lang_table_name);

        //foreach($query->result_array() as $row):

			//$rowdata=$descdata;

			//$rowdata[$this->foreign_key]=$prime;

			//$rowdata['language']=$row['code'];

			//$this->db->insert($this->table_name,$rowdata);

			//unset($rowdata);

		//endforeach;		

		//return $prime;

	}

	


	

	function delete($id)

	{

		//$desccond=array($this->primary_key=>$id);

		//$this->db->delete($this->table_name,$desccond);
		
		$this->db->from($this->table_name);
//
//
//		$this->db->where('language',$this->session->userdata('admin_language'));

		$this->db->where('id',$id);
//		
		$query = $this->db->get();
		
//		
		$path = $query->row();
		
		//print_r($path);
		if(file_exists("./public/uploads/gallery/".$path->image))
		{
//		
		unlink("./public/uploads/gallery/".$path->image);
		
		}
		
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

		//$this->db->join($this->desc_table_name, "$this->desc_table_name.$this->foreign_key = $this->table_name.$this->primary_key");

		$this->db->where('language',$this->session->userdata('admin_language'));

		$query = $this->db->get();

        return $query->num_rows();

    }

	

	function get_pagination($num, $offset, $cond='',$order ='')

    {

        $this->db->select('*');

		if(is_array($cond) && count($cond)>0){

		$this->db->where($cond);

		}

		if(!empty($order) && count($order)>0){

		$this->db->order_by($order);

		}

		$this->db->limit($num, $offset);

        $this->db->from($this->table_name);

		//$this->db->join($this->desc_table_name, "$this->desc_table_name.$this->foreign_key = $this->table_name.$this->primary_key");

		$this->db->where('language',$this->session->userdata('admin_language'));

		$query = $this->db->get();

        return $query->result_array();

    }

	

}