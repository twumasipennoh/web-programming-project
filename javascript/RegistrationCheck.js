var $ = function(id) {
	return document.getElementById(id);
};

var resetForm = function() {
$("username").value = "";

$("fname").value = "";
$("lname").value = "";

$("fnerror").innerHTML = "*";
$("lnerror").innerHTML = "*";
$("unerror").innerHTML = "*";


};

function validateValues() {

var sub = true;

if ($("username").value === ""){

  $("unerror").innerHTML = "This field is required.";
  sub = false;
}

else{

  $("fnerror").innerHTML = "";

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
$("fnerror").style.color = "red";
$("lnerror").style.color = "red";
$("unerror").style.color = "red";


$("unerror").innerHTML = "*";
$("fnerror").innerHTML = "*";
$("lnerror").innerHTML = "*";
$("resetform").onclick = resetForm;
};
