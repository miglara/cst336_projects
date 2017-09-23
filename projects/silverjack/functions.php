<?php
    
    include 'silverjack.php';
    
    function drawcards($cardArray, &$playerScoreArray, &$players)
    {
        $scores = array();
        foreach ($playerScoreArray as $name => $score) //go through all players
        {
            while($score < 37) //check if the current player's score is not already above 42
            {
                $key = array_rand($cardArray); //pick a random card
                // if($score + $cardArray[$key] < 42) //check if this random card's score would make the player's score higher than 42
                // { //if no then continue
                    echo "<img src= \"" . $key . "\" /> "; //print card
                    $score = $score +  $cardArray[$key]; //update score
                    unset($cardArray[$key]); //remove card from the array
            //     }
            //     else //if yes, end current player
            //         break;
            }//while
            echo $score; //current player's total score
            array_push($scores, $score); //array of scores
            echo "</br>";
            echo "</br>";
        }
        
        displaywinner($scores,$players); //call second function

    }

    
    function displaywinner($playerScoreArray, &$players)
    {
        // echo "<br />players scores:";
        // print_r($playerScoreArray);
        // echo "<br />players:";
        // print_r($players);
        
        $allPlayersPoints = array_sum($playerScoreArray); //all players' scores, including those over 42 points

        //deletes scores that exceed 42
        for ($i=0; $i < 4; $i++) {
         if ($playerScoreArray[$i] > 42) {
                unset($playerScoreArray[$i]);
            }
        }
        
        $winners = array_keys($playerScoreArray, max($playerScoreArray)); 
        $points_won = $allPlayersPoints - (max($playerScoreArray) * count($winners));
        
        // echo "<br /><br /> winner keys:";
        // print_r($winners);
        echo "<hr>Winner(s): <br />";
        foreach ($winners as $winner) {
            echo $players[$winner][1] . "<br />";
        }
        
        echo "<hr> Points Earned: " . $points_won;        
    }
    
    //function displays player images
    function displayplayer($playerImageArray)
    {
        $random_keys=array_rand($playerImageArray,4);
        echo "<img src= \"" . $playerImageArray[$random_keys[0]] . "\" /><br>";
        echo "<img src= \"" . $playerImageArray[$random_keys[1]] . "\" /><br>";
        echo "<img src= \"" . $playerImageArray[$random_keys[2]] . "\" /><br>";
        echo "<img src= \"" . $playerImageArray[$random_keys[3]] . "\" />";
    }
    
    function displayplayers(&$players)
    {
       
        shuffle($players);
        echo "<img src= \"" . $players[0][0] . "\" /><br>";
        echo " ". $players[0][1]. "<br> <br>";
        echo "<img src= \"" . $players[1][0] . "\" /><br>";
        echo " ". $players[1][1]. "<br><br>";       
        echo "<img src= \"" . $players[2][0] . "\" /><br>";
        echo " ". $players[2][1]. "<br><br>";       
        echo "<img src= \"" . $players[3][0] . "\" /><br>";
        echo " ". $players[3][1]. "<br><br>";
        
    }
    //drawcards($cardArray, $playerScoreArray); //call first function
    //displayplayer($playerImageArray); //call displayplayer function
?>