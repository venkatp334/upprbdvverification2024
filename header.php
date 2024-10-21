<?php
session_start();
error_reporting(0); 

?>
<!DOCTYPE html>
<html>
    <head>
        <title>RRC</title>
        <meta charset="utf-8">
		<!--meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests"/-->
		<!--meta http-equiv="X-Frame-Options" content="DENY"-->
        <!--meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/-->
        <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=0" />
        <!-- CSS Library -->
        <link rel="stylesheet" href="css/library/normalize.css">
        <link rel="stylesheet" href="css/library/font-awesome.min.css">
        <link rel="stylesheet" href="css/library/jquery-ui-1.10.3.custom.min.css">
        <!-- Theme -->
        <link rel="stylesheet" href="css/theme/default/layout.css">
        <link rel="stylesheet" href="css/theme/default/core_colour.css">
        <link rel="stylesheet" href="css/theme/default/colour.css" class="theme-colour">
        
		<!--div id="theme-selector">
            <div class="icon"><i class="icon-cogs"></i></div>
            <div class="theme" data-theme="colour"  style="background:#0B879E;"></div>
            <div class="theme" data-theme="colour1" style="background:#980053;"></div>
            <div class="theme" data-theme="colour2" style="background:#0F7C0F;"></div>
            <div class="theme" data-theme="colour3" style="background:#692E00;"></div>
            <div class="theme" data-theme="colour4" style="background:#CB252E;"></div>
            <div class="theme" data-theme="colour5" style="background:#015077;"></div>
            <div class="theme" data-theme="colour6" style="background:#CC4C25;"></div>
            <div class="theme" data-theme="colour7" style="background:#91A244;"></div>
            <div class="theme" data-theme="colour8" style="background:#444444;"></div>
        </div-->
		    </head>
   
        <!-- End -->
        <!-- Portrait Detector -->
        <div id="portrait_mode_detector"></div>
        <!-- End -->
        <div id="layout-container">
            <!-- Menu -->
            <div id="nav">
                <!-- Profile -->
                <div class="profile">
                    <div class="avatar">
                        <img src="images/profile/southern_railway.jpg" alt="profile" />
                    </div>
                </div>
                <!-- End -->
                <!-- Menu -->
                <ul class="navigation">
                    <li class="separator"><div></div><div></div><div></div></li>
					<?php if( $_SESSION['role'] == 'verification') { ?>
                    <li><a href="images_search.php" class=""><i class="icon-home"></i><span>Certificate's </br> Verification</span></a></li>
                    <li class="separator"><div></div><div></div><div></div></li>
				
					
					<?php } ?>
					<?php if( $_SESSION['role'] == 'entry') { ?>
					<li><a href="data_entry.php"  class=""><i class="icon-list"></i><span>Data Entry</span></a></li>
					
					<?php } ?>
					<?php if( $_SESSION['role'] == 'superadmin') { ?>
					 <li><a href="images_search.php" class=""><i class="icon-home"></i><span>Certificate's </br> Verification</span></a></li>
					 	<li><a href="report.php" target='_blank' class=""><i class="icon-list"></i><span>View Data</span></a></li>
					<li><a href="data_entry.php"  class=""><i class="icon-list"></i><span>Data Entry</span></a></li>
					<li><a href="marks_view.php" target='_blank'  class=""><i class="icon-list"></i><span>View Report</span></a></li>
					<li><a href="orderdata.php" target='_blank'  class=""><i class="icon-list"></i><span>View Data </br> order </span></a></li>
					<?php } ?>
					<?php if( $_SESSION['role'] == 'members') { ?>
					<li><a href="members_entry.php"  class=""><i class="icon-list"></i><span>Members</span></a></li>
					
					<?php } ?>
					<li><a href="logout.php"  class=""><i class="icon-signout"></i><span>logout</span></a></li>

                </ul>
                <!-- End --> 
            </div>
            <!-- End -->
            <!-- Page Container -->
            <div id="main">
                <div class="page-title">
                    <div class="menu-switch"><i class="icon-reorder"></i></div>
                    <i class="icon-home"></i>
                    <span>Certificate's Verification <h5 style='margin: 0px 108px; background: none;color: #215cd1; font-size: 31px;'> User Name : <?php echo $_SESSION['username'] ?></h5></span>
             </div>