<!DOCTYPE html>
<?php session_start();?>
<html>
    <head>
        <title>PUNJAB POLICE - IT & T STATS</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=0" />
        <link rel="stylesheet" href="css/library/normalize.css">
        <link rel="stylesheet" href="css/library/font-awesome.min.css">
        <link rel="stylesheet" href="css/login.css">
        <script src="js/library/modernizr-2.6.2.min.js"></script>
        <script src="js/library/jquery-1.10.1.min.js"></script>
        <script>
        function submitForm()
		{
			if(document.myform.userid.value=='')
			{
			alert('Please enter user name');
			}
			else if(document.myform.passw.value=='')
			{
			alert('Please enter password');
			}
			else 
			{
			document.myform.submit();
			}
		}
        </script>
        
    </head>
<style>
.select_box {
	display: block;
    width: 100%;
    border: 1px solid #CCCCCC;
    margin-bottom: 10px;
    padding: 10px 30px 10px 10px;
}
</style>
    <?php
	error_reporting(0);
if(isset($_POST['userid']))
{
include_once('passwords.php');
$user=$_POST['userid'];
$system=$_POST['system'];
$password=$_POST['passw']; 
//echo $user.'---------'.$password;
	if($passwords[$user]==$password)
	{
	 $_SESSION['user_name_mgr']=$user;
	
	?>
	 <script type="text/javascript">window.location.replace('images.php')</script>
	 <?php 
	}
	else
	{
	//echo 'invalid password';
	?>
	 <script type="text/javascript">window.location.replace('index.php')</script>
	 <?php 
	}
} 
?>

    <body>
        <div class="login border-box">
            <div class="title">Sign in</div>
           <form name="myform" action="" method="post">
            <div class="form-row">
                <i class="icon-user"></i><input type="text" name="userid" class="border-box" placeholder="login" required autofocus="autofocus" />
            </div>
            <div class="form-row">
                <i class="icon-lock"></i><input type="password" name="passw" class="border-box" required placeholder="password" />
            </div>
			
            <div>
                <input type="checkbox" id="remember-login"><label for="remember-login">Keep me logged in</label>
            </div>
            <button class="submit" onClick="submitForm()">Sign in</button>
           
            </form>
        </div>
    </body>
</html>