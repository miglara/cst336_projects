<?php
session_start();

include 'connect.php';
$connect = getDBConnection();

$score = $_POST['score'];
$date =  date("Y-m-d H:i:s");

$sql = "INSERT INTO scores (username, score, submissionDate) VALUES (:username, :score, :submissionDate)";
$stmt = $connect->prepare($sql);

$data = array(
    ":username" => $_SESSION['username'],
    ":score" => $score,
    ":submissionDate" => $date
);

$stmt->execute($data);
echo "<h1>Results</h1>";
echo "Your score has been submitted.";

$sql = "SELECT * FROM scores WHERE username = :username";
$stmt = $connect->prepare($sql);
$stmt->execute(array(":username"=>$_SESSION['username']));

$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo "<br />You've taken this quiz ".count($result)." time(s).";

$sql = "SELECT AVG(score) as avg FROM scores WHERE username = :username";
$stmt = $connect->prepare($sql);
$stmt->execute(array(":username"=>$_SESSION['username']));

$result = $stmt->fetch(PDO::FETCH_ASSOC);
echo "<br />Your average score was ".$result['avg']." .";
?>