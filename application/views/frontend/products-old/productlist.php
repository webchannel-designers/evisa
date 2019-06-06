<section class="content-main"> 
  <div class="container">
  <h2 data-appear-animation="fadeInUp" data-appear-animation-delay="200"><?php echo stripslashes($this->pagetitle); ?></h2>
 <div class="head-wrap"> 
   <div class="row">	
    <div class="col-md-8">
		  <ol class="breadcrumb">
			<?php 

			$i=0; foreach($this->breadcrumbarr as $link => $text): $i++;			

			if($i==1){$attr=' class="home"';} else {$attr='';}?>
				<li<?php echo $attr; ?>><?php if($link=='nolink' or $text=='Products'){ echo '<a href="javascript:void(0);">'.$text.'</a>'; } else { echo anchor($link,$text); } ?></li>

			<?php endforeach; ?>
            
			</ol> 
	</div>
	<div class="col-md-4">
	  <div class="pull-right right-side-icon"><a href="#" class="st_sharethis" ></a><a class="fancybox fancybox.iframe mail-icon" href='<?php echo site_url('home/emailurl')?>?lightbox[iframe]=true&lightbox[width]=406&lightbox[height]=305'> </a><!--<a href="#" class="print-icon"></a>--></div>
	</div>
	</div>
	</div>
    
