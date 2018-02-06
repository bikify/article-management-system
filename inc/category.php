<?php
$category =  $_GET['category'] ;
?>
<head> 
<title> <?php echo $category; ?> </title>
</head>
<?php
include"header.php";
require_once"functions.php";
require_once "connect.inc.php";

$category =  $_GET['category'] ;

$sql_get_category = "SELECT * FROM `categroy`";

$result =  mysqli_query($connection,$sql_get_category);

if(mysqli_num_rows($result)) // Category Exist
{
	if(mysqli_num_rows($result) > 0)
	{
		while($row_category=mysqli_fetch_assoc($result))
		{
			if($row_category['categoryName']== $category) //Category Exist
			{
				$categoryId = $row_category['categoryId'];
				$sql_get_Article = "SELECT * FROM `article` where categoryId='$categoryId'";
				
				$result_article = mysqli_query($connection,$sql_get_Article);
				
				if(mysqli_num_rows($result))
				{
					if(mysqli_num_rows($result) > 0)
					{
						while($row = mysqli_fetch_assoc($result_article))
						{
							echo "<h2>".$row['articleName']."</h2>";
							echo "<p>".$row['articleContent']."</p>";
							echo"Published Date :<sub>".$row['publishDate']."</sub><br>";
							echo "Author :".$row['user_name'];
							
							
						}
						
					}
					
				}else{
					alert('No article in this category');
				}
				
				break; //BREAK loop if category FOUND
			}
		}
	}else
	{
		alert("No Category Exist");
	}
}else
{
	alert("No Category Exist");
}

?>