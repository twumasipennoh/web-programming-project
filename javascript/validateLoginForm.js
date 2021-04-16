"use strict";

var $ = function(id){
    return document.getElementById(id);
};

var validateLoginForm = function(){
    if($("username").value == null ||$("username").value ==""){
        $("unerror").innerHTML = " Username can't be blank.";
        $("pwerror").innerHTML = "";
        return false;
    } else if($("pw").value.length < 7){
        $("unerror").innerHTML = "";
        $("pwerror").innerHTML = " Password must be at least between 7 to 15 characters.";
        return false;
    }
};