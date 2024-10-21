
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
		
		
	// $insert_q="update members_sign	 set sports_name='".$_POST['sportsname']."',member1='".$_POST['MEMBER1']."',member2='".$_POST['MEMBER2']."',member3='".$_POST['MEMBER3']."',member4='".$_POST['MEMBER4']."',member5='".$_POST['MEMBER5']."' where id='1'";
	
		echo $insert_q="insert into members_sign (sports_name,member1,member2,member3,member4,member5) values ('".$_POST['sportsname']."','".$_POST['MEMBER1']."','".$_POST['MEMBER2']."','".$_POST['MEMBER3']."','".$_POST['MEMBER4']."','".$_POST['MEMBER5']."')";
	
	$submitform=mysqli_query($con,$insert_q);
	
	
	// echo   $update2=mysqli_query($con,"update masterdata  set is_cerificate_verified=1,is_certificate_status='".$_POST['Accepted']."',is_certificate_remark='".$_POST['o_remarks']."' ,verified_user='".$_SESSION['username']."',verified_time='".$d."',m_marksupdated='".$_POST['dd_marks']."',inter_marksupdated='".$_POST['interdd_marks']."',remarks_supervisor='".$_POST['remarks_supervisor']."' ,name_mismatch='".$_POST['name_mimacth']."',father_mismatch='".$_POST['father_mimacth']."',dob_mismatch='".$_POST['dob_mimacth']."',cat_mismatch='".$_POST['cat_mismatch']."',gender_mismatch='".$_POST['gender_mimacth']."',sports_mismatch='".$_POST['sports_mimacth']."',matric_mismatch='".$_POST['matric_marks']."',inter_mismatch='".$_POST['inter_marks']."',dom_mismatch='".$_POST['dom_mimacth']."',nielit_mismatch='".$_POST['nielit_mimacth']."',army_mismatch='".$_POST['army_mimacth']."',ncc_mismatch='".$_POST['ncc_mimacth']."',c_name='".$_POST['name_enter']."',g_name='".$_POST['gender_enter']."',f_name='".$_POST['fname_enter']."'  where AADHAARNUMBER='".$_POST['reg_id']."' ");
        
		//echo $update2;die;
	if($submitform) {

		echo "<script>window.location.replace('members_entry.php');</script>";
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
		
		<div class="content">
		<form method="post" id="form">
				<div class="details">
						Select Sports Name
						<select id="state" name="sportsname" class="form-control" autocomplete="off" required="">
                                      <option value="">--Select Sports Name--</option>
                                      <?php $state_query=mysqli_query($con,"SELECT distinct post_applied FROM registration_details_sports where payment_success=1 order by post_applied;");
                                         while($dd=mysqli_fetch_assoc($state_query)){
                                             ?>
                                      <option   value="<?php echo $dd['post_applied'] ?>"><?php echo  $dd['post_applied'] ?></option>
                                      <?php } ?>                          
                                   </select> 
						<!--input type='text' name="sportsname" id='marks' class='form-control' style="text-transform:uppercase"  placeholder="Enter COMMITTE MEMBER-1 Name" required ></input-->
						
						</br></br>
						COMMITTE MEMBER-1<input autocomplete="off" type='text' name="MEMBER1" id='marks' class='form-control' style="text-transform:uppercase"  placeholder="Enter COMMITTE MEMBER-1 Name" required ></input></br></br>
						COMMITTE MEMBER-2 <input autocomplete="off" type='text' name="MEMBER2" class='form-control' id='remarks' style="text-transform:uppercase"  placeholder="Enter COMMITTE MEMBER-2 Name" required ></input></br></br></br>
						COMMITTE MEMBER-3 <input autocomplete="off" type='text' name="MEMBER3" class='form-control' id='remarks' style="text-transform:uppercase" placeholder="Enter COMMITTE MEMBER-3 Name" required ></input></br></br></br>
						COMMITTE MEMBER-4 <input autocomplete="off" type='text' name="MEMBER4" class='form-control' id='remarks' style="text-transform:uppercase"  placeholder="Enter COMMITTE MEMBER-4 Name" required ></input></br></br></br>
						COMMITTE MEMBER-5 <input autocomplete="off" type='text' name="MEMBER5" class='form-control' id='remarks' style="text-transform:uppercase"  placeholder="Enter COMMITTE MEMBER-5 Name" required ></input></br></br></br>
	                  
					   <input type="submit"  id="submit-btn" class="submit-btn" name="submitbtn" value="Submit"  />
						
				</div>
			
		
		 <div class='row col-md-12'>
		
		</div>
		 
		</form>
<?php
$sqldd = "select * from members_sign"; 
	$resultdd = mysqli_query($con,$sqldd);
	

?>

				<div  class='details'>
						
						<table style='margin: 10px 250px;' align='center' class="table table-bordered">
							<tr>
							
								<td>S.NO </td> 
								<td>Sports Name </td> 
								<td>MEMBER-1 Name </td> 
								<td>MEMBER-2 Name </td> 
								<td>MEMBER-3 Name </td> 
								<td>MEMBER-4 Name </td> 
								<td>MEMBER-5 Name </td> 
								<td> Action </td>
							
							</tr>
							<?php 
							$i=0;
							while($row2 = mysqli_fetch_assoc($resultdd)){ 
							$i++;
							?> 
							<tr>
							
								
								<td> <?php echo $i; ?></td>
								<td> <?php echo $row2['sports_name']; ?></td>
								<td> <?php echo $row2['member1']; ?></td>
								<td> <?php echo $row2['member2']; ?></td>
								<td> <?php echo $row2['member3']; ?></td>
								<td> <?php echo $row2['member4']; ?></td>
								<td> <?php echo $row2['member5']; ?></td>
								<td><input data-id="<?php echo $row2['id']; ?>" type="button" id="delete<?php echo $i; ?>" value="Delete" onclick="deleteRecord(<?php echo $row2['id']; ?>)" /></td>

							
							</tr>
							<?php } ?>
							
					
					
					
						
						
						
						
						</table>
						</div>

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


function deleteRecord(id) {debugger
    if(confirm("Are you sure you want to delete this record?")) {
        $.ajax({
            url: 'delete_record.php', // PHP script to handle deletion
            type: 'POST',
            data: { id: id },
            success: function(response) {
                if(response == "success") {
                    alert("Record deleted successfully!");
                    location.reload(); // Refresh the page to reflect changes
                } else {
                    alert("Failed to delete the record.");
                }
            }
        });
    }
}

</script>
<?php
include_once "footer.php";
?>
