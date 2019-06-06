<link rel="stylesheet" href="<?php echo base_url('public/frontend/css/pqselect.dev.css'); ?>"/>
<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/redmond/jquery-ui.css" />  

<!--<section class="main-content">
		<div class="container">
			<ol class="breadcrumb">
			<?php 

			$i=0; foreach($this->breadcrumbarr as $link => $text): $i++;			

			if($i==1){$attr=' class="home"';} else {$attr='';}?>

				<li<?php echo $attr; ?>><?php if($link=='nolink'){ echo '<a href="javascript:void(0);">'.$text.'</a>'; } else { echo anchor($link,$text); } ?></li>

			<?php endforeach; ?>
            
			</ol>
            <?php
			if(@$_REQUEST['offset']=="")
			{
				if($this->pagination->total_rows<$this->pagination->per_page)
				{
				$per = $this->pagination->total_rows;
				}
				else
				{
				$per = $this->pagination->per_page;
				}
			}
			else
			{
				$per = $this->pagination->per_page*$_REQUEST['offset'];
			}
			?>
			<div class="inner-content">
				<div class="list-head">
					<div class="showing">Showing <?php echo $per; ?> of <?php echo $this->pagination->total_rows; ?></div>
					<div class="sort">
						<div class="form">
							<form method="get" name="frmsort" id="frmsort">
								<label for="">sort by: </label>
								<span>
									<select name="ord" id="ord" onchange="gopage(this.value)">
										<option value="new" <?php if(@$_REQUEST['ord']=='new') { ?> selected="selected"<?php } ?>>Newest to Oldest</option>
										<option value="old" <?php if(@$_REQUEST['ord']=='old') { ?> selected="selected"<?php } ?>>Oldest to Newest</option>
									</select>
								</span>
							</form>
                            <script language="javascript">
							function gopage(v)
							{
								window.location="<?php echo current_url().'?'.$_SERVER['QUERY_STRING']; ?>&ord="+v;
							}
							</script>
						</div>
					</div>
				</div>
				<div class="list search-list">
					<ul>
					<?php
					
                    if(count($pagelists)>0) {
                    
                    foreach($pagelists as $pagelist): 
                    //print_r($pagelist);
                    //$this->load->model('frontend/login_model');
                    //$proIm=$this->login_model->get_image($pagelist['id']);
                    //echo $pagelist['id'];
					$this->load->model('frontend/gallery_model');
                    $loc=$this->location_model->load($pagelist['location_id']);
                    $img = $this->gallery_model->get_array_cond($pagelist['id']);
                    //print_r($loc);
                    echo @$pimage=$img->image;
                    if($pimage!="")
                    {
                    $url = base_url('public/uploads/gallery/'.$pimage);
                    }
                    else
                    {
                    $url = base_url('public/frontend/images/noimage.jpg');
                    }
                    ?>
						<li>
							<figure>
								<a href="<?php echo site_url('products/view/'.$pagelist['slug']); ?>"><img src="<?php echo base_url('public/frontend/timthumb/scripts/timthumb.php?src='); ?><?php echo $url."&w=282&h=189&zc=1"; ?>" alt=""></a>
							</figure>
							<div class="figure-detail">
								<div class="detail-head">
									<h4><a href="<?php echo site_url('products/view/'.$pagelist['slug']); ?>"><?php echo $pagelist['title']; ?></a></h4>
									<div class="rate"><?php echo number_format($pagelist['price'],','); ?> AED</div>
									<div class="date-time"><?php echo date('jS M Y, G:i',strtotime($pagelist['date_time'])); ?></div>
								</div>
								<p>
								<?php echo $pagelist['short_desc']; ?>
								</p>
								<div class="more-details">
                                <?php
								if($pagelist['year']!="")
								{
								?>
									<div><img src="<?php echo base_url('public/frontend/images/icon-date.png')?>" alt=""> <span><?php echo $pagelist['year']; ?></span></div>
                                    <?php
								}
									?>
                                    <?php
									if($pagelist['kilometer']!="")
									{
									?>
									<div><img src="<?php echo base_url('public/frontend/images/icon-km.png')?>" alt=""> <span><?php echo $pagelist['kilometer']; ?> km</span></div>
                                    <?php
									}
									?>
                                <?php
								if($pagelist['milage']!="")
								{
								?>
									<div><img src="<?php echo base_url('public/frontend/images/icon-mileage.png')?>" alt=""> <span><?php echo $pagelist['milage']; ?> ltr</span></div>
                                    <?php
								}
									?>
                                    <?php
									if($pagelist['color']!="")
									{
									?>
									<div><img src="<?php echo base_url('public/frontend/images/icon-color.png')?>" alt=""> <span><?php echo $pagelist['color']; ?></span></div>
                                    <?php
									}
									?>
								</div>
								<div class="location"><?php echo $loc->title; ?></div>
							</div>
							<div class="clearfix"></div>
						</li>
<?php 
endforeach; 
?>
<?php

} else {

echo convert_lang('No Records Found!',$this->alphalocalization);

} ?>
						
					</ul>
				</div>
<div class="list-pagination">

	<?php echo $this->pagination->create_links(); ?>

</div>
			</div>
			<aside>
				<div class="adv-tower">
					<img src="<?php echo base_url('public/frontend/images/adv-tower1.png')?>" alt="" />
				</div>
				<div class="adv-tower">
					<img src="<?php echo base_url('public/frontend/images/adv-tower2.png')?>" alt="" />
				</div>
			</aside>
		</div>
	</section>-->


