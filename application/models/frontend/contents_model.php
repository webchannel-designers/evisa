<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contents_model extends CI_Model {

    function __construct()

    {

        parent::__construct();

		$this->lang_table_name='languages';

		$this->table_name='contents';

		$this->desc_table_name='contents_desc';

		$this->primary_key ='id';

		$this->foreign_key='contents_id';

    }

	function get_array()

	{

		$this->db->from($this->table_name);

		$this->db->join($this->desc_table_name, "$this->desc_table_name.$this->foreign_key = $this->table_name.$this->primary_key");

		$this->db->where('language',$this->session->userdata('front_language'));

		$query = $this->db->get();

        return $query->result_array();

	}

	function get_data()

	{

		$this->db->from($this->table_name);

		$this->db->join($this->desc_table_name, "$this->desc_table_name.$this->foreign_key = $this->table_name.$this->primary_key");

		$this->db->where('language',$this->session->userdata('front_language'));

		$this->db->where('slug','welcome-message');

		$query = $this->db->get();

        return $query->result_array();

	}

	function get_array_cond($cond)

	{

		$this->db->where($cond);

		$this->db->from($this->table_name);

		$this->db->join($this->desc_table_name, "$this->desc_table_name.$this->foreign_key = $this->table_name.$this->primary_key");

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
	
//	function get_health($_GET)
//
//	{
//
//		$this->db->where('is_active','Y');
//		
//		if(@$this->input->get_post('city')!="")
//		{
//		$this->db->where('area', $this->input->get_post('city'));
//		}
//		
//		if(@$this->input->get_post('country')!="")
//		{
//		$this->db->where('country', $this->input->get_post('country'));
//		}
//		
//		if(@$this->input->get_post('health')!="")
//		{
//		$this->db->where('healthfirst', $this->input->get_post('health'));
//		}
//
//		$this->db->from('stores');
//
//		//$this->db->join($this->desc_table_name, "$this->desc_table_name.$this->foreign_key = $this->table_name.$this->primary_key");
//
//		//$this->db->where('language',$this->session->userdata('front_language'));
//
//		$query = $this->db->get();
//
//        return $query->result_array();
//
//	}
	
	function get_store($va="")

	{

		$this->db->where('is_active','Y');
		
		$this->db->where('area',$va);

		$this->db->from('stores');

		//$this->db->join($this->desc_table_name, "$this->desc_table_name.$this->foreign_key = $this->table_name.$this->primary_key");

		//$this->db->where('language',$this->session->userdata('front_language'));

		$query = $this->db->get();
		
		//echo $this->db->last_query();exit;

        return $query->result_array();

	}
	
	function get_health2()

	{

		$this->db->where('is_active','Y');
		
		$this->db->from('stores');

		//$this->db->join($this->desc_table_name, "$this->desc_table_name.$this->foreign_key = $this->table_name.$this->primary_key");

		//$this->db->where('language',$this->session->userdata('front_language'));

		$query = $this->db->get();

        return $query->result_array();

	}
	
	function get_country()

	{

		$this->db->where('status','Y');

		$this->db->from('countries');

		//$this->db->join($this->desc_table_name, "$this->desc_table_name.$this->foreign_key = $this->table_name.$this->primary_key");

		//$this->db->where('language',$this->session->userdata('front_language'));

		$query = $this->db->get();

        return $query->result_array();

	}
	
	function get_city()

	{

		$this->db->where('is_active','Y');

		$this->db->from('area');

		//$this->db->join($this->desc_table_name, "$this->desc_table_name.$this->foreign_key = $this->table_name.$this->primary_key");

		//$this->db->where('language',$this->session->userdata('front_language'));

		$query = $this->db->get();

        return $query->result_array();

	}
	
	function retails()

	{
		$ids=array(56,57,59,58,54);

		$this->db->where('status','Y');
		
		$this->db->where_in('contents_id', $ids);

		$this->db->from($this->table_name);

		$this->db->join($this->desc_table_name, "$this->desc_table_name.$this->foreign_key = $this->table_name.$this->primary_key");

		$this->db->where('language',$this->session->userdata('front_language'));

		$query = $this->db->get();

        return $query->result_array();

	}

	function wholesales()

	{
		$ids=array(55,60,61);

		$this->db->where('status','Y');
		
		$this->db->where_in('contents_id', $ids);

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

		$this->db->join($this->desc_table_name, "$this->desc_table_name.$this->foreign_key = $this->table_name.$this->primary_key");

		$this->db->where('language',$this->session->userdata('front_language'));

		$query = $this->db->get();

        return $query->row();

	}

	

	function get_row_cond($cond)

	{

		$this->db->where($cond);

		$this->db->from($this->table_name);

		$this->db->join($this->desc_table_name, "$this->desc_table_name.$this->foreign_key = $this->table_name.$this->primary_key");

		$this->db->where('language',$this->session->userdata('front_language'));

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

		if($this->session->userdata('content_category_id')!=''){

			$this->db->where('category_id',$this->session->userdata('content_category_id'));

		}

		if($this->session->userdata('content_key')!=''){

			$this->db->like($this->session->userdata('content_field'),$this->session->userdata('content_key'),'both');

		}

        $this->db->from($this->table_name);

		$this->db->join($this->desc_table_name, "$this->desc_table_name.$this->foreign_key = $this->table_name.$this->primary_key");

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

		if($this->session->userdata('content_category_id')!=''){

			$this->db->where('category_id',$this->session->userdata('content_category_id'));

		}

		if($this->session->userdata('content_key')!=''){

			$this->db->like($this->session->userdata('content_field'),$this->session->userdata('content_key'),'both');

		}

		$this->db->limit($num, $offset);

        $this->db->from($this->table_name);

		$this->db->join($this->desc_table_name, "$this->desc_table_name.$this->foreign_key = $this->table_name.$this->primary_key");

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

	function get_catcontents($slug,$limit='')

	{

		$this->db->where('slug',$slug);
		
		$this->db->from('content_category');

		$query = $this->db->get();
		
		//echo $this->db->last_query();
		
        $row=$query->row();

		if($limit!=''){

		$this->db->limit($limit);

		}

		$this->db->where(array('category_id'=>$row->id));

		$this->db->from($this->table_name);

		$this->db->join($this->desc_table_name, "$this->desc_table_name.$this->foreign_key = $this->table_name.$this->primary_key");

		$this->db->where('language',$this->session->userdata('front_language'));
		
		$this->db->where('status','Y');
				
		$this->db->order_by("sort_order", "asc");

		$query = $this->db->get();
		
				//echo $this->db->last_query();


        return $query->result_array();

	}

}