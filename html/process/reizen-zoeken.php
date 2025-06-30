<?php 
require_once('db.php');

$db = new db();
$destination = $_GET["destination"] ?? ''; // Get the destination from the query parameters, default to an empty string if not set
   header(header: "location: /reizen.php?search=" . $destination);

?>