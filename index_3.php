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
    border-style: none;
    border-width: 2px;
    text-align: center;
    width: 150px;
    background-color: white;
    transition: background-color 0.3s ease;
  }
  .grid_item2 {
    display: flex;
    padding: 10px;
    border-radius: 15px;
    border-color: black;
    border-style: solid;
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
    background-color: white;


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
    border-radius: 15px;
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
    <li class="li_rig"><a class="active" href="home.php">Home</a></li>
    <li class="li_rig" onclick="toHomePage()"
     ><a href="#products">Products</a></li>
    <li class="li_rig"><a href="cart.php">Cart</a></li>
    <li class="li_rig"><a href="#about" style="float:right">About</a></li>
  </ul>
  <br><br><br>
</body>

</html>


<?php
$Meat_prod = array(
  "Steak",
  "Beef Salami",
  "Sausages",
  "Chicken Breast",
  "Duck Meat",
  "Goat Meat",
  "Rabbit meat",
  "Lamb chops",
  "Turkey Braests",
  "Shrimp"
);

$Meat_price = array();

$Meat_price["Steak"] = 60;
$Meat_price["Beef Salami"] = 20;
$Meat_price["Sausages"] = 30;
$Meat_price["Chicken Breast"] = 20;
$Meat_price["Goat Meat"] = 20;
$Meat_price["Rabbit meat"] = 30;
$Meat_price["Lamb chops"] = 30;
$Meat_price["Turkey Braests"] = 60;
$Meat_price["Shrimp"] = 120;

?>

<?php
$divBound = "<div id = 'page1' class = 'comp_container'>";
$divClose = "</div>";
$GridCont = "<div id = 'grid_container' class = 'grid_container'>";
echo $divBound;
echo $GridCont;
$id = 1;
foreach ($Meat_price as $meat => $price) {
  echo "<div id = 'prod{$id}' class = 'grid_item' value = '{$meat}' onclick='displayProd(this)'>
          <h1>{$meat}</h1>
          <h2>Price</h2> 
          <h3 style = 'font-weight:bolder; font-size: x-large;'>{$price}</h3>
          </div>";

  $id++;
}

echo $divClose;
echo $divClose;
?>


<br><br><br>
<div id="prod_page" class="comp_container">

</div>
<?php
function addTOCart($prodArr){
  // Read existing data from the JSON file, if any
$file = 'cart.json';
$currentData = file_get_contents($file);
$cartData = json_decode($currentData, true);
echo "<h>{$cartData}</h>";
// Add the new data to the existing array
$newItem = array("meat" => $prodArr["product"], "price" => $prodArr["price"]);
$cartData[] = $newItem;

// Encode the updated array as JSON
$jsonData = json_encode($cartData);

// Write the JSON data back to the file
file_put_contents($file, $jsonData);

// Respond back to the JavaScript request
echo "Data added to cart successfully.";
}
?>
<?php
// Retrieve the values of the variables sent from JavaScript
if(isset($_POST['product']) && isset($_POST['price'])) {
    $meat = $_POST['product'];
    $price = $_POST['price'];

    // Now you can use $meat and $price in your PHP code

    // For example, you can add them to an array and encode it as JSON
    $data = array("product" => $meat, "price" => $price);
    addTOCart($data);
    // Write the JSON data to a file
}

?>
<script src="jquery.js"></script>
<script src="index.js"></script>