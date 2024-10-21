<?php
session_start();
include_once('db.php');
if(!isset($_SESSION['username']))
{
?>
<script>window.location.replace('index.php');</script>
<?php 
}
?>




<?php

if(isset($_POST['submitbtn']) == 'Re-Verification Flag') {
	//echo "<pre>";print_r($_POST);die;
	  $timezone = "Asia/Calcutta";
		if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
		$t=time();
		$d= date("Y-m-d H:i:s",$t);	
		$ip = isset($_SERVER['HTTP_X_FORWARDED_FOR'])?$_SERVER['HTTP_X_FORWARDED_FOR']:$_SERVER['REMOTE_ADDR'];
		
		
	 $insert_q="insert into  dvdata_backup select * from dvdata where AADHAARNUMBER='".$_POST['reg_id']."'";
	$submitform=mysqli_query($con,$insert_q);
	
	
	// echo   $update2=mysqli_query($con,"update masterdata  set is_cerificate_verified=1,is_certificate_status='".$_POST['Accepted']."',is_certificate_remark='".$_POST['o_remarks']."' ,verified_user='".$_SESSION['username']."',verified_time='".$d."',m_marksupdated='".$_POST['dd_marks']."',inter_marksupdated='".$_POST['interdd_marks']."',remarks_supervisor='".$_POST['remarks_supervisor']."' ,name_mismatch='".$_POST['name_mimacth']."',father_mismatch='".$_POST['father_mimacth']."',dob_mismatch='".$_POST['dob_mimacth']."',cat_mismatch='".$_POST['cat_mismatch']."',gender_mismatch='".$_POST['gender_mimacth']."',sports_mismatch='".$_POST['sports_mimacth']."',matric_mismatch='".$_POST['matric_marks']."',inter_mismatch='".$_POST['inter_marks']."',dom_mismatch='".$_POST['dom_mimacth']."',nielit_mismatch='".$_POST['nielit_mimacth']."',army_mismatch='".$_POST['army_mimacth']."',ncc_mismatch='".$_POST['ncc_mimacth']."',c_name='".$_POST['name_enter']."',g_name='".$_POST['gender_enter']."',f_name='".$_POST['fname_enter']."'  where AADHAARNUMBER='".$_POST['reg_id']."' ");
        
		//echo $update2;die;
	if($submitform) {
		$deleteflag="delete  from dvdata where AADHAARNUMBER='".$_POST['reg_id']."'";
	$delete=mysqli_query($con,$deleteflag);
	if($delete){
		echo "<script>window.location.replace('images_search.php');</script>";
	}else {
		echo "<script>window.alert('Something went wrong please try again');</script>";	
	}
	}else {
			
		echo "<script>window.alert('Something went wrong please try again');</script>";	
		}	
}











 $transactionId = $_GET['transactionid'];

  	$sql = "select * from dvdata where    AADHAARNUMBER='".$transactionId."' order by id desc limit 1"; 
  	$sql2 = "select * from registration_details_sports where payment_success=1 and    dv_rollno='".$transactionId."'  limit 1"; 
  	

$result = mysqli_query($con,$sql);
$result1 = mysqli_query($con,$sql2);
$row = mysqli_fetch_assoc($result);
$row1 = mysqli_fetch_assoc($result1);


//echo "<pre>";print_r($row);
// echo "<pre>";print_r($row);die;
?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="css/verification_css.css" class="">
<body oncontextmenu="return true">
<div class="mainWrapper" >
<div class="wrapper" id='GFG'>
<style type="text/css">
	@media print
{    
    #no-print,#back-no
    {
        display: none !important;
    }
}
.container{

    width: 90% !important;

}
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}
th, td {
    padding: 5px;
    text-align: left;
}
td b {
    font-size: 14px;
}table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}
th, td {
    padding: 10px;
    text-align: left;
}
td b {
    font-size: 14px;
}
.column {
  float: left;
  width: 30.33%;
  padding: 5px;
  height: 0px; /* Should be removed. Only for demonstration */
}
.column1 {
  float: left;
  width: 45.33%;
  padding: 0px;
  height: 100px; /* Should be removed. Only for demonstration */
}
.row:after {
  content: "";
  display: table;
  clear: both;
}

