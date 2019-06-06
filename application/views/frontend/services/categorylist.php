<section class="content-main">
  <div class="container">
    <div class="row">
      <h2 data-appear-animation="fadeInUp" data-appear-animation-delay="200"><?php echo convert_lang('Products',$this->alphalocalization); ?></h2>
      <div class="col-md-8">
        <ol class="breadcrumb">
          <?php 

			$i=0; foreach($this->breadcrumbarr as $link => $text): $i++;			

			if($i==1){$attr=' class="home"';} else {$attr='';}?>
          <li<?php echo $attr; ?>>
            <?php if($link=='nolink'){ echo '<a href="javascript:void(0);">'.$text.'</a>'; } else { echo anchor($link,$text); } ?>
          </li>
          <?php endforeach; ?>
          <?php
			if($this->uri->segment(3)=="lists")
			{
			?>
          <li><a>Products</a></li>
          <?php
			}
			?>
        </ol>
      </div>
      <div class="col-md-4">
        <div class="pull-right right-side-icon"><a href="#" class="st_sharethis"></a><a class="fancybox fancybox.iframe mail-icon" href='<?php echo site_url('home/emailurl')?>?lightbox[iframe]=true&lightbox[width]=406&lightbox[height]=305'> </a><a href="#" class="print-icon"></a></div>
      </div>
    </div>
    <div class="tabbable boxed parentTabs">
      <div class="container">
        <ul class="nav nav-tabs nav-main-tab">
          <?php
		$i=1;
        foreach($procategory as $productscat):
        $catname=$productscat['name'];
        $desc=word_limiter(strip_tags($productscat['desc']), 25);
        //$desc=$productscat['desc'];
        $pimage=$productscat['image'];
        ?>
          <li <?php if($i==1) { ?>class="active"<?php } ?>><a href="#main-tab<?php echo $i; ?>" role="tab" data-toggle="tab"><span class="prod-actv-tab actv-tab-main"></span><?php echo stripslashes($catname); ?></a></li>
          <?php
	  $i++;
      endforeach;
      ?>
        </ul>
      </div>
      <div class="tab-content">
        <?php
		$k=1;
        foreach($procategory as $productscat):
        $catname=$productscat['name'];
        $desc=word_limiter(strip_tags($productscat['desc']), 25);
        //$desc=$productscat['desc'];
        $pimage=$productscat['image'];
		$id=$productscat['slug'];
        ?>
        <div class="tab-pane fade <?php if($k==1) { ?>active in<?php } ?>" id="main-tab<?php echo $k; ?>">
          <div class="tabbable">
            <div class="product-carousel products-inner" data-nav="fp_nav_" data-plugin-options='{"itemsCustom" : [[992,4],[768,2],[100,1]], "singleItem" : false, "navigation":true}'>
              <div class="container">
                <ul class="ch-grid">
                  <?php
							$lists['catid']=$this->productcategory_model->get_row_cond(array('slug'=>$id));
									
							$lists['procategory']=$this->products_model->get_array_cond(array('category_id'=>$lists['catid']->id));
									
							foreach($lists['procategory'] as $products)
							{
								$img[] = $this->gallery_model->get_array_cond($products['id']);
							}
							
							$lists['proimages'] = $img;
                            $j=11;
                            foreach($lists['procategory'] as $productscat):
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
                  <li data-appear-animation="bounceInLeft" data-appear-animation-delay="300"  <?php if($j==11) { ?>class="active"<?php } ?>> <span class="prod-actv-tab actv-tab-mid"></span> <a href="#sub<?php echo $j; ?>" data-url="<?php echo site_url('products/view/'.$slug)?>">
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
                    <div class="ch-item" style="background-image:url(<?php echo $url; ?>);">
                      <div class="ch-info"> </div>
                    </div>
                    <div class="prod-info"> <?php echo stripslashes($catname); ?> </div>
                    </a> </li>
                  <?php
                              $j++;
                              endforeach;
                              ?>
                </ul>
              </div>
            </div>
          </div>
          <div class="prod-full-width">
            <div class="tab-content">
              <div class="tab-pane fade active in" id="sub21">
                <div class="container">
                  <div class="row">
                    <div class="col-md-6">gr</div>
                    <div class="col-md-6">gdgsd</div>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="sub22"> </div>
              <div class="tab-pane fade" id="sub23"> </div>
              <div class="tab-pane fade" id="sub24"> </div>
            </div>
          </div>
        </div>
        <?php
	  $k++;
      endforeach;
      ?>
      </div>
    </div>
    <!--<div class="row">
    <div class="col-md-8 col-sm-8 inner-content">                
<div class="contentdiv commmon-left">
<?php
foreach($procategory as $productscat):
$catname=$productscat['name'];
$desc=word_limiter(strip_tags($productscat['desc']), 25);
//$desc=$productscat['desc'];
$pimage=$productscat['image'];
?>
  <div class="product-div commmon-left">
  <h2><?php echo stripslashes($catname); ?></h2>
  <?php
  if($pimage!="")
  {
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
  <p>
 <?php echo stripslashes($desc); ?>
  </p>
  <form method="post" action="<?php echo site_url('products/listview/'.strtolower($productscat['slug']))?>">
 <input name="" type="submit" value="view products" class="viewpdct-btn" /></form>
  </div>
  
  <?php
  endforeach;
  ?>
  
</div>       
	</div>
	<div class="col-md-4 col-sm-4">
	  
	  <div class="col-sm-12 abt-panel blue mar-bot40" data-appear-animation="bounceInRight" data-appear-animation-delay="100">
	  
	    <h3><?php echo stripslashes($vission->
    title) ?>
    </h3>
    <div class="row">
      <div class="col-sm-8"> <?php echo stripslashes($vission->desc); ?> </div>
      <div class="col-sm-4"> <img src="<?php echo base_url('public/frontend/images/vision-icon.png')?>" alt="" class="img-responsive" data-appear-animation="fadeInUp" data-appear-animation-delay="100"> </div>
    </div>
  </div>
  <div class="clearfix"></div>
  <div class="col-sm12 abt-panel green" data-appear-animation="bounceInRight" data-appear-animation-delay="100">
    <h3><?php echo stripslashes($mission->title); ?></h3>
    <div class="row">
      <div class="col-sm-8"> <?php echo stripslashes($mission->desc) ?> </div>
      <div class="col-sm-4"> <img src="<?php echo base_url('public/frontend/images/mission-icon.png')?>" alt="" class="img-responsive" data-appear-animation="fadeInUp" data-appear-animation-delay="100"> </div>
    </div>
  </div>
  </div>
  </div>
  -->
  </div>
</section>
<div class="pagination"> <?php echo $this->pagination->create_links(); ?> </div>
