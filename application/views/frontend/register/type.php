      <?php echo $mode; ?>
     <option value="">Type</option>
	  <?php foreach($types as $contentcat): ?>

      <option value="<?php echo $contentcat['id']; ?>" <?php if($mode==$contentcat['id']) { ?> selected="selected"<?php } ?>><?php echo $contentcat['type']; ?></option>

      <?php endforeach; ?>
