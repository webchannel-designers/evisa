<div id="sidebar">

	<?php   $ic=0;

			foreach($menus as $menu): 

			$ic++; 

			$menuarr=explode('/',$menu['link']); 

			if(isset($menuarr['1'])){

				$currmenu=$menuarr['1'];

			}else{

				$currmenu='';

			}
	?>

	<?php if($ic==1){

			$prefix='';

		  } else {

		  	$prefix='Manage ';

		  }

	?>
        <?php
		if($this->session->userdata('admin_role')==3)
		{
			if($menu['id']==12)
			{
		?>

	<!--<div class="box">

		<div class="h_title">&#8250; <?php echo $prefix.$menu['name']; ?></div>

		<?php if(count($menu['sub_menu'])>0){ ?>

		<ul <?php if($this->uri->segment(2)==$currmenu || $this->uri->segment(2)=='category' || $this->uri->segment(2)=='location'){echo 'id="home"';} ?>>

		 <?php $i=0; foreach($menu['sub_menu'] as $submenu): $adj=($i%2)+1; $i++;?>

			<li class="b<?php echo $adj; ?>"><a class="icon <?php echo $submenu['class']; ?>" href="<?php echo site_url($submenu['link']); ?>" <?php echo $submenu['link'] == 'home' ? 'target="_blank"' : '' ?> ><?php echo $submenu['name']; ?></a></li>

		 <?php endforeach; ?>

		 <?php if($menu['id']=='9'){ 

		 foreach($frontmenus as $frontmenu):$adj=($i%2)+1; $i++;

		 ?>	

		 <li class="b<?php echo $adj; ?>"><a class="icon report" href="<?php echo site_url('admin/menus/menuitems/'.$frontmenu['id']); ?>"><?php echo $frontmenu['name']; ?></a></li>

		 <?php endforeach; } ?>

		</ul>

		<?php } ?>

	</div>-->	
    <?php
			}
		}
		else
		{
			//print_r($menu);
			?>
            <!--<div class="box">

		<div class="h_title">&#8250; <?php echo $prefix.$menu['name']; ?></div>

		<?php if(count($menu['sub_menu'])>0){?>

		<ul <?php if($this->uri->segment(2)==$currmenu || ($menu['id']==12 and $this->uri->segment(2)=="category") || ($menu['id']==12 and $this->uri->segment(2)=="location")){echo 'id="home"';} ?>>

		 <?php $i=0; foreach($menu['sub_menu'] as $submenu): $adj=($i%2)+1; $i++;?>
			<li class="b<?php echo $adj; ?>"><a class="icon <?php echo $submenu['class']; ?>" href="<?php echo site_url($submenu['link']); ?>" <?php echo $submenu['link'] == 'home' ? 'target="_blank"' : '' ?> ><?php echo $submenu['name']; ?></a></li>
		 <?php endforeach; ?>

		 <?php if($menu['id']=='9'){ 

		 foreach($frontmenus as $frontmenu):$adj=($i%2)+1; $i++;

		 ?>	

		 <li class="b<?php echo $adj; ?>"><a class="icon report" href="<?php echo site_url('admin/menus/menuitems/'.$frontmenu['id']); ?>"><?php echo $frontmenu['name']; ?></a></li>

		 <?php endforeach; } ?>

		</ul>

		<?php } ?>

	</div>-->
            <?php
		}
	?>

<?php endforeach; ?>

</div>