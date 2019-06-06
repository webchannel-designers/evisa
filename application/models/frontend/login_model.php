<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* Author: Jorge Torres
 * Description: Login model class
 */
class Login_model extends CI_Model{
	
    function __construct(){
		
        parent::__construct();
		
		$this->lang_table_name='languages';

		$this->table_name='events';

		$this->desc_table_name='events_desc';

		$this->primary_key ='id';

		$this->foreign_key='contents_id';
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

		if($this->session->userdata('order_field')!='' && $this->session->userdata('sort_field')!=''){

			$this->db->order_by($this->session->userdata('sort_field'), $this->session->userdata('order_field'));

		}

		$this->db->limit($num, $offset);

        $this->db->from($this->table_name);

		$this->db->join($this->desc_table_name, "$this->desc_table_name.$this->foreign_key = $this->table_name.$this->primary_key");

		$this->db->where('language','en');
		
		//$this->db->where('uid',$this->session->userdata('userid'));
		
		//echo $this->db->last_query();
		
		$query = $this->db->get();

        return $query->result_array();

    }
	
	function get_pagination2($num, $offset, $cond='')

    {

        $this->db->select('*');

		if(is_array($cond) && count($cond)>0){

		$this->db->where($cond);

		}

		$this->db->limit($num, $offset);

        $this->db->from('comments');

		//$this->db->join($this->desc_table_name, "$this->desc_table_name.$this->foreign_key = $this->table_name.$this->primary_key");

		//$this->db->where('language',$this->session->userdata('admin_language'));

		$query = $this->db->get();
		
		//echo $this->db->last_query();exit;

        return $query->result_array();

    }
	
	function get_fields()

	{

		return array('title'=>'Title','slug'=>'Slug');

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

		$this->db->where('language','en');
		
		//$this->db->where('uid',$this->session->userdata('userid'));
		
		//echo $this->db->last_query();

		$query = $this->db->get();

        return $query->num_rows();

    }
	
	function get_pagination_count2($cond='')

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

        $this->db->from('comments');

		//$this->db->join($this->desc_table_name, "$this->desc_table_name.$this->foreign_key = $this->table_name.$this->primary_key");

		//$this->db->where('language',$this->session->userdata('admin_language'));

		$query = $this->db->get();
		
