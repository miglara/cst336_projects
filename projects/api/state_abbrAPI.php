<?php
header("Access-Control-Allow-Origin: *");

//File used by the "sign up" lab.
//with this proxy, users can get the list of all states with their two-letter abbreviation
   
    $url = "https://wikipedia.com";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); //allows connecting to https
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec ($ch);
    curl_close ($ch);
    echo $result;

?>
