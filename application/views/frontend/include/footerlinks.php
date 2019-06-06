<?php $menucount = count($footermenus); $i=0; foreach($footermenus as $footermenu): $i++; 

if($menucount==$i){ $ulclass =' class="nob"'; } else { $ulclass=''; }

?>

<ul<?php echo $ulclass; ?> class="commmon-left">

<li class="h3"><?php echo $footermenu['head']; ?></li>

<?php foreach($footermenu['menus'] as $menu): ?>

<li><p><a target="<?php echo $menu['windowtype']; ?>" href="<?php echo $menu['link']; ?>" style="text-decoration:none"><?php echo $menu['name']; ?></a></p></li>

<?php endforeach; ?>

</ul>

<?php endforeach; ?>

<script type="text/javascript">

var footerlinksheight = $("#mySlideContent").height();

$("#mySlideContent ul").height(footerlinksheight);

</script>