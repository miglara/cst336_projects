<?php
    session_start();
    
    // If 'removeId' has been sent, search the cart for that itemId and unset it
    if (isset($_POST['removeId'])) {
        foreach ($_SESSION['cart'] as $itemKey => $item) {
            if ($item['id'] == $_POST['removeId']) {
                unset($_SESSION['cart'][$itemKey]);
            }
        }
    }
    
    function displayCart() {
        // If there are items in the Session, display them
        if(isset($_SESSION['cart'])) {
            echo "<table class='table'>";
            foreach ($_SESSION['cart'] as $item) {
                $itemId = $item['id'];
                
                // Create 'hidden' removeId field to tell the PHP program
                // which itemId to remove
                echo "<form method='post'>";
                echo "<input type='hidden' name='removeId' value='$itemId'>";
                
                echo '<tr>';
                echo "<td><img src='" . $item['img'] . "'></td>";
                echo "<td>". $item['name'] . "</td>";
                echo "<td>$". $item['price'] . "</td>";
                echo '<td><button class="btn btn-danger">Remove</button></td>';
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
        <title>Shopping Cart</title>
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
                <h2>Shopping Cart</h2>
                
                <!-- Cart Items -->
                <?php displayCart(); ?>
            </div>
        </div>
    </body>
</html>