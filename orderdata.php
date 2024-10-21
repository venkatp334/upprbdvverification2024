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
  <title>UPPRB</title>
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
<body oncontextmenu="return true">
  
      
	
	
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
	<form  method="post" id="form" >
		 <div class="row">
								<div class="col-md-2" >
                                  
                                        <span class="pull-left listLabel">Select Sports name
                                       
									</div>
                                    <div class="col-md-6" >
                                        <select required id="state" name="state" class="large form-control addresschange" autocomplete="off">
                                            <option value="">--Select Sports Name--</option>
                                            <?php $state_query=mysqli_query($con,"SELECT distinct SPORTSNAME FROM masterdata_newsrno order by SPORTSNAME;");
                                            while($dd=mysqli_fetch_assoc($state_query)){
                                                ?>
                                                <option  value="<?php echo $dd['SPORTSNAME'] ?>"><?php echo  $dd['SPORTSNAME'] ?></option>
                                            <?php } ?>                          
                                        </select>
                                    </div>
									 <div class="col-md-4" >
                                      <button type="submit" name="submit" id="submit" value="Submit">Submit</button></br></br>
		
                                    </div>
									</form>
             </div></br></br></br></br></br>
			 <?php 
if(isset($_POST['submit']) == 'submit') {	
?>
		<div class="row">
			<div class="col-12 mx-auto">
				<table id="example" class="table table-striped table-bordered" style="width:100%">
				   <thead>
				      <tr>
						
						<th>NEW SR NO</th>
						<th>SR NO</th>
						<th>Aadhar No</th>
						<th>Sports Name</th>
						<th>MASKED AADHAAR</th>
						<th>AADHAAR NUMBER</th>
						<th>Sports Code</th>						
						<th>Name</th>
						<th>GENDER</th>
						<th>DV Status</th>
						<th>DV Remark</th>
						<th>DV Time</th>
						
					  </tr> 
					</thead>

					<tbody>
					<?php
					$timezone = "Asia/Calcutta";
					if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
					$date_now = date("Y-m-d"); // this format is string comparable
                      $update='update masterdata_newsrno m ,dvdata d set m.dv_remark=d.is_certificate_remark,m.eligiable_status=d.age_eligiable,m.dv_time=d.verified_time where m.AADHAARNUMBER=d.AADHAARNUMBER and  m.SPORTSNAME=d.Sports_Name;';
					  mysqli_query($con,$update);
				 	 //$sql = "SELECT m.*, d.age_eligiable,d.is_certificate_remark,d.verified_time FROM upprb_written_2022.masterdata_newsrno m left join dvdata d  on m.AADHAARNUMBER=d.AADHAARNUMBER where m.SPORTSNAME='".$_POST['state']."' and d.Sports_Name='".$_POST['state']."' order by SPORTSNAME,`index`, New_S_No asc";	
					$sql = "SELECT * FROM upprb_written_2022.masterdata_newsrno m  where m.SPORTSNAME='".$_POST['state']."' order by SPORTSNAME,`index`, New_S_No asc";
					
					
					$query = mysqli_query($con,$sql);
					while($row = mysqli_fetch_assoc($query)) {
					
						
						echo "<tr>
						
							<td>".$row['New_S_No']."</td>
							<td>".$row['SR NO']."</td>
							<td>".$row['AADHAARNUMBER']."</td>
							<td>".$row['SPORTSNAME']."</td>
							<td>".$row['MASKED AADHAAR']."</td>
							<td>".$row['AADHAAR NUMBER']."</td>
							<td>".$row['SPORTSCODE']."</td>
							<td>".$row['APPLICANT NAME']."</td>
							<td>".$row['GENDER']."</td>
							<td>".$row['eligiable_status']."</td>
							<td>".$row['dv_remark']."</td>
							<td>".$row['dv_time']."</td>
							
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