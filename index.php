<?php session_start();
  if(isset($_SESSION['user']))
  {
    header('Location: theme.php');
    exit;
  }
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>DubWars</title>

    <link rel="stylesheet" href="style/reset.css">
    <link href="style/bootstrap.min.css" rel="stylesheet">

    <link href="style/style.css" rel="stylesheet">
    <link rel="stylesheet" href="style/font-awesome.min.css">


</head>

<body>
        <div class="all"></div>
        <div class="col-lg-12 col-md-12 col-sm-12 titlelogo">
          <img src="img/starwars.png" alt="">
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 all2">
        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 first">
          <a href="">
          <img src="img/left.png" alt="">
            <h2>Select a Star Wars Sound</h2>
          </a>
        </div>
        <div class="col-lg-1 col-md-1 col-sm-0 col-xs-0 blank"></div>
        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 second">
          <a href="">
          <img src="img/mid.png" alt="">
            <h2>Let your imagination take over</h2>
          </a>
        </div>
        <div class="col-lg-1 col-md-1 col-sm-0 col-xs-0 blank"></div>
        <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12 third">
          <a href="">
          <img src="img/right.png" alt="">
            <h2>Share your Dubs to the World</h2>
          </a>
        </div>
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 all3">
          <div class="col-lg-5 col-md-5 col-sm-4 col-xs-2 blank"></div>
          <div class="col-lg-2 col-md-2 col-sm-4 col-xs-8 dubing">
            <a href="login.php"><button><p>Start Dubing !</p></button></a>
          </div>
          <div class="col-lg-5 col-md-5 col-sm-4 col-xs-2 blank"></div>
        </div> 
        

    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");

    });
    $("#menu-togglephone").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>

</body>

</html>