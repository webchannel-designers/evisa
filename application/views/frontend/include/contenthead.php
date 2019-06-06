<h1> <?php echo $this->pagetitle; ?></h1>
<div class="bred_right">
	<a href="javascript:void(0);" class="user-icon"><span class="st_sharethis_custom" style="display:block;padding:10px;">&nbsp;&nbsp;</span></a>
		<a href="href="<?php echo site_url('home/emailurl')?>"?TB_iframe=true&amp;height=520&amp;width=307" rel="sexylightbox">&nbsp;</a>
	<a href="javascript:void(0);" class="print-icon">&nbsp;</a>
	<!--<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
<script type="text/javascript">
	stLight.options({
		publisher:'19424241345210dbea6e3e7',
	});
</script>-->
</div>
<div class="breadcrumbs">
<ul>
<?php 
$i=0; foreach($this->breadcrumbarr as $link => $text): $i++;
$attr='';
if($i==1){$attr=array('class'=>'home_breadcrumb');}
if($text!="Top menu")
{
?>
<li><?php echo anchor($link,$text,$attr); ?></li>
<?php } endforeach; ?>
</ul>
</div>