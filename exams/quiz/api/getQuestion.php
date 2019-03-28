<?php    
header('Access-Control-Allow-Origin: *');

    include '../dbConnection.php';
    $conn = getDatabaseConnection("midterm");
    
    $randomId = rand(1,5);
    if (isset($_GET["questionId"])) {
        while($randomId  == $_GET["questionId"] ) {
          $randomId = rand(1,5);
        }
    }
    
    $sql = "SELECT questionText, choice1,choice2, choice3, choice4, questionId, questionImage
             FROM m_question
             WHERE questionId = " . $randomId;
    $statement = $conn->prepare($sql);
    $statement->execute();
  
    $result = $statement->fetch(PDO::FETCH_ASSOC);
    
    echo json_encode($result);
?>