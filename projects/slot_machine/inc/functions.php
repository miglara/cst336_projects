<?php

function play() {

    for ($i=0; $i<3; $i++){
        ${"item" . $i} = rand(0,2);
        showSlotItem(${"item" . $i}, $i); //need to pass position for images
    }

    displayPoints($item0, $item1, $item2);
}

function showSlotItem0($item){
    switch ($item) {
        case 0: echo "<img id='fig0' src='img/seven.png' alt='seven' title='Seven' width='70px' >";
                break;
        case 1: echo "<img id='fig1' src='img/cherry.png' alt='cherry' title='Cherry' width='70px' >";
                break;
        case 2: echo "<img id='fig2' src='img/lemon.png' alt='lemon' title='Lemon' width='70px' >";
                break;
    }
}


function showSlotItem($item, $pos){
    switch ($item) {
        case 0: $figure = "seven";
                break;
        case 1: $figure = "cherry";
                break;
        case 2: $figure = "lemon";
                break;
    }
    
    echo "<img id='fig$pos' src='img/$figure.png' alt='$figure' title='". ucfirst($figure) . "' width='70px' >";

}

function displayPoints($item0, $item1, $item2) {
    
    echo "<div id='output'>";
    if ($item0 == $item1 && $item1 == $item2) {
        switch ($item0) {
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