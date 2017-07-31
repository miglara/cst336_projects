<?php
    // Start the session in any php file where you will be using sessions
    session_start();
    
    // Create an array in the Session to hold our cart items 
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }
    
    // Checks to see if the search form has been submitted
    if (isset($_GET['query'])) {
        
        // Get access to our API function
        include 'wmapi.php';
        $items = getProducts($_GET['query']);
    }
    
    // If the 'itemName' is set, put it in the session cart and direct the user to the shopping cart
    if (isset($_POST['itemName'])) {
        
        // Create associative array for item properties
        $cartItem = array();
        $cartItem['name'] = $_POST['itemName'];
        $cartItem['price'] = $_POST['itemPrice'];
        $cartItem['img'] = $_POST['itemImg'];
        $cartItem['id'] = $_POST['itemId'];
        
        // Add the product's name to the Session cart
        array_push($_SESSION['cart'], $cartItem);
        
        // Direct the user to the shopping cart page
        header('location: scart.php');
    }
    
    // Displays the search results in a table
    function displayResults() {
        global $items; // Necessary to get the global items array
        
        if (isset($items)) {
            echo "<table class='table'>";
            foreach ($items as $item) {
                $itemName = $item['name'];
                $itemPrice = $item['salePrice'];
                $itemImage = $item['thumbnailImage'];
                $itemId = $item['itemId'];
                
                // Create 'hidden' fields to send item data via POST
                echo "<form method='post'>";
                echo "<input type='hidden' name='itemName' value='$itemName'>";
                echo "<input type='hidden' name='itemPrice' value='$itemPrice'>";
                echo "<input type='hidden' name='itemImg' value='$itemImage'>";
                echo "<input type='hidden' name='itemId' value='$itemId'>";
                
                // Display table row w/ Add button for submitting form
                echo '<tr>';
                echo "<td><img src='$itemImage'></td>";
                echo "<td>$itemId</td>";
                echo "<td>$itemName</td>";
                echo "<td>$$itemPrice</td>";
                echo '<td><button class="btn btn-warning">Add</button></td>';
                echo '</tr>';
                echo '</form>';
            }
            echo "</table>";    
        }
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <title>Products Page</title>
    </head>
    <body>
    <div class='container'>
        <div class='text-center'>
            
            <!-- Bootstrap Navagation Bar -->
            <nav class='navbar navbar-default - navbar-fixed-top'>
                <div class='container-fluid'>
                    <div class='navbar-header'>
                        <a class='navbar-brand' href='#'>Shopping Land</a>
                    </div>
                    <ul class='nav navbar-nav'>
                        <li><a href='index.php'>Home</a></li>
                        <li><a href='scart.php'>Cart</a></li>
                    </ul>
                </div>
            </nav>
            <br /> <br /> <br />
            
            <!-- Search Form -->
            <form enctype="text/plain">
                <div class="form-group">
                    <label for="pName">Product Name</label>
                    <input type="text" class="form-control" name="query" id="pName" placeholder="Name">
                </div>
                <input type="submit" value="Submit" class="btn btn-default">
                <br /><br />
            </form>
            
            <!-- Display Search Results -->
            <?php displayResults(); ?>
        </div>
    </div>
    </body>
</html>