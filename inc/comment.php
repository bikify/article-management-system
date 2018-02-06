<?php
        //USER IS LOGGED INTO SYSTEM
		require_once"connect.inc.php";           //CONNECTS TO DATABASE
		$sql="SELECT * FROM mgt_comment where articleId='$articleId'";        //articleId form allPublishedArticle
		$result_query=mysqli_query($connection,$sql);
		if(mysqli_num_rows($result_query))
		{          // IF A QUERY HAS ROWS MORE THAN 0. AS 0 MEANS FALSE AND ANY NUMBER OTHER THAN 0, MEANS TRUE
			if(mysqli_num_rows($result_query)>0)
			{
				while($row= mysqli_fetch_assoc($result_query))
				{
					$user_name=$row['user_name'];
					$sql_get_user_profile_picture="SELECT * FROM `mgt_user` where user_name='$user_name'";
					$result_query_pic=mysqli_query($connection,$sql_get_user_profile_picture);
					while($row_picture= mysqli_fetch_assoc($result_query_pic))
					{
						$image = $row_picture['profile_picture'];
						echo"<img src='$image' class='img-circle' width='35px' height='40px'>";
					}	
					echo "<mark>".$row['user_name']."</mark>";
					echo' said <br>';
					echo $row['commentContent'];
					echo'<br>';
					echo $row['publishedDate'];
					echo'<br>';
					
					//ADD MORE COMMENT INFORMATION HERE
					//LIKE USER'S IMAGE OR ANYTHING ELSE	
				}
			    echo'<hr />';
			}else
			{
				echo'<br> <br>No Comment ';
				//NO COMMENT IN RECORD FROM DATABASE
			}	
		}else
		{	
			 //NO COMMENT IN RECORD FROM DATABASE	
			echo'<br><br>No Comment ';
		}
  
    
?>