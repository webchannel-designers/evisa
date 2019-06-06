<link rel="stylesheet" href="<?php echo base_url('public/frontend/css/jquery.selectBoxIt.css'); ?>">
<link rel="stylesheet" href="<?php echo base_url('public/frontend/css/bootstrap.css'); ?>"/>
<link rel="stylesheet" href="<?php echo base_url('public/frontend/css/bootstrap-grid.css'); ?>"/>
<link rel="stylesheet" href="<?php echo base_url('public/frontend/css/bootstrap-reboot.css'); ?>"/>
<link rel="stylesheet" href="<?php echo base_url('public/frontend/css/main.css'); ?>"/>
<div class="col-lg-12">
<div class="form style-3">
<h2 class="mb-4">Email to Friend</h2>

<?php if($message=='') { ?>

<?php echo form_open_multipart('home/emailurl'); ?>


<div class="row">              <div class="input-holder col-lg-6 col-md-6">

		 <label><span class="required"><?php echo convert_lang('To Name',$this->alphalocalization); ?></span> <?php if(form_error('toname')){ $err=' err'; echo form_error('toname'); } ?></label> 

		 <input class="required form-control" name="toname" type="text" id="toname" value="<?php echo set_value('toname'); ?>">

		</div>

              <div class="input-holder col-lg-6 col-md-6">

		 <label><span class="required"><?php echo convert_lang('To Email',$this->alphalocalization); ?></span><?php if(form_error('toemail')){ $err=' err'; echo form_error('toemail'); } ?></label> 

		 <input class="required form-control" name="toemail" type="text" id="toemail" value="<?php echo set_value('toemail'); ?>">

		</div>

              <div class="input-holder col-lg-6 col-md-6">

		<label><span class="required"><?php echo convert_lang('From Name',$this->alphalocalization); ?></span><?php if(form_error('fromname')){ $err=' err'; echo form_error('fromname'); } ?></label> 

		 <input class="required form-control" name="fromname" type="text" value="<?php echo set_value('fromname'); ?>" id="fromname">

		</div>

        <div class="input-holder col-lg-6 col-md-6">

		<label><span class="required"><?php echo convert_lang('From Email',$this->alphalocalization); ?></span><?php if(form_error('fromemail')){ $err=' err'; echo form_error('fromemail'); } ?></label> 

		 <input class="required form-control" name="fromemail" type="text" id="fromemail" value="<?php echo set_value('fromemail'); ?>">

		</div>

 	
        <div class="btn-holder col-lg-6 col-md-6 text-md-right">
    <input type="hidden" value="" name="shareurl" id="link" />
    <button type="submit" class="btn blue" name="email-btn" id="email-btn">Submit</button>
<!--<input type="submit" id="email-btn" value="Submit" class="submit btn" name="email-btn">-->
</div>
</div>
<!--<a class="GlobalBlueButton" id="email-btn" href="#" style="margin:5px 0px"><span>Submit</span></a>-->
<?php echo form_close(); ?>
<script language='javascript'>
var lin = window.parent.location.href;
document.getElementById("link").value = lin;
</script>

<?php } else { ?>

<h3 class="popupmessage"><?php echo $message; ?></h3>

<?php } ?>
</div>
</div>
    <script src="<?php echo base_url('public/frontend/js/jquery.min.js'); ?>"></script>
	<script type="text/javascript" src="<?php echo base_url('public/frontend/js/jquery-ui.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('public/frontend/js/jquery.selectBoxIt.js'); ?>"></script>
    
    <script type="text/javascript">
      $(document).ready(function(){
    
    $("select").selectBoxIt();
    
      });
      
    </script>  
