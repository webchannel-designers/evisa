<section class="white-bg ">
  <div class="container">
    <div class="row">
      <div class="col-md-10 col-sm-9">
        <h1>Media Center</h1>
      </div>
      <div class="col-md-2 col-sm-3">
        <ul class="tools">
          <!--<li class="print-icon"><a href="">print</a></li>-->
          <li class="mail-icon"><a href="<?php echo site_url('home/emailurl')?>?lightbox[iframe]=true&lightbox[width]=406&lightbox[height]=305" class="enquiry fancybox.iframe">mail</a></li>
          <li class="share-icon"><a class="a2a_dd" href="https://www.addtoany.com/share" title="Share"><i class="fa fa-share-alt">share</i></a></li>
        </ul>
      </div>
    </div>
    <div class="row">
      <aside class="left-nav">
        <ul class="mediamenu">
          <li> <a href="#news"><i><img src="<?php echo base_url('public/frontend/images/left-nav-icon-11.png') ?>" alt="All News / Events" ></i>All News / Events</a> </li>
          <li> <a href="#Gallery"><i><img src="<?php echo base_url('public/frontend/images/left-nav-icon-12.png') ?>" alt="Photo Gallery" ></i>Photo Gallery</a> </li>
        </ul>
        <div id="myCarousel3" class="carousel slide carousel-fade" data-ride="carousel">
          <h3>In the news</h3>
          <div class="nav-carousel"> 
            <!-- Left and right controls --> 
            <a class="left carousel-control" href="javascript:;" data-target="#myCarousel3"><span class="sr-only"><img src="<?php echo base_url('public/frontend/images/carousel-nav-left.png') ?>" alt="left" ></span> </a> <a class="right carousel-control"  href="javascript:;" data-target="#myCarousel3" > <span class="sr-only"><img src="<?php echo base_url('public/frontend/images/carousel-nav-right.png') ?>" alt="right" ></span> </a> </div>
          <!-- Indicators --> 
          <!-- Wrapper for slides -->
          <div class="carousel-inner" role="listbox">
            <div class="item active" >
              <?php $len = 8 ; if(isset($news)) foreach($news as $newskey => $category):                
                    $nid=$category['id'];                
                    $slug=$category['slug'];               
                    $date1=date("d",strtotime($category['date_time']));                    
                    $date2=date("M Y",strtotime($category['date_time'])); 
                    $ndesc1=word_limiter( strip_tags($category['desc']),$len);
                ?>
              <ul>
                <li>
                  <div class="list-content">
                    <div class="date"> <span><?php echo $date1; ?></span>
                      <p><?php echo $date2; ?></p>
                    </div>
                    <div class="right-list"> <a href="<?php echo site_url('news/view/'.$slug)?>"><?php echo $category['title']; ?></a>
                      <p><?php echo $ndesc1; ?></p>
                    </div>
                  </div>
                </li>
              </ul>
              <?php echo ($newskey%3==2 && $newskey<(count($news)-1)) ? '</div> <div class="item">':'';endforeach;?> </div>
          </div>
        </div>
      </aside>
      <div class="col-md-9 pull-right">
        <div  class="media-1 grey-bg">
          <h2>News / Events</h2>
          <ul class="row" data-equal="li">
            <?php
                $len1 =10;
                if(isset($pagelists)){
                     foreach($pagelists as $category): 
               	 if(str_word_count($category['title']) > 6) $len1 =6;
                    $ndesc1=word_limiter(strip_tags($category['desc']),$len1);
                    
                    $ndesc = preg_replace("/<img[^>]+\>/i", " ", $ndesc1); 
                
                    $nid=$category['id'];
                
                    $slug=$category['slug'];
                
                    $date1=date("d",strtotime($category['date_time']));
                    
                    $date2=date("M Y",strtotime($category['date_time']));
                
                ?>
            <?php
                if($category['image']!='')
                {
                $imagenews=base_url('public/frontend/timthumb/scripts/timthumb.php?src=').base_url('public/uploads/contents/'.$category['image'])."&w=358&h=190&zc=2";	
                }
                else
                {
                $imagenews=base_url('public/frontend/timthumb/scripts/timthumb.php?src=').base_url('public/frontend/images/noimage.jpg')."&w=358&h=190&zc=2";		
                }
                ?>
            <li class="col-md-6" style="height:263px;">
              <div class="image-wrap"> <a href="<?php echo site_url('news/view/'.$slug)?>"><img class="img-responsive" src="<?php echo $imagenews; ?>" alt="CMC" /></a> </div>
              <div class="list-content">
                <div class="date"> <span><?php echo $date1; ?></span>
                  <p><?php echo $date2; ?></p>
                </div>
                <div class="right-list"> <a href="<?php echo site_url('news/view/'.$slug)?>"><?php echo $category['title']; ?></a>
                  <p><?php echo $ndesc; ?></p>
                </div>
              </div>
            </li>
            <?php
                
                endforeach;
                
                }
                
            ?>
          </ul>
          <div class="row">
            <div class="col-md-12">
              <div class="pagination-wrap"> 
                <!--<p>Showing 6 out of 100</p>-->
                <nav> <?php echo $this->pagination->create_links(); ?> </nav>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<section id="Gallery" class="yellow-bg">
  <div class="container">
    <div class="row">
      <div class="col-md-9 pull-right ">
        <div class="media-2">
          <h2>Photo Gallery</h2>
          <div class="row" >
            <?php // foreach($albums as $key => $image)  {   ?>
              <?php if($albums) { //[$image['id']]?>
               <ul class="row" data-equal="li">
                <?php $defaultimage =''; foreach($albums as $keys => $images)  { $defaultimage = $images['image']; ?>
                <li class="col-md-6" style="height:155px;" > 
                <a href="<?php echo site_url('gallery/popup/'.$images['slug']); ?>" class="fancybox fancybox.iframe">
                <?php if($defaultimage!="") { ?>
                <img class="img-responsive" src="<?php echo base_url('public/frontend/timthumb/scripts/timthumb.php?src=').base_url('public/uploads/gallery/'.$defaultimage)."&w=370&h=180&zc=1"; ?>" alt="<?php echo $images['title']; ?>" />
                <?php
				}
				else
				{
				?>
                <img class="img-responsive" src="<?php echo base_url('public/frontend/timthumb/scripts/timthumb.php?src=').base_url('public/frontend/images/noimage.jpg')."&w=370&h=180&zc=1"; ?>" alt="<?php echo $images['title']; ?>" />
                <?php
				}
				?>
                </a><br />
<span><?php echo $images['title']; ?></span> 
                </li>
                <?php   } ?>
              </ul>
              <?php   } ?>
             <?php //  } ?>
          </div>
          <?php
		  if(count($albums) > 4)
		  {
		  ?>
          <div class="wrap-click"><a class="view-click" href="">View more</a></div>
          <?php
		  }
		  ?>
        </div>
      </div>
    </div>
  </div>
</section>
