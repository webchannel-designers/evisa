<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/* Author: Jorge Torres
 * Description: Login model class
 */
class Login_model extends CI_Model{
    function __construct(){
        parent::__construct();
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
	
	function create_slug($title)

	{

		$slug=url_title($title);

  		$slug=sanitizeStringForUrl($slug);

		//$slug=sanitizeStringForUrl($title);

		$this->db->where('slug',$slug);

		$this->db->from('products');

		$this->db->join('products_desc', "products_desc.contents_id = products.id");

		$this->db->where('language','en');

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

		$this->db->insert('products',$maindata);

		$prime=$this->db->insert_id();

		$query = $this->db->get('languages');

        foreach($query->result_array() as $row):

			$rowdata=$descdata;

			$rowdata[$this->foreign_key]=$prime;

			$rowdata['language']=$row['code'];

			$this->db->insert('products_desc',$rowdata);

			unset($rowdata);

		endforeach;		

		return $prime;

	}
	 
}
?>

