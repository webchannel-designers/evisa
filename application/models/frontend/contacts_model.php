<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Contacts_model extends CI_Model {
    function __construct()
    {
        parent::__construct();
		$this->lang_table_name='languages';
		$this->table_name='contacts';
		$this->desc_table_name='contacts_desc';
		$this->primary_key ='id';
		$this->foreign_key='contacts_id';
    }
	
	function get_array()
	{
		$this->db->from($this->table_name);
		$this->db->join($this->desc_table_name, "$this->desc_table_name.$this->foreign_key = $this->table_name.$this->primary_key");
		$this->db->where('language',$this->session->userdata('front_language'));
		$this->db->order_by('sort_order','ASC');
		$query = $this->db->get();
        return $query->result_array();
	}
	function get_active()
	{
		$this->db->where('status','Y');
		$this->db->from($this->table_name);
		$this->db->join($this->desc_table_name, "$this->desc_table_name.$this->foreign_key = $this->table_name.$this->primary_key");
		$this->db->where('language',$this->session->userdata('front_language'));
		$this->db->order_by('sort_order','ASC');
		$query = $this->db->get();
        return $query->result_array();
	}
	
	function get_array_limit($limit)
	{
		$this->db->limit($limit);
		$this->db->from($this->table_name);
		$this->db->join($this->desc_table_name, "$this->desc_table_name.$this->foreign_key = $this->table_name.$this->primary_key");
		$this->db->where('language',$this->session->userdata('front_language'));
		$this->db->order_by('sort_order','ASC');
		$query = $this->db->get();
        return $query->result_array();
	}
	function getemailaction()
	{
	$err ="";
$link ="";
if($link=="") {$link = $_SERVER['HTTP_REFERER'];}
//if($_POST)
//{
  
	  $this->name =$this->input->post('txtName');
	  $this->email = $this->input->post('txtMail');
	  $this->phoneno = $this->input->post('txtPh');
	  $this->country = $this->input->post('country');
	  $this->subject = $this->input->post('txtSub');
	  $this->message = $this->input->post('txtMsg');
	  $text_code = $this->input->post('txtCode');
	  $link = $this->input->post('link');
	  $query = $this->db->get_where('admin',array('username'=>'admin'));
	 $row=$query->row();
	 $resrow=$query->row();
	  $crow=$query->row_array();
	$admin=$crow['email'];
	if( $_SESSION['code'] == $text_code && !empty($_SESSION['code'])) 
 	 {
	 
	  $createdOn = date('Y-m-d h:i:s');
	  
	  //$ip = $_SERVER['REMOTE_ADDR'];
	  
	
	$to = $admin;
	
	$message ='<table style="margin:0 auto; padding:0px; font-family: SegoeUINormal ,Arial ,Helvetica ,sans-serif; font-size:13px; color:#000; line-height:25px; border:solid 1px #ccc;" width="594">
				  <tr style=" background-color:#fff;">
					<td width="592" style="border-bottom:1px solid #ccc; background-color:#fff;padding:3px;" >
					<img src="'.base_url().'public/frontend/images/logo.png" border="0" /></td>
				  </tr>
				  <tr>
					<td>
					</td>
				  </tr>
				  <tr>
					<td>
					Subject	: '.$this->subject.'<br>
					Name 	: '.$this->name.'<br>
					Email 	: '.$this->email.'<br>
					Phone	: '.$this->phoneno.'<br>
					Message	: '.$this->message.'<br>
					</td>
				  </tr>
				  <tr>
					<td>
					</td>
				  </tr>
				  <tr style=" background-color:#00568C">
					<td style="width:594px; height:29px; float:left; color:#fff;" >
					&copy;Copyright '.date('Y').' ECUC. All Rights Reserved
					</td>
				  </tr>
				</table>';
				
$headers 	= "From:  $email\r\n";
$headers   .= 'MIME-Version: 1.0' . "\r\n";
$headers   .= 'Content-type: text/html; charset=utf-8' . "\r\n";
	if(mail($to,$this->subject,$this->message,$headers))
	{
	return "success";
	/*echo "<script language='javascript'>window.parent.location.reload(true);</script>";*/
	}else
	{
	return "Mail can't be sent";
	}
  }
  else
  {
	return 'Invalid security code. Try again';
  }
//}
	
	}
	
	function getemail()
   {
   $this->db->from($this->table_name);
		$this->db->join($this->desc_table_name, "$this->desc_table_name.$this->foreign_key = $this->table_name.$this->primary_key");
		$this->db->where('language',$this->session->userdata('front_language'));
		$query = $this->db->get();
        return $query->row();
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
	
	function get_row_cond()
	{
		//$this->db->where($cond);
		$this->db->from($this->table_name);
		$this->db->join($this->desc_table_name, "$this->desc_table_name.$this->foreign_key = $this->table_name.$this->primary_key");
		$this->db->where('language',$this->session->userdata('front_language'));
		$this->db->order_by('sort_order','ASC');
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
		$this->db->order_by('sort_order','ASC');
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
		$this->db->order_by('sort_order','ASC');
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
	function get_contacts($category=NULL)
	{
		$this->db->where('status','Y');
		if(!empty($category))
		$this->db->where('category_id',$category);
		$this->db->order_by('sort_order','ASC');
		$this->db->from($this->table_name);
		$this->db->join($this->desc_table_name, "$this->desc_table_name.$this->foreign_key = $this->table_name.$this->primary_key");
		$this->db->where('language',$this->session->userdata('front_language'));
		$query = $this->db->get();
        return $query->result_array();
	}
}