<?php
date_default_timezone_set('Europe/London'); // sets the default timezone

$dateNow = date("d-m-Y H:i:s"); // gets the current date as a string
echo 'the date in London is '. $dateNow.'<br>';

$dateNowObject = new DateTime($dateNow); // converts date string into a php date object
$dateAmerica = $dateNowObject->setTimeZone(new DateTimeZone('America/Chicago')); // sets the date object to a specific timezone

echo 'the date in Chicago is '. $dateAmerica->format('Y-m-d H:i:s').'<br>'; // echoing the date in a specific format

?>