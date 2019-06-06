<div id="content-left-btm" class="commmon-left">
<h1><?php echo convert_lang('Latest News',$this->alphalocalization); ?></h1>
<?php
	foreach($homenews as $homenew):
	$news_title=word_limiter($homenew['desc'],10);

	?>
<p><a href="<?php echo site_url('news/view/'.$homenew['slug']) ?>"><?php echo $news_title ?></a></p>
<h3><?php echo date('F', strtotime($homenew['date_time'])) ."  / " . date('d', strtotime($homenew['date_time']))." / ".date('Y', strtotime($homenew['date_time'])) ?> </h3>

<?php
endforeach;

	?>	

<h2><a href="<?php echo site_url('news/lists/news') ?>"><?php echo convert_lang('View all news',$this->alphalocalization); ?></a></h2>
</div>


