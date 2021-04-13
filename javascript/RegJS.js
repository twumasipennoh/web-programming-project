var $ = function(id) {
	return document.getElementById(id);
};

var resetForm = function() {
$("eID").value = "";
$("em").value = "";
$("un").value = "";
$("pw").value = "";
$("pw2").value = "";
$("fname").value = "";
$("lname").value = "";
$("ph").value = "";
$("st1").value = "";
$("st2").value = "";
$("city").value = "";
$("state").value = "";
$("zip").value = "";
$("iderror").innerHTML = "*";
$("emailerror").innerHTML = "*";
$("unerror").innerHTML = "*";
$("pwerror").innerHTML = "*";
$("pw2error").innerHTML = "*";
$("fnerror").innerHTML = "*";
$("lnerror").innerHTML = "*";
	
	
};

var validateValues = function() {
	var id = $("eID").value;
	var pass = $("pw").value;
	var pass2 = $("pw2").value;
	var paswd = /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{7,15}$/;
	var emailVal = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
	var email = $("em").value;

	if ($("eID").value === ""){
		
		$("iderror").innerHTML = "This field is required.";
		
	}
	else{
		
		$("iderror").innerHTML = "";
		
	}
	
	if ($("un").value === ""){
		
		$("unerror").innerHTML = "This field is required.";
		
	}
	else{
		
		$("unerror").innerHTML = "";
		
	}
	
	if ($("fname").value === ""){
		
		$("fnerror").innerHTML = "This field is required.";
		
	}

	else{
		
		$("fnerror").innerHTML = "";
		
	}
	if ($("lname").value === ""){
		
		$("lnerror").innerHTML = "This field is required.";
		
	}

	else{
		
		$("lnerror").innerHTML = "";
		
	}
	
	
	if (emailVal.test(email)) {
		
		$("emerror").innerHTML = "";
		
	}
	else {
		
		$("emailerror").innerHTML = "Please enter a valid e-mail address."
		
	}

	if (pass !== pass2) {
		
		$("pw2error").innerHTML = "Both passwords must match";
		
	}
	else {
		
		$("pw2error").innerHTML = "";
		
		
	}

	if (paswd.test(pass)) {

		$("pwerror").innerHTML = "";
		
	}
	else {
		
		$("pwerror").innerHTML = "Password must be between 7 to 15 characters and contain at least one special character and one numerical digit.";
		
	}


};

window.onload = function() {
$("iderror").style.color = "red";
$("emailerror").style.color = "red";
$("unerror").style.color = "red";
$("pwerror").style.color = "red";
$("pw2error").style.color = "red";
$("fnerror").style.color = "red";
$("lnerror").style.color = "red";

$("iderror").innerHTML = "*";
$("emailerror").innerHTML = "*";
$("unerror").innerHTML = "*";
$("pwerror").innerHTML = "*";
$("pw2error").innerHTML = "*";
$("fnerror").innerHTML = "*";
$("lnerror").innerHTML = "*";
$("submit").onclick = validateValues;
$("resetform").onclick = resetForm;
};



	