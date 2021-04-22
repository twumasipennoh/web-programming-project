var $ = function(id) {
	return document.getElementById(id);
};

var resetForm = function() {
$("eID").value = "";

$("username").value = "";

$("fname").value = "";
$("lname").value = "";

$("emailerror").innerHTML = "*";
$("unerror").innerHTML = "*";
$("fnerror").innerHTML = "*";
$("lnerror").innerHTML = "*";
$("jterror").innerHTML="*";

};

	function validateValues() {
	var id = $("eID").value;

	var emailVal = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
	var email = $("email").value;
	var sub = true;

	if ($("eID").value === ""){

		$("iderror").innerHTML = "This field is required.";
		sub = false;
	}
	else{

		$("iderror").innerHTML = "";

	}
	if ($("username").value === ""){

		$("unerror").innerHTML = "This field is required.";
		sub = false;
	}
	else{

		$("unerror").innerHTML = "";

	}

	if ($("fname").value === ""){

		$("fnerror").innerHTML = "This field is required.";
		sub = false;
	}

	else{

		$("fnerror").innerHTML = "";

	}

	if ($("lname").value === ""){

		$("lnerror").innerHTML = "This field is required.";
		sub = false;
	}

	else{

		$("lnerror").innerHTML = "";

	}

  if ($("jobTitle").value === ""){

    $("jterror").innerHTML = "This field is required.";
    sub = false;
  }

  else{

    $("jterror").innerHTML = "";

  }





	if (emailVal.test(email)) {

		$("emerror").innerHTML = "";

	}
	else {

		$("emailerror").innerHTML = "Please enter a valid e-mail address.";
		sub = false;
	}

	return sub;

};

window.onload = function() {
$("iderror").style.color = "red";
$("emailerror").style.color = "red";
$("unerror").style.color = "red";
$("fnerror").style.color = "red";
$("lnerror").style.color = "red";
$("jterror").style.color= "red";


$("iderror").innerHTML = "*";
$("emailerror").innerHTML = "*";
$("unerror").innerHTML = "*";
$("fnerror").innerHTML = "*";
$("lnerror").innerHTML = "*";
$("jterror").innerHTML = "*";
$("resetform").onclick = resetForm;
};
