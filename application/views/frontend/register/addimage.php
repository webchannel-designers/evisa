      
              
<section class="section page-about inner-page">
      <div class="container">
        <div class="section-title normal">
          <h2>Images</h2>
        </div>
        <div class="row">
        <div class="col-md-4">
			<?php echo $this->load->view('frontend/register/usermenu'); ?>
            </div>
			<div id="formcontaineraddblog" class="col-md-8">
                            
			<h2>Add Image</h2>
            <div class="form">
            <?php echo form_open_multipart('login/addimage/',array("id"=>"myhomeform","class"=>"ajaxform")); ?>
                     
            <div class="row">
            <div class="input-holder ">
            
            <label><?php echo convert_lang('Category',$this->alphalocalization); ?> <?php $err=''; if(form_error('category_id')){ $err=' err'; echo form_error('category_id'); } ?></label> 
                    <select name="category_id[]" id="category_id" class="required" >
                    
                      <option value="">Category</option>
                
                      <?php foreach($contentcats as $contentcat): ?>
                
                      <option value="<?php echo $contentcat['id']; ?>"><?php echo $contentcat['title']; ?></option>
                
                      <?php endforeach; ?>
                
                    </select>
            </div>
            <!--<div class="input-holder full">
            
            <label><?php echo convert_lang('Title',$this->alphalocalization); ?> <?php $err=''; if(form_error('title')){ $err=' err'; echo form_error('title'); } ?></label> 
            <input class="required" name="title" type="text" id="title" value="<?php echo set_value('title'); ?>" />
            </div>-->
            <!--<div class="input-holder full">
            
            <label><?php echo convert_lang('Blog Description',$this->alphalocalization); ?> <?php $err=''; if(form_error('desc')){ $err=' err'; echo form_error('desc'); } ?></label> 
            <?php echo $this->ckeditor->editor("desc",html_entity_decode(set_value('desc'))); ?>
            </div>-->
            <div class="input-holder ">
            
            <label><?php echo convert_lang('Event Image',$this->alphalocalization); ?> <?php $err=''; if(form_error('department')){ $err=' err'; echo form_error('department'); } ?></label> 
            <input type="file" name="image[]" multiple="multiple" />
            </div>
            
            
            
            
            
            <!--<li class="mandatory">
            
            <label><?php echo convert_lang('Password',$this->alphalocalization); ?><?php $err=''; if(form_error('password')){ $err=' err'; echo form_error('password'); } ?> </label> 
            <div class="input-holder">
            <input class="required" name="password" type="password" id="password" value="<?php echo set_value('password'); ?>" />
            </div>
            </li>-->	
            <!--<li class="mandatory">
            
            <label><?php echo convert_lang('Confirm Password',$this->alphalocalization); ?><?php $err=''; if(form_error('confirmdpassword')){ $err=' err'; echo form_error('confirmpassword'); } ?> </label> 
            <div class="input-holder">
            <input class="required" name="confirmpassword" type="password" id="confirmpassword" equalto="#password" value="<?php echo set_value('confirmpassword'); ?>" />
            </div>
            </li>-->					
                        
            <!--<li class="captcha-holder mandatory">
             <label><?php echo convert_lang('Security Code',$this->alphalocalization); ?><?php $err=''; if(form_error('captcha')){ $err=' err'; echo form_error('captcha'); } ?></label>
            <div class="input-holder">
             
                                             <?php echo $cap['image']; ?>
            
                                        <input name="captcha" type="text" class="required" id="captcha" >
            
            </div></li>-->
            <div class="btn-holder full">
                                    
                                <button class="btn red" name="butSub" type="submit" value="Submit" id="butSub">Submit</button>
                                <a class="btn red" href="<?php echo site_url('login/imagelists/'.$this->uri->segment(5)); ?>">Cancel</a>
                                    <!--<input name="butSub" type="submit" class="submit pull-right btn" value="Submit" id="butSub">-->
            </div></div>					
            
            <?php echo form_close(); ?>
            </div>

    
                            
                          	</div>                        
        </div>
        <span class="clearfix"></span>
        
      </div>
    </section>