<?php
   
$conn =mysqli_connect("petrds.cm0bksyl0mvc.ap-south-1.rds.amazonaws.com","T1wing_pet",'Pet$T!wing#123',"rrcwcr2021",'3390');
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL DB ";
}
$query="SELECT * FROM rrcwcr2021.applicants where transactionid=".$_GET['regid'];
$result=$conn->query($query);
// $row = $result->fetch_array(MYSQLI_ASSOC);
$row = mysqli_fetch_assoc($result);
// print_r($row);
// exit;
?>
<!-- SELECT * FROM rrcwcr2021.applicants; -->



<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <link rel="shortcut icon" href="images/favicon.jpg" />
 <script type="text/javascript" src="js/jquery.min.js"></script>
 <link href="css/bootstrap.min.css" rel="stylesheet">
 <script src="js/bootstrap.min.js"></script>
 <link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet" media="screen" />
 <link rel="stylesheet" href="css/styles.css">
 <link rel="stylesheet" href="style_print.css">
 <link rel="stylesheet" href="/css/bootstrap_min.css">
 
<title>RRC</title>
<style type="text/css" media="print">
  @page { size: portrait;    }
</style>
<style type="text/css">
  body{line-height: 0.8 !important;}
  h1,h2,h3,h4,h5,h6 {
    margin-top:2px !important;
    margin-bottom:2px !important;
  }
  td 
  {
    padding-top: 0px !important;
    padding-bottom: 0px !important;
  }
  /* form{
    background: url(images/logo_ssb.png);
    width: 100%;
  }*/
  @media print {
  /*  body {transform: scale(1);}
      -webkit-transform: scale(0.5); 
              -moz-transform: scale(0.5);  
                -ms-transform: scale(0.5);  
                -o-transform: scale(0.5); */
                
  form:before { content: url(images/ssb_400.png);
    position: absolute;
    opacity: 0.3;
  
    /* 
    width: 100%;
    height: 100%;
    */
    top:220px;
    left:150px;

    }

  } 

  .watermark{
      background:url("images/ssb_400.png") center center no-repeat;
    opacity: 0.3;
    position: absolute;
    width: 100%;
    height: 100%;
  }
</style>

<style type="text/css">
  
 /*  @media print {    
    .watermark{
    background:url("images/ssb_watermark.png") center center no-repeat;opacity:0.6;
  opacity: 0.6;
  position: absolute;
  width: 100%;
  height: 100%;
} */
}
  
</style>


<!--script type="text/javascript">

function printpage()
{
window.print();
}
</script-->

</head>
<body onload="printpage()" style="padding-top:0px;">

<!-- <%
	 AcknoweledgementBean applicationFormBean=(AcknoweledgementBean)request.getAttribute("AcknoweledgementBean");
    			 %> -->


<div id="masthead">  
  <div class="container-fluid">
    <div class="row">
		<div class="col-md-3 col-sm-3 col-xs-3">
			<div class="well well-lg"> 
			  <div class="row">
				<div class="col-sm-12">
					<img src="images/profile/southern_railway.jpg">
				
				</div>
			  </div>
			</div>
		</div>
		<div class="col-md-9 col-sm-9 col-xs-9">
			 <h1 style="margin-top: 14px; margin-left: -110px;">
           RAILWAY RECRUITMENT CELL (RRC)
           </h1>
           <h2 style="margin-top: 11px; margin-left: -110px; font-size:14px;">
          WEST CENTRAL RAILWAY
           </h2>
		</div>
    </div> 
  </div>
  
