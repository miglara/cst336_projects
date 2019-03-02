<?php
header("Access-Control-Allow-Origin: *");

//File used by the "video likes" challenge/practice activity.
//with this proxy, users can keep using the "https" protocol even though the AJAX calls use "http"

    /* proxy.php */
    $parameters ="?";
    if (isset($_GET['videoId'])) {
       $parameters .="videoId=". $_GET['videoId'];
    }
    if (isset($_GET['action'])) {
       $parameters .="&action=". $_GET['action'];
    }    
    $url = "http://myspace.csumb.edu/~milara/ajax/videosAPI.php". $parameters;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec ($ch);
    curl_close ($ch);
    echo $result;

?>