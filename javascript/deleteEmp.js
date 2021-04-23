var $ = function(id) {
	return document.getElementById(id);
};

var resetForm = function() {
$("eID").value = "";

$("username").value = "";

$("fname").value = "";
$("lname").value = "";

$("fnerror").innerHTML = "*";
$("lnerror").innerHTML = "*";


};

function validateValues() {
var id = $("eID").value;
var sub = true;

if ($("eID").value === ""){

  $("iderror").innerHTML = "This field is required.";
  sub = false;
}
else{

  $("iderror").innerHTML = "";

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

return sub;

};

window.onload = function() {
$("iderror").style.color = "red";
$("fnerror").style.color = "red";
$("lnerror").style.color = "red";



$("iderror").innerHTML = "*";
$("fnerror").innerHTML = "*";
$("lnerror").innerHTML = "*";
$("resetform").onclick = resetForm;
};
