<?php 
require_once('db.php');

$db = new db();
$destination = $_GET["destination"] ?? '';
   header(header: "location: /reizen.php?search=" . $destination);

?>