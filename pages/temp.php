<?php
  $sunday = date('Y-m-d', strtotime('last sunday'));
  $monday = date('Y-m-d', strtotime($sunday. '+1 day'));
  $tuesday = date('Y-m-d', strtotime($sunday. '+2 days'));
  $wednesday = date('Y-m-d', strtotime($sunday. '+3 days'));
  $thursday = date('Y-m-d', strtotime($sunday. '+4 days'));
  $friday = date('Y-m-d', strtotime($sunday. '+5 days'));
  $saturday = date('Y-m-d', strtotime('saturday this week'));

  echo $sunday. "<br>";
  echo $monday. "<br>";
  echo $tuesday. "<br>";
  echo $wednesday. "<br>";
  echo $thursday. "<br>";
  echo $friday. "<br>";
  echo $saturday. "<br>";


?>
