
<head>
<title> Articles Published By Me </title>
<style>
.right{
	 text-align: justify;
}
</style>
</head>
<?php include "login-header.php"; ?>
<div class="right">
<div class="container-right">
<?php

require_once"login.php";


if(isLogin())
{
	//SHOWS ARTICLE WHICH USER HAVE PUBLISHED
	require_once"connect.inc.php";
	require_once"logout.php";
	$user_name=$_SESSION['user_name'];
	$sql="SELECT * FROM `article` where user_name='$user_name'";
	$result = mysqli_query($connection, $sql);
	echo'<table class="table table-striped" ><tr><th>Article No</th> <th>Title</th> <th> Category </th> <th> Delete Article </th></tr>';
	if (mysqli_num_rows($result) >0) 
	{
		$numberOfArticlesDisplayed=0;
		
		while($row = mysqli_fetch_assoc($result)) 
		{		
	         //ONLY DISPLAY 4 ARTICLES 
            if($numberOfArticlesDisplayed<=4)
			{
				echo'<tr>';
				echo '<td>'.$row['articleId'].'</td>';
			    echo '<td><a href="article.php?articleId=' . $row['articleId'] . '">'.$row['articleName'].'</a></td>';
				$categoryId = $row['categoryId'];
				$sql_get_categoryName ="SELECT categoryName FROM categroy WHERE categoryId ='$categoryId'";
				$result_category = mysqli_query($connection, $sql_get_categoryName);
				while($row_category = mysqli_fetch_assoc($result_category)) 
				{
					echo '<td>'.$row_category['categoryName'].'</td>';
				}
				
				echo '<td>';
				require "deleteArticle.php";
                echo'</td></tr>';
				$numberOfArticlesDisplayed++;				
			}else
			{
				echo '<a style="border:2px solid black;" href="article.php?articleId=' . $row['articleId'] . '">'.$row['articleId'].'</a>';
			}
			
		}
		
	}else{
		echo'<tr>';
		echo '<td> N/A </td>';
		echo '<td> N/A </td>';
		echo '<td> N/A </td>';
		echo '<td> N/A </td>';
		echo'</tr>';
		echo'You have not Published any article,';
		echo'<a href="createArticle.php">Publishe One</a>';
		
	}	
		echo'</table>';
}else
	{
	header("location:login.inc.php");
}

?>
</div>
</div>