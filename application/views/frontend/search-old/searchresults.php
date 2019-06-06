<section class="content">
  <div class="container">
    <div class="utilities">
      <ul>
        <li><a href="<?php echo site_url('home/emailurl')?>?lightbox[iframe]=true&lightbox[width]=406&lightbox[height]=305" class="btn-message fancybox fancybox.iframe"></a></li>
        <li><a class="btn-share"><i class="st_sharethis"></i></a></li>
      </ul>
    </div>
    <span class="clearfix"></span>
    <div class="search-results">
      <div  class="media-1 grey-bg">
        <h2>Search Results</h2>
        <?php if($error!=''){ 

echo $error;

} else {
	?>
        <ul class="row" data-equal="li">
          <?php

if(count($pagelists)>0) {

foreach($pagelists as $key => $pagelist): 

?>
          <li class="col-md-12"><div class=" list-content">
            <div class="right-list <?php echo ($key%2==1)? 'row':'' ?>"> <a href="<?php echo site_url($pagelist['url']); ?>"><?php echo $pagelist['title']; ?> </a>
            
              <p><?php echo word_limiter(strip_tags($pagelist['short_desc']),10); ?></p></div>
              <div class="clearfix clear"></div>
              <?php
@$results = explode('/', trim($pagelist['url'],'/'));
if(count($results) > 0){
$slug = $results[count($results) - 1];
}
?>
              <a class="more btn <?php echo ($key%2==1)? 'row':'' ?>" href="<?php echo site_url($pagelist['url']); ?>"><?php echo convert_lang('View more',$this->alphalocalization); ?></a>
              
            </div>
          </li>
          <?php 
endforeach; 
?>
        </ul>
        <?php

} else {

echo convert_lang('No Records Found!',$this->alphalocalization);

} ?>
        <div class="row">
          <div class="col-md-12">
            <div class="pagination-wrap"> 
              <!--<p>Showing 6 out of 100</p>-->
              <nav> <?php echo $this->pagination->create_links(); ?> </nav>
            </div>
          </div>
        </div>
        <?php

}

?>
      </div>
    </div>
  </div>
</section>
