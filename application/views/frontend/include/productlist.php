<div id="banner">
<?php if($leftbox){ ?>


		<img src="<?php echo $this->pagebannner; ?>" />

	<?php } ?>

 
</div>

<?php if($leftbox){ ?>

<article>

  <div id="content-main" class="commmon-left">
  
  <div id="inner-content-main">
  <div id="inner-content" class="commmon-left">
      <div id="content-left" class="commmon-left">

    <?php echo $leftsection; ?>
    
    </div>


<div id="content-right" class="commmon-left">
     <h1></h1>
     <div id="brudcrumbs-main" class="commmon-left">
       <div id="brudcrumbs" class="commmon-left">


			<ul>
<li class="home">
<a href="http://webchannel.co/projects/astarta/www/en.html">Home</a>
</li>
<li>
<a href="http://webchannel.co/projects/astarta/www/en/products/lists/products.html">Products</a>
</li>
<li>
<a href="http://webchannel.co/projects/astarta/www/en/products/listsview/<?php echo $catid->slug?>"><?php echo $catid->name?></a>
</li>
</ul>

       </div>
       <div id="print-mail" class="commmon-right">
         <ul>
         <li class="commmon-left"><a href="#">Print&nbsp; <img src="images/print.png" width="16" height="15" alt="" /></a></li>
         <li class="commmon-left"><a href="#">Mail&nbsp; <img src="images/mail.png" width="16" height="11" alt="" /></a></li>
         </ul>
       </div>
       
       </div><p>
        <?php 
		//print_r($catid);
		//echo $procontent->desc;
		?>
        
</p> 
<div class="contentdiv commmon-left">
<?php
foreach($procategory as $productscat):

$catname=$productscat['title'];
$desc=$productscat['desc'];
$pimage=$productscat['image'];
?>


  <div class="product-div commmon-left">
  <h2><?php echo $catname ?></h2>
  <img src="<?php echo base_url('public/uploads/products/'.$pimage); ?>" width="214" height="187" alt="" />
  <p>
 <?php echo $desc ?>
  </p>
  <!--<input name="" type="button" value="view products" class="viewpdct-btn" />-->
  </div>
  
  <?php
  endforeach;
  ?>
  
  
  
  
  
</div>

<div class="pagination"> <?php //echo $this->pagination->create_links(); ?> </div>

     </div>
     
     
     
     </div>
  </div>
  
  
  
  </div>
  
  
  
  
</article>


</div>


<?php } 

?>