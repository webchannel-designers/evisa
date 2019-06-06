

	<section>
		<div class="container">
			<div class="adv-holder">
				<div><img src="<?php echo base_url('public/frontend/images/adv2.png')?>" alt="" /></div>
				<div><img src="<?php echo base_url('public/frontend/images/adv3.png')?>" alt="" /></div>
			</div>
		</div>
	</section>

	<section class="main-content light-blue">
		<div class="container">
			<ol class="breadcrumb">
				<li>
					<a href="#">Browse results in :</a>
				</li>
            <?php 

			$i=0; foreach($this->breadcrumbarr as $link => $text): $i++;			

			if($i==1){$attr=' class="home"';} else {$attr='';}?>
            <li<?php echo $attr; ?>>
              <?php if($link=='nolink'){ echo '<a href="javascript:void(0);">'.$text.'</a>'; } else { echo anchor($link,$text); } ?>
            </li>
            <?php endforeach; ?>
			</ol>
			<h2><?php echo convert_lang('Edit Comment',$this->alphalocalization); ?></h2>
			<div class="inner-content">
				<!--<div class="list-head">
					<div class="showing">Showing 5 of 100</div>
					<div class="sort">
						<div class="form">
							<form action="#">
								<label for="">sort by: </label>
								<span>
									<select name="" id="">
										<option value="new">Newest to oldest</option>
										<option value="old">Oldest to Newest</option>
									</select>
								</span>
							</form>
						</div>
					</div>
				</div>-->
				<div class="dash-tab">
					      <!--<p>Please fill in the online contact form below and we will get back to you.</p>-->
                          <div class="form">
                          

	<?php echo form_open_multipart('login/editcomment/'.$content->id.'/'.$return,array('id' => 'editVeh')); ?>

	<input id="id" name="id" type="hidden" value="<?php echo $content->id; ?>" />	

		<ul>
        

        <li class="mandatory">

			<label for="name">Name <?php if(form_error('name')){ $err=' err'; echo form_error('name'); } else { $err=''; ?><?php } ?></label>
			<input id="name" name="name" type="text" class="text<?php echo $err; ?>" value="<?php echo $content->name; ?>" />

		</li>
        
        <li class="mandatory">

    <label for="email">Email 

      <?php if(form_error('email')){ $err=' err'; echo form_error('email'); } else { $err=''; ?>

      <?php } ?>

    </label>
    <input id="email" name="email" type="text" class="text<?php echo $err; ?>" value="<?php echo $content->email; ?>" />

  </li>
        

        <!--<li class="mandatory">

			<label for="slug">URL Slug <?php if(form_error('slug')){ $err=' err'; echo form_error('slug'); } else { $err=''; ?><span> (required)</span><?php } ?></label>
    <div class="input-holder">
			<input id="slug" name="slug" type="hidden" class="text<?php echo $err; ?>" value="<?php echo $content->slug; ?>" />
            </div>

		</li>-->		

        <li class="mandatory">

			<label for="comment">Comment <?php if(form_error('comment')){ $err=' err'; echo form_error('comment'); } else { $err=''; ?><?php } ?></label>
			<textarea id="comment" name="comment" type="text" class="textarea<?php echo $err; ?>"><?php echo $content->comments; ?></textarea>

		</li>

        <!--<li class="mandatory">

    <label for="image">Posted Date </label>
    <div class="input-holder">
    <input type="text" name="date_time" id="date_time" class="text datepicker" value="<?php if($content->date_time) echo date("d-m-Y h:i:a", strtotime($content->date_time)); ?>" />
    </div>

  </li>-->

        <!--<li class="mandatory">

    <label for="image">Image (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>) - <?php echo $content->image; ?></label>
    <div class="input-holder">
    <input type="file" name="image" />
    </div>

  </li>-->

        <!--<li class="mandatory">

			<label for="attach_title">Banner Text (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>)</label>
    <div class="input-holder">
			<input id="attach_title" name="banner_text" type="text" class="text<?php echo $err; ?>" value="<?php echo $content->banner_text; ?>" />
            </div>

		</li>-->

        <!--<li class="mandatory">

			<label for="attachment">Banner Image (<?php echo $this->languagesarr[$this->session->userdata('admin_language')]?>)  - <?php echo $content->banner_image; ?></label>
    <div class="input-holder">
			<input type="file" name="banner_image" />
            </div>

		</li>-->	

        <!--<li class="mandatory">

			<label for="widgets">Widget Type <?php if(form_error('widgets')){ $err=' err'; echo form_error('widgets'); } else { $err=''; ?><span> (required)</span><?php } ?></label>
    <div class="input-holder">
			<select name="widgets[]" id="widgets" class="text" multiple="multiple">

			<?php		

			   foreach($widgets as $widget): 			     

			   ?>

				<option value="<?php echo $widget['id']; ?>" <?php $selectedwidgets=explode(',',$selectedwidget); if(in_array($widget['id'],$selectedwidgets)){ echo 'selected="selected"'; } ?>><?php echo $widget['title'];?></option>

			<?php endforeach; ?>

			</select>
            </div>

		</li>-->		

        

        <!--<li class="mandatory">

			<label for="status">Status <?php if(form_error('status')){ $err=' err'; echo form_error('status'); } else { $err=''; ?><span> (required)</span><?php } ?></label>
    <div class="input-holder">
			<input type="radio" name="status" value="Y" <?php if($content->status=='Y'){ echo 'checked="checked"';} ?> /> Enabled <input type="radio" name="status" value="N" <?php if($content->status=='N'){ echo 'checked="checked"';} ?> /> Disabled
            </div>

		</li>-->
        
        <!--<li class="mandatory">

			<label for="featured">Featured <?php if(form_error('featured')){ $err=' err'; echo form_error('featured'); } else { $err=''; ?><span> (required)</span><?php } ?></label>
    <div class="input-holder">
			<input type="radio" name="featured" value="Y" <?php if($content->featured=='Y'){ echo 'checked="checked"';} ?> /> Enabled <input type="radio" name="featured" value="N" <?php if($content->featured=='N'){ echo 'checked="checked"';} ?> /> Disabled
            </div>

		</li>-->
        <li>
			<button type="submit" class="btn btn-submit">Save</button><button type="button" class="btn btn-submit cancel" onclick="window.location='<?php echo site_url('login/comments/'.$content->pid); ?>'" >Cancel</button>
		</li>
        </ul>

	<?php echo form_close(); ?>

                            
                          </div>
                                                  
				</div>
				
			</div>
			<aside>
				<div class="adv-tower">
					<img src="<?php echo base_url('public/frontend/images/adv-tower1.png')?>" alt="" />
                    <!--<ul class="aside-nav">
            <?php
			if($this->session->userdata('userid'))
			{
			//echo 'Welcome '.$this->session->userdata('fname');
			?>
            <li><a href="<?php echo site_url('login/myhome'); ?>">My Home</a></li>
            <li><a href="<?php echo site_url('login/changepass'); ?>">Change Password</a></li>
            <li><a href="<?php echo site_url('login/lists'); ?>">Vehicle List</a></li>
            <li><a href="<?php echo site_url('home/do_logout'); ?>">Logout</a></li>
            <?php
			}
			else
			{
			?>
            <li><a class='icon-sign login fancybox.iframe' href="<?php echo site_url('login'); ?>">Sign In</a></li>
            <?php
			}
			?>
          </ul>-->
				</div>
				<div class="adv-tower">
					<img src="<?php echo base_url('public/frontend/images/adv-tower2.png')?>" alt="" />
				</div>
			</aside>
		</div>
	</section>





