<?php if($this->uri->segment(4)=='about-us') { ?>

<section class="content-inner pb-4 about-us">
  <div class="container-fluid">
    <div class="row">
      <div class="col-xl-3 col-lg-4 leftmenu">
        <div class="leftmenu-wrap">
          <div class="page-title titles eqHeight">
            <h2>About Us</h2>
          </div>
          <aside class="page-aside">
            <div class="aside-nav">
              <ul id="accordion" role="tablist">
                <li class="card" <?php if($this->uri->segment(4)=="about-us") { ?>class="active"<?php } ?>><a data-toggle="collapsed" data-parent="#accordion" aria-expanded="true" href="<?php echo site_url('contents/lists/about-us'); ?>">Company Profile</a></li>
              </ul>
            </div>
            <?php
			  //if($pagelists[0]['pdf']!="")/ {
			  ?>
            <div class="dwld-wrapper mt-2"><a target="_blank" class="btn download-large" href="<?php echo base_url('public/uploads/contents/OE_Corporate_Brochure_final.pdf'); ?>">
              <h2>Download</h2>
              <p>Company Profile</p>
              </a></div>
            <?php //} //'public/uploads/contents/'.$pagelists[0]['pdf']?>
          </aside>
        </div>
      </div>
      <div class="col-xl-9 col-lg-8">
        <div class="module-head titles eqHeight">
          <div class="row">
            <div class="col-xl-9 col-lg-9">
              <div class="module-title">
                <h2>Company Profile</h2>
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
        <div class="row">
          <div class="col-lg-12">
            <div class="about-description row align-items-end justify-content-end">
              <div class="col-xl-6 col-lg-12"> <?php echo $this->desc; ?> </div>
            </div>
          </div>
        </div>
        <div class="row mt-5">
          <div class="col-lg-12">
            <div class="module-title mb-4">
              <h2 class="col-blue"><?php echo stripslashes($pagelists[0]['title']); ?></h2>
            </div>
            <?php echo $pagelists[0]['desc']; ?> </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php $this->load->view('frontend/include/social'); ?>
<?php
  
}
else if($this->uri->segment(4)=='working-groups')
{
	//print_r($jobs);
	
  ?>
<section class="section section-benefits workdetails">
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="section-title normal">
          <h2>ECS Working Groups</h2>
        </div>
        <?php
		  $i=1;
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
		   
		  ?>
        <div class="management-list">
          <div class="row">
            <?php
if($i%2!=0)
{
?>
            <div class="col-lg-9">
              <div class="section-title line">
                <h3> <?php echo stripslashes($pagelist['title']); ?></h3>
              </div>
              <?php echo stripslashes($pagelist['desc']); ?> </div>
            <div class="col-lg-3">
              <div class="figure"> <img class="img-responsive" src="<?php //echo base_url('public/frontend/timthumb/scripts/timthumb.php?src='); ?><?php echo $url;//."&w=216&h=294&zc=1"; ?>">
                <h4><?php echo stripslashes($pagelist['location']); ?></h4>
              </div>
            </div>
            <?php
}
else
{
?>
            <div class="col-lg-3">
              <div class="figure"> <img class="img-responsive" src="<?php //echo base_url('public/frontend/timthumb/scripts/timthumb.php?src='); ?><?php echo $url;//."&w=216&h=294&zc=1"; ?>">
                <h4><?php echo stripslashes($pagelist['location']); ?></h4>
              </div>
            </div>
            <div class="col-lg-9">
              <div class="section-title line">
                <h3> <?php echo stripslashes($pagelist['title']); ?></h3>
              </div>
              <?php echo stripslashes($pagelist['desc']); ?> </div>
            <?php
}
?>
            <span class="clearfix"></span> </div>
        </div>
        <?php
			$i++;
		  }
            ?>
      </div>
    </div>
  </div>
</section>
<?php
}
  ?>
