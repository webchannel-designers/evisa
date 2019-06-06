<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Cart extends Cmcfront_Controller {
	public function __construct()
	{
		parent::__construct();
		//load model
		//$this->load->model('frontend/gymnasium_model');
		$this->load->model('frontend/products_model');
		$this->load->model('frontend/productcategory_model');
        $this->load->library('cart');
		/*if($this->session->userdata('gymuserkey')!="") {
		redirect('/');	
		}*/
		
	}

	public function index(){
		$this->load->library('cart');
		
		$main['shoppingcart'] = $this->cart->contents();
		$main['total'] = $this->cart->total();
		$main['step'] = 'first';
		//echo "<pre>";print_r($main);
		$frontcontent=$this->load->view('frontend/cart/checkout',$main,true);
		$main['meta']=$this->frontmetahead();
		$main['contents']=$this->frontcontent($frontcontent);
		$main['header']=$this->frontheader();
		$main['footer']=$this->frontfooter();
		$this->load->view('frontend/main',$main);
	}
	
	function checkout($step='first'){
		$this->load->library('cart');
		
		$main['shoppingcart'] = $this->cart->contents();
		$main['total'] = $this->cart->total();
		$main['step'] = $step;
			$this->load->model('frontend/userregister_model');
		   	$user_id = $this->session->userdata('user_id');
			$cond=array('id'=>$user_id);
		$main['userdetails'] =$this->userregister_model->get_row_cond($cond);
		//echo "<pre>";print_r($main);
		$frontcontent=$this->load->view('frontend/cart/checkout',$main,true);
		$main['meta']=$this->frontmetahead();
		//$main['contents']=$this->frontcontent($frontcontent);
		$main['contents']=$frontcontent;
		$main['header']=$this->frontheader();
		$main['footer']=$this->frontfooter();
		$this->load->view('frontend/main',$main);
	}
	
	public function orders($step=''){
		
		$this->load->library('cart');
		
		$main['shoppingcart'] = $this->cart->contents();
		$main['total'] = $this->cart->total();
		$main['step'] = $step;
			
		//echo "<pre>";print_r($main);
		$frontcontent=$this->load->view('frontend/cart/myorders',$main,true);
		$main['meta']=$this->frontmetahead();
		$main['contents']=$this->frontcontent($frontcontent);
		$main['header']=$this->frontheader();
		$main['footer']=$this->frontfooter();
		$this->load->view('frontend/main',$main);
	}
	
	public function buy($id="")
	{
		$id=$this->input->post('id');
		$this->load->library('cart');
		$this->load->model('frontend/gallery_model');
		$img = $this->gallery_model->get_array_cond($id);
		$product = $this->products_model->load($id);
		@$qty=isset($_REQUEST['qty'])?$_REQUEST['qty']:1;
		$data = array(
               'id'      => @$product->id,
               'qty'     => @$qty,
               'price'   => 100,
               'name'    => @$product->title,
			   'options' => array('image' => @$product->image)
            );

		$this->cart->insert($data); 
		$this->load->view('frontend/cart/viewcart');
		//$main['meta']=$this->frontmetahead();
		//$main['contents']=$this->frontcontent($frontcontent);
		//$main['contents']=$frontcontent;
		//$main['header']=$this->frontheader();
		//$main['footer']=$this->frontfooter();
		//$this->load->view('frontend/main',$main);
	}
	
	public function delete($rowid="")
	{
		$rowid=$this->input->post('id');
		$this->load->library('cart');

		$this->cart->update(array('rowid'=>$rowid,'qty'=>0)); 
		$this->load->view('frontend/cart/viewcart');
		//$main['meta']=$this->frontmetahead();
		//$main['contents']=$this->frontcontent($frontcontent);
		//$main['contents']=$frontcontent;
		//$main['header']=$this->frontheader();
		//$main['footer']=$this->frontfooter();
		//$this->load->view('frontend/main',$main);
	}
	
	public function updatecart()
	{
		$this->load->library('cart');
		$i=1;
		
		foreach($this->cart->contents() as $items)
		{
			$this->cart->update(array('rowid'=>$items['rowid'],'qty'=>$_POST['qty'.$i]));
			//echo $_POST['qty'.$i].",";
			$i++;
		}
		//$this->cart->update(array('rowid'=>$rowid,'qty'=>0)); 
		$frontcontent=$this->load->view('frontend/cart/viewcart',@$main,true);
		$main['meta']=$this->frontmetahead();
		//$main['contents']=$this->frontcontent($frontcontent);
		$main['contents']=$frontcontent;
		$main['header']=$this->frontheader();
		$main['footer']=$this->frontfooter();
		$this->load->view('frontend/main',$main);
	}
	
	public function clear()
	{
		$this->load->library('cart');
		$this->cart->destroy();
		//$this->cart->update(array('rowid'=>$rowid,'qty'=>0)); 
		$frontcontent=$this->load->view('frontend/cart/viewcart',@$main,true);
		$main['meta']=$this->frontmetahead();
		//$main['contents']=$this->frontcontent($frontcontent);
		$main['contents']=$frontcontent;
		$main['header']=$this->frontheader();
		$main['footer']=$this->frontfooter();
		$this->load->view('frontend/main',$main);
	}
	
	public function add()
	{
		//echo '<pre>';	print_r($_POST );
		$gymid = $this->input->post('gymid');
		
		if($this->input->post('package_passid'))   
		$passid= $this->input->post('package_passid');
		else
		$passid = $this->input->post('passid');
		
		if($gymid && $passid) {
		
		$quantity =1;
		//pass.discount_type,pass.discount,pass.price,pass.pass_type,slug,title
		$packagedata = $this->gymnasium_model->load_gympass('*',$gymid,$passid);
		//print_r($packagedata);
		
		//$this->cart->product_options(rowid);
		$this->cart->total_items();
		if($this->cart->total_items()>0)
			{
			$cart_info =$this->cart->contents();
			// print_r($cart_info);
			
			//print_r($cart_info[0]['id'] );exit;
			foreach( $cart_info as $id => $cart)
			{	
						$cart_ids[]=$cart['id'];
						$cart_rowids[$cart['id']][]=$cart['rowid'];		
			 }
			
			//print_r($cart_rowids['5_1'][0]);exit;
			  $currentGymPassId =trim($gymid.'_'.$passid);
			  
			//echo $cart_info[$cart_rowids[$currentGymPassId][0]]['price'];exit;
			       if(in_array($currentGymPassId,$cart_ids)){
						$price = $cart_info[$cart_rowids[$currentGymPassId][0]]['price'];
						$qty = $cart_info[$cart_rowids[$currentGymPassId][0]]['qty']+1;
						$amount = $price * $qty;
						$rowid=$cart_info[$cart_rowids[$currentGymPassId][0]]['rowid'];
						
						$data = array( 'rowid'   => $rowid,
										'price'   => $price,
										'amount' =>  $amount,
										'qty'     => $qty
									);
									
						$this->cart->update($data);
						} 
						else {
								$insert_data = array(
								   'id'      => $currentGymPassId,
								   'qty'     => $quantity,
								   'price'   => $packagedata->price,
								   'name'    => $packagedata->pass_title,
								   'gym_name'=> $packagedata->gym_name
								   
								);
								
							$this->cart->insert($insert_data);
						
			 		  }
				
			}else{
			//
		  $insert_data = array(
               'id'      => trim($gymid.'_'.$passid),
			   'qty'     => $quantity,
               'price'   => $packagedata->price,
               'name'    => $packagedata->pass_title,
			   'gym_name'    => $packagedata->gym_name
            );
		    //$this->cart->destroy();
			/*if($this->cart->total_items()>0)
			{
				$this->cart->update();
			}else{}*/
		    $this->cart->insert($insert_data);
			}
			
		}
		//print_r($cart['gymdetails']);
		$cart['cartitems'] =$this->cart->contents();
		$cart['total'] =$this->cart->total();
		$this->load->view('frontend/cart/add',$cart);
		
	}
	   
	public function remove(){ 
		
			 $row_id = $this->input->post('item_id');
				if($row_id) {
					$data = array(
						'rowid'   => $row_id,
						'qty'     => 0
						);
		
				$this->cart->update($data);
				
				}
				
				echo 'Success';
		}
	   
	  public function emptycart(){ 
			
		$this->cart->destroy();
		redirect('cart/checkout');
		echo 'Success';
		}
	   
	    function viewcart(){ 
		
			$cart['cartitems'] =$this->cart->contents();
			$cart['total'] =$this->cart->total();
			$this->load->view('frontend/cart/viewcart',$cart);
			
		}
	   
	    function update(){ 
		
			$cart_info =$this->cart->contents();
			$row_id = $this->input->post('item_id');
			$row_count_previous = $this->input->post('item_count_previous');
			$row_count = $this->input->post('item_count');
			$price = $cart_info[$row_id]['price'];
			$amount =  $row_count*$price;
			if($row_id) {
			$data = array( 'rowid'   => $row_id,
						   'price'   => $price,
						   'amount' =>  $amount,
						   'qty'     => $row_count
						);
		
			$this->cart->update($data);
			
			}
				
			$cart_info =$this->cart->contents();
			
			echo 'Success';
		}
	   
	    function pending(){ 
			
			$list['email']=$this->alphasettings['ADMIN_EMAIL'];
			$list['phone']=$this->alphasettings['PHONE'];
			$frontcontent=$this->load->view('frontend/cart/fail',$list,true);
			$main['meta']=$this->frontmetahead();
			$main['contents']=$this->frontcontent($frontcontent);
			$main['header']=$this->frontheader();
			$main['footer']=$this->frontfooter();
			$this->load->view('frontend/main',$main);
		 }
	   
	    function fail(){ 
			
			$list['email']=$this->alphasettings['ADMIN_EMAIL'];
			$list['phone']=$this->alphasettings['PHONE'];
			$frontcontent=$this->load->view('frontend/cart/fail',$list,true);
			$main['meta']=$this->frontmetahead();
			$main['contents']=$this->frontcontent($frontcontent);
			$main['header']=$this->frontheader();
			$main['footer']=$this->frontfooter();
			$this->load->view('frontend/main',$main);

	    }
}
