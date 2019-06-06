
<!--<section class="section page-about inner-page">
      <div class="container">
        <div class="section-title normal">
          <h2><?php echo convert_lang('Activation',$this->alphalocalization); ?></h2>
        </div>
        <div class="col-md-12">
                            <?php if($active==1) {  ?>
                            Activated Successfully
                            <?php } else { ?>
                            Error on activation
                            <?php } ?>
         </div>
			<ul class="aside-nav col-md-4">
            <?php
			if($this->session->userdata('userid'))
			{
			//echo 'Welcome '.$this->session->userdata('fname');
			?>
            <li><a href="<?php echo site_url('login/myhome'); ?>">My Home</a></li>
            <li><a href="<?php echo site_url('login/changepass'); ?>">Change Password</a></li>
            <li><a href="<?php echo site_url('login/lists'); ?>">Vehicle List</a></li>
            <li><a href="<?php echo site_url('home/do_logout'); ?>">Logout</a></li>
            <?php
			}
			else
			{
			?>
            <li><a class='icon-sign login fancybox.iframe' href="<?php echo site_url('login'); ?>">Sign In</a></li>
            <?php
			}
			?>
          </ul>	                            
        
        <span class="clearfix"></span>
        
      </div>
    </section>-->
    
    
    
    <section class="white section">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-md-push-1 text-center">
            <div class="section-title br">
              <h2>Activation</h2>
            </div>
          </div>
        </div><span class="clearfix"></span>
        
		<div class="col-md-12">
                            <?php if($active==1) {  ?>
                            Activated Successfully
                            <?php } else { ?>
                            Error on activation
                            <?php } ?>
         </div>
      </div>
    </section>

