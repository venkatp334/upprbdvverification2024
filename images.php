<?php
session_start();
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
  if ($_SESSION['username'] == 'admin'){
  $sql = "select * from applicants where  application_status='FINISHED' and (payment_exempted=1 or payment_status='SUCCESS') and is_cerificate_verified is null order by rand()  limit 1";
  }else {
	 $sql = "select RD.registration_id,RD.pf_nps_no,RD.gender,A.employee_name,RD.community,A.father_name,RD.full_name,RD.father_name as newfathername,RD.pwd,RD.disability_categeory,RD.photo_path,RD.sign_path,RD.disability_type,A.dob,RD.mother_name from personal_details RD, emp_details A Where RD.pf_nps_no=A.pf_nps_no AND  RD.is_cerificate_verified=1 and RD.is_certificate_status='Rejected' and application_status='completed' and is_recheck_rejected is null and A.division='".$_SESSION['username']."' limit 1";  
  }
$result = mysqli_query($con,$sql);
$row = mysqli_fetch_assoc($result);
//echo $ipaddress = $_SERVER['REMOTE_ADDR'];
if(isset($_POST['submit'])) {
	$timezone = "Asia/Calcutta";
		if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
		$t=time();
		$d= date("Y-m-d H:i:s",$t);	
	  
	// echo "update applicants  set is_cerificate_verified=1,is_certificate_status='".$_POST['Accepted']."',is_certificate_remark='".$_POST['o_remarks']."' ,photo_status='".$_POST['photo_pVerified1']."',photo_remark='".$_POST['photo_remark']."' ,sign_status='".$_POST['sign_sVerified1']."',sign_remark='".$_POST['sign_remark']."',matric_status='".$_POST['matric_sVerified1']."',matric_remark='".$_POST['matric_remark']."',trade_status='".$_POST['trade_sVerified1']."',trade_remark='".$_POST['trade_remark']."',cat_status='".$_POST['cat_sVerified1']."',cat_remark='".$_POST['cat_remark']."',exman_status='".$_POST['exman_sVerified1']."',exman_remark='".$_POST['exman_remark']."',pwd_status='".$_POST['pwd_sVerified1']."',pwd_remark='".$_POST['pwd_remark']."' ,verified_user='".$_SESSION['username']."',verified_time='".$d."',m_marksupdated='".$_POST['dd_marks']."',name_mismatch='".$_POST['name_mimacth']."',father_mismatch='".$_POST['father_mimacth']."',dob_mismatch='".$_POST['dob_mimacth']."',iti_mismatch='".$_POST['iti_mimacth']."',matric_mismatch='".$_POST['matric_marks']."',exman_mismatch='".$_POST['exman_mimacth']."',gender_mismatch='".$_POST['gender_mimacth']."',cat_mismatch='".$_POST['cat_mismatch']."',pwd_mismatch='".$_POST['pwd_mimacth']."'	 where transactionid='".$_POST['reg_id']."' ";
	 
	 $update2=mysqli_query($con,"update applicants  set is_cerificate_verified=1,is_certificate_status='".$_POST['Accepted']."',is_certificate_remark='".$_POST['o_remarks']."' ,photo_status='".$_POST['photo_pVerified1']."',photo_remark='".$_POST['photo_remark']."' ,sign_status='".$_POST['sign_sVerified1']."',sign_remark='".$_POST['sign_remark']."',matric_status='".$_POST['matric_sVerified1']."',matric_remark='".$_POST['matric_remark']."',trade_status='".$_POST['trade_sVerified1']."',trade_remark='".$_POST['trade_remark']."',cat_status='".$_POST['cat_sVerified1']."',cat_remark='".$_POST['cat_remark']."',exman_status='".$_POST['exman_sVerified1']."',exman_remark='".$_POST['exman_remark']."',pwd_status='".$_POST['pwd_sVerified1']."',pwd_remark='".$_POST['pwd_remark']."' ,verified_user='".$_SESSION['username']."',verified_time='".$d."',m_marksupdated='".$_POST['dd_marks']."',name_mismatch='".$_POST['name_mimacth']."',father_mismatch='".$_POST['father_mimacth']."',dob_mismatch='".$_POST['dob_mimacth']."',iti_mismatch='".$_POST['iti_mimacth']."',matric_mismatch='".$_POST['matric_marks']."',exman_mismatch='".$_POST['exman_mimacth']."',gender_mismatch='".$_POST['gender_mimacth']."',cat_mismatch='".$_POST['cat_mismatch']."',pwd_mismatch='".$_POST['pwd_mimacth']."'	 where transactionid='".$_POST['reg_id']."' ");
	 

	if($update2) {
		
		echo "<script>window.location.replace('images.php');</script>";
	}	
}

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
		<div class="title">
			<i class="icon-cloud"></i> Photo Verification 
			<button class="toggle" title="Close"><i class="icon-chevron-down"></i></button>
		</div>
		<div class="content">
