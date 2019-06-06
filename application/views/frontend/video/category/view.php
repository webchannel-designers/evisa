<div class="inner-content-full">

	<!--<h1><?php //echo $this->pagetitle; ?></h1>-->

	<div id="galleria">

	<?php foreach($galleries as $gallery): if($gallery['image']!=''){ ?>

	<a href="<?php echo base_url('public/uploads/gallery/main_'.$gallery['image']); ?>">

		<img 

			src="<?php echo base_url('public/uploads/gallery/thumb_'.$gallery['image']); ?>",

			data-big="<?php echo base_url('public/uploads/gallery/main_'.$gallery['image']); ?>"

			data-title="<?php echo $gallery['title']; ?>"

		/>

	</a>

	<?php } endforeach; ?>

	</div>

</div>

