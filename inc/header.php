<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="/managment/css/bootstrap/css/bootstrap.min.css">
  <script src="/managment/js/jquery.min.js"></script>
  <script src="/managment/css/bootstrap/js/bootstrap.min.js"></script>
  <script src="../js/mgtMain.js" ></script>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php">Article Managment</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="index.php">Home</a></li>
      <li><a href="category.php?category=Programming">Programming </a></li>
      <li><a href="category.php?category=urdu">Urdu</a></li>
      <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="GET" class="navbar-form navbar-left" id="search-form" onsubmit="return validateSearch()" >
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Search" name="search">
        <div class="input-group-btn">
          <button class="btn btn-default" type="submit" name="submit-search">
            <i class="glyphicon glyphicon-search"></i>
          </button>
        </div>
      </div>
    </form>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="signup.inc.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
      <li><a href="login.inc.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    </ul>
  </div>
</nav>
  


</body>


</html>

<?php
require_once "connect.inc.php";
if(isset($_GET['submit-search'])){
	if(!empty($_GET['search']))
	{
		$search_data = $_GET['search'];
		$search_database  = "select * from article where articleName like'%$search_data%' or articleContent like'%$search_data%'";
		$result = mysqli_query($connection, $search_database);
		
	if (mysqli_num_rows($result) >0) 
	{
		$numberOfArticlesDisplayed=0;
		$articleFound=mysqli_num_rows($result);
		echo"<h2>$articleFound Article Found</h2>";
		echo'<table class="table table-striped" ><tr><th>Article No</th> <th>Title</th> <th> Category </th></tr>';
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
				$numberOfArticlesDisplayed++;				
			}else
			{
				echo '<a style="border:2px solid black;" href="article.php?articleId=' . $row['articleId'] . '">'.$row['articleId'].'</a>';
			}
			
		}
		echo'</table>';
	}else{
		echo'<h2>No Article Found</h2>';
	}
	}
}


?>