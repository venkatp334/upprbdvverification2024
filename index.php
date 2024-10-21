<?php session_start() ?>
<!DOCTYPE html>
<html>
    <head>
        <title>RRC</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=0" />
        <link rel="stylesheet" href="css/library/normalize.css">
        <link rel="stylesheet" href="css/library/font-awesome.min.css">
        <link rel="stylesheet" href="css/login.css">
        <script src="js/library/modernizr-2.6.2.min.js"></script>
        <script src="js/library/jquery-1.10.1.min.js"></script>
      
        
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
	include_once("db.php");
	
	error_reporting(0);
if(isset($_POST['userid']))
{
	$name= preg_replace('/[^A-Za-z0-9\-]/', '', $_POST['userid']);
	 $q="select * from division_login where  username='".$name."' and password1='".$_POST['passw']."'";
	$sql = mysqli_query($con,$q);
	$result = mysqli_fetch_assoc($sql);
   if($result['username']!='') {
	   $_SESSION['username'] = $result['username'];
	   $_SESSION['role'] = $result['role'];
	   if($result['role'] == 'verification'){
	   echo "<script>window.location='images_search.php'</script>";
	   }else if ($result['role'] == 'entry' ){
	    echo "<script>window.location='data_entry.php'</script>";
   }else if ($result['role'] == 'members' ){
	    echo "<script>window.location='members_entry.php'</script>";
   } 

   else {
	    echo "<script>window.location='images_search.php'</script>";
   }
   }else {
	   $error = 'Not Valid Details, Please Enter Valid Details';	
   }
} 
?>

    <body>
        <div class="login border-box">
            <div class="title">Sign in</div>
			 <?php
		 if(isset($error)) {
		?>
			<div class="alert alert-danger" style="width: 95%;color:reg">
				<strong id="error"><?php echo $error; ?></strong>
			</div>
		 <?php } ?> 
           <form name="myform" action="" method="post">
            <div class="form-row">
                <i class="icon-user"></i><input type="text" name="userid" class="border-box" autocomplete='off' placeholder="login" required autofocus="autofocus" />
            </div>
            <div class="form-row">
                <i class="icon-lock"></i><input type="password" name="passw" autocomplete='off' class="border-box" required placeholder="password" />
            </div>
			
            <div>
                <input type="checkbox" id="remember-login"><label for="remember-login">Keep me logged in</label>
            </div>
            <button class="submit" >Sign in</button>
           
            </form>
        </div>
    </body>
</html>