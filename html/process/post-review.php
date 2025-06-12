<?php

session_start();
$is_admin = $_SESSION["admin"] ?? false;
$is_logged_in = isset($_SESSION["user"]);


if (!$is_logged_in) {
    die("You must be logged in for this.");
}

if ($_SERVER['REQUEST_METHOD'] === "POST") {

    $score = $_POST["score"];
    $content = $_POST["content"];
    $travel_id = $_POST["travel_id"];

    if
    (
        !preg_match("/^[1-5]$/", $score) ||
        !preg_match("/^[\p{L}\p{N}\p{P}\p{S}\p{Z}]{1,140}$/u", $content) ||
        !preg_match("/^[0-9]{1,}$/", $travel_id)
    )
    {
        exit;
    }
    else
    {
        require_once 'db.php';

        $db = new db();
        $pdo = $db->get_connection();

        $stmt = $pdo->prepare("INSERT INTO recensies (user_id, content, score, reis_id) VALUES (:user_id, :content, :score, :reis_id)");
        $stmt->execute(["user_id" => $_SESSION["id"], "content" => $content, "score" => $score, "reis_id" => $travel_id]);
    }
    header("location: /reizen-details.php?id=$travel_id");
}