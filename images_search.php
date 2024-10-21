
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

  $sql = "select * from registration_details_sports where payment_success=1 and dv_rollno='".$_POST['regid']."' limit 1"; 
 
$result = mysqli_query($con,$sql);
$row = mysqli_fetch_assoc($result);
function caluclate_age($dob) {
    $from = new DateTime($dob);
    $to   = new DateTime('2023-07-01');
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
if(isset($_POST['submit']) == 'Submit') {
	//echo "<pre>";print_r($_POST);die;
	  $timezone = "Asia/Calcutta";
		if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
		$t=time();
		$d= date("Y-m-d H:i:s",$t);	
		$ip = isset($_SERVER['HTTP_X_FORWARDED_FOR'])?$_SERVER['HTTP_X_FORWARDED_FOR']:$_SERVER['REMOTE_ADDR'];
		if($_POST['dom_mimacth'] == 'No' || $_POST['domcert_mimacth'] == 'No' || $_POST['catcert_mimacth'] == 'No' ) {
			$catfinal='GEN' ;
		}
		if($_POST['dob_mimacth'] == 'Yes'){
		echo '11---' .$age=caluclate_age($_POST['dob_enter'])	;
		 $interval = date_diff(date_create('2023-07-01'), date_create($_POST['dob_enter']));
		echo '   22---'  .$agedd =  $interval->format("%Y Y, - %M M, %d Days");
		
		}else {
		echo '33---'	.$age=caluclate_age($_POST['dob_orginal'])	;
			$interval = date_diff(date_create('2023-07-01'), date_create($_POST['dob_orginal']));
		echo '   44---' .$agedd =  $interval->format("%Y Y, - %M M, %d Days");
		}
		
		/*if($_POST['two_mimacth'] == 'Yes') {
			$minagecal='16';
			
		}else {
			$minagecal='18';
		}
		if($_POST['five_mimacth'] == 'Yes') {
			$agecal='26';
		}else {
			$agecal='21';
		}
		
		if($minagecal < $age || $age > $agecal){
		$ageeligible='UNFIT'	;
		}else {
			
		$ageeligible='FIT'	;	
		}*/
		
			if($age < 18 ){
				if($_POST['twoyeras'] == 'Yes' || $_POST['two_mimacth'] == 'Yes') {
					if($age < 16 ){
						$ageeligible='UNFIT'	;	
					}else {
						$ageeligible='FIT';
						}
				}else {
				$ageeligible='UNFIT';	
				}
			}
			if($age > 21){
				if($_POST['tfiveyeras'] == 'Yes' || $_POST['five_mimacth'] == 'Yes') {
					if($age > 27 ){
						$ageeligible='UNFIT';	
					}else {
						$ageeligible='FIT'	;
				}
				}else {
					$ageeligible='UNFIT';
				}
				}
			if(empty($ageeligible)){
				$ageeligible='FIT';
			}
			if($ageeligible == 'FIT'){
			if($_POST['nan_mimacth'] == 'No' && $_POST['innan_mimacth'] == 'No' && $_POST['innanv_mimacth'] == 'No' && $_POST['nanv_mimacth'] == 'No' && $_POST['nanc_mimacth'] == 'No' && $_POST['nancv_mimacth'] == 'No' && $_POST['fed_mimacth'] == 'No' && $_POST['fedv_mimacth'] == 'No' && $_POST['allin_mimacth'] == 'No' && $_POST['allinv_mimacth'] == 'No' && $_POST['allint_mimacth'] == 'No' && $_POST['allintv_mimacth'] == 'No' && $_POST['world_mimacth'] == 'No' && $_POST['worldv_mimacth'] == 'No' && $_POST['nworld_mimacth'] == 'No' && $_POST['nworldv_mimacth'] == 'No' && $_POST['allworld_mimacth'] == 'No' && $_POST['allworldv_mimacth'] == 'No' ){
				$ageeligible='UNFIT';
			}
			}
		
		
		
	$insert_q="insert into dvdata (AADHAARNUMBER, name_mismatch, c_name, father_mismatch, fname_enter, gender_mismatch, g_name, dob_mismatch, dob_enter, age, age_eligiable, dom_mismatch,dom_certificate, cat_mismatch, cat_enter, cat_certificate, nielit_mismatch, army_mismatch, ncc_mismatch, matric_mismatch, inter_mismatch, verified_user, verified_time,ipaddress,is_certificate_remark,Sports_Name,five_mismatch,two_mismatch,cat_certificatev,national_gamesc,national_gamesv,national_champc,national_champv,feder_cupc,feder_cupv,all_Indiac,all_Indiav,all_Indiatc,all_Indiatv,world_schoolc,world_schoolv,national_schoolc,national_schoolv,india_policec,india_policev,nielit_mismatchv,army_mismatchv,ncc_mismatchv,matric_mismatchv,inter_mismatchv,dom_certificatev,international_c,international_v) values ('".$_POST['reg_id']."','".$_POST['name_mimacth']."','".$_POST['name_enter']."','".$_POST['father_mimacth']."','".$_POST['fname_enter']."','".$_POST['gender_mimacth']."','".$_POST['gender_enter']."','".$_POST['dob_mimacth']."','".$_POST['dob_enter']."','".$agedd."','".$ageeligible."','".$_POST['dom_mimacth']."','".$_POST['domcert_mimacth']."','".$_POST['cat_mismatch']."','".$_POST['caste_enter']."','".$_POST['catcert_mimacth']."','".$_POST['nielit_mimacth']."','".$_POST['army_mimacth']."','".$_POST['ncc_mimacth']."','".$_POST['matric_marks']."','".$_POST['inter_marks']."','".$_SESSION['username']."','".$d."','".$ip."','".$_POST['o_remarks']."','".$_POST['SportsName']."','".$_POST['five_mimacth']."','".$_POST['two_mimacth']."','".$_POST['catcertv_mimacth']."','".$_POST['nan_mimacth']."','".$_POST['nanv_mimacth']."','".$_POST['nanc_mimacth']."','".$_POST['nancv_mimacth']."','".$_POST['fed_mimacth']."','".$_POST['fedv_mimacth']."','".$_POST['allin_mimacth']."','".$_POST['allinv_mimacth']."','".$_POST['allint_mimacth']."','".$_POST['allintv_mimacth']."','".$_POST['world_mimacth']."','".$_POST['worldv_mimacth']."','".$_POST['nworld_mimacth']."','".$_POST['nworldv_mimacth']."','".$_POST['allworld_mimacth']."','".$_POST['allworldv_mimacth']."','".$_POST['nielitv_mimacth']."','".$_POST['armycert_mimacth']."','".$_POST['ncccert_mimacth']."','".$_POST['matricv_marks']."','".$_POST['interv_marks']."','".$_POST['domcertv_mimacth']."','".$_POST['innan_mimacth']."','".$_POST['innanv_mimacth']."')";
	$submitform=mysqli_query($con,$insert_q);
	
	
	// echo   $update2=mysqli_query($con,"update masterdata  set is_cerificate_verified=1,is_certificate_status='".$_POST['Accepted']."',is_certificate_remark='".$_POST['o_remarks']."' ,verified_user='".$_SESSION['username']."',verified_time='".$d."',m_marksupdated='".$_POST['dd_marks']."',inter_marksupdated='".$_POST['interdd_marks']."',remarks_supervisor='".$_POST['remarks_supervisor']."' ,name_mismatch='".$_POST['name_mimacth']."',father_mismatch='".$_POST['father_mimacth']."',dob_mismatch='".$_POST['dob_mimacth']."',cat_mismatch='".$_POST['cat_mismatch']."',gender_mismatch='".$_POST['gender_mimacth']."',sports_mismatch='".$_POST['sports_mimacth']."',matric_mismatch='".$_POST['matric_marks']."',inter_mismatch='".$_POST['inter_marks']."',dom_mismatch='".$_POST['dom_mimacth']."',nielit_mismatch='".$_POST['nielit_mimacth']."',army_mismatch='".$_POST['army_mimacth']."',ncc_mismatch='".$_POST['ncc_mimacth']."',c_name='".$_POST['name_enter']."',g_name='".$_POST['gender_enter']."',f_name='".$_POST['fname_enter']."'  where AADHAARNUMBER='".$_POST['reg_id']."' ");
        
		//echo $update2;die;
	if($submitform) {

		echo "<script>window.location.replace('verification_result.php?transactionid=".$_POST['reg_id']."');</script>";
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
}
</style>
<body oncontextmenu="return false">
<div class="margin-container">
	 <div class="dashboard-widget">
		<div class="title">
			<i class="icon-cloud"></i> Verification
			<button class="toggle" title="Close"><i class="icon-chevron-down"></i></button>
		</div>
		<div class="content">
		
		<form method="post" id="form" align='center'>
			<input type="text" name="regid" autocomplete='off' placeholder="Enter DV RollNo">
			<input type="submit" name="submit1">
		</form>
<?php 
if(!empty($row)) {
	
	 $sqldd = "select * from dvdata where    AADHAARNUMBER='".$_POST['regid']."' order by id desc limit 1"; 
	$resultdd = mysqli_query($con,$sqldd);
	$row2 = mysqli_fetch_assoc($resultdd);
	
	if(mysqli_num_rows($resultdd)<= 0) {
?>

		<form method="post" id="form">
				<div class="details">
					
						<div  class='details'>
						<table style='margin: 10px 100px;' class="table table-bordered">
						<tr>
						<td><b style="font-weight: bold;">S.NO</b></td>
						<td><b style="font-weight: bold;">Description</b></td>
						<td><b style="font-weight: bold;">Candidate Data</b></td>
						<td><b style="font-weight: bold;">Status</b></td>
							</tr>
							<tr>
								<td style="width:5%">1.</td> 
								<td>Registration No </td> 
								<td> <?php echo $row['registraionid']; ?></td>
								
								<td style="width:15% !important"></td>
							</tr>
							<tr>
								<td style="width:5%">1.</td> 
								<td>DV RollNo </td> 
								<td> <?php echo $row['dv_rollno']; ?></td>
								
								<td style="width:15% !important"></td>
							</tr>
							<tr>
								<td style="width:5%">2.</td> 
								<td>Sports Name </td> 
								<td> <?php echo $row['post_applied']; ?></td>
								
								<td style="width:15% !important"></td>
							</tr>
							<tr>
								<td style="width:5%">3.</td> 
								<td>Sub Sports Name </td> 
								<td> <?php echo $row['nameofposition']; ?></td>
								
								<td style="width:15% !important"></td>
							</tr>
							<!--tr>
								<td style="width:5%">3.</td> 
								<td>Sports Code </td> 
								<td> <?php echo $row['code_subpost']; ?></td>
								
								<td style="width:15% !important"></td>
							</tr-->
							<tr>
								<td style="width:5%">4.</td>
								<td>Any Mismatch in Name   </td> 
								
									<td> <?php echo $row['first_name'].' '.$row['middle_name'].' '.$row['last_name']; ?></td>
								<td style="width:15% !important"> <input type="radio" required name="name_mimacth"  id="name_mimacth"  value="Yes"><label for="name_mimacth"><b>Yes</b></label><span style="font-size:16px">|</span>
								<input type="radio" name="name_mimacth"  id="name_mimacth1"  value="No"><label for="name_mimacth1"><b>No</b></label>	
								
								<div class='nameclass' style='display:none' >
								<label for="Accepted"><b>Enter Name </b></label><input type='text' step=".01" id='name_enter' name='name_enter' autocomplete='off' placeholder='Enter Name'   />
								</div>
								</td>
							</tr>
						<tr>
							<td style="width:5%">5.</td>
							<td>Any Mismatch in Gender </td> 
							<td> <?php echo $row['sex']; ?></td>
							<td style="width:15% !important"> <input type="radio" required name="gender_mimacth"  id="gender_mimacth"  value="Yes"><label for="gender_mimacth"><b>Yes</b></label><span style="font-size:16px">|</span>
							<input type="radio" name="gender_mimacth"  id="gender_mimacth1"  value="No"><label for="gender_mimacth1"><b>No</b></label>
								<div class='genderclass' style='display:none' >
								<label for="Accepted"><b>Enter Gender </b></label>
								<!--input type='text' step=".01" id='gender_enter' name='gender_enter' autocomplete='off' placeholder='Enter Gender'   /-->
								<select  step=".01" id="gender_enter" name="gender_enter" class="large form-control" autocomplete="off"  >
                                      <option value="">Select Gender</option>
                                      <option value="Male">Male</option>
                                      <option value="Female">Female</option>                                   
                                   </select>
								</div>

							</td>
						</tr>
						<tr>
							<td style="width:5%">6.</td>
							<td>Any Mismatch in FatherName  </td> <td> <?php echo ucwords($row['father_name']); ?></td>
							<td style="width:15% !important"> <input type="radio" required name="father_mimacth"  id="father_mimacth"  value="Yes"><label for="father_mimacth"><b>Yes</b></label><span style="font-size:16px">|</span>
							<input type="radio" name="father_mimacth"  id="father_mimacth1"  value="No"><label for="father_mimacth1"><b>No</b></label>	
							
							<div class='fnameclass' style='display:none' >
								<label for="Accepted"><b>Enter Father Name  </b></label>
								<input type='text' step=".01" id='fname_enter' name='fname_enter' autocomplete='off' placeholder='Enter Father Name'   />
								  
								</div>
							</td>
						</tr>
						
						<tr>
							<td style="width:5%">7.</td>
							<td>
							<?php 
							$dob = explode("-",$row['dob']);
							//print_r($dob);
							$dob1 = $dob[0]."-".$dob[1]."-".$dob[2];
							$dob2 = $dob[2]."-".$dob[1]."-".$dob[0];
			
							$interval = date_diff(date_create('2023-07-01'), date_create($row['dob']));
							  $age =  $interval->format("%Y Y, - %M M, %d Days");
							?>
							Any Mismatch in DOB   </td> 
							<td> <?php echo $dob2; ?><br /></td>
							<td style="width:15% !important"> <input type="radio" required name="dob_mimacth"  id="dob_mimacth"  value="Yes"><label for="dob_mimacth"><b>Yes</b></label><span style="font-size:16px">|</span>
							<input type="radio" name="dob_mimacth"  id="dob_mimacth1"  value="No"><label for="dob_mimacth1"><b>No</b></label>
							<div class='dobclass' style='display:none' >
								<label for="Accepted"><b>Enter DOB  </b></label>
								<input type='date' step=".01" id='dob_enter' name='dob_enter' autocomplete='off' placeholder='Enter DOB'   />
								<input type='hidden' step=".01" id='dob_orginal' name='dob_orginal' autocomplete='off' value='<?php echo $row['dob'] ?>'   />
								  
								</div>

							</td>
						</tr>
						
						<tr>
							<td style="width:5%">8.</td>
							<td>Is +5 Years relaxation claimed  </td> 
							<td> <?php echo $row['5years_age_relax'] ?> <br /></td>
							<input type="hidden" name="tfiveyeras"  id="tfiveyeras"  value="<?php echo $row['5years_age_relax'] ?>" />
							<td style="width:15% !important"> <input type="radio" required name="five_mimacth"  id="five_mimacth"  value="Yes"><label for="five_mimacth"><b>Yes</b></label><span style="font-size:16px">|</span>
							<input type="radio" name="five_mimacth"  id="five_mimacth1"  value="No"><label for="five_mimacth1"><b>No</b></label>

							</td>
						</tr>
						
						<tr>
							<td style="width:5%">9.</td>
							<td>Is -2 Years relaxation claimed  </td> 
							<td> <?php echo $row['2years_age_relax'] ?> <br /></td>
								<input type="hidden" name="twoyeras"  id="twoyeras"  value="<?php echo $row['2years_age_relax'] ?>" />
							<td style="width:15% !important"> <input type="radio" required name="two_mimacth"  id="two_mimacth"  value="Yes"><label for="two_mimacth"><b>Yes</b></label><span style="font-size:16px">|</span>
							<input type="radio" name="two_mimacth"  id="two_mimacth1"  value="No"><label for="two_mimacth1"><b>No</b></label>

							</td>
						</tr>
						
						<tr>
						<td colspan='4' style='text-align:center'>
						<h1>UP Domicile</h1>
						</td>
						</tr>
						<tr>
							<td style="width:5%">1.</td>
						<td>
						UP Domicile 
						</td>	
						<td><?php echo $emp3= ($row['domicial'] == 1) ? "YES" : "NO"; ?> </td>						
						<td style="width:15% !important"> <input type="radio" required name="dom_mimacth"  id="dom_mimacth"  value="Yes"><label for="dom_mimacth"><b>Yes</b></label> <span style="font-size:16px">|</span>
						<input type="radio" name="dom_mimacth"  id="10dob_mimacth1"  value="No"><label for="10dob_mimacth1"><b>No</b></label>	</td>
						
						</tr>
						
						<tr>
						<td style="width:5%">2.</td>
						<td colspan='2'>
						Is Certificate Produced  ?
						</td>						
						<td style="width:15% !important"> <input type="radio" required name="domcert_mimacth"  id="domcert_mimacth"  value="Yes"><label for="domcert_mimacth"><b>Yes</b></label> <span style="font-size:16px">|</span>
						<input type="radio" name="domcert_mimacth"  id="domcert_mimacth1"  value="No"><label for="domcert_mimacth1"><b>No</b></label>	</td>
						</tr>
						<tr>
						<td style="width:5%">3.</td>
						<td colspan='2'>
						 Is certificate valid ?
						</td>						
						<td style="width:15% !important"> <input type="radio" required name="domcertv_mimacth"  id="domcertv_mimacth"  value="Yes"><label for="domcertv_mimacth"><b>Yes</b></label> <span style="font-size:16px">|</span>
						<input type="radio" name="domcertv_mimacth"  id="domcertv_mimacth1"  value="No"><label for="domcertv_mimacth1"><b>No</b></label>	</td>
						</tr>
						<tr>
						<td colspan='4' style='text-align:center'>
						<h1>Category</h1>
						</td>
						</tr>
						<tr>
							<td style="width:5%">1.</td>
							<td>Any Mismatch in Category  </td> 
							<td> <?php echo $row['community']; ?></td>
							<td style="width:15% !important"> <input type="radio" required name="cat_mismatch"  id="cat_mismatch"  value="Yes"><label for="cat_mismatch"><b>Yes</b></label><span style="font-size:16px">|</span>
							<input type="radio" name="cat_mismatch"  id="cat_mismatch1"  value="No"><label for="cat_mismatch1"><b>No</b></label>
								<div class='casteclass' style='display:none' >
								<label for="Accepted"><b>Enter Category </b></label>
								<!--input type='text' step=".01" id='fname_enter' name='fname_enter' autocomplete='off' placeholder='Enter Gender'   / -->
								<select  step=".01" id="caste_enter" name="caste_enter" class="large form-control" autocomplete="off"  >
                                      <option value="">Select category</option>
                                      <option value="GENERAL">GEN</option>
                                      <option value="SC">SC</option>                                   
                                      <option value="OBC">OBC</option>                                   
                                      <option value="EWS">EWS</option>                                   
                                      <option value="ST">ST</option>                                   
                                   </select>
								
								</div>

							</td>
						</tr>
						
						<tr>
							<td style="width:5%">2.</td>
						<td colspan='2'>
						Is Certificate Produced ?
						</td>	
												
						<td style="width:15% !important"> <input type="radio" required name="catcert_mimacth"  id="catcert_mimacth"  value="Yes"><label for="catcert_mimacth"><b>Yes</b></label> <span style="font-size:16px">|</span>
						<input type="radio" name="catcert_mimacth"  id="catcert_mimacth1"  value="No"><label for="catcert_mimacth1"><b>No</b></label>	</td>
						
						</tr>
						
							<tr>
							<td style="width:5%">3.</td>
						<td colspan='2'>
						Is Certificate Valid ?
						</td>	
												
						<td style="width:15% !important"> <input type="radio" required name="catcertv_mimacth"  id="catcertv_mimacth"  value="Yes"><label for="catcertv_mimacth"><b>Yes</b></label> <span style="font-size:16px">|</span>
						<input type="radio" name="catcertv_mimacth"  id="catcertv_mimacth1"  value="No"><label for="catcertv_mimacth1"><b>No</b></label>	</td>
						
						</tr>
						
						
						
						<tr>
						<td colspan='4' style='text-align:center'>
						<h1>Sports</h1>
						</td>
						</tr>
						
						<tr>
						<td style="width:5%">1.</td>
						<td colspan='2'>
						National games Certificate Produced ?
						</td>		
						<td> <input type="radio" required name="nan_mimacth"  id="nan_mimacth"  value="Yes"><label for="nan_mimacth"><b>Yes</b></label> <span style="font-size:16px">|</span>
						<input type="radio" name="nan_mimacth"  id="nan_mimacth1"  value="No"><label for="nan_mimacth1"><b>No</b></label>	</td>												
						</tr>
						
						<tr>
						<td style="width:5%">2.</td>
						<td colspan='2'>
						National games Certificate Valid ?
						</td>		
						<td> <input type="radio" required name="nanv_mimacth"  id="nanv_mimacth"  value="Yes"><label for="nanv_mimacth"><b>Yes</b></label> <span style="font-size:16px">|</span>
						<input type="radio" name="nanv_mimacth"  id="nanv_mimacth1"  value="No"><label for="nanv_mimacth1"><b>No</b></label>	</td>												
						</tr>
						
						
						<tr>
						<td style="width:5%">3.</td>
						<td colspan='2'>
						International Player Certificate Produced ?
						</td>		
						<td> <input type="radio" required name="innan_mimacth"  id="innan_mimacth"  value="Yes"><label for="innan_mimacth"><b>Yes</b></label> <span style="font-size:16px">|</span>
						<input type="radio" name="innan_mimacth"  id="innan_mimacth1"  value="No"><label for="innan_mimacth1"><b>No</b></label>	</td>												
						</tr>
						
						<tr>
						<td style="width:5%">4.</td>
						<td colspan='2'>
						International Player Certificate Valid ?
						</td>		
						<td> <input type="radio" required name="innanv_mimacth"  id="innanv_mimacth"  value="Yes"><label for="innanv_mimacth"><b>Yes</b></label> <span style="font-size:16px">|</span>
						<input type="radio" name="innanv_mimacth"  id="innanv_mimacth1"  value="No"><label for="innanv_mimacth1"><b>No</b></label>	</td>												
						</tr>
						
							<tr>
						<td style="width:5%">5.</td>
						<td colspan='2'>
						National championship (junior/Senior) Certificate Produced ?
						</td>		
						<td> <input type="radio" required name="nanc_mimacth"  id="nanc_mimacth"  value="Yes"><label for="nanc_mimacth"><b>Yes</b></label> <span style="font-size:16px">|</span>
						<input type="radio" name="nanc_mimacth"  id="nanc_mimacth1"  value="No"><label for="nanc_mimacth1"><b>No</b></label>	</td>												
						</tr>
						
						<tr>
						<td style="width:5%">6.</td>
						<td colspan='2'>
						National championship (junior/Senior) Certificate Valid ?
						</td>		
						<td> <input type="radio" required name="nancv_mimacth"  id="nancv_mimacth"  value="Yes"><label for="nancv_mimacth"><b>Yes</b></label> <span style="font-size:16px">|</span>
						<input type="radio" name="nancv_mimacth"  id="nancv_mimacth1"  value="No"><label for="nancv_mimacth1"><b>No</b></label>	</td>												
						</tr>
						
						
						
								<tr>
						<td style="width:5%">7.</td>
						<td colspan='2'>
						Federation Cup National (Junior/Senior) Certificate Produced ?
						</td>		
						<td> <input type="radio" required name="fed_mimacth"  id="fed_mimacth"  value="Yes"><label for="fed_mimacth"><b>Yes</b></label> <span style="font-size:16px">|</span>
						<input type="radio" name="fed_mimacth"  id="fed_mimacth1"  value="No"><label for="fed_mimacth1"><b>No</b></label>	</td>												
						</tr>
						
						<tr>
						<td style="width:5%">8.</td>
						<td colspan='2'>
						Federation Cup National (Junior/Senior) Certificate Valid ?
						</td>		
						<td> <input type="radio" required name="fedv_mimacth"  id="fedv_mimacth"  value="Yes"><label for="fedv_mimacth"><b>Yes</b></label> <span style="font-size:16px">|</span>
						<input type="radio" name="fedv_mimacth"  id="fedv_mimacth1"  value="No"><label for="fedv_mimacth1"><b>No</b></label>	</td>												
						</tr>
						
								<tr>
						<td style="width:5%">9.</td>
						<td colspan='2'>
						All India Inter State Championship(Senior) Certificate Produced ?
						</td>		
						<td> <input type="radio" required name="allin_mimacth"  id="allin_mimacth"  value="Yes"><label for="allin_mimacth"><b>Yes</b></label> <span style="font-size:16px">|</span>
						<input type="radio" name="allin_mimacth"  id="allin_mimacth1"  value="No"><label for="allin_mimacth1"><b>No</b></label>	</td>												
						</tr>
						
						<tr>
						<td style="width:5%">10.</td>
						<td colspan='2'>
						All India Inter State Championship(Senior) Certificate Valid ?
						</td>		
						<td> <input type="radio" required name="allinv_mimacth"  id="allinv_mimacth"  value="Yes"><label for="allinv_mimacth"><b>Yes</b></label> <span style="font-size:16px">|</span>
						<input type="radio" name="allinv_mimacth"  id="allinv_mimacth1"  value="No"><label for="allinv_mimacth1"><b>No</b></label>	</td>												
						</tr>
						
						
						
								<tr>
						<td style="width:5%">11.</td>
						<td colspan='2'>
						All India Inter University tournament Certificate Produced ?
						</td>		
						<td> <input type="radio" required name="allint_mimacth"  id="allint_mimacth"  value="Yes"><label for="allint_mimacth"><b>Yes</b></label> <span style="font-size:16px">|</span>
						<input type="radio" name="allint_mimacth"  id="allint_mimacth1"  value="No"><label for="allint_mimacth1"><b>No</b></label>	</td>												
						</tr>
						
						<tr>
						<td style="width:5%">12.</td>
						<td colspan='2'>
						All India Inter University tournament Certificate Valid ?
						</td>		
						<td> <input type="radio" required name="allintv_mimacth"  id="allintv_mimacth"  value="Yes"><label for="allintv_mimacth"><b>Yes</b></label> <span style="font-size:16px">|</span>
						<input type="radio" name="allintv_mimacth"  id="allintv_mimacth1"  value="No"><label for="allintv_mimacth1"><b>No</b></label>	</td>												
						</tr>
						
						
							<tr>
						<td style="width:5%">13.</td>
						<td colspan='2'>
						World School Games (Under 19) Certificate Produced ?
						</td>		
						<td> <input type="radio" required name="world_mimacth"  id="world_mimacth"  value="Yes"><label for="world_mimacth"><b>Yes</b></label> <span style="font-size:16px">|</span>
						<input type="radio" name="world_mimacth"  id="world_mimacth1"  value="No"><label for="world_mimacth1"><b>No</b></label>	</td>												
						</tr>
						
						<tr>
						<td style="width:5%">14.</td>
						<td colspan='2'>
						World School Games (Under 19) Certificate Valid ?
						</td>		
						<td> <input type="radio" required name="worldv_mimacth"  id="worldv_mimacth"  value="Yes"><label for="worldv_mimacth"><b>Yes</b></label> <span style="font-size:16px">|</span>
						<input type="radio" name="worldv_mimacth"  id="worldv_mimacth1"  value="No"><label for="worldv_mimacth1"><b>No</b></label>	</td>												
						</tr>
						
						
						<tr>
						<td style="width:5%">15.</td>
						<td colspan='2'>
						 National School Games (Under 19) Certificate Produced ?
						</td>		
						<td> <input type="radio" required name="nworld_mimacth"  id="nworld_mimacth"  value="Yes"><label for="nworld_mimacth"><b>Yes</b></label> <span style="font-size:16px">|</span>
						<input type="radio" name="nworld_mimacth"  id="nworld_mimacth1"  value="No"><label for="nworld_mimacth1"><b>No</b></label>	</td>												
						</tr>
						
						<tr>
						<td style="width:5%">16.</td>
						<td colspan='2'>
						 National School Games (Under 19) Certificate Valid ?
						</td>		
						<td> <input type="radio" required name="nworldv_mimacth"  id="nworldv_mimacth"  value="Yes"><label for="nworldv_mimacth"><b>Yes</b></label> <span style="font-size:16px">|</span>
						<input type="radio" name="nworldv_mimacth"  id="nworldv_mimacth1"  value="No"><label for="nworldv_mimacth1"><b>No</b></label>	</td>												
						</tr>
						
						
							<tr>
						<td style="width:5%">17.</td>
						<td colspan='2'>
						All India Police Sports Competition Certificate Produced ?
						</td>		
						<td> <input type="radio" required name="allworld_mimacth"  id="allworld_mimacth"  value="Yes"><label for="allworld_mimacth"><b>Yes</b></label> <span style="font-size:16px">|</span>
						<input type="radio" name="allworld_mimacth"  id="allworld_mimacth1"  value="No"><label for="allworld_mimacth1"><b>No</b></label>	</td>												
						</tr>
						
						<tr>
						<td style="width:5%">18.</td>
						<td colspan='2'>
						All India Police Sports Competition Certificate Valid ?
						</td>		
						<td> <input type="radio" required name="allworldv_mimacth"  id="allworldv_mimacth"  value="Yes"><label for="allworldv_mimacth"><b>Yes</b></label> <span style="font-size:16px">|</span>
						<input type="radio" name="allworldv_mimacth"  id="allworldv_mimacth1"  value="No"><label for="allworldv_mimacth1"><b>No</b></label>	</td>												
						</tr>
						
						
						<!--tr>
							<td style="width:5%">1.</td>
						<td colspan='2'>
						Sports eligibility certificate (National games, national championship (junior/Senior),Federation Cup National (Junior/Senior),All India Inter State Championship(Senior),All India Inter University tournament,World School Games (Under 19), National School Games (Under 19), All India Police Sports Competition)
						</td>		
						<td> <input type="radio" required name="sports_mimacth"  id="sports_mimacth"  value="Yes"><label for="sports_mimacth"><b>Yes</b></label> <span style="font-size:16px">|</span>
						<input type="radio" name="sports_mimacth"  id="online_mimacth1"  value="No"><label for="online_mimacth1"><b>No</b></label>	</td>						
												
						</tr-->
						
					
						<tr>
						<td colspan='4' style='text-align:center'>
						<h1>  'O' level certificate</h1>
						</td>
						</tr>
						<tr>
						<td style="width:5%">1.</td>
						<td >
						DOEACC /NIELIT  'O' level certificate 
						</td>	
						<td> <?php echo $emp3= ($row['olevel'] == 1) ? "Yes" : "No"; ?></td>					
						<td style="width:15% !important"> <input type="radio" required name="nielit_mimacth"  id="nielit_mimacth"  value="Yes"><label for="nielit_mimacth"><b>Yes</b></label> <span style="font-size:16px">|</span>
						<input type="radio" name="nielit_mimacth"  id="scvt_ncvt_mimacth1"  value="No"><label for="scvt_ncvt_mimacth1"><b>No</b></label>	</td>						
						</tr>
						
						<tr>
						<td style="width:5%">2.</td>
						<td colspan='2'>
						'O' level certificate valid ?
						</td>					
						<td style="width:15% !important"> <input type="radio" required name="nielitv_mimacth"  id="nielitv_mimacth"  value="Yes"><label for="nielitv_mimacth"><b>Yes</b></label> <span style="font-size:16px">|</span>
						<input type="radio" name="nielitv_mimacth"  id="scvt_ncvtv_mimacth1"  value="No"><label for="scvt_ncvtv_mimacth1"><b>No</b></label>	</td>						
						</tr>
						
							<!--tr>
							<td style="width:5%">2.</td>
						<td colspan='2'>
						Is Certificate Produced ?
						</td>	
												
						<td style="width:15% !important"> <input type="radio" required name="olevel_mimacth"  id="olevel_mimacth"  value="Yes"><label for="olevel_mimacth"><b>Yes</b></label> <span style="font-size:16px">|</span>
						<input type="radio" name="olevel_mimacth"  id="olvelcert_mimacth1"  value="No"><label for="olvelcert_mimacth1"><b>No</b></label>	</td>
						
						</tr-->
						
						<tr>
						<td colspan='4' style='text-align:center'>
						<h1>2 years in territorial army   </h1>
						</td>
						</tr>
						
						<tr>
						<td style="width:5%">1.</td>
						<td >
						Must have served minimum 2 years in territorial army certificate
						</td>	
						<td> <?php echo $emp2= ($row['twoyears_army'] == 1) ? "Yes" : "No";    ?></td>						
						<td style="width:15% !important"> <input type="radio" required name="army_mimacth"  id="army_mimacth"  value="Yes"><label for="army_mimacth"><b>Yes</b></label> <span style="font-size:16px">|</span>
						<input type="radio" name="army_mimacth"  id="iti_sem_mimacth1"  value="No"><label for="iti_sem_mimacth1"><b>No</b></label>	</td>						
						</tr>
						
							<tr>
							<td style="width:5%">2.</td>
						<td colspan='2'>
						Is Certificate valid ?
						</td>	
												
						<td style="width:15% !important"> <input type="radio" required name="armycert_mimacth"  id="armycert_mimacth"  value="Yes"><label for="armycert_mimacth"><b>Yes</b></label> <span style="font-size:16px">|</span>
						<input type="radio" name="armycert_mimacth"  id="armycert_mimacth1"  value="No"><label for="armycert_mimacth1"><b>No</b></label>	</td>
						
						</tr>
						
						
						<tr>
						<td colspan='4' style='text-align:center'>
						<h1>NCC  </h1>
						</td>
						</tr>
						<tr>
							<td style="width:5%">1.</td>
						<td>
							NCC 'B' certificate
						</td>			
						<td> <?php echo $emp= ($row['nccb_cer'] == 1) ? "Yes" : "No"; ?></td>							
						<td style="width:15% !important"> <input type="radio" required name="ncc_mimacth"  id="ncc_mimacth"  value="Yes"><label for="ncc_mimacth"><b>Yes</b></label> <span style="font-size:16px">|</span>
						<input type="radio" name="ncc_mimacth"  id="fee_mimacth1"  value="No"><label for="fee_mimacth1"><b>No</b></label>	</td>						
						</tr>
							<tr>
							<td style="width:5%">2.</td>
						<td colspan='2'>
						Is Certificate valid ?
						</td>	
												
						<td style="width:15% !important"> <input type="radio" required name="ncccert_mimacth"  id="ncccert_mimacth"  value="Yes"><label for="ncccert_mimacth"><b>Yes</b></label> <span style="font-size:16px">|</span>
						<input type="radio" name="ncccert_mimacth"  id="ncccert_mimacth1"  value="No"><label for="ncccert_mimacth1"><b>No</b></label>	</td>
						
						</tr>
						<tr>
						<td colspan='4' style='text-align:center'>
						<h1>Education</h1>
						</td>
						</tr>
						<?php  $sql_edu = "select * from education_details where    registrationid='".$row['registraionid']."' order by id desc limit 1"; 
                          $rsql=mysqli_query($con,$sql_edu);
						  
						  $row_edu=mysqli_fetch_assoc($rsql);
						
						?>
							
						<tr>
							<td style="width:5%">1.</td>
							<td> High School Marksheet and Certificate produced ? </td>
							<td>Rollno : <?php echo $row_edu['tenth_rollno'] ?> </br> Board name :  <?php echo $row_edu['tenth_university'] ?> </td>
							<td style="width:15% !important">
								<input type="radio" required name="matric_marks"  id="matric_marks"  value="Yes"><label for="matric_marks"><b>Yes</b></label> <span style="font-size:16px">|</span>
								<input type="radio" name="matric_marks"  id="matric_marks1"  value="No"><label for="matric_marks1"><b>No</b></label>
								<!--div class='perr' style='display:none' >
								<label for="Accepted"><b>Enter Matric Percentage </b></label><input type='number' step=".01" id='dd_marks' name='dd_marks' autocomplete='off' placeholder='Enter Matric Percentage' pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==5) return false;" />
								</div-->
							</td>
						</tr>
						
							
						<tr>
							<td style="width:5%">2.</td>
							<td colspan='2'>High School Marksheet and Certificate Valid ?</td>
							
							<td style="width:15% !important">
								<input type="radio" required name="matricv_marks"  id="matricv_marks"  value="Yes"><label for="matricv_marks"><b>Yes</b></label> <span style="font-size:16px">|</span>
								<input type="radio" name="matricv_marks"  id="matricv_marks1"  value="No"><label for="matricv_marks1"><b>No</b></label>
							</td>
						</tr>
						
						<tr>
							<td style="width:5%">3.</td>
							<td>Intermediate Marksheet and certificate produced ? </td>
							<td>Rollno : <?php echo $row_edu['inter_rollno'] ?> </br> Board name :  <?php echo $row_edu['inter_university'] ?> </td>
							<td style="width:15% !important">
								<input type="radio" required name="inter_marks"  id="inter_marks"  value="Yes"><label for="inter_marks"><b>Yes</b></label> <span style="font-size:16px">|</span>
								<input type="radio" name="inter_marks"  id="inter_marks1"  value="No"><label for="inter_marks1"><b>No</b></label>
								<!--div class='interperr' style='display:none' >
								<label for="Accepted"><b>Enter Intermediate Percentage </b></label><input type='number' step=".01" id='interdd_marks' name='interdd_marks' autocomplete='off' placeholder='Enter Matric Percentage' pattern="/^-?\d+\.?\d*$/" onKeyPress="if(this.value.length==5) return false;" />
								</div-->
							</td>
						</tr>
						
						<tr>
							<td style="width:5%">4.</td>
							<td colspan='2'>Intermediate Marksheet and Certificate Valid ?</td>
							
							<td style="width:15% !important">
								<input type="radio" required name="interv_marks"  id="interv_marks"  value="Yes"><label for="interv_marks"><b>Yes</b></label> <span style="font-size:16px">|</span>
								<input type="radio" name="interv_marks"  id="interv_marks1"  value="No"><label for="interv_marks1"><b>No</b></label>
							</td>
						</tr>
						
						</table>
						</div>
						
						<!--br /><br /><br />
						Remarks of concerned officer: <textarea required name="remarks_supervisor" id='remarks_supervisor' rows="4" cols="50" placeholder="Enter concerned officer remark "></textarea></br><br>
						<input type="radio" name="Accepted" id="Accepted" required value="Suitble" ><label for="Accepted"><b>Suitable</b></label> <span style="font-size:16px">|</span>
						<!--input type="radio" name="Accepted" id="Conditional_Accepted"  value="Conditional Accepted"><label for="Conditional_Accepted"><b>Conditional Accepted</b></label> <span style="font-size:16px">|</span>
						<input type="radio" required name="Accepted" id="Rejected" required value="Unsuitble"><label for="Rejected"><b>Unsuitable</b></label></br></br-->
						Remarks of Committe Member: <textarea name="o_remarks" id='o_remarks' rows="4" cols="50" placeholder="Enter Remarks" required ></textarea></br>
	                   <button type="submit" name="submit" id="submit" value="Submit">Submit</button></br></br>
						</div>
				</div>
			<input type="hidden" name="reg_id" value="<?php echo $row['dv_rollno']; ?>">
			<input type="hidden" name="SportsName" value="<?php echo $row['post_applied']; ?>">
			<input type="hidden" name="regiidn" value="<?php echo $row['registraionid']; ?>">
			<input type="hidden" name="codepost" value="<?php echo $row['code_subpost']; ?>">
			<input type="hidden" name="subpost" value="<?php echo $row['sub_sports_post']; ?>">
		
		 <div class='row col-md-12'>
		
		</div>
		 
		</form>
<?php
} else {
	echo "<script>window.location.replace('verification_result.php?transactionid=".$row['AADHAARNUMBER']."');</script>";
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