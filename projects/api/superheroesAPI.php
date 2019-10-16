<?php
header("Access-Control-Allow-Origin: *");
//File used by the "superheroes" midterm EXAM using AJAX.
//with this proxy, users can keep using the "https" protocol even though the AJAX calls use "http"
    /* proxy.php */
    $parameters ="?";
    if (isset($_GET['heroId'])) {
       $parameters .="heroId=". $_GET['heroId'];
    }
    if (isset($_GET['data'])) {
       $parameters .="&data=". $_GET['data'];
    }    
    if (isset($_GET['pob'])) {
       $parameters .="&pob=". $_GET['pob'];
    }  
    $url = "http://myspace.csumb.edu/~milara/ajax/superheroes/superheroesAPI.php". $parameters;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec ($ch);
    curl_close ($ch);
    echo $result;
?>
