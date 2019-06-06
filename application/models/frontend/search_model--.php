<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Search_model extends CI_Model {

    function __construct()

    {

        parent::__construct();

    }

	function get_results($_GET,$start,$limit)

	{
		//$val = explode("/",$keyword);
		//print_r($val);
		
		$this->db->select('*');
		$this->db->from('products');
		$this->db->join('products_desc', 'products.id=products_desc.contents_id');
		if(@$this->input->get_post('city')!="")
		{
		$this->db->where('products_desc.location_id', $this->input->get_post('city'));
		}
		if(@$this->input->get_post('make')!="")
		{
			$makes=@$this->input->get_post('make');
			$this->db->where_in('products_desc.make_id',$makes);
		for($i=0;$i<count($makes);$i++)
		{
		$cond=array('products_desc.make_id'=>$makes[$i]);
		//$this->db->where($cond);
		//$this->db->where('products_desc.make_id', $this->input->get_post('make'));
		}
		}
		if(@$this->input->get_post('model')!="")
		{
		$this->db->where('products_desc.model_id', $this->input->get_post('model'));
		}
		if(@$this->input->get_post('type')!="")
		{
		$this->db->like('products_desc.title', $this->input->get_post('type'));
		}
		if(@$this->input->get_post('category')!="")
		{
			$where = "FIND_IN_SET('".$this->input->get_post('category')."', products.category_id)";  
		$this->db->where($where);
		}
		if(@$this->input->get_post('yearfrom')!="")
		{
		$this->db->where('products_desc.year >=', $this->input->get_post('yearfrom'));
		}
		if(@$this->input->get_post('yearto')!="")
		{
		$this->db->where('products_desc.year <=', $this->input->get_post('yearto'));
		}
		if(@$this->input->get_post('pricefrom')!="")
		{
		$this->db->where('products_desc.price >=', $this->input->get_post('pricefrom'));
		}
		if(@$this->input->get_post('priceto')!="")
		{
		$this->db->where('products_desc.price >=', $this->input->get_post('priceto'));
		}
		if(@$this->input->get_post('useType')!="")
		{
		$this->db->where('products_desc.type =', $this->input->get_post('useType'));
		}
		$this->db->where('products.status =', 'Y');
		$this->db->where('products_desc.language =', $this->session->userdata('front_language'));		
		if(@$this->input->get_post('keyword')!="")
		{
		$key=$this->input->get_post('keyword');
		$this->db->where("( `title` LIKE '%{$key}%' OR `kilometer` LIKE '%{$key}%' OR `year` LIKE '%{$key}%' OR `milage` LIKE '%{$key}%' OR `engine` LIKE '%{$key}%' OR `fuel_type` LIKE '%{$key}%' OR `color` LIKE '%{$key}%' OR `transmission` LIKE '%{$key}%' OR `drive_type` LIKE '%{$key}%' OR `short_desc` LIKE '%{$key}%' OR `desc` LIKE '%{$key}%' OR `feat` LIKE '%{$key}%' )");
//		$this->db->or_like('title', $this->input->get_post('keyword'));
//		$this->db->or_like('kilometer', $this->input->get_post('keyword')); 
//		$this->db->or_like('year', $this->input->get_post('keyword')); 
//		$this->db->or_like('milage', $this->input->get_post('keyword')); 
//		$this->db->or_like('engine', $this->input->get_post('keyword')); 
//		$this->db->or_like('fuel_type', $this->input->get_post('keyword')); 
//		$this->db->or_like('color', $this->input->get_post('keyword')); 
//		$this->db->or_like('transmission', $this->input->get_post('keyword')); 
//		$this->db->or_like('drive_type', $this->input->get_post('keyword')); 
//		$this->db->or_like('short_desc', $this->input->get_post('keyword')); 
//		$this->db->or_like('desc', $this->input->get_post('keyword')); 
//		$this->db->or_like('feat', $this->input->get_post('keyword')); 
//		$this->db->where("OR 'kilometer' LIKE '%{$key}%'");
//		$this->db->where("OR 'year' LIKE '%{$key}%'");
//		$this->db->where("OR 'milage' LIKE '%{$key}%'");
//		$this->db->where("OR 'engine' LIKE '%{$key}%'");
//		$this->db->where("OR 'fuel_type' LIKE '%{$key}%'");
//		$this->db->where("OR 'color' LIKE '%{$key}%'");
//		$this->db->where("OR 'transmission' LIKE '%{$key}%'");
//		$this->db->where("OR 'drive_type' LIKE '%{$key}%'");
//		$this->db->where("OR 'short_desc' LIKE '%{$key}%'");
//		$this->db->where("OR 'desc' LIKE '%{$key}%'");
//		$this->db->where("OR 'feat' LIKE '%{$key}%' )");
		}
		
		$this->db->order_by('sort_order','asc');
			if(@$this->input->get_post('ord')=="old")
			{
				$this->db->order_by('date_time','asc');
			}
			else if(@$this->input->get_post('ord')=="new")
			{
				$this->db->order_by('date_time','desc');
			}
			else
			{
				$this->db->order_by('date_time','desc');
			}
			
		$this->db->limit($limit, $start);
		
		$query = $this->db->get();
		
		//echo $this->db->last_query();

        return $query->result_array();

	}

	function get_results_count($_GET)

	{
		//$val = explode("/",$keyword);
		//print_r($_GET);
		//echo $_GET['category'];
		$this->db->select('*');
		$this->db->from('products');
		$this->db->join('products_desc', 'products.id=products_desc.contents_id');
		if(@$this->input->get_post('city')!="")
		{
		$this->db->where('products_desc.location_id', $this->input->get_post('city'));
		}
		if(@$this->input->get_post('make')!="")
		{
			$makes=@$this->input->get_post('make');
			$this->db->where_in('products_desc.make_id',$makes);
		for($i=0;$i<count($makes);$i++)
		{
		$cond=array('products_desc.make_id'=>$makes[$i]);
		//$this->db->where($cond);
		//$this->db->where('products_desc.make_id', $this->input->get_post('make'));
		}
		}
		if(@$this->input->get_post('model')!="")
		{
		$this->db->where('products_desc.model_id', $this->input->get_post('model'));
		}
		if(@$this->input->get_post('type')!="")
		{
		$this->db->like('products_desc.title', $this->input->get_post('type'));
		}
		if(@$this->input->get_post('category')!="")
		{
			$where = "FIND_IN_SET('".$this->input->get_post('category')."', products.category_id)";  
		$this->db->where($where);
		}
		if(@$this->input->get_post('yearfrom')!="")
		{
		$this->db->where('products_desc.year >=', $this->input->get_post('yearfrom'));
		}
		if(@$this->input->get_post('yearto')!="")
		{
		$this->db->where('products_desc.year <=', $this->input->get_post('yearto'));
		}
		if(@$this->input->get_post('pricefrom')!="")
		{
		$this->db->where('products_desc.price >=', $this->input->get_post('pricefrom'));
		}
		if(@$this->input->get_post('priceto')!="")
		{
		$this->db->where('products_desc.price >=', $this->input->get_post('priceto'));
		}
		if(@$this->input->get_post('useType')!="")
		{
		$this->db->where('products_desc.type =', $this->input->get_post('useType'));
		}
		$this->db->where('products.status =', 'Y');
		$this->db->where('products_desc.language =', $this->session->userdata('front_language'));
		if(@$this->input->get_post('keyword')!="")
		{
		$key=$this->input->get_post('keyword');
		$this->db->where("( `title` LIKE '%{$key}%' OR `kilometer` LIKE '%{$key}%' OR `year` LIKE '%{$key}%' OR `milage` LIKE '%{$key}%' OR `engine` LIKE '%{$key}%' OR `fuel_type` LIKE '%{$key}%' OR `color` LIKE '%{$key}%' OR `transmission` LIKE '%{$key}%' OR `drive_type` LIKE '%{$key}%' OR `short_desc` LIKE '%{$key}%' OR `desc` LIKE '%{$key}%' OR `feat` LIKE '%{$key}%' )");
		//$this->db->or_like('title', $this->input->get_post('keyword'));
//		$this->db->or_like('kilometer', $this->input->get_post('keyword')); 
//		$this->db->or_like('year', $this->input->get_post('keyword')); 
//		$this->db->or_like('milage', $this->input->get_post('keyword')); 
//		$this->db->or_like('engine', $this->input->get_post('keyword')); 
//		$this->db->or_like('fuel_type', $this->input->get_post('keyword')); 
//		$this->db->or_like('color', $this->input->get_post('keyword')); 
//		$this->db->or_like('transmission', $this->input->get_post('keyword')); 
//		$this->db->or_like('drive_type', $this->input->get_post('keyword')); 
//		$this->db->or_like('short_desc', $this->input->get_post('keyword')); 
//		$this->db->or_like('desc', $this->input->get_post('keyword')); 
		//$this->db->or_like('feat', $this->input->get_post('keyword')); 
//		$this->db->where("OR 'kilometer' LIKE '%{$key}%'");
//		$this->db->where("OR 'year' LIKE '%{$key}%'");
//		$this->db->where("OR 'milage' LIKE '%{$key}%'");
//		$this->db->where("OR 'engine' LIKE '%{$key}%'");
//		$this->db->where("OR 'fuel_type' LIKE '%{$key}%'");
//		$this->db->where("OR 'color' LIKE '%{$key}%'");
//		$this->db->where("OR 'transmission' LIKE '%{$key}%'");
//		$this->db->where("OR 'drive_type' LIKE '%{$key}%'");
//		$this->db->where("OR 'short_desc' LIKE '%{$key}%'");
//		$this->db->where("OR 'desc' LIKE '%{$key}%'");
//		$this->db->where("OR 'feat' LIKE '%{$key}%' )");
		}
		$this->db->order_by('sort_order','asc');
			if(@$this->input->get_post('ord')=="old")
			{
				$this->db->order_by('date_time','desc');
			}
			else if(@$this->input->get_post('ord')=="new")
			{
				$this->db->order_by('date_time','asc');
			}
			else
			{
				$this->db->order_by('date_time','desc');
			}
		$query = $this->db->get();
		
		//echo $this->db->last_query();exit;
		
        return $query->num_rows();

	}

}

		/*$sql .= " union all "; 

		$sql .= "select CONCAT('seminarsandwebinars/index/',seminars.id) as url, seminars_desc.name  as title, seminars_desc.desc  as short_desc, 'seminars' from seminars join seminars_desc on(seminars.id=seminars_desc.seminars_id) where seminars_desc.name like ? and seminars_desc.desc like ? and seminars.status='Y' and language= '".$this->session->userdata('front_language')."'";

		$sql .= " union all "; 

		$sql .= "select CONCAT('faqs/index/',faqs.id) as url, faqs_desc.question  as title, faqs_desc.answer as short_desc, 'faqs' from faqs join faqs_desc on(faqs.id=faqs_desc.faqs_id) where faqs_desc.question like ? and faqs_desc.answer like ? and faqs.status='Y' and language= '".$this->session->userdata('front_language')."'";

		,'%'.$keyword.'%','%'.$keyword.'%','%'.$keyword.'%','%'.$keyword.'%'

		*/