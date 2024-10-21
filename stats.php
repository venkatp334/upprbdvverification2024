<?php
session_start();
include_once('db.php');

?>
<?php
 $timezone = "Asia/Calcutta";
		if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
		$t=time();
		$d= date("Y-m-d",$t);
	  $sql = "SELECT  verified_user,count(*) as count FROM applicants where verified_user is not null and verified_time like '".$d."%' group by verified_user";  
  
$result = mysqli_query($con,$sql);

//echo $ipaddress = $_SERVER['REMOTE_ADDR'];
	

?>
<link rel="stylesheet" href="css/styles.css" type="text/css" media="screen, projection" />
<script src="js/jquery.min.js"></script>
<script language="javascript" type="text/javascript" src="js/popup2.2.js"></script> 
  
<script language="javascript" type="text/javascript">
$(document).ready(function(){
	$(".popup").popup({
		gallery : true,
		shadowLength : 0,
		onOpen : function() {
			$('.details table, th, td').css('border', 'none');
			$('.details table, th, td').css('padding', '0px');
			console.log("opened the box .popup");
		},
		onClose : function() {debugger
				$('.details table, th, td').css('border', '1px solid black');
			$('.details table, th, td').css('padding', '10px');
			console.log("closed the box .popup");
		}
	});
});
</script>
<style>
details > table, th, td {
  border: 1px solid black;
  padding:10px;
}
</style>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" type="text/css" media="screen, projection" />
<body >
<!--body oncontextmenu="return false"-->
<div class="margin-container">
	 <div class="dashboard-widget">
	
		<div class="content" style='text-align:center;font-size:40px'>
<?php 
//print_r($row);exit;
	while($row = mysqli_fetch_assoc($result)){
		echo '<h1>'. $row['verified_user']. ' ---------    '.$row['count'].'<br></h1>';
		$total=$total+$row['count'];
	}
	echo '<h1>'.$total.'<br></h1>';
	
?> 

		
<?php

?>
		</div>
	</div>
</div>
<style>
.clientele {
    display: block;
    padding: 6px;
    margin: 6px;
    width: 31%;
    border: 1px solid #d6d6d6;
    box-shadow: 0px 1px 8px #ccc;
    border-radius: 6px;
    min-height: 100px;
    text-align: center;
	align:center
}
.clientele img {
    max-height: 356px;
    margin-top: 8px;
    min-height: 356px;
	margin-bottom: 8px;
}

img {
    vertical-align: middle;
}

.details {
	text-align : center;
	font-weight: bold;
	font-size:16px;
	margin-bottom:25px
}

#submit {
	text-align : center;
	margin-top:25px;
	background-color: #4CAF50;
	color: #FFFFFF;
	padding: 10px 30px 10px 30px;
	border-radius: 5px;
	font-size: 30px;
}
.textBox {
	width:200px;
	margin-top: 10px;
}
</style>
</body>
<script>
$('input[name=Accepted]').change(function() {debugger;
	
		if($(this).val() == 'Rejected'){
			$('#o_remarks').prop('required', true);
		}else {
			$('#o_remarks').prop('required', false);
		}
})
$('input[name=matric_marks]').change(function() {debugger;
	
		if($(this).val() == 'OK'){
			$('#dd_marks').prop('required', true);
			$('.perr').css("display", "block");
		}else {
			$('#dd_marks').prop('required', false);
			$('.perr').css("display", "none");
		}
})
</script>
<?php
include_once "footer.php";
?>