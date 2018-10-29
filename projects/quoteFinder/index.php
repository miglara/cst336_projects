<?php

function getDatabaseConnection() {

        $url = parse_url(getenv("CLEARDB_DATABASE_URL"));
        $host = $url["host"];
        $dbname = substr($url["path"], 1);
        $username = $url["user"];
        $password = $url["pass"];
        $dbConn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $dbConn -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
     
        return $dbConn;
    }

$dbConn = getDatabaseConnection();

function getCategoryList() {
    global $dbConn;
    $sql = "SELECT DISTINCT(category) FROM p1_quotes ORDER BY category";
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach($records as $record) {
      echo "<option " ;
      echo ($record['category']==$_GET['category'])?"selected":""; 
      echo ">" . $record['category'] . "</option>";
    }
}

function displayQuotes(){
    global $dbConn;
    $sql = "SELECT * FROM p1_quotes WHERE 1";
    
    if (!empty($_GET['keyword'])) {
        
        $sql .= " AND quote LIKE '%" . $_GET['keyword'] . "%'";
        
    }
    
    if (!empty($_GET['category'])) {
        
        $sql .= " AND category = '" . $_GET['category'] . "'" ;
        
    }
    
    $orderBy = "";
    
    if (isset($_GET['orderBy'])) {
        $orderBy = " ORDER BY quote ";
        if ($_GET['orderBy']=="za") {
            $orderBy .= " DESC";
        } 
    }
    
    $sql .= $orderBy;
    
    $stmt = $dbConn->prepare($sql);
    $stmt->execute();
    $records = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach($records as $record) {
      echo $record['quote'] . "<i> (". $record['author'] . ") </i><br>";
    }
    
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title> Quote Finder </title>
         <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <style>
            body {
                text-align: center;
                font-size: 2em;
            }
            #quotes{
                width:600px;
                margin:0 auto;
                text-align: left;
            }
        </style>
    </head>
    <body>

      <div class="jumbotron">
            <h1> Famous Quote Finder </h1>
      </div>
      
      <form>
         Enter Quote Keyword <input type="text" name="keyword" value="<?php echo $_GET['keyword']?>" /><br><br>
         Category:
                 <select name="category">
                     <option value=""> Select One </option>
                     <?php getCategoryList() ?>
                 </select><br><br>
          Order  <br>
              <input type="radio" name="orderBy" value="az"
               <?php echo ($_GET['orderBy']=="az")?"checked":"" ?> /> A-Z <br>
              <input type="radio" name="orderBy" value="za"
               <?php echo ($_GET['orderBy']=="za")?"checked":""?> /> Z-A <br>
              
            <br>
            
            <input type="submit" value="Display Quotes!"/>

      </form>
      
      
      <hr>
      
      <div id="quotes">
      <?php displayQuotes() ?>
      </div>
      
    </body>
</html>