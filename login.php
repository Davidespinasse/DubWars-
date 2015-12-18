<?php session_start();
  require_once('139E023.php');
  if(isset($_SESSION['user']))
  {
    header('Location: index.php');
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

    <title>DubWars - Login</title>

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
            <a href="#menu-togglephone"  id="menu-togglephone" class="active"><img class="icons" src="img/8.svg" alt="">Sign in</a>
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
                    <div class="col-lg-12 col-md-12 col-sm-12 contain">
          <div class="col-lg-3 col-md-3 col-sm-3 col-xs-2 blank"></div>
          <div class="col-lg-6 col-md-6 col-sm-6 col-xs-8 connection">
            
            <div class="col-lg-12 col-md-12 col-sm-12 contain1" >
              <div class="col-lg-2 col-md-2 col-sm-2 col-xs-1 blank"></div>
              <div class="col-lg-8 col-md-8 col-sm-8 col-xs-10 form">
              <h2>Login</h2>
                <form action="#" method="post">
                  <div> 
                    <label for="username">Username :</label>
                    <input type="text" id="username" name="nick" />
                  </div>
                  <div>
                    <label for="password">Password :</label>
                    <input type="password" id="password" name="pass" />
                  </div>
                  <div class="button">
                    <button type="submit"><a href='#'><p>Log in</p></a></button>
                  </div>
                </form>

                <div class="inscription">
                   <button><a href="register.php"><p>Register</p></a></button>
                </div>
                <div class="forgot">
                  <a href="#">Forgot your password ?</a>
                </div>
              </div>
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-1 blank"></div>
          </div>
          
          </div>
          <div class="col-lg-3 col-md-3 col-sm-3 col-xs-2 blank"></div>

        </div>
          <script>
                  function GoNext(){ 
                    window.location.href= 'index.php'; // the redirect goes here
                  }
                </script>

                <?php
                    if((!empty($_POST['nick']))&&(!empty($_POST['pass'])))
                    {
                      $pass = sha1($_POST['pass']);

                      $query=$bdd->prepare("SELECT id, nick, pass FROM users WHERE nick = :nick");
                          $query->bindValue(':nick',$_POST['nick'], PDO::PARAM_STR);
                          $query->execute();
                          $data=$query->fetch();

                          if($pass == $data['pass'])
                          {
                            $_SESSION['user'] = $data['nick'];
                            echo '<script>GoNext()</script>';
                          }
                          else
                          {
                            echo '<p style="text-align:center;color:white">Les identifiants entrés ne correspondent pas.</p>';
                          }
                    }

                  ?>

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
    $(".inscription").click(function(e) { // in order ton fix mozilla's issues
         window.location.href='register.php';
    });
    </script>

</body>

</html>
