<?php session_start();
  if(!isset($_SESSION['user']))
  {
    header('Location: login.php');
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

    <title>DubWars - Thèmes</title>

    <link rel="stylesheet" href="style/reset.css">
    <link href="style/bootstrap.min.css" rel="stylesheet">

    <link href="style/style.css" rel="stylesheet">
    <link rel="stylesheet" href="style/font-awesome.min.css">


</head>

<body>

    <div id="wrapper">

        <!-- Sidebar -->
         <div id="sidebar-wrapper">
        <img src="img/starwars.png" id="logo" alt="">
        <ul class="sidebar-nav">
          <li class="sidebar-brand">
            <a href="#">

            </a>
          </li>
          <li>
            <a href="#menu-togglephone"  id="menu-togglephone" class="active"> <img class="icons" src="img/1.svg" alt="">Themes</a>
          </li>
          <li>
            <a href="trendingSounds.php"><img class="icons" src="img/2.svg" alt="">Trending sounds</a>
          </li>
          <li>
            <a href="bestOf.php"><img class="icons" src="img/3.svg" alt="">Best of Community</a>
          </li>
          <li>
            <a href="leaderboard.php"><img class="icons" src="img/4.svg" alt="">Leaderboard</a>
          </li>
          <li>
            <a href="account.php"><img class="icons" src="img/5.svg" alt="">Account settings</a>
          </li>
          <li>
            <a href="shop.php"><img class="icons" src="img/6.svg" alt="">Shop</a>
          </li>
          <li>
            <a href="mydubs.php"><img class="icons" src="img/7.svg" alt="">My dubs</a>
          </li>
          <li>
            <a href="dc.php"><img class="icons" src="img/8.svg" alt="">Sign out </a>
          </li>

        </ul>
        <p class="rights">DubWars © | All rights reserved</p>
      </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 top">
                        <button href="#menu-toggle" class=" col-lg-1 col-md-1 col-sm-2 col-xs-2 arrow" id="menu-toggle"><img src="img/arrow.png" alt=""></button>
                    </div>
                    <div class="col-lg-12 center">

                      <?php

                        $dsn = 'mysql:dbname=leonardddub;host=leonardddub.mysql.db';
                        $user = 'leonardddub';
                        $password = 'Rico95580';

                        $bdd = new PDO($dsn, $user, $password);

                        function displayTheme($id, $name, $img){
                          echo  "<a href='quotes.php?theme=". $id ."'>
                                  <div class='col-lg-3 col-md-12 col-sm-12 themes'>
                                    <img widht='100px' height='100px' src='" . $img . "' alt=>
                                    <p>" . $name . "</p>
                                  </div>
                                </a>";
                        }

                        $query = $bdd->prepare("SELECT * FROM themes_list");
                        $query->execute();
                        $result = $query->fetchAll();

                        foreach ($result as $row) 
                        {
                          displayTheme($row["id"], $row["name"],$row["img"]);
                        }

                      ?>
                      
                    </div>
                </div>
            </div>
        </div>


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
