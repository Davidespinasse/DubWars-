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

    <title>DubWars - Trending Sounds</title>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="style/reset.css">
    <link href="style/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="style/style.css" rel="stylesheet">
    <link rel="stylesheet" href="style/font-awesome.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

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
            <a href="theme.php"><img class="icons" src="img/1.svg" alt="">Themes</a>
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
            <a href="dc.php"><img class="icons" src="img/8.svg" alt="">Sign out</a>
          </li>

        </ul>
        <p class="rights">DubWars © | All rights reserved</p>
      </div>
        <!-- /#sidebar-wrapper -->

        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 top">
                        <button href="#menu-toggle" class="col-lg-1 col-md-1 col-xs-2 arrow" id="menu-toggle"><img src="img/arrow.png" alt=""></button>
                    </div>
                    <div class="col-lg-12 center">

                    <?php

                        $themeId = $_GET['theme'];
                      
                        $bdd = new PDO('mysql:host=leonardddub.mysql.db;dbname=leonardddub;charset=utf8', 'leonardddub', 'Rico95580');

                        function displayQuotes($id, $quote, $mini, $duration){
                        echo  "<a href='recording.php?quote=" . $id . "' class='col-lg-12 col-md-12 col-xs-12 sounds'>
                              <img class='iconsounds' src='" . $mini . "' alt=''>
                              <p>" . $quote . "</p>
                              <h5 class='time'>" . $duration . "</h5>
                              </a>";
                        }

                        $query = $bdd->prepare("SELECT * FROM quotes_list");
                        $query->execute();
                        $result = $query->fetchAll();

                        foreach ($result as $row) 
                        {
                            if($themeId == $row["theme"]){
                            displayQuotes($row["id"], $row["quote"], $row["mini"], $row["duration"]);
                            }
                        }

                    ?>                       
                       
                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Menu Toggle Script -->
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
