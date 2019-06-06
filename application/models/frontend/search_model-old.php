<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Search_model extends CI_Model {

    function __construct()

    {

        parent::__construct();

    }


	function get_results($category="",$city="",$make="",$model="",$yearfrom="",$yearto="",$pricefrom="",$priceto="",$useType="",$keyword="",$start,$limit)

	{
		//$val = explode("/",$keyword);
		//print_r($val);
		
		$this->db->select('*');
		$this->db->from('products');
		$this->db->join('products_desc', 'products.id=products_desc.contents_id');
		if($city!="0")
		{
		$this->db->where('products_desc.location_id', $city);
		}
		if($make!="0")
		{
		$this->db->where('products_desc.make_id', $make);
		}
		if($model!="0")
		{
		$this->db->where('products_desc.model_id', $model);
		}
		if($category!="0")
		{
		$this->db->where('products_desc.categoryid', $category);
		}
		if($yearfrom!="0")
		{
		$this->db->where('products_desc.year >=', $yearfrom);
		}
		if($yearto!="0")
		{
		$this->db->where('products_desc.year <=', $yearto);
		}
		if($pricefrom!="0")
		{
		$this->db->where('products_desc.price >=', $pricefrom);
		}
		if($priceto!="0")
		{
		$this->db->where('products_desc.price >=', $priceto);
		}
		if($useType!="0")
		{
		$this->db->where('products_desc.type =', $useType);
		}
		if($keyword!="")
		{
		$this->db->like('title', $keyword);
		$this->db->like('kilometer', $keyword); 
		$this->db->like('year', $keyword); 
		$this->db->like('milage', $keyword); 
		$this->db->like('engine', $keyword); 
		$this->db->like('fuel_type', $keyword); 
		$this->db->like('color', $keyword); 
		$this->db->like('transmission', $keyword); 
		$this->db->like('drive_type', $keyword); 
		$this->db->like('short_desc', $keyword); 
		$this->db->like('desc', $keyword); 
		$this->db->like('feat', $keyword); 
		}
		$this->db->where('products.status =', 'Y');
		$this->db->where('language =', $this->session->userdata('front_language'));
		$this->db->limit($limit, $start);
		$query = $this->db->get();
		
//		$sql = "select * from products join products_desc on(products.id=products_desc.contents_id) where 1 and ";
//		if($val[0]!="")
//		{
//		$sql.="products_desc.location_id = ? and ";
//		$chk .= $val[0].",";
//		}
//		if($val[1]!="")
//		{
//		$sql.="products_desc.make_id = ? and ";
//		$chk .= $val[1].",";
//		}
//		if($val[2]!="")
//		{
//		$sql.="products_desc.model_id = ? and ";
//		$chk .= $val[2].",";
//		}
//		if($val[3]!="")
//		{
//		$sql.="products_desc.categoryid = ? and ";
//		$chk .= $val[3].",";
//		}
//		if($val[4]!="")
//		{
//		$sql.="products_desc.year >= ? and ";
//		$chk .= $val[4].",";
//		}
//		if($val[5]!="")
//		{
//		$sql.="products_desc.year <= ? and ";
//		$chk .= $val[5].",";
//		}
//		if($val[6]!="")
//		{
//		$sql.="products_desc.price >= ? and ";
//		$chk .= $val[6].",";
//		}
//		if($val[7]!="")
//		{
//		$sql.="products_desc.price <= ? and ";
//		$chk .= $val[7].",";
//		}
//		if($val[8]!="")
//		{
//		$sql.="products_desc.type = ? and ";
//		$chk .= $val[8].",";
//		}
//		$chk = trim($chk,",");
//
//		$sql .= " products.status='Y' and language= '".$this->session->userdata('front_language')."' LIMIT $start,$limit "; 
		
		//$query = $this->db->query($sql,array($val[0],$val[1],$val[2],$val[3],$val[4],$val[5],$val[6],$val[7],$val[8]));
		//$query = $this->db->query($sql,array($val[0],$val[1],$val[2],$val[3]));
		
		//echo $this->db->last_query();

        return $query->result_array();

	}

	function get_results_count($category="",$city="",$make="",$model="",$yearfrom="",$yearto="",$pricefrom="",$priceto="",$useType="",$keyword="")

	{
		//$val = explode("/",$keyword);
		
		$this->db->select('*');
		$this->db->from('products');
		$this->db->join('products_desc', 'products.id=products_desc.contents_id');
		if($city!="0")
		{
		$this->db->where('products_desc.location_id', $city);
		}
		if($make!="0")
		{
		$this->db->where('products_desc.make_id', $make);
		}
		if($model!="0")
		{
		$this->db->where('products_desc.model_id', $model);
		}
		if($category!="0")
		{
		$this->db->where('products_desc.categoryid', $category);
		}
		if($yearfrom!="0")
		{
		$this->db->where('products_desc.year >=', $yearfrom);
		}
		if($yearto!="0")
		{
		$this->db->where('products_desc.year <=', $yearto);
		}
		if($pricefrom!="0")
		{
		$this->db->where('products_desc.price >=', $pricefrom);
		}
		if($priceto!="0")
		{
		$this->db->where('products_desc.price >=', $priceto);
		}
		if($useType!="0")
		{
		$this->db->where('products_desc.type =', $useType);
		}
		if($keyword!="")
		{
		$this->db->like('title', $keyword);
		$this->db->like('kilometer', $keyword); 
		$this->db->like('year', $keyword); 
		$this->db->like('milage', $keyword); 
		$this->db->like('engine', $keyword); 
		$this->db->like('fuel_type', $keyword); 
		$this->db->like('color', $keyword); 
		$this->db->like('transmission', $keyword); 
		$this->db->like('drive_type', $keyword); 
		$this->db->like('short_desc', $keyword); 
		$this->db->like('desc', $keyword); 
		$this->db->like('feat', $keyword); 
		}
		$this->db->where('products.status =', 'Y');
		$this->db->where('language =', $this->session->userdata('front_language'));
		$query = $this->db->get();
		
//		$sql = "select * from products join products_desc on(products.id=products_desc.contents_id) where 1 and ";
//		if($val[0]!="")
//		{
//		$sql.="products_desc.location_id = ? and ";
//		}
//		if($val[1]!="")
//		{
//		$sql.="products_desc.make_id = ? and ";
//		}
//		if($val[2]!="")
//		{
//		$sql.="products_desc.model_id = ? and ";
//		}
//		if($val[3]!="")
//		{
//		$sql.="products_desc.categoryid = ? and ";
//		}
//		if($val[4]!="")
//		{
//		$sql.="products_desc.year >= ? and ";
//		}
//		if($val[5]!="")
//		{
//		$sql.="products_desc.year <= ? and ";
//		}
//		if($val[6]!="")
//		{
//		$sql.="products_desc.price >= ? and ";
//		}
//		if($val[7]!="")
//		{
//		$sql.="products_desc.price <= ? and ";
//		}
//		if($val[8]!="")
//		{
//		$sql.="products_desc.type = ? and ";
//		}
//
//		$sql .= " products.status='Y' and language= '".$this->session->userdata('front_language')."' "; 
//
//
//		$query = $this->db->query($sql,array($val[0],$val[1],$val[2],$val[3],$val[4],$val[5],$val[6],$val[7],$val[8]));
		//$query = $this->db->query($sql,array($val[0],$val[1],$val[2],$val[3]));
		//echo $this->db->last_query();
        return $query->num_rows();

	}

}

/*$sql .= " union all "; 

		$sql .= "select CONCAT('seminarsandwebinars/index/',seminars.id) as url, seminars_desc.name  as title, seminars_desc.desc  as short_desc, 'seminars' from seminars join seminars_desc on(seminars.id=seminars_desc.seminars_id) where seminars_desc.name like ? and seminars_desc.desc like ? and seminars.status='Y' and language= '".$this->session->userdata('front_language')."'";

		$sql .= " union all "; 

		$sql .= "select CONCAT('faqs/index/',faqs.id) as url, faqs_desc.question  as title, faqs_desc.answer as short_desc, 'faqs' from faqs join faqs_desc on(faqs.id=faqs_desc.faqs_id) where faqs_desc.question like ? and faqs_desc.answer like ? and faqs.status='Y' and language= '".$this->session->userdata('front_language')."'";

		

		,'%'.$keyword.'%','%'.$keyword.'%','%'.$keyword.'%','%'.$keyword.'%'

		*/