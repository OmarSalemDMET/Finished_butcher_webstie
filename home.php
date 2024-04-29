<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    .body_center{
        display: flex;
        justify-content: center;

    }
    .Welcome_dis{
        font-size: 150px;
        font-weight: bolder;
        font-family: 'Courier New', Courier, monospace;
        color: white;
        margin-bottom: auto;
        position: absolute;
    }
    a{
        text-decoration: none;
        color: inherit;
    }
    .Lets_start_button{
        background-color:darkcyan;
        border-style: none;
        border-radius: 15px;
        color: white;
        font-weight: bolder;
        margin-right: auto;
        margin-top: 300px;
        width: 240px;
        height: 120px;
        position: relative;
        font-size: xx-large;
        color: white;
        font-style: normal;
        color: white;
        
    }
</style>
<body style="background-color:darkslategrey;" >
    <div class = "body_center">
        <h1 class="Welcome_dis" id = "oscillatingText">Welcome Back</h1>
        <br><br>
        <div class = "body_center"><button class = "Lets_start_button" onclick="toHomePage()"><a href="index_3.php">Let's GO</a></button></div>
    </div>

</body>

</html>

<script src="jquery.js"></script>
<script src="index.js"></script>
<script>
  let isReadyToGo = false;
  let intervalId = setInterval(function() {
    if (isReadyToGo) {
      $("#oscillatingText").fadeOut(1500, function() {
        $(this).text("Welcome Back!").fadeIn(1500);
        isReadyToGo = false;
      });
    } else {
      $("#oscillatingText").fadeOut(1500, function() {
        $(this).text("Ready to GO?").fadeIn(1500);
        isReadyToGo = true;
      });
    }
  }, 1500);
</script>