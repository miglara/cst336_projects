<?php
header("Access-Control-Allow-Origin: *");

//File used by the "sign up" lab.
//with this proxy, users can get the list of all states with their two-letter abbreviation

    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); //allows connecting to https
    $url = "https://itcdland.csumb.edu/~milara/ajax/states.php";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec ($ch);
    curl_close ($ch);
    echo $result;

?>
