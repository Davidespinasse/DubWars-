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
            <a href="theme.php"> <img class="icons" src="img/1.svg" alt="">Themes</a>
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
                        <div class="col-lg-2 col-md-2 col-xs-1 blank"></div>
                        <?php session_start();

                            $fileId = $_GET['id'];

                            $bdd = new PDO('mysql:host=leonardddub.mysql.db;dbname=leonardddub;charset=utf8', 'leonardddub', 'Rico95580');

                            $query=$bdd->prepare("SELECT url, quote_id FROM quotes_data WHERE url = '$fileId'");
                            $query->execute();
                            $dataFile=$query->fetch();

                            $quoteId = $dataFile['quote_id'];

                            $query=$bdd->prepare("SELECT id, quote, audio FROM quotes_list WHERE id = '$quoteId'");
                            $query->execute();
                            $dataQuote=$query->fetch();

                             echo "<h2 class='col-lg-6 col-md-6 col-xs-6 name'>" . $dataQuote["quote"] . "</h2>";

                            ?>
                        <div class="col-lg-1 col-md-1 col-xs-1 blank"></div>
                        <div class=" col-lg-2 col-md-2 col-xs-2 volumeContainer">
							<img src="img/volume_up.png" alt="logo volume" class="volumeImage">
							<div class="volumeBar">
							     <div class="volumeSeekBar"></div>
							</div>
                        </div>
                    </div>
					<div class="col-lg-12 stream">
                        <?php

                            echo    "<audio autoplay src='". $dataQuote["audio"] ."' id='audio'></audio>
                                    <video width='100%' height='100%' autoplay class='archivedVideo'> 
                                        <source src='./uploads/" . $fileId . ".webm' type='video/webm'>
                                    </video>";
                        ?>
					</div>
                    <div class="col-lg-12 col-md-12 col-xs-12 command">
                    <a class="col-lg-2 col-md-2 col-xs-2 blank" href="#" > </a>
                    
                    <div class="col-lg-3 col-md-3 col-xs-2 blank"></div>
                    <div class="col-lg-2 col-md-2 col-xs-4 blank" href="#"></div>
                    <div class="col-lg-2 col-md-2 col-xs-4 blank" href="#"></div>
                    <div class="col-lg-3 col-md-3 col-xs-2 blank"></div>
                    <a class="col-lg-2 col-md-2 col-xs-2 blank" href="#" > </a>
                    
                    </div>
                </div>
            </div>
        </div>

    </div>
    
    
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="js/scriptPlayer.js"></script>
    <script src="js/scriptVolume.js"></script>
    
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