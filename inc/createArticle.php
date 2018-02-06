<?php

require_once"connect.inc.php";
$_SESSION['articleName'] = "";
$_SESSION['articleContent'] = "";
?>

<title>Create New Article</title>

<?php include "login-header.php"; ?>
<script src="../js/mgt.js" ></script>


<body>
<div class="container-right">
<form action="createArticle.php" id="article-form" method="POST" onsubmit="return validateArticle()" >
<div class="form-group">
<label>Article Name</label>
<input type="text" name="article-name" id="article-name" maxlength="200"  value="<?php echo $_SESSION['articleName']; ?> " class="form-control">
</div>

<div class="form-group">
<label > SELECT Category <label>
<select name="category" class="form-control">

<?php
$sql = "SELECT * FROM `categroy`";
$result = mysqli_query($connection,$sql);
if(mysqli_num_rows($result))
{
	if(mysqli_num_rows($result)>0)
	{
		while($row = mysqli_fetch_assoc($result))
		{
			$category = $row['categoryName'];
			$categoryId = $row['categoryId'];
			echo"<option value='$categoryId' >".$category."</option>";
		}
	}else{
		header("location:createCategory.php");
	}
}else{
	header("location:createCategory.php");
}

?>


</select>
</div>
<div class="form-group">
<label>Content</label>
<textarea id="article-content" name="article-content" value="<?php echo $_SESSION['articleContent']; ?>" wrap="hard" class="form-control" rows="19"></textarea>
</div>
<input type="submit" name="createArticle" value="Publish" class="btn btn-primary btn-block">

</form>

</div>
</body>

</html>
<?php
require_once"functions.php";
require_once"login.php";
if(!isLogin())
{
	header("location:login.inc.php");
}
else{
if(isset($_POST['createArticle']))
{
    //BOTH ARTICLENAME AND CONTENT EXIST
    if(!empty($_POST['article-name']) && !empty($_POST['article-content']))
	{
	    $articleName = mysqli_real_escape_string($connection,validate($_POST['article-name']));
		$articleContent = mysqli_real_escape_string($connection,validate($_POST['article-content']));
		$categoryId = $_POST['category'];
		$date = date("D:M:Y h:i:s");
		$user_name = $_SESSION['user_name'];
			$_SESSION['articleName'] = $articleName;
			$_SESSION['articleContent'] = $articleContent;
			
			$sql = "insert into article (articleName,articleContent,publishDate,categoryId,user_name) values ('$articleName','$articleContent','$date','$categoryId','$user_name')";
			if (mysqli_query($connection, $sql)) 
			{
				//article published , SUCCESSFULLy
				header("location:publishedArticle.php");
			}else
			{
				//here is an error , PUBLISHING ERROR
				echo mysqli_error($connection);
			    alert("ERROR PUBLISHING, TRY A BIT LATER");
			}
			
		
		
        		
	}else
	{
	    alert("Article name or content missing");
	}

}
}
?>