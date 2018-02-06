<?php
function validate($value){
    
	$value = trim($value);
	$value = htmlentities($value);
	$value = htmlspecialchars($value);
	$value = stripslashes($value);
	return $value;

}
function alert($value){
	
	echo"<script>alert('$value');</script>";

}
function upload_fle($uploaded_file_source,$destination){
	
	if(move_uploaded_file($uploaded_file_source,$destination))
	{
				
	}else
	{
		alert("ERROR uploading File");
	}
	
}

?>