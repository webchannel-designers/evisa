   
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
              
              </div>
              <div class="filter mt-2">
                <h2 class="col-blue">Filter By Brands</h2>
                <div class="form style-2">
                  <form action="<?php echo site_url('products/lists/'); ?>">
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
				<?php /*?><li><a href="<?php echo site_url('products/printproduct/'.$this->uri->segment(4))?>?lightbox[iframe]=true&lightbox[width]=406&lightbox[height]=305" class="enquiry fancybox.iframe icon-print"></a></li><?php */?>
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
            
            <div class="article-wrapper productsview">
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

