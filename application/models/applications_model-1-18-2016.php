<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Applications_model extends CI_Model {

    function __construct()

    {

        parent::__construct();

		$this->table_name='applications';

    }

	

	function get_array()

	{

		$query = $this->db->get($this->table_name);

        return $query->result_array();

	}

	function get_active()

	{

		$this->db->where('status','Y');

		$query = $this->db->get($this->table_name);

        return $query->result_array();

	}

	

	function get_active_array()

	{

		$this->db->where('status','Y');

		$query = $this->db->get($this->table_name);

        foreach($query->result_array() as $row):

			$langs[$row['code']] = $row['name'];

		endforeach;

		return $langs;

	}

	

	function get_array_limit($limit)

	{

		$this->db->limit($limit);

		$query = $this->db->get($this->table_name);

        return $query->result_array();

	}

	

	function load($id)

	{

		$id=$this->db->escape_str($id);

		$cond=array('id'=>$id);

		$this->db->where($cond);

		$query = $this->db->get($this->table_name);
		
		//echo $this->db->last_query();

        return $query->row();

	}

	

	function get_row_cond($cond)

	{

		$this->db->where($cond);

		$query = $this->db->get($this->table_name);

        return $query->row();

	}

	

	function insert($data)

	{

		$this->db->insert($this->table_name,$data);

		return $this->db->insert_id();

	}

	

	function update($data,$cond)

	{

		return $this->db->update($this->table_name,$data,$cond);

	}

	

	function delete($cond)

	{

		return $this->db->delete($this->table_name,$cond);

	}

	

	function get_pagination_count($cond='')

    {

        $this->db->select('*');

		if(is_array($cond) && count($cond)>0){

		$this->db->where($cond);

		}
		if($this->session->userdata('content_key')!='')
		{
			$this->db->or_like('firstname',$this->session->userdata('content_key'));
			$this->db->or_like('lastname',$this->session->userdata('content_key'));
		}
		if($this->session->userdata('content_email')!='')
		{
			$this->db->or_like('email',$this->session->userdata('content_email'));
		}
		if($this->session->userdata('content_phone')!='')
		{
			$this->db->or_like('phone',$this->session->userdata('content_phone'));
		}
		if($this->session->userdata('content_visa')!='')
		{
		$this->db->where('visa',$this->session->userdata('content_visa'));
		}
		
		if($this->session->userdata('content_title')!='')
		{
		$this->db->where('title',$this->session->userdata('content_title'));
		}
		if($this->session->userdata('content_notice')!='')
		{
		$this->db->where('noticeperiod',$this->session->userdata('content_notice'));
		}
		if($this->session->userdata('content_experience')!='')
		{
		$this->db->where('experience',$this->session->userdata('content_experience'));
		}
		if($this->session->userdata('content_department')!='')
		{
		$this->db->where('department',$this->session->userdata('content_department'));
		}
		if($this->session->userdata('content_license')!='')
		{
		$this->db->where('uaelicense',$this->session->userdata('content_license'));
		}
		if($this->session->userdata('content_rating')!='')
		{
		$this->db->where('rating',$this->session->userdata('content_rating'));
		}
		if($this->session->userdata('content_education')!='')
		{
		$this->db->where('education',$this->session->userdata('content_rating'));
		}
		
		if($this->session->userdata('content_country')!='')
		{
		$this->db->where('nationality',$this->session->userdata('content_country'));
		}
		if($this->session->userdata('content_job')!='')
		{
		$this->db->where('jobs_id',$this->session->userdata('content_job'));
		}
        
        if($this->session->userdata('shortlist_job')!='')
		{
		$this->db->where('jobs_shortlist_id',$this->session->userdata('shortlist_job'));
		}
        
        
		if($this->session->userdata('content_skill')!='')
		{
			$this->db->or_like('studyfield',$this->session->userdata('content_skill'));
		}
		if($this->session->userdata('content_from')!='')
		{
		$this->db->where("application_date >= ",date('Y-m-d',strtotime($this->session->userdata('content_from'))));
		}
		if($this->session->userdata('content_to')!='')
		{
		$this->db->where("application_date <= ",date('Y-m-d',strtotime($this->session->userdata('content_to'))));
		}

        $this->db->from($this->table_name);
		
		if($this->session->userdata('content_category')!='')
		{
		$this->db->join('jobs_desc', "jobs_desc.jobs_id = $this->table_name.jobs_id");
	
    	$this->db->join('jobcategory', "jobcategory.id = jobs_desc.category");
		
        $this->db->where('jobcategory.id',$this->session->userdata('content_category'));
		}

        $query = $this->db->get();
		
		//echo $this->db->last_query();exit;

        return $query->num_rows();

    }

	

	function get_pagination($num, $offset, $cond='')

    {

        $this->db->select('*');

		if(is_array($cond) && count($cond)>0){

		$this->db->where($cond);

		}
		
		
		if($this->session->userdata('content_key')!='')
		{
			$this->db->or_like('firstname',$this->session->userdata('content_key'));
			$this->db->or_like('lastname',$this->session->userdata('content_key'));
		}
		if($this->session->userdata('content_email')!='')
		{
			$this->db->or_like('email',$this->session->userdata('content_email'));
		}
		if($this->session->userdata('content_phone')!='')
		{
			$this->db->or_like('phone',$this->session->userdata('content_phone'));
		}
		if($this->session->userdata('content_visa')!='')
		{
		$this->db->where('visa',$this->session->userdata('content_visa'));
		}
		
		if($this->session->userdata('content_title')!='')
		{
		$this->db->where('title',$this->session->userdata('content_title'));
		}
		if($this->session->userdata('content_notice')!='')
		{
		$this->db->where('noticeperiod',$this->session->userdata('content_notice'));
		}
		if($this->session->userdata('content_experience')!='')
		{
		$this->db->where('experience',$this->session->userdata('content_experience'));
		}
		if($this->session->userdata('content_department')!='')
		{
		$this->db->where('department',$this->session->userdata('content_department'));
		}
		if($this->session->userdata('content_license')!='')
		{
		$this->db->where('uaelicense',$this->session->userdata('content_license'));
		}
		if($this->session->userdata('content_rating')!='')
		{
		$this->db->where('rating',$this->session->userdata('content_rating'));
		}
		if($this->session->userdata('content_education')!='')
		{
		$this->db->where('education',$this->session->userdata('content_rating'));
		}
		
		if($this->session->userdata('content_country')!='')
		{
		$this->db->where('nationality',$this->session->userdata('content_country'));
		}
		if($this->session->userdata('content_job')!='')
		{
		$this->db->where('jobs_id',$this->session->userdata('content_job'));
		}
	
        if($this->session->userdata('shortlist_job')!='')
		{
		$this->db->where('jobs_shortlist_id',$this->session->userdata('shortlist_job'));
		}
    	if($this->session->userdata('content_skill')!='')
		{
			$this->db->or_like('studyfield',$this->session->userdata('content_skill'));
		}
		
		if($this->session->userdata('content_from')!='')
		{
		//$this->db->where("application_date >= ",date('Y-m-d',strtotime($this->session->userdata('content_from'))));
		$this->db->where("application_date >= ",date('Y-m-d',strtotime($this->session->userdata('content_from'))));
		}
		if($this->session->userdata('content_to')!='')
		{
		$this->db->where("application_date <= ",date('Y-m-d',strtotime($this->session->userdata('content_to'))));
		}

        $this->db->from($this->table_name);
		
		if($this->session->userdata('content_category')!='')
		{
		$this->db->join('jobs_desc', "jobs_desc.jobs_id = $this->table_name.jobs_id");
		$this->db->join('jobcategory', "jobcategory.id = jobs_desc.category");
		$this->db->where('jobcategory.id',$this->session->userdata('content_category'));
		}

		$this->db->limit($num, $offset);
		$this->db->order_by('id desc');

        $query = $this->db->get();
		
		//echo $this->db->last_query();

        return $query->result_array();

    }

	

}