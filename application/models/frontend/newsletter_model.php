<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Newsletter_model extends CI_Model {

    function __construct()

    {

        parent::__construct();

		//$this->lang_table_name='languages';

		$this->table_name='newsletter';

		//$this->desc_table_name='banners_desc';

		$this->primary_key ='id';

		//$this->foreign_key='banners_id';

    }

	



	

	function insert($maindata,$descdata)

	{

		$this->db->insert($this->table_name,$descdata);

		$prime=$this->db->insert_id();

		return $prime;

	}
	
	function checking($maindata)

	{
	
	//echo $maindata;exit;
	
		$this->db->from($this->table_name);

		//$this->db->join($this->desc_table_name, "$this->desc_table_name.$this->foreign_key = $this->table_name.$this->primary_key");

		//$this->db->where('language',$this->session->userdata('admin_language'));
		$this->db->where('news_email',$maindata);

		$query = $this->db->get();
		
		return $query->num_rows();

        //return $query->result_array();

	}

	


}