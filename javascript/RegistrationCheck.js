var $ = function(id) {
	return document.getElementById(id);
};

var resetForm = function() {
$("eID").value = "";
$("username").value = "";

$("fname").value = "";
$("lname").value = "";

$("iderror").innerHTML = "*";
$("fnerror").innerHTML = "*";
$("lnerror").innerHTML = "*";
$("unerror").innerHTML = "*";


};

function validateValues() {

var sub = true;

if ($("eID").value === ""){

  $("iderror").innerHTML = " This field is required.";
  sub = false;
}

else{

  $("iderror").innerHTML = "";

}

if ($("username").value === ""){

  $("unerror").innerHTML = " This field is required.";
  sub = false;
}

else{

  $("unerror").innerHTML = "";

}

if ($("fname").value === ""){

  $("fnerror").innerHTML = " This field is required.";
  sub = false;
}

else{

  $("fnerror").innerHTML = "";

}
if ($("lname").value === ""){

  $("lnerror").innerHTML = " This field is required.";
  sub = false;
}

else{

  $("lnerror").innerHTML = "";

}

return sub;

};

window.onload = function() {
$("fnerror").style.color = "red";
$("lnerror").style.color = "red";
$("unerror").style.color = "red";
$("iderror").style.color = "red";

$("iderror").innerHTML = "*";
$("unerror").innerHTML = "*";
$("fnerror").innerHTML = "*";
$("lnerror").innerHTML = "*";
$("resetform").onclick = resetForm;
};
