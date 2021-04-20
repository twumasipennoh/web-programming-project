"use strict";

var $ = function(id){
    return document.getElementById(id);
};

var validateChangePasswordForm = function(){
    var paswd = /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{7,15}$/;
    var new_password = $("new_password").value;
    var passed = true;

    $("new_password_error").innerHTML = "";
    $("confirm_password_error").innerHTML = "";
    $("security_ans1_error").innerHTML = "";
    $("security_ans2_error").innerHTML = "";

    if($("security_ans1").value == null || $("security_ans1").value ==""){
        $("security_ans1_error").innerHTML = " Please enter an answer for the security question above.";
        passed = false;
    } 
    if($("security_ans2").value == null || $("security_ans2").value ==""){
        $("security_ans2_error").innerHTML = " Please enter an answer for the security question above.";
        passed = false;
    }
    if($("new_password").value != $("confirm_password").value){
        $("new_password_error").innerHTML = " Passwords do not match."
        passed = false;
    } else {
        if($("new_password").value == null || $("new_password").value ==""){
            $("new_password_error").innerHTML = " Please provide a new password.";
            passed = false;
        }
        if (!paswd.test(new_password)) {
            $("new_password_error").innerHTML = " Password must be between 7 to 15 characters and contain at least one special character and one numerical digit.";
            passed = false;
        }
    }
    
    return passed;
};