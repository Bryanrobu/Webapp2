
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $leave = $_POST["datum-vertrek"];
    $return = $_POST["datum-terugkomst"];
    echo $leave;
}