<div class="tabbable boxed parentTabs">	
	<div class="container">
	<div class="row">
    <ul class="nav nav-tabs nav-main-tab">
							<?php
							//$lists['catid']=$this->productcategory_model->get_row_cond(array('slug'=>$id));
									
							//$lists['procategory']=$this->products_model->get_array_cond(array('category_id'=>$lists['catid']->id));
									
							//foreach($lists['procategory'] as $products)
							//{
							//	$img[] = $this->gallery_model->get_array_cond($products['id']);
							//}
							
							//$lists['proimages'] = $img;
                            $i=1;
                            foreach($procategory as $productscat):
                            //print_r($productscat);
                            $catname=$productscat['title'];
                            //$desc=$productscat['desc'];
                            $desc=word_limiter(strip_tags($productscat['desc']), 1);
                            $proIm=$this->gallery_model->get_array_cond($productscat['id']);
                            //print_r($proIm);
                            $slug=$productscat['slug'];
                            $lists['catid2']=$this->productcategory_model->get_row_cond(array('slug'=>$slug));
                            //print_r($lists['catid2']);
                            $lists['procategory2']=$this->products_model->get_array_cond(array('category_id'=>@$lists['catid2']->id));
                            //echo $lists['catid2']->id;
                            //print_r($lists['procategory2']);
                            //echo $lists['procategory2'][0]['category_id'];
                            ?>
      <li <?php if($i==1) { ?> class="active"<?php } ?>><a href="#main-tab<?php echo $i; ?>" role="tab" data-toggle="tab"><span class="prod-actv-tab actv-tab-main"></span><?php echo stripslashes($catname); ?></a></li>
							  <?php
                              $i++;
                              endforeach;
                              ?>
    </ul>
   </div>
   </div>
  
    <div class="tab-content">
    
							<?php
							//$lists['catid']=$this->productcategory_model->get_row_cond(array('slug'=>$id));
									
							//$lists['procategory']=$this->products_model->get_array_cond(array('category_id'=>$lists['catid']->id));
									
							//foreach($lists['procategory'] as $products)
							//{
							//	$img[] = $this->gallery_model->get_array_cond($products['id']);
							//}
							
							//$lists['proimages'] = $img;
                            $i=1;
							$j=11;
                            foreach($procategory as $productscat):
                            //print_r($productscat);
                            $catname=$productscat['title'];
                            //$desc=$productscat['desc'];
                            $desc=word_limiter(strip_tags($productscat['desc']), 1);
                            $proIm=$this->gallery_model->get_array_cond($productscat['id']);
                            $slug=$productscat['slug'];
                            $lists['catid2']=$this->productcategory_model->get_row_cond(array('slug'=>$slug));
                            //print_r($lists['catid2']);
                            $lists['procategory2']=$this->products_model->get_array_cond(array('category_id'=>@$lists['catid2']->id));
                            //echo $lists['catid2']->id;
                            //print_r($lists['procategory2']);
                            //echo $lists['procategory2'][0]['category_id'];
                            ?>
  <?php
  if(!empty($proIm))
  {
	  $pimage=$proIm[0]['image'];
	  $url = base_url('public/uploads/gallery/'.$pimage);
  ?>
  <!--<img src="<?php echo base_url('public/uploads/gallery/'.$pimage); ?>" width="214" height="187" alt="" />-->
  <?php
  }
  else if(!empty($lists['procategory2']))
  {
	  $pimage=$lists['catid2']->image;
	  $url = base_url('public/uploads/products/'.$pimage);
  ?>
  <!--<img src="<?php echo base_url('public/uploads/products/'.$pimage); ?>" width="214" height="187" alt="" />-->
  <?php
  }
  else
  {
	  $url = base_url('public/frontend/images/noimage.jpg');
  ?>
  <!--<img src="<?php echo base_url('public/frontend/images/noimage.jpg'); ?>" width="214" height="187" alt="" />-->
  <?php
  }
  ?>
    
        <div class="tab-pane fade <?php if($i==1) { ?> active in<?php } ?>" id="main-tab<?php echo $i; ?>">
            <div class="tabbable">
			   <div class="product-carousel products-inner" data-nav="fp_nav_" data-plugin-options='{"itemsCustom" : [[992,4],[768,2],[100,1]], "singleItem" : false, "navigation":true}'>
							
							<div class="container">	
							<ul class="ch-grid">
							<?php
							if(empty($lists['procategory2']))
							{
							?>
								<li data-appear-animation="bounceInRight" data-appear-animation-delay="300" class="active">
								 <!--<span class="prod-actv-tab actv-tab-mid"></span>-->	
								 <a href="#" onclick="window.location='<?php echo site_url('products/view/'.$slug)?>'">	
								   						   
									<div class="ch-item" style="background-image:url(<?php echo $url; ?>);">
										<div class="ch-info">											
										</div>
									</div>
									
									<div class="prod-info">										
										<?php echo stripslashes($catname); ?>										
									  </div>
									</a>
																		
								</li>
                                <?php
							}
							else
							{
								foreach($lists['procategory2'] as $cat)
								{
									 $proIm=$this->gallery_model->get_array_cond($cat['id']);
									  if(!empty($proIm))
									  {
									  $pimage=$proIm[0]['image'];
									  }
									  else
									  {
									  $pimage="";
									  }
									  if($pimage!="")
									  {
									  $url = base_url('public/uploads/gallery/'.$pimage);
									  }
									  else
									  {
	  								  $url = base_url('public/frontend/images/noimage.jpg');
									  }
								?>
								<li data-appear-animation="bounceInRight" data-appear-animation-delay="300" class="active">
								 <!--<span class="prod-actv-tab actv-tab-mid"></span>-->	
								 <a href="#" onclick="window.location='<?php echo site_url('products/view/'.$cat['slug'])?>'" >	
								   						   
									<div class="ch-item" style="background-image:url(<?php echo $url; ?>);">
										<div class="ch-info">											
										</div>
									</div>
									
									<div class="prod-info">										
										<?php echo stripslashes($cat['title']); ?>										
									  </div>
									</a>
																		
								</li>
                                <?php
								}
							}
								?>	
					
								
				             </ul>		
							 	  
						  </div>
						
						</div>	
							
						</div>			
				<!--<div class="prod-full-width">
                <div class="tab-content">
                    <div class="tab-pane fade <?php if($j==11) { ?> active in<?php } ?>" id="sub<?php echo $j; ?>" >
                       
                    </div>
					
                </div>
            </div>-->		 	
			</div>
            
							  <?php
							  $j++;
                              $i++;
                              endforeach;
                              ?>
            
    </div>
