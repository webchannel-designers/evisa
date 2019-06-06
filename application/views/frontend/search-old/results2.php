<div class="col-md-12 wrap-product-list <?php if(count($pagelists)==0) { ?>no-data<?php } ?>" >
             <ul class="product-wrapper" data-equal="li > div">
					<?php
					
                    if(count($pagelists)>0) {
                    $i=1;
                    foreach($pagelists as $pagelist): 
                    //print_r($pagelist);
                    //$this->load->model('frontend/login_model');
                    //$proIm=$this->login_model->get_image($pagelist['id']);
                    //echo $pagelist['id'];
					$this->load->model('frontend/gallery_model');
                    $loc=$this->location_model->load($pagelist['location_id']);
                    $img = $this->gallery_model->get_array_cond($pagelist['id']);
                    //print_r($loc);
                    @$pimage=$img->image;
                    if($pimage!="")
                    {
                    $url = base_url('public/uploads/gallery/'.$pimage);
                    }
                    else
                    {
                    $url = base_url('public/frontend/images/noimage.jpg');
                    }
                    ?>
             
				<li class="col-md-4">
					<div class="product-box">
						<div class="pr-image"><a href="<?php echo site_url('products/view/'.$pagelist['slug']); ?>"><img src="<?php echo base_url('public/frontend/timthumb/scripts/timthumb.php?src='); ?><?php echo $url."&w=282&h=224&zc=2"; ?>" alt="product1" /></a></div>
						<h3><?php echo word_limiter($pagelist['title'],3); ?></h3>
						<h6><?php echo $pagelist['short_desc']; ?></h6>
						<div class="pr-btns">
							<a class="add-enq-btn" onclick="cartform('<?php echo $pagelist['id']; ?>')">Add to Enquiry Basket</a>
							<a class="pr-det-btn" href="<?php echo site_url('products/view/'.$pagelist['slug']); ?>">View Details</a>
						</div>						
					</div>
                </li>
<?php 
$i++;
endforeach; 
?>
<?php

} else {

echo convert_lang('No Records Found!',$this->alphalocalization);

} 
?>
                
				</ul>
                <?php
				if(count($pagelists)>9)
				{
				?>
<div class="wrap-click"><a href="" class="view-pro-click">View more</a></div>          
<?php
				}
?>      
			 </div>
 
             <script language="javascript">
$( document ).ready(function() {
    $('.view-pro-click').click(function(){
				$(this).toggleClass('view-pro-click2');
				$('.wrap-product-list').toggleClass("wrap-product-list-2",'slow');
				return false;
			});
});			 
			 </script>