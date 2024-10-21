<!DOCTYPE html>
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
		document.myform.submit();
		}
        </script>
        
    </head>
    <body>
        <div class="login border-box">
            <div class="title">Sign in</div>
           <form name="myform" action="<?php $_SERVER['PHP_SELF']?>" method="post">
            <div class="form-row">
                <i class="icon-user"></i><input type="text" name="userid" class="border-box" placeholder="login" autofocus="autofocus" />
            </div>
            <div class="form-row">
                <i class="icon-lock"></i><input type="password" name="passw" class="border-box" placeholder="password" />
            </div>
            <div>
                <input type="checkbox" id="remember-login"><label for="remember-login">Keep me logged in</label>
            </div>
            <button class="submit" onClick="submitForm()">Sign in</button>
           
            </form>
        </div>
    </body>
</html>