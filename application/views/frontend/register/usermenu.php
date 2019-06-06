<aside>
                    <ul class="aside-nav">
            <?php
			if($this->session->userdata('userid'))
			{
			//echo 'Welcome '.$this->session->userdata('fname');
			?>
            <li <?php if($this->uri->segment(3)=="myhome") { ?>class="active"<?php } ?>><a href="<?php echo site_url('login/myhome'); ?>">My Home</a></li>
            <li <?php if($this->uri->segment(3)=="changepass") { ?>class="active"<?php } ?>><a href="<?php echo site_url('login/changepass'); ?>">Change Password</a></li>
            <!--<li <?php if($this->uri->segment(3)=="myhome") { ?>class="active"<?php } ?>><a href="<?php echo site_url('login/lists'); ?>">Events List</a></li>-->
            <!--<li <?php if($this->uri->segment(3)=="bloglists" or $this->uri->segment(3)=="addblog" or $this->uri->segment(3)=="editblog") { ?>class="active"<?php } ?>><a href="<?php echo site_url('login/bloglists'); ?>">Patient Education Articles</a></li>
            <li <?php if($this->uri->segment(3)=="imagelists" or $this->uri->segment(3)=="addimage" or $this->uri->segment(3)=="editimage") { ?>class="active"<?php } ?>><a href="<?php echo site_url('login/imagelists'); ?>">Events Image</a></li>-->
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
				
			</aside>