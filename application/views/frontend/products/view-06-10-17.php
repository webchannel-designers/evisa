<?php $descol=12;?>

<!--<section class="section white content-detail">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-md-push-1 text-center">
            <div class="section-title br">
              <h2><?php echo stripslashes($content->title); ?></h2>
            </div>
           <?php /*?> <p>lorem ipsum dolor sit amet, consectetuer adipiscing elit, <br>sed diam nonummy nibh e</p><?php */?>
          </div>
        </div>
        <div class="row">
        
        <?php if(count(@$images)>0) {  $descol=7;?>
        
          <div class="col-md-7">
            <div class="gallerySlider">
              <div id="gallery-large" class="gallery owl-carousel">
              <?php foreach($images as $image) { $url = base_url('public/uploads/gallery/'.$image['image']); ?>
                <div class="item">
                <a class="fancyboxgallery" href="<?php echo $url; ?>" title="" rel="gallery">
                <img src="<?php echo $url; ?>" alt="" class="img-responsive"/>
                </a></div>
              <?php } ?>
                
              </div><?php if(count($images)>1) { ?>
              <div id="gallery-thumb" class="gallery owl-carousel">
              
              <?php foreach($images as $image) { $url = base_url('public/uploads/gallery/'.$image['image']); ?>
                <div class="item"><img src="<?php echo $url; ?>" alt="" class="img-responsive"/></div>
              <?php } ?>
                
              </div>
               <?php } ?>
            </div>
          </div>
          
        <?php }  ?>
          
          <div class="col-md-7">
            <div class="box yellowLight">
              <h3>PIANO DETAILS</h3>
              <table>
                <?php if($content->color!="")  {   ?>
                <tr>
                  <td>COLOR</td>
                  <td><?php echo $content->color; ?></td>
                </tr>
                <?php } ?>
                <?php if($content->keys!="")  {   ?>
                <tr>
                  <td>NUMBER OF KEYS 	7¼ </td>
                  <td><?php echo $content->keys; ?></td>
                </tr>
                <?php } ?>
                <?php if($content->length!="")  {   ?>
                <tr>
                  <td>Length</td>
                  <td><?php echo $content->length; ?></td>
                </tr>
                <?php } ?>
                <?php if($content->width!="")  {   ?>
                <tr>
                  <td>Width</td>
                  <td><?php echo $content->width; ?></td>
                </tr>
                <?php } ?>
                <?php if($content->weight!="")  {   ?>
                <tr>
                  <td>Weight</td>
                  <td><?php echo $content->weight; ?></td>
                </tr>
                <?php } ?>
              </table>
            </div>
            <div class="box yellowLight">
            <?php echo stripslashes($content->desc); ?>
              <h4>Share this on</h4>
              <div class="social">
              
