<?php
//print_r($downloads);
?>
<base href="<?php echo base_url(); ?>" />
<link rel="stylesheet" href="<?php echo base_url('public/frontend/css/style.css'); ?>"/>
<link rel="stylesheet" href="<?php echo base_url('public/frontend/fonts/stylesheet.css'); ?>"/>
<!--<section class="specification-wrapper" id="specification">
  <div class="container">
    <div class="row">
      <div class="col-md-9 pull-right">-->
        <div class="product-specification" style="padding:0px" >
          <h2 class="page-sub-header" style="background:none;">Downloads</h2>
          <div class="pr-desc"> 
          <table border="1" cellpadding="7" cellspacing="0" width="313">
	<tbody>
		<tr>
		<?php
		$i=1;
		foreach($downloads as $download)
		{
		?>
			<td height="32">
				<p>
					<a href="<?php echo base_url('public/uploads/downloads/'.$download['attachment']); ?>" target="_blank"><?php echo stripslashes($download['title']); ?></a></p>
			</td>
            <?php
			
			if($i%2==0)
			{
				?>
                </tr>
                <tr>
                <?php
			}
			$i++;
		}
			?>
			
		</tr>
	</tbody>
</table>

          </div>
        </div>
<!--      </div>
    </div>
  </div>
</section>-->
