<?php session_start();
  require_once('139E023.php');
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

    <title>DubWars - My dubs</title>

    <link rel="stylesheet" href="style/reset.css">
    <link href="style/bootstrap.min.css" rel="stylesheet">

    <link href="style/style.css" rel="stylesheet">
    <link rel="stylesheet" href="style/font-awesome.min.css">

    <link rel="icon" type="image/png" href="img/favicon.ico" />


</head>

<body>

    <div id="wrapper">

        <!-- Sidebar -->
        <div id="sidebar-wrapper">
        <a href="index.php"><img  src="img/starwars.png" id="logo" alt=""></a>
        <ul class="sidebar-nav">
          <li class="sidebar-brand">
            <a href="#">
            </a>
          </li>
          <li>
            <a href="index.php"> <img class="icons" src="img/1.svg" alt="">Themes</a>
          </li>
          <li>
            <a href="trendingSounds.php"><img class="icons" src="img/2.svg" alt="">Trending Sounds</a>
          </li>
          <li>
            <a href="bestOf.php"><img class="icons" src="img/3.svg" alt="">Best of Community</a>
          </li>
          <li>
            <a href="leaderboard.php"><img class="icons" src="img/4.svg" alt="">Leaderboard</a>
          </li>
          <li>
            <a href="shop.php"><img class="icons" src="img/6.svg" alt="">Shop</a>
          </li>
          <li>
            <a href="#menu-togglephone"  id="menu-togglephone" class="active" ><img class="icons" src="img/7.svg" alt="">My Dubs</a>
          </li>
          <li>
            <a href="account.php"><img class="icons" src="img/5.svg" alt="">Account Settings</a>
          </li>
          <li>
            <a href="dc.php"><img class="icons" src="img/8.svg" alt="">Sign out</a>
          </li>

        </ul>
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

                        $user = $_SESSION['user'];

                        $number = 1;

                        function displayDubs($url, $number){
                            echo  "<a href='play.php?id=". $url ."'>
                                  <div class='col-lg-3 col-md-12 col-sm-12 themes'>
                                    <img width='100px' height='100px' src='img/t11.svg' alt=>
                                    <p>#" . $number . "</p>
                                  </div>
                                </a>";
                        }

                        $query=$bdd->prepare("SELECT url, owner FROM quotes_data WHERE owner = '$user'");
                        $query->execute();
                        $dataFile=$query->fetchAll();

                        foreach ($dataFile as $row) 
                        {  
                            displayDubs($row['0'], $number);
                            $number++;
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
