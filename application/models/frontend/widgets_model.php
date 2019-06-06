<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Widgets_model extends CI_Model {
    function __construct()
    {
        parent::__construct();
		$this->lang_table_name='languages';
		$this->table_name='widgets';
		$this->desc_table_name='widgets_desc';
		$this->primary_key ='id';
		$this->foreign_key='widgets_id';
    }
	
	function get_array()
	{
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
	
	function load_footer()
	{
		//$id=$this->db->escape_str($id);
		$cond=array('widget_type'=>'menu');
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
	
	function get_widgets($conds='')
	{
		$data=array();
		foreach($conds as $cond):
			$this->db->where('key',$cond);
			$this->db->where('status','Y');
			$this->db->from($this->table_name);
			$this->db->join($this->desc_table_name, "$this->desc_table_name.$this->foreign_key = $this->table_name.$this->primary_key");
			$this->db->where('language',$this->session->userdata('front_language'));
			$query = $this->db->get();
			$data[$cond]=$query->row();
		endforeach;
		return $data;
	}
	
	function get_rightwidgets()
	{
		$this->db->where('status','Y');
		$this->db->where('widget_position','right');
		$this->db->from($this->table_name);
		$this->db->join($this->desc_table_name, "$this->desc_table_name.$this->foreign_key = $this->table_name.$this->primary_key");
		$this->db->where('language',$this->session->userdata('front_language'));
		$this->db->order_by('sort_order','ASC');
		$query = $this->db->get();
        return $query->result_array();
	}
	
	function get_leftwidgets()
	{
		$this->db->where('status','Y');
		$this->db->where('widget_position','left');
		$this->db->from($this->table_name);
		$this->db->join($this->desc_table_name, "$this->desc_table_name.$this->foreign_key = $this->table_name.$this->primary_key");
		$this->db->where('language',$this->session->userdata('front_language'));
		$this->db->order_by('sort_order','ASC');
		$query = $this->db->get();
        return $query->result_array();
	}
	function get_footerwidgets()
	{
		$this->db->where('status','Y');
		$this->db->where('widget_position','footer');
		$this->db->from($this->table_name);
		$this->db->join($this->desc_table_name, "$this->desc_table_name.$this->foreign_key = $this->table_name.$this->primary_key");
		$this->db->where('language',$this->session->userdata('front_language'));
		$this->db->order_by('sort_order','ASC');
		$query = $this->db->get();
        return $query->result_array();
	}
	
	function get_pagewidgets($pagewidgets)
	{
		if(trim($pagewidgets)!=''){
			$pagewidgets = explode(',',$pagewidgets);
			foreach($pagewidgets as $pagewidget):
				$pagewidgetarr=explode(':',$pagewidget);
				if(isset($widget_ids[$pagewidgetarr[1]])){
					$sort =$pagewidgetarr[1]+1;
				} else {
					$sort =$pagewidgetarr[1];
				}
				$widget_ids[$sort]=$pagewidgetarr[0];
			endforeach;
			ksort($widget_ids);
			$widget_ids=implode(',',array_values($widget_ids));
			$sql = "SELECT * FROM (`widgets`) JOIN `widgets_desc` ON `widgets_desc`.`widgets_id` = `widgets`.`id` WHERE id in ($widget_ids) and `status` =  'Y' AND `widget_position` =  'left' AND `language` =  ? ORDER BY FIELD(id, $widget_ids)";
			$query = $this->db->query($sql,array($this->session->userdata('front_language')));
			return $query->result_array();
		} else {
			$this->db->where('status','Y');
			$this->db->where('widget_position','left');
			$this->db->from($this->table_name);
			$this->db->join($this->desc_table_name, "$this->desc_table_name.$this->foreign_key = $this->table_name.$this->primary_key");
			$this->db->where('language',$this->session->userdata('front_language'));
			$this->db->order_by('sort_order','ASC');
			$query = $this->db->get();
			return $query->result_array();
		}
	}
}