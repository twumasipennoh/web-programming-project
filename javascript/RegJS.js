var $ = function(id) {
	return document.getElementById(id);
};

var resetForm = function() {
$("eID").value = "";
$("email").value = "";
//$("username").value = "";
$("pw").value = "";
$("pw2").value = "";
// $("fname").value = "";
// $("lname").value = "";
$("ph").value = "";
$("st1").value = "";
$("st2").value = "";
$("city").value = "";
$("state").value = "";
$("zip").value = "";
$("security-q1-answer").value = "";
$("security-q2-answer").value = "";
$("iderror").innerHTML = "*";
$("emailerror").innerHTML = "*";
$("unerror").innerHTML = "*";
$("pwerror").innerHTML = "*";
$("pw2error").innerHTML = "*";
// $("fnerror").innerHTML = "*";
// $("lnerror").innerHTML = "*";
$("sec-q1-error").innerHTML = "*";
$("sec-q2-error").innerHTML = "*";
};

	function validateValues() {
	var id = $("eID").value;
	var pass = $("pw").value;
	var pass2 = $("pw2").value;
	var paswd = /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{7,15}$/;
	var emailVal = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
	var email = $("email").value;
	var sub = true;
	if ($("eID").value == ""){

		$("iderror").innerHTML = " This field is required.";
		sub = false;
	}
	else{

		$("iderror").innerHTML = "";

	}
	// if ($("username").value === ""){
	
	// 	$("unerror").innerHTML = " This field is required.";
	// 	sub = false;
	// }
	// else{
	
	// 	$("unerror").innerHTML = "";
	
	// }
	// if ($("fname").value === ""){
	//
	// 	$("fnerror").innerHTML = "This field is required.";
	// 	sub = false;
	// }
	//
	// else{
	//
	// 	$("fnerror").innerHTML = "";
	//
	// }
	// if ($("lname").value === ""){
	//
	// 	$("lnerror").innerHTML = "This field is required.";
	// 	sub = false;
	// }
	//
	// else{
	//
	// 	$("lnerror").innerHTML = "";
	//
	// }


	if (emailVal.test(email)) {

		$("emailerror").innerHTML = "";

	}
	else {

		$("emailerror").innerHTML = " Please enter a valid e-mail address.";
		sub = false;
	}

	if (pass != pass2) {
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

	if ($("security-q1-answer").value == ""){
		$("sec-q1-error").innerHTML = " This field is required.";
		sub = false;
	}
	else{
		$("sec-q1-error").innerHTML = "";
	}

	if ($("security-q2-answer").value == ""){
		$("sec-q2-error").innerHTML = " This field is required.";
		sub = false;
	}
	else{
		$("sec-q2-error").innerHTML = "";
	}

	// if ($("pwerror").innerHTML === "" && $("emerror").innerHTML === "" && $("lnerror").innerHTML === "" && $("fnerror").innerHTML === "" && $("unerror").innerHTML === "" && $("iderror").innerHTML === "") {

	// 		sub = true;

	// }

	return sub;

};

window.onload = function() {
$("iderror").style.color = "red";
$("emailerror").style.color = "red";
//$("unerror").style.color = "red";
$("pwerror").style.color = "red";
$("pw2error").style.color = "red";
// $("fnerror").style.color = "red";
// $("lnerror").style.color = "red";
$("sec-q1-error").style.color = "red";
$("sec-q2-error").style.color = "red";

$("iderror").innerHTML = "*";
$("emailerror").innerHTML = "*";
//$("unerror").innerHTML = "*";
$("pwerror").innerHTML = "*";
$("pw2error").innerHTML = "*";
// $("fnerror").innerHTML = "*";
// $("lnerror").innerHTML = "*";
$("sec-q1-error").innerHTML = "*";
$("sec-q2-error").innerHTML = "*";
$("resetform").onclick = resetForm;
};
