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
 if ($_SESSION['username'] == 'admin'){
  $sql = "select * from applicants where  application_status='FINISHED' and (payment_exempted=1 or payment_status='SUCCESS') and is_final=1 and  transactionid='".$_POST['regid']."' AND is_certificate_status is null limit 1"; 
 }else {
	 $sql = "select RD.registration_id,RD.pf_nps_no,RD.gender,A.employee_name,RD.full_name,RD.father_name as newfathername,RD.community,is_cerificate_verified,is_certificate_status,A.father_name,RD.pwd,RD.disability_categeory,RD.photo_path,RD.sign_path,RD.disability_type,A.dob,RD.mother_name
from personal_details RD, emp_details A
Where RD.pf_nps_no=A.pf_nps_no and application_status='completed' AND is_certificate_status is null  and RD.registration_id='".$_POST['regid']."' and A.division='".$_SESSION['username']."' limit 1"; 
	 
 }
$result = mysqli_query($con,$sql);
$row = mysqli_fetch_assoc($result);

//echo $ipaddress = $_SERVER['REMOTE_ADDR'];
if(isset($_POST['submit']) == 'Submit') {
	//echo "<pre>";print_r($_POST);die;
	  $timezone = "Asia/Calcutta";
		if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
		$t=time();
		$d= date("Y-m-d H:i:s",$t);	
		
		$update1=mysqli_query($con,"insert into certification_verification (regid, name_mismatch, father_mismatch, dob_mismatch, cat_mismatch, pwd_mismatch, exman_mismatch, gender_mismatch, iti_mismatch, matric_mismatch, online_mimacth, 10dob_mimacth, scvt_ncvt_mimacth, iti_sem_mimacth, fee_mimacth, cast_mimacth, pwdc_mimacth, esmc_mimacth, exch_mimacth, twelth_mimacth, act_mimacth, medical_mimacth,aadhar_mismatch) values ('".$_POST['reg_id']."','".$_POST['name_mimacth']."','".$_POST['father_mimacth']."','".$_POST['dob_mimacth']."','".$_POST['cat_mismatch']."','".$_POST['pwd_mimacth']."','".$_POST['exman_mimacth']."','".$_POST['gender_mimacth']."','".$_POST['iti_mimacth']."','".$_POST['matric_marks']."','".$_POST['online_mimacth']."','".$_POST['10dob_mimacth']."','".$_POST['scvt_ncvt_mimacth']."','".$_POST['iti_sem_mimacth']."','".$_POST['fee_mimacth']."','".$_POST['cast_mimacth']."','".$_POST['pwdc_mimacth']."','".$_POST['esmc_mimacth']."','".$_POST['exch_mimacth']."','".$_POST['twelth_mimacth']."','".$_POST['act_mimacth']."','".$_POST['medical_mimacth']."','".$_POST['aadhar_mismatch']."');");
		
		if($update1){
	
	   $update2=mysqli_query($con,"update applicants  set is_cerificate_verified=1,is_certificate_status='".$_POST['Accepted']."',is_certificate_remark='".$_POST['o_remarks']."' ,photo_status='".$_POST['photo_pVerified1']."',photo_remark='".$_POST['photo_remark']."' ,sign_status='".$_POST['sign_sVerified1']."',sign_remark='".$_POST['sign_remark']."',matric_status='".$_POST['matric_sVerified1']."',matric_remark='".$_POST['matric_remark']."',trade_status='".$_POST['trade_sVerified1']."',trade_remark='".$_POST['trade_remark']."',cat_status='".$_POST['cat_sVerified1']."',cat_remark='".$_POST['cat_remark']."',exman_status='".$_POST['exman_sVerified1']."',exman_remark='".$_POST['exman_remark']."',pwd_status='".$_POST['pwd_sVerified1']."',pwd_remark='".$_POST['pwd_remark']."' ,verified_user='".$_SESSION['username']."',verified_time='".$d."',m_marksupdated='".$_POST['dd_marks']."',remarks_supervisor='".$_POST['remarks_supervisor']."' where transactionid='".$_POST['reg_id']."' ");
        }else {
			
		echo "<script>window.alert('Something went wrong please try again');</script>";	
		}
		//echo $update2;die;
	if($update2) {

		echo "<script>window.location.replace('verification_result.php?transactionid=".$_POST['reg_id']."');</script>";
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
</style>
<div class="margin-container">
	 <div class="dashboard-widget">
		<div class="title">
			<i class="icon-cloud"></i> Photo Verification
			<button class="toggle" title="Close"><i class="icon-chevron-down"></i></button>
		</div>
		<div class="content">
		
		<form method="post" id="form" align='center'>
			<input type="text" name="regid" autocomplete='off' placeholder="Registration No">
			<input type="submit" name="submit1">
		</form>
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
						<table style='margin: 10px 100px;' class="table table-bordered">
							<tr>
								<td style="width:5%">1.</td> 
								<td>REGISTRATION NO </td> 
								<td> <?php echo $row['transactionid']; ?></td>
								<td style="width:15% !important"></td>
							</tr>
							<tr>
								<td style="width:5%">2.</td>
								<td>ANY MISMATCH IN NAME  </td> 
								<td> <?php echo ucwords($name); ?></td>
								<td style="width:15% !important"> <input type="radio" required name="name_mimacth"  id="name_mimacth"  value="Yes"><label for="name_mimacth"><b>Yes</b></label><span style="font-size:16px">|</span>
								<input type="radio" name="name_mimacth"  id="name_mimacth1"  value="No"><label for="name_mimacth1"><b>No</b></label>	</td>
							</tr>
						<tr>
							<td style="width:5%">3.</td>
							<td>ANY MISMATCH GENDER </td> 
							<td> <?php echo $row['sex']; ?></td>
							<td style="width:15% !important"> <input type="radio" required name="gender_mimacth"  id="gender_mimacth"  value="Yes"><label for="gender_mimacth"><b>Yes</b></label><span style="font-size:16px">|</span>
							<input type="radio" name="gender_mimacth"  id="gender_mimacth1"  value="No"><label for="gender_mimacth1"><b>No</b></label>	</td>
						</tr>
						<tr>
							<td style="width:5%">4.</td>
							<td>ANY MISMATCH FATHER NAME </td> <td> <?php echo ucwords($fname); ?></td>
							<td style="width:15% !important"> <input type="radio" required name="father_mimacth"  id="father_mimacth"  value="Yes"><label for="father_mimacth"><b>Yes</b></label><span style="font-size:16px">|</span>
							<input type="radio" name="father_mimacth"  id="father_mimacth1"  value="No"><label for="father_mimacth1"><b>No</b></label>	</td>
						</tr>
						<tr>
							<td style="width:5%">5.</td>
							<td>ANY MISMATCH IN CATEGORY/CASTE </td> 
							<td> <?php echo $row['community']; ?></td>
							<td style="width:15% !important"> <input type="radio" required name="cat_mismatch"  id="cat_mismatch"  value="Yes"><label for="cat_mismatch"><b>Yes</b></label><span style="font-size:16px">|</span>
							<input type="radio" name="cat_mismatch"  id="cat_mismatch1"  value="No"><label for="cat_mismatch1"><b>No</b></label>	</td>
						</tr>
						<tr>
							<td style="width:5%">6.</td>
							<td>
							<?php 
							$dob = explode("-",$row['dob']);
							$dob1 = $dob[2]."-".$dob[1]."-".$dob[0];
			
							$interval = date_diff(date_create('2021-01-01'), date_create($row['dob']));
							$age =  $interval->format("%Y Y, - %M M, %d Days");
							?>
							ANY MISMATCH IN DATE OF BIRTH </td> 
							<td> <?php echo $dob1; ?><br /></td>
							<td style="width:15% !important"> <input type="radio" required name="dob_mimacth"  id="dob_mimacth"  value="Yes"><label for="dob_mimacth"><b>Yes</b></label><span style="font-size:16px">|</span>
							<input type="radio" name="dob_mimacth"  id="dob_mimacth1"  value="No"><label for="dob_mimacth1"><b>No</b></label>	</td>
						</tr>
						
						<tr>
							<?php
							if($row['category_belongs'] == 1 ){
								
								
							?>
							<td style="width:5%">7.</td>
							<td>ANY MISMATCH IN PWD (LD/VI/HI/MD) IF APPLICABLE </td> 
							<td> <?php echo $row['category']; ?></td>
							<td style="width:15% !important"> <input type="radio" required name="pwd_mimacth"  id="pwd_mimacth"  value="Yes"><label for="pwd_mimacth"><b>Yes</b></label> <span style="font-size:16px">|</span>
							<input type="radio" name="pwd_mimacth"  id="pwd_mimacth1"  value="No"><label for="pwd_mimacth1"><b>No</b></label>	</td>
							
							
							<?php }else {
							?>
							<td style="width:5%">7.</td>
							<td>ANY MISMATCH IN PWD (LD/VI/HI/MD) IF APPLICABLE:</td> 
							<td> No</td>
							<td style="width:15% !important"> <input type="radio" required name="pwd_mimacth"  id="pwd_mimacth"  value="Yes"><label for="pwd_mimacth"><b>Yes</b></label><span style="font-size:16px">|</span>
							<input type="radio" name="pwd_mimacth"  id="pwd_mimacth1"  value="No"><label for="pwd_mimacth1"><b>No</b></label>	</td>
							<?php 
								}?>
								
						</tr>
							<tr>
							<?php
							if($row['ex_serviceman'] == 1 ){
								
								
							?>
						<td style="width:5%">8.</td>
						<td>ANY MISMATCH IN ExSM IF APPLICABLE </td> <td> Yes</td>
						<td style="width:15% !important"> <input type="radio" required name="exman_mimacth"  id="exman_mimacth"  value="Yes"><label for="exman_mimacth"><b>Yes</b></label> <span style="font-size:16px">|</span>
						<input type="radio" name="exman_mimacth"  id="exman_mimacth1"  value="No"><label for="exman_mimacth1"><b>No</b></label>	</td>
						
						
						<?php }else {
						?>
						<td style="width:5%">8.</td>
						<td>
							
						ANY MISMATCH IN ExSM IF APPLICABLE:</td> <td> No</td>
						<td style="width:15% !important"> <input type="radio" required name="exman_mimacth"  id="exman_mimacth"  value="Yes"><label for="exman_mimacth"><b>Yes</b></label><span style="font-size:16px">|</span>
						<input type="radio" name="exman_mimacth"  id="exman_mimacth1"  value="No"><label for="exman_mimacth1"><b>No</b></label>	</td>
						<?php 
							}?>
						
						
						
						</tr>
						<tr>
							<td style="width:5%">9.</td>
							<td>ANY MISMATCH IN PERCENTAGE IN CLASS 10TH :</td>
							<td><?php echo $row['ssc_percentage'] ?> </td>
							<td style="width:15% !important">
								<input type="radio" required name="matric_marks"  id="matric_marks"  value="Yes"><label for="matric_marks"><b>Yes</b></label> <span style="font-size:16px">|</span>
								<input type="radio" name="matric_marks"  id="matric_marks1"  value="No"><label for="matric_marks1"><b>No</b></label>
								<div class='perr' style='display:none' >
								<label for="Accepted"><b>Enter Matric Percentage </b></label><input type='number' step=".01" id='dd_marks' name='dd_marks' autocomplete='off' placeholder='Enter Matric Percentage' pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==5) return false;" />
								</div>
							</td>
						</tr>
						<tr>
							<td style="width:5%">10.</td>
							<td>
							ANY MISMATCH IN TRADE  :
							</td>
							<td><?php echo $row['trade'] ?> </td>
							<td style="width:15% !important"> <input type="radio" required name="iti_mimacth"  id="iti_mimacth"  value="Yes"><label for="iti_mimacth"><b>Yes</b></label> <span style="font-size:16px">|</span>
							<input type="radio" name="iti_mimacth"  id="iti_mimacth1"  value="No"><label for="iti_mimacth1"><b>No</b></label>	</td>
						</tr>
						<tr>
							<td style="width:5%">11.</td>
						<td colspan='2'>
						WHETHER PRODUCED COPY OF ONLINE APPLICATION/REGISTRATION FORM/ACKNOWLEGEMENT
						</td>		
						<td> <input type="radio" required name="online_mimacth"  id="online_mimacth"  value="Yes"><label for="online_mimacth"><b>Yes</b></label> <span style="font-size:16px">|</span>
						<input type="radio" name="online_mimacth"  id="online_mimacth1"  value="No"><label for="online_mimacth1"><b>No</b></label>	</td>						
												
						</tr>
						<tr>
							<td style="width:5%">12.</td>
						<td colspan='2'>
						WHETHER PRODUCED 10TH CLASS CERTIFICATE IN PROOF OF DATE OF BIRTH 
						</td>						
						<td style="width:15% !important"> <input type="radio" required name="10dob_mimacth"  id="10dob_mimacth"  value="Yes"><label for="10dob_mimacth"><b>Yes</b></label> <span style="font-size:16px">|</span>
						<input type="radio" name="10dob_mimacth"  id="10dob_mimacth1"  value="No"><label for="10dob_mimacth1"><b>No</b></label>	</td>
						
						</tr>
						
						<tr>
							<td style="width:5%">13.</td>
						<td colspan='2'>
						WHETHER PRODUCED ITI (SCVT/NCVT) CERTIFICATE ISSUED BY COMPETENT AUTHORITY 
						</td>						
						<td style="width:15% !important"> <input type="radio" required name="scvt_ncvt_mimacth"  id="scvt_ncvt_mimacth"  value="Yes"><label for="scvt_ncvt_mimacth"><b>Yes</b></label> <span style="font-size:16px">|</span>
						<input type="radio" name="scvt_ncvt_mimacth"  id="scvt_ncvt_mimacth1"  value="No"><label for="scvt_ncvt_mimacth1"><b>No</b></label>	</td>						
						</tr>
						<tr>
							<td style="width:5%">14.</td>
						<td colspan='2'>
						WHETHER PRODUCED MARKSHEETS OF ALL SEMESTERS ITI RELATED TRADE
						</td>						
						<td style="width:15% !important"> <input type="radio" required name="iti_sem_mimacth"  id="iti_sem_mimacth"  value="Yes"><label for="iti_sem_mimacth"><b>Yes</b></label> <span style="font-size:16px">|</span>
						<input type="radio" name="iti_sem_mimacth"  id="iti_sem_mimacth1"  value="No"><label for="iti_sem_mimacth1"><b>No</b></label>	</td>
						
						</tr>
						
						<tr>
							<td style="width:5%">15.</td>
						<td colspan='2'>
						FEE RECEIPT PRODUCED BY THE APPLICANT 
						</td>						
						<td style="width:15% !important"> <input type="radio" required name="fee_mimacth"  id="fee_mimacth"  value="Yes"><label for="fee_mimacth"><b>Yes</b></label> <span style="font-size:16px">|</span>
						<input type="radio" name="fee_mimacth"  id="fee_mimacth1"  value="No"><label for="fee_mimacth1"><b>No</b></label>	</td>						
						</tr>
						<tr>
							<td style="width:5%">16.</td>
						<td colspan='2'>
						WHETHER PRODUCED CATEGORY/CASTE CERTIFICATE IN PRESCRIBED FORMAT ISSUED BY COMPETENT AUTHORITY IF APPLICABLE (I.E. 
SC/ST/OBC/EWS)
						</td>		
                       <?php   if($row['community'] !== 'General')	{ ?>					
						<td style="width:15% !important"> <input type="radio" required name="cast_mimacth"  id="cast_mimacth"  value="Yes"><label for="cast_mimacth"><b>Yes</b></label> <span style="font-size:16px">|</span>
						<input type="radio" name="cast_mimacth"  id="cast_mimacth1"  value="No"><label for="cast_mimacth1"><b>No</b></label>	</td>
						<?php } else { ?>
						<td style="text-align:center"> NA<input type="hidden" required name="cast_mimacth"  id="cast_mimacth"  value="NA"></td>
						<?php } ?>
						</tr>
						
						
						<tr>
							<td style="width:5%">17.</td>
						<td colspan='2'>
						WHETHER PRODUCED PWD CERTIFICATE ISSUED BY COMPETENT AUTHORITY IN CASE OF PWD 
						</td>		
						<?php if($row['category_belongs'] == 1 ){ ?>
						<td style="width:15% !important"> <input type="radio" required name="pwdc_mimacth"  id="pwdc_mimacth"  value="Yes"><label for="pwdc_mimacth"><b>Yes</b></label> <span style="font-size:16px">|</span>
						<input type="radio" name="pwdc_mimacth"  id="pwdc_mimacth1"  value="No"><label for="pwdc_mimacth1"><b>No</b></label>	</td>						
						<?php } else { ?>
						<td style="text-align:center"> NA<input type="hidden" required name="pwdc_mimacth"  id="pwdc_mimacth"  value="NA"></td>
						<?php } ?>
					</tr>
					<tr>
						<td style="width:5%">18.</td>
						<td colspan='2'>
						WHETHER PRODUCED DISCHARGE CERTIFICATE/SERVICE CERTIFICATE IN CASE OF ExSM

						</td>
						<?php
						if($row['ex_serviceman'] == 1 ){
							
							
						?>						
						<td style="width:15% !important"> <input type="radio" required name="esmc_mimacth"  id="esmc_mimacth"  value="Yes"><label for="esmc_mimacth"><b>Yes</b></label> <span style="font-size:16px">|</span>
						<input type="radio" name="esmc_mimacth"  id="esmc_mimacth1"  value="No"><label for="esmc_mimacth1"><b>No</b></label>	</td>
						<?php } else { ?>
						<td style="text-align:center"> NA<input type="hidden" required name="esmc_mimacth"  id="esmc_mimacth"  value="NA"></td>
						<?php } ?>
						</tr>
						
						<tr>
							<td style="width:5%">19.</td>
						<td colspan='2'>
						WHETHER CHILDREN OF ExSM IF YES WHETHER PRODUCED PROPER CERTIFICATE

						</td>	
						<?php
						if($row['ex_serviceman'] == 1 ){
							
							
						?>						
						<td style="width:5%"> <input type="radio" required name="exch_mimacth"  id="exch_mimacth"  value="Yes"><label for="exch_mimacth"><b>Yes</b></label> <span style="font-size:16px">|</span>
						<input type="radio" name="exch_mimacth"  id="exch_mimacth1"  value="No"><label for="exch_mimacth1"><b>No</b></label>	</td>						
						<?php } else { ?>
						<td style="text-align:center"> NA<input type="hidden" required name="exch_mimacth"  id="exch_mimacth"  value="NA"></td>
						<?php } ?>
					</tr>
					<tr>
						<td style="width:5%">20.</td>
						<td colspan='2'>
						WHETHER PRODUCED 12TH CLASS CERTIFICATE IF APPLICABLE

						</td>						
						<td style="text-align:center"> NA<input type="hidden" required name="twelth_mimacth"  id="twelth_mimacth"  value="NA"></td>
						</tr>
						
							<tr>
								<td style="width:5%">21.</td>
						<td colspan='2'>
					
                         WHETHER OBTAINED TRAINING FROM ANY INSTITUTION/ORGANISATION UNDER APPRENTICE ACT 1961 EARLIER 

						</td>						
						<td style="width:15% !important"> <input type="radio" required name="act_mimacth"  id="act_mimacth"  value="Yes"><label for="act_mimacth"><b>Yes</b></label> <span style="font-size:16px">|</span>
						<input type="radio" name="act_mimacth"  id="act_mimacth1"  value="No"><label for="act_mimacth1"><b>No</b></label>	</td>						
						</tr>

						<tr>
							<td style="width:5%">22.</td>
						<td colspan='2'>
					
                         WHETHER PRODUCED AADHAR CARD 

						</td>						
						<td style="width:15% !important"> <input type="radio" required name="aadhar_mismatch"  id="aadhar_mismatch"  value="Yes"><label for="aadhar_mismatch"><b>Yes</b></label> <span style="font-size:16px">|</span>
						<input type="radio" name="aadhar_mismatch"  id="aadhar_mismatch1"  value="No"><label for="aadhar_mismatch1"><b>No</b></label>	</td>						
						</tr>

						<tr>
							<td style="width:5%">23.</td>
						<td colspan='2'>
						WHETHER PRODUCED MEDICAL FITNESS CERTIFICATE ISSUED BY GOVERNMENT DOCTOR (GAZZETED) NOT BELOW THE RANK OF ASSTT. SURGEON OF CENTRAL/STATE GOVERNMENT HOSPITAL

						</td>						
						<td style="width:15% !important"> <input type="radio" required name="medical_mimacth"  id="medical_mimacth"  value="Yes"><label for="medical_mimacth"><b>Yes</b></label> <span style="font-size:16px">|</span>
						<input type="radio" name="medical_mimacth"  id="medical_mimacth1"  value="No"><label for="medical_mimacth1"><b>No</b></label>	</td>
						
						</tr>
						
						
						</table>
						</div>
						
						<br /><br /><br />
						Remarks of Supervisor: <textarea name="remarks_supervisor" id='remarks_supervisor' rows="4" cols="50" placeholder="Enter Remarks"></textarea></br><br>
						<input type="radio" name="Accepted" id="Accepted" required value="Suitable" ><label for="Accepted"><b>Suitable</b></label> <span style="font-size:16px">|</span>
						<!--input type="radio" name="Accepted" id="Conditional_Accepted"  value="Conditional Accepted"><label for="Conditional_Accepted"><b>Conditional Accepted</b></label> <span style="font-size:16px">|</span-->
						<input type="radio" required name="Accepted" id="Rejected" required value="Unsuitable"><label for="Rejected"><b>Unsuitable</b></label></br></br>
						Remarks of concerned officer: <textarea name="o_remarks" id='o_remarks' rows="4" cols="50" placeholder="Enter Remarks"></textarea></br>
	                   <button type="submit" name="submit" id="submit" value="Submit">Submit</button></br></br>
						
				</div>
<h1><a target='_blank' href='acknowledgement.php?regid=<?php echo $row['transactionid']; ?>'>Get Application Form</a></h1>
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
			<iframe type="application/pdf"  class="popup" src="http://biometricregistrationdb.s3.amazonaws.com/rrcJabalpur/apprentice2021/<?php echo $row['matric_file_name']; ?>#toolbar=0&zoom=100" name="http://biometricregistrationdb.s3.amazonaws.com/rrcJabalpur/apprentice2021/<?php echo $row['matric_file_name']; ?>" alt="<?php echo $row['matric_file_name']; ?>" width="100%" style="border-radius:20px;"  height="350" title="metrict"></iframe>
				
				<br>
				<a target="_blank" href="http://biometricregistrationdb.s3.amazonaws.com/rrcJabalpur/apprentice2021/<?php echo $row['matric_file_name']; ?>">Click here for full view</a>
				<br>
				<input type="radio" required name="matric_sVerified1"  id="matric_sVerified1"  value="OK"><label for="matric_sVerified1"><b>OK</b></label> <span style="font-size:16px">|</span>
				<input type="radio" name="matric_sVerified1"  id="matric_sRejected1"  value="NOT OK"><label for="matric_sRejected1"><b>NOT OK</b></label>
				<br>
				Remarks : <input type="text" name="matric_remark" class="textBox" value="">
				
			</div>
			
			</div>
		</div>
		 <div class='row col-md-12'>
		 <div style="display:flex; margin-top:10px;">
			<div class="clientele" style="color: #419c40;">
			
			<B>Trade certificate</B>
			<iframe type="application/pdf"  class="popup" src="http://biometricregistrationdb.s3.amazonaws.com/rrcJabalpur/apprentice2021/<?php echo $row['prof_qual_file_name']; ?>#zoom=100&toolbar=0" name="http://biometricregistrationdb.s3.amazonaws.com/rrcJabalpur/apprentice2021/<?php echo $row['prof_qual_file_name']; ?>" alt="<?php echo $row['prof_qual_file_name']; ?>" width="100%" style="border-radius:20px;"  height="350" title="trade"></iframe>
				<br>
				<a target="_blank" href="http://biometricregistrationdb.s3.amazonaws.com/rrcJabalpur/apprentice2021/<?php echo $row['prof_qual_file_name']; ?>">Click here for full view</a>
				<br>
				<input type="radio" required name="trade_sVerified1"  id="trade_sVerified1"  value="OK"><label for="trade_sVerified1"><b>OK</b></label> <span style="font-size:16px">|</span>
				<input type="radio" name="trade_sVerified1"  id="trade_sRejected1"  value="NOT OK"><label for="trade_sRejected1"><b>NOT OK</b></label></br>
				Remarks : <input type="text" name="trade_remark" class="textBox" value="">
				
			</div>
			
			<?php  if($row['community'] !== 'General') {   ?>	
			<div class="clientele" style="color: #419c40;">
			
			<B>Categeory certificate</B>
			<iframe type="application/pdf"  class="popup" src="http://biometricregistrationdb.s3.amazonaws.com/rrcJabalpur/apprentice2021/<?php echo $row['cat_file_name']; ?>#zoom=100&toolbar=0" name="http://biometricregistrationdb.s3.amazonaws.com/rrcJabalpur/apprentice2021/<?php echo $row['cat_file_name']; ?>" alt="<?php echo $row['cat_file_name']; ?>" width="100%" style="border-radius:20px;"  height="350" title="cate"></iframe>
				<br>
				<a target="_blank" href="http://biometricregistrationdb.s3.amazonaws.com/rrcJabalpur/apprentice2021/<?php echo $row['cat_file_name']; ?>">Click here for full view</a>
				<br>
				<input type="radio" required name="cat_sVerified1"  id="cat_sVerified1"  value="OK"><label for="cat_sVerified1"><b>OK</b></label> <span style="font-size:16px">|</span>
				<input type="radio" name="cat_sVerified1"  id="cat_sRejected1"  value="NOT OK"><label for="cat_sRejected1"><b>NOT OK</b></label></br>
				Remarks : <input type="text" name="cat_remark" class="textBox" value="">
				
			</div>
			<?php } ?>
			
			<?php  if($row['ex_serviceman'] == '1') {   ?>	
				<div class="clientele" style="color: #419c40;">
			
			<B>Ex-Man certificate</B>
			<iframe type="application/pdf"  class="popup" src="http://biometricregistrationdb.s3.amazonaws.com/rrcJabalpur/apprentice2021/<?php echo $row['identity_file_name']; ?>#zoom=100&toolbar=0" name="http://biometricregistrationdb.s3.amazonaws.com/rrcJabalpur/apprentice2021/<?php echo $row['identity_file_name']; ?>" alt="<?php echo $row['identity_file_name']; ?>" width="100%" style="border-radius:20px;"  height="350" title="exman"></iframe>
				<br>
				<a target="_blank" href="http://biometricregistrationdb.s3.amazonaws.com/rrcJabalpur/apprentice2021/<?php echo $row['identity_file_name']; ?>">Click here for full view</a>
				<br>
				<input type="radio" required name="exman_sVerified1"  id="exman_sVerified1"  value="OK"><label for="exman_sVerified1"><b>OK</b></label> <span style="font-size:16px">|</span>
				<input type="radio" name="exman_sVerified1"  id="exman_sRejected1"  value="NOT OK"><label for="exman_sRejected1"><b>NOT OK</b></label></br>
				Remarks : <input type="text" name="exman_remark" class="textBox" value="">
				
			</div>
			<?php } ?>
			
			<?php  if($row['category_belongs'] == '1') {   ?>	
				<div class="clientele" style="color: #419c40;">
			
			<B>PWD certificate</B>
			<iframe type="application/pdf"  class="popup" src="http://biometricregistrationdb.s3.amazonaws.com/rrcJabalpur/apprentice2021/<?php echo $row['com_file_name']; ?>#zoom=100&toolbar=0" name="http://biometricregistrationdb.s3.amazonaws.com/rrcJabalpur/apprentice2021/<?php echo $row['com_file_name']; ?>" alt="<?php echo $row['com_file_name']; ?>" width="100%" style="border-radius:20px;"  height="350" title="pwd"></iframe>
				<br>
				<a target="_blank" href="http://biometricregistrationdb.s3.amazonaws.com/rrcJabalpur/apprentice2021/<?php echo $row['com_file_name']; ?>">Click here for full view</a>
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
	echo "<p style='color:red;text-align:center'>Either no data not is found or verification is already done</p>";
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
$('input[name=Accepted]').change(function() {debugger;
	
		if($(this).val() == 'Rejected'){
			$('#o_remarks').prop('required', true);
		}else {
			$('#o_remarks').prop('required', false);
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
</script>
<?php
include_once "footer.php";
?>