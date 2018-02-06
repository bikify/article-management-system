
function vaildateUserName(){
	
	var userName = document.forms['signup-form']['user_name'].value;
	var user_name_Err = document.getElementById('user-name-Err');
	if(userName==""){
		user_name_Err.innerHTML="USERNAME EMPTY";
		return false;   //   Don't submit form , it needs correction in user name
	}else if(userName.length<5){
		user_name_Err.innerHTML="USERNAME SHOULD BE GRAETER THAN 5 characters , including alphabets and numbers only";
		return false;   //   USERNAME SHOULD BE GRAETER THAN 5 characters , including alphabets and numbers only 
	}else{
		user_name_Err.innerHTML="";
		return true;
	}
	
}

function vaildateFirstName(){
	var firstName = document.forms['signup-form']['first_name'].value;
	var first_name_Err = document.getElementById('first-name-Err');
	if(firstName==""){
		first_name_Err.innerHTML="First Name cannot be EMPTY";
		return false;   //   First Name cannot be EMPTY
	}else if(!/^[a-zA-Z ]*$/.test(firstName))    //Only contain alphabet and whiteSpace
	{
		first_name_Err.innerHTML="Only contain alphabet and whiteSpace";
	}
	else{
		first_name_Err.innerHTML="First Name is valid";
		return true;    //   First Name is valid 
	}
	
}

function vaildateLastName(){
	var lastName = document.forms['signup-form']['last_name'].value;
	var last_name_Err = document.getElementById('last-name-Err');
	if(lastName==""){
		last_name_Err.innerHTML="Last Name cannot be EMPTY";
		return false;   //   Last Name cannot be EMPTY
	}else if(!/^[a-zA-Z ]*$/.test(lastName))
	{
		last_name_Err.innerHTML="Only contain alphabet and whiteSpace";
	}
	else{
		last_name_Err.innerHTML="ok!";
		return true;    //   Last Name is valid , Other than Empty ,,Any Name is valid
	}
	
}


function validateEmail(){
	
	var email = document.forms['signup-form']['email'].value;
	var mail_Err = document.getElementById('mail-err');
	if(email==""){
		mail_Err.innerHTML="Email cannot be EMPTY";
	    return false;   //   Email cannot be EMPTY
	}else if (!((email.indexOf(".") > 0) && (email.indexOf("@") > 0)) || /[^a-zA-Z0-9.@_-]/.test(email)){
		mail_Err.innerHTML="must contain '@' and '.'";
		return false;   //    Email is Invalid ,   
	}else {
		mail_Err.innerHTML="valid";
		return true;    //    Email is Valid , GOOD TO GO   
	}
}
function validatePassword(){
	var userPassword = document.forms['signup-form']['password'].value;
	var userPassword_err = document.getElementById('password-err');
	window.GuserPassword=userPassword;
	if(userPassword==""){
		userPassword_err.innerHTML="Password can't be Empty";
		return false;   //   Password can't be EMPTY
	}else if(userPassword.length<=7){
		userPassword_err.innerHTML="Password should be Greater than 7 number or characters mixed";
		return false;   //   Password should be Greater than 7 number or characters mixed	
	}else {
		userPassword_err.innerHTML="ok";
		return true;    //   GOOD Password , ready to GO
	}
	
}

function validateConfirmPassword(){
	var confirmPassword = document.forms['signup-form']['confirm_password'].value;
	var cnfrm_password_Err = document.getElementById('cnfrm-password-err');
	if(confirmPassword==""){
		cnfrm_password_Err.innerHTML="Passwords Didn't match";
		return false;   //   Password Exist, Field is not Empty
		
	}else if (confirmPassword.length<7){
		cnfrm_password_Err.innerHTML="Passwords Didn't match";
		return false;   //   Password Length dosn't meet criteria
	}else if (confirmPassword.length>=7){
		if(window.GuserPassword==confirmPassword){
			cnfrm_password_Err.innerHTML="Passwords match";
			return true;//   Password match 
			
		}else{  //If length ids greater than 7 , but didn't match
			cnfrm_password_Err.innerHTML="Passwords Didn't match";
			return false;
		}
		
	}else{
		cnfrm_password_Err.innerHTML="Passwords Didn't match";
		return false;  //    Remaining all values are incorrect
	}	
}


function validateUser()
{
	if(vaildateUserName() && vaildateFirstName() && vaildateLastName() && validateEmail())
	{
		return true;
	}else{
		return false;
	}
	
	
}

function validateArticleName(){
	
	var articleName = document.forms['article-form']['article-name'].value;
	
	if(articleName==""){
		return false;
	}else{
		return true;
	}
	
}

function validateArticleContent(){
	
	var articleContent = document.forms['article-form']['article-content'].value;
	
	if(articleContent==""){
		return false;
	}else{
		return true;
	}
}


function vaildateUpdatedEmail(){
	
	var email = document.forms['update-form']['email'].value;
	if(email==""){
	    return false;   //   Email cannot be EMPTY
	}else if (!((email.indexOf(".") > 0) && (email.indexOf("@") > 0)) || /[^a-zA-Z0-9.@_-]/.test(email)){
		return false;   //    Email is Invalid ,   
	}else {
		return true;    //    Email is Valid , GOOD TO GO   
	}
}

function validate(){
	if(vaildateUserName() && vaildateFirstName() && vaildateLastName() && validatePassword() && validateConfirmPassword()){
		return true;    //   FORM is ready to be Submitted By user, By checking client side , validation
	}else{
		return false;
	}
	
}

function validateArticle(){
	
	if(validateArticleName() && validateArticleContent()){
		return true;         //GOOD TO GO, articleName and articleContent have valid values	
	}else{
		alert("Article Name or Content missing");
		return false;        //articleName,articleContent could not be EMPTY , it msut contain a non-empty values
	}
	
	
}

function validateCategory(){
	var categoryName = document.forms['category-form']['category-name'].value;
	if(categoryName==""){
		return false;             // Categoery name must Exist
	}else if((categoryName.length>0) && /^[a-zA-Z ]*$/.test(categoryName) ) //name field only contains letters and whitespace
	{
		
		return true;
		
	}else{
		return false;
	}
}

function validateSearch()
{
	var search = document.forms['search-form']['search'].value;
	if(search=="")
	{
		return false;
	}else
	{
		return true;
	}
}