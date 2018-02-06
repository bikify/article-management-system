<?php
/**
*        THIS HELPS CONNECTING TO DATABASE 
*        AND 
*        IT CONTINUES A SESSION PREVIOUSLY BEING USED        OR       A NEW SESSION 
*         IF 
*		 DOSN'T EXIST ALREADY

**/
$host="localhost";
$username="root";
$password="";
$dbname="managment";
$connection=mysqli_connect($host,$username,$password,$dbname);

session_start();                       //START A NEW SESSION 

?>