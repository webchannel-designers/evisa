<div class="help">
<?php if(count($categories) > '0'){ ?>
<?php foreach($categories as $category): ?>
<h3><?php echo $category['name']; ?></h3>
<?php $currentdownloads = $downloads[$category['id']];?>
<ul class="downloads">
<?php 
  if(count($currentdownloads) > '0'){
  foreach($currentdownloads as $currentdownload): ?>
<li><a class="download-pdf" href="<?php echo site_url('downloads/download/'.$currentdownload["id"])?>"><?php echo $currentdownload['title']?></a></li>
<?php endforeach; ?>
<?php
  }else{
	  echo '<li>'.convert_lang('No Records Found!',$this->alphalocalization).'</li>';
}
  ?>
</ul>
<?php endforeach; ?>
<?php } else { ?>
<h3><?php echo convert_lang('No Records Found!',$this->alphalocalization); ?></h3>
<?php }  ?>
</div>