<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
include 'partials/dbconnect.php';
$itemname = $_POST['item-name'];
$itemcost= $_POST['item-cost'];
$itemtag=$_POST['tag'];
$date = date('Y/m/d');
$sqlquery = "INSERT INTO `expenses` (`itemName`, `cost`, `tag`, `date`) VALUES ('$itemname', '$itemcost', '$itemtag', '$date');";
$result = mysqli_query($conn, $sqlquery);
}
?>

<!DOCTYPE html>
    <html>
        <head>
        <title>Homepage</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="nav.css">
        </head>
        <body>
            <nav>
                <ul>
                    <img src="img/expenseTracker.png" width="100" height="100">
                    <li><a href="">User</a></li>
                    <li><a href="">Tutorial</a></li>
                  </ul>
                  <div class="views">
                  <button type="button" class="btn btn-outline-primary"> <a href="monthly.php" class="button">Monthly</a></button>
<button type="button" class="btn btn-outline-secondary"><a href="monthly.php" class="button">Yearly</a></button>
<button type="button" class="btn btn-outline-success"><a href="catwise.php" class="button">Category-wise</a></button>

                   
                    </div>
                    
                  
                  <div class="inputbox">
                    <form method="post" id= "add" action="home.php">
                    <input type="text" id="item-name" name="item-name" placeholder="Item Name">
                    <input type="number" id="item-cost" name="item-cost" placeholder="0">  
                    <label for="tag" ></label>
                    <select id="tag" name="tag">
                        <option value="Groceries">Groceries</option>
                        <option value="Utility">Utility</option>
                        <option value="Entertainment">Entertainment</option>
                        <option value="Personal">Personal</option>
                        <option value="Travel">Travel</option>
                        <option value="Other">Other</option>
                      </select>
                    <input id="add" type="submit" value="Add"/>
                </div>
                    
    
            </nav>
        </body>
    </html>
