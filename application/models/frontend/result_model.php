<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Result_model extends CI_Model {

    function __construct()

    {

        parent::__construct();

    }

	

	function get_results($keyword,$start,$limit)

	{

		$sql = "select CONCAT('contents/view/',contents.slug) as url, contents_desc.title  as title, contents_desc.short_desc  as short_desc, 'contents' from contents join contents_desc on(contents.id=contents_desc.contents_id) where (contents_desc.title like ? or contents_desc.short_desc like ? or contents_desc.desc like ?) and contents.status='Y' and language= '".$this->session->userdata('front_language')."'";

		$sql .= " union all "; 

		$sql .= "select CONCAT('careers/details/',jobs.slug) as url, jobs_desc.title  as title, jobs_desc.short_desc  as short_desc, 'jobs' from jobs join jobs_desc on(jobs.id=jobs_desc.jobs_id) where (jobs_desc.title like ? or jobs_desc.short_desc like ? or jobs_desc.desc like ?) and jobs.status='Y' and language= '".$this->session->userdata('front_language')."'";
		
		$sql .= " union all "; 

		$sql .= "select CONCAT('news/view/',news.slug) as url, news_desc.title  as title, news_desc.short_desc  as short_desc, 'news' from news join news_desc on(news.id=news_desc.contents_id) where (news_desc.title like ? or news_desc.short_desc like ? or news_desc.desc like ?) and news.status='Y' and language= '".$this->session->userdata('front_language')."'";
		
		$sql .= " union all "; 

		$sql .= "select CONCAT('products/view/',products.slug) as url, products_desc.title  as title, products_desc.short_desc  as short_desc, 'products' from products join products_desc on(products.id=products_desc.contents_id) where (products_desc.title like ? or products_desc.short_desc like ? or products_desc.desc like ?) and products.status='Y' and language= '".$this->session->userdata('front_language')."'";

		$sql .= " LIMIT $start,$limit "; 

		$query = $this->db->query($sql,array('%'.$keyword.'%','%'.$keyword.'%','%'.$keyword.'%','%'.$keyword.'%','%'.$keyword.'%','%'.$keyword.'%','%'.$keyword.'%','%'.$keyword.'%','%'.$keyword.'%','%'.$keyword.'%','%'.$keyword.'%','%'.$keyword.'%','%'.$keyword.'%','%'.$keyword.'%','%'.$keyword.'%','%'.$keyword.'%','%'.$keyword.'%'));

		//echo $this->db->last_query();exit;

        return $query->result_array();

	}

	

	function get_results_count($keyword)

	{

		$sql = "select CONCAT('contents/view/',contents.slug) as url, contents_desc.title  as title, contents_desc.short_desc  as short_desc, 'contents' from contents join contents_desc on(contents.id=contents_desc.contents_id) where (contents_desc.title like ? or contents_desc.short_desc like ? or contents_desc.desc like ?) and contents.status='Y' and language= '".$this->session->userdata('front_language')."'";

		$sql .= " union all "; 

		$sql .= "select CONCAT('careers/details/',jobs.slug) as url, jobs_desc.title  as title, jobs_desc.short_desc  as short_desc, 'jobs' from jobs join jobs_desc on(jobs.id=jobs_desc.jobs_id) where (jobs_desc.title like ? or jobs_desc.short_desc like ? or jobs_desc.desc like ?) and jobs.status='Y' and language= '".$this->session->userdata('front_language')."'";
		
		$sql .= " union all "; 

		$sql .= "select CONCAT('news/view/',news.slug) as url, news_desc.title  as title, news_desc.short_desc  as short_desc, 'news' from news join news_desc on(news.id=news_desc.contents_id) where (news_desc.title like ? or news_desc.short_desc like ? or news_desc.desc like ?) and news.status='Y' and language= '".$this->session->userdata('front_language')."'";
		
		$sql .= " union all "; 

		$sql .= "select CONCAT('products/view/',products.slug) as url, products_desc.title  as title, products_desc.short_desc  as short_desc, 'products' from products join products_desc on(products.id=products_desc.contents_id) where (products_desc.title like ? or products_desc.short_desc like ? or products_desc.desc like ?) and products.status='Y' and language= '".$this->session->userdata('front_language')."'";

		$query = $this->db->query($sql,array('%'.$keyword.'%','%'.$keyword.'%','%'.$keyword.'%','%'.$keyword.'%','%'.$keyword.'%','%'.$keyword.'%','%'.$keyword.'%','%'.$keyword.'%','%'.$keyword.'%','%'.$keyword.'%','%'.$keyword.'%','%'.$keyword.'%','%'.$keyword.'%','%'.$keyword.'%','%'.$keyword.'%','%'.$keyword.'%','%'.$keyword.'%'));
		
        return $query->num_rows();

	}

}

/*$sql .= " union all "; 

		$sql .= "select CONCAT('seminarsandwebinars/index/',seminars.id) as url, seminars_desc.name  as title, seminars_desc.desc  as short_desc, 'seminars' from seminars join seminars_desc on(seminars.id=seminars_desc.seminars_id) where seminars_desc.name like ? and seminars_desc.desc like ? and seminars.status='Y' and language= '".$this->session->userdata('front_language')."'";

		$sql .= " union all "; 

		$sql .= "select CONCAT('faqs/index/',faqs.id) as url, faqs_desc.question  as title, faqs_desc.answer as short_desc, 'faqs' from faqs join faqs_desc on(faqs.id=faqs_desc.faqs_id) where faqs_desc.question like ? and faqs_desc.answer like ? and faqs.status='Y' and language= '".$this->session->userdata('front_language')."'";

		

		,'%'.$keyword.'%','%'.$keyword.'%','%'.$keyword.'%','%'.$keyword.'%'

		*/