.container{

    width: 100% !important;

}
</style>
<style type="text/css" media="print">
@page {
    size: auto;   /* auto is the initial value */
    margin: 0;  /* this affects the margin in the printer settings */
}

</style>			
	
		<div class="container"  style='border: 1px solid'>
			<h4 id="mainHead" style='text-align:center'><u>UPPRB DOCUMENT VERIFICATION <br>KUSHAL KHILADI DIRECT RECRUITMENT-2024</u></h4>
			<div class="userDetails1">
				<h6>&nbsp;  &nbsp;  &nbsp; Registration No	:<span><?php echo  $row1['registraionid']?></span></h6>	
				<h6>&nbsp;  &nbsp;  &nbsp; Roll No	:<span><?php echo  $row1['registraionid']?></span></h6>	
				<h6>&nbsp;  &nbsp;  &nbsp; Sports Name	:<span><?php echo $row1['post_applied']?></span></h6>	
				<h6>&nbsp;  &nbsp;  &nbsp; Sub Sports Name	:<span><?php echo $row1['nameofposition']?></span></h6>	
				<!--h6>&nbsp;  &nbsp;  &nbsp; Sports Code	:<span><?php echo $row1['code_subpost']?></span></h6-->	
				<h6>&nbsp;  &nbsp;  &nbsp; Age	:<span><?php echo $row['age']?></span></h6>
			</div>
			<div class="verificationResult">
				<table class="table table-bordered" style="width:100%;color:#000;text-align:center">
					<thead>
					
						<th>Description</th>
						<th>ORIGINAL</th>
						<th>MODIFIED/VERIFIED</th>
						
					</thead>
					<tbody >
						<tr >
							<td> NAME</td>
							<td style="text-align:center;"><?php echo $row1['first_name'].' '.$row1['middle_name'].' '.$row1['last_name'] ?></td>
							<td style="text-align:center;"><?php echo empty($row['c_name']) ? $row1['first_name'].' '.$row1['middle_name'].' '.$row1['last_name'] : '<b>'.$row['c_name'].'</b>' ?></td>
						</tr>
						<tr>
							
							<td>Father name</td>
							<td style="text-align:center;"><?php echo $row1['father_name']?></td>
							<td style="text-align:center;"><?php echo empty($row['fname_enter']) ? $row1['father_name'] : '<b>'.$row['fname_enter'].'</b>' ?></td>
						</tr>
						<tr>
							
							<td>Gender</td>
							<td style="text-align:center;"><?php echo $row1['sex']?></td>
							<td style="text-align:center;"><?php echo empty($row['g_name']) ? $row1['sex'] : '<b>'.$row['g_name'].'</b>' ?></td>
						</tr>
						<tr>
							
							<td>DOB</td>
							<td style="text-align:center;"><?php echo $row1['dob']?></td>
							<td style="text-align:center;"><?php echo empty($row['dob_enter']) ? $row1['dob'] : '<b>'.$row['dob_enter'].'</b>' ?></td>
						</tr>
						<tr>
							
							<td>Is +5 Years relaxation claimed </td>
							<td style="text-align:center;"><?php echo $row1['5years_age_relax']?></td>
							<td style="text-align:center;"><?php echo $row['five_mismatch'] ?></td>
						</tr>
						<tr>
							
							<td>Is -2 Years relaxation claimed  </td>
							<td style="text-align:center;"><?php echo $row1['2years_age_relax']?></td>
							<td style="text-align:center;"><?php echo $row['two_mismatch'] ?></td>
						</tr>
						<tr>
							
							<td>UP Domicile</td>
							<td style="text-align:center;"><?php echo $row1['domicial']?></td>
							<td style="text-align:center;"><?php echo empty($row['dom_mismatch']) ? $row1['domicial'] : '<b>'.$row['dom_mismatch'].'</b>' ?></td>
						</tr>
						<tr>
							
							<td>UP Domicile Certificate</td>
							<td style="text-align:center;">--</td>
							<td style="text-align:center;"><?php echo $row['dom_certificate'] ?></td>
						</tr>
						
						<tr>
							
							<td>UP Domicile certificate is valid</td>
							<td style="text-align:center;">--</td>
							<td style="text-align:center;"><?php echo  $row['dom_certificatev'] ?></td>
						</tr>
						<tr>
							
							<td>Category</td>
							<td style="text-align:center;"><?php echo $row1['community']?></td>
							<td style="text-align:center;"><?php echo empty($row['cat_enter']) ? $row1['community'] : '<b>'.$row['cat_enter'].'</b>' ?></td>
						</tr>
						<tr>
							
							<td>Category Certifcate Produced</td>
							<td style="text-align:center;">--</td>
							<td style="text-align:center;"><?php echo  $row['cat_certificate'] ?></td>
						</tr>
						<tr>
							
							<td>Category Certifcate is Valid</td>
							<td style="text-align:center;">--</td>
							<td style="text-align:center;"><?php echo  $row['cat_certificatev'] ?></td>
						</tr>
						<tr>
							
							<td>National games certificate</td>
							<td style="text-align:center;">--</td>
							<td style="text-align:center;"><?php echo  $row['national_gamesc'] ?></td>
						</tr>
						<tr>
							
							<td>National games certificate is Valid</td>
							<td style="text-align:center;">--</td>
							<td style="text-align:center;"><?php echo  $row['national_gamesv'] ?></td>
						</tr>
						
						<tr>
							
							<td>International Player certificate</td>
							<td style="text-align:center;">--</td>
							<td style="text-align:center;"><?php echo  $row['international_c'] ?></td>
						</tr>
						<tr>
							
							<td>International Player certificate is Valid</td>
							<td style="text-align:center;">--</td>
							<td style="text-align:center;"><?php echo  $row['international_v'] ?></td>
						</tr>
						
						<tr>
							
							<td>National championship (junior/Senior) certificate</td>
							<td style="text-align:center;">--</td>
							<td style="text-align:center;"><?php echo  $row['national_champc'] ?></td>
						</tr>
						<tr>
							
							<td>National championship (junior/Senior) certificate is Valid</td>
							<td style="text-align:center;">--</td>
							<td style="text-align:center;"><?php echo  $row['national_champv'] ?></td>
						</tr>
						
						<tr>
							
							<td>Federation Cup National (Junior/Senior) certificate</td>
							<td style="text-align:center;">--</td>
							<td style="text-align:center;"><?php echo  $row['feder_cupc'] ?></td>
						</tr>
						<tr>
							
							<td>Federation Cup National (Junior/Senior) certificate is Valid</td>
							<td style="text-align:center;">--</td>
							<td style="text-align:center;"><?php echo  $row['feder_cupv'] ?></td>
						</tr>
						
						<tr>
							
							<td>All India Inter State Championship(Senior) certificate</td>
							<td style="text-align:center;">--</td>
							<td style="text-align:center;"><?php echo  $row['all_Indiac'] ?></td>
						</tr>
						<tr>
							
							<td>All India Inter State Championship(Senior) certificate is Valid</td>
							<td style="text-align:center;">--</td>
							<td style="text-align:center;"><?php echo  $row['all_Indiav'] ?></td>
						</tr>
						<tr>
							
							<td>All India Inter University tournament certificate</td>
							<td style="text-align:center;">--</td>
							<td style="text-align:center;"><?php echo  $row['all_Indiatc'] ?></td>
						</tr>
						<tr>
							
							<td>All India Inter University tournament certificate is Valid</td>
							<td style="text-align:center;">--</td>
							<td style="text-align:center;"><?php echo  $row['all_Indiatv'] ?></td>
						</tr>
						
						<tr>
							
							<td>World School Games (Under 19) certificate</td>
							<td style="text-align:center;">--</td>
							<td style="text-align:center;"><?php echo  $row['world_schoolc'] ?></td>
						</tr>
						<tr>
							
							<td>World School Games (Under 19) certificate is Valid</td>
							<td style="text-align:center;">--</td>
							<td style="text-align:center;"><?php echo  $row['world_schoolv'] ?></td>
						</tr>
						<tr>
							
							<td>National School Games (Under 19) certificate</td>
							<td style="text-align:center;">--</td>
							<td style="text-align:center;"><?php echo  $row['national_schoolc'] ?></td>
						</tr>
						<tr>
							
							<td>National School Games (Under 19) certificate is Valid</td>
							<td style="text-align:center;">--</td>
							<td style="text-align:center;"><?php echo  $row['national_schoolv'] ?></td>
						</tr>
						
						<tr>
							
							<td>All India Police Sports Competition) certificate</td>
							<td style="text-align:center;">--</td>
							<td style="text-align:center;"><?php echo  $row['india_policec'] ?></td>
						</tr>
						<tr>
							
							<td>All India Police Sports Competition) certificate is Valid</td>
							<td style="text-align:center;">--</td>
							<td style="text-align:center;"><?php echo  $row['india_policev'] ?></td>
						</tr>
						
						<tr>
							
							<td> 'O' level certificate</td>
							<td style="text-align:center;"><?php echo  $emp3 = ($row1['olevel'] == 1) ? "Yes" : "No"; ?></td>
							<?php if($emp3= ($row1['olevel'] == 1) ? "YES" : "No" ==  $row['nielit_mismatch']) { ?>
							<td style="text-align:center;"><?php echo  $row['nielit_mismatch'] ?></td>
							<?php } else { ?>
							<td style="text-align:center;"><b><?php echo  $row['nielit_mismatch'] ?></b></td>
							<?php } ?>
						</tr>
						<tr>
							
							<td>'O' level certificate is valid</td>
							<td style="text-align:center;">--</td>
							<td style="text-align:center;"><?php echo  $row['nielit_mismatchv'] ?></td>
						</tr>
						<tr>
							
							<td> 2 years in territorial Army Certificate</td>
							<td style="text-align:center;"><?php echo  $emp2= ($row1['twoyears_army'] == 1) ? "Yes" : "No" ?></td>
							
							<?php if($emp2= ($row1['twoyears_army'] == 1) ? "Yes" : "No" ==  $row['army_mismatch']) { ?>
							<td style="text-align:center;"><?php echo  $row['army_mismatch'] ?></td>
							<?php } else { ?>
							<td style="text-align:center;"><b><?php echo  $row['army_mismatch'] ?></b></td>
							<?php } ?>
							
						</tr>
						<tr>
							
							<td>2 years in territorial Army Certificate is valid</td>
							<td style="text-align:center;">--</td>
							<td style="text-align:center;"><?php echo  $row['army_mismatchv'] ?></td>
						</tr>
						<tr>
							
							<td> NCC 'B' Certificate</td>
							<td style="text-align:center;"><?php echo $emp = ($row1['nccb_cer'] == 1) ? "Yes" : "No"; ?></td>
							
							<?php if($emp= ($row1['nccb_cer'] == 1) ? "Yes" : "No" ==  $row['ncc_mismatch']) { ?>
							<td style="text-align:center;"><?php echo  $row['ncc_mismatch'] ?></td>
							<?php } else { ?>
							<td style="text-align:center;"><b><?php echo  $row['ncc_mismatch'] ?></b></td>
							<?php } ?>
						</tr>
						<tr>
							
							<td> NCC 'B' Certificate is valid</td>
							<td style="text-align:center;">--</td>
							<td style="text-align:center;"><?php echo  $row['ncc_mismatchv'] ?></td>
						</tr>
						
						<tr>
							
							<td> High School Marksheet and Certificate  </td>
							<td style="text-align:center;">--</td>
							<td style="text-align:center;"><?php echo  $row['matric_mismatch'] ?></td>
							
						</tr>
						<tr>
							
							<td> High School Marksheet and Certificate is valid</td>
							<td style="text-align:center;">--</td>
							<td style="text-align:center;"><?php echo  $row['matric_mismatchv'] ?></td>
						</tr>
						<tr>
							
							<td> Intermediate Marksheet and Certificate  </td>
							<td style="text-align:center;">--</td>
							<td style="text-align:center;"><?php echo  $row['inter_mismatch'] ?></td>
						</tr>
						<tr>
							
							<td> Intermediate Marksheet and Certificate is valid</td>
							<td style="text-align:center;">--</td>
							<td style="text-align:center;"><?php echo  $row['inter_mismatchv'] ?></td>
						</tr>
						
					</tbody>
				</table>
			</div>
			<!--div class="supervisorDetails">
				<h5>REMARKS OF SUPERVISOR : <span style="font-weight: normal;"> <?php echo $row['remarks_supervisor']?></span></h5>
				<h5 style="float: right;">SIGNATURE OF SUPERVISOR</h5>
				<br><br>
				<h5 style="margin-bottom: 1%;">WHETHER FIT OR UNFIT <span style="font-weight: normal;"> <?php echo $row['age_eligiable']?></span></h5>
				<h5>REMARKS OF CONCERNED OFFICER : <span style="font-weight: normal;"> <?php echo $row['is_certificate_remark']?></span><span style="position: absolute;right: 13%;">SIGNATURE OF CONCERNED OFFICER</span></h5>
				
			</div-->
			</br>
			<div class="row">
			 <div class="col-md-3" style='position:absolute'><b> &nbsp;  &nbsp;  &nbsp; FIT OR UNFIT : </b><?php echo $row['age_eligiable']?></div> </br>
			<div class="col-md-6" style='position:absolute'><b>&nbsp;  &nbsp;  &nbsp; REMARKS OF COMMITTE MEMBER : </b>  <?php echo $row['is_certificate_remark']?></div></br>
   
    <div class="col-md-3" style='float:right;'><b>SIGNATURE OF CANDIDATE &nbsp;  &nbsp;  &nbsp;</b></div>
  </div></br>
				<?php 
			$sqldd = "select * from members_sign where sports_name='".$row1['post_applied']."'"; 
	$resultdd = mysqli_query($con,$sqldd);
		$mem2 = mysqli_fetch_assoc($resultdd);
			?>
		 <div class="row">
    
    <div class="column" ><b>&nbsp;  &nbsp; &nbsp;(<?php echo $mem2['member1'] ?>) </br> &nbsp;  &nbsp; &nbsp; SIGNATURE OF </br> &nbsp;  &nbsp; &nbsp;  COMMITTE MEMBER-1</b></div>
    <div class="column"><b>(<?php echo $mem2['member2'] ?>) </br>SIGNATURE OF </br> COMMITTE MEMBER-2</b></div>
    <div class="column"><b>(<?php echo $mem2['member3'] ?>) </br>SIGNATURE OF </br> COMMITTE MEMBER-3</b></div>
    <!--div class="column"><b>SIGNATURE OF </br> COMMITTE MEMBER-4</b></div>
    <div class="column"><b>SIGNATURE OF </br>  COMMITTE MEMBER-5</b></div-->
  </div>
  </br></br></br></br>
  	<div class="row" >
   
    <div class="column1"><b> &nbsp;  &nbsp; &nbsp; (<?php echo $mem2['member4'] ?>) </br>  &nbsp;  &nbsp; &nbsp; SIGNATURE OF </br> &nbsp;  &nbsp; &nbsp;  COMMITTE MEMBER-4</b></div>
    <div class="column1"><b>(<?php echo $mem2['member5'] ?>) </br>SIGNATURE OF THE</br>COMMITTEE MEMBERS-5</div>
  </div>
 
		</div>
	</div>
	<button style="margin-bottom: 10%;margin-left: auto;margin-right: auto;text-align: center;display: block;" id="no-print" onclick="return printDiv()" class="btn btn-primary">PRINT</button>
	<button style="margin-left: 54%;margin-right: auto;text-align: center;display: inline-block;margin-top: -12.2%;" id="back-no" onclick="return sendback()" class="btn btn-primary">BACK</button>
	<?php if($_SESSION['username'] == 'superadmin'){ ?>
	<form method="post" id="form">
	  <input type="submit"  style="margin-left: 4%;margin-right: auto;text-align: center;display: inline-block;margin-top: -12.2%;"  id="submit-btn" class="btn btn-primary" name="submitbtn" value="Re-Verification Flag"  />
						
			
			<input type="hidden"  name="reg_id" value="<?php echo $row['AADHAARNUMBER']; ?>">
	</form>
	<?php } ?>
	
</div>
</body>
<script type="text/javascript">
document.addEventListener('contextmenu', function(e) {
  e.preventDefault();
});
function printpage()
{
window.print();
}
function sendback()
{
window.location.href = "images_search.php";
}



        function printDiv() {
            var divToPrint = document.getElementById('GFG');
   var popupWin = window.open('', '_blank');
   popupWin.document.open();
   popupWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
	popupWin.document.close();
	
	
        }
		
		$(document).on('keydown', function(e) {
    if((e.ctrlKey || e.metaKey) && (e.key == "p" || e.charCode == 16 || e.charCode == 112 || e.keyCode == 80) ){
        alert("Please use the Print  button below for a better rendering on the document");
        e.cancelBubble = true;
        e.preventDefault();

        e.stopImmediatePropagation();
    }  
});
  
</script>
