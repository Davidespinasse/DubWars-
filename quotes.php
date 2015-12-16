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
                    <a href="theme.php" class="active"> <img class="icons" src="img/1.png" alt="">Themes</a>
                </li>
                <li>
                    <a href="#menu-togglephone"  ><img class="icons" src="img/2.png" alt="">Trending sounds</a>
                </li>
                <li>
                    <a href="#"><img class="icons" src="img/3.png" alt="">Best of Community</a>
                </li>
                <li>
                    <a href="#"><img class="icons" src="img/4.png" alt="">Leaderboard</a>
                </li>
                <li>
                    <a href="#"><img class="icons" src="img/5.png" alt="">Account settings</a>
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

                    <?php session_start();

                      $themeId = $_GET['theme'];
                      
                      $bdd = new PDO('mysql:host=localhost:8889;dbname=dubwars;charset=utf8', 'root', 'root');

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


                      <!--  <a href="page-webcam.html" class="col-lg-12 col-md-12 col-xs-12 sounds"><img class="iconsounds" src="img/11.png" alt=""><p >"Your focus determines your reality." -Qui-Gon Jinn</p>
                       <h5 class="time">0.12</h5>
                       <img class="arrowplay" src="img/arrow.png" alt=""></a> -->
                       
                       
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
