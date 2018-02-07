<?php
/**
*        THIS HELPS CONNECTING TO DATABASE 
*        AND 
*        IT CONTINUES A SESSION PREVIOUSLY BEING USED        OR       A NEW SESSION 
*         IF 
*		 DOSN'T EXIST ALREADY

**/
$host="localhost";     //SERVER NAME
$username="root";      //DATABASE USERNAME
$password="";          // DATABASE USER PASSWORD
$dbname="managment";   //DATABASE NAME
$connection=mysqli_connect($host,$username,$password,$dbname);

session_start();                       //START A NEW SESSION 

?>
