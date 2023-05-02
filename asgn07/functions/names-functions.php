<?php

function load_full_names($fileName) {
  $lineNumber = 0;

  // Load up the array
  $FH = fopen("$fileName", "r");
  $nextName = fgets($FH);
  
  while(!feof($FH)) {
    if($lineNumber % 2 == 0) {
      $fullNames[] = trim(substr($nextName, 0, strpos($nextName, " --")));
    }
  
    $lineNumber++;
    $nextName = fgets($FH);
  }
  return $fullNames;
}

function load_first_names($fullNames) {
  foreach($fullNames as $fullName) {
    $startHere = strpos($fullName, ",") + 1;
    $firstNames[] = trim(substr($fullName, $startHere));
  }
  return $firstNames;
}

function  load_last_names($fullNames) {
  foreach ($fullNames as $fullName) {
    $stopHere = strpos($fullName, ",");
    $lastNames[] = substr($fullName, 0, $stopHere);
  }
  return $lastNames;
}

function load_valid_names($fullNames, $firstNames, $lastNames) {
  for($i = 0; $i < sizeof($fullNames); $i++) {
    if(ctype_alpha(str_replace("'", "", $lastNames[$i].$firstNames[$i]))) {
      $validFirstNames[$i] = $firstNames[$i];
      $validLastNames[$i] = $lastNames[$i];
      $validFullNames[$i] = $validLastNames[$i] . ", " . $validFirstNames[$i];
    }
  }
  return $validFullNames;
}

function load_valid_last_names($fullNames, $firstNames, $lastNames) {
  for($i = 0; $i < sizeof($fullNames); $i++) {
    if(ctype_alpha(str_replace("'", "", $lastNames[$i].$firstNames[$i]))) {
      $validLastNames[$i] = $lastNames[$i];
    }
  }
  return $validLastNames;
}

function load_valid_first_names($fullNames, $firstNames, $lastNames) {
  for($i = 0; $i < sizeof($fullNames); $i++) {
    if(ctype_alpha(str_replace("'", "", $lastNames[$i].$firstNames[$i]))) {
      $validFirstNames[$i] = $firstNames[$i];
    }
  }
  return $validFirstNames;
}

function most_common_last_name($fullNames, $firstNames, $lastNames) {
  for($i = 0; $i < sizeof($fullNames); $i++) {
    if(ctype_alpha(str_replace("'", "", $lastNames[$i].$firstNames[$i]))) {
      $validLastNames[$i] = $lastNames[$i];
    }
    $repeatedNames = array_count_values($validLastNames);
    arsort($repeatedNames);
    $mostCommonLastName = array_keys($repeatedNames);
  }
  return $mostCommonLastName;
}

function most_common_first_name($fullNames, $firstNames, $lastNames) {

  for($i = 0; $i < sizeof($fullNames); $i++) {
    if(ctype_alpha(str_replace("'", "", $lastNames[$i].$firstNames[$i]))) {
      $validFirstNames[$i] = $firstNames[$i];
    }
  }
  $repeatedNames = array_count_values($validFirstNames);
   arsort($repeatedNames);
  $mostCommonFirstName = array_keys($repeatedNames);
  return $mostCommonFirstName;
}
