
<!DOCTYPE HTML>
<html>
<head>
<title>Login | Login to your Account</title>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="/managment/css/bootstrap/css/bootstrap.min.css">
  <script src="/managment/js/jquery.min.js"></script>
  <script src="/managment/css/bootstrap/js/bootstrap.min.js"></script>


</head>


<body>
<?php require_once"header.php"; ?>
<div class="container">
	
	
	<center>
	
	<form action="login.inc.php" method="POST">
	  <div class="input-group">
		  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
		  <input id="user_name" type="text" class="form-control" name="user_name" placeholder="Username" maxlength="33">
		</div>
	 <div class="input-group">
		  <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
		  <input id="password" type="password" class="form-control" name="password" placeholder="Password" maxlength="33">
		</div>
	
	<input type="submit" name="submit" class="btn btn-default" value="Login">
	<br>
	</form>
	
	</center>
	
</div>


</body>


</html>
<?php
require_once'login.php';
require_once'functions.php';
if(isLogin()){
   header('location:profile.php');


}else{

if(isset($_POST['submit'])){

    if(!empty($_POST['user_name']) && !empty($_POST['password'])){
	    
	
	    $user_name = validate($_POST['user_name']);
		$password=md5(validate($_POST['password']));
		
		require_once "connect.inc.php";
		$sql = "select * from mgt_user where user_name='$user_name' and confirm_user_password='$password'";
		
		if($connection->query($sql)){
		      
			  $result = $connection->query($sql);
			  //IF EXACTLY ONE RECORD EXIST
			  if ($result->num_rows == 1 ) {
			          
				while($row = mysqli_fetch_assoc($result)) {	
				
				echo "Your USERNAME ".$row['user_name'];
				echo "<br>YOUR NAME ".$row['first_name']." ".$row['last_name'];
				echo "<br> Email :" .$row['user_email'];
					$_SESSION['user_name'] = $row['user_name'];
					$user_name = $_SESSION['user_name'];
					setcookie('user_name',"$user_name",time() +60 * 60 * 24 * 7,'/' );
					//USER HAVE BEEN LOGGED IN TO SYSTEM
					header("location:profile.php");
				}
			  
			  }else{
				  alert("Problem with USERNAME or Password");
				  
			  }
		}else{
			alert('ERROR---Login');
		}
	}else
	{
		alert("Enter username and Password");
	}

}
}
?>