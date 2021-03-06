<!DOCTYPE html>
  <html lang="en">

  <head>

      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="description" content="">
      <meta name="author" content="">

      <title>DubWars - LeaderBoard</title>

      <!-- Bootstrap Core CSS -->
      <link rel="stylesheet" href="style/reset.css">
      <link href="style/bootstrap.min.css" rel="stylesheet">

      <!-- Custom CSS -->
      <link href="style/style.css" rel="stylesheet">
      <link rel="stylesheet" href="style/font-awesome.min.css">

      <link rel="icon" type="image/png" href="img/favicon.ico" />

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
            <a href="index.php"> <img class="icons" src="img/1.svg" alt="">Themes</a>
          </li>
          <li>
            <a href="trendingSounds.php"><img class="icons" src="img/2.svg" alt="">Trending Sounds</a>
          </li>
          <li>
            <a href="bestOf.php"><img class="icons" src="img/3.svg" alt="">Best of Community</a>
          </li>
          <li>
            <a href='#menu-togglephone'  id='menu-togglephone' class='active'><img class="icons" src="img/4.svg" alt="">Leaderboard</a>
          </li>
          <li>
            <a href="shop.php"><img class="icons" src="img/6.svg" alt="">Shop</a>
          </li>
          <?php session_start();
          require_once('139E023.php');
          if(isset($_SESSION['user']))
          {
            echo "
            <li>
              <a href='mydubs.php'><img class='icons' src='img/7.svg' alt=''>My Dubs</a>
            </li>
            <li>
              <a href='account.php'><img class='icons' src='img/5.svg' alt=''>Account Settings</a>
            </li>
            <li>
              <a href='dc.php'><img class='icons' src='img/8.svg' alt=''>Sign out</a>
            </li> ";
          }
          else
          {
           echo "
            <li>
              <a href='login.php'><img class='icons' src='img/8.svg' alt=''>Sign in</a>
            </li>"; 
          }
          ?>

        </ul>
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

                            $rank = 0;
                          
                            function displayRanks($rank, $name, $score){
                            echo  "<a href='#' class='col-lg-12 col-md-12 col-xs-12 sounds'>
                                    <h2 class='rank'>".$rank."</h2><img class='iconsuser' src='img/profil1.png' alt=''>
                                    <p>".$name."</p>
                                    <h5 class='likes'>".$score." <i class='fa fa-heart'></i></h5>
                                    </a>";
                            }

                            $query = $bdd->prepare("SELECT * FROM users ORDER BY score DESC");
                            $query->execute();
                            $result = $query->fetchAll();

                            foreach ($result as $row) 
                            {
                                $rank = $rank + 1;
                                displayRanks($rank, $row['nick'], $row['score']);
                            }

                          ?>  

                           <!-- <a href="#" class="col-lg-12 col-md-12 col-xs-12 sounds"><h2 class="rank">1</h2><img class="iconsuser" src="img/profil1.png" alt=""><p >Léonard</p>
                           <h5 class="likes">650 <i class="fa fa-heart"></i></h5>
                           </a>
                           <a class="col-lg-12 col-md-12 col-xs-12 sounds"><h2 class="rank">1</h2><img class="iconsuser" src="img/profil1.png" alt=""><p>Raphaël</p>
                           <h5 class="likes">531 <i class="fa fa-heart"></i></h5>
                           </a>
                           <a class="col-lg-12 col-md-12 col-xs-12 sounds"><h2 class="rank">2</h2><img class="iconsuser" src="img/profil1.png" alt=""><p>Kanye West</p>
                           <h5 class="likes">401 <i class="fa fa-heart"></i></h5>
                           </a>
                           <a class="col-lg-12 col-md-12 col-xs-12 sounds"><h2 class="rank">3</h2><img class="iconsuser" src="img/profil1.png" alt=""><p>ScreaM</p>
                           <h5 class="likes">400 <i class="fa fa-heart"></i></h5>
                           </a>
                           <a class="col-lg-12 col-md-12 col-xs-12 sounds"><h2 class="rank">4</h2><img class="iconsuser" src="img/profil1.png" alt=""><p>Rico</p>
                           <h5 class="likes">392 <i class="fa fa-heart"></i></h5>
                           </a>
                           <a class="col-lg-12 col-md-12 col-xs-12 sounds"><h2 class="rank">5</h2><img class="iconsuser" src="img/profil1.png" alt=""><p>Nicolas</p>
                           <h5 class="likes">378 <i class="fa fa-heart"></i></h5>
                           </a>
                           <a class="col-lg-12 col-md-12 col-xs-12 sounds"><h2 class="rank">6</h2><img class="iconsuser" src="img/profil1.png" alt=""><p>Brice</p>
                           <h5 class="likes">321 <i class="fa fa-heart"></i></h5>
                           </a>
                           <a class="col-lg-12 col-md-12 col-xs-12 sounds"><h2 class="rank">7</h2><img class="iconsuser" src="img/profil1.png" alt=""><p>Jean</p>
                           <h5 class="likes">299 <i class="fa fa-heart"></i></h5>
                           </a>
                           <a class="col-lg-12 col-md-12 col-xs-12 sounds"><h2 class="rank">8</h2><img class="iconsuser" src="img/profil1.png" alt=""><p>Steve</p>
                           <h5 class="likes">298 <i class="fa fa-heart"></i></h5>
                           </a>
                           <a class="col-lg-12 col-md-12 col-xs-12 sounds"><h2 class="rank">9</h2><img class="iconsuser" src="img/profil1.png" alt=""><p>Joseph</p>
                           <h5 class="likes">273 <i class="fa fa-heart"></i></h5>
                           </a>
                           <a class="col-lg-12 col-md-12 col-xs-12 sounds"><h2 class="rank2">10</h2><img class="iconsuser" src="img/profil1.png" alt=""><p>Pat</p>
                           <h5 class="likes">260 <i class="fa fa-heart"></i></h5>
                           </a>
                           <a class="col-lg-12 col-md-12 col-xs-12 sounds"><h2 class="rank2">11</h2><img class="iconsuser" src="img/profil1.png" alt=""><p>Yoda</p>
                           <h5 class="likes">259 <i class="fa fa-heart"></i></h5>
                           </a>
                           <a class="col-lg-12 col-md-12 col-xs-12 sounds"><h2 class="rank2">12</h2><img class="iconsuser" src="img/profil1.png" alt=""><p>Han Solo</p>
                           <h5 class="likes">258 <i class="fa fa-heart"></i></h5>
                           </a>
                           <a class="col-lg-12 col-md-12 col-xs-12 sounds"><h2 class="rank2">13</h2><img class="iconsuser" src="img/profil1.png" alt=""><p>Victor</p>
                           <h5 class="likes">248 <i class="fa fa-heart"></i></h5>
                           </a>
                           <a class="col-lg-12 col-md-12 col-xs-12 sounds"><h2 class="rank2">14</h2><img class="iconsuser" src="img/profil1.png" alt=""><p>Arnaud</p>
                           <h5 class="likes">239 <i class="fa fa-heart"></i></h5>
                           </a>
                           <a class="col-lg-12 col-md-12 col-xs-12 sounds"><h2 class="rank2">15</h2><img class="iconsuser" src="img/profil1.png" alt=""><p>Juice</p>
                           <h5 class="likes">235 <i class="fa fa-heart"></i></h5>
                           </a>
                           <a class="col-lg-12 col-md-12 col-xs-12 sounds"><h2 class="rank2">16</h2><img class="iconsuser" src="img/profil1.png" alt=""><p>Sasuke</p>
                           <h5 class="likes">231 <i class="fa fa-heart"></i></h5>
                           </a>
                           <a class="col-lg-12 col-md-12 col-xs-12 sounds"><h2 class="rank2">17</h2><img class="iconsuser" src="img/profil1.png" alt=""><p>Edge</p>
                           <h5 class="likes">229 <i class="fa fa-heart"></i></h5>
                           </a>
                           <a class="col-lg-12 col-md-12 col-xs-12 sounds"><h2 class="rank2">18</h2><img class="iconsuser" src="img/profil1.png" alt=""><p>Bravo</p>
                           <h5 class="likes">228 <i class="fa fa-heart"></i></h5>
                           </a>
                           <a class="col-lg-12 col-md-12 col-xs-12 sounds"><h2 class="rank2">19</h2><img class="iconsuser" src="img/profil1.png" alt=""><p>Biceps</p>
                           <h5 class="likes">226 <i class="fa fa-heart"></i></h5>
                           </a> -->
                           
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