        return $query->num_rows();

    }
	
	function forgot($id='')

    {

        $this->db->from('users');

		//$this->db->join($this->desc_table_name, "$this->desc_table_name.$this->foreign_key = $this->table_name.$this->primary_key");

		//$this->db->where('language',$this->session->userdata('admin_language'));
		
		$this->db->where('email',$id);
		
		//echo $this->db->last_query();

		$query = $this->db->get();

        return $query->num_rows();

    }
	
	function get_image($id='')

    {

        $this->db->from('gallery1');

		//$this->db->join($this->desc_table_name, "$this->desc_table_name.$this->foreign_key = $this->table_name.$this->primary_key");

		//$this->db->where('language',$this->session->userdata('admin_language'));
		
		$this->db->where('parent_id',$id);
		
		//echo $this->db->last_query();

		$query = $this->db->get();

        return $query->row();

    }
	
	function forgotmail($id='')

    {

        $this->db->from('users');

		//$this->db->join($this->desc_table_name, "$this->desc_table_name.$this->foreign_key = $this->table_name.$this->primary_key");

		//$this->db->where('language',$this->session->userdata('admin_language'));
		
		$this->db->where('email',$id);
		
		//echo $this->db->last_query();

		$query = $this->db->get();

        return $query->row();

    }
	
	public function validate(){
	
        // grab user input
      
        $username = $this->security->xss_clean($this->input->post('username'));
        $password = $this->security->xss_clean($this->input->post('password'));
        // Prep the query
		$this->db->from('users');
        $this->db->where('email', $username);
        $this->db->where('password', md5($password));
        $this->db->where('is_active', 'Y');
		$query = $this->db->get();
		        // Let's check if there are any results
        if($query->num_rows == 1)
        {
            // If there is a user, then create session data
            $row = $query->row();
            $data = array(
                    'userid' => $row->id,
                    'fname' => $row->fname,
                    'email' => $row->email,
                    'validated' => true
                    );
            $this->session->set_userdata($data);
            return true;
        }
        // If the previous process did not validate
        // then return false.
        return false;
    } 
	
	function updateall($maindata,$cond)

	{
		
		$this->db->where($cond);
		$this->db->update('gallery1',$maindata);

	}
	
	function deleteimg($id)

	{

		//$desccond=array($this->primary_key=>$id);

		//$this->db->delete($this->table_name,$desccond);
		
		$this->db->from('gallery1');
//
//
//		$this->db->where('language',$this->session->userdata('admin_language'));

		$this->db->where('id',$id);
//		
		$query = $this->db->get();
		
//		
		$path = $query->row();
		
		//print_r($path);
		if(file_exists("./public/uploads/gallery/".$path->image))
		{
//		
		unlink("./public/uploads/gallery/".$path->image);
		
		}
		
		$cond=array('id'=>$id);

		return $this->db->delete('gallery1',$cond);

	}
	
	function make_active($id)

	{

		//$desccond=array($this->primary_key=>$id);

		//$this->db->delete($this->table_name,$desccond);
		
		//$this->db->from('users');
//
//
//		$this->db->where('language',$this->session->userdata('admin_language'));

		$this->db->where('key',$id);
		
		return $this->db->update('users', array('is_active'=>'Y')); 
			
		//$query = $this->db->get();
		
//		
		//$path = $query->row();
		
		//print_r($path);
		//if(file_exists("./public/uploads/gallery/".$path->image))
		//{
//		
		//unlink("./public/uploads/gallery/".$path->image);
		
		//}
		
		//$cond=array('id'=>$id);

		//return $this->db->delete('gallery1',$cond);

	}
	
	function updateimg($maindata,$descdata,$id)

	{
		
		$this->db->where('id', $id);
		
		$this->db->update('gallery1',$descdata);

		//$prime=$this->db->insert_id();

		//$query = $this->db->get($this->lang_table_name);

        //foreach($query->result_array() as $row):

			//$rowdata=$descdata;

			//$rowdata[$this->foreign_key]=$prime;

			//$rowdata['language']=$row['code'];

			//$this->db->insert($this->table_name,$rowdata);

			//unset($rowdata);

		//endforeach;		

		//return $prime;

	}
	
	function get_array_cond($id)

	{

		$id=$this->db->escape_str($id);

		$cond=array('parent_id'=>$id);

		$this->db->where($cond);

		$this->db->from('gallery1');

		//$this->db->join($this->desc_table_name, "$this->desc_table_name.$this->foreign_key = $this->table_name.$this->primary_key");

		$this->db->where('language',$this->session->userdata('admin_language'));

		$query = $this->db->get();

        return $query->result_array();

	}
	
	function insertimg($maindata,$descdata)

	{

		$this->db->insert('gallery1',$descdata);

		$prime=$this->db->insert_id();

		//$query = $this->db->get($this->lang_table_name);

        //foreach($query->result_array() as $row):

			//$rowdata=$descdata;

			//$rowdata[$this->foreign_key]=$prime;

			//$rowdata['language']=$row['code'];

			//$this->db->insert($this->table_name,$rowdata);

			//unset($rowdata);

		//endforeach;		

		return $prime;

	}
	
	function load($id)

	{

		$id=$this->db->escape_str($id);

		$cond=array('slug'=>$id);

		$this->db->where($cond);

		$this->db->from($this->table_name);

		$this->db->join($this->desc_table_name, "$this->desc_table_name.$this->foreign_key = $this->table_name.$this->primary_key");

		$this->db->where('language',$this->session->userdata('admin_language'));

		$query = $this->db->get();
		
		//echo $this->db->last_query();

        return $query->row();

	}
	
	function load2($id)

	{

		$id=$this->db->escape_str($id);

		$cond=array('id'=>$id);

		$this->db->where($cond);

		$this->db->from('users');

		//$this->db->join($this->desc_table_name, "$this->desc_table_name.$this->foreign_key = $this->table_name.$this->primary_key");

		//$this->db->where('language',$this->session->userdata('admin_language'));

		$query = $this->db->get();

        return $query->row();

	}
	
	function loadcomment($id)

	{

		$id=$this->db->escape_str($id);

		$cond=array('id'=>$id);

		$this->db->where($cond);

		$this->db->from('comments');

		$query = $this->db->get();

        return $query->row();

	}
	
	function create_slug($title)

	{

		$slug=url_title($title);

  		$slug=sanitizeStringForUrl($slug);

		//$slug=sanitizeStringForUrl($title);

		$this->db->where('slug',$slug);

		$this->db->from($this->table_name);

		$this->db->join($this->desc_table_name, "$this->desc_table_name.$this->foreign_key = $this->table_name.$this->primary_key");

		$this->db->where('language',$this->session->userdata('admin_language'));

		$query = $this->db->get();

        $result = $query->num_rows();

		if($result>0){

			return $slug.date('ymdhis');

		} else {

			return $slug;

		}

	}

	function update_slug($slug,$id)

	{

   		$slug=url_title($slug);

  		$slug=sanitizeStringForUrl($slug);

		//$slug=sanitizeStringForUrl($slug);

		$this->db->where('slug',$slug);

		$this->db->where('id !=',$id);

		$this->db->from($this->table_name);

		$this->db->join($this->desc_table_name, "$this->desc_table_name.$this->foreign_key = $this->table_name.$this->primary_key");

		$this->db->where('language',$this->session->userdata('admin_language'));

		$query = $this->db->get();

        $result = $query->num_rows();

		if($result>0){

			return $slug.date('ymdhis');

		} else {

			return $slug;

		}

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

		$desccond['language']=$this->session->userdata('admin_language');

		if(count($descdata)>0){

			$this->db->update($this->desc_table_name,$descdata,$desccond);

		}

		return $this->db->update($this->table_name,$maindata,$cond);
		
	}
	
	function updatecomment($maindata,$descdata,$id)

	{

		$cond[$this->primary_key]=$id;

		return $this->db->update('comments',$descdata,$cond);

	}
	
	function delete($id)

	{

		$desccond=array($this->foreign_key=>$id);

		$this->db->delete($this->desc_table_name,$desccond);
		
		//echo $this->db->last_query();exit;

		$cond=array('id'=>$id);
		//$this->db->delete($this->table_name,$cond);
		//echo $this->db->last_query();exit;
		return $this->db->delete($this->table_name,$cond);

	}
	
	function deletecomment($id)

	{

		//$desccond=array($this->foreign_key=>$id);

		//$this->db->delete('comments',$desccond);
		
		//echo $this->db->last_query();exit;

		$cond=array('id'=>$id);
		//$this->db->delete($this->table_name,$cond);
		//echo $this->db->last_query();exit;
		return $this->db->delete('comments',$cond);

	}
	 
}
?>