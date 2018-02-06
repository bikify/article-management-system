<?php

require_once "connect.inc.php";        //HELP CONNECTING TO DATABASE
require_once "functions.php";

function isLogin(){     

               // HELPS CHECKING IF A USER IS LOGIN OR NOT
	//session_start();
	if(isset($_SESSION['user_name']) || isset($_COOKIE['user_name']) ){
		//alert('here');
		//alert($_SESSION['user_name']);
		if(isset($_COOKIE['user_name'])){   //Login with help of cookie
			$_SESSION['user_name'] = $_COOKIE['user_name'];
			
		}
			return true;
	}
	else{
		return false;
	}
	
}
?>