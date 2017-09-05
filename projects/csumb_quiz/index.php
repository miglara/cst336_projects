<?php
session_start();
function verifySession(){
    if(isset($_SESSION['username'])){
        include 'quiz.php';
    } else {
        header("Location: login.php");
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>CSUMB Online Quiz</title>
        
        <link href="css/styles.css" rel="stylesheet" type="text/css" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="js/gradeQuiz.js"></script>
    </head>
    
    <body>
        <!--Display user and logout button-->
        <div class="user-menu">
            <?php echo "Welcome ".$_SESSION['username']."! ";?> 
            <input type="button" value="Logout" onclick='window.location.href="logout.php"'/>    
        </div>
        
        <!--Display Quiz Content-->
        <div class="content-wrapper">
            <h1>Quiz</h1>
            <?=verifySession()?>
        </div>
    </body>
</html>