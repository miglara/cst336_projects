<?php
header("Access-Control-Allow-Origin: *");

//File used by the "sign up" lab.
//with this proxy, users can keep using the "https" protocol even though the AJAX calls use "http"

    /* proxy.php */
    $parameters ="?";
    if (isset($_GET['zip'])) {
       $parameters .="zip=". $_GET['zip'];
    }
    $url = "http://itcdland.csumb.edu/~milara/ajax/cityInfoByZip.php". $parameters;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec ($ch);
    curl_close ($ch);
    echo $result;

?>