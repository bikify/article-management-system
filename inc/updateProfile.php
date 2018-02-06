

<title> Update Profile </title>
<script src="../js/mgt.js" ></script>

<?php include "login-header.php"; ?>
<div class="container-right">

<form action="<?php echo $_SERVER['SCRIPT_NAME']; ?>" method="POST" onsubmit="return vaildateUpdatedEmail()" id="update-form">
<div class="form-group">
<label>Email</label>
<input type="email" name="email" class="form-control" id="email" maxlength="60" onkeyup="vaildateUpdatedEmail()" required>
<input type="submit" name="update" class="btn btn-primary">
</div>
</form>
<?php
require_once'functions.php';
require_once"login.php";
if(isLogin())
{
	
	if(isset($_POST['update']))
	{
		if(!empty($_POST['email']))
		{
			require_once "connect.inc.php";
			$email = $_POST['email'];
			$user_name = $_SESSION['user_name'];
			$sql = "UPDATE mgt_user set user_email='$email' where user_name='$user_name'";
			if (mysqli_query($connection, $sql)) 
			{
				header("location:profile.php");
				
			}else
			{
				echo'ERROR UPDATING EMAIL,EMAIL ALREADY EXISTS CHOOSE ANOTHER';
			}
		}
	}
}else
{
	header("location:login.inc.php");
}
?>
</div>