<div class="news-content">   

<?php

	foreach($pagelists as $cat) {

	$ndesc=word_limiter($cat['desc'],30);

	$nid=$cat['id'];

	$slug=$cat['slug'];

	$date=date("F j  Y",strtotime($cat['date_time']));

?>

<div>

	<a href="<?php echo site_url('news/view/'.$slug)?>">

	<h2><?php echo stripslashes($cat['title']); ?></h2>

	<span class="date"><?php echo $date ?></span>     

	<p><?php echo $ndesc ?></p>       

	</a>

</div>

<?php

	}

?>

</div>