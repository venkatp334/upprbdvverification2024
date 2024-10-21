
<?php
//session_start();
include_once('db.php');
include_once "header.php";
if(!isset($_SESSION['username']))
{
?>
<script>window.location.replace('index.php');</script>
<?php 
}
?>
<?php

  $sql = "select * from masterdata where    AADHAARNUMBER='".$_POST['regid']."' limit 1"; 
 
$result = mysqli_query($con,$sql);
$row = mysqli_fetch_assoc($result);
function caluclate_age($dob) {
    $from = new DateTime($dob);
    $to   = new DateTime('2022-07-01');
    $age= $from->diff($to)->y;
    /**if($age==18)
    {
    }
    else if(($from->diff($to)->m)==0 && ($from->diff($to)->d)==0)
    {
        $age=$age-1;
    }**/
    return $age;
}
//echo $ipaddress = $_SERVER['REMOTE_ADDR'];
if(isset($_POST['submitbtn']) == 'Submit') {
	//echo "<pre>";print_r($_POST);die;
	  $timezone = "Asia/Calcutta";
		if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
		$t=time();
		$d= date("Y-m-d H:i:s",$t);	
		$ip = isset($_SERVER['HTTP_X_FORWARDED_FOR'])?$_SERVER['HTTP_X_FORWARDED_FOR']:$_SERVER['REMOTE_ADDR'];
		
		
	 $insert_q="update masterdata set sports_marks='".$_POST['marks']."' where AADHAARNUMBER='".$_POST['reg_id']."'";
	$submitform=mysqli_query($con,$insert_q);
	
	
	// echo   $update2=mysqli_query($con,"update masterdata  set is_cerificate_verified=1,is_certificate_status='".$_POST['Accepted']."',is_certificate_remark='".$_POST['o_remarks']."' ,verified_user='".$_SESSION['username']."',verified_time='".$d."',m_marksupdated='".$_POST['dd_marks']."',inter_marksupdated='".$_POST['interdd_marks']."',remarks_supervisor='".$_POST['remarks_supervisor']."' ,name_mismatch='".$_POST['name_mimacth']."',father_mismatch='".$_POST['father_mimacth']."',dob_mismatch='".$_POST['dob_mimacth']."',cat_mismatch='".$_POST['cat_mismatch']."',gender_mismatch='".$_POST['gender_mimacth']."',sports_mismatch='".$_POST['sports_mimacth']."',matric_mismatch='".$_POST['matric_marks']."',inter_mismatch='".$_POST['inter_marks']."',dom_mismatch='".$_POST['dom_mimacth']."',nielit_mismatch='".$_POST['nielit_mimacth']."',army_mismatch='".$_POST['army_mimacth']."',ncc_mismatch='".$_POST['ncc_mimacth']."',c_name='".$_POST['name_enter']."',g_name='".$_POST['gender_enter']."',f_name='".$_POST['fname_enter']."'  where AADHAARNUMBER='".$_POST['reg_id']."' ");
        
		//echo $update2;die;
	if($submitform) {

		echo "<script>window.location.replace('data_entry.php');</script>";
	}else {
			
		echo "<script>window.alert('Something went wrong please try again');</script>";	
		}	
}

?>

<link rel="stylesheet" href="css/styles.css" type="text/css" media="screen, projection" />
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" type="text/css" media="screen, projection" />
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
  padding:0px;
}
td{
	padding: 14px;
}
div.dashboard-widget > div.content {
    background-color: #FFFFFF;
    box-shadow: 0px 0px 4px rgb(0 0 0 / 10%);
    height: 100% !important;
}
h1 {
	margin-top: 25px;
	margin-bottom: -15px !important ;
	font-size: 50px;
}
</style>
<body oncontextmenu="return false">
<div class="margin-container">
	 <div class="dashboard-widget">
		<div class="title">
			<i class="icon-cloud"></i> Data Entry for Marks
			<button class="toggle" title="Close"><i class="icon-chevron-down"></i></button>
		</div>
		<div class="content">
		
		<form method="post" id="form" align='center'>
			<input type="text" name="regid" autocomplete='off' placeholder="Enter Aadhar No">
			<input type="submit" name="submit1">
		</form>
