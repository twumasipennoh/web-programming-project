"use strict";

// var times = ["in", "lunch", "lunch_in", "out", "total"];
var $ = function(id){
  return document.getElementById(id);
};

var days = ["sun_", "mon_", "tues_", "wed_", "thur_", "fri_", "sat_"];
var months = ["Jan.", "Feb.", "Mar.", "Apr.", "May", "June", "July", "Aug.", "Sept.", "Oct.", "Nov.", "Dec."];
var totalHours;


// ************************************************************************************************
// Timesheet Function
var loadTimesheet = function(){
  // Load stuff from database to timesheet when page is loaded
  var sun = $("startDate").innerHTML;
  var curr = new Date();
  var week = [];

  for (let i = 0; i < 7; i++){
    let sunday = curr.getDate() - curr.getDay() + i;
    let day = new Date(curr.setDate(sunday)).toISOString().slice(0,10);
    week.push(day);
  }

  let splitDate = week[0].split("-");
  $("week").innerHTML = "Week of " + months[parseInt(splitDate[1])] + " " + splitDate[2];
  // $("week").innerHTML = "Week of " + week[0];

  for (let i = 0; i < days.length; i++){
    splitDate = week[i].split("-");
    $(days[i] + "date").innerHTML = months[parseInt(splitDate[1])] + " " + splitDate[2];
  }
}

// ************************************************************************************************
// calcDayTotal Function
var calcDayTotal = function(){
  totalHours = "0:0";
  for (let i = 0; i < days.length; i++){
    var timeIn = $(days[i] + "in").value;
    var lunch = $(days[i] + "lunch").value;
    var lunchIn = $(days[i] + "lunch_in").value;
    var out = $(days[i] + "out").value;

    var hours;
    var mins;
    var splitIn = timeIn.split(":");
    var splitLunch = lunch.split(":");
    var splitLunchIn = lunchIn.split(":");
    var splitOut = out.split(":");

    hours = (parseInt(splitOut[0]) - parseInt(splitIn[0])) - (parseInt(splitLunchIn[0]) - parseInt(splitLunch[0]));
    mins = (parseInt(splitOut[1]) - parseInt(splitIn[1])) - (parseInt(splitLunchIn[1]) - parseInt(splitLunch[1]));

    if (mins < 0){
      hours =  hours - Math.ceil(Math.abs(mins) / 60);
      mins =  60 - (Math.abs(mins) % 60);
    }

    var total = hours + ":" + mins.toLocaleString('en-US', {minimumIntegerDigits: 2, useGrouping:false});
    if (!isNaN(hours) || !isNaN(mins)){
      $(days[i] + "total").value = total;
      addHours(total);
    } else {
      $(days[i] + "total").innerHTML = "N/A";
    }
  }

  $("total_hours").innerHTML = "Total Hours: " + totalHours;
}


// ************************************************************************************************
// addHours Function
var addHours = function(hours){
  var splitTotal = totalHours.split(":");
  var splitNew = hours.split(":");
  var h;
  var m;
  h = parseInt(splitTotal[0]) + parseInt(splitNew[0]);
  m = parseInt(splitTotal[1]) + parseInt(splitNew[1]);
  h = h + Math.floor(m / 60);
  m = m % 60;
  totalHours = h + ":" + m.toLocaleString('en-US', {minimumIntegerDigits: 2, useGrouping:false});
}

// ************************************************************************************************
// Onload function
window.onload = function(){
  loadTimesheet();
  $("save_button").onclick = function(){
    calcDayTotal();
  };
};
