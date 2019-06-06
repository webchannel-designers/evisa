
<!--<div class="section-wrapper grey-shade inner-content about-holder">
      <div class="utilites-wrapper">
        <div class="row">
          <div class="col-md-9 col-sm-9">
            <ol class="breadcrumb">
            <?php 

			$i=0; foreach($this->breadcrumbarr as $link => $text): $i++;			

			if($i==1){$attr=' class="home"';} else {$attr='';}?>
            <li<?php echo $attr; ?>>
              <?php if($link=='nolink'){ echo '<a href="javascript:void(0);">'.$text.'</a>'; } else { echo anchor($link,$text); } ?>
            </li>
            <?php endforeach; ?>
            </ol>
          </div>
          <div class="col-md-3 col-sm-3">
            <div class="utilities">
              <ul>
                <li><a href="<?php echo site_url('home/emailurl')?>?lightbox[iframe]=true&lightbox[width]=406&lightbox[height]=305" class="enquiry fancybox.iframe icon-mail"></a></li>
  				<li><a class="a2a_dd icon-share" href="https://www.addtoany.com/share" title="Share"><i class="fa fa-share-alt"></i></a></li>              
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="abt">
        <div class="container-wrapper white">
          <div class="page-title">
            <h2>Search</h2>
            <span class="lightDark"></span>
          </div>
          <div class="row">
            
        <?php if($error!=''){ 

echo $error;

} else {
	?>
        <ul>
          <?php

if(count($pagelists)>0) {

foreach($pagelists as $pagelist): 

?>
          <li>
            <h3><?php echo $pagelist['title']; ?></h3>
            <p><?php echo strip_tags($pagelist['short_desc']); ?></p>
            <?php
@$results = explode('/', trim($pagelist['url'],'/'));
if(count($results) > 0){
$slug = $results[count($results) - 1];
}
?>
            <a class="btn br-grey" href="<?php echo site_url($pagelist['url']); ?>"><?php echo convert_lang('View Details',$this->alphalocalization); ?></a></li>
          <?php 
endforeach; 
?>
        </ul>
        <?php

} else {

echo convert_lang('No Records Found!',$this->alphalocalization);

} ?>
        <div class="list-pagination"> <?php echo $this->pagination->create_links(); ?> </div>
        <?php

}

?>
            
          </div>
        </div>
      </div>
    </div>-->
    
    
    
    <section class="white section">
      <div class="container">
        <div class="row">
          <div class="col-md-12 col-md-push-1 text-center">
            <div class="section-title br">
              <h2>Search Results</h2>
            </div>
          </div>
        </div><span class="clearfix"></span>
        
        <div class="product-list">
        
        <?php if($error!=''){ 

echo $error;

} else {
	?>
          <?php

if(count($pagelists)>0) {

foreach($pagelists as $pagelist): 

?>
          <div class="item">
            <div class="item-cell">
              <div class="title"><a href="<?php echo site_url($pagelist['url']); ?>"><?php echo $pagelist['title']; ?></a>
              <p><?php echo strip_tags($pagelist['short_desc']); ?></p>
              </div>
              
            </div>
          </div>
          
          <?php 
endforeach; 
?>
        <?php

} else {

echo convert_lang('No Records Found!',$this->alphalocalization);

} ?>
        <div class="list-pagination"> <?php echo $this->pagination->create_links(); ?> </div>
        <?php

}

?>
          
        </div>
        
      </div>
    </section>
