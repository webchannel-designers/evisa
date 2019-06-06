<?php /*?><header>
  <div class="container-fluid">
    <div class="row align-items-center">
      <div class="col-xl-3"><a class="page-logo" href="<?php echo site_url('/')?>" title="Juma Al Majid"><img class="img-fluid" src="<?php echo base_url('public/frontend/images/page-logo.png')?>" alt="Juma Al Majid | Office Equipments"/></a></div>
      <div class="col-xl-9">
        <nav class="navbar-toggleable-md">
          <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#page-nav" aria-expanded="false" aria-controls="navbar"><span class="navbar-toggler-icon"></span><span class="navbar-toggler-icon"></span><span class="navbar-toggler-icon"></span></button>
          <div class="page-nav collapse navbar-collapse justify-content-end" id="page-nav"> <?php echo $mainmenu; ?>
            <ul class="nav navbar-nav">
              <li class="bt"><a class="blue btn icon-mail enquiry fancybox.iframe" href="<?php echo site_url('home/enquiry3') ?>">Service Request</a></li>
            </ul>
          </div>
        </nav>
      </div>
    </div>
  </div>
</header><?php */?>
<header>
      <div class="container-fluid">
        <div class="row align-items-center">
          <div class="col-lg-2"><a class="page-logo" href="<?php echo site_url('/'); ?>" title="almajid Travels"><img class="img-fluid" src="public/frontend/images/page-logo.png" alt="almajid Travels"/></a></div>
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
              <button class="hamburger hamburger--spin" type="button" data-toggle="collapse" data-target="#page-nav" aria-controls="page-nav" aria-expanded="false" aria-label="Toggle navigation"><span class="hamburger-box"><span class="hamburger-inner"></span></span></button>
            </nav>
          </div>
        </div>
      </div>
    </header>
<?php if(count(@$banners)>0) {   ?>
<?php /*?><section class="section-spotlight">
  <div class="home-slider owl-carousel">
    <?php 
						$i=1;
						$j=0;
						foreach($banners as $banner): 
						?>
    <div class="item"><img class="img-fluid" src="<?php echo base_url('public/uploads/banners/'.$banner['image']); ?>" alt=""/>
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-6">
            <div class="caption style-1">
              <?php echo $banner['short_desc']; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php $i++;$j++;endforeach;  ?>
  </div>
</section><?php */?>
<section class="section-spotlight">
      <div class="home-slider owl-carousel">
      
    <?php 
						$i=1;
						$j=0;
						foreach($banners as $banner): 
	?>
      
        <div class="item"><img class="img-fluid" src="<?php echo base_url('public/uploads/banners/'.$banner['image']); ?>" alt="<?php echo $banner['title']; ?>"/>
          <div class="caption text-left">
            <p><?php echo $banner['short_desc']; ?></p>
          </div>
        </div>
        <?php $i++;$j++;endforeach;  ?>
      </div>
    </section>
<?php } else if(count(@$this->pagebannners)>0) { //print_r(@$this->pagebannners); ?>
<?php /*?><section class="section-spotlight inner-spotlight">
  <div class="home-slider owl-carousel">
    <?php 
			$i=1;
			$j=0;
			foreach(@$this->pagebannners as $banner): 
	?>
    <div class="item"><img class="img-fluid" src="<?php echo base_url('public/uploads/gallery/'.$banner['image']); ?>" alt=""/></div>
    <?php $i++;$j++;endforeach;  ?>
  </div>
</section><?php */?>
<?php } else if(@$this->pagebannner!="") { ?>
<?php /*?><section class="section-spotlight inner-spotlight">
  <div class="home-slider owl-carousel">
    <div class="item"><img class="img-fluid" src="<?php echo $this->pagebannner; ?>" alt=""/></div>
  </div>
</section><?php */?>
<?php } ?>
