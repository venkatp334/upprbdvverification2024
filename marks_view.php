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
						<th>Name</th>
						<th>Father Name</th>
						<th>DOB</th>
						<th>Gender</th>
						<th>Category</th>
						<th>Sports</th>
						<th>Marks</th>
						
						
					  </tr> 
					</thead>

					<tbody>
					<?php
					$timezone = "Asia/Calcutta";
					if(function_exists('date_default_timezone_set')) date_default_timezone_set($timezone);
			$date_now = date("Y-m-d"); // this format is string comparable

					 $sql = "select * from dvdata d right join masterdata m on d.AADHAARNUMBER=m.AADHAARNUMBER where sports_marks is not null  ";
					
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
							<td>".$name."</td>
							<td>".$FatherName."</td>
							<td>".$DOB."</td>
							<td>".$GENDER."</td>
							<td>".$CATEGORY."</td>
						
						
							<td>".$row['SportsName']."</td>
							<td>".$row['sports_marks']."</td>
						
							
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