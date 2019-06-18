<header>
      <div class="container-fluid">
        <div class="row align-items-center">
          <div class="col-lg-2"><a class="page-logo" href="<?php echo site_url(); ?>?cid=<?php echo $this->session->userdata('ref_id');?>" title="almajid Travels"><img class="img-fluid" src="public/frontend/images/page-logo.png" alt="almajid Travels"/></a></div>
          <div class="col-lg-10 text-left text-lg-right">
            <nav class="page-nav navbar navbar-expand-lg navbar-light">
              <div class="collapse navbar-collapse justify-content-end" id="page-nav">
                <?php /*?><ul class="navbar-nav">
                  <li class="nav-item active"><a class="nav-link" href="index.html">Home</a></li>
                  <li class="nav-item"><a class="nav-link" href="about-us.html">About Us</a></li>
                  <li class="nav-item"><a class="nav-link" href="how-to-appy.html">How to Apply</a></li>
                  <li class="nav-item"><a class="nav-link" href="types-of-visa.html">Types of Visa</a></li>
                  <li class="nav-item"><a class="nav-link" href="contact.html">Contact Us</a></li>
                </ul><?php */?>
                <?php echo $mainmenu; ?>
              </div>
              <div class="back-wrap button-number"> <a class="btn btn-home" href="<?php echo site_url(); ?>?cid=<?php echo $this->session->userdata('ref_id');?>">CALL 800 372273 </a></div>
              <div class="back-wrap"> <a class="btn btn-home" href="<?php echo site_url(); ?>?cid=<?php echo $this->session->userdata('ref_id');?>">Back To Home</a></div>
              <button class="hamburger hamburger--spin" type="button" data-toggle="collapse" data-target="#page-nav" aria-controls="page-nav" aria-expanded="false" aria-label="Toggle navigation"><span class="hamburger-box"><span class="hamburger-inner"></span></span></button>
            </nav>
          </div>
        </div>
      </div>
    </header>
<?php if(count(@$banners)>0) {   ?>

<section class="section-spotlight">
      <div class="home-slider owl-carousel">
      
    <?php 
						$i=1;
						$j=0;
						foreach($banners as $banner): 
	?>
      
        <div class="item"><img class="img-fluid big-banner" src="<?php echo base_url('public/uploads/banners/'.$banner['image']); ?>" alt="<?php echo $banner['title']; ?>"/>
        <img class="img-fluid mobile-banner" src="<?php echo base_url('public/uploads/banners/'.$banner['icon']); ?>" alt="<?php echo $banner['title']; ?>"/>
          <div class="caption text-left">
            <p><?php echo $banner['short_desc']; ?></p>
          </div>
        </div>
        <?php $i++;$j++;endforeach;  ?>
      </div>
    </section>
<?php } else if(count(@$this->pagebannners)>0) { //print_r(@$this->pagebannners); ?>

<?php } else if(@$this->pagebannner!="") { ?>
<?php if($this->uri->segment(4)=="terms-and-condtions") { ?>
<section class="section-spotlight inner-spotlight">
  <div class="home-slider owl-carousel">
    <div class="item"><img class="img-fluid" src="<?php echo $this->pagebannner; ?>" alt=""/></div>
  </div>
</section>
<?php } } ?>