</div>




	<!--wrapper div starts here-->
	   <div class="container-fluid">
  <div class="row">    
    <div class="col-md-12"> 

      <div class="panel">
        	<div class="panel-body	registrationDetails2" style="padding:0px;">
        	
        	<div class="contentoutter">
        	<div></div>
					<div class="contentinner">
					
       <form  action="#">
       <!-- <jsp:useBean id="AcknoweledgementBean" scope="request" class="com.ttil.bean.AcknoweledgementBean" /> -->
					<!-- <input type="hidden" name="requestFrom" value="Acknoweledgement" /> -->
					
	
        <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0" style="padding:30px 0px 0px 0px;">
          <tr>
				<td class="bdr" colspan="2"><h5>Acknowledgement</h5></td>
			</tr>
		
											
            <!--  <tr>
				<td class="bdr"><h4>Personal Details</h4></td>
			</tr> -->
			
			<tr>
				<td width="90%"><table width="95%" border="0" align="center" cellpadding="5" cellspacing="0"> 
				
			  <tr>
                <td width="53.8%"><label class="label1">Registration Id : </label> 
                <label> <?php echo $row['transactionid'] ?></label></td>
                <td><label class="label1">Date &amp; Time  : </label> 
                <label><?php echo $row['date_created'] ?></label></td>
              </tr>
              
              <tr>
                <td><label class="label1">Division &amp; Applied For : </label> 
                <label><?php echo $row['divisions'] ?> - Trade
                 <?php echo $row['trade'] ?></label></td>
                <td><label class="label1">Applicant Name : </label> <label><?= $row['fullname'];?></label></td>
              </tr>
            
              
               <tr>
                <td><label class="label1">Father's Name : </label><label><?= $row['father_name'];?></label></td>
                <td><label class="label1">Mother's Name : </label> <label><?= $row['mother_name'];?></label></td>
              </tr>
              
              <tr>
                <td><label class="label1">Date of Birth : </label> <label><?= $row['dob'];?></label></td>
                <td> <label class="label1">Gender : </label><label><?= $row['sex'];?></label></td>
              </tr>
              
              <tr>
                <td><label class="label1">Religion : </label> <label><?= $row['religion'];?></label></td>
                <td><label class="label1">Marital Status : </label><label><?= $row['marrital_status'];?></label></td>
              </tr>
               <?php if($row['religion']=='Others'){ ?>
              <tr>
                <td><label class="label1">Other Religion : </label></td>
                <td><label><?= $row['other_religion'];?></label></td>
              </tr>
               <?php } ?>
              
               <tr>
                <td><label class="label1">Nationality : </label><label><?= $row['nationality'];?>
                <?php if($row['nationality']=='Others'){ ?>
                (<?= $row['other_nationality'];?>)
                <?php } ?>
                </label></td>
                <td><label class="label1">Category : </label><label><?= $row['community'];?></label></td>
              </tr>
              
              
               <tr>
                <td><label class="label1">Identity Card No : </label><label><?= $row['aadhar_no'];?>
                    (<?= $row['identity_type'];?></label></td>
                <td><label class="label1">Identification Marks : </label><label>1. <?= $row['identification_mark'];?>
                 <br />
                2. <?= $row['identification_mark_2'];?></label></td>
              </tr>
              
              <tr>
                <td><label class="label1">Mobile Number : </label><label><?= $row['mobileNumber'];?></label></td>
                <td><label class="label1">Email Address : </label><label><?= $row['emailaddress'];?></label></td>
              </tr>
            </table>
            </td>  
              <td>
                      <table width="95%" border="0" align="center" cellpadding="5" cellspacing="0">				
              <tr> <td> 
                
             <img id="" src="https://iroams.com/RRCJabalpur/candidateImages/<?php echo $row['photo_file_name']; ?>" style="
               height:120px;width:160px;"> <br />
                   
                  </td>
                  </tr>
                  </table>
                  </td>
           </tr>   
		
		<tr>
		   <td colspan="2"><table width="96%" border="0" align="center" cellpadding="5" cellspacing="0"> 
		     
		     <tr>
                <td width="47%"><label class="label1">Do you belong to PwBD (Person with Benchmark Disability) Category  : </label></td>
                <td><label> <?php if($row['category_belongs']) { echo "YES" ;}else{ echo "NO"; }?></label></td>
              </tr>
             
              <?php if($row['category_belongs']){ ?>
              <tr>
                <td colspan="2">
                   <table width="100%" cellspacing="0" cellpadding="5" border="0" align="center" class="border1">
                     <tbody>
                     <tr>
                       <td><label class="label1">Catgeory</label></td>
                      </tr>
                      <tr>
                        <td><label><?= $row['category'];?></label></td>
                      </tr>  
                     </tbody>
                   </table>
                </td>
              </tr>
              <?php } ?>
              
            
              <tr>
                <td><label class="label1">Whether Ex-Serviceman : </label></td>
                <td><label><?php if($row['ex_serviceman']) { echo "YES" ;}else{ echo "NO"; }?>
                  
                </label></td>
              </tr>
              <?php if($row['ex_serviceman']){
                $query1="SELECT * FROM rrcwcr2021.exman_details where transactionid=".$row['transactionid'];
                $result1=$conn->query($query1);
                $row1 = mysqli_fetch_assoc($result1);
                ?>
              <tr>
                <td colspan="2">
                   <table width="100%" cellspacing="0" cellpadding="5" border="0" align="center" class="border1">
                     <tbody>
                     <tr>
                       <td><label class="label1">Date of Enrollment</label></td>
                       <td><label class="label1">Date of Retirement / Discharge</label></td>
                      </tr>
                      <tr>
                        <td><label><?= $row['date_enrollment'];?></label></td>
                        <td><label><?= $row['date_retirement'];?></label>
                        </td>
                      </tr>  
                     </tbody>
                   </table>
                </td>
              </tr>
              <?php } ?>
              
		     
              
             
           </table>
          </td>
          </tr>
															 
           <tr>
				<td class="bdr" colspan="2"><h4>Education Qualification Details</h4></td>
			</tr>
			
			<tr>
				<td colspan="2"><table width="96%" border="0" align="center" cellpadding="5" cellspacing="0" style="margin-top: 10px; margin-bottom: 10px;">
              
              
              <tr>
                <td colspan="2"><table width="100%" border="0" cellspacing="0" cellpadding="5">
                  
                 <tr>
                    <td width="10%" class="border1"><label class="label1">Exam Passed</label></td>
                    <td width="20%" class="border1"><label class="label1">School/ University/ Board/ Institute</label></td>
                    <td width="7%" class="border1"><label class="label1">Year of Exam</label></td>
                    <td width="10%" class="border1"><label class="label1">Roll No</label></td>
                    <td width="10%" class="border1"><label class="label1">Certificate No</label></td>
                    <td width="10%" class="border1"><label class="label1">Marks Obtained</label></td>
                    <td width="17%" class="border1"><label class="label1">Total Marks</label></td>
                    <td width="13%" class="border1"><label class="label1">Aggregate Percentage of Marks/ Grading</label></td>
                  </tr>
                    <tr>
                      <?php 
                         $query2="SELECT * FROM rrcwcr2021.education_details where ed_qual=1 and transactionid=".$row['transactionid'];
                         $result2=$conn->query($query2);
                         $row2= mysqli_fetch_assoc($result2);
                      ?>
                   <td class="border1"><label class="label2"><?= $row2['exam_passed'];?></label></td>
                    <td class="border1"><label class="label2"><?= $row2['university'];?></label></td>
                    <td class="border1"><label class="label2"><?= $row2['year'];?></label></td>
                    <td class="border1"><label class="label2"><?= $row2['rollno'];?></label></td>
                    <td class="border1"><label class="label2"><?= $row2['cert_no'];?></label></td>
                    <td class="border1"><label class="label2"><?= $row2['date_issue'];?></label></td>
                     <td class="border1"><label class="label2"><?= $row2['subject'];?></label></td>
                      <td class="border1"><label class="label2"><?= $row2['percentage'];?></label></td>
                  </tr>
                  
                   <tr>
                    <td width="10%" class="border1"><label class="label1">Exam Passed</label></td>
                    <td width="20%" class="border1"><label class="label1">School/ University/ Board/ Institute</label></td>
                    <td width="7%" class="border1"><label class="label1">Year of Exam</label></td>
                    <td width="10%" class="border1"><label class="label1">Roll No</label></td>
                    <td width="10%" class="border1"><label class="label1">Certificate No</label></td>
                    <td width="10%" class="border1"><label class="label1">ITI Result</label></td>
					<td width="17%" class="border1"><label class="label1">Trade Passed</label></td>
					 <td width="13%" class="border1"><label class="label1"></label></td>
                  </tr>
                  
                   <tr>
                     <?php 
                         $query3="SELECT * FROM rrcwcr2021.education_details where ed_qual=2 and transactionid=".$row['transactionid'];
                         $result3=$conn->query($query3);
                         $row3= mysqli_fetch_assoc($result3);
                      ?>
                    <td class="border1"><label class="label2"><?= $row3['exam_passed'];?></label></td>
                    <td class="border1"><label class="label2"><?= $row3['university'];?></label></td>
                    <td class="border1"><label class="label2"><?= $row3['year'];?></label></td>
                    <td class="border1"><label class="label2"><?= $row3['rollno'];?></label></td>
                    <td class="border1"><label class="label2"><?= $row3['cert_no'];?></label></td>
                    <td class="border1"><label class="label2"><?= $row3['date_issue'] ?></label></td>
					 <td class="border1"><label class="label2"><?= $row3['subject'] ?></label></td>
					 <td class="border1"><label class="label2"></label></td>
                  </tr>
                  
                </table></td>
              </tr>
              
                 
              
           </table>
           </td>
           </tr>
         
          <tr>
				<td class="bdr"  colspan="2"><h4>Address Details</h4></td>
			</tr>
			<tr>
				<td colspan="2"><table width="96%" border="1" align="center" cellpadding="5" cellspacing="0" style="margin-top: 10px; margin-bottom: 10px;">
           
			  <tr>
					<td colspan="2"><h6 style="text-align:center;">Permanent Address </h6></td>
					<td colspan="2"><h6 style="text-align:center;">Correspondence Address </h6></td>
			 </tr>
              <tr>
                <td width="13%"><label class="label1">Village/Town </label></td>
                <td width="32%"><label><?= $row['village'];?></label></td>
                <td width="13%"><label class="label1">Village/Town </label></td>
                <td width="32%"><label><?= $row['village1'];?></label></td>
              </tr>
              <tr>
                <td ><label class="label1">Post Office </label></td>
                <td><label><?= $row['postoffice'];?></label></td>
                 <td><label class="label1">Post Office </label></td>
                <td><label><?= $row['postoffice1'];?></label></td>
              </tr>
              <tr>
                <td><label class="label1">Tehsil </label></td>
                <td><label><?= $row['tehsil'];?></label></td>
                <td><label class="label1">Tehsil </label></td>
                <td><label><?= $row['tehsil1'];?></label></td>
              </tr>
              <tr>
                <td><label class="label1">Police Station </label></td>
                <td><label><?= $row['policestation'];?></label></td>
                 <td><label class="label1">Police Station </label></td>
                <td><label><?= $row['policestation1'];?></label></td>
              </tr>
              <tr>
                <td><label class="label1">District </label></td>
                <td><label><?= $row['district'];?></label></td>
                <td><label class="label1">District </label></td>
                <td><label><?= $row['district1'];?></label></td>
              </tr>
              <tr>
                <td><label class="label1">State </label></td>
                <td><label><?= $row['state'];?></label></td>
                 <td><label class="label1">State </label></td>
                <td><label><?= $row['state1'];?></label></td>
              </tr>
              <tr>
                <td><label class="label1">Pin code </label></td>
                <td><label><?= $row['pincode'];?></label></td>
                 <td><label class="label1">Pin code </label></td>
                <td><label><?= $row['pincode1'];?></label></td>
              </tr>
              </table>
         </td>
         </tr>
         
            
           
          <tr>
				<td colspan="2" class="bdr"><h4>Declaration by the Candidate</h4></td>
			</tr>
								
			<tr>
				<td align="left" valign="middle" class="bdr" colspan="2">
				<table width="95%" border="0" align="center" cellpadding="5" cellspacing="0">
						
				 <tr>
					<td align="left" valign="middle" colspan="2">	
								<label style="margin-top: 10px; line-height:13px;"> I hereby declare that the information given above is true to the best of my knowledge and belief and nothing has been concealed therein. I am well aware of the fact that if the information given by me is proved not true, I will have to face the consequences as per the Law. Also, all the benefits availed by me shall be summarily withdrawn. 
							    </label>
					 </td>
			     </tr>
			      <tr>
			      <td><label class="label1">Date   : </label> 
                <label><?php echo $row['date_created']; ?></label></td>
                
					<td align="right" valign="middle" >	
							 <!-- <img  align="right" id="ContentPlaceHolder1_ImgSignature" src="http://onlinedatafiles.s3.amazonaws.com/ssb_advt_comb_CT_338_2018/signature/<jsp:getProperty name="AcknoweledgementBean" property="sigFileName" />" style="height:40px;width:160px; margin-bottom:10px;"> -->
							 <img align="right" id="ContentPlaceHolder1_ImgSignature" src="https://iroams.com/RRCJabalpur/candidateImages/<?php echo $row['signature_file_name']; ?>" style="height:40px;width:160px; margin-bottom:10px;">
					 </td>
			     </tr>
			     </table>
			     </td>
			 </tr>  
			 
		 
                
                
              
       </table>
         
        </form>
      </div>
    </div>
    
  </div>
</div>
</div>
</div>
</div>
</body>
</html>
