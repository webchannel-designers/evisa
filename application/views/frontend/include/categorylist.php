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
         <li class="commmon-left"><a href="#">Print&nbsp; <img src="images/print.png" width="16" height="15" alt="" /></a></li>
         <li class="commmon-left"><a href="#">Mail&nbsp; <img src="images/mail.png" width="16" height="11" alt="" /></a></li>
         </ul>
       </div>
       
       </div><p>
        <?php 
		echo $procontent->desc;
		?>
        
</p> 
<div class="contentdiv commmon-left">
<?php
foreach($procategory as $productscat):

$catname=$productscat['name'];
$desc=$productscat['desc'];
$pimage=$productscat['image'];
?>


  <div class="product-div commmon-left">
  <h2><?php echo $catname ?></h2>
  <img src="<?php echo base_url('public/uploads/products/'.$pimage); ?>" width="214" height="187" alt="" />
  <p>
 <?php echo $desc ?>
  </p>
  <form method="post" action="<?php echo site_url('products/listview/'.strtolower($catname))?>">
 <input name="" type="submit" value="view products" class="viewpdct-btn" /></form>
  </div>
  
  <?php
  endforeach;
  ?>
  
  
  
  
  
</div>

<div class="pagination"> <?php echo $this->pagination->create_links(); ?> </div>

     </div>
     
     
     
     </div>
  </div>
  
  
  
  </div>
  
  
  
  
</article>


</div>


<?php } 

?>