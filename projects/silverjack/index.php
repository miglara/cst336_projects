<?php 
$start = microtime(true);
session_start(); //start or resume a session
include 'silverjack.php';
include 'functions.php';

if (!isset($_SESSION['matchCount'])) { //checks whether the session exists
    $_SESSION['matchCount'] = 1;
    $_SESSION['totalElapsedTime'] = 0;
}

function elapsedTime(){
global $start;
     echo "<hr>";
     $elapsedSecs = microtime(true) - $start;
     echo "Matches played:"  . $_SESSION['matchCount'] . "<br />";
     echo "This match elapsed time: " . round($elapsedSecs, 4) . " secs <br /><br/>";

     $_SESSION['totalElapsedTime'] += $elapsedSecs;
     
     echo "Elapsed time in all matches: " .  round($_SESSION['totalElapsedTime'],4) . "<br />";
     
     echo "<span style=color:red> Average time: " . round(( $_SESSION['totalElapsedTime']  / $_SESSION['matchCount']),4);
     
     $_SESSION['matchCount']++;
} //elapsedTime
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Monster Jack </title>
        <link href="https://fonts.googleapis.com/css?family=Creepster" rel="stylesheet">
        <style>
           @import url("css/styles.css");
        </style>
    </head>
    <body>

<h1>MonsterJack</h1>
<div class ="cardTable">
<div class="players">
    <br>
<?php
displayplayers($players);
?>
</div>
<br>
<div class="hands">
<?php 
drawcards($cardArray, $playerScoreArray,$players);
?>    

<?=elapsedTime()?>
<hr>
<footer>
    &copy 2017. Daniel W., Iason M., Kieran B.
</footer>
</div>


</div>



    </body>
</html>