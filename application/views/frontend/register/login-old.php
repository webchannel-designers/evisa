<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 
  'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html xmlns='http://www.w3.org/1999/xhtml' xml:lang='en' lang='en'>

<head>    
    <title>Jotorres Login Screen | Welcome </title>
    <link rel="stylesheet" href="<?php echo base_url('public/frontend/css/main.css'); ?>"/>
    <script src="<?php echo base_url('public/frontend/js/vendor/jquery-1.11.0.min.js'); ?>"></script>
    <script src="<?php echo base_url('public/frontend/js/jquery.validate.js'); ?>"></script>
    <script>
	$(document).ready(function() {
		$("#process").validate();
		$("#forgot").validate();
	});

	</script>

</head>
<body>
    <div id='login_form' class="comments">
        <form action='<?php echo site_url('login/process');?>' method='post' name='process' id="process">
            <h2>User Login</h2>
            <?php if(! is_null($msg)) echo $msg;?>
            <ul>
            <li class="mandatory">          
            <label for='username'>Username</label>
            <div class="input-holder">
            <input type='text' name='username' id='username' class="required email" size='25' />
            </div>
            </li>
            <li class="mandatory">          
            <label for='password'>Password</label>
            <div class="input-holder">
            <input type='password' name='password' id='password' class="required" size='25' />
            </div>
            </li> 
            <li>          
            <a id="forpass" onclick="show()">Forgot Password</a>                 
            <input type='Submit' value='Login' class="btn submit" />  
            </li>          
        </form>
    </div>
	<div id='forgot_form' class="comments" style="display:none">
        <form action='<?php echo site_url('login/forgot');?>' method='post' name='process' id="forgot">
            <h2>Forgot Password</h2>
            <?php if(! is_null($msg)) echo $msg;?>
            <ul>
            <li class="mandatory">          
            <label for='username'>Email-Id</label>
            <div class="input-holder">
            <input type='text' name='email' id='email' class="required email" size='25' />
            </div>
            </li> 
            <li>                           
            <input type='Submit' value='Submit' class="btn submit" />  
            </li>          
        </form>
    </div>    
</body>
</html>
<script>
function show()
{
	document.getElementById('forgot_form').style.display='block';
	document.getElementById('process').style.display='none';
}
</script>