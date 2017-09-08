<?php

function play() {
    
    /*$reel1Val = rand(0,2);
    showSlotItem($reel1Val, $i); 
    $reel2Val = rand(0,2);
    $reel3Val = rand(0,2);*/
    
      //Optionally, above three lines could be implemented in a for loop like the one below,
     for ($i=1; $i<4; $i++){
//        ${"reel" . $i . "Val"} = rand(0,2);
      //  showSlotItem(${"reel" . $i . "Val"}, $i); //need to pass position for images
      ${"reel" . $i . "Val"} = showSlotItem($i); //need to pass position for images

    }

    displayPoints($reel1Val, $reel2Val, $reel3Val);
}

/*function showSlotItem0($reelVal){
    switch ($reelVal) {
        case 0: echo "<img id='reel1' src='img/seven.png' alt='seven' title='Seven' width='70px' >";
                break;
        case 1: echo "<img id='fig1' src='img/cherry.png' alt='cherry' title='Cherry' width='70px' >";
                break;
        case 2: echo "<img id='fig2' src='img/lemon.png' alt='lemon' title='Lemon' width='70px' >";
                break;
    }
}*/


//function showSlotItem($reelVal, $pos){
function showSlotItem($pos){
    $reelVal = rand(0,2);
    switch ($reelVal) {
        case 0: $symbol = "seven";
                break;
        case 1: $symbol = "cherry";
                break;
        case 2: $symbol = "lemon";
                break;
    }
    
    echo "<img id='reel$pos' src='img/$symbol.png' alt='$symbol' title='". ucfirst($symbol) . "' width='70px' >";
    return $reelVal;
}

function displayPoints($reel1Val, $reel2Val, $reel3Val) {
    
    echo "<div id='output'>";
    if ($reel1Val == $reel2Val && $reel2Val == $reel3Val) {
        switch ($reel1Val) {
            case 0: $totalPoints = 1000;
                    echo "<h1>Jackpot!</h1>";
                    break;
            case 1: $totalPoints = 500;
                    break;
            case 2: $totalPoints = 250;
                    break;
        }
        
        echo "<h2>You won $totalPoints points!</h2>";
    } else {
        echo "<h3> Try Again! </h3>";
    }
    echo "</div>";

}


?>