<!--<header>
<div class="container">
  
      <nav class="navbar navbar-default megamenu">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo site_url('/')?>"><img class="logo1" src="<?php echo base_url('public/frontend/images/logo1.png')?>" alt="logo" /> <img class="logo2" src="<?php echo base_url('public/frontend/images/logo2.png')?>" alt="logo" /> </a>
          </div>
		  <div class="navbar-header-right">
		  
			  <div class="menu-top">
				<div class="logo-txt"><img src="<?php echo base_url('public/frontend/images/logo2.png')?>" alt="logo" /></div>
				<div class="top-right">
					<ul >
					  <li class="top-phone"><?php echo $this->alphasettings['PHONE_SLUG']; ?></li>
                      <li class="equiry-basket">
										
										<a class="click-basket"><img src="<?php echo base_url('public/frontend/images/basket.png')?>" alt="enquiery basket" /></a>
                                        <div id="basket">
                                        </div>
									</li>
					  <li class="top-search"><a class="switch"><img src="<?php echo base_url('public/frontend/images/search-btn.png')?>" alt="search" /></a>
					  
					  <div class="search-box" style="display:none;">
						    <?php $attributes = array( 'id' => 'target','class'=>'search-form');
                  echo form_open('result', $attributes); ?>
								<input type="text"  placeholder="Enter keyword" name="keyword">
								<button  type="submit">Search</button>
							 <?php echo form_close(); ?>
					  
					  </div>
					  </li>
					</ul> 
				</div>
				<div class="top-menu">
					<ul class="topnav">
					  <li class="active"><a href="<?php echo site_url('/')?>">Home</a></li>
					  <li><a href="<?php echo site_url('contactus')?>">Contact Us</a></li>
					</ul> 
				</div>
				
			  </div>
			  
			  <div id="navbar" class="navbar-collapse collapse">
				<ul class="nav navbar-nav top-menu-mobile">
				  <li><a href="<?php echo site_url('/')?>">Home</a></li>
				  <li><a href="<?php echo site_url('contactus')?>">Contact Us</a></li>
				</ul>
                <?php echo $mainmenu; ?>
				
				<ul class="top-social navbar-right">
                <?php if($this->alphasettings['FACEBOOK_LINK']!=''){ ?>
				  <li ><a href="<?php echo $this->alphasettings['FACEBOOK_LINK']; ?>" target="_blank"><img src="<?php echo base_url('public/frontend/images/topfb.png')?>" alt="Facebook" /></a></li>
                  <?php } ?>
                  <?php if($this->alphasettings['GOOGLEPLUS_LINK']!=''){  ?>
				  <li><a href="<?php echo $this->alphasettings['GOOGLEPLUS_LINK']; ?>" target="_blank"><img src="<?php echo base_url('public/frontend/images/topgp.png')?>" alt="GooglePlus" /></a></li>
                  <?php } ?>
                  <?php if($this->alphasettings['YOUTUBE_LINK']!=''){ ?>
				  <li><a href="<?php echo $this->alphasettings['YOUTUBE_LINK']; ?>" target="_blank"><img src="<?php echo base_url('public/frontend/images/toputube.png')?>" alt="Youtube" /></a></li>
                  <?php } ?>
                  <?php if($this->alphasettings['LINKEDIN_LINK']!=''){ ?>
				  <li><a href="<?php echo $this->alphasettings['LINKEDIN_LINK']; ?>" target="_blank"><img src="<?php echo base_url('public/frontend/images/topin.png')?>" alt="Linkedin" /></a></li>
                  <?php } ?>
				</ul>			
			  </div>
			  
			</div>
			
		</div>
      </nav>
  </div>
  </header>-->
