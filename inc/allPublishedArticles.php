<head>
<title> Articles Published By Me </title>
<style>
*{
	    text-align: justify;
}
</style>
</head>
<?php
require_once"connect.inc.php";
require_once"login.php";
$sql="SELECT * FROM `article`";
$result = mysqli_query($connection, $sql);
		if (mysqli_num_rows($result) >0) {
			while($row = mysqli_fetch_assoc($result)) {
				echo "<h2>".$row['articleName']."</h2>";
				$text=$row['articleContent'];
				echo "<p>".nl2br($text)."</p>";
				echo"Published Date :<sub>".$row['publishDate']."</sub><br>";
				echo "Author :".$row['user_name'];
				$articleId=$row['articleId'];
				require"comment.inc.php";
				include"comment.php";
			}
		}else{
			echo'<h2>No Articles</h2>';
		}
?>
