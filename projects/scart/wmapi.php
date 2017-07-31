<?php
    function getProducts($keywords) {
        
        $curl = curl_init();
        curl_setopt_array($curl, array(
          CURLOPT_URL => "http://api.walmartlabs.com/v1/search?apiKey=f5gxmkzbaedzwbpzuk2ntywy&query='$keywords'",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "GET",
          CURLOPT_HTTPHEADER => array(
            "cache-control: no-cache"
          ),
        ));
        
        $jsonData = curl_exec($curl);
        $data = json_decode($jsonData, true);
        $items = $data['items'];
        
        return $items;
    }
?>