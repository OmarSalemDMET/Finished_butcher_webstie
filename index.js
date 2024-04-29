function toHomePage() {
    $("#prod_page")
    $('#prod_page').hide()
    $('#page1').show()
    console.log("See you Later, Earth!")
}

function displayProd(str) {
    
    $('#page1').hide()
    $("#prod_page").show()
    var meat = document.getElementById(str.id).querySelector("h1").innerHTML;
    var price = document.getElementById(str.id).querySelector("h3").innerHTML;
    var strTemp = " sendCartData('Prod_2ndholder') "
    $("#prod_page").html("<form class='snGrid' id='prod_grid_holder'> <div class='mainItem' id='Prod_2ndholder'><h1 id='prod_name_p2' class='divItem'>" + meat +"</h1><h2 id='prod_price_p2' class='divItem'>" + price + "</h2></div><div class='gridItem'></div><input type='button' value='Add to Cart' class='button_submit' onclick ="+ strTemp +"></form>");
}   

function sendCartData(prod){

var xhttp = new XMLHttpRequest();

// Define the PHP file you want to send the data to
var product = document.getElementById(prod).querySelector("h1").innerHTML;
var price = document.getElementById(prod).querySelector("h2").innerHTML;
console.log(price);
console.log(price);
// Specify the request type and URL
var phpFile = "index_3.php";
xhttp.open("POST", phpFile, true);

// Set the content type for the request header
xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

// Define what to do on successful completion of the request
xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
        // This function will be executed when the request is completed successfully
        //console.log(this.responseText); // You can do something with the response if any
    }
};

// Send the request with the variable value as data
xhttp.send("product=" + product + "&price=" + price);
console.log("Data was sent successfully!")
$("#prod_page").after("<br><br><h1 style = 'display:flex; font-weight: bolder; font-size: larger; margin:20px; padding:20px; justify-content:center; margin-top:50px;'; id = 'cart_msg'>Added to Cart</h1><br><br>");
$("#cart_msg").fadeOut(3000)
}

