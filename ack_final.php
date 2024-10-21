<?php
$myUser = "iroams_rrc";
$myPass = "rrc_iroams";
$myServer = "pprds.cof0fc3mnt2s.ap-southeast-1.rds.amazonaws.com";  
 $myDB = "ppadminct";
 
 $dbhandle = mysql_connect($myServer, $myUser, $myPass)
 or die("Couldn't connect to SQL Server on $myServer $myUser $myPass");

	//select a database to work with
	$selected = mysql_select_db($myDB, $dbhandle)
	 or die("Couldn't open database $myDB");
	 
$reg_id = $_GET['regid'];
$query="select * from applicants a,registration_details r,payments p where r.registraionid=a.registraionid and r.registraionid=p.registraionid and r.registraionid=".$reg_id;
//echo $query;
$result=mysql_query($query);
$row = mysql_fetch_assoc($result);
//print_r($row);exit;
?>

<div class="container" style="width: 1000px;margin: 20px 148px;">
  <div class="row" style="background: white;">    
    <div class="col-md-12"> 
      <div class="panel">
      <div class="panel-body registrationDetails">
        <h2 style="text-align:center">Acknowledgement</h2>
<!--FAq section-->
       
       
             <!--  <div class="main-navHeader">
                  
               </div> -->
               <div class="table-responsive" id="divToPrint">
                    <table class="style1" border="1px" cellpadding="0" cellspacing="0">
            <tbody><tr>
                <td>
                    <div style="font-size: 15px; color: Blue; line-height: 18px" align="center">
                       <b> PUNJAB POLICE RECRUITMENT 2016</b></div>
                </td>
            </tr>
            <tr>
                <td align="center" style="line-height: 20px; font-size: 13px;">
                    <table class="style1" border="1px" cellpadding="0" cellspacing="0">
                      <tbody><tr>
                            <td colspan="2">
                                <div style="background-color:#111166; text-transform: uppercase; color: #fff;
                                    display: inline-block; font-size: 13px; margin: 3px 0; padding: 2px 0 2px; width: 100%;" align="center">
                                    RECRUITMENT OF WARDERS(MALE)/MATRONS(FEMALE) IN PUNJAB JAIL DEPARTMENT</span></div>
                            </td>
                        </tr>

                         <tr>
                            <td colspan="2">
                                <div style="font-weight:bold;
                                    display: inline-block; font-size: 15px; margin: 3px 0; padding: 2px 0 2px; width: 100%;" align="center">
                                    APPLICATION STATUS: <span id="ContentPlaceHolder1_lblStatus">
                                     <?php
									if($row['status']=='Success')
									{
									echo 'SUBMITTED';
									}
									else if($row['status']=='')
									{
									echo 'APPLIED';
									}
									else if($row['registraionid']!='')
									{
									echo 'REGISTERED';
									}
									?>
                                   </span>
                                     </div>
                            </td>
                        </tr>
                        <tr>
                            <td width="60%" valign="top" style="line-height: 21px">
                                <table border="1px" cellpadding="0" cellspacing="0" width="100%">
                                    <tbody><tr>
                                        <td>
                                            Name:
                                        </td>
                                        <td>
                                            <span id=""><?php echo $row['first_name'].' '.$row['middle_name'].' '.$row['last_name'];?></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Father's Name:
                                        </td>
                                        <td>
                                            <span id=""><?php echo $row['father_name'];?></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Mother's Name:
                                        </td>
                                        <td>
                                            <span id=""><?php echo $row['mother_name'];?></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            DoB:
                                        </td>
                                        <td>
                                            <span id=""><?php echo $row['dob'];?></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Category:
                                        </td>
                                        <td>
										   <span id=""><?php echo $row['category'];?></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                           Are you Doghra/Gorkha 
                                        </td>
                                        <td>
										   <span id="ContentPlaceHolder1_lblCriminalProc"><?php if($row['gurkha']==0) echo 'No'; else echo 'Yes';?></span></td>
                                        </td>
                                    </tr>
                                   
                                    <tr>
                                        <td>
                                            Qualification:
                                        </td>
                                        <td>
                                            <span id=""><?php echo $row['edu_qual'];?></span>
                                        </td>
                                    </tr>
                  <tr>
                                        <td>
                                            Punjab Domicile:</td>
                                        <td>
                                            <span id=""><?php if($row['domicile']==1) echo 'YES'; else echo 'NO';?></span>
                                        </td>
                                    </tr>
									<tr>
                                        <td>
                                            Aadhaar Card No:
                                        </td>
                                        <td>
                                            <span id=""><?php echo $row['aadhaar_number'];?></span>
                                        </td>
                                    </tr>
                                </tbody></table>
                            </td>
                            <td valign="top">
                                <table border="1px" cellpadding="0" cellspacing="0" width="100%">
                                    <tbody><tr>
                                        <td>
                                            Registration ID:
                                        </td>
                                        <td>
                                            <span id=""><?php echo $row['registraionid'];?></span>
                                        </td>
                                        <td rowspan="5">
                                         <?php
										$img="https://districtctphotos.s3.amazonaws.com/".$reg_id."_photo.jpg";
                                        ?>
                                            <img id="" src="<?php echo $img;?>" style="height:120px;width:100px;">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Gender:
                                        </td>
                                        <td>
                                            <span id=""><?php echo $row['sex'];?></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Mobile No:
                                        </td>
                                        <td>
                                            <span id=""><?php echo $row['mobileNumber'];?></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Marital Status:
                                        </td>
                                        <td>
                                            <span id=""><?php if($row['marrital_status']==0) {echo 'Unmarried';} else {echo 'Married';}?></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                        <?php
										$img="https://districtctsignatures.s3.amazonaws.com/".$reg_id."_sig.jpg";
                                        ?>
                                            <img id="ContentPlaceHolder1_ImgSignature" src="<?php echo $img;?>" style="height:40px;width:160px;">  
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="3">
                                            Address: &nbsp;<span id=""><?php echo $row['address'];?></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            State:
                                        </td>
                                        <td colspan="2">
										       <span id=""><?php echo $row['state'];?></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            District:
                                        </td>
                                        <td colspan="2">
										      <span id=""><?php echo $row['district']; ?></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Pincode:
                                        </td>
                                        <td colspan="2">
                                            <span id=""><?php echo $row['pincode']; ?></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            Police Station:
                                        </td>
                                        <td colspan="2">
                                            <span id="ContentPlaceHolder1_lblPoliceStation"><?php echo $row['policestation1'];?></span>
                                        </td>
                                    </tr>
                                </tbody></table>
                            </td>
                        </tr>
                        </table>
                         <table border="1px" cellpadding="0" cellspacing="0" width="100%">
                        <tr>
                            <td colspan="2">
                                <div style="background-color:#111166;color: #fff;
                                    display: inline-block; font-size: 13px; margin: 3px 0; padding: 2px 0 2px; width: 100%;" align="center">
                                    OTHER DETAILS</div>
                            </td>
                        </tr>
                   
                        <tr>
                        <td width="80%">Have you passed matriculation examination with Punjabi as one of the compulsary or elective subjects or any other equivalent examination in Punjabi language </td><td width="20%" align="center">Yes</td>
                        </tr>
                                           
                        <tr>
                            <td>
                                Whether any FIR or Criminal case(S) has ever been registered againt you?
                            </td>
							<td align="center">
                                <span id=""><?php if($row['fir_case']==0) echo 'No'; else echo 'Yes';?></span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Have you ever been arrested/detained in any criminal case(s)
                            </td>
                            <td align="center">
                                <span id=""><?php if($row['arrested']==0) echo 'No'; else echo 'Yes';?></span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Have you ever been tried &amp; convicted or acquitted by a Court of law in any criminal
                                case(s)?
                            </td>
                            <td align="center">
                                <span id="ContentPlaceHolder1_lblConvicted"><?php if($row['criminal_case_acquitted']==0) echo 'No'; else echo 'Yes';?></span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Have you ever had to execute any bond for keeping peace/good behavior under security
                                proceeding of CrPC?
                            </td>
                            <td align="center">
                                <span id="ContentPlaceHolder1_lblCRPC"><?php if($row['good_behavior_bond']==0) echo 'No'; else echo 'Yes';?></span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Have you ever been proceeded against by any School/College/University/Board
                                    in case of Unfair Means (UMC) or any charges
                            </td>
                            <td align="center">
                                <span id="ContentPlaceHolder1_lblUMC"><?php if($row['debarment']==0) echo 'No'; else echo 'Yes';?></span>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Are you facing any Criminal Proceedings in any Court of Law in India?:</td>
                            <td align="center">
                                <span id="ContentPlaceHolder1_lblCriminalProc"><?php if($row['fir_case_pending']==0) echo 'No'; else echo 'Yes';?></span></td>
                        </tr>
                        <tr>
                            <td>
                               Is there any departmental enquiry / court enquiry pending against you?:</td>
                            <td align="center">
                                <span id="ContentPlaceHolder1_lblCriminalProc"><?php if($row['dep_enq_pending']==0) echo 'No'; else echo 'Yes'; ?></span></td>
                        </tr>
                        <tr>
                            <td>&nbsp;
                                </td>
                            <td>&nbsp;
                                </td>
                        </tr>
                         <tr>
                            <td colspan="2">
                                <div style="background-color:#111166;color: #fff;
                                    display: inline-block; font-size: 13px; margin: 3px 0; padding: 2px 0 2px; width: 100%;" align="center">
                                    DECLARATIONS</div>
                            </td>
                        </tr>
                         <tr>
                            <td colspan="2">
                               <p style="text-align:justify">
                                       1.) I hereby declare and confirm that all the entries made by me in this Common Application
                                        Form are correct. I undertake that in case any information furnished by me is found
                                        to be false or incomplete or any material information is found to be concealed by
                                        me, my candidature may be cancelled and I understand that no claim, whatsoever,
                                        shall be entertained in this regard afterwards.<br>
                                       
                                    </p>
                                     <p style="text-align:justify">
                                       2.) I certify that the documents uploaded by me alongwith this Application Form are
                                        genuine and in case any of the documents are found to be fake/forged, appropriate
                                        Departmental (including Dischare/Dismissal from service) and/or Criminal proceedings
                                        may be initiated against me. I undertake to abide by the general Rules and Regulations
                                        governing the recruitment process and I will also abide by the instructions/commands
                                        given by the staff conducting the recruitment process.<br></p>
                                        <p style="text-align:justify">
                                        3.) I undertake that I shall not cause any disruption in the Recruitment Process and
                                        shall refrain from indulging in any anti-social, unlawful activities during the
                                        entire recruitment process. If I am found indulging in any such activities at any
                                        time during the Recruitment Process, my Candidature may be cancelled and I shall
                                        be liable for any Departmental and/or Criminal Proceedings consequent upon such
                                        act/activity.<br></p>

                                         <p>
                                       4.) I undertake that I shall not canvass for my Candidature/Selection in any form.
                                        <br></p>

                                        <p style="text-align:justify">
                                       5.) If after the submission of this Application Form, any Criminal case(s) is/are registered
                                        against you or you are arrested/detained by Police in any Criminal Case, the complete
                                        details relevant to the same should be communicated by you immediately, in writing,
                                        either personally or by registered post/email, to the Chairman, Central Recruitment
                                        Board, Punjab Police failing which it shall be deemed to be the willful concealment
                                        of factual information on your part.
                                        <br></p>

                                         <p style="text-align:justify">
                                       6.) I hereby giving my willingness to undergo substance abuse test for drug addiction at the District/Zonal
                                        Recruitment Center before the Physical Measurement Test and Physical Screening Test.
                                        <br>
                             
                                    </p>
                            </td>
                        </tr>
                    </tbody></table>
                </td>
            </tr>
            <tr>
               
            </tr>
        </tbody></table></br>
                 <div class="text-center">
                   <input type="submit" name="print" id="print" Value="Print" onclick="PrintDiv();">
                 </div>
                   
             </div>
        </div></div>
        </div>
               </div>
        </div>
        </table>
               
<?php
require_once "footer.php";
?>
<script type="text/javascript">     
function PrintDiv() {    
   var divToPrint = document.getElementById('divToPrint');
   var popupWin = window.open('', '_blank');
   popupWin.document.open();
   popupWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
	popupWin.document.close();
}
</script>