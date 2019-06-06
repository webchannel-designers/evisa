<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Faculty_model extends CI_Model {
    function __construct()
    {
        parent::__construct();
		$this->course_table_name='courses';
		$this->role_table_name='faculty';
		$this->roles_foreign_key = 'stu_id';
		$this->primary_key ='stu_id';;
		/*$this->permission_table_name='permissions';
		$this->access_table_name='role_access';
		$this->primary_key ='id';
		$this->permissions_foreign_key='permissions_id';
		$this->roles_foreign_key = 'roles_id';*/
    }
	
	function get_array()
	{
		$query = $this->db->get($this->role_table_name);
        return $query->result_array();
	}
	
	function get_array_limit($limit)
	{
		$this->db->limit($limit);
		$query = $this->db->get($this->role_table_name);
        return $query->result_array();
	}
	
	function load($id)
	{
		$id=$this->db->escape_str($id);
		$cond=array('id'=>$id);
		$this->db->where($cond);
		$query = $this->db->get($this->role_table_name);
        return $query->row();
	}
	
	function get_row_cond($cond)
	{
		$this->db->where($cond);
		$query = $this->db->get($this->role_table_name);
        return $query->row();
	}
	
	function login_check($user,$pass)
	{
		$user=$this->db->escape_str($user);
		$pass=$this->db->escape_str($pass);
		$pass=md5($pass);
		$cond=array('username'=>$user,'password'=>$pass,'status'=>'Y');
		$this->db->where($cond);
		$query = $this->db->get($this->role_table_name);
        $result = $query->num_rows();
		if($result>0){
			return true;
		} else {
			return false;
		}
	}
	function update1($data,$cond)
	{
		return $this->db->update($this->role_table_name,$data,$cond);
	}
	function username_check($user)
	{
		$user=$this->db->escape_str($user);
		$cond=array('username'=>$user);
		$this->db->where($cond);
		$query = $this->db->get($this->role_table_name);
        $result = $query->num_rows();
		if($result>0){
			return true;
		} else {
			return false;
		}
	}
	
function getemailaction()
   {
      
   $this->receivername=$this->input->post('fname');
   $this->receiveremail=$this->input->post('email');
   $username=$this->input->post('username');
   $last_name=$this->input->post('lname');
   $password=$this->input->post('password');
	//$this->message=$this->input->post('msg');
	//$this->url=$this->input->post('link');
	
	
	@$query1 = $this->db->get_where('admin', array('id' => 1));
	 if($query1->num_rows()>0)
	 {
	  $row_link=$query1->row_array();
	  $admin_user=$row_link['username'];
	$admin_email=$row_link['email'];
	 }
	
	  $subject = "ECUC - Signup Details";
	
	$createdOn = date('Y-m-d h:i:s');
	  
	  $ip = $_SERVER['REMOTE_ADDR'];
	  
	 
	$to = $this->receiveremail;
	$sub = $subject;
	$message ='<table style="margin:0 auto; padding:0px;font-family:\'Trebuchet MS\', Arial, Helvetica, sans-serif; font-size:13px; color:#09C; line-height:25px; border:solid 1px #e6f4ff;" width="600">
				  <tr>
					<td width="592">
					<img src="'.site_url().'images/email_head.gif" border="0" /></td>
				  </tr>
				  <tr>
					<td>
					<span style="color:#000;"> <b>Hi &nbsp;'. $this->receivername.'&nbsp;,</b></span>
					</td>
				  </tr>
				  <tr>
					<td>
					<span style="color:#000;">Signup Details for ECUC website</span>
					</td>
				  </tr>
				   <tr>
				   <td>Username : 
					<span style="color:#000;">'.$username.'</span>
					</td>
				  </tr>
				   <tr>
				   <td>Password : 
					<span style="color:#000;">'.$password.'</span>
					</td>
				  </tr>
				 				 
				 
				  <tr>
					<td colspan="2" style="width:592px; height:29px; float:left" ><img src="'.base_url().'images/email_footer.gif" alt="footer" /></td>
				  </tr>
				</table>';
				
$headers 	= "From:  ".$admin_email."\r\n";
$headers   .= 'MIME-Version: 1.0' . "\r\n";
$headers   .= 'Content-type: text/html; charset=utf-8' . "\r\n";
	if(mail($to,$sub,$message,$headers))
	{
	return "success";
		
	}else
	{
	return "Mail can't be sent";
	}
  }
 
   
 
	function insert($data)
	{
		$this->db->insert($this->role_table_name,$data);
		return $this->db->insert_id();
	}
	
	function update($data,$cond)
	{
		return $this->db->update($this->role_table_name,$data,$cond);
	}
	
	function delete($cond)
	{
		return $this->db->delete($this->role_table_name,$cond);
	}
	
	function get_pagination_count($cond='')
    {
        $this->db->select('*');
		if(is_array($cond) && count($cond)>0){
		$this->db->where($cond);
		}
        $this->db->from($this->role_table_name);
        $query = $this->db->get();
        return $query->num_rows();
    }
	
	function get_pagination($num, $offset, $cond='')
    {
        $this->db->select('*');
		if(is_array($cond) && count($cond)>0){
		$this->db->where($cond);
		}
		//$this->db->select("$this->table_name.*,$this->role_table_name.stu_id");    
		$this->db->select("$this->role_table_name.*");
        $this->db->from($this->role_table_name);
		//$this->db->join($this->role_table_name, "$this->role_table_name.$this->roles_foreign_key = $this->table_name.$this->roles_foreign_key",'left');
		$this->db->limit($num, $offset);
        $query = $this->db->get();
        return $query->result_array();
    }
	function code_exists($code,$id)
	{
		$this->db->where('username',$code);
		$this->db->where('id !=',$id);
		$query = $this->db->get($this->role_table_name);
        $result = $query->num_rows();
		if($result>0){
			return true;
		} else {
			return false;
		}
	}
	function password_check($code)
	{
		$this->db->where('password',md5($code));
		$this->db->where('id',$this->session->userdata('admin_id'));
		$query = $this->db->get($this->table_name);
        $result = $query->num_rows();
		if($result>0){
			return true;
		} else {
			return false;
		}
	}
	function get_roles_array()
	{
		$query = $this->db->get($this->role_table_name);
        return $query->result_array();
	}
function get_courses()
	{
		$query = $this->db->get($this->course_table_name);
        return $query->result_array();
	}
	function get_permission_array()
	{
		$query = $this->db->get($this->permission_table_name);
        return $query->result_array();
	}
	function get_access_array($cond)
	{
		$this->db->select("$this->permissions_foreign_key");
		$this->db->where($cond);
		$query = $this->db->get($this->access_table_name);
        return $query->result_array();
	}
	
	function permission_access($data)
	{
		return $this->db->insert($this->access_table_name,$data);
	}
	
	function clear_access($cond)
	{
		return $this->db->delete($this->access_table_name,$cond);
	}
	
	function check_permission($cond)
	{
		$this->db->select("$this->permissions_foreign_key");
		$this->db->where($cond);
		$query = $this->db->get($this->permission_table_name);
        return $query->row();
	}
	
	function check_access($cond)
	{
		$this->db->where($cond);
		$query = $this->db->get($this->access_table_name);
        return $query->num_rows();
	}
}