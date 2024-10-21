<?php
session_start();
error_reporting(0);
include('db.php');
	 
if(!isset($_SESSION['username']))
{
?>
<script>window.location.replace('index.php');</script>
<?php 
}	 
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>RRC</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src = "https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
<script type="text/javascript" src = "//cdn.datatables.net/buttons/1.1.2/js/buttons.flash.min.js"></script>
<script type="text/javascript" src = "//cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
<script type="text/javascript" src = "//cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
<script type="text/javascript" src = "//cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
<script type="text/javascript" src = "//cdn.datatables.net/buttons/1.1.2/js/buttons.html5.min.js"></script>
<script type="text/javascript" src = "//cdn.datatables.net/buttons/1.1.2/js/buttons.print.min.js"></script>
<script type="text/javascript" src = "https://cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>

 
<style>
.navbar {
    padding: .0rem 0rem !important;
}


</style>

  </head>
  <body>
  
      
	
	
<style>
        .showTop {
            display: table-row-group !important;
        }
		select{
		     width:100% !important;
		}
		.dataTables_length select{
		     width:unset !important;
		}
    </style>
	<div class="container-fluid container_margin_top"></br></br></br>
	<form action="<?php //echo $_SERVER['PHP_SELF'];?>" class="form-horizontal" enctype="multipart/form-data" method="post" name="reg" id="reg">
	<div class='container-fluid'>
		<div class="form-group">
		<label>Select your Trade<span class="imp">*</span></label>
		<select required id="trade" name="trade" class="large form-control addresschange" autocomplete="off">
             <option  value="" selected="selected">--Select Trade--</option>
              <?php $state_query=mysqli_query($con,"SELECT distinct trade_group FROM applicants where is_final=1 order by trade_group;");
                   while($dd=mysqli_fetch_assoc($state_query)){
                ?>
		<option  value="<?php echo $dd['trade_group'] ?>"><?php echo  $dd['trade_group'] ?></option>
		<?php } ?>    
		</select>
		</div>
			<div class="text-center otp">
		 <input type="submit"  id="submit-btn" class="btn btn-primary btnSubmit" name="submitbtn" value="Submit" />
			</div>
			</form>
	</div>
