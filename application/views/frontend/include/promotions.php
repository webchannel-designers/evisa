<?php
if(count($this->promotions)>0) {
?>
<section class="section <?php if($this->uri->segment(2)=="products" and $this->uri->segment(3)=="view") { ?>yellowLight<?php } else { ?> white dark<?php } ?> section-promotions">
      <div class="container">
        <div class="section-title br text-center">
          <h2 class="<?php if($this->uri->segment(2)=="products" and $this->uri->segment(3)=="view") { ?>col-dark<?php } else { ?> col-white<?php } ?>">Wow Offers</h2>
        </div>
        <p class="text-center <?php if($this->uri->segment(2)=="products" and $this->uri->segment(3)=="view") { ?>col-dark<?php } else { ?> col-white<?php } ?>">
        At HOUSE OF PIANOS we offer something for everyone. Check out our Special programs<br /> that make it easy and possible for you to own your dream paino
        </p>
        <div class="row">
          <div class="adv-slider owl-carousel">
          
        <?php
		foreach($this->promotions as $brand) {
		?>
          
            <div class="item">
              <figure><a href="<?php echo site_url('images/detail/'.$brand['slug']);?>"><img src="<?php echo base_url('public/uploads/gallery/'.$brand['image']); ?>" alt="" class="img-responsive"/></a></figure>
            </div>
            
          <?php } ?>
            
          </div>
        </div>
      </div>
    </section>
    <?php
}
	?>