function checkPassword(){
	var errorMsg = "";
	
	if($("#password1").val() == ""){
		errorMsg += "&nbsp;Required";
		$("#password1_result").html(errorMsg);
		return false;		
	}else{	
		if($("#password1").val().length < 5){	
				errorMsg = "Your password must be at least 5 characters long.";
				$("#password1_result").html(errorMsg);		
				return false;
		}else{
			if($("#password1").val() != $("#password2").val()){
				errorMsg += "Your passwords do not match.";
				$("#password1_result").html(errorMsg);
				return false;
			}else{			
				return true;
			}	
		}
	}		
}
function validate(){
	var hasError = false;
	var errorMsg = "";

	$(".result").html("");
	
	if($("#fname").val() == ""){ $("#fname_result").html("&nbsp;Required"); hasError = true; }
	if($("#lname").val() == ""){ $("#lname_result").html("&nbsp;Required"); hasError = true; }
	if($("#email").val() == ""){ $("#email_result").html("&nbsp;Required"); hasError = true; }	
	
	if(!checkPassword()){ hasError = true; }

	if(hasError){
		return false;
	}else{
		return true;
	}		
	
}