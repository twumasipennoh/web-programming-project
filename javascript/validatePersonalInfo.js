"use strict";

var $ = function(id) {
	return document.getElementById(id);
};

function validatePersonalInfo() {
	var currentPassword = $("current-pw").value;
	var pass = $("pw").value;
	var pass2 = $("pw2").value;
	var paswd = /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{7,15}$/;
	var emailVal = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
	var email = $("email").value;
	var sub = true;
	
	if ($("username").value == ""){
		$("unerror").innerHTML = " This field is required.";
		sub = false;
	} 
	else{
		$("unerror").innerHTML = "";
	}

	if (email != "" && emailVal.test(email)) {
		$("emailerror").innerHTML = "";
	}
	else {
		$("emailerror").innerHTML = " Please enter a valid e-mail address.";
		sub = false;
	}

	if($("st1").value == ""){
		$("streeterror").innerHTML = " This field is required.";
		sub = false;
	} 
	else {
		$("streeterror").innerHTML = "";
	}

	if($("city").value == ""){
		$("cityerror").innerHTML = " This field is required.";
		sub = false;
	} 
	else {
		$("cityerror").innerHTML = "";
	}

	if($("state").value == ""){
		$("stateerror").innerHTML = " This field is required.";
		sub = false;
	} 
	else {
		$("stateerror").innerHTML = "";
	}

	if($("zip").value == ""){
		$("zipCodeerror").innerHTML = " This field is required.";
		sub = false;
	} 
	else {
		$("zipCodeerror").innerHTML = "";
	}

	if(currentPassword != ""){
		if (pass !== pass2) {
			$("pw2error").innerHTML = " Both passwords must match";
			sub = false;
		}
		else {
			$("pw2error").innerHTML = "";
		}

		if (paswd.test(pass)) {
			$("pwerror").innerHTML = "";	
		}
		else {	
			$("pwerror").innerHTML = " Password must be between 7 to 15 characters and contain at least one special character and one numerical digit.";
			sub = false;
		}
	}

	return sub;
};

window.onload = function() {
	$("emailerror").style.color = "red";
	$("unerror").style.color = "red";
	$("pwerror").style.color = "red";
	$("pw2error").style.color = "red";
	$("streeterror").style.color = "red";
	$("cityerror").style.color = "red";
	$("stateerror").style.color = "red";
	$("zipCodeerror").style.color = "red";
};



	