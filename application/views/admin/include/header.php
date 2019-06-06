<div id="header">

	<div id="top">

		<div class="left">

			<p>Welcome, <strong><?php echo $this->session->userdata('admin_name');?></strong> [ <a href="<?php echo site_url('admin/home/logout'); ?>">logout</a> ]</p>

		</div>

		<div class="right">

			<!--<div class="header-right align-right">

			<?php echo form_open('admin/home/language'); ?>

				<label>Language:</label>

				<select name="language" class="language" onChange="this.form.submit();">

					<?php foreach($langs as $lang): ?>

						<option value="<?php echo $lang['code']; ?>" <?php if($this->session->userdata('admin_language')==$lang['code']){ echo 'selected="selected"'; }?>><?php echo $lang['name']; ?></option>

					<?php endforeach; ?>

				</select>

				<input type="hidden" name="return" value="<?php echo uri_string(); ?>" />

			<?php echo form_close(); ?>

			<p style="padding:4px 10px;">Last login: <strong><?php echo date('d-m-Y H:i:s',strtotime($login->login_date))?></strong></p>

			</div>-->

		</div>

	</div>
    
	<div id="nav">

		<ul>

		<?php foreach($menus as $menu): ?>
        <?php //print_r($_SESSION); 
		//print_r($menu); ?>
        <?php
		if($this->session->userdata('admin_role')==3)
		{
		
       
        	if($menu['id']==12)
			{
		?>
                       
           
                                       
               <li class="upp"><a href="<?php echo site_url('admin/careers');?>">Job management</a>
            	<ul>
                	
					<li>&#8250;<a href="<?php echo site_url('admin/careers/jobs');?>">Manage Jobs</a></li>
	
				</ul>

				
			</li>
                  
		                   
            <li class="upp"><a href="<?php echo site_url('admin/careers');?>">Job seeker management</a>
            	<ul>
                
					<li>&#8250; <a href="<?php echo site_url('admin/careers/applications');?>">Pending Applicants</a></li>

				
					<li>&#8250; <a href="<?php echo site_url('admin/careers/applications/Y');?>">Shortlisted Applicants</a></li>

				
					<li>&#8250; <a href="<?php echo site_url('admin/careers/suspend');?>">Suspended Applicants</a></li>
	
				</ul>

				
			</li>
                  
		
		<li class="upp"><a href="<?php echo site_url('admin/careers');?>">Settings</a>
            	<ul>
                	<li>&#8250; <a href="<?php echo site_url('admin/category/lists');?>">Category Management </a></li>

					<li>&#8250; <a href="<?php echo site_url('admin/location/lists');?>">Location Management</a></li>
                    
                    <li>&#8250; <a href="<?php echo site_url('admin/home/changepwd');?>">Change password</a></li>
				
				</ul>
				
			</li>
           
           
            <li class="upp" style="display: none;"><a href="<?php echo site_url($menu['link']); ?>"><?php echo $menu['name']; ?></a>

				<?php if(count($menu['sub_menu'])>0){?>

				<ul>

				<?php foreach($menu['sub_menu'] as $submenu): ?>

					<li>&#8250; <a href="<?php echo site_url($submenu['link']); ?>" <?php echo $submenu['link'] == 'home' ? 'target="_blank"' : '' ?>><?php echo $submenu['name']; ?></a></li>

				<?php endforeach; ?>

				<?php if($menu['id']=='9'){ 

					 foreach($frontmenus as $frontmenu):

					 ?>	

					 <li>&#8250; <a href="<?php echo site_url('admin/menus/menuitems/'.$frontmenu['id']); ?>"><?php echo $frontmenu['name']; ?></a></li>

				<?php endforeach; } ?>

				</ul>

				<?php }  ?>

			</li>
            
               <?php
				}
                
                
				}
				else if($this->session->userdata('admin_role')==2)
				{
					if($menu['id']==162 or $menu['id']==174)
					{
					?>
                    
<li class="upp"><a href="<?php echo site_url($menu['link']); ?>"><?php echo $menu['name']; ?></a>

				<?php if(count($menu['sub_menu'])>0){?>

				<ul>

				<?php foreach($menu['sub_menu'] as $submenu): ?>

					<li>&#8250; <a href="<?php echo site_url($submenu['link']); ?>" <?php echo $submenu['link'] == 'home' ? 'target="_blank"' : '' ?>><?php echo $submenu['name']; ?></a></li>

				<?php endforeach; ?>

				</ul>

				<?php }  ?>

			</li>                    
					<?php
					}
				}

				else
				{
					?>
			<li class="upp"><a href="<?php echo site_url($menu['link']); ?>"><?php echo $menu['name']; ?></a>

				<?php if(count($menu['sub_menu'])>0){?>

				<ul>

				<?php foreach($menu['sub_menu'] as $submenu): ?>

					<li>&#8250; <a href="<?php echo site_url($submenu['link']); ?>" <?php echo $submenu['link'] == 'home' ? 'target="_blank"' : '' ?>><?php echo $submenu['name']; ?></a></li>

				<?php endforeach; ?>

				<?php if($menu['id']=='9'){ 

					 foreach($frontmenus as $frontmenu):

					 ?>	

					 <li>&#8250; <a href="<?php echo site_url('admin/menus/menuitems/'.$frontmenu['id']); ?>"><?php echo $frontmenu['name']; ?></a></li>

				<?php endforeach; } ?>

				</ul>

				<?php }  ?>

			</li>
                    
                    <?php
				}
					 ?>

		<?php endforeach; ?>

		</ul>

	</div>

</div>