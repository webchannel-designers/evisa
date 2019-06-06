        <ol class="breadcrumb breadcrumb-title">
		<?php 
        
        $i=0; foreach($this->breadcrumbarr as $link => $text): $i++;
        
        $attr='';
        
        if($i==1){$attr=array('class'=>'home_breadcrumb');}
        
        if($text=="Top menu" or $text=="General")
        
        {
		}
		else
		{
        
        ?>
        
        <li <?php if($link==current_url()) { ?> class="active breadcrumb-item"<?php } else { ?> class="breadcrumb-item"<?php } ?>><a href="<?php echo $link ?>"><?php echo $text?></a><?php //echo anchor($link,$text,$attr); ?></li>
        
        <?php } endforeach; ?>
        </ol>
