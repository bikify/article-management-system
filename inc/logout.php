
<form action="logout.php" method="POST" >
<input type="submit" name="submit" value="logout">
</form>


<?php
    //session_start();
    require_once'functions.php';
    require_once'connect.inc.php';
	if(isset($_POST['submit']))
	{                                                //Logout a user by UN-SETTING  SESSION VARIABLES
		$user_name = $_SESSION['user_name'];                                       //To USE USER NAME TO DESTROY COOKIE , IN NEXT LINE
		setcookie('user_name',"$user_name",time() - 60 * 60 * 24 *7,'/' );        //SETTING Cookie['user_name'] in past to DESTROY it
		unset($_SESSION['user_name']);                                           //DESTROYING SESSION VARIABLE NAMELY USER_NAME EXCLUSIVELY , IT MIGHT NOT CONTAIN ANY VALUE
		/*DESTROY SESSION  
		 AFTRE Logout
		 
		AND REDEIRECTS TO LOGIN PAGE
		 
		*/
		session_unset();                                                           //UN-SETTING SESSION  
		 if(session_destroy())
		{                                                      
			session_write_close();
			header('location:login.inc.php');                                     //REDEIRECTING TO LOGIN PAGE AFTRE LOGOUT	 
		}
		else
		{ 
			   alert("EROOR UNSETTING SESSION"); 	 
		}
	}else
	{
	     echo'';
	 
	}
	 

?>