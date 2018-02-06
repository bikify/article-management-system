
<?php
require_once 'login.php';
require_once'functions.php';
if(isLogin())
{
	//If a user is login already then send him to profile
	header("location:profile.php");
}else if(!isLogin())
{
	include("header.php");
	if(isset($_POST['submit']))
	{
		if(!empty($_POST['user_name']) && !empty($_POST['first_name']) && !empty($_POST['last_name']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['confirm_password']) && !empty($_FILES['profile-picture']['name']))
		{
			//If all fields have valid values 
			$user_name = validate($_POST['user_name']);
			$first_name = validate($_POST['first_name']);
			$last_name = validate($_POST['last_name']);
			$email = validate($_POST['email']);
			$password = md5(validate($_POST['password']));
			$confirm_password = md5(validate($_POST['confirm_password']));
			
			$uploaded_file_source = $_FILES['profile-picture']['tmp_name'];
			$uploaded_file_name = $_FILES['profile-picture']['name']; 
			$destination = "../img/".$uploaded_file_name;
			
			
			
			/*COMAPRE PASSWORDS IF DOSN"T MATCH , give a prompt and do not connect to database [MAY BE IMPLEMENT ,LATER]
			*/
            if($password==$confirm_password)
			{
								//connecting to database to check availability of user_name 
				if(require_once "connect.inc.php")
				{
					$sql="SELECT * FROM `mgt_user";
					$result = mysqli_query($connection, $sql);
					$count = 0;
					if ($result->num_rows > 0)         // CHECK IF A USERNAME IS AVAILABLE OR NOT, IF DATABASE HAVE ANY RECORD
					{   			
						$record=mysqli_num_rows($result);
						while($row = mysqli_fetch_assoc($result)) 
						{
							if ($user_name==$row['user_name'])
							{
								  // NOT-Available
								echo'<script>document.getElementById("u").innerHTML = "Not Available!";</script>'; 
																					 // DISPLAY TO USER , A USERNAME IS NOT-Available
								break;                                              // BREAK LOOP IF USERNAME JS ALREADY TAKEN
								
							}else
							{
								//Checking
								$count++;                                               //COUNT NUMBER OF TIMES LOOP ITERATES, AND COMAPRE it with total number of records, when  becomes equal it mean that username not found, and available  
							}
						}
																					  // user WHICH , username entered dosn't exist ALREADY and HE/SHE has been granted that user name
						if($count==$record)
						{
							alert("Available user_name");
							echo'<script>document.getElementById("u").innerHTML = "available!";</script>';        // USER HAS BEEN GIVEN HIS REQUIRED USERNAME
							$sql="insert into mgt_user (user_name,first_name,last_name,user_email,confirm_user_password,profile_picture) values('$user_name','$first_name','$last_name','$email','$confirm_password','$destination')";
							if (mysqli_query($connection, $sql)) 
							{
								
								upload_fle($uploaded_file_source,$destination);       // UPLOAD FILE ,If USER ADDED
								                                //USER ADDED
							
							}else
							{
								alert("ERROR CREATING ACCOUNT, TRY A BIT LATER");     //ERROR Creating account, TRY A BIT LATER
							}
							
																					  //LOGIN USER AFTER SIGNUP
																					 //Login ON SESSION VARIABLE
								$_SESSION['user_name']=$user_name;
																					  // END OF LOGIN PROCESS
							
																					 //AFTER LOGIN 
							header("location:profile.php");
						}
						
					} else 
					{
																					  //NO RECORD EXIST AND USERNAME is Available
						$sql="insert into mgt_user (user_name,first_name,last_name,user_email,confirm_user_password) values('$user_name','$first_name','$last_name','$email','$confirm_password')";
							if (mysqli_query($connection, $sql)) 
							{
								upload_fle($uploaded_file_source,$destination);       // UPLOAD FILE ,If USER ADDED
								
							
							}else{
								
								alert("ERROR CREATING ACCOUNT, TRY A BIT LATER");     //ERROR Creating account, TRY A BIT LATER
								
							}
																					  //LOGIN USER AFTER SIGNUP
								$_SESSION['user_name']=$user_name;
								setcookie('user_name',"$user_name",time() +60 * 60 * 24 * 7,'/' );
							
																					  // END OF LOGIN PROCESS
							
																					  //AFTER LOGIN
							header("location:profile.php");
						
					}                                                                 // USER ADDED AND LOGGED IN SUCCESSFULLY
				}else
				{
					die("Error on".__DIR__ ."".__FILE__ ."".__LINE__);
				}
					
			}else{
				alert("Passwords Didn't match");
			} 
		   
	   }ELSE{
		   alert("ALL FIELDS ARE REQUIRED");                             
	   }
  }
}

?>

<!DOCTYPE HTML>
<html>

<head>
                   <!-- Title for page  -->
<title>Signup | create an account</title>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../css/bootstrap/css/bootstrap.min.css">
<script src="../js/jquery.min.js"></script>
<script src="../css/bootstrap/js/bootstrap.min.js"></script>
<script src="../js/mgtMain.js" ></script>
</head>

<body>


                   <!-- FORM SIGNUP STARTS HERE -->
<div class="container">
<div class="row">
<div class="col-sm-8">
	<form action="signup.inc.php" id="signup-form" method="POST" enctype="multipart/form-data" onsubmit="return validateUser()" >
    <div class="form-group">
	<label>User Name</label>
	<input type="text" name="user_name" id="user_name" maxlength="33" class="form-control" placeholder="Enter Username" required autofocus="autofocus" autocomplete="off" onkeyup="vaildateUserName()">
	<span class="label label-danger" id="user-name-Err"></span>
	</div>
        <div class="form-group">	
		<label>First Name</label>
		<input type="text" name="first_name" id="first_name" maxlength="33" class="form-control" placeholder="Enter First Name" required autocomplete="off" onkeyup="vaildateFirstName()">
        <span class="label label-danger" id="first-name-Err"></span>
		</div>
	<div class="form-group">	
	<label>Last Name</label>
	<input type="text" name="last_name" id="last_name" maxlength="33" class="form-control" placeholder="Enter Last Name" required autocomplete="off" onkeyup="vaildateLastName()">
    <span class="label label-danger" id="last-name-Err"></span>
	</div>
	    <div class="form-group">
		<label>Email</label>
		<input type="email" name="email" id="email" maxlength="60" class="form-control" placeholder="Enter Email" required autocomplete="off" onkeyup="validateEmail()">
		<span class="label label-danger" id="mail-err"></span>
		</div>
	<div class="form-group">		
	<label>Password </label>
	<input type="password" name="password" id="password" maxlength="33" class="form-control" placeholder="Enter Password" required autocomplete="off" onkeyup="validatePassword()">
    <span class="label label-danger" id="password-err"></span>
	</div>
	    <div class="form-group">
		<label>Confirm Password</label>
		<input type="password" name="confirm_password" id="confirm_password" maxlength="33" class="form-control" placeholder="Confirm Password" required autocomplete="off" onkeyup="validateConfirmPassword()">
		<span class="label label-danger" id="cnfrm-password-err"></span>
		</div>
	<div class="form-group">	
	<label> Choose Profile Picture </label>
	<input type="file" name="profile-picture" accept="image/*" required "> <!-- write php code for image -->
    </div>
	<input type="submit" name="submit" class="btn btn-default" value="Signup" >
	</form>
	</div>
</div>	
       </div>            <!-- SIGNUP FORM ENDS HERE -->
</body>


</html>