</div>    
    
    <script language="javascript">
		function showHint(str)
		{
		if (str.length==0)
		  {
		  document.getElementById("subview").innerHTML="";
		  return;
		  }
		var xmlhttp=new XMLHttpRequest();
		xmlhttp.onreadystatechange=function()
		  {
		  if (xmlhttp.readyState==4 && xmlhttp.status==200)
			{
			document.getElementById("subview").innerHTML=xmlhttp.responseText;
			}
		  }
		xmlhttp.open("GET","<?php echo site_url('products/view/chemical-tanks')?>",true);
		xmlhttp.send();
		}
	</script>
    
   <!--<div class="row">
    <div class="col-md-8 col-sm-8 inner-content">                
<div class="contentdiv commmon-left">
<?php
foreach($procategory as $productscat):
//print_r($productscat);
$catname=$productscat['title'];
//$desc=$productscat['desc'];
$desc=word_limiter(strip_tags($productscat['desc']), 1);
$proIm=$this->gallery_model->get_array_cond($productscat['id']);
//print_r($proIm);
$slug=$productscat['slug'];
$lists['catid2']=$this->productcategory_model->get_row_cond(array('slug'=>$slug));
//print_r($lists['catid2']);
$lists['procategory2']=$this->products_model->get_array_cond(array('category_id'=>@$lists['catid2']->id));
//echo $lists['catid2']->id;
//print_r($lists['procategory2']);
//echo $lists['procategory2'][0]['category_id'];
?>
  <div class="product-div commmon-left">
  <h2><?php echo stripslashes($catname); ?></h2>
  <a href='<?php echo site_url('products/view/'.$slug)?>'>
  <?php
  if(!empty($proIm))
  {
	  $pimage=$proIm[0]['image'];
  ?>
  <img src="<?php echo base_url('public/uploads/gallery/'.$pimage); ?>" width="214" height="187" alt="" />
  <?php
  }
  else if(!empty($lists['procategory2']))
  {
	  $pimage=$lists['catid2']->image;
	  ?>
  <img src="<?php echo base_url('public/uploads/products/'.$pimage); ?>" width="214" height="187" alt="" />
      <?php
  }
  else
  {
  ?>
  <img src="<?php echo base_url('public/frontend/images/noimage.jpg'); ?>" width="214" height="187" alt="" />
  <?php
  }
  ?>
  </a>
  <p>
 <?php echo stripslashes($desc) ?>
  </p>
  <?php
  if(!empty($lists['procategory2']))
  {
  ?>
  <form method="post" action="<?php echo site_url('products/listview/'.strtolower($productscat['slug']))?>">
  <input name="" type="submit" value="view products" class="viewpdct-btn" />
  </form>
  <?php
  }
  ?>
  </div>
  
  <?php
  endforeach;
  ?>

</div>       
	</div>
	<div class="col-md-4 col-sm-4">
	  
	  <div class="col-sm-12 abt-panel blue mar-bot40" data-appear-animation="bounceInRight" data-appear-animation-delay="100">
	  
	    <h3><?php echo stripslashes($vission->title) ?></h3>
	<div class="row">
		<div class="col-sm-8">
			<?php echo stripslashes($vission->desc); ?>
		</div>
		<div class="col-sm-4">
			<img src="<?php echo base_url('public/frontend/images/vision-icon.png')?>" alt="" class="img-responsive" data-appear-animation="fadeInUp" data-appear-animation-delay="100">
		</div>
		</div>
		
	  </div>
	  
	  <div class="clearfix"></div>
	  
	  <div class="col-sm12 abt-panel green" data-appear-animation="bounceInRight" data-appear-animation-delay="100">
	    <h3><?php echo stripslashes($mission->title); ?></h3>
		<div class="row">
		 <div class="col-sm-8">
		  <?php echo stripslashes($mission->desc) ?>
		</div>
		<div class="col-sm-4">
			<img src="<?php echo base_url('public/frontend/images/mission-icon.png')?>" alt="" class="img-responsive" data-appear-animation="fadeInUp" data-appear-animation-delay="100">
		</div>
	</div>
	  </div>
	  
	</div>
	</div>-->
  </div>
  
</section>
