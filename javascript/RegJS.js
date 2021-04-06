var $ = function(id) {
	return document.getElementById(id);
};

var resetForm = function() {
	
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



	