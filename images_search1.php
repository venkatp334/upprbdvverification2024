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
 $sql = "select RD.registration_id,RD.pf_nps_no,RD.gender,A.employee_name,RD.full_name,RD.father_name as newfathername,RD.community,is_cerificate_verified,is_certificate_status,A.father_name,RD.pwd,RD.disability_categeory,RD.photo_path,RD.sign_path,RD.disability_type,A.dob,RD.mother_name
from personal_details RD, emp_details A
Where RD.pf_nps_no=A.pf_nps_no and application_status='completed'  and RD.registration_id='".$_POST['regid']."' and A.division='".$_SESSION['username']."' limit 1";
	 }
$result = mysqli_query($con,$sql);
$row = mysqli_fetch_assoc($result);

//echo $ipaddress = $_SERVER['REMOTE_ADDR'];
if(isset($_POST['submit'])) {
	
	  $timezone = "Asia/Calcutta";
		if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
		$t=time();
		$d= date("Y-m-d H:i:s",$t);	
	 foreach($_POST as $key => $value){
		 //echo $key;
		 if(strpos($key,'_Verified1')){
			 $id=substr($key,0,strpos($key,'_'));
			 $ver=$id.'_Verified1';
			 $remark=$id.'_remark';
		 $update=mysqli_query($con,"insert certification_verification (id,regid,verfied_status,remark) values ('".$id."','".$_POST['reg_id']."','".$_POST[$ver]."','".$_POST[$remark]."')");
		 }
		 
		  if(strpos($key,'_cerVerified1')){
			 $id=substr($key,0,strpos($key,'_'));
			 $ver=$id.'_cerVerified1';
			 $remark=$id.'_cerremark';
		 $update1=mysqli_query($con,"insert category_verification (id,regid,verfied_status,remark) values ('".$id."','".$_POST['reg_id']."','".$_POST[$ver]."','".$_POST[$remark]."')");
		 }
	 }
	 if($update){
	 $update2=mysqli_query($con,"update personal_details  set is_cerificate_verified=1,is_certificate_status='".$_POST['Accepted']."',is_certificate_remark='".$_POST['o_remarks']."' ,photo_status='".$_POST['photo_pVerified1']."',photo_remark='".$_POST['photo_remark']."' ,sign_status='".$_POST['sign_sVerified1']."',sign_remark='".$_POST['sign_remark']."',verified_user='".$_SESSION['username']."',verified_time='".$d."' where registration_id='".$_POST['reg_id']."' ");
	 }

	if($update2) {
		
		echo "<script>window.location.replace('images.php');</script>";
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
  padding:10px;
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
			<input type="submit" name="submit">
		</form>
<?php 
if(!empty($row)) {
?>
		<form method="post" id="form">
				<div class="details">
				<?php
				$sql = mysqli_query($con,"select sum(case when is_certificate_status='Accepted' then 1 else 0 end) as verified, sum(case when is_certificate_status is not null then 1 else 0 end) as complete, sum(case when application_status='completed' and is_certificate_status is null  then 1 else 0 end) as reamaing,sum(case when application_status='completed'  then 1 else 0 end) as total  from personal_details RD, emp_details A  Where RD.pf_nps_no=A.pf_nps_no  and A.division='".$_SESSION['username']."' ");
				$count = mysqli_fetch_assoc($sql);
				
				
				if($row['full_name'] == '' ) {
							$name=$row['employee_name'];
						}else {
							$name=$row['full_name'];
						}
						if($row['newfathername'] == ''){
							$fname=$row['father_name'];
						}else {
							$fname=$row['newfathername'];
						}
				?>
						<h3>Total  : <?php echo $count['total']; ?>     Verified  : <?php echo $count['verified']; ?>   Completed  : <?php echo $count['complete']; ?>     Remaining   : <?php echo $count['reamaing']; ?></h3>
						<div class='details'>
						<table style='margin: 10px 295px;  border: 1px solid black;  padding:10px;' >
						<tr>
						<td>
						PF  No  </td> <td><?php echo $row['pf_nps_no']; ?>
						</td>
						<td>
						Registration No </td> <td> <?php echo $row['registration_id']; ?>
						</td>
						</tr>
						<tr>
						<td>
						Name </td> <td> <?php echo $name ?> 
						</td>
						<td>
						Gender </td> <td> <?php echo $row['gender']; ?>
						</td>
						</tr>
						<tr>
						<td>
						Father Name </td> <td> <?php echo $fname ?>
						</td>
						<td>
						<?php 
						$dob = explode("-",$row['dob']);
						$dob1 = $dob[2]."-".$dob[1]."-".$dob[0];
		
						$interval = date_diff(date_create('2015-12-31'), date_create($row['dob']));
						$age =  $interval->format("%Y Y, - %M M, %d Days");
						?>
						Date Of Birth </td> <td> <?php echo $dob1; ?><br />
						</td>
						</tr>
						<tr>
						<td>
						Age </td> <td> <?php echo $age; ?>
						</td>
						<td>
						Category </td> <td> <?php echo $row['community']; ?>
						</td>
						</tr>
						<tr>
						<td>
						<?php
						if($row['pwd'] == 1 ){
							
							
						?>
						PWD Categeory </td> <td> <?php echo $row['disability_categeory']; ?></td><td>
						
						PWD Type </td> <td><?php echo $row['disability_type']; ?></td>
						
						<?php }else {
						?>
						PWD:</td> <td> No
						<?php 
							}?>
						</td>
						
						<td>
						<?php  
						$podtb=mysqli_query($con,'select * from post where registration_id="'.$row['registration_id'].'"');
						while($podtb = mysqli_fetch_assoc($podtb)){
							$postname.= $podtb['post_name'].',' ;
						}
						?>
						Post Applied </td> <td> <?php echo $postname ?>
						</td>
						</tr>
						</table>
						</div>
						<br /><br /><br />
                      <?php 
					  if($row['is_cerificate_verified'] == 1){
						  ?>
						<h2 style='color:green;font-size:45px'>  Status : <?php echo $row['is_certificate_status']  ?></h2><br /><br />
						  <?php
					  }
					  ?>
						<input type="radio" name="Accepted" id="Accepted" required value="Accepted" ><label for="Accepted"><b>Accepted</b></label> <span style="font-size:16px">|</span>
						<input type="radio" name="Accepted" id="Conditional_Accepted"  value="Conditional Accepted"><label for="Conditional_Accepted"><b>Conditional Accepted</b></label> <span style="font-size:16px">|</span>
						<input type="radio" name="Accepted" id="Rejected" required value="Rejected"><label for="Rejected"><b>Rejected</b></label></br></br>
						Remarks : <textarea name="o_remarks" rows="4" cols="50" placeholder="Enter Remarks"></textarea></br>
	                   <button type="submit" name="submit" id="submit" value="Submit">Submit</button></br></br>
						
				</div>

		<input type="hidden" name="reg_id" value="<?php echo $row['registration_id']; ?>">
		
		<div class="clientele" style="color: #419c40;">
			
			<B>Photo</B>
				<img class="popup" src="http://rrcsec2021.s3.amazonaws.com/photos/<?php echo $row['photo_path']; ?>" name="http://rrcsec2021.s3.amazonaws.com/photos/<?php echo $row['photo_path']; ?>" alt="<?php echo $row['photo_path']; ?>" width="100%" style="border-radius:20px;" title="Photo">
				<br>
				<input type="radio" name="photo_pVerified1"  id="photo_pVerified1"  value="OK"><label for="photo_pVerified1"><b>OK</b></label> <span style="font-size:16px">|</span>
				<input type="radio" name="photo_pVerified1"  id="photo_pRejected1"  value="NOT OK"><label for="photo_pRejected1"><b>NOT OK</b></label></br>
				Remarks : <input type="text" name="photo_remark" class="textBox" value="">
				
			</div>
			
			<div class="clientele" style="color: #419c40;">
			
			<B>Signature</B>
				<img class="popup" src="http://rrcsec2021.s3.amazonaws.com/signatures/<?php echo $row['sign_path']; ?>" name="http://rrcsec2021.s3.amazonaws.com/signatures/<?php echo $row['sign_path']; ?>" alt="<?php echo $row['sign_path']; ?>" width="100%" style="border-radius:20px;" title="Photo">
				<br>
				<input type="radio" name="sign_sVerified1"  id="sign_sVerified1"  value="OK"><label for="sign_sVerified1"><b>OK</b></label> <span style="font-size:16px">|</span>
				<input type="radio" name="sign_sVerified1"  id="sign_sRejected1"  value="NOT OK"><label for="sign_sRejected1"><b>NOT OK</b></label></br>
				Remarks : <input type="text" name="sign_remark" class="textBox" value="">
				
			</div>
		
		<?php 
         // echo 'select * from education_details where registration_id='.$row['registration_id'];
		   $certificate=mysqli_query($con,'select * from education_details where registration_id="'.$row['registration_id'].'"');
		 // $rowscerti=mysqli_fetch_assoc($certificate);
		 
		  while($rowscerti=mysqli_fetch_assoc($certificate)){
          // print_r($rowscerti);
		  $ext = pathinfo($rowscerti['certificate_path'], PATHINFO_EXTENSION);
		 // echo $ext;
		?>
		   
		   	<div class="clientele" style="color: #419c40;">
			<input type="hidden" name="<?php echo $rowscerti['id'] ?>" class="textBox" value="">
			<B><?php echo $rowscerti['exam_passed'] ?></B>
				<?php if ($ext=='pdf'){ ?>
				<iframe type="application/pdf"  class="popup" src="http://rrcsec2021.s3.amazonaws.com/certificates/<?php echo $rowscerti['certificate_path']; ?>" name="http://rrcsec2021.s3.amazonaws.com/certificates/<?php echo $rowscerti['certificate_path']; ?>" alt="<?php echo $rowscerti['certificate_path']; ?>" width="100%" style="border-radius:20px;" height="350" title="<?php echo $rowscerti['exam_passed'] ?>"></iframe>
				<?php }
				else { ?>
				<img class="popup" src="http://rrcsec2021.s3.amazonaws.com/certificates/<?php echo $rowscerti['certificate_path']; ?>" name="http://rrcsec2021.s3.amazonaws.com/certificates/<?php echo $rowscerti['certificate_path']; ?>" alt="<?php echo $rowscerti['certificate_path']; ?>" width="100%" style="border-radius:20px;" title="<?php echo $rowscerti['exam_passed'] ?>">
				<?php } ?>
				<br>
				<input type="radio" name="<?php echo $rowscerti['id'] ?>_Verified1"  id="<?php echo $rowscerti['id'] ?>_Verified1"  value="OK"><label for="<?php echo $rowscerti['id'] ?>_Verified1"><b>OK</b></label> <span style="font-size:16px">|</span>
				<input type="radio" name="<?php echo $rowscerti['id'] ?>_Verified1"  id="<?php echo $rowscerti['id'] ?>_Rejected1"  value="NOT OK"><label for="<?php echo $rowscerti['id'] ?>_Rejected1"><b>NOT OK</b></label></br>
				Remarks : <input type="text" name="<?php echo $rowscerti['id'] ?>_remark" class="textBox" value="">
				
			</div>
		  <?php
		  
		  }
		  
		  ?>
		  
		  <?php 
         // echo 'select * from education_details where registration_id='.$row['registration_id'];
		  $certificate=mysqli_query($con,'select * from certificates where registration_id="'.$row['registration_id'].'"');
		 // $rowscerti=mysqli_fetch_assoc($certificate);
		 
		  while($rowscerti=mysqli_fetch_assoc($certificate)){
          // print_r($rowscerti);
		?>
		   
		   	<div class="clientele" style="color: #419c40;">
			<input type="hidden" name="<?php echo $rowscerti['id'] ?>" class="textBox" value="">
			<B><?php echo $rowscerti['filename'] ?></B>
				<img class="popup" src="http://rrcsec2021.s3.amazonaws.com/certificates/<?php echo $rowscerti['filepath']; ?>" name="http://rrcsec2021.s3.amazonaws.com/certificates/<?php echo $rowscerti['filepath']; ?>" alt="<?php echo $rowscerti['filepath']; ?>" width="100%" style="border-radius:20px;" title="Photo">
				<br>
				<input type="radio" name="<?php echo $rowscerti['id'] ?>_cerVerified1"  id="<?php echo $rowscerti['id'] ?>_cerVerified1"  value="OK"><label for="<?php echo $rowscerti['id'] ?>_cerVerified1"><b>OK</b></label> <span style="font-size:16px">|</span>
				<input type="radio" name="<?php echo $rowscerti['id'] ?>_cerVerified1"  id="<?php echo $rowscerti['id'] ?>_cerRejected1"  value="NOT OK"><label for="<?php echo $rowscerti['id'] ?>_cerRejected1"><b>NOT OK</b></label></br>
				Remarks : <input type="text" name="<?php echo $rowscerti['id'] ?>_cerremark" class="textBox" value="">
				
			</div>
		  <?php
		  
		  }
		  
		  ?>
			
			<div class="details">
						
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
<?php
include_once "footer.php";
?>