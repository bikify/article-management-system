<head>
<style>
img{
	width:120px;
	height:150px;
	
	
}
</style>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../css/bootstrap/css/bootstrap.min.css">
<script src="../js/jquery.min.js"></script>
<script src="../css/bootstrap/js/bootstrap.min.js"></script>
</head>

<?php
require_once"login.php";
if(isLogin()){
	include"login-header.php";
	
}

?>
<?php
require_once"login.php";
require_once"functions.php";
require_once"connect.inc.php";


	$id = mysqli_real_escape_string($connection,validate(($_GET['id'])));
    if(isset($id))
	{
		$sql = "SELECT * FROM `mgt_user` where user_name='$id'";
		$result = mysqli_query($connection,$sql);
		if(mysqli_num_rows($result))
		{
			if(mysqli_num_rows($result)==1){
				
				while($row = mysqli_fetch_assoc($result))
				{
					
					$image = $row['profile_picture'];
					echo"<img src='$image' class='img-circle'>";
					echo "<p>USERNAME : ".$row['user_name']."</p>";
					echo "<p>NAME : ".$row['first_name']." ".$row['last_name']."</p>";
					echo "<title>".$row['first_name']." ".$row['last_name']."</title>";
					echo "<p>Email : " .$row['user_email']."</p><br>";
				}
			}
		}else
		{
			//article Dosn't Exist
			header("location:404.php");
		}
    }



?>

