<span class="count"><?php echo $this->cart->total_items(); ?></span>
									<div class="basket-wrap">

										<h4>enquiry basket</h4>
                                        
										<ul>
                    <?php if(count($this->cart->contents()) > 0) { ?>
                    <?php $i=1; ?>
					<?php foreach ($this->cart->contents() as $items): ?>
                    <?php //print_r($items); ?>
                    <?php echo form_hidden($i.'[rowid]', $items['rowid']); ?>
											<li>
												<a class="close-thump"  onClick="removeitem('<?php echo $items['rowid']; ?>')"><img src="<?php echo base_url('public/frontend/images/close-btn.png')?>" alt="enquiery basket" /></a>
												<div class="image-thump">
													                        <?php if($items['options']['image']!="")
						{ 
						?>
                        <!--<img src="<?php echo base_url('public/uploads/products/'. $items['options']['image']); ?>" alt=""/>-->
                        <img src="<?php echo base_url('public/frontend/timthumb/scripts/timthumb.php?src=').base_url('public/uploads/products/'.$items['options']['image'])."&w=67&h=54&zc=1";  ?>" alt="" class="img-responsive"/>
                        <?php
						}
						else
						{
                        ?>
                        <!--<img src="<?php echo base_url('public/frontend/images/noimage.jpg'); ?>" alt=""/>-->
                        <img src="<?php  echo base_url('public/frontend/timthumb/scripts/timthumb.php?src=').base_url('public/frontend/images/noimage.jpg')."&w=67&h=54&zc=1"; ?>" alt="" class="img-responsive"/>
                        <?php
						}
						?>

												</div>
												<p><?php echo $items['name']; ?></p>
											</li>
                                            <?php $i++; ?>
                                            <?php @$key=@$key.','.$items['name']; ?>
                                            <?php endforeach; ?>
                        <?php } else { ?>
                        <li>Cart is empty</li>
                        <?php } ?>
											
										</ul>
										<a href="<?php echo site_url('home/enquiry')?>?key=<?php echo trim(@$key,",") ?>&lightbox[iframe]=true&lightbox[width]=1000&lightbox[height]=500" class="btn enquiry">Make Enquiry</a>
                                        </div>