<?php 
if(!empty($row)) {
	
	  $sqldd = "select * from masterdata where sports_marks is not null and   AADHAARNUMBER='".$_POST['regid']."'  limit 1"; 
	$resultdd = mysqli_query($con,$sqldd);
	$row2 = mysqli_fetch_assoc($resultdd);
	
	if(mysqli_num_rows($resultdd)<= 0) {
?>

		<form method="post" id="form">
				<div class="details">
					
						<div  class='details'>
						<h1><b> Sports Name : <?php echo $row['SportsName']; ?> </b></h1></br></br></br>
						<table style='margin: 10px 700px;' align='center' class="table table-bordered">
						<tr>
						
						
						<td><b style="font-weight: bold;">Candidate Data</b></td>
						<td><b style="font-weight: bold;">Status</b></td>
							</tr>
							<tr>
							
								<td>Aadhar No </td> 
								<td> <?php echo $row['AADHAARNUMBER']; ?></td>
							
							</tr>
							<tr>
							
								<td>Name   </td> 
								
									<td> <?php echo $row['Name']; ?></td>
							
							</tr>
						<tr>
						
							<td>Gender </td> 
							<td> <?php echo $row['GENDER']; ?></td>
						
						</tr>
						<tr>
					
							<td>FatherName  </td> <td> <?php echo ucwords($row['FatherName']); ?></td>
						
						</tr>
						
						<tr>
						
							<td>
							<?php 
							$dob = explode("-",$row['DOB']);
							//print_r($dob);
							$dob1 = $dob[0]."-".$dob[1]."-".$dob[2];
			
							$interval = date_diff(date_create('2022-07-01'), date_create($row['DOB']));
							 $age =  $interval->format("%Y Y, - %M M, %d Days");
							?>
							DOB   </td> 
							<td> <?php echo $dob1; ?><br /></td>
						
						</tr>
						
					
					
					
						<tr>
						
							<td>Category  </td> 
							<td> <?php echo $row['CATEGORY']; ?></td>
						
						</tr>
						
						
						
						</table>
						</div>
						
						<!--br /><br /><br />
						Remarks of Supervisor: <textarea name="remarks_supervisor" id='remarks_supervisor' rows="4" cols="50" placeholder="Enter Remarks"></textarea></br><br>
						<input type="radio" name="Accepted" id="Accepted" required value="Suitble" ><label for="Accepted"><b>Suitable</b></label> <span style="font-size:16px">|</span>
						<!--input type="radio" name="Accepted" id="Conditional_Accepted"  value="Conditional Accepted"><label for="Conditional_Accepted"><b>Conditional Accepted</b></label> <span style="font-size:16px">|</span>
						<input type="radio" required name="Accepted" id="Rejected" required value="Unsuitble"><label for="Rejected"><b>Unsuitable</b></label></br></br-->
						Enter Marks <input type='number' name="marks" id='marks' class='form-control'  placeholder="Enter Marks" required ></input></br></br>
						Re-Enter Marks <input type='number' name="remarks" class='form-control' id='remarks'  placeholder="Enter Re-Marks" required ></input></br></br></br>
	                  
					   <input type="submit"  id="submit-btn" class="submit-btn" name="submitbtn" value="Submit" disabled />
						
				</div>
			<input type="hidden" name="reg_id" value="<?php echo $row['AADHAARNUMBER']; ?>">
		
		 <div class='row col-md-12'>
		
		</div>
		 
		</form>
<?php
} else {
	echo "<p style='color:red;text-align:center'>Marks Already Updated </p>";
}
} else {
	echo "<p style='color:red;text-align:center'>data not is found.</p>";
}
?>
		</div>
	</div>
</body>
<style>
.clientele {
    display: block;
    padding: 6px;
    margin: 6px;
    width: 31%;
    float: left;
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
<script>
document.addEventListener('contextmenu', function(e) {
  e.preventDefault();
});
$("#submit-btn").prop("disabled", true);
$('input[name=remarks]').change(function() {debugger;
	$marks = $("input[name='marks']").val();
		if( $marks.length === 0){
			alert('Please Enter Marks');
			 $("input[name='remarks']").val('')
		}else {
			if($(this).val() == $marks ){
			
			$("#submit-btn").removeAttr('disabled');
			}else {
				alert('Both Marks are Diffrent');
				$("input[name='remarks']").val('')	;			
			}
		}
})
$('input[name=matric_marks]').change(function() {debugger;
	
		if($(this).val() == 'Yes'){
			$('#dd_marks').prop('required', true);
			$('.perr').css("display", "block");
		}else {
			$('#dd_marks').prop('required', false);
			$('.perr').css("display", "none");
		}
})
$('input[name=inter_marks]').change(function() {debugger;
	
		if($(this).val() == 'Yes'){
			$('#interdd_marks').prop('required', true);
			$('.interperr').css("display", "block");
		}else {
			$('#interdd_marks').prop('required', false);
			$('.interperr').css("display", "none");
		}
})
$('input[name=name_mimacth]').change(function() {debugger;
	
		if($(this).val() == 'Yes'){
			$('#name_enter').prop('required', true);
			$('.nameclass').css("display", "block");
		}else {
			$('#name_enter').prop('required', false);
			$('.nameclass').css("display", "none");
		}
})
$('input[name=gender_mimacth]').change(function() {debugger;
	
		if($(this).val() == 'Yes'){
			$('#gender_enter').prop('required', true);
			$('.genderclass').css("display", "block");
		}else {
			$('#gender_enter').prop('required', false);
			$('.genderclass').css("display", "none");
		}
})
$('input[name=father_mimacth]').change(function() {debugger;
	
		if($(this).val() == 'Yes'){
			$('#fname_enter').prop('required', true);
			$('.fnameclass').css("display", "block");
		}else {
			$('#fname_enter').prop('required', false);
			$('.fnameclass').css("display", "none");
		}
})
$('input[name=cat_mismatch]').change(function() {debugger;
	
		if($(this).val() == 'Yes'){
			$('#caste_enter').prop('required', true);
			$('.casteclass').css("display", "block");
		}else {
			$('#caste_enter').prop('required', false);
			$('.casteclass').css("display", "none");
		}
})
$('input[name=dob_mimacth]').change(function() {debugger;
	
		if($(this).val() == 'Yes'){
			$('#dob_enter').prop('required', true);
			$('.dobclass').css("display", "block");
		}else {
			$('#dob_enter').prop('required', false);
			$('.dobclass').css("display", "none");
		}
})

</script>
<?php
include_once "footer.php";
?>
?>