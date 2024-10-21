<!DOCTYPE html>
<?php
session_start(); 
error_reporting(1); 
if(!isset($_SESSION['user_name_mgr']))
{
?>
<script>window.location.replace('index.php');</script>
<?php 
}
include_once('db.php');
$dbhandle = mysql_connect($myServer, $myUser, $myPass)
 or die("Couldn't connect to SQL Server on $myServer $myUser $myPass");

	//select a database to work with
	$selected = mysql_select_db($myDB, $dbhandle)
	 or die("Couldn't open database $myDB"); 
?>
<html>
    <head>
        <title>RRC</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=0" />
        <!-- CSS Library -->
        <link rel="stylesheet" href="css/library/normalize.css">
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
                    <li><a href="images.php" class=""><i class="icon-home"></i><span>Certificate's </br> Verification</span></a></li>
                    <li class="separator"><div></div><div></div><div></div></li>
					<li><a href="images_search.php" class=""><i class="icon-search"></i><span>Search</span></a></li>
                    <li class="separator"><div></div><div></div><div></div></li>
					<li><a href="report.php" class=""><i class="icon-list"></i><span>Data</span></a></li>

                </ul>
                <!-- End -->
            </div>
            <!-- End -->
            <!-- Page Container -->
            <div id="main">
                <div class="page-title">
                    <div class="menu-switch"><i class="icon-reorder"></i></div>
                    <i class="icon-home"></i>
                    <span>Certificate's Verification</span>
             </div>