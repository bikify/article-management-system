<!DOCTYPE HTML>

<html lang="en">
<head>
<meta charset="UTF-8"></meta>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../css/bootstrap/css/bootstrap.min.css">
<script src="../js/jquery.min.js"></script>
<script src="../css/bootstrap/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="../css/design.css">
</head>

<body>
<div class="container-left">



<?php
require_once 'login.php';
if(isLogin()){
	
$user_name=$_SESSION['user_name'];
$sql="SELECT * FROM `mgt_user` where user_name='$user_name'";

$result = mysqli_query($connection, $sql);
		if (mysqli_num_rows($result) ==1) {
			while($row = mysqli_fetch_assoc($result)) {
				
				
				$image = $row['profile_picture'];
				echo"<center><img src='$image' class='img-circle' width='120px' height='150px'></center>";
				echo"<p style='border-bottom:2px solid white;margin-bottom:25px;'></p>";
				echo "<p>USERNAME : ".$row['user_name']."</p>";
				echo "<p>NAME : ".$row['first_name']." ".$row['last_name']."</p>";
				echo "<p style='margin-bottom:4px;border-bottom:2px solid white'>Email : " .$row['user_email']."</p><br>";
				require_once"logout.php";
				echo"<p style='border-bottom:2px solid white;margin-bottom:25px;'></p>";
			}
		
		}
}else{
	
	header("location:login.inc.php");
}

//CRAETE A NEW ARTICLE
if(isset($_POST['create-article'])){
    header("location:createArticle.php");

}
//VIEW PUBLISHED ARTICLE 
if(isset($_POST['published-article'])){
	unset($_POST['published-article']);
	header("location:publishedArticle.php");
}

//IF USER WANT TO UPDATE CONTACT
if(isset($_POST['update-contact'])){
	unset($_POST['update-contact']);
	header("location:updateProfile.php");
}
//CRAETE A NEW Category
if(isset($_POST['create-category'])){
	unset($_POST['create-category']);
	header("location:createCategory.php");
	
}


if(isset($_POST['view-category'])){
	unset($_POST['view-category']);
	header("location:viewCategory.php");
	
}
?>

<form action="<?php echo $_SERVER['SCRIPT_NAME'] ?>" method="POST">
<input type="submit" name="create-article"  value="Create Article">
</form>

<form action="<?php echo $_SERVER['SCRIPT_NAME'] ?>" method="POST">
<input type="submit" name="published-article" value="View Published">
</form>

<form action="<?php echo $_SERVER['SCRIPT_NAME'] ?>" method="POST">
<input type="submit" value="Update Contact" name="update-contact">
</form>

<form action="<?php echo $_SERVER['SCRIPT_NAME'] ?>" method="POST">
<input type="submit" value="Create Category" name="create-category">
</form>

<form action="<?php echo $_SERVER['SCRIPT_NAME'] ?>" method="POST">
<input type="submit" value="View Category" name="view-category">
</form>

</div>



</body>

</html>


