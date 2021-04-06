"use strict";

var days = ["sun_", "mon_", "tues_", "wed_", "thur_", "fri_", "sat_"];
var times = ["in", "lunch", "lunch_in", "out", "total"];

var $ = function(id){
  return document.getElementById(id);
};

var loadTimesheet = function(){
  // Load stuff from database to timesheet when page is loaded
}

var calcTotal = function(){

  
  var in = $("sun_in").value;
  var lunch = $("sun_lunch").value;
  var lunchIn = $("sun_lunch_in").value;
  var out = $("sun_out").value;
  var total = $("sun_total").value;
}

window.onload = function(){
  $("save_button").onclick = ;
};
