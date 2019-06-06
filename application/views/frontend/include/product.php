<div id="banner">
<?php if($leftbox){ ?>


		<img src="<?php echo $this->pagebannner; ?>" />

	<?php } else { ?>

 <?php foreach($banners as $banner): ?>
<img src="<?php echo base_url('public/uploads/banners/'.$banner['image']); ?>" />
 
  <div class="banner-text-main">
  <div class="banner-text">
  <h1>
 <?php echo $banner['title']; ?>
  </h1>
  <p><?php echo $banner['short_desc']; ?></p>
  <input name="" type="button" class="viewpdct-btn" value="view products" />
  </div>
  </div>
   
  <?php endforeach;   }?>
</div>

<?php if($leftbox){ ?>

<article>

  <div id="content-main" class="commmon-left">
  
  <div id="inner-content-main">
  <div id="inner-content" class="commmon-left">
      <div id="content-left" class="commmon-left">

    <?php echo $leftsection; ?>
    
    </div>

    
     <div id="content-right" class="commmon-right">
     <h1><?php echo $this->pagetitle; ?></h1>
     <div id="brudcrumbs-main" class="commmon-left">
       <div id="brudcrumbs" class="commmon-left">
         <ul>

			<?php 

			$i=0; foreach($this->breadcrumbarr as $link => $text): $i++;			

			if($i==1){$attr=' class="home"';} else {$attr='';}?>

				<li<?php echo $attr; ?>><?php if($link=='nolink'){ echo '<a href="javascript:void(0);">'.$text.'</a>'; } else { echo anchor($link,$text); } ?></li>

			<?php endforeach; ?>

			</ul>

       </div>
       <div id="print-mail" class="commmon-right">
         <ul>
         <!--<li class="commmon-left"><a href="#">Print&nbsp; <img src="images/print.png" width="16" height="15" alt="" /></a></li>-->
        <li class="commmon-left"><a class="lightbox" href='<?php echo site_url('home/emailurl')?>?lightbox[iframe]=true&lightbox[width]=406&lightbox[height]=305'>Mail&nbsp; <img src="<?php echo base_url('images/mail.png')?>" width="16" height="11" alt="" /></a></li>
         </ul>
       </div>
       
       </div>

<?php echo $maintcontent; ?>
    
    
     
     </div>
    
    
    
    
  </div>
  </div>
  
  
  
  </div>
  
  
  
  
</article>


</div>


<?php } 
else {?>

<div id="middle">
<div id="welcome-main">
<div id="welcome" class="commmon-left">

<div id="midl-left" class="commmon-left">
  <!--<img src="images/img1.png" width="355" height="360" alt="" />-->
  


         
       <div class="visualstories">
  <div class="askjb-list">
    
    
    <!-- Tabs2 -->
    <div id="tabsholder3" style="width:1000px; float:right;">
        <ul class="tabs" style="width:98%">
  <?php
  $i=6;

  foreach($protabs as $protabsmenu):
  $proname=$protabsmenu['name'];
  ?>        

<li id="tabz<?php echo $i ?>"><span class="hand"><?php echo $proname ?></span> </li>
<!--<li id="tabz7"><span class="tandoor">Tandoor</span></li>
<li id="tabz8"><span class="wheatbrnd">Wheat  brand</span></li>
<li id="tabz9" class="bdr"><span class="wholesale">Wholesale & Retail</span></li>-->
  <?php
  $i++;
endforeach; 
  ?>         
        </ul>
 <div class="border-tab"> </div>    
 <?php
 $i=6;
 foreach($protabs as $contentproduct):

 $proname=$contentproduct['name'];
if($i==6)
{
?>
 <div class="contents marginbot">
 <?php
}
//print_r($featured);
?>
 <div id="contentz<?php echo $i ?>" class="tabscontent">
           <div class=" askjb-detailmain">
           
     <h3><?php echo $proname?></h3>      
<ul id="first-carousel" class="first-and-second-carousel jcarousel-skin-tango"  style="left:0px;">

<?php
foreach($featured as $featuredmenu):
$productid=$featuredmenu['category_id'];
if($contentproduct['id']==$productid)
{
//echo $featuredmenu['image'];
//foreach(featuredmenu as featuredimages)
//{

?>

          

<li>
   <div class="askjb-listmain">        
    <div class="askjb-list-img">
    <a href="#"><img src="<?php echo base_url('public/uploads/products/'.$featuredmenu['image']); ?>"  alt=""><h2><?php echo $featuredmenu['title']; ?></h2></a>
    </div>
   </div> 
</li>
        
 
  
            <?php
			//}
			}
		endforeach; 
			?>
         </ul>
  
      
            
             </div>
           
            
            </div>   
            <?php
			if($i==6)
			{
			?>
            </div>
            <?php
			}
			?>
            
    <?php
	$i++;
endforeach; 
	?>        
            
   
        </div>

  </div>
    <!-- /Tabs2 -->
        
        
 </div>  
         

  
  </div>
  
  
  

  
  </div>

</div>
</div>


<div id="middle-sec" class="commmon-left">

<div id="container-sldr">
	<div id="content-sldr">
		<div id="slider">
			<ul>
            <?php
	foreach($imagegallery as $imagegalleryitem)

	{
	$galimage=$imagegalleryitem['image'];
	?>				
				<li><a href="http://templatica.com/preview/30"><img src="<?php echo base_url('public/uploads/gallery/'.$galimage) ?>" /></a></li>
				
                <?php
				}
				?>
			</ul>
		</div>
</div>
</div>


</div>

<div id="middle-third-main" class="commmon-left">

<div id="middle-third">
<div class="content commmon-left">
<div class="content-lft commmon-left">
<?php
$assu_desc=word_limiter($quality->desc,20);
?>
<h1><?php echo $quality->title ?></h1>
<p><?php echo $assu_desc?></p>
<h2><a href="<?php echo site_url('contents/view/'.$quality->slug)?>">Read More</a></h2>
</div>

<div class="content-right commmon-left">
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


</div>
</div>

</div>

</div>

<?php
}
?>