<section>
<div class="container">
		<div class="row">
			<div class="col-md-10 header-wrap" >

				 <h1>Products
						 		 
				 </h1>
			</div>	
             <div class="col-md-2 col-sm-3">
				<ul class="tools">
					<!--<li><a href="javascript:void(0);" class="print-icon"><img src="images/shareprint.png" alt="print"></a></li>-->
  					<li class="mail-icon"><a href="<?php echo site_url('home/emailurl')?>?lightbox[iframe]=true&lightbox[width]=406&lightbox[height]=305" class="enquiry fancybox.iframe">mail</a></li>
  					<li class="share-icon"><a class="a2a_dd" href="https://www.addtoany.com/share" title="Share"><i class="fa fa-share-alt">share</i></a></li>
				</ul>             
             </div>
             </div>
            <?php //print_r($brands); ?>
            <div class="row">
            <form method="get" name="frmsrt" id="frmsrt">
			 <div class="col-md-12 product-filter" >
				<div class="col-md-3">
					<h4>Product Category</h4>
					<div class="select-style">
						<select name="category" id="category" onchange="load_make(this.value);ajaxsearch();">
							<option value="">Product Category</option>
							<?php
							foreach($categories as $category)
							{
							?>
                            <option value="<?php echo $category['id']; ?>" <?php if(@$_GET['category']==$category['id']) { ?> selected="selected"<?php } ?>><?php echo $category['name']; ?> </option>
                            <?php
							}
							?>
						</select>
					</div>					
				</div>	
                <script language="javascript">
				
								function load_make(va)
								
								{
								
									var dataString = new Object();
								
									dataString = "make="+va;	 	 
								
									$.ajax({
								
										type: "post", 
								
										url: "<?php echo site_url('result/load_make/'); ?>", 	 	
								
										data: dataString, 
								
										success: function(msg) {
										$('#make').html(msg);
										
										// var selectBox = $("select#model_id").selectBoxIt().data("selectBoxIt");
										 //$("#make").data("selectBox-selectBoxIt").refresh();
										$("#make").pqSelect({
    multiplePlaceholder: '',    
    checkbox: true //adds checkbox to options    
}).pqSelect( 'refreshData' );

										 
										}, error: function(){ alert('Error while request..'); }
								
									});
								
								}
								
								window.onload = function(){
									ajaxsearch();
								}
								
								function ajaxsearch()
								
								{
								$('#serch').html('<div class="load-wrapper"></div>');
									var dataString = new Object();
								
									dataString = $('#frmsrt').serialize();	 	 
								
									$.ajax({
								
										type: "post", 
								
										url: "<?php echo site_url('product/result'); ?>", 	 	
								
										data: dataString, 
								
										success: function(msg) {
											
										$('#serch').html(msg);
											
										$("#make").pqSelect({
    multiplePlaceholder: '',    
    checkbox: true //adds checkbox to options    
}).pqSelect( 'refreshData' );
						$("#model").pqSelect({   
							checkbox: true //adds checkbox to options    
						}).pqSelect( 'refreshData' );

										
										 
										}, error: function(){ alert('Error while request..'); }
								
									});
								
								}
				
				</script>
                <div class="col-md-3">
					<h4>BRAND</h4>
					<div class="select-style">
						<select name="make[]" id="make" multiple=multiple>
							<option value="">Please Select</option>
                            <?php
							foreach($brands as $brand)
							{
							?>
                            <option value="<?php echo $brand['id']; ?>" <?php if(@$_GET['make']==$brand['id']) { ?> selected="selected"<?php } ?>><?php echo $brand['title']; ?></option>
                            <?php
							}
							?>
						</select>
					</div>					
				</div>	
                
                <div class="col-md-3">
					<h4>PRODUCT MODEL</h4>
					<div class="select-style">
						<select  name="model" id="model" onchange="ajaxsearch();">
							<option value="">Model</option>
                            <?php
							foreach($models as $model)
							{
							?>
                            <option value="<?php echo $model['id'] ?>" <?php if($model['id']==@$_GET['model']) { ?> selected="selected"<?php } ?>><?php echo $model['title'] ?></option>
                            <?php
							}
							?>
						</select>
					</div>				
				</div>		
				<div class="col-md-3">
					<h4>PRODUCT NAME</h4>
                    <input type="text" name="type" id="type" onkeyup="ajaxsearch();" placeholder="Product Name"/>
						<!--<select name="type" id="type" onchange="document.frmsrt.submit();">
							<option value="">Please Select</option>
                            <?php
							foreach($items as $item)
							{
							?>
                            <option value="<?php echo $item['id']; ?>" <?php if(@$_GET['type']==$item['id']) { ?> selected="selected"<?php } ?>><?php echo stripslashes($item['title']); ?></option>
                            <?php
							}
							?>
						</select>-->
				</div>
				
				
				
				<!--<div class="col-md-12 filter-bottom">
				 <ul>
					<li>Concrete Solutions <a href="javascript:void(0);" > <img src="images/filter-close.png" alt="remove"></a></li>
					<li>Wacker Neuson<a href="javascript:void(0);" > <img src="images/filter-close.png" alt="remove"></a></li>
					<li>Schwing Stetter<a href="javascript:void(0);" > <img src="images/filter-close.png" alt="remove"></a></li>
					<li>Diesel <a href="javascript:void(0);" > <img src="images/filter-close.png" alt="remove"></a></li>
					<li>Please select<a href="javascript:void(0);" > <img src="images/filter-close.png" alt="remove"></a></li>
				 </ul>
				</div>-->
			 </div>
			 </form>
             </div>
			 <div class="row" id="serch">
             
			 	 
             </div>
			 
		
	</div>
</section>