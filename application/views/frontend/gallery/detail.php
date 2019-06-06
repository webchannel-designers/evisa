    
    <section class="white section">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-md-push-1 text-center">
            <div class="section-title br">
              <h2><?php echo $gallery->title ? $gallery->title :$category->title?></h2>
            </div>
          </div>
        </div><span class="clearfix"></span>
        <div class="row gallery">
        <div class="col-md-6"> <img class="img-responsive" src="<?php echo base_url('public/uploads/gallery/'.$gallery->image);?>"></div>
							 
        <div class="col-md-8"><?php echo $gallery->short_desc?></div>
      </div>
    </section>
    
                