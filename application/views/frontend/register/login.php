<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 
  'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml' xml:lang='en' lang='en'>

<head>    
    <title>ECS Login Screen | Welcome </title>
    <link rel="stylesheet" href="<?php echo base_url('public/frontend/css/main.css'); ?>"/>
    <link rel="stylesheet" href="<?php echo base_url('public/frontend/css/bootstrap.css'); ?>"/>
    
    <script src="<?php echo base_url('public/frontend/js/vendor/jquery-1.11.0.min.js'); ?>"></script>
    <script src="<?php echo base_url('public/frontend/js/jquery.validate.js'); ?>"></script>
    
    <script>
	$(document).ready(function() {
		$("#process").validate();
		$("#forgot").validate();
	});

	</script>

</head>
<body style="height:auto;" class="page-contact">
    <div id='login_form' class="form signin">
        <form action='<?php echo site_url('login/process');?>' method='post' name='process' id="process">
            <h4>User Login</h4>
            <div class="input-holder cell">          
            <!--<label for='username'>Username</label>-->
       
            <?php if(!is_null($msg)) echo $msg;?>
            <input type='text' name='username' placeholder="Username" id='username' class="required email" size='25' />
            </div>
            
            <div class="input-holder cell">          
            <!--<label for='password'>Password</label>-->
            
            <input type='password' placeholder="Password" name='password' id='password' class="required" size='25' />
            </div>
            
            <div class="input-holder cell">          
            <a id="forpass" onclick="show()">Forgot Password?</a>                 
<!--            <input type='Submit' value='Login' class="btn yellow btn-submit" />  
-->             
    		<button class="btn yellow btn-submit" type="submit" value="Submit" >Login</button>

            </div>        
        </form>
    </div>
	<div id='forgot_form' class="form signin" style="display:none">
        <form action='<?php echo site_url('login/forgot');?>' method='post' name='process' id="forgot">
            <h4>Forgot Password</h4>
            <?php if(! is_null($msg)) echo $msg;?>
            <div class="input-holder cell">          
            <!--<label for='username'>Email-Id</label>-->
            
            <input type='text' placeholder="Email-Id" name='email' id='email' class="required email" size='25' />
            </div>
            
            <div class="input-holder cell">                           
            <!--<input type='Submit' value='Submit' class="btn red" />  -->
    		<button class="btn yellow btn-submit" type="submit" value="Submit" >Submit</button>
            </div>        
        </form>
    </div>   
</body>
</html>
<script>
//$( document ).ready(function() {
//$( "#forpass" ).click(function() {
//	alert(1);
//	$("#forgot_form").show();
//	$("#login_form").hide();
//});
//});
function show()
{
	document.getElementById('forgot_form').style.display='block';
	document.getElementById('login_form').style.display='none';
}
</script>
<script src="<?php echo base_url('public/frontend/js/main.js'); ?>"></script>
