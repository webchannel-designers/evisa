   
    
    <section class="content-inner pb-4">
      <div class="container-fluid">
      
        <div class="row">
          
          <div class="col-xl-12">
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
				<!--<li><a href="<?php echo site_url('products/printproduct/'.$this->uri->segment(4))?>?lightbox[iframe]=true&lightbox[width]=406&lightbox[height]=305" class="enquiry fancybox.iframe icon-print"></a></li>-->
  					<li><a class="a2a_dd " href="https://www.addtoany.com/share" title="Share"><i class="fa fa-share-alt"></i></a></li>              
                    </ul>
                  </div>
                </div>
              </div>
            </div>
            <?php $this->load->view('frontend/include/breadcrumb'); ?>
          
            <div class="feature-list">
              <div class="row">
              
                <?php

                      foreach($pagelists as $pagelist)

                      {

                            if($pagelist['image']!="")

                            {

                            $url = base_url('public/uploads/contents/'.$pagelist['image']);

                            }

                            else

                            {

                            $url = base_url('public/frontend/images/noimage.jpg');

                            }

                            //print_r($downloads);

                      ?>
              
                <div class="col-xl-3 col-lg-6 col-md-6">
                  <div class="item">
                    <h4 class="title"><a href="<?php echo site_url("brands/view/".$pagelist['slug']); ?>"><?php echo $pagelist['title']; ?></a></h4>
                    <figure><a href="<?php echo site_url("brands/view/".$pagelist['slug']); ?>"><img class="img-fluid" src="<?php //echo base_url('public/frontend/timthumb/scripts/timthumb.php?src='); ?><?php echo $url;//."&w=314&h=256&zc=1"; ?>" alt=""/></a></figure>
                    <div class="content">
                      <p><strong><?php echo $pagelist['short_desc']; ?></strong></p>
                    </div>
                    <div class="item-footer"><a class="btn blue br" href="<?php echo site_url("brands/view/".$pagelist['slug']); ?>">More Details</a></div>
                  </div>
                </div>
                
                <?php

					  }

					  ?>
                
                
              </div>
              <div class="pagination-wrapper pb-4"><?php echo $this->pagination->create_links(); ?></div>
            </div>
          </div>
        </div>
      </div>
    </section>
    
    <?php $this->load->view('frontend/include/social'); ?>


    
    
    
    