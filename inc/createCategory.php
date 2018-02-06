<?php

require_once"connect.inc.php";
$_SESSION['categoryName'] = "";
include "login-header.php";
?>

<title>Create New Category</title>
<style>
*{
	color:black;
}
</style>
<script src="../js/mgt.js" ></script>


<div class="container-right">

<form action="createCategory.php" id="category-form" method="POST" onsubmit="return validateCategory()" >

<div class="form-group">
  <label>Category Name</label>
  <input type="text" name="category-name" id="category-name" class="form-control" maxlength="150" size="50" value="<?php echo $_SESSION['categoryName']; ?>">
	<input type="submit" name="submit" value="Create Category" class="btn btn-primary">
</div>




</form>
<?php
require_once"functions.php";
require_once"login.php";
if(!isLogin())
{
	header("location:login.inc.php");
}
else{
if(isset($_POST['submit']))
{
    //BOTH ARTICLENAME AND CONTENT EXIST
    if(!empty($_POST['category-name']))
	{
		$categoryName = mysqli_real_escape_string($connection,validate($_POST['category-name']));
		$user_name = $_SESSION['user_name'];
			$_SESSION['categoryName'] = $categoryName;
			
			//CHECK IF Category ALREADY EXIST
			
			     $CATEGORY_EXIST_ALREADY = false;
			     $sql_IS_EXIST_CATEGORY = "SELECT * FROM `categroy` WHERE categoryName='$categoryName'";
				 $result = mysqli_query($connection,$sql_IS_EXIST_CATEGORY);
				 
				 if(mysqli_num_rows($result))
				 {
					 if(mysqli_num_rows($result)==1)
					 {
						$CATEGORY_EXIST_ALREADY = true; 
					 }
				 }
			
			/////////////////////////////////
			
			
			//CATEGORY DOSN"T EXIST AND CRAETE A NEW
			if(!$CATEGORY_EXIST_ALREADY)
			{
				// Check for Categeroy spelling , i have knowingly used wrong spelling for table name
				$sql = "insert into categroy (categoryName,user_name) values ('$categoryName','$user_name')";
			
				if (mysqli_query($connection, $sql)) 
				{
					//category added , SUCCESSFULLy
					header("location:profile.php");
				}else
				{
					//here is an error , Category can't be added
					echo mysqli_error($connection);
					alert("ERROR Creating Category, TRY A BIT LATER");
				}
			}else
			{
				alert("CATEGORY EXIST, ALREADY");
			}		
	}else
	{
	    alert("Enter CATEGORY Name Please");
	}

}
}
?>
</div>