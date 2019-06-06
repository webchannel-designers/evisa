<link rel="stylesheet" type="text/css" href="<?php echo base_url('public/admin/css/rating.css'); ?>" />
<?php echo form_open('admin/careers/rateapplication/'.$job->id.'/'.$this->uri->segment(5),array('id'=>'rateform','name'=>'rateform')); ?>
 <div class="element rating2">
			<input type="radio" id="star1" name="r1" value="5" <?php if($job->rating==5) { ?> checked="checked"<?php } ?> />
            <label class = "full" for="star1" title="Awesome - 1 stars" ></label>
            <input type="radio" id="star2" name="r1" value="4" <?php if($job->rating==4) { ?> checked="checked"<?php } ?>  />
            <label class = "full" for="star2" title="Awesome - 2 stars"></label>
            <input type="radio" id="star3" name="r1" value="3" <?php if($job->rating==3) { ?> checked="checked"<?php } ?>  />
            <label class = "full" for="star3" title="Awesome - 3 stars"></label>
            <input type="radio" id="star4" name="r1" value="2" <?php if($job->rating==2) { ?> checked="checked"<?php } ?>  />
            <label class = "full" for="star4" title="Awesome - 4 stars"></label>
            <input type="radio" id="star5" name="r1" value="1" <?php if($job->rating==1) { ?> checked="checked"<?php } ?>  />
            <label class = "full" for="star5" title="Awesome - 5 stars"></label>
</div>
<div class="entry" style="text-align:center;">
   <input type="submit" name="butSub" value="Rate" class="button rate-btn" onclick="$.fn.fancybox.close()" />
</div>
<?php echo form_close(); ?>