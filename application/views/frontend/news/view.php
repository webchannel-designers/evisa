<section class="white-bg ">
  <div class="container">
    <div class="row">
      <div class="col-md-10 col-sm-9">
        <h1>Media Center</h1>
      </div>
      <div class="col-md-2 col-sm-3">
        <ul class="tools">
          <li class="print-icon"><a href="<?php echo site_url('news/printnews/'.$content->slug)?>?lightbox[iframe]=true&lightbox[width]=406&lightbox[height]=305" class="printcontent fancybox.iframe">print</a></li>
          <li class="mail-icon"><a href="<?php echo site_url('home/emailurl')?>?lightbox[iframe]=true&lightbox[width]=406&lightbox[height]=305" class="enquiry fancybox.iframe">mail</a></li>
          <li class="share-icon"><a class="a2a_dd" href="https://www.addtoany.com/share" title="Share"><i class="fa fa-share-alt">share</i></a></li>
        </ul>
      </div>
    </div>
    <div class="row"> 
      <!--<aside  class="left-nav">
          <ul>
            <li>
              <a href="<?php echo site_url('news/lists/news'); ?>#news"><i><img src="<?php echo base_url('public/frontend/images/left-nav-icon-11.png') ?>" alt="All News / Events" ></i>All News / Events</a>
            </li>
            <li>
              <a href="<?php echo site_url('news/lists/news'); ?>#Gallery"><i><img src="<?php echo base_url('public/frontend/images/left-nav-icon-12.png') ?>" alt="Photo Gallery" ></i>Photo Gallery</a>
            </li> 
          </ul>
          <div id="myCarousel3" class="carousel slide carousel-fade" data-ride="carousel">
            <h3>In the news</h3>
            <div class="nav-carousel">
              <a class="left carousel-control" href="#myCarousel3" >
               
                <span class="sr-only"><img src="<?php echo base_url('public/frontend/images/carousel-nav-left.png') ?>" alt="left" ></span>
              </a>
              <a class="right carousel-control" href="#myCarousel3" >
              
                <span class="sr-only"><img src="<?php echo base_url('public/frontend/images/carousel-nav-right.png') ?>" alt="right" ></span>
              </a>
            </div>
            <div class="carousel-inner "  role="listbox">
              <div class="item active"> 
                <ul>
				<?php
                
                if(isset($news)){
                $i=1;
                    foreach($news as $category): 
                
                    $ndesc1=word_limiter($category['desc'],8);
                    
                    $ndesc = preg_replace("/<img[^>]+\>/i", " ", $ndesc1); 
                
                    $nid=$category['id'];
                
                    $slug=$category['slug'];
                
                    $date1=date("d",strtotime($category['date_time']));
                    
                    $date2=date("M Y",strtotime($category['date_time']));
                
                ?>
                  <li>  
                    <div class="list-content">
                  <div class="date">
                    <span><?php echo $date1; ?></span>
                    <p><?php echo $date2; ?></p>
                  </div>
                  <div class="right-list">
                    <a href="<?php echo site_url('news/view/'.$slug)?>"><?php echo $category['title']; ?></a>
                    <p><?php echo $ndesc; ?></p>  
                  </div>
                </div>
                  </li>
                  <?php
				  if($i%3==0)
				  {
					  ?>
                      </ul>
					</div>
              	<div class="item"> 
                <ul>                      
				<?php
				  }
				  ?>
				<?php
                $i++;
                endforeach;
                
                }
                
                ?>           

                </ul>
              </div>
              
            </div>

          </div>
        </aside>-->
      <div class="col-md-12">
        <div  class="media-1 grey-bg news-content">
          <h2><?php echo stripslashes($content->title); ?></h2>
          <div class="date icon-calendar">Published on : <?php echo date("j F Y",strtotime($content->date_time));?></div>
          <?php
							if($content->image!='')
							{
								$imagenews=base_url('public/uploads/contents/'.$content->image);	
							?>
         					 <figure><img class="img-responsive" src="<?php echo $imagenews; ?>"></figure>
          <?php
							}
							  ?>
          <?php if($content->desc!='') { echo $content->desc; } ?>
        </div>
      </div>
    </div>
  </div>
</section>
