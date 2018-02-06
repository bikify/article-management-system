<?php include "login-header.php"; ?>


<div class="container-right">
<?php

	require_once"connect.inc.php";
	$user_name=$_SESSION['user_name'];
	$sql="SELECT COUNT(articleId) as total,categoryName FROM article a JOIN categroy c on a.categoryId=c.categoryId WHERE a.user_name='$user_name' GROUP by categoryName";
	$result = mysqli_query($connection, $sql);
	echo'<table class="table table-striped" ><tr><th>Category</th> <th>Articles Published  </th></tr>';
	if (mysqli_num_rows($result) >0) 
	{
		while($row = mysqli_fetch_assoc($result)) 
		{
			echo'<tr>';
				echo '<td>'.$row['categoryName'].'</td>';
				echo '<td>'.$row['total'].'</td>';
			echo'</tr>';
			
		}
	}else{
		echo'<tr>';
		echo '<td> N/A </td>';
		echo '<td> 0 </td>';
		echo'</tr>';
	}
	echo'</table>';

?>
</div>