<div class="a2a_kit a2a_kit_size_32 a2a_default_style">
<ul>
<li><a class="a2a_button_facebook icon-facebook"></a></li>
<li><a class="a2a_button_twitter icon-twitter"></a></li>
<li><a class="a2a_button_google_plus icon-gplus"></a></li>
</ul>
</div>
              </div><span class="clearfix"></span>
              <?php
			  //print_r($downloads);
			  if(count($downloads)>0) {
			  ?>
              <div class="download-list">
              <h3>DOWNLOADS</h3>
                <ul>
                <?php
				foreach($downloads as $download)
				{
				?>
                <li><a href="<?php echo base_url('public/uploads/downloads/'.$download['attachment']); ?>" target="_blank"><?php echo $download['title']; ?></a></li>
                <?php
                }
                ?>
                </ul>
              </div><span class="clearfix"></span>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
    </section>-->
    
    <!--<section class="section yellow section-interested" id="enq">
      <div class="container">
        <div class="inner">
          <h3 class="text-center">Interested in this Piano?</h3>
          <p class="text-center">Please give us your contact details and <br>get a callback</p>
          <div class="form-interest" id="enquirycontainer">
          </div>
        </div>
      </div>
    </section>-->
        <?php if($related)  { ?>
    <!--<section class="section white">
      <h3 class="text-center">YOU MAY ALSO LIKE</h3>
      <div class="container">
        <div class="owl-carousel product-slider">
        
            <?php  

				foreach($related as $item)

				{ 

                    if($item['image']!="")

                    {

                    $url = base_url('public/uploads/products/'.$item['image']);

                    }

                    else

                    {

                    $url = base_url('public/frontend/images/noimage.jpg');

                    }

				?>
        
        
          <div class="item">
            <div class="item-cell">
              <div class="title"><a href="#"><?php echo word_limiter( $item['title'],3); ?></a></div>
              <figure><a href="<?php echo site_url('products/view/'.$item['slug']); ?>"><img src="<?php echo base_url('public/frontend/timthumb/scripts/timthumb.php?src='); ?><?php echo $url."&w=332&h=262&zc=1"; ?>" alt="" class="img-responsive"/></a></figure>
            </div>
          </div>
          
            <?php }  ?>
          
        </div>
      </div>
    </section>-->
    <?php } ?>
    
    <?php //print_r($category); ?>
    
    
    <section class="content-inner pb-4">
      <div class="container-fluid">
        <div class="row">
          <div class="col-xl-3 col-lg-4">
            <div class="page-title titles eqHeight">
              <h2>Products</h2>
            </div>
            <aside class="page-aside">
              <div class="aside-nav">
              
              <ul id="accordion" role="tablist">
               <?php $i=1;foreach($categories as $item) { ?>
                <?php
				$childs=$this->productcategory_model->get_array_cond(array('parent_id'=>$item['id'],'status'=>'Y'));
				?>
                <li class="card">
                    <a data-toggle="<?php if(count($childs)>0) { ?>collapse<?php } else { ?>collapsed<?php } ?>" <?php if($item['slug']==@$parents->slug) { ?> class="collapse"<?php } else { ?>class="collapsed"<?php } ?> data-parent="#accordion" href="<?php if(count($childs)>0) { ?>#accord<?php echo $i; ?> <?php } else { echo site_url('products/lists/'.$item['slug']); } ?>" aria-expanded="true"><?php echo $item['name']; ?></a>
                  <?php
				  if(count($childs)>0)
				  {
					  if($item['slug']==@$parents->slug)
					  {
					  $clas="show";
					  }
					  else
					  {
						  $clas="";
					  }
				  ?>

                  <div class="collapse <?php echo @$clas; ?>" id="accord<?php echo $i; ?>" role="tabpanel">
                    <div class="card-body">
                  <ul>
                      <?php
					  foreach($childs as $item)
					  {$itemslug = $item['slug'];
//					if($childs>1)
//					{
//						$anchor=site_url('products/brandlists/'.$item['slug']);
//					}
//					else
//					{
//						$anchor=site_url('products/lists/'.$item['slug']);
//					}
                      ?>
                  <li <?php if($itemslug==$category->slug) { ?> class="active"<?php } ?>><a href="<?php echo site_url('products/lists/'.$itemslug); ?>"><?php echo $item['name']; ?></a></li>
                  <?php } ?>
                  </ul>
                    </div>
                  </div>
                  <?php
				  }
				  ?>
                </li>
                  <?php $i++;} ?>
                
              </ul>
              
                <!--<ul>
                <?php foreach($categories as $item) { ?>
                <?php
				$childs=$this->productcategory_model->get_array_cond(array('parent_id'=>$item['id'],'status'=>'Y'));
				?>
                  <li <?php if($item['slug']==$procat->slug) { ?> class="active"<?php } ?>><a href="<?php if(count($childs)>0) { echo "javascript:void(0);"; } else { echo site_url('products/lists/'.$item['slug']); } ?>"><span><?php echo $item['name']; ?></span></a>
                  <?php
				  if(count($childs)>0)
				  {
				  ?>
                  <ul>
                      <?php
					  foreach($childs as $item)
					  {$itemslug = $item['slug'];
//					if($childs>1)
//					{
//						$anchor=site_url('products/brandlists/'.$item['slug']);
//					}
//					else
//					{
//						$anchor=site_url('products/lists/'.$item['slug']);
//					}
                      ?>
                  <li><a href="<?php echo site_url('products/lists/'.$itemslug); ?>"><?php echo $item['name']; ?></a></li>
                  <?php } ?>
                  </ul>
                  <?php
				  }
				  ?>
                  </li>
                  <?php } ?>
                </ul>-->
              </div>
              <div class="filter mt-2">
                <h2 class="col-blue">Filter By Brands</h2>
                <div class="form style-2">
                  <form action="<?php echo site_url('products/lists/'.$category->slug); ?>">
                    <div class="input-holder">
                      <select name="brands">
                        <option value="">All brands</option>
                        <?php foreach($brands as $item) { ?>
                        <option value="<?php echo $item['slug']; ?>" <?php if(@$_REQUEST['brands']==$item['slug']) { ?> selected="selected"<?php } ?>><?php echo $item['title']; ?></option>
                        <?php } ?>
                      </select>
                    </div>
                    <div class="btn-holder">
                      <button class="btn blue search">Search</button>
                    </div>
                  </form>
                </div>
              </div>
            </aside>
          </div>
          <div class="col-xl-9 col-lg-8">
            <div class="module-head titles eqHeight">
              <div class="row">
                <div class="col-xl-9 col-lg-9">
                  <div class="module-title">
                    <h2><?php echo stripslashes($content->title); ?></h2>
                  </div>
                </div>
                <div class="col-xl-3 col-lg-3">
                  <div class="utilities">
                    <ul>
                <li><a href="<?php echo site_url('home/emailurl')?>?lightbox[iframe]=true&lightbox[width]=406&lightbox[height]=305" class="enquiry fancybox.iframe icon-mail"></a></li>
				<!--<li><a href="<?php echo site_url('products/printproduct/'.$this->uri->segment(4))?>?lightbox[iframe]=true&lightbox[width]=406&lightbox[height]=305" class="enquiry fancybox.iframe icon-print"></a></li>-->
  				<li><a class="a2a_dd " href="https://www.addtoany.com/share" title="Share"><i class="fa fa-share-alt"></i></a></li>              
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <?php $this->load->view('frontend/include/breadcrumb'); ?>
            <?php if(count(@$images)>0) {  ?>
            <div class="row mt-5">
              <div class="col-lg-12">
                <div class="gallery owl-carousel">
                <?php foreach($images as $image) { $url = base_url('public/uploads/gallery/'.$image['image']); ?>
                  <div class="item"><a href="<?php echo $url; ?>" data-fancybox="gallery"><img class="img-fluid" src="<?php echo $url; ?>" alt=""/></a></div>
                  <?php } ?>
                </div>
              </div>
            </div>
            <?php } ?>
            
              <?php if($content->pdf!="") { ?>
              <div class="dwld-wrapper mt-2"><a class="btn download-large" target="_blank" href="<?php echo base_url('public/uploads/products/'.$content->pdf); ?>">
                  <h2>Download</h2>
                  <p>Product Catalogue</p></a></div>
                  <?php } ?>
            
            <div class="article-wrapper">
            <?php if($content->desc!="") { ?>
              <article>
                <h4>Product Overview</h4>
                <?php echo stripslashes($content->desc); ?>
              </article>
              <?php } ?>
              <?php if($content->specification!="") { ?>
              <article>
                <h4>Specification</h4>
                <?php echo stripslashes($content->specification); ?>
              </article>
              <?php } ?>
              <?php if($content->feat!="") { ?>
              <article>
                <h4>Workflow Graph</h4>
                <?php echo $content->feat; ?>
              </article>
              <?php } ?>
              <?php if($content->color!="") { ?>
              <article>
                <h4>Workflow Video</h4>
                <iframe width="100%" height="500" src="<?php echo $content->color; ?>" frameborder="0" allowfullscreen></iframe>
                <!--<video id="player1" width="100%" height="426px" poster="images/video-poster-1.jpg" preload="none" controls="controls">
                  <source src="https://commondatastorage.googleapis.com/gtv-videos-bucket/CastVideos/mp4/BigBuckBunny.mp4" type="video/mp4"/>
                </video>-->
              </article>
              <?php } ?>
            </div>
            
            <div id="enquirycontainer2" class="form style-3">
            
            </div>
            
          </div>
        </div>
      </div>
    </section>
    
    <?php echo $this->load->view('frontend/include/social'); ?>

