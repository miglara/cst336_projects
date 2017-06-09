<?php

$backgroundImage = "img/sea.jpg";

if (isset($_GET['keyword'])) {
    include 'api/pixabayAPI.php';
    $imageURLs = getImageURLs($_GET['keyword']);
    $backgroundImage = $imageURLs[array_rand($imageURLs)]; //gets random image URL from the array
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
            body{
                background-image: url('<?=$backgroundImage?>');
                opacity:0.9;
                width:100%;
                text-align:center;
            }
            input {
                font-size: 3em;
            }
            #carousel-example-generic {
                 margin: 0 auto;   
                 width: 700px;
            }
        </style>
    </head>
    <body>
        <br/> <br />
        <form>
            
            <input type="text" name="keyword" placeholder="Keyword">
            <input type="submit" value="Submit" />
            
        </form>
        <br/> <br />
        <?php
            if (isset($imageURLs)) {
                shuffle($imageURLs); //need to change, too expensive
               /*     for ($i = 0; $i < 5; $i++) {
                        echo "<img src='" . $imageURLs[$i] . "'  width='200' >";
                    }*/
            ?>
            
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
              <!-- Indicators -->
              <ol class="carousel-indicators">
                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                <li data-target="#carousel-example-generic" data-slide-to="3"></li>
                <li data-target="#carousel-example-generic" data-slide-to="4"></li>
                <li data-target="#carousel-example-generic" data-slide-to="5"></li>
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
                    for ($i = 0; $i < 6; $i++) {
                        echo '<div class="item ';
                        echo ($i == 0)?"active": "";
                        echo  '">';
                        echo '<img src="' . $imageURLs[$i] . '">';
                        echo '<div class="carousel-caption">';
                        echo '...';
                        echo '</div>';
                        echo '</div>';
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