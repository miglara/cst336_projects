<?php
header("Access-Control-Allow-Origin: *");
//File used by the "Promo Codes" challenge/practice activity.
//with this proxy, users can keep using the "https" protocol even though the AJAX calls use "http"
    
    $url = "https://myspace.csumb.edu/~milara/ajax/promo/promoCode.php?promoCode=" . $_GET['promoCode'];
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); //allows connecting to https
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec ($ch);
    curl_close ($ch);
    echo $result;
?>
