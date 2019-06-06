<div class="row">

<!--	<div class="col-sm-3">-->
    <?php
if($content->image!='')
{
$imagenews=base_url('public/uploads/contents/'.$content->image);	
}
/*else
{
$imagenews=base_url('public/frontend/images/no-image.png');		
}*/

$days = (strtotime($content->end_time) - strtotime($content->date_time)) / (60 * 60 * 24);
?>

		<!--<img class="img-responsive" src="<?php //echo $imagenews ?>" />--><!--</div>-->
	<div class="col-sm-12">
<p>
<a class="btn violet pull-right"  href="<?php echo site_url('register/events/'.$content->slug) ?>">Register Here</a></p>
<h3 class="addedon">Date : <?php echo date("l, jS F",strtotime($content->date_time)); if($days!=0) {?> - <?php echo date("l, jS F Y",strtotime($content->end_time)); }?></h3>
<p>Category : <?php echo $catcontent->name; ?></p>
<!--<p>Duration : <?php //echo $days ?> days</p>-->
<p>Venue : <?php echo $content->short_desc;?></p>


<p>Telephone : <?php echo $content->keywords;?></p>
<?php
if($content->image!='')
{
?>
<img class="img-responsive" src="<?php echo $imagenews ?>" />
<?php
}
?>
	<p><?php if($content->desc!='') { echo $content->desc; } ?></p>
<p>
<a class="btn violet pull-right"  href="<?php echo site_url('register/events/'.$content->slug) ?>">Register Here</a></p>
</div>
</div>
