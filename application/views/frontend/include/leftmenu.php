<?php foreach($leftmenus as $leftmenu):?>

<div class="academic_calendar_wrapper leftnav_inner">

	<h2><?php echo $leftmenu['head'];?></h2>

	<ul>

	<?php foreach($leftmenu['menus'] as $menu){ ?>

	<li><a target="<?php echo $menu['windowtype']; ?>" href="<?php echo $menu['link']; ?>"><?php echo $menu['name']; ?></a></li>

	<?php } ?>

	</ul>

</div>

<div style="clear:both"></div>

<?php endforeach; ?>