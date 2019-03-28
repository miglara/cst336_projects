<?php    
header('Access-Control-Allow-Origin: *');

    include '../dbConnection.php';
    $conn = getDatabaseConnection("midterm");
    
    $questionId = $_GET['questionId'];
    
    $sql = "SELECT *
             FROM m_hint
             WHERE questionId = " . $questionId;
    $statement = $conn->prepare($sql);
    $statement->execute();
  
    $result = $statement->fetch(PDO::FETCH_ASSOC);
    
    echo json_encode($result);
?>