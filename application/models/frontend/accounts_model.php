<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Accounts_model extends CI_Model {
    function __construct()
    {
        parent::__construct();
		$this->lang_table_name='languages';
		$this->table_name='accounts';
		$this->desc_table_name='accounts_desc';
		$this->primary_key ='id';
		$this->foreign_key='accounts_id';
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
		$query = $this->db->get();
        return $query->result_array();
	}
	
	function get_array_cond($cond)
	{
		$this->db->where($cond);
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
	
	function get_row_cond($cond)
	{
		$this->db->where($cond);
		$this->db->from($this->table_name);
		$this->db->join($this->desc_table_name, "$this->desc_table_name.$this->foreign_key = $this->table_name.$this->primary_key");
		$this->db->where('language',$this->session->userdata('front_language'));
		$query = $this->db->get();
        return $query->row();
	}
	
	function get_idpair()
	{
		$idpair=array();
		$this->db->from($this->table_name);
		$this->db->join($this->desc_table_name, "$this->desc_table_name.$this->foreign_key = $this->table_name.$this->primary_key");
		$this->db->where('language',$this->session->userdata('front_language'));
		$query = $this->db->get();
        foreach($query->result_array() as $row):
			$idpair[$row['id']]=$row['name'];
		endforeach;
		return $idpair;
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
		$accountsquery = $this->db->get('features');
        foreach($accountsquery->result_array() as $row):
			$rowdata['features_id']=$row['id'];
			$rowdata['accounts_id']=$prime;
			$this->db->insert('account_features',$rowdata);
			$secondprime=$this->db->insert_id();
			unset($rowdata);
			foreach($query->result_array() as $row):
				$rowdata['featurevalue']='';
				$rowdata['account_features_id']=$secondprime;
				$rowdata['language']=$row['code'];
				$this->db->insert('account_features_desc',$rowdata);
				unset($rowdata);
			endforeach;	
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
		$this->db->where('accounts_id',$id);
		$accountsquery = $this->db->get('account_features');
        foreach($accountsquery->result_array() as $row):
			$accountdesccond=array('account_features_id'=>$row['id']);
			$this->db->delete('account_features_desc',$accountdesccond);
		endforeach;
		$accountcond=array('accounts_id'=>$id);
		$this->db->delete('account_features',$accountcond);
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
	
	function account_features($id)
	{
		$this->db->from('account_features');
		$this->db->join('account_features_desc', "account_features.id = account_features_desc.account_features_id");
		$this->db->where('language',$this->session->userdata('front_language'));
		$this->db->where('accounts_id',$id);
		$query = $this->db->get();
        return $query->result_array();
	}
	function featuresupdate($maindata,$descdata,$id)
	{
		$cond['id']=$id;
		$desccond['account_features_id']=$id;
		$desccond['language']=$this->session->userdata('front_language');
		if(count($descdata)>0){
			$this->db->update('account_features_desc',$descdata,$desccond);
		}
		return $this->db->update('account_features',$maindata,$cond);
	}
	
	function get_featured($limit='3')
	{
		$this->db->limit($limit);
		$this->db->where('status','Y');
		$this->db->where('featured','Y');
		$this->db->from($this->table_name);
		$this->db->join($this->desc_table_name, "$this->desc_table_name.$this->foreign_key = $this->table_name.$this->primary_key");
		$this->db->where('language',$this->session->userdata('front_language'));
		$this->db->order_by('sort_order','ASC');
		$query = $this->db->get();
        return $query->result_array();
	}
	
	function get_account_features($accountid='')
	{
		$featurevals=$this->get_account_feature_values();
		$accounts=$this->get_active();
		if($accountid!=''){ $colspan=2; } else { $colspan=count($accounts)+1; }
		$feature_str='';
		$this->load->model('frontend/featurecategory_model');
		$this->load->model('frontend/features_model');
		$fcats=$this->featurecategory_model->get_array_cond(array('status'=>'Y','parent_id'=>'0'));
		foreach($fcats as $fcat):
			$feature_str .='<tr><td style="border:none;" colspan="'.$colspan.'" align="left" valign="middle" bgcolor="#0084cb"><h2>'.$fcat['name'].'</h2></td></tr>';
			$features=$this->features_model->get_array_cond(array('category_id'=>$fcat['id']));			
			if(count($features)>0){			
			foreach($features as $feature):				
				$feature_str .='<tr><td align="left" valign="middle" bgcolor="#FFFFFF"><p>'.$feature['name'].' </p></td>';
				if($accountid!=''){
				$featureobj=$featurevals[$accountid][$feature['id']];
					if($featureobj['status']=='Y'){ if($featureobj['featureobjvalue']!=''){ $featvalue='<b>'.$featureobj['featureobjvalue'].' </b>'; } else { $featvalue='<a><img src="'.base_url('public/frontend/images/true.png').'"> </a>'; } } else { $featvalue='<a><img src="'.base_url('public/frontend/images/false.png').'"></a>'; }
					$feature_str .='<td align="center" valign="middle" bgcolor="#e6f2f9">'.$featvalue.'</td>';
				} else {
					$fi='0'; foreach($accounts as $account): $fi++; if($fi%2==0){ $bgcolor='#FFFFFF'; } else {$bgcolor='#e6f2f9';}
						$featureobj=$featurevals[$account['id']][$feature['id']];
						if($featureobj['status']=='Y'){ if($featureobj['featureobjvalue']!=''){ $featvalue='<b>'.$featureobj['featureobjvalue'].' </b>'; } else { $featvalue='<a><img src="'.base_url('public/frontend/images/true.png').'"> </a>'; } } else { $featvalue='<a><img src="'.base_url('public/frontend/images/false.png').'"></a>'; }
						$feature_str .='<td align="center" valign="middle" bgcolor="'.$bgcolor.'">'.$featvalue.'</td>';
					endforeach;
				}
				$feature_str .='</tr>';
			endforeach;
			}			
			$fchilds=$this->featurecategory_model->get_array_cond(array('status'=>'Y','parent_id'=>$fcat['id']));
			if(count($fchilds)>0){
				foreach($fchilds as $fchild):
					$feature_str .='<tr><td style="border:none;" colspan="'.$colspan.'" align="left" valign="middle" bgcolor="#d4e7f2"><h3>'.$fchild['name'].' </h3></td></tr>';
					$features=$this->features_model->get_array_cond(array('category_id'=>$fchild['id']));
					if(count($features)>0){
					foreach($features as $feature):
						$feature_str .='<tr><td align="left" valign="middle" bgcolor="#FFFFFF"><p>'.$feature['name'].' </p></td>';
						if($accountid!=''){
						$featureobj=$featurevals[$accountid][$feature['id']];
							if($featureobj['status']=='Y'){ if($featureobj['featureobjvalue']!=''){ $featvalue='<b>'.$featureobj['featureobjvalue'].' </b>'; } else { $featvalue='<a><img src="'.base_url('public/frontend/images/true.png').'"> </a>'; } } else { $featvalue='<a><img src="'.base_url('public/frontend/images/false.png').'"></a>'; }
							$feature_str .='<td align="center" valign="middle" bgcolor="#e6f2f9">'.$featvalue.'</td>';
						} else {
							$fi='0'; foreach($accounts as $account): $fi++; if($fi%2==0){ $bgcolor='#FFFFFF'; } else {$bgcolor='#e6f2f9';}
								$featureobj=$featurevals[$account['id']][$feature['id']];
								if($featureobj['status']=='Y'){ if($featureobj['featureobjvalue']!=''){ $featvalue='<b>'.$featureobj['featureobjvalue'].' </b>'; } else { $featvalue='<a><img src="'.base_url('public/frontend/images/true.png').'"> </a>'; } } else { $featvalue='<a><img src="'.base_url('public/frontend/images/false.png').'"></a>'; }
								$feature_str .='<td align="center" valign="middle" bgcolor="'.$bgcolor.'">'.$featvalue.'</td>';
							endforeach;
						}
						$feature_str .='</tr>';
					endforeach;
					}
				endforeach;
			}	   
	   endforeach;	  
	   return $feature_str;
	}
	function get_account_feature_values()
	{
		$featurevals=array();
		$this->db->from('account_features');
		$this->db->join('account_features_desc', "account_features.id = account_features_desc.account_features_id");
		$this->db->where('language',$this->session->userdata('front_language'));
		$query = $this->db->get();
        foreach($query->result_array() as $result):
			$featurevals[$result['accounts_id']][$result['features_id']]['featureobjvalue']=$result['featurevalue'];
			$featurevals[$result['accounts_id']][$result['features_id']]['status']=$result['status'];
		endforeach;
		return $featurevals;
	}
}