<?php
if($this->uri->segment(4)=='special-offers')
{
?>
<section class="white-bg ">
  <div class="container">
    <div class="row">
      <div class="col-md-10 col-sm-9">
        <h1>Special Offers</h1>
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
      <aside  class="left-nav">
        <div id="myCarousel3" class="carousel slide carousel-fade" data-ride="carousel">
          <h3>In the news</h3>
          <div class="nav-carousel"> 
            <!-- Left and right controls --> 
            <a class="left carousel-control" href="#myCarousel3" > <span class="sr-only"><img src="images/carousel-nav-left.png" alt="left" ></span> </a> <a class="right carousel-control" href="#myCarousel3" > <span class="sr-only"><img src="images/carousel-nav-right.png" alt="right" ></span> </a> </div>
          <!-- Indicators --> 
          <!-- Wrapper for slides -->
          <div class="carousel-inner "  role="listbox">
            <div class="item active">
              <ul>
                <li>
                  <div class="list-content">
                    <div class="date"> <span>24</span>
                      <p>SEP 2015</p>
                    </div>
                    <div class="right-list"> <a href="">Chicago Pneumatic Breaker Promotion!</a>
                      <p>There’s no time for downtime on the job. TChicag RX</p>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="list-content">
                    <div class="date"> <span>24</span>
                      <p>SEP 2015</p>
                    </div>
                    <div class="right-list"> <a href="">Chicago Pneumatic Breaker Promotion!</a>
                      <p>There’s no time for downtime on the  Pneumatic RX</p>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="list-content">
                    <div class="date"> <span>24</span>
                      <p>SEP 2015</p>
                    </div>
                    <div class="right-list"> <a href="">Chicago Pneumatic Breaker Promotion!</a>
                      <p>There’s no tThat’s why Chicago Pneumatic RX</p>
                    </div>
                  </div>
                </li>
              </ul>
            </div>
            <div class="item">
              <ul>
                <li>
                  <div class="list-content">
                    <div class="date"> <span>24</span>
                      <p>SEP 2015</p>
                    </div>
                    <div class="right-list"> <a href="">Chicago Pneumatic Breaker Promotion!</a>
                      <p>There’s no time for downtime on the job. That’s why Chicago Pneumatic RX</p>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="list-content">
                    <div class="date"> <span>24</span>
                      <p>SEP 2015</p>
                    </div>
                    <div class="right-list"> <a href="">Chicago Pneumatic Breaker Promotion!</a>
                      <p>There’s no time for downtime on the job. That’s why Chicago Pneumatic RX</p>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="list-content">
                    <div class="date"> <span>24</span>
                      <p>SEP 2015</p>
                    </div>
                    <div class="right-list"> <a href="">Chicago Pneumatic Breaker Promotion!</a>
                      <p>There’s no time for downtime on the job. That’s why Chicago Pneumatic RX</p>
                    </div>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </aside>
      <div class="col-md-9 pull-right">
        <div  class="offer-wrap grey-bg">
          <h2>Special Offers</h2>
          <ul class="row">
            <?php
			foreach($pagelists as $pagelist)
			{
			?>
            <?php
                if($pagelist['image']!='')
                {
                $imagenews=base_url('public/frontend/timthumb/scripts/timthumb.php?src=').base_url('public/uploads/contents/'.$pagelist['image'])."&w=367&h=171&zc=1";	
                }
                else
                {
                $imagenews=base_url('public/frontend/timthumb/scripts/timthumb.php?src=').base_url('public/frontend/images/noimage.jpg')."&w=367&h=171&zc=1";		
                }
                ?>
            <li class="col-md-6">
              <div class="image-wrap"> <a href="<?php echo site_url('contents/view/'.$pagelist['slug']); ?>"><img class="img-responsive" src="<?php echo $imagenews; ?>" alt="CMC" /></a> </div>
              <div class="list-content">
                <h3><a href="<?php echo site_url('contents/view/'.$pagelist['slug']); ?>"><?php echo stripslashes($pagelist['title']); ?></a></h3>
                <p><?php echo stripslashes($pagelist['short_desc']); ?></p>
              </div>
            </li>
            <?php
			}
			  ?>
          </ul>
          <div class="row">
            <div class="col-md-12">
              <div class="pagination-wrap">
                <nav> <?php echo $this->pagination->create_links(); ?> </nav>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php } ?>
