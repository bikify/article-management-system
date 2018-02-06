<div class="container">
<form action="<?php echo $_SERVER['SCRIPT_NAME']; ?>" method="POST">
<input type="hidden" value="<?php echo $row['articleId'] ?>" name="articleId">
<div class="form-group">
<label for="comment">Comment:</label>
<textarea name="comment-content" required  class="form-control" rows="5"></textarea>
 </div>
<button value="<?php echo $row['articleId'];?>" name="comment" class="btn btn-default" >Comment</button>

</form>
 </div>
 
<?php
require_once "functions.php";
require_once"login.php";
if(isset($_POST['comment']))
{
	if(!isLogin()){                                           // IF A USER IS NOT LOGIN THEN SEND HIM TO LOGIN FIRST
		unset($_POST['comment']);                            // UNSET COMMENT VARIABLE OF FORM , SO THAT LOOP IN #ALLPUBLISHEDARTICLE# SOLUDN'T ADD COMMENT 
												            //IN DATABASE , BECAUSE IF A VARIABLE IS SET , IT REMAINS SET ,UNTIL WE ITSELF DOSN'T UNSET IT
		alert("You Must Login First");              
		
	}else
	{
		if(!empty($_POST['comment-content'])  )
		{                                                      //IF USER HAVE A VALID COMMENT ,NOT EMPTY , THEN ADD IT DATABASE
			$commentContent = mysqli_real_escape_string($connection,$_POST['comment-content']);
			$user_name = $_SESSION['user_name'];             //[USER_NAME] FORM SESSION, SESSION STARTED IN #ALLPUBLISHEDARTICLE#
			$publishedDate = date("D:M:Y h:i:s",time());           //RETREIVING CURRENT DATE AND TIME
			$articleId = $_POST['articleId'];              //[ARTICLEID] FROM FORM
			$sql = "insert into mgt_comment (commentContent,user_name,publishedDate,articleId) values('$commentContent','$user_name','$publishedDate','$articleId')";
				if(mysqli_query($connection,$sql))
				{
					//alert("Commented");
					unset($_POST['comment']);
					$_POST['comment-content']=null;
					
				}else
				{
					alert(mysqli_error($connection));
				}	
		}else
		{
				alert("Enter a comment First");
		}
	}
}
?>