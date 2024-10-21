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
		
	
		<div class="row">
			<div class="col-12 mx-auto">
				<table id="example" class="table table-striped table-bordered" style="width:100%">
				   <thead>
				      <tr>
						
						<th>Reg id</th>
						<th>Name</th>
						<th>Father Name</th>
						<th>DOB</th>
						<th>Gender</th>
						<th>Category</th>
						<th>PWD</th>
						<th>Exman</th>
						<th>COPY OF ONLINE APPLICATION/REG/ACK</th>
						<th>ANY MISMATCH IN NAME</th>
						<th>10TH CLASS CERTIFICATE IN PROOF OF DOB</th>
						<th>ANY MISMATCH IN DATE OF BIRTH</th>
						<th>ANY MISMATCH IN PERCENTAGE IN CLASS 10TH</th>
						<th>ITI (SCVT/NCVT) CERTIFICATE</th>
						<th>MARKSHEETS OF ALL SEM's ITI RELATED TRADE</th>
						<th>ANY MISMATCH IN TRADE</th>
						<th>FEE RECEIPT PRODUCED BY THE APPLICANT</th>
						<th>CASTE CERTIFICATE IN PRESCRIBED FORMAT</th>
						<th>ANY MISMATCH IN CATEGORY/CASTE</th>
						<th>PWD CERTIFICATE</th>
						<th>ANY MISMATCH IN PWD</th>
						<th>DISCHARGE CERTIFICATE/SERVICE CERTIFICATE</th>
						<th>ANY MISMATCH IN ExSM</th>
						<th>CHILDREN OF ExSM IF YES CERTIFICATE</th>
						<th> 12TH CLASS CERTIFICATE </th>
						<th> PRODUCED AADHAR CARD </th>
						<th> TRAINING FROM ANY INSTITUTION/ORGANISATION </th>
						<th> MEDICAL FITNESS CERTIFICATE </th>
						<th> REMARKS OF SUPERVISOR </th>
						
						<th>WHETHER SUITBLE OR NOT</th>
						<th>REMARKS OF CONCERNED OFFICER</th>
					  </tr> 
					</thead>

					<tbody>
					<?php
					$timezone = "Asia/Calcutta";
					if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
			$date_now = date("Y-m-d"); // this format is string comparable

					 $sql = "select * from applicants a left join certification_verification c on a.transactionid=c.regid  where application_status='FINISHED' and (payment_exempted=1 or payment_status='SUCCESS') and is_final=1 and dv_date is not null and trade='Fitter' order by SNO asc  ";
					
					$query = mysqli_query($con,$sql);
					while($row = mysqli_fetch_assoc($query)) {
						$postname='';
                        // print_r($row);exit;
						if($row['category_belongs'] == 1 ){
							$pwd='Yes';
						}else{
							$pwd='No';
						}
						if($row['ex_serviceman'] == 1 ){
							$exman='Yes';
						}else{
							$exman='No';
						}
						 if($row['matric_mismatch'] == 'Yes'){
							$matric= $row['matric_mismatch'].'('.$row['m_marksupdated'].')';
							 }else {
								 $matric= $row['matric_mismatch'];
							 }
						
						echo "<tr>
						
							<td>".$row['transactionid']."</td>
							<td>".$row['fullname']."</td>
							<td>".$row['father_name']."</td>
							<td>".$row['dob']."</td>
							<td>".$row['sex']."</td>
							<td>".$row['community']."</td>
							<td>".$pwd."</td>
							<td>".$exman."</td>
							<td>".$row['online_mimacth']."</td>
							<td>".$row['name_mismatch']."</td>
							<td>".$row['10dob_mimacth']."</td>
							<td>".$row['dob_mismatch']."</td>
							<td>".$matric."</td>
							<td>".$row['scvt_ncvt_mimacth']."</td>
							<td>".$row['iti_sem_mimacth']."</td>
							<td>".$row['iti_mismatch']."</td>
							<td>".$row['fee_mimacth']."</td>
							<td>".$row['cast_mimacth']."</td>
							<td>".$row['cat_mismatch']."</td>
							<td>".$row['pwdc_mimacth']."</td>
							<td>".$row['pwd_mismatch']."</td>
							<td>".$row['esmc_mimacth']."</td>
							<td>".$row['exman_mismatch']."</td>
							<td>".$row['exch_mimacth']."</td>
							<td>".$row['twelth_mimacth']."</td>
							<td>".$row['aadhar_mismatch']."</td>
							<td>".$row['act_mimacth']."</td>
							<td>".$row['medical_mimacth']."</td>
							<td>".$row['remarks_supervisor']."</td>
							<td>".$row['is_certificate_status']."</td>
							<td>".$row['is_certificate_remark']."</td>
							
						</tr>";
					}
					?>	
					
					</tbody>
				</table> 
				
	</div>
		</div>
		
		

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