<?php 
if(!empty($row)) {
?> 

		<form method="post" id="form">
				<div class="details">
				<?php
				if($_SESSION['username'] == 'admin') {
				$sql = mysqli_query($con,"select sum(case when is_certificate_status='Accepted' then 1 else 0 end) as verified, sum(case when is_certificate_status is not null then 1 else 0 end) as complete, sum(case when application_status='FINISHED' and is_certificate_status is null  then 1 else 0 end) as reamaing,sum(case when application_status='FINISHED'  then 1 else 0 end) as total, sum(case when application_status='FINISHED' and is_certificate_status='Rejected' then 1 else 0 end) as Rejected 
				from applicants RD where application_status='FINISHED'  and (payment_exempted=1 or payment_status='SUCCESS')  ");
				}else {
				$sql = mysqli_query($con,"select sum(case when is_certificate_status='Accepted' then 1 else 0 end) as verified, sum(case when is_certificate_status is not null then 1 else 0 end) as complete, sum(case when application_status='completed' and is_certificate_status is null  then 1 else 0 end) as reamaing,sum(case when application_status='completed'  then 1 else 0 end) as total, sum(case when application_status='completed' and is_certificate_status='Rejected' then 1 else 0 end) as Rejected 
				from personal_details RD, emp_details A  Where RD.pf_nps_no=A.pf_nps_no  and A.division='".$_SESSION['username']."' ");	
				}
				$count = mysqli_fetch_assoc($sql);
				
				if($row['full_name'] == '' ) {
							$name=$row['fullname'];
						}else {
							$name=$row['fullname'];
						}
						if($row['newfathername'] == ''){
							$fname=$row['father_name'];
						}else {
							$fname=$row['father_name'];
						}
				?>
						<h3>Total  : <?php echo $count['total']; ?>  
						Verified  : <?php echo $count['verified']; ?> 
						Rejected   : <?php echo $count['Rejected']; ?>	
						Completed  : <?php echo $count['complete']; ?>   
											
						Remaining   : <?php echo $count['reamaing']; ?>
						</h3>
						
						<div  class='details'>
						<table style='margin: 10px 150px;' >
						<tr>
						<td>
						Registration No </td> <td> <?php echo $row['transactionid']; ?>
						</td><td> 	</td>
						<td>
						Name </td> <td> <?php echo $name; ?> 
						</td>
						<td> <input type="radio" required name="name_mimacth"  id="name_mimacth"  value="OK"><label for="name_mimacth"><b>Yes</b></label><span style="font-size:16px">|</span>
						<input type="radio" name="name_mimacth"  id="name_mimacth1"  value="NOT OK"><label for="name_mimacth1"><b>No</b></label>	</td>
						</tr>
						<tr>
						<td>
						Gender </td> <td> <?php echo $row['sex']; ?>
						</td>
						<td> <input type="radio" required name="gender_mimacth"  id="gender_mimacth"  value="OK"><label for="gender_mimacth"><b>Yes</b></label><span style="font-size:16px">|</span>
						<input type="radio" name="gender_mimacth"  id="gender_mimacth1"  value="NOT OK"><label for="gender_mimacth1"><b>No</b></label>	</td>
						<td>
						Father Name </td> <td> <?php echo $fname; ?>
						</td>
						<td> <input type="radio" required name="father_mimacth"  id="father_mimacth"  value="OK"><label for="father_mimacth"><b>Yes</b></label><span style="font-size:16px">|</span>
						<input type="radio" name="father_mimacth"  id="father_mimacth1"  value="NOT OK"><label for="father_mimacth1"><b>No</b></label>	</td>
						</tr>
						<tr>
						<td>
						Category </td> <td> <?php echo $row['community']; ?>
						</td>
						<td> <input type="radio" required name="cat_mismatch"  id="cat_mismatch"  value="OK"><label for="cat_mismatch"><b>Yes</b></label><span style="font-size:16px">|</span>
						<input type="radio" name="cat_mismatch"  id="cat_mismatch1"  value="NOT OK"><label for="cat_mismatch1"><b>No</b></label>	</td>
						<td>
						<?php 
						$dob = explode("-",$row['dob']);
						$dob1 = $dob[2]."-".$dob[1]."-".$dob[0];
		
						$interval = date_diff(date_create('2021-01-01'), date_create($row['dob']));
						$age =  $interval->format("%Y Y, - %M M, %d Days");
						?>
						Date Of Birth </td> <td> <?php echo $dob1; ?><br />
						</td>
						<td> <input type="radio" required name="dob_mimacth"  id="dob_mimacth"  value="OK"><label for="dob_mimacth"><b>Yes</b></label><span style="font-size:16px">|</span>
						<input type="radio" name="dob_mimacth"  id="dob_mimacth1"  value="NOT OK"><label for="dob_mimacth1"><b>No</b></label>	</td>
						</tr>
						
						<tr>
						
						<?php
						if($row['category_belongs'] == 1 ){
							
							
						?>
						<td>
						PWD Categeory </td> <td> <?php echo $row['category']; ?></td>
						<td> <input type="radio" required name="pwd_mimacth"  id="pwd_mimacth"  value="OK"><label for="pwd_mimacth"><b>Yes</b></label> <span style="font-size:16px">|</span>
						<input type="radio" name="pwd_mimacth"  id="pwd_mimacth1"  value="NOT OK"><label for="pwd_mimacth1"><b>No</b></label>	</td>
						
						
						<?php }else {
						?>
						<td>
						PWD:</td> <td> No</td>
						<td> <input type="radio" required name="pwd_mimacth"  id="pwd_mimacth"  value="OK"><label for="pwd_mimacth"><b>Yes</b></label><span style="font-size:16px">|</span>
						<input type="radio" name="pwd_mimacth"  id="pwd_mimacth1"  value="NOT OK"><label for="pwd_mimacth1"><b>No</b></label>	</td>
						<?php 
							}?>
							
						
						<?php
						if($row['ex_serviceman'] == 1 ){
							
							
						?>
						<td>
						Exman </td> <td> Yes</td>
						<td> <input type="radio" required name="exman_mimacth"  id="exman_mimacth"  value="OK"><label for="exman_mimacth"><b>Yes</b></label> <span style="font-size:16px">|</span>
						<input type="radio" name="exman_mimacth"  id="exman_mimacth1"  value="NOT OK"><label for="exman_mimacth1"><b>No</b></label>	</td>
						
						
						<?php }else {
						?>
						<td>
						ExMan:</td> <td> No</td>
						<td> <input type="radio" required name="exman_mimacth"  id="exman_mimacth"  value="OK"><label for="exman_mimacth"><b>Yes</b></label><span style="font-size:16px">|</span>
						<input type="radio" name="exman_mimacth"  id="exman_mimacth1"  value="NOT OK"><label for="exman_mimacth1"><b>No</b></label>	</td>
						<?php 
							}?>
						
						
						
						</tr>
						<tr>
						<td>
						Matric </br> Percentage :
						</td>
						<td><?php echo $row['ssc_percentage'] ?> </td>
						<td>
						<input type="radio" required name="matric_marks"  id="matric_marks"  value="OK"><label for="matric_marks"><b>Yes</b></label> <span style="font-size:16px">|</span>
						<input type="radio" name="matric_marks"  id="matric_marks1"  value="NOT OK"><label for="matric_marks1"><b>No</b></label>
						<div class='perr' style='display:none' >
						<label for="Accepted"><b>Enter Matric Percentage </b></label><input type='number'  id='dd_marks' name='dd_marks' autocomplete='off' placeholder='Enter Matric Percentage' pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==5) return false;" />
						</div>
						</td>
						<td>
						ITI Trade :
						</td>
						<td><?php echo $row['trade'] ?> </td>
						<td> <input type="radio" required name="iti_mimacth"  id="iti_mimacth"  value="OK"><label for="iti_mimacth"><b>Yes</b></label> <span style="font-size:16px">|</span>
						<input type="radio" name="iti_mimacth"  id="iti_mimacth1"  value="NOT OK"><label for="iti_mimacth1"><b>No</b></label>	</td>
						</tr>
						
						</table>
						</div>
						
						<!--label for="Accepted"><b>Any Mismatch Matric Percentage </b></label><input type="radio" required name="matric_marks"  id="matric_marks"  value="OK"><label for="matric_marks"><b>Yes</b></label> <span style="font-size:16px">|</span>
						<input type="radio" name="matric_marks"  id="matric_marks1"  value="NOT OK"><label for="matric_marks1"><b>No</b></label>
						<div class='perr' style='display:none' >
						<label for="Accepted"><b>Enter Matric Percentage </b></label><input type='number'  id='dd_marks' name='dd_marks' autocomplete='off' placeholder='Enter Matric Percentage' pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==5) return false;" />
						</div>
						<br /><br /-->
						<input type="radio" name="Accepted" id="Accepted" required value="Accepted" ><label for="Accepted"><b>Accepted</b></label> <span style="font-size:16px">|</span>
						<!--input type="radio" name="Accepted" id="Conditional_Accepted"  value="Conditional Accepted"><label for="Conditional_Accepted"><b>Conditional Accepted</b></label> <span style="font-size:16px">|</span-->
						<input type="radio" required name="Accepted" id="Rejected" required value="Rejected"><label for="Rejected"><b>Rejected</b></label></br></br>
						Remarks : <textarea name="o_remarks" id='o_remarks' rows="4" cols="50" placeholder="Enter Remarks"></textarea></br>
	                   <button type="submit" name="submit" id="submit" value="Submit">Submit</button></br>
						
				</div>

			<input type="hidden" name="reg_id" value="<?php echo $row['transactionid']; ?>">
		
		 <div class='row col-md-12'>
		 <div style="display:flex">
			<div class="clientele" style="color: #419c40;">
			
			<B>Photo</B>
				<img class="popup" src="https://iroams.com/RRCJabalpur/candidateImages/<?php echo $row['photo_file_name']; ?>" name="https://iroams.com/RRCJabalpur/candidateImages/<?php echo $row['photo_file_name']; ?>" alt="<?php echo $row['photo_file_name']; ?>" width="100%" style="border-radius:20px;" title="Photo">
				<br>
				<input type="radio" required name="photo_pVerified1"  id="photo_pVerified1"  value="OK"><label for="photo_pVerified1"><b>OK</b></label> <span style="font-size:16px">|</span>
				<input type="radio" name="photo_pVerified1"  id="photo_pRejected1"  value="NOT OK"><label for="photo_pRejected1"><b>NOT OK</b></label></br>
				Remarks : <input type="text" name="photo_remark" class="textBox" value="">
				
			</div>
			
			<div class="clientele" style="color: #419c40;">
			
			<B>Signature</B>
				<img class="popup" src="https://iroams.com/RRCJabalpur/candidateImages/<?php echo $row['signature_file_name']; ?>" name="https://iroams.com/RRCJabalpur/candidateImages/<?php echo $row['signature_file_name']; ?>" alt="<?php echo $row['signature_file_name']; ?>" width="100%" style="border-radius:20px;" title="Signature">
				<br>
				<input type="radio" required name="sign_sVerified1"  id="sign_sVerified1"  value="OK"><label for="sign_sVerified1"><b>OK</b></label> <span style="font-size:16px">|</span>
				<input type="radio" name="sign_sVerified1"  id="sign_sRejected1"  value="NOT OK"><label for="sign_sRejected1"><b>NOT OK</b></label></br>
				Remarks : <input type="text" name="sign_remark" class="textBox" value="">
				
			</div>
			
			<div class="clientele" style="color: #419c40;">
			
			<B>Matric</B>
			<iframe type="application/pdf"  class="popup" src="http://65.2.184.216/RRCJabalpur/candidateImages/<?php echo $row['matric_file_name']; ?>#toolbar=0&zoom=100" name="http://65.2.184.216/RRCJabalpur/candidateImages/<?php echo $row['matric_file_name']; ?>" alt="<?php echo $row['matric_file_name']; ?>" width="100%" style="border-radius:20px;"  height="350" title="metrict"></iframe>
				<br>
				<input type="radio" required name="matric_sVerified1"  id="matric_sVerified1"  value="OK"><label for="matric_sVerified1"><b>OK</b></label> <span style="font-size:16px">|</span>
				<input type="radio" name="matric_sVerified1"  id="matric_sRejected1"  value="NOT OK"><label for="matric_sRejected1"><b>NOT OK</b></label></br>
				Remarks : <input type="text" name="matric_remark" class="textBox" value="">
				
			</div>
			</div>
		</div>
		 <div class='row col-md-12'>
		 <div style="display:flex; margin-top:10px;">
			<div class="clientele" style="color: #419c40;">
			
			<B>Trade certificate</B>
			<iframe type="application/pdf"  class="popup" src="http://zxyttildata.s3.amazonaws.com/rrcJabalpur/apprentice2021/<?php echo $row['prof_qual_file_name']; ?>#zoom=100&toolbar=0" name="http://zxyttildata.s3.amazonaws.com/rrcJabalpur/apprentice2021/<?php echo $row['prof_qual_file_name']; ?>" alt="<?php echo $row['prof_qual_file_name']; ?>" width="100%" style="border-radius:20px;"  height="350" title="trade"></iframe>
				<br>
				<input type="radio" required name="trade_sVerified1"  id="trade_sVerified1"  value="OK"><label for="trade_sVerified1"><b>OK</b></label> <span style="font-size:16px">|</span>
				<input type="radio" name="trade_sVerified1"  id="trade_sRejected1"  value="NOT OK"><label for="trade_sRejected1"><b>NOT OK</b></label></br>
				Remarks : <input type="text" name="trade_remark" class="textBox" value="">
				
			</div>
			
			<?php  if($row['community'] !== 'General') {   ?>	
			<div class="clientele" style="color: #419c40;">
			
			<B>Categeory certificate</B>
			<iframe type="application/pdf"  class="popup" src="http://zxyttildata.s3.amazonaws.com/rrcJabalpur/apprentice2021/<?php echo $row['cat_file_name']; ?>#zoom=100&toolbar=0" name="http://zxyttildata.s3.amazonaws.com/rrcJabalpur/apprentice2021/<?php echo $row['cat_file_name']; ?>" alt="<?php echo $row['cat_file_name']; ?>" width="100%" style="border-radius:20px;"  height="350" title="cate"></iframe>
				<br>
				<input type="radio" required name="cat_sVerified1"  id="cat_sVerified1"  value="OK"><label for="cat_sVerified1"><b>OK</b></label> <span style="font-size:16px">|</span>
				<input type="radio" name="cat_sVerified1"  id="cat_sRejected1"  value="NOT OK"><label for="cat_sRejected1"><b>NOT OK</b></label></br>
				Remarks : <input type="text" name="cat_remark" class="textBox" value="">
				
			</div>
			<?php } ?>
			
			<?php  if($row['ex_serviceman'] == '1') {   ?>	
				<div class="clientele" style="color: #419c40;">
			
			<B>Ex-Man certificate</B>
			<iframe type="application/pdf"  class="popup" src="http://zxyttildata.s3.amazonaws.com/rrcJabalpur/apprentice2021/<?php echo $row['identity_file_name']; ?>#zoom=100&toolbar=0" name="http://zxyttildata.s3.amazonaws.com/rrcJabalpur/apprentice2021/<?php echo $row['identity_file_name']; ?>" alt="<?php echo $row['identity_file_name']; ?>" width="100%" style="border-radius:20px;"  height="350" title="exman"></iframe>
				<br>
				<input type="radio" required name="exman_sVerified1"  id="exman_sVerified1"  value="OK"><label for="exman_sVerified1"><b>OK</b></label> <span style="font-size:16px">|</span>
				<input type="radio" name="exman_sVerified1"  id="exman_sRejected1"  value="NOT OK"><label for="exman_sRejected1"><b>NOT OK</b></label></br>
				Remarks : <input type="text" name="exman_remark" class="textBox" value="">
				
			</div>
			<?php } ?>
			
			<?php  if($row['category_belongs'] == '1') {   ?>	
				<div class="clientele" style="color: #419c40;">
			
			<B>PWD certificate</B>
			<iframe type="application/pdf"  class="popup" src="http://zxyttildata.s3.amazonaws.com/rrcJabalpur/apprentice2021/<?php echo $row['com_file_name']; ?>#zoom=100&toolbar=0" name="http://zxyttildata.s3.amazonaws.com/rrcJabalpur/apprentice2021/<?php echo $row['com_file_name']; ?>" alt="<?php echo $row['com_file_name']; ?>" width="100%" style="border-radius:20px;"  height="350" title="pwd"></iframe>
				<br>
				<input type="radio" required name="pwd_sVerified1"  id="pwd_sVerified1"  value="OK"><label for="pwd_sVerified1"><b>OK</b></label> <span style="font-size:16px">|</span>
				<input type="radio" name="pwd_sVerified1"  id="pwd_sRejected1"  value="NOT OK"><label for="pwd_sRejected1"><b>NOT OK</b></label></br>
				Remarks : <input type="text" name="pwd_remark" class="textBox" value="">
				
			</div>
			<?php } ?>
			</div>
		</div>
		</form>
<?php
} else {
	echo "";
}
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