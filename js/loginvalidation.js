//javascript validation on login form
function login_validateform(){
	if(document.myform.email.value==""){
	alert("email must be filled out");
	return false;
	}
	if(document.myform.password.value==""){
	alert("password must be filled out");
	return false;
	}
}