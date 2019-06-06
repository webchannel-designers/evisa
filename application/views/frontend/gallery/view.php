    
    
    <section class="content-inner pb-4">
      <div class="container-fluid">
      
        <div class="row">
          
                <div class="col-xl-3 col-lg-4">
                  <div class="page-title titles eqHeight">
                    <h2>About us</h2>
                  </div>
                  <aside class="page-aside">
              <div class="aside-nav">
                <ul id="accordion" role="tablist">
                  <li class="card" <?php if(site_url('contents/lists/about-us')==current_url()) { ?>class="active "<?php } ?>><a data-toggle="collapsed" data-parent="#accordion" aria-expanded="true" href="<?php echo site_url('contents/lists/about-us'); ?>">Company Profile</a></li>
                  <li class="card" <?php if(site_url('gallery/view/gallery')==current_url()) { ?>class="active "<?php } ?>><a data-toggle="collapsed" data-parent="#accordion" aria-expanded="true" href="<?php echo site_url('gallery/view/gallery'); ?>">Gallery</a></li>
                </ul>
              </div>
              <?php
			  if($pagelists[0]['pdf']!="")
			  {
			  ?>
              <div class="dwld-wrapper mt-2"><a target="_blank" class="btn download-large" href="<?php echo base_url('public/uploads/contents/'.$pagelists[0]['pdf']); ?>">
                  <h2>Download</h2>
                  <p>Company Profile</p></a></div>
             <?php } ?>
            </aside>
                </div>
                <div class="col-xl-9 col-lg-8">
            <div class="module-head titles eqHeight">
              <div class="row">
                <div class="col-xl-9 col-lg-9">
                  <div class="module-title">
                    <h2><?php echo $this->pagetitle; ?></h2>
                  </div>
                </div>
                <div class="col-xl-3 col-lg-3">
                
                  <div class="utilities">
                    <ul>
                	<li><a href="<?php echo site_url('home/emailurl')?>?lightbox[iframe]=true&lightbox[width]=406&lightbox[height]=305" class="enquiry fancybox.iframe icon-mail"></a></li>
  					<li><a class="a2a_dd " href="https://www.addtoany.com/share" title="Share"><i class="fa fa-share-alt"></i></a></li>              
                    </ul>
                  </div>
                  </div>
                </div>
              </div>
            <?php $this->load->view('frontend/include/breadcrumb'); ?>
              
              
              <div class="row mt-5">
              <div class="col-lg-12">
                <div class="gallery owl-carousel">
                <?php foreach($galleries as $image) { $url = base_url('public/uploads/gallery/'.$image['image']); ?>
                  <div class="item"><a href="<?php echo $url; ?>" data-fancybox="gallery"><img class="img-fluid" src="<?php echo $url; ?>" alt=""/></a></div>
                  <?php } ?>
                </div>
              </div>
            </div>
              
                <?php

							$i=0;
                            foreach($galleries as $gallery)
                            {


                      ?>
              
                <!--<div class="col-xl-3 col-lg-6 col-md-6">
                  <div class="item">
                    <h4 class="title"><a data-fancybox="gallery" class="fancybox" href="<?php echo base_url("public/uploads/gallery/".$gallery['image']); ?>"><?php echo $gallery['title']; ?></a></h4>
                    <figure><a data-fancybox="gallery2" class="fancybox" href="<?php echo base_url("public/uploads/gallery/".$gallery['image']); ?>"><img class="img-fluid" src="<?php echo base_url('public/frontend/timthumb/scripts/timthumb.php?src='); ?><?php echo base_url('public/uploads/gallery/'.@$gallery['image'])."&w=360&h=180&zc=1";?>" alt=""/></a></figure>
                  </div>
                </div>-->
                
                <?php

					  }

					  ?>
            </div>
        </div>
      </div>
    </section>
    
    <?php $this->load->view('frontend/include/social'); ?>
    
                