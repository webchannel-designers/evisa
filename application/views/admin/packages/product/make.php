      <?php echo $mode; ?>
     <option value="">Brand</option>
	  <?php foreach($makes as $contentcat): ?>

      <option value="<?php echo $contentcat['id']; ?>" <?php if($mode==$contentcat['id']) { ?> selected="selected"<?php } ?>><?php echo $contentcat['title']; ?></option>

      <?php endforeach; ?>
