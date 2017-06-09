<?php

include '';

?>
<!DOCTYPE html>
<html>
    <head>
        <title> </title>
        <style>
        body{
            background-image: url('http://c1.staticflickr.com/4/3733/13627757354_d0fba56019_b.jpg');
            opacity:0.2;
            width:100%;
        }
</style>
    </head>
    <body>
        
        <?php

$imageURLs = getImageURLs("ocean");
for ($i = 0; $i < 50; $i++) {
    echo "<img src='" . $imageURLs[$i] . "'  width='200' >";
}

?>

    </body>
</html>