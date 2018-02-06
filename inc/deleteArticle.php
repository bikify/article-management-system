<form action="<?php echo $_SERVER['SCRIPT_NAME']; ?>" method="POST">
<input type="hidden" value="<?php echo $row['articleId'] ?>" name="articleId">
<button  class="btn btn-danger" value="<?php echo $row['articleId'];?>" name="delete-article" ><span class="glyphicon glyphicon-remove"></span>Delete</button>
</form>

<?php
require_once "functions.php";
require_once"login.php";

if(isset($_POST['delete-article']))
{
	if(isLogin())
	{    
        $articleId = $_POST['articleId'];
		
		//Delete COMMENT first to delete-article
		$sql_delete_comment = "DELETE FROM `mgt_comment` WHERE articleId='$articleId'";
		if(mysqli_query($connection,$sql_delete_comment)){
			$sql_delete_article = "DELETE FROM `article` WHERE articleId='$articleId'";
			if(mysqli_query($connection,$sql_delete_article)){                        //If COMMENT SUCCESSFULLY DELETED then DELETE Article
				unset($_POST['delete-article']);
				header("location:publishedArticle.php");
				//Article SUCCESSFULL DELETED
			}else{
				//Article was NOT DELETED
				unset($_POST['delete-article']);
				alert("1.Something went wrong,Article was not Deleted");
			}
			
		}else{
			//COMMENT was not DELETED
			unset($_POST['delete-article']);
			alert("2.Something went wrong,Article was not Deleted");
		}
        		
	}else
	{
		alert("You Must Login First");  
	}



}
?>