<style>
  body{
    background-color: darkslategrey;
  }
  .comp_container {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 480px;
    margin-left: auto;
    margin-right: auto;
  }

  .grid_container {
    display: grid;
    grid-template-columns: auto auto auto;
    gap: 20px;
  }


  .grid_item {
    padding: 10px;
    border-radius: 15px;
    border-color: black;
    border-style: solid;
    border-width: 2px;
    text-align: center;
    width: 150px;
    background-color: white;
    transition: background-color 0.3s ease;
  }
  .grid_item2 {
    display: flex;
    padding: 10px;
    margin: 20px;
    border-radius: 15px;
    border-color: black;
    border-style: none;
    border-width: 2px;
    width:840px;
    height: auto;
    background-color: white;
  }

  .grid_item:hover {
    background-color: #04AA6D;
  }

  .snGrid {
    display: grid;
    grid-template-columns: auto auto;
    gap: 30px;

  }

  .mainItem {
    grid-row: 1/2;
    padding: 20px;
    border-radius: 15px;
    border-color: black;
    border-style: solid;
    border-width: 5px;
    width: 480px;
    height: auto;

  }

  .divItem {
    display: flex;
    justify-content: center;
    align-self: center;
    align-content: center;
    align-items: center;
  }

  .paragText {
    font-weight: bolder;
    display: flex;
    align-content: center;
    font-size: x-large;
  }

  .button_submit {
    border-style: none;
    border-radius: 14px;
    background-color: #04AA6D;
    font-weight: bolder;
    color: while;
    margin: 10px;
    padding: 15px;
  }
  .button_submit:hover{
    background-color:coral;
  }
  .mostLeft{
    float: left;
    font-weight: bolder;
    font-size: xx-large;
  }
  .mostRight{
    float:right;
    font-weight: bolder;
    font-size: xx-large;
    margin-left: auto;
  }
  .clear_cart{
    background-color:darkcyan;
    border-style: none;
    border-radius: 16px;
    padding:10px;
    margin: 10px;
    float: right;
    color: white;
    font-size: larger;
    font-weight: bold;
  }
  .clear_cart:hover{
    background-color: greenyellow;
    color: black;
  }
</style>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="jquery.js"></script>
  <title>Main Page</title>
</head>
<style>
  .ul_rig {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #333;
  }

  .li_rig {
    float: left;
    border-right: 1px solid #bbb;
  }

  .li_rig :last-child {
    border-right: none;
  }

  .li_rig a {
    display: block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
  }

  .li_rig a:hover:not(.active) {
    background-color: #111;
  }

  .active {
    background-color: #04AA6D;
  }
</style>

<body>
  <ul class="ul_rig">
    <li class="li_rig"><a class="active" href="#home">Home</a></li>
    <li class="li_rig" onclick="toHomePage()"
     ><a href="index_3.php">Products</a></li>
  </ul>
  <br><br><br>
</body>

</html>

<?php
function parsePrice($str, &$totalPrice){
    try {
        // Remove the last character (assumed to be the dollar sign)
        $totalPri =intval($str);
        $totalPrice += $totalPri;
        //echo "<h>Successful transfer of {$str} and {$totalPrice}</h>";
        
      } catch (ValueError $e) {
        echo "Invalid format";
        return null; // Indicate parsing failure
      }
  
    }
?>
<?php
function clearCart(){
  echo "<script>console.log('done')</script>";

  $filePath = "cart.json";

  // Encode an empty array to JSON
  $emptyJsonString = json_encode([]);

  // Overwrite the JSON file with the empty array
  file_put_contents($filePath, $emptyJsonString);
}
?>
<?php
// Read the JSON data from the file
$file = 'cart.json';
$jsonData = file_get_contents($file);

// Parse the JSON data into a PHP array
$cartArray = json_decode($jsonData, true);

// Check if decoding was successful
if ($cartArray === null) {
    // Error handling if decoding fails
    echo "Error decoding JSON data.";
} else {
    // Print the contents of the array
    echo"<script> console.log('innerScritp, Hello')</script>";
}
?>
<div id = "cart_page">
<?php
$totalPrice = 0;
for($i = 0; $i < count($cartArray);$i++){

    $meat = $cartArray[$i]['meat'];
    $price = $cartArray[$i]['price'];
    echo "<br><div class='grid_item2' id = 'prod_cart{$i}'>
       <div class='mostLeft'>{$meat}</div>
       <div class='mostRight'>{$price}$</div>
    </div><br>";
    parsePrice($price,$totalPrice);
}

echo "<h1 style = 'font-size: xx-large; font-weight = bolder; color:white;'>Total Price is {$totalPrice}</h2>";
echo "<br><br>";
?>
</div>
<form action="cart.php" method="post"><input type="submit" class="clear_cart" value="Clear Cart" name="clearCart"></form>
<?php

if(isset($_POST["clearCart"])){
  clearCart();
}
?>

<script src= "jquery.js"></script>
<script src="index.js"></script>