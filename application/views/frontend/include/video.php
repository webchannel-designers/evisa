    <link rel="stylesheet" href="<?php echo base_url('public/frontend/css/main.css'); ?>"/>
    <style>
	html
	{
		overflow:auto;
	}
	</style>

<!--<button type="button" data-dismiss="modal" aria-label="Close" onclick="stop();" class="close">&times;</button>-->
<?php

					
        
          
          echo '<div class="video-wrap">';
         
			//if(!empty($vname)){ //check if parameter "v" is empty and is yours video
			echo('<object style="z-index:0;" width="770px" height="470px"><param style="z-index:0;" name="movie" value="http://www.youtube.com/v/'.$vname.'&hl=en_US&fs=1&autoplay=0"></param><param name="allowFullScreen" value="true"></param><param name="allowscriptaccess" value="always"></param><param name="wmode" value="transparent"></param><embed style="z-index:0;" src="http://www.youtube.com/v/'.$vname.'&hl=en_US&fs=1&autoplay=0" type="application/x-shockwave-flash" allowscriptaccess="always" wmode="transparent" allowfullscreen="true" width="770px" height="470px"></embed></object>');           
			//}  
		  
          echo '</div>
          <div class="video-detail">
            <h2>'.$title.' </h2>
            '.$desc.'
            <hr/>
            <h2>Share the Video</h2>
            <nav class="social-nav">
              <ul>
                <li><a href="'.$this->alphasettings['FACEBOOK_LINK'].'" class="icon-facebook"></a></li>
                <li><a href="'.$this->alphasettings['GOOGLEPLUS_LINK'].'" class="icon-gplus"></a></li>
                <li><a href="'.$this->alphasettings['TWITTER_LINK'].'" class="icon-twitter"></a></li>
                <li><a href="'.$this->alphasettings['INSTAGRAM_LINK'].'" class="icon-instagram"></a></li>
              </ul>
            </nav>
          </div>
          <div class="clearfix"></div>
        
      ';


?>