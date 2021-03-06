<?php
session_start();

include 'connect.php';
$connect = getDBConnection();

$score = $_POST['score'];

$sql = "INSERT INTO csumb_quiz_scores (username, score) 
        VALUES (:username, :score)";
$data = array(
    ":username" => $_SESSION['username'],
    ":score" => $score
);
$stmt = $connect->prepare($sql);
$stmt->execute($data);

$sql = "SELECT count(1) times, avg(score) average 
        FROM csumb_quiz_scores 
        WHERE username = :username";
$stmt = $connect->prepare($sql);
$stmt->execute(array(":username"=>$_SESSION['username']));
$result = $stmt->fetch(PDO::FETCH_ASSOC);

echo json_encode($result);

?>