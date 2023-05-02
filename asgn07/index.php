<?php
include 'functions/utility-functions.php';
include 'functions/names-functions.php';
$fileName = 'names-short-list.txt';
$fullNames = load_full_names($fileName);
$firstNames = load_first_names($fullNames);
$lastNames = load_last_names($fullNames);
$validFullNames = load_valid_names($fullNames, $firstNames, $lastNames);
$validLastNames = load_valid_last_names($fullNames, $firstNames, $lastNames);
$validFirstNames = load_valid_first_names($fullNames, $firstNames, $lastNames);
$mostCommonLastName = most_common_last_name($fullNames, $firstNames, $lastNames);
$mostCommonFirstName = most_common_first_name($fullNames, $firstNames, $lastNames);
// ~~~~~~~~~~~~ Display results ~~~~~~~~~~~~ //

echo '<h1>Names - Results</h1>';

echo '<h2>All Names</h2>';
echo "<p>There are " . sizeof($fullNames) . " total names</p>";
echo '<ul style="list-style-type:none">';    
    foreach($fullNames as $fullName) {
      echo "<li>$fullName</li>";
    }
echo "</ul>";

echo '<h2>All Valid Names</h2>';
echo "<p>There are " . sizeof($validFullNames) . " valid names</p>";
echo '<ul style="list-style-type:none">';    
    foreach($validFullNames as $validFullName) {
        echo "<li>$validFullName</li>";
    }
echo "</ul>";

echo '<h2>Unique Names</h2>';
$uniqueValidNames = (array_unique($validFullNames));
echo ("<p>There are " . sizeof($uniqueValidNames) . " Unique names</p>");
echo '<ul style="list-style-type:none">';    
    foreach($uniqueValidNames as $uniqueValidNames) {
      echo "<li>$uniqueValidNames</li>";
    }

echo '<h2>Unique Last Names</h2>';
$uniqueValidLastNames = (array_unique($validLastNames));
echo "<p>There are " . sizeof($uniqueValidLastNames) . " unique last names</p>";
echo '<ul style="list-style-type:none">';    
    foreach($uniqueValidLastNames as $uniqueValidLastNames) {
      echo "<li>$uniqueValidLastNames</li>";
    }
echo "</ul>";

echo '<h2>Unique First Names</h2>';
$uniqueValidFirstNames = (array_unique($validFirstNames));
echo "<p>There are " . sizeof($uniqueValidFirstNames) . " unique first names</p>";
echo '<ul style="list-style-type:none">';    
    foreach($uniqueValidFirstNames as $uniqueValidFirstNames) {
      echo "<li>$uniqueValidFirstNames</li>";
    }
echo "</ul>";

echo '<h2>Most Common Last Names</h2>';
echo "<p>The most common last name is " . $mostCommonLastName[0] . "</p>";

echo '<h2>Most Common First Names</h2>';
echo "<p>The most common first name is " . $mostCommonFirstName[0] . "</p>";

?>
