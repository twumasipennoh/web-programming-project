"use strict";

var $ = function(id){
    return document.getElementById(id);
};

var validateResetPasswordForm = function(){
    if($("username/email").value == null ||$("username/email").value ==""){
        $("unerror").innerHTML = " Please enter a username or email address";
        return false;
    } else {
        $("unerror").innerHTML = "";
    }
};