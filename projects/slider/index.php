<?php

$backgroundImage = "img/sea.jpg";

if (isset($_GET['keyword'])) {
    include 'api/pixabayAPI.php';
    $imageURLs = getImageURLs($_GET['keyword'], $_GET['layout']);
    $backgroundImage = $imageURLs[array_rand($imageURLs)]; //gets random image URL from the array
}

function selectedOption($option){
    
    if ($option == $_GET['keyword']) {
        return "selected";
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title> </title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.1.0.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <style>
            @import url("css/styles.css");
            body{
                background-image: url('<?=$backgroundImage?>');
            }
        </style>
    </head>
    <body>
        <br/> <br />
        <form>
            <input type="text" name="keyword" placeholder="Keyword">
            <div id="layoutDiv">
                <input type="radio" name="layout" value="horizontal" id="layout_h" <?=($_GET['layout']=="horizontal")?"checked":""?>/>
                <label for="layout_h"> Horizontal </label><br />
                 <input type="radio" name="layout" value="vertical" id="layout_v"  <?=($_GET['layout']=="vertical")?"checked":""?> />
                 <label for="layout_v"> Vertical </label><br />
            </div>
            <br />
            <select name="keyword" style="color:black; font-size:1.5em">
                 <option value="ocean" <?=selectedOption('sea')?> > Sea </option>
                 <option <?=selectedOption('Mountains')?>> Mountains </option>
                 <option <?=selectedOption('Forest')?>> Forest </option>
                 <option <?=selectedOption('Sky')?>> Sky </option>
            </select><br /><br />
            <input type="submit" value="Submit" />
        </form>
        <br/> <br />
        <?php
            if (!isset($imageURLs)) {
             
             echo "<h2> Type a keyword to display a slideshow <br /> with random images from Pixabay.com</h2>";
                
            }
            else {
                
                //Start by displaying the first five images of the  $imageURLs array
               /*   for ($i = 0; $i < 5; $i++) {
                        echo "<img src='" . $imageURLs[$i] . "'  width='200' >";
                    }*/
                
                //Explain that we want to display 5 random images, a way to do it would be
               /*   for ($i = 0; $i < 5; $i++) {
                        echo "<img src='" . $imageURLs[rand(0,count($imageURLs))] . "'  width='200' >";
                    }*/                
                    
                //Explain that the potential issue is that there might be duplicated images    
                shuffle($imageURLs); //too time consuming! only effective if we'd use all 100 images not only 5

            ?>
            
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel" <?=($_GET['layout']=='vertical')?"style='width:300px'":''?>>
              <!-- Indicators -->
              <ol class="carousel-indicators">
                <!--
                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                <li data-target="#carousel-example-generic" data-slide-to="3"></li>
                <li data-target="#carousel-example-generic" data-slide-to="4"></li>
                <li data-target="#carousel-example-generic" data-slide-to="5"></li>
                <li data-target="#carousel-example-generic" data-slide-to="6"></li>
                -->
                
                <?php
                 for ($i = 0; $i < 7; $i++) {
                   //echo "<li data-target='#carousel-example-generic' data-slide-to='$i'></li>";
                   echo "<li data-target='#carousel-example-generic' data-slide-to='$i'";
                   echo ($i == 0)?" class='active'": "";  
                   echo "></li>";
                 } 
               ?>
                
              </ol>
            
              <!-- Wrapper for slides -->
              <div class="carousel-inner" role="listbox">
                <!--
                <div class="item active">
                  <img src="<?=$imageURLs[0]?>" alt="...">
                  <div class="carousel-caption">
                    ...
                  </div>
                </div>
                <div class="item">
                  <img src="<?=$imageURLs[1]?>" alt="...">
                  <div class="carousel-caption">
                    ...
                  </div>
                </div>
                -->
                <?php 
                    for ($i = 0; $i < 7; $i++) {
                        do {
                            $randomIndex = rand(0,count($imageURLs));
                        } while  (!isset($imageURLs[$randomIndex]));
                        echo '<div class="item ';
                        echo ($i == 0)?"active": "";
                        echo  '">';
                        echo '<img src="' . $imageURLs[$randomIndex] . '">';
                        echo '<div class="carousel-caption">';
                        echo '...';
                        echo '</div>';
                        echo '</div>';
                        unset($imageURLs[$randomIndex]); 
                    }
                ?>
                ...
              </div>
            
              <!-- Controls -->
              <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
                    
        <?php            
            }
        ?>

    </body>
</html>