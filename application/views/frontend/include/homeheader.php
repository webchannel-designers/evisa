<div id="wrapper">

      <!--Header Starts-->

      <header class="header_wrapper">

      	

        <div class="logo"> <a href="#"><img src="<?php echo base_url('public/frontend/images/logo.png'); ?>" alt="Astarta" width="169" height="216" border="0"></a>

        </div>

        <div class="menu_right_container">

        	<!--Top Menu Row Starts-->

      <div class="top_menu_row">

                <div class="search_bar">

					<input name="" value="Search here" type="text" class="search_bar_textfld">

					<input name="" type="button" class="search_bar_button">

                </div>

             
				<!--Language Bar Start-->

                <div id="dd" class="language-dropdown" tabindex="1">

                 	  <a href="javascript:void(0);" style="padding-right:0px;"><img style="float:left; margin:3px 10px 0px 0px;"  src="<?php echo base_url('public/frontend/images/'.$this->session->userdata('front_language').'.jpg'); ?>"> <?php echo $language_pair[$this->session->userdata('front_language')]; ?> </a>

			   <?php 

			  // echo $this->session->userdata('front_language');

			   //print_r($langs);

			 if(count($langs)>1){ 

			 $slangs=$this->session->userdata('front_language');

			 ?>

					<ul class="dropdown">

						<?php $i=0; $clang=count($langs); foreach($langs as $lang): $i++; 

						if($slangs==$lang['code'])

						{

						$class="style='display:none'";

						}

						else

						{

						$class="";

						}

						?>

						<li <?php if($clang==$i){ echo 'class="top_last"'; } echo $class; ?>><a href="<?php echo site_url($this->lang->switch_uri($lang['code'])); ?>"><img src="<?php echo base_url('public/frontend/images/'.$lang['code'].'.jpg'); ?>"> <?php echo $lang['name']; ?> </a></li>

						<?php endforeach; ?>

					</ul>

			   <?php } else { ?>

			<a style="width:20px;padding-right:5px;">&nbsp;</a>

			   <!--<li style="width:20px;padding-right:5px;">&nbsp;</li>-->

			   <?php } ?>

				</div>

                <!--Language Bar Eng-->

                

                <div class="language_text">Language :</div>

          </div>

            <!--Top Menu Row End-->

	  <div class="global_navigation">

      

      <?php echo $mainmenu; ?>

               	

          </div>

            

            

        </div> 

         

      </header>

      <!--Header End-->

      <div class="clearfix"></div>

      

      <div class="main-banner">

        

      <div class="flexslider innerslider">

      <div class="apply_box">

          <h1>Apply today</h1>

          <h4>Your adventure starts  here</h4>

          <div class="apply_button"><a href="<?php echo  site_url('apply') ?>">APPLY  Now</a></div>

          <div class="clearfix"></div>

          <p>Need advice? <a href="#">Click here</a></p>

      </div>

          <ul class="slides">

          <?php $nav_str=''; foreach($banners as $banner): 

			//$nav_str .='<li><a href="#"><img src="'.base_url('public/uploads/banners/'.$banner['icon']).'" /></a></li>';

			?>

              <li><img src="<?php echo base_url('public/uploads/banners/'.$banner['image']); ?>" />

                  <div class="banner_title">

                      <h2><?php echo $banner['title']; ?></h2>

                      <h1><?php echo $banner['short_desc']; ?></h1>

                  </div>

              </li>

          <?php

		  endforeach;

		  ?>

          </ul>

      </div>

    <?php

	$hdesc=$hcontent[0]['desc'];

	@$desc1=word_limiter($hdesc,50);

	$hslug=$hcontent[0]['slug'];

	?>

       <section class="welcome_wrapper">

      	<!--<h1>Welcome to Emirates Canadian University College</h1>-->

        <p><?php echo $desc1 ?><span><a href="<?php echo site_url('contents/view/'.$hslug) ?>">Read More</a>

        <img src="<?php echo base_url('public/frontend/images/arrow_right.png'); ?>" width="7" height="11"></span></p>

      </section>

      