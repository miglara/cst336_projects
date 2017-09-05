<?php

function getDBConnection() {
    $dbHost = getenv("IP");
    $dbPort = 3306;
    $dbName = "csumb_quiz";
    $dbUsername = getenv("C9_USER");
    $dbPassword = "";
    
    // Connect to database
    $dbConn = @new PDO("mysql:host=$dbHost;dbname=$dbName; port=$dbPort", $dbUsername, $dbPassword); 
    // @ <- prevents error messages from being displayed, which could potentially display private data
    
    return $dbConn;
}