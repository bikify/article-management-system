<head>
<style>
.right{
	    text-align: justify;
}
</style>
</head>
<?php
require_once"login.php";
if(isLogin()){
	include"login-header.php";
	
}else{
	require_once'header.php';
}

?>
<div class="right">
<div class="container-right">
<?php
require_once"login.php";
require_once"functions.php";
require_once"connect.inc.php";


	$articleId = mysqli_real_escape_string($connection,validate(($_GET['articleId'])));
    if(isset($articleId))
	{
		$sql = "SELECT * FROM `article` where articleId='$articleId'";
		$result = mysqli_query($connection,$sql);
		if(mysqli_num_rows($result))
		{
			if(mysqli_num_rows($result)==1){
				
				while($row = mysqli_fetch_assoc($result)){
					echo "<h2>".$row['articleName']."</h2>";
					$text=$row['articleContent'];
				        echo "<p>".nl2br($text)."</p>";
				}
			}
		}else
		{
			//article Dosn't Exist
			header("location:publishedArticle.php");
		}
    }



?>
</div>
</div>

