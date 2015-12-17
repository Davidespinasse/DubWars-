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

    <title>DubWars - Register</title>

    <link rel="stylesheet" href="style/reset.css">
    <link href="style/bootstrap.min.css" rel="stylesheet">

    <link href="style/style.css" rel="stylesheet">
    <link rel="stylesheet" href="style/font-awesome.min.css">


</head>

<body>

        <div class="col-lg-12 col-md-12 col-sm-12 titlelogo">
          <img src="img/starwars.png" alt="">
        </div>
        <div class="col-lg-12 col-md-12 col-sm-12 contain">
          <div class="col-lg-4 col-md-4 col-sm-3 col-xs-2 blank"></div>
          <div class="col-lg-4 col-md-4 col-sm-6 col-xs-8 connection">
            
            <div class="col-lg-12 col-md-12 col-sm-12 contain1" >
              <div class="col-lg-2 col-md-2 col-sm-2 col-xs-1 blank"></div>
              <div class="col-lg-8 col-md-8 col-sm-8 col-xs-10 form">
              <h2>Sign in</h2>
                <form action="do_register.php" method="post">
              <div>
                <label for="username">Username :</label>
                <input type="text" id="username" name="nick" />
              </div>
              <div>
                <label for="password">Password :</label>
                <input type="password" id="password" name="pass" />
              </div>
              <div>
                <label for="password2">Confirm password :</label>
                <input type="password" id="password2" name="pass2" />
              </div>
               <div class="inscriptionfinal">
               <button  href="#" type="submit"><a href="#"><p>Register</p></a></button>
            </div>
            </form>

              </div>
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-1 blank"></div>
          </div>
          
          </div>
          <div class="col-lg-4 col-md-4 col-sm-3 col-xs-2 blank"></div>

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
