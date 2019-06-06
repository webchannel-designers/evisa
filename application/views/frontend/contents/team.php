<div class="team-slider team-prof">

  <ul class="slides">

  <?php   if($teams) foreach($teams as $key => $team):?>

    <li>

    <?php if($team['image'] !='' && file_exists('public/uploads/gallery/'.$team['image']) ){ ?>

      <img src="<?php echo base_url('public/uploads/gallery/'.$team['image']);?>" class="img-responsive" />

      <?php } ?>

      <div class="flex-caption">      

        <h3><?php echo $team['title'];?></h3>

         <h4><?php echo $team['designation'];?></h4>

         <p><?php echo $team['desc']?></p>

       </div>

    </li>

    <?php endforeach; ?>  

  </ul>

</div> 

<script>$(window).load(function() {});$.fancybox.update(); $('.team-prof').flexslider({ animation: "slide",    animationLoop: false     });</script> 
