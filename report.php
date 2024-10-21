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
<body oncontextmenu="return false">
  
      
	
	
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
						
						<th>Aadhar No</th>
						<th>Sports Name</th>
						<th>Sports Code</th>
						<th>Dv Date</th>
						<th>Dv Venue</th>
						<th>Name</th>
						<th>Father Name</th>
						<th>DOB</th>
						
						
						<th>Is -2 Years relaxation</th>
						<th>Is -2  Years relaxation claimed</th>
						<th>Is +5 Years relaxation</th>
						<th>Is +5 Years relaxation claimed</th>
						
						
						<th>Gender</th>
						<th>Category</th>
						
						<th>Name Mismatch</th>
						<th>Father Name Mismatch</th>
						<th>Gender Mismatch</th>
						<th>Category Mismatch</th>
						<th>DOB Mismatch</th>
						<th>UP Domicile Mismatch</th>
						<th>UP Domicile Certifcate </th>
						<th>UP Domicile Certifcate valid</th>
						
						<th>Category Mismatch</th>
						<th>Category Certifcate </th>
						<th>Category Certifcate valid </th>
						
						<th>National games certificate </th>
						<th>National games certificate valid </th>
						<th>national championship (junior/Senior) certificate </th>
						<th>national championship (junior/Senior) certificate valid </th>
						<th>Federation Cup National (Junior/Senior) certificate </th>
						<th>Federation Cup National (Junior/Senior) certificate valid </th>
						<th>All India Inter State Championship(Senior) certificate </th>
						<th>All India Inter State Championship(Senior) certificate valid </th>
						<th>All India Inter University tournament certificate </th> 
						<th>All India Inter University tournament certificate valid </th> 
						<th>World School Games (Under 19) certificate </th>
						<th>World School Games (Under 19) certificate valid </th>
						<th>National School Games (Under 19) certificate </th> 
						<th>National School Games (Under 19) certificate valid </th> 
						<th>All India Police Sports Competition certificate </th>
						<th>All India Police Sports Competition certificate valid </th>
						
						<th>O Level Certifcate</th>
						<th>O Level Certifcate valid</th>
						<th>Army Certifcate</th>
						<th>Army Certifcate valid</th>
						<th>NCC Certifcate</th>
						<th>NCC Certifcate valid</th>
						<th>High School Certifcate Mismatch</th>
						<th>High School Certifcate valid</th>
						<th>Intermediate Certifcate Mismatch</th>					
						<th>Intermediate Certifcate valid</th>					
						
						<th>WHETHER SUITBLE OR NOT</th>
						<th>REMARKS OF CONCERNED OFFICER</th>
					  </tr> 
					</thead>

					<tbody>
					<?php
					$timezone = "Asia/Calcutta";
					if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
			$date_now = date("Y-m-d"); // this format is string comparable

					 $sql = "select * from dvdata d ,masterdata m where d.AADHAARNUMBER=m.AADHAARNUMBER and d.Sports_Name=m.SportsName ";
					
					$query = mysqli_query($con,$sql);
					while($row = mysqli_fetch_assoc($query)) {
						$name = empty($row['c_name']) ? $row['Name'] : '<b>'.$row['c_name'].'</b>';
						$FatherName = empty($row['fname_enter']) ? $row['FatherName'] : '<b>'.$row['fname_enter'].'</b>';
						$GENDER =  empty($row['g_name']) ? $row['GENDER'] : '<b>'.$row['g_name'].'</b>';
						$DOB =  empty($row['dob_enter']) ? $row['DOB'] : '<b>'.$row['dob_enter'].'</b>';
						$CATEGORY =  empty($row['cat_enter']) ? $row['CATEGORY'] : '<b>'.$row['cat_enter'].'</b>';
						
						echo "<tr>
						
							<td>".$row['AADHAARNUMBER']."</td>
							<td>".$row['SportsName']."</td>
							<td>".$row['Sportscode']."</td>
							<td>".$row['dvdate']."</td>
							<td>".$row['dvvenue']."</td>
							<td>".$name."</td>
							<td>".$FatherName."</td>
							<td>".$DOB."</td>
							
							<td>".$row[' minus_2 years Age Relaxation']."</td>
							<td>".$row['two_mismatch']."</td>
							<td>".$row[' 5 years Age Relaxation']."</td>
							<td>".$row['five_mismatch']."</td>
							
							<td>".$GENDER."</td>
							<td>".$CATEGORY."</td>
							
							<td>".$row['name_mismatch']."</td>
							<td>".$row['father_mismatch']."</td>
							<td>".$row['gender_mismatch']."</td>
							<td>".$row['cat_mismatch']."</td>
							<td>".$row['dob_mismatch']."</td>
							<td>".$row['dom_mismatch']."</td>
							<td>".$row['dom_certificate']."</td>
							<td>".$row['dom_certificatev']."</td>
							<td>".$row['cat_mismatch']."</td>
							<td>".$row['cat_certificate']."</td>
							<td>".$row['cat_certificatev']."</td>
							
							<td>".$row['national_gamesc']."</td>
							<td>".$row['national_gamesv']."</td>
							<td>".$row['national_champc']."</td>
							<td>".$row['national_champv']."</td>
							<td>".$row['feder_cupc']."</td>
							<td>".$row['feder_cupv']."</td>
							<td>".$row['all_Indiac']."</td>
							<td>".$row['all_Indiav']."</td>
							<td>".$row['all_Indiatc']."</td>
							<td>".$row['all_Indiatv']."</td>
							<td>".$row['world_schoolc']."</td>
							<td>".$row['world_schoolv']."</td>
							<td>".$row['national_schoolc']."</td>
							<td>".$row['national_schoolv']."</td>
							<td>".$row['india_policec']."</td>
							<td>".$row['india_policev']."</td>
							
							<td>".$row['nielit_mismatch']."</td>
							<td>".$row['nielit_mismatchv']."</td>
							<td>".$row['army_mismatch']."</td>
							<td>".$row['army_mismatchv']."</td>
							<td>".$row['ncc_mismatch']."</td>
							<td>".$row['ncc_mismatchv']."</td>
							<td>".$row['matric_mismatch']."</td>
							<td>".$row['matric_mismatchv']."</td>
							<td>".$row['inter_mismatch']."</td>
							<td>".$row['inter_mismatchv']."</td>
							<td>".$row['age_eligiable']."</td>
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
		document.addEventListener('contextmenu', function(e) {
  e.preventDefault();
});
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