<?php 
if(isset($_POST['submitbtn']) == 'Submit') {
?>
		<div class="row">
			<div class="col-12 mx-auto">
				<table id="example" class="table table-striped table-bordered" style="width:100%">
				   <thead>
				      <tr>
						
						<th>	S.No	</th>
						<th>	dv date	</th>
<th>	Registration ID	</th>
<th>	Name	</th>
<th>	Father Name	</th>
<th>	Mother Name	</th>
<th>	Per. Address	</th>
<th>	Per. District 	</th>
<th>	Per. State	</th>
<th>	Per. Pincode	</th>
<th>	Corr. Address	</th>
<th>	Corr. District 	</th>
<th>	Corr. State	</th>
<th>	Corr. Pincode	</th>
<th>	Nationality	</th>
<th>	Religion	</th>
<th>	Gender	</th>
<th>	Marital Status	</th>
<th>	Community	</th>
<th>	Date of Birth	</th>
<th>	Identification Type	</th>
<th>	Identification Number	</th>
<th>	Person with Disabilities	</th>
<th>	Disabilities	</th>
<th>	Identification Mark-1	</th>
<th>	Identification Mark-2	</th>
<th>	Mobile number	</th>
<th>	Email address	</th>
<th>	Application Fee	</th>
<th>	Date Of Apllication Created	</th>
<th>	SSC- Rollno	</th>
<th>	SSC- Certificate Number	</th>
<th>	SSC Board/ University	</th>
<th>	SSC Year of Passing	</th>
<th>	SSC Obtained Marks  (without additional subject)	</th>
<th>	SSC Total Marks  (without additional subject)	</th>
<th>	SSC- Grade/Percentage	</th>
<th>	SSC - Final Percentage %	</th>
<th>	SSC - CGPA	</th>
<th>	ITI Roll Number	</th>
<th>	ITI Certificate Number	</th>
<th>	ITI Board/ University	</th>
<th>	ITI Year of Passing	</th>
<th>	ITI Result	</th>
<th>	Trade Passed	</th>
<th>	Division 1	</th>
<th>	Division 2	</th>
<th>	Division 3	</th>
<th>	Division 4	</th>
<th>	Division 5	</th>
<th>	Trade	</th>
<th>	Exserviceman	</th>
<th>	Enrollment Date	</th>
<th>	Retirement Date	</th>
<th>	Present or Not for DV	</th>
<th>	ANY MISMATCH IN NAME	</th>
<th>	ANY MISMATCH GENDER	</th>
<th>	ANY MISMATCH FATHER NAME	</th>
<th>	ANY MISMATCH IN CATEGORY/CASTE	</th>
<th>	ANY MISMATCH IN DATE OF BIRTH	</th>
<th>	ANY MISMATCH IN PWD (LD/VI/HI/MD) IF APPLICABLE:	</th>
<th>	ANY MISMATCH IN ExSM IF APPLICABLE:	</th>
<th>	ANY MISMATCH IN PERCENTAGE IN CLASS 10TH :	</th>
<th>	ANY MISMATCH IN TRADE :	</th>
<th>	PRODUCED COPY OF ONLINE APPLICATION/REGISTRATION FORM/ACKNOWLEGEMENT	</th>
<th>	WHETHER PRODUCED 10TH CLASS CERTIFICATE IN PROOF OF DATE OF BIRTH	</th>
<th>	WHETHER PRODUCED ITI (SCVT/NCVT) CERTIFICATE ISSUED BY COMPETENT AUTHORITY	</th>
<th>	WHETHER PRODUCED MARKSHEETS OF ALL SEMESTERS ITI RELATED TRADE	</th>
<th>	FEE RECEIPT PRODUCED BY THE APPLICANT	</th>
<th>	WHETHER PRODUCED CATEGORY/CASTE CERTIFICATE IN PRESCRIBED FORMAT ISSUED BY COMPETENT AUTHORITY IF APPLICABLE	</th>
<th>	WHETHER PRODUCED PWD CERTIFICATE ISSUED BY COMPETENT AUTHORITY IN CASE OF PWD	</th>
<th>	WHETHER PRODUCED DISCHARGE CERTIFICATE/SERVICE CERTIFICATE IN CASE OF ExSM	</th>
<th>	WHETHER CHILDREN OF ExSM IF YES WHETHER PRODUCED PROPER CERTIFICATE	</th>
<th>	WHETHER PRODUCED 12TH CLASS CERTIFICATE IF APPLICABLE	</th>
<th>	WHETHER OBTAINED TRAINING FROM ANY INSTITUTION/ORGANISATION UNDER APPRENTICE ACT 1961 EARLIER	</th>
<th>	WHETHER PRODUCED AADHAR CARD	</th>
<th>	WHETHER PRODUCED MEDICAL FITNESS CERTIFICATE ISSUED BY GOVERNMENT DOCTOR (GAZZETED) NOT BELOW THE RANK OF ASSTT. SURGEON OF CENTRAL/STATE GOVERNMENT HOSPITAL	</th>
<th>	Photo Remarks	</th>
<th>	Signature remarks	</th>
<th>	Matric certificate remark	</th>
<th>	Trade certificate remark	</th>
<th>	Categeory certificate remark	</th>
<th>	PWD certificate	</th>
<th>	Ex serviceman certificate remark	</th>
<th>	Remarks of Supervisor	</th>
<th>	Remarks of concerned officer	</th>
<th>	Suitable or not	</th>

					  </tr> 
					</thead>

					<tbody>
					<?php
					$timezone = "Asia/Calcutta";
					if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
			$date_now = date("Y-m-d"); // this format is string comparable

					 $sql = "select  dv_date,transactionid,fullname,father_name,mother_name,concat(village,',',tehsil,',',postoffice,',',policestation) as peraddress,
district,state,pincode,concat(village1,',',tehsil1,',',postoffice1,',',policestation1) as corraddress,
district1,state1,pincode1,nationality,religion,sex,marrital_status,community,dob,identity_type,aadhar_no,category_belongs as PWD,
category as Disabilities,identification_mark,identification_mark_2,mobileNumber,emailaddress,fee_amount,date_created ,
RegistrationID, SSCRollno, SSC_Certificate_Number, SSCBoard_University, SSC_Year_of_Passing, SSC_Obtained_Marks,
 SSC_Total_Marks, SSC_Grade, SSC_FinalPercentage, SSC_CGPA, ITI_RollNo, ITI_Certificate_Number, ITI_Board_University,
 ITI_Year_of_Passing, e.ITI_Result, Trade_Passed,
division_1,division_2,division_3,division_4,division_5,trade,Exserviceman, `EnrollmentDate`, `RetirementDate`,
case when is_cerificate_verified=1 then 'Present' else 'Absent' end as att  ,name_mismatch,gender_mismatch,father_mismatch,cat_mismatch,dob_mismatch,pwd_mismatch,exman_mismatch,
case when matric_mismatch='Yes' then concat('Yes(',m_marksupdated,')') else 'No' end as marksupdate,iti_mismatch,online_mimacth,10dob_mimacth,scvt_ncvt_mimacth,iti_sem_mimacth,fee_mimacth,cast_mimacth,pwdc_mimacth,
esmc_mimacth,exch_mimacth,twelth_mimacth,act_mimacth,aadhar_mismatch,medical_mimacth,photo_remark,sign_remark,matric_remark,
trade_remark,cat_remark,pwd_remark,exman_remark,remarks_supervisor,is_certificate_remark,is_certificate_status 
 from edudata e, applicants a left join certification_verification c  on 
c.regid=a.transactionid  where a.transactionid=e.RegistrationID and is_final=1 and trade_group='".$_POST['trade']."' order  by SNO asc,SSC_FinalPercentage desc ; ";
					$i=0;
					$query = mysqli_query($con,$sql);
					while($row = mysqli_fetch_assoc($query)) {
						$i++;
						$postname='';
                        // print_r($row);exit;
						if($row['PWD'] == 1 ){
							$pwd='Yes';
						}else{
							$pwd='No';
						}
						
						 
						
						echo "<tr>
						
							<td>".$i."</td>
							<td>".$row['dv_date']."</td>
							<td>".$row['transactionid']."</td>
							<td>".$row['fullname']."</td>
							<td>".$row['father_name']."</td>
							<td>".$row['mother_name']."</td>
							<td>".$row['peraddress']."</td>
							<td>".$row['district']."</td>
							<td>".$row['state']."</td>
							<td>".$row['pincode']."</td>
							<td>".$row['corraddress']."</td>
							<td>".$row['district1']."</td>
							<td>".$row['state1']."</td>
							<td>".$row['pincode1']."</td>
							<td>".$row['nationality']."</td>
							<td>".$row['religion']."</td>
							<td>".$row['sex']."</td>
							<td>".$row['marrital_status']."</td>
							<td>".$row['community']."</td>
							<td>".$row['dob']."</td>
							<td>".$row['identity_type']."</td>
							<td>".$row['aadhar_no']."</td>
							<td>".$pwd."</td>							
							<td>".$row['Disabilities']."</td>
							<td>".$row['identification_mark']."</td>
							<td>".$row['identification_mark_2']."</td>
							<td>".$row['mobileNumber']."</td>
							<td>".$row['emailaddress']."</td>
							<td>".$row['fee_amount']."</td>
							<td>".$row['date_created']."</td>
							<td>".$row['SSCRollno']."</td>
							<td>".$row['SSC_Certificate_Number']."</td>
							<td>".$row['SSCBoard_University']."</td>
							<td>".$row['SSC_Year_of_Passing']."</td>
							<td>".$row['SSC_Obtained_Marks']."</td>
							<td>".$row['SSC_Total_Marks']."</td>
							<td>".$row['SSC_Grade']."</td>
							<td>".$row['SSC_FinalPercentage']."</td>
							<td>".$row['SSC_CGPA']."</td>
							<td>".$row['ITI_RollNo']."</td>
							<td>".$row['ITI_Certificate_Number']."</td>
							<td>".$row['ITI_Board_University']."</td>
							<td>".$row['ITI_Year_of_Passing']."</td>
							<td>".$row['ITI_Result']."</td>
							<td>".$row['Trade_Passed']."</td>
							<td>".$row['division_1']."</td>
							<td>".$row['division_2']."</td>
							<td>".$row['division_3']."</td>
							<td>".$row['division_4']."</td>
							<td>".$row['division_5']."</td>
							<td>".$row['trade']."</td>
							<td>".$row['Exserviceman']."</td>
							<td>".$row['EnrollmentDate']."</td>
							<td>".$row['RetirementDate']."</td>
							<td>".$row['att']."</td>
							<td>".$row['name_mismatch']."</td>
							<td>".$row['gender_mismatch']."</td>
							<td>".$row['father_mismatch']."</td>
							<td>".$row['cat_mismatch']."</td>
							<td>".$row['dob_mismatch']."</td>
							<td>".$row['pwd_mismatch']."</td>
							<td>".$row['exman_mismatch']."</td>
							<td>".$row['marksupdate']."</td>
							<td>".$row['iti_mismatch']."</td>
							<td>".$row['online_mimacth']."</td>
							<td>".$row['10dob_mimacth']."</td>
							<td>".$row['scvt_ncvt_mimacth']."</td>
							<td>".$row['iti_sem_mimacth']."</td>
							<td>".$row['fee_mimacth']."</td>
							<td>".$row['cast_mimacth']."</td>
							<td>".$row['pwdc_mimacth']."</td>
							<td>".$row['esmc_mimacth']."</td>
							<td>".$row['exch_mimacth']."</td>
							<td>".$row['twelth_mimacth']."</td>
							<td>".$row['act_mimacth']."</td>
							<td>".$row['aadhar_mismatch']."</td>
							<td>".$row['medical_mimacth']."</td>
							<td>".$row['photo_remark']."</td>
							<td>".$row['sign_remark']."</td>
							<td>".$row['matric_remark']."</td>
							<td>".$row['trade_remark']."</td>
							<td>".$row['cat_remark']."</td>
							<td>".$row['pwd_remark']."</td>
							<td>".$row['exman_remark']."</td>
							<td>".$row['remarks_supervisor']."</td>
							<td>".$row['is_certificate_remark']."</td>
							<td>".$row['is_certificate_status']."</td>
							
							
							
						</tr>";
					}
					?>	
					
					</tbody>
				</table> 
				
	</div>
		</div>
<?php } ?>	
		

</body>

        <script type="text/javascript">
        $(document).ready(function() {
             $('#example').dataTable({
				 /*initComplete: function () {
					this.api().columns().every( function () {
						var column = this;
						var select = $('<select><option value="">All</option></select>')
							.appendTo( $(column.header()))
							.on( 'change', function () {
								var val = $.fn.dataTable.util.escapeRegex(
									$(this).val()
								);
		 
								column
									.search( val ? '^'+val+'$' : '', true, false )
									.draw();
							} );
		 
						column.data().unique().sort().each( function ( d, j ) {
							select.append( '<option value="'+d+'">'+d+'</option>' )
						} );
					} );
				},*/
                "scrollX": true,
                "order": [],
                "dom": 'lBfrtip',
				"pageLength": 20,
                "buttons": [{
                    extend: 'collection',
                    text: 'Export',
                    buttons: [
                        'copy',
                        'csv',
                        'pdf',
                        'print'

                    ]
                }]
            });
        }); 
        
        </SCRIPT>
        <?php 
//include_once('../footer.php'); ?>