<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Process extends Einsurance_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
     
    function __construct()
    {

        parent::__construct();
	   	$this->lang_name=$this->session->userdata('front_language');
        $this->load->library('user_agent');

    }
     
   function processpayment(){   
       // $this->outputCache();
        $this->load->model('policies_model');
        $this->load->model('quotes_model');
        $this->load->library('ni_payment'); 
        $this->load->model('insurer_model');
    
        if(isset($_REQUEST['responseParameter'])){
           
            $response     = $_REQUEST['responseParameter'];
           
            $responseArry = $this->ni_payment->decryptResponse($response);
            //    print_r($responseArry);
            $firstparam = $responseArry[0];
            //  $ordid      = str_replace("t-","",$firstparam);
            $ordid      = $firstparam;
            /// --- update payment status 
            $ne_tranno  = $responseArry[1];
            $amount     = $responseArry[3];
            $clientip   = $_SERVER['REMOTE_ADDR'];
            $status     = $responseArry[4];
            $paymentlog = array("policy_id"=>$ordid,"amount"=>$amount,"client_ip"=>$clientip,"ni_order_no"=>$ne_tranno,"payment_status"=>$status);
            //paymentlog
            $this->policies_model->paymentlog($paymentlog);
            
            if($status=="SUCCESS"){
            
                //---- email customer & insurer
            }
                   
            $process['status'] = $status;
            $process['policyid'] = $ordid;
            $process['rta_msg'] = $rtaMessage;
            $this->session->set_userdata($process);
           
            redirect('process/thankyou');
        }
        else{
       // $rtaData= $this->input->post();
        $main['meta']=$this->frontmetahead();	
        $contents=$this->contents_model->get_row_cond(array('slug'=>'buy-now'));
		
		if(!$contents){redirect('pagenotfound');}
        
		if($contents->title!=''){$this->pagetitle=$contents->title; }
        
		if($contents->meta_desc!=''){$this->desc=$contents->meta_desc; }
        
		if($contents->keywords!=''){$this->keys=$contents->keywords; }
	
        $main['mobilemenu'] = $this->frontmobilemenu();
        
        $process = array();
        $qid                = trim($this->input->post('quoteid'));
       
        if($qid>0){
      
            $customername 		= $policyDt['customername'];
            $parts 				= explode(" ", $customername);
            $customerlname 		= array_pop($parts);
            $customerfname 		= implode(" ", $parts);
            $customeraddress                    = preg_replace('/[^A-Za-z0-9]/', '', $customeraddress); 
            $paymentParams['policyrefno']       = $policyDt['policyrefno'];
            $paymentParams['netpay']            = $policyDt['netpay'];   
            $paymentParams['lang']              = $this->session->userdata('front_language');
            $paymentParams['customerfname']     = $customerfname;
            $paymentParams['customerlname']     = $customerlname;
            $paymentParams['customeraddress']   = $customeraddress;
            $paymentParams['customercity']      = preg_replace('/[^A-Za-z0-9]/', '',$customercity);
            $paymentParams['customerstate']     = $customerstate;
            $paymentParams['customerpobox']     = $customerpobox;
            $paymentParams['customeremail']     = $customeremail;
            $paymentParams['qid']               = $qid;
            $paymentParams['baseurl']           = $this->config->item('base_url').$this->session->userdata('front_language')."/";
           // print_r($paymentParams);
            $requestParameter                   = $this->ni_payment->prepareRequest($paymentParams);  
            //$params = $paymentParams;
            //echo $text  = "testorder-".$params['policyrefno']."|{$this->_config['currency']}|{$params['netpay']}|{$this->_config['success_url']}|{$this->_config['failure_url']}|01|INTERNET|||||||{$params['customerfname']}|{$params['customerlname']}|{$params['customeraddress']}||{$params['customercity']}|{$params['customerstate']}|{$params['customerpobox']}|AE|{$params['customeremail']}||||||||||||||||||||||||FALSE|{$params['qid']}|bbb|ccc|ddd|eee| ";
           //          echo  $requestParameter;
            $process['merchantId']              = $this->ni_payment->get_config_value('merchant_id');
            $process['payment_url']             = $this->ni_payment->get_config_value('payment_url');
            $process['requestParameter']        = $requestParameter;
         
     	    $frontcontent=$this->load->view('frontend/ni_payment/paymentform',$process,true);

		    $main['contents']=$this->frontcontent($frontcontent,false);

		   $main['header']=$this->frontheader();

	   	   $main['footer']=$this->frontfooter(true);

		   $this->load->view('frontend/main',$main);
		}
        }else{
            echo "Invalid Information Submitted";
        }
     }
  
   public function paymentsuccess(){   
        $this->load->library('ni_payment');
        $this->load->model('policies_model');
        if(isset($_REQUEST['responseParameter'])){
        $response       = $_REQUEST['responseParameter'];
        $responseArry   = $this->ni_payment->decryptResponse($response);
          // print_r($responseArry);
      
            $firstparam = $responseArry[0];
            $ordid      = $firstparam;//str_replace("t-","",$firstparam);
            /// --- update payment status 
            $ne_tranno  = $responseArry[1];
            $amount     = $responseArry[3];
            $clientip   = $_SERVER['REMOTE_ADDR'];
            $status     = $responseArry[4];
            $process['erdetails'] = '';
            
            $paymentlog = array("policy_id"=>$ordid,"amount"=>$amount,"client_ip"=>$clientip,"ni_order_no"=>$ne_tranno,"payment_status"=>$status);
            
            $this->policies_model->paymentlog($paymentlog);
            
            if($status=="SUCCESS"){
             
                $process['policyid'] =$ordid;
      
            }else{
                 $process['erdetails'] = $responseArry[9];
            }
            
            $process['status'] = $status;
            $process['tranno'] = $ne_tranno;
            }
            else{
                 $process['status'] = 'FAILED';
                 $process['tranno'] = "N/A";
            }
       
			$this->session->set_userdata($process);
            redirect('process/thankyou');
      
   }
    
    public function thankyou(){
        $this->load->model('policies_model');
        $main['meta']       = $this->frontmetahead();	
        
        $contents=$this->contents_model->get_row_cond(array('slug'=>'buy-now'));
		
		if(!$contents){redirect('pagenotfound');}
        
		if($contents->title!=''){$this->pagetitle=$contents->title; }
        
		if($contents->meta_desc!=''){$this->desc=$contents->meta_desc; }
        
		if($contents->keywords!=''){$this->keys=$contents->keywords; }
        
	
        $main['mobilemenu'] = $this->frontmobilemenu();
        $process = array();
		$process['contents'] =	$contents;	
        $process['erdetails'] = '';
        $status = $this->session->userdata('status');
        if(!$this->session->userdata('returl')){
            $returl = "";
        }else{            
            $returl = $this->session->userdata('returl');
        }
        
        if($status=='SUCCESS')
        {
            $orderid            = $this->session->userdata('policyid'); 
            $policyObj          = $this->policies_model->get_policy_full($orderid,'en'); 
            $process['refno']   = $policyObj->policy_ref_no;
            $process['period']  = date("d/m/Y",strtotime($policyObj->policy_start_date)). " - ". date("d/m/Y",strtotime($policyObj->policy_end_date));
            $process['policy']  = $policyObj;  
            $process['status'] = $this->session->userdata('status');
            $process['rta_msg']= $this->session->userdata('rta_msg');
        }else{
            $process['erdetails'] =    $this->session->userdata('erdetails'); 
            $process['status'] = $this->session->userdata('status');
            $process['tranno'] = $this->session->userdata('ne_tranno');
        }
        $process['returl'] = $returl;
        $frontcontent=$this->load->view('frontend/process/success',$process,true);

		$main['contents']=$this->frontcontent($frontcontent,false);

		$main['header']=$this->frontheader();

		$main['footer']=$this->frontfooter(true);

		$this->load->view('frontend/main',$main);
    }
  
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */