   
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
            <!--<ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item"><a href="#">Products</a></li>
              <li class="breadcrumb-item"><a href="#">Multifunction Printers</a></li>
            </ol>-->
            <div class="row">
            <div class="col-xl-12">
            <?php if($content->image!="") { ?>
            <figure><img src="<?php echo base_url('public/uploads/products/'.$content->image); ?>" /></figure>
            <?php } ?>
    		<?php if($content->desc!='') { echo $content->desc; } ?>
            </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <?php $this->load->view('frontend/include/social'); ?>
