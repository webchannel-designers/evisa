<div id="content-left-top" class="commmon-left">


	<h2><?php echo $head;?></h2>

	<ul>

	<?php foreach($menus as $menu){ 

	if($menu['id']==$this->currentmenu){$current=' class="active"';} else { $current=''; }

	?>

	<li<?php echo $current; ?>><a target="<?php echo $menu['windowtype']; ?>" href="<?php echo $menu['link']; ?>"><?php echo $menu['name']; ?></a></li>

	<?php } ?>

	</ul>

</div>
