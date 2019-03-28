<?php    
header('Access-Control-Allow-Origin: *');
    include '../dbConnection.php';
    $conn = getDatabaseConnection("midterm");
    $sql = "SELECT feedback, answer
             FROM m_question
             WHERE questionId = " . $_GET[questionId] .
             " AND answer = :answer";
            
    $statement = $conn->prepare($sql);
    $statement->execute(array(":answer"=>$_GET['answer']));
  
    $result = $statement->fetch(PDO::FETCH_ASSOC);
    
    echo json_encode($result);
?>