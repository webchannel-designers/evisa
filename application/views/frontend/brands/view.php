<?php if(@$this->input->get_post('type')!="") { @$type=="rental"; } else { @$type=""; }//echo @$_REQUEST['brand']; ?>
 <section class="white section section-products">
   <div class="container">
     <div class="row">
       <div class="col-md-12 col-md-push-1 text-center">
         <div class="section-title br">
           <h2><?php echo $this->pagetitle; ?></h2>
         </div>
          <p><?php echo $content->short_desc;?></p> 
       </div>
     </div>
     <span class="clearfix"></span> <?php echo @$brand->desc; ?> <span class="clearfix"></span>
     <?php 	if($brandcats) { ?>
     <div class="product-tab">
       <?php   	if($brand->showtab =='Y') { ?>
       <ul class="nav nav-tabs">         
         <?php foreach($brandcats as $i => $category): $slug = $category['catslug']?$category['catslug']:$category['slug'];?>
         <li <?php if($i==0) { ?>class="active"<?php } ?>><a href="#newtab<?php echo $category['id']; ?>"  data-toggle="tab"><?php echo $category['category_title']?$category['category_title']:$category['name'];?></a></li>
         <?php endforeach; ?>
       </ul>
       <div class="tab-content">
         <?php  foreach($brandcats as $key => $category) { ?>
         <div id="newtab<?php echo $category['id']; ?>" class="tab-pane fade <?php if($key==0) { ?>in active<?php } ?>">
           <div class="owl-carousel product-slider">
             <div class="item">
               <?php $j=1;  
                     if(isset($pagelists[$category['category_id']])) 
                       foreach($pagelists[$category['category_id']] as $keys => $pagelist)
                       {
                             if($pagelist['image']!="")
                             {
                             $url = base_url('public/uploads/products/'.$pagelist['image']);
                             }
                             else
                             {
                             $url = base_url('public/frontend/images/noimage.jpg');
                             }
   
                       ?>
               <div class="item-cell cat<?php echo $category['id']; ?>">
                 <div class="title"><a href="<?php echo site_url("products/view/".$pagelist['slug']); ?>"><?php echo stripslashes($pagelist['title']); ?></a></div>
                 <figure><a href="<?php echo site_url("products/view/".$pagelist['slug']); ?>"><img src="<?php //echo base_url('public/frontend/timthumb/scripts/timthumb.php?src='); ?><?php echo $url; ?>" alt="" class="img-responsive"/></a></figure>
               </div>
               <?php
 				  if($j%1==0)
 				  {
 					  if($j<count($pagelists[$category['category_id']]))
 					  {
 					  ?>
             </div>
             <div class="item">
               <?php
 					  }
 				  }
 				  ?>
               <?php
 				  $j++;
 			    
 					  }
 					  ?>
             </div>
              
           </div>
         </div>
         <?php
 					  }
 					  ?>
       </div>
       <?php
 	}else{
 	  ?>
      <div class="owl-carousel product-slider">
             <div class="item">
               <?php $j=1;  
                     if(isset($allpros)) 
                       foreach($allpros as $keys => $pagelist)
                       {
                             if($pagelist['image']!="")
                             {
                             $url = base_url('public/uploads/products/'.$pagelist['image']);
                             }
                             else
                             {
                             $url = base_url('public/frontend/images/noimage.jpg');
                             }
   
                       ?>
               <div class="item-cell cat<?php // echo $category['id']; ?>">
                 <div class="title"><a href="<?php echo site_url("products/view/".$pagelist['slug']); ?>"><?php echo stripslashes($pagelist['title']); ?></a></div>
                 <figure><a href="<?php echo site_url("products/view/".$pagelist['slug']); ?>"><img src="<?php //echo base_url('public/frontend/timthumb/scripts/timthumb.php?src='); ?><?php echo $url; ?>" alt="" class="img-responsive"/></a></figure>
               </div>
               <?php
 				  if($j%1==0)
 				  {
 					  if($j<count($allpros))
 					  {
 					  ?>
             </div>
             <div class="item">
               <?php
 					  }
 				  }
 				  ?>
               <?php
 				  $j++;
 			    
 					  }
 					  ?>
             </div>
              
           </div>
      <?php
 	}
 ?>
     </div>
     <?php
 	}
 ?>
     <?php echo @$brand->video_desc; ?> <span class="clearfix"></span> </div>
 </section>
 <?php echo @$this->load->view('frontend/include/promotions'); ?>
 <section class="section section-planning text-center">
   <div class="container">
     <div class="col-md-8 col-md-push-3">
       <div class="section-title br text-center">
         <h2>planning to sell <br>
           your piano?</h2>
       </div>
       <p>Want to sell your Piano? You can now use our platform to list and sell your Piano Fast & for  a good market price</p>
       <a href="<?php echo site_url('contactus'); ?>" class="btn yellow">CONTACT US NOW</a> </div>
   </div>
 </section>
 