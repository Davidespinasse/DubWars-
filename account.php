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

    <title>DubWars - Account Settings</title>

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
            <a href='mydubs.php'><img class='icons' src='img/7.svg' alt=''>My Dubs</a>
          </li>
            <li>
            <a href='#menu-togglephone'  id='menu-togglephone' class='active'><img class='icons' src='img/5.svg' alt=''>Account Settings</a>
          </li>
          <li>
            <a href='dc.php'><img class='icons' src='img/8.svg' alt=''>Sign out</a>
          </li>
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
                    <h2 class="titleaccount">Choose Your Profil Picture</h2>
                       <div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
                            <ol class="carousel-indicators">
                              <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                              <li data-target="#myCarousel" data-slide-to="1"></li>
                              <li data-target="#myCarousel" data-slide-to="2"></li>
                              <li data-target="#myCarousel" data-slide-to="3"></li>
                            </ol>

                            <!-- Wrapper for slides -->
                            <div class="carousel-inner" role="listbox">
                              <div class="item active">
                                <img src="img/profil1.png" alt="">
                                
                              </div>

                              <div class="item">
                                <img src="img/profil2.png" alt="">
                                
                              </div>

                              <div class="item">
                                <img src="img/profil3.png" alt="">
                                
                              </div>

                              <div class="item">
                                <img src="img/profil4.png" alt="">
                                
                              </div>
                            </div>

                            <!-- Left and right controls -->
                            <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                              <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                              <span class="sr-only">Previous</span>
                            </a>
                            <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                              <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                              <span class="sr-only">Next</span>
                            </a>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 contain">
                              <div class="col-lg-2 col-md-2 col-sm-2 col-xs-1 blank"></div>
                              <div class="col-lg-8 col-md-8 col-sm-8 col-xs-10 connection">
            
                              <div class="col-lg-12 col-md-12 col-sm-12 contain1" >
                              <div class="col-lg-2 col-md-2 col-sm-2 col-xs-1 blank"></div>
                              <div class="col-lg-8 col-md-8 col-sm-8 col-xs-10 form">
                              <h2>Profil Information</h2>
                              <form action="" method="post">
                              <div>
                              <label for="email">Email:</label>
                              <input type="email" id="email" name="email" />
                              </div>
                              <div>
                             <label for="name">First name :</label>
                             <input type="text" id="name" name="name" />
                              </div>
                              <div>
                             <label for="surname">Surname :</label>
                              <input type="text" id="surname" name="surname" />
                             </div>
                             <div>
                             <label for="date">Date of birth :</label>
                              <input type="date" id="date" name="date" />
                             </div>
                             <div>
                             <label for="phone">Phone number :</label>
                              <input type="number" id="phone" name="phone" />
                             </div>
                             <div class="change">
                             <button  href="#" type="submit"><a href="#"><p>Change Password</p></a></button>
                            </div>
                            <div class="save">
                             <button  href="#" type="submit"><a href="#"><p>Save settings</p></a></button>
                            </div>
                            </form>
                             </div>
                             <div class="col-lg-2 col-md-2 col-sm-2 col-xs-1 blank"></div>
                             </div>
          
                            </div>
                           <div class="col-lg-2 col-md-2 col-sm-2 col-xs-1 blank"></div>

                            </div>
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
