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
	
	
}

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
$("resetform").onclick = resetForm;
};



	