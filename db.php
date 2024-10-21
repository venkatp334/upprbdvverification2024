<?php


 

  
    
 $username = "timingroot";
$password = "T!ming#123";
$hostname = "10.10.10.10";  
$db = "upprb_registration_sports";   

// $username = "root";
// $password = "";
// $hostname = "localhost";  
// $db = "upprb_written_2022";  
 
  //connection to the database
$con = @mysqli_connect($hostname, $username, $password,$db,'3306') 
 or die("Unable to connect to MySQL");


?>