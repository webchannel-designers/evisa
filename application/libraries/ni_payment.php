<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * CodeIgniter Network DIREC Pay integration library
 *
 * Perform transactions using http://network.ae/ 
 *
 * @package        	CodeIgniter
 * @subpackage    	Libraries
 * @category    	Libraries
 * @author        	Sumi Sudishkumar
 
 */
class Ni_payment
{
	/**
	 * Code Igniter instance
	 * @var object
	 */
	private $_ci;

	/**
	 * Debug flag, you can $this->ni_direct->debug = true; or $this->ni_direct->set_options(array('debug'=>true));
	 * @var boolean
	 */
	public $debug = false;

	/**
	 * Store configuration data
	 * @var array
	 */
	private $_config = array();
    private $_prefix = "DRON"; //--- ned to change when go live
	/**
	 * SagePay NOT valid response codes
	 * @var array
	 */
	protected $_invalid_response_statuses = array(
													'ERROR',
													'INVALID',
													'REJECTED',
													'MALFORMED',
													'NOTAUTHED',
												 );

	public function __construct()
	{
		$this->_ci =& get_instance();
		log_message('debug', 'NI Payment Class Initialized');


		//Load config
		$this->_ci->load->config('ni_direct');

		$this->_config = $this->_ci->config->item('ni_direct');

		// Load the cURL spark
	//	$this->_ci->load->spark('curl/1.2.0');

		// Load needed CI helpers
	//	$this->_ci->load->helper('string');
	//	$this->_ci->load->helper('inflector');
	}

	/**
	 * Options setter
	 * @param array $options
	 * @return void
	 */
    public function set_options($options = array())
    {
		if( count($options) ){
			$this->_config = array_merge($this->_config, $options);

			if( array_key_exists('debug', $options) === TRUE ){
				$this->debug = (bool)$options['debug'];
			}

		}
    }
    
    /**
	 * Config  get ni config value
	 * @param string $option
	 * @return string
	 */
    public function get_config_value($option)
    {
	//	if( count($options) ){
		//	$this->_config = array_merge($this->_config, $options);

			if( array_key_exists($option, $this->_config) === TRUE ){
				return $this->_config[$option];
			}

	//	}
    }
    /**
     * Prepare the encrypted request string to NI Payment
     * @param array
     * @return string
     * */
    public function prepareRequest($params){       
      $success_url=$params['baseurl']. $this->_config['success_url'];
      $failure_url=$params['baseurl']. $this->_config['failure_url'];
      
         	$text  = $this->_prefix."-".$params['policyrefno']."|{$this->_config['currency']}|{$params['netpay']}|{$success_url}|{$failure_url}|01|INTERNET|||||||{$params['customerfname']}|{$params['customerlname']}|{$params['customeraddress']}||{$params['customercity']}|{$params['customerstate']}|{$params['customerpobox']}|AE|{$params['customeremail']}||||||||||||||||||||||||FALSE|{$params['qid']}|bbb|ccc|ddd|eee| ";
     //echo $text;
            $text1 =    $text; 
        	$enc   =    $this->_config['enc'];
	        $key   =    $this->_config['enc_key'];
            $mode  =    MCRYPT_MODE_CBC;
	        $iv    =    $this->_config['iv'];
            $merchantId=$this->_config['merchant_id'];
	     	$size  = mcrypt_get_block_size($enc, $mode);
	        $pad   = $size - (strlen($text1) % $size);
	        $padtext = $text1 . str_repeat(chr($pad), $pad);

	        $crypt = mcrypt_encrypt($enc, base64_decode($key), $padtext, $mode, $iv);
            $requestParameter=base64_encode($crypt);
            
          /*  $padtext = mcrypt_decrypt($enc, base64_decode($key), $crypt, $mode, $iv);

	$pad = ord($padtext{strlen($padtext) - 1});
	if ($pad > strlen($padtext)) return false;
	if (strspn($padtext, $padtext{strlen($padtext) - 1}, strlen($padtext) - $pad) != $pad) {
		$text = "Error";
	}
	$text = substr($padtext, 0, -1 * $pad);


	echo '<b>After Decryption:</b> '.$text;*/

            return $requestParameter;
    }
    
    /**
     * Process the response string from NI Payment
     * @param string
     * @return array
     * */
    public function decryptResponse($encString){
            $reponseParameters  = explode("|",$encString); 
            $EncText            = base64_decode($encString);
            $enc   =    $this->_config['enc'];
	        $key   =    $this->_config['enc_key'];
            $mode  =    MCRYPT_MODE_CBC;
	        $iv    =    $this->_config['iv'];
            $merchantId=$this->_config['merchant_id'];
            $padtext            = mcrypt_decrypt($enc, base64_decode($key), $EncText, $mode, $iv);

            $pad                = ord($padtext{strlen($padtext) - 1});
            if ($pad > strlen($padtext)) return false;
                if (strspn($padtext, $padtext{strlen($padtext) - 1}, strlen($padtext) - $pad) != $pad) {
	               $text = "Error";
            }
            $text           = substr($padtext, 0, -1 * $pad);
            $responseArry   = explode("|",$text);
            $firstparam = $responseArry[0];
            $ordid      = str_replace($this->_prefix."-","",$firstparam);
            $responseArry[0] = $ordid;
            return $responseArry;
    }
}