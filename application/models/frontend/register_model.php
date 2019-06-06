<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Register_model extends CI_Model {

    function __construct()

    {

        parent::__construct();

		//$this->lang_table_name='languages';

		$this->table_name='users';

		//$this->desc_table_name='banners_desc';

		$this->primary_key ='order_id';

		//$this->foreign_key='banners_id';

    }

	function get_array()

	{

		$this->db->from($this->table_name);

		//$this->db->join($this->desc_table_name, "$this->desc_table_name.$this->foreign_key = $this->table_name.$this->primary_key");

		//$this->db->where('language',$this->session->userdata('admin_language'));

		$query = $this->db->get();

        return $query->result_array();

	}

	function get_active()

	{

		$this->db->where('order_id',@$_SESSION['ordId']);

		$this->db->from('visa_order_details');

		//$this->db->join($this->desc_table_name, "$this->desc_table_name.$this->foreign_key = $this->table_name.$this->primary_key");

		//$this->db->where('language',$this->session->userdata('admin_language'));

		$query = $this->db->get();

        return $query->result_array();

	}

	function get_array_limit($limit)

	{

		$this->db->limit($limit);

		$this->db->from($this->table_name);

		//$this->db->join($this->desc_table_name, "$this->desc_table_name.$this->foreign_key = $this->table_name.$this->primary_key");

		//$this->db->where('language',$this->session->userdata('admin_language'));

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

		//$this->db->where('language',$this->session->userdata('admin_language'));

		$query = $this->db->get();
		
		//echo $this->db->last_query();

        return $query->row();

	}
	
	function load2($id)

	{

		$id=$this->db->escape_str($id);

		$cond=array('order_id'=>$id);

		$this->db->where($cond);

		$this->db->from('visa_order_master');

		//$this->db->join($this->desc_table_name, "$this->desc_table_name.$this->foreign_key = $this->table_name.$this->primary_key");

		//$this->db->where('language',$this->session->userdata('admin_language'));

		$query = $this->db->get();
		
		//echo $this->db->last_query();

        return $query->row();

	}
	
	function load3($id)

	{

		$id=$this->db->escape_str($id);

		$cond=array('visa_order_master.order_id'=>$id);

		$this->db->where($cond);

		$this->db->from('visa_order_master');

		$this->db->join('visa_order_details', "visa_order_details.order_id = visa_order_master.order_id");

		//$this->db->where('language',$this->session->userdata('admin_language'));

		$query = $this->db->get();
		
		//echo $this->db->last_query();

        return $query->row();

	}
	
	function check($id)

	{

		$id=$this->db->escape_str($id);

		$cond=array('email'=>$id);

		$this->db->where($cond);

		$this->db->from($this->table_name);

		//$this->db->join($this->desc_table_name, "$this->desc_table_name.$this->foreign_key = $this->table_name.$this->primary_key");

		//$this->db->where('language',$this->session->userdata('admin_language'));

		$query = $this->db->get();

        return $query->num_rows();

	}
	
	function chkpass($pass,$id)

	{

		$id=$this->db->escape_str($id);

		$cond=array('id'=>$id,'passwordcopy'=>$pass);

		$this->db->where($cond);

		$this->db->from($this->table_name);

		//$this->db->join($this->desc_table_name, "$this->desc_table_name.$this->foreign_key = $this->table_name.$this->primary_key");

		//$this->db->where('language',$this->session->userdata('admin_language'));

		$query = $this->db->get();
		
		//echo $this->db->last_query();

        return $query->num_rows();

	}

	function get_row_cond($cond)

	{

		$this->db->where($cond);

		$this->db->from($this->table_name);

		//$this->db->join($this->desc_table_name, "$this->desc_table_name.$this->foreign_key = $this->table_name.$this->primary_key");

		//$this->db->where('language',$this->session->userdata('admin_language'));

		$query = $this->db->get();

        return $query->row();

	}

	function insert($maindata,$descdata)

	{
		//print_r($maindata);exit;

		$this->db->insert($this->table_name,$maindata);

		$prime=$this->db->insert_id();

		//$query = $this->db->get($this->lang_table_name);

        //foreach($query->result_array() as $row):

			//$rowdata=$descdata;

			//$rowdata[$this->foreign_key]=$prime;

			//$rowdata['language']=$row['code'];

			//$this->db->insert($this->desc_table_name,$rowdata);

			//unset($rowdata);

		//endforeach;		

		return $prime;

	}
	
	function insert2($maindata,$descdata)

	{
		//print_r($maindata);exit;

		$this->db->insert('visa_order_master',$maindata);

		$prime=$this->db->insert_id();

		//$query = $this->db->get($this->lang_table_name);

        //foreach($query->result_array() as $row):

			//$rowdata=$descdata;

			//$rowdata[$this->foreign_key]=$prime;

			//$rowdata['language']=$row['code'];

			//$this->db->insert($this->desc_table_name,$rowdata);

			//unset($rowdata);

		//endforeach;		

		return $prime;

	}
	
	function insert3($maindata,$descdata)

	{
		//print_r($maindata);exit;

		$this->db->insert('visa_order_details',$maindata);

		$prime=$this->db->insert_id();

		//$query = $this->db->get($this->lang_table_name);

        //foreach($query->result_array() as $row):

			//$rowdata=$descdata;

			//$rowdata[$this->foreign_key]=$prime;

			//$rowdata['language']=$row['code'];

			//$this->db->insert($this->desc_table_name,$rowdata);

			//unset($rowdata);

		//endforeach;		

		return $prime;

	}
	
	function update2($maindata,$descdata,$id)

	{

		$cond[$this->primary_key]=$id;

		//$desccond[$this->foreign_key]=$id;

		//$desccond['language']=$this->session->userdata('admin_language');

//		if(count($descdata)>0){
//
//			$this->db->update($this->desc_table_name,$descdata,$desccond);
//
//		}
		$this->session->set_userdata('ordId', $id);	


		return $this->db->update('visa_order_master',$maindata,$cond);

	}
	
	function update3($maindata,$descdata,$id)

	{

		$cond[$this->primary_key]=$id;

		//$desccond[$this->foreign_key]=$id;

		//$desccond['language']=$this->session->userdata('admin_language');

//		if(count($descdata)>0){
//
//			$this->db->update($this->desc_table_name,$descdata,$desccond);
//
//		}
		$this->session->set_userdata('ordId', $id);	


		return $this->db->update('visa_order_details',$maindata,$cond);

	}

	function update($maindata,$descdata,$id)

	{

		$cond[$this->primary_key]=$id;

		//$desccond[$this->foreign_key]=$id;

		//$desccond['language']=$this->session->userdata('admin_language');

//		if(count($descdata)>0){
//
//			$this->db->update($this->desc_table_name,$descdata,$desccond);
//
//		}

		return $this->db->update($this->table_name,$maindata,$cond);

	}

	function delete($id)

	{

		//$desccond=array($this->foreign_key=>$id);

		//$this->db->delete($this->desc_table_name,$desccond);

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

		//$this->db->where('language',$this->session->userdata('admin_language'));

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

		//$this->db->where('language',$this->session->userdata('admin_language'));

		$query = $this->db->get();

        return $query->result_array();

    }

}