<?php if(count(@$banners)>0) {   ?>  
<?php $arr=array('green-bg','grey-bg','yellow-bg'); ?>
  <!--<div class="scroller-wrap">
  
			<div class="jcarousel-wrapper" >
			
                <div class="jcarousel">
                    <ul data-equal="li > div">
                    	<?php 
						$i=1;
						$j=0;
						foreach($banners as $banner): ?>
                        <?php
						if($j==3)
						{
							$j=0;
						}
						?>
                        <li class="<?php echo $arr[$j]; ?>">
                        <a href="<?php echo $banner['link']; ?>">
                        <div class="wrap-crousel-content">
                        <?php
						if($i%2==0)
						{
						?>
                        <div class="wrap-text second-banner">
							<h2><?php echo $banner['title']; ?></h2>
							<?php echo $banner['short_desc']; ?>
						</div>
                        <img src="<?php echo base_url('public/uploads/banners/'.$banner['image']); ?>" alt="<?php echo stripslashes(strip_tags($banner['short_desc'])); ?>">
                        <?php
                        }
                        else
                        {
						?>
                        <img src="<?php echo base_url('public/uploads/banners/'.$banner['image']); ?>" alt="<?php echo stripslashes(strip_tags($banner['short_desc'])); ?>">
                        <div class="wrap-text first-banner">
							<h2><?php echo $banner['title']; ?></h2>
							<?php echo $banner['short_desc']; ?>
						</div>
                        <?php
                        }
						?>
                        </div>
                        </a>
                        </li>
                        <?php $i++;$j++;endforeach;  ?>
                    </ul>
                </div>

                <a href="#" class="jcarousel-control-prev">&lsaquo;</a>
                <a href="#" class="jcarousel-control-next">&rsaquo;</a>
            </div>

	</div>-->
    <?php } else if(@$this->pagebannner!="") { ?>
	<!--<section  class="inner-spotlight">
    <div class="image-wrap-spotlight">
      <img class="img-responsive" src="<?php echo base_url('public/frontend/timthumb/scripts/timthumb.php?src='); ?><?php echo $this->pagebannner."&w=1600&h=320&zc=1"; ?><?php //echo $this->pagebannner; ?>" alt="CMC" />
    </div>
  	
  </section>-->    
	<?php } ?>
    
    <div class="mobile-nav"><a href="<?php echo site_url('/')?>" class="logo"><img src="<?php echo base_url('public/frontend/images/page-logo.png')?>" alt="" class="img-responsive"/></a>
      <nav class="mobile-menu">
      <?php echo $mainmenu; ?>
        <!--<ul>
          <li class="active"><a href="index.html">Home</a></li>
          <li><a href="coming-soon.html">About ECS</a></li>
          <li><a href="coming-soon.html">membership</a></li>
          <li><a href="coming-soon.html">Our Services</a>
            <div class="subnav">
              <ul>
                <li><a href="coming-soon.html">Services One</a></li>
                <li><a href="coming-soon.html">Services Two</a></li>
                <li><a href="coming-soon.html">Services Three</a></li>
              </ul>
            </div>
          </li>
          <li><a href="coming-soon.html">Newsletters</a></li>
          <li><a href="coming-soon.html">Events Calendar</a></li>
          <li><a href="coming-soon.html">Gallery</a></li>
          <li><a href="coming-soon.html">resources</a></li>
          <li><a href="coming-soon.html">Media center</a></li>
          <li><a href="coming-soon.html">Contact Us</a></li>
        </ul>-->
        <div class="quick-contact">
        <div class="cell"><a href="<?php echo site_url('login/register'); ?>" class="icon mail"><span>Member Registration</span></a></div>
          <div class="cell"><a href="mailto:<?php echo $this->alphasettings['ADMIN_EMAIL']; ?>" class="icon mail"><span><?php echo $this->alphasettings['ADMIN_EMAIL']; ?></span></a></div>
          <div class="cell"><a href="tel:<?php echo $this->alphasettings['PHONE_SLUG']; ?>" class="icon phone"><span><?php echo $this->alphasettings['PHONE_SLUG']; ?></span></a></div>
          <div class="social">
            <ul>
              
                <?php if($this->alphasettings['FACEBOOK_LINK']!=''){ ?>
				  <li ><a class="icon-facebook" href="<?php echo $this->alphasettings['FACEBOOK_LINK']; ?>" target="_blank"></a></li>
                  <?php } ?>
                  <?php if($this->alphasettings['GOOGLEPLUS_LINK']!=''){  ?>
				  <li><a class="icon-gplus" href="<?php echo $this->alphasettings['GOOGLEPLUS_LINK']; ?>" target="_blank"></a></li>
                  <?php } ?>
                  <?php if($this->alphasettings['TWITTER_LINK']!=''){ ?>
				  <li><a class="icon-twitter" href="<?php echo $this->alphasettings['TWITTER_LINK']; ?>" target="_blank"></a></li>
                  <?php } ?>
                  <?php if($this->alphasettings['PIN_LINK']!=''){ ?>
				  <li><a class="icon-pinterest-circled" href="<?php echo $this->alphasettings['PIN_LINK']; ?>" target="_blank"></a></li>
                  <?php } ?>
                  <!--<li><a href="#" class="icon-dribbble"></a></li>-->
                  <?php if($this->alphasettings['LINKEDIN_LINK']!=''){ ?>
				  <li><a class="icon-linkedin" href="<?php echo $this->alphasettings['LINKEDIN_LINK']; ?>" target="_blank"></a></li>
                  <?php } ?>
                  <?php if($this->alphasettings['INSTAGRAM_LINK']!=''){ ?>
				  <li><a class="icon-instagram" href="<?php echo $this->alphasettings['INSTAGRAM_LINK']; ?>" target="_blank"></a></li>
                  <?php } ?>
              
            </ul>
          </div>
        </div>
      </nav>
    </div>
    
    
    <header>
      <div class="header-top">
        <div class="container">
          <div class="row">
            <div class="col-md-3">
              <p>Welcome to Emirates Cardiac Society</p>
            </div>
            <div class="col-md-9 pull-right text-right">
              <div class="quick-contact">
            <?php
			if($this->session->userdata('userid'))
			{
			echo 'Welcome '.$this->session->userdata('fname');
			?>
            <div class="cell">
            <a href="<?php echo site_url('login/myhome'); ?>">My Home</a></div>
            <div class="cell">
            <a href="<?php echo site_url('home/do_logout'); ?>">Logout</a>
            </div>
            <?php
			}
			else
			{
			?>
            <a class='icon-sign login fancybox.iframe' href="<?php echo site_url('login'); ?>">Sign In</a>
            <?php
			}
			?>
              
			  <?php
                if(!$this->session->userdata('userid'))
                {
              ?>
        		<div class="cell"><a href="<?php echo site_url('login/register'); ?>"><span>Member Registration</span></a></div>
                <?php
				}
				?>
                <div class="cell"><a href="mailto:<?php echo $this->alphasettings['ADMIN_EMAIL']; ?>" class="icon mail"><span><?php echo $this->alphasettings['ADMIN_EMAIL']; ?></span></a></div>
                <div class="cell"><a href="tel:<?php echo $this->alphasettings['PHONE_SLUG']; ?>" class="icon phone"><span><?php echo $this->alphasettings['PHONE_SLUG']; ?></span></a></div>
              </div>
              <div class="social">
                <ul>
                <?php if($this->alphasettings['FACEBOOK_LINK']!=''){ ?>
				  <li ><a class="icon-facebook" href="<?php echo $this->alphasettings['FACEBOOK_LINK']; ?>" target="_blank"></a></li>
                  <?php } ?>
                  <?php if($this->alphasettings['GOOGLEPLUS_LINK']!=''){  ?>
				  <li><a class="icon-gplus" href="<?php echo $this->alphasettings['GOOGLEPLUS_LINK']; ?>" target="_blank"></a></li>
                  <?php } ?>
                  <?php if($this->alphasettings['TWITTER_LINK']!=''){ ?>
				  <li><a class="icon-twitter" href="<?php echo $this->alphasettings['TWITTER_LINK']; ?>" target="_blank"></a></li>
                  <?php } ?>
                  <?php if($this->alphasettings['PIN_LINK']!=''){ ?>
				  <li><a class="icon-pinterest-circled" href="<?php echo $this->alphasettings['PIN_LINK']; ?>" target="_blank"></a></li>
                  <?php } ?>
                  <!--<li><a href="#" class="icon-dribbble"></a></li>-->
                  <?php if($this->alphasettings['LINKEDIN_LINK']!=''){ ?>
				  <li><a class="icon-linkedin" href="<?php echo $this->alphasettings['LINKEDIN_LINK']; ?>" target="_blank"></a></li>
                  <?php } ?>
                  <?php if($this->alphasettings['INSTAGRAM_LINK']!=''){ ?>
				  <li><a class="icon-instagram" href="<?php echo $this->alphasettings['INSTAGRAM_LINK']; ?>" target="_blank"></a></li>
                  <?php } ?>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="header-bottom">
        <div class="container">
          <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-9"><a href="<?php echo site_url('/')?>" title="Emirates Cardiac Society" class="page-logo"><img src="<?php echo base_url('public/frontend/images/page-logo.png')?>" alt="Emirates Cardiac Society" class="img-responsive"/></a></div>
            <figure class="col-md-2 col-xs-4"><img src="<?php echo base_url('public/frontend/images/logo-ema.png')?>" alt="Emirates Medical Association" class="img-responsive"/></figure>
            <button class="nav-trigger glyphicon glyphicon-align-justify"></button>
          </div>
        </div>
      </div>
      <div class="nav-wrapper black">
        <div class="container">
          <nav class="page-nav">
          <?php echo $mainmenu; ?>
            <!--<ul>
              <li class="active"><a href="index.html">Home</a></li>
              <li><a href="coming-soon.html">About ECS</a></li>
              <li><a href="coming-soon.html">membership</a></li>
              <li><a href="coming-soon.html">Our Services</a></li>
              <li><a href="coming-soon.html">Newsletters</a></li>
              <li><a href="coming-soon.html">Events Calendar</a></li>
              <li><a href="coming-soon.html">Gallery</a></li>
              <li><a href="coming-soon.html">resources</a></li>
              <li><a href="coming-soon.html">Media center</a></li>
              <li><a href="coming-soon.html">Contact Us</a></li>
            </ul>-->
          </nav>
        </div>
      </div>
    </header>
	<?php if(count(@$banners)>0) {   ?>  
    
    <section data-sequence="500" data-appear-top-offset="-100" class="page-spotlight animatedParent animateOnce">
      <div id="home-slider" class="owl-carousel home-slider">
      
                    	<?php 
						$i=1;
						$j=0;
						foreach($banners as $banner): 
						?>
      
        <div class="item">
          <div class="container">
            <div data-id="<?php echo $i; ?>" class="caption animated fadeInRightShort">
            <?php echo $banner['short_desc']; ?>
              <!--<a href="#" class="btn red">CONTACT NOW</a>-->
            </div>
          </div><img src="<?php echo base_url('public/uploads/banners/'.$banner['image']); ?>" alt="" class="img-responsive"/>
        </div>
        
                        <?php $i++;$j++;endforeach;  ?>
        
      </div>
    </section>
        <?php } else if(@$this->pagebannner!="") { ?>
        
<section class="page-spotlight inner-spotlight"><img src="<?php echo base_url('public/frontend/timthumb/scripts/timthumb.php?src='); ?><?php echo $this->pagebannner."&w=1600&h=320&zc=1"; ?><?php //echo $this->pagebannner; ?>" alt="" class="img-responsive"/></section>
        
        <?php } ?>
