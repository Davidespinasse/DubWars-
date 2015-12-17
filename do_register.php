<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>DubWars - Sign in</title>

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
        <div class="col-lg-12 col-md-12 col-sm-12 contain">
          <div class="col-lg-4 col-md-4 col-sm-3 col-xs-2 blank"></div>
          <div class="col-lg-4 col-md-4 col-sm-6 col-xs-8 connection">
            
            <div class="col-lg-12 col-md-12 col-sm-12 contain1" >
              <div class="col-lg-2 col-md-2 col-sm-2 col-xs-1 blank"></div>
              <div class="col-lg-8 col-md-8 col-sm-8 col-xs-10 form">
              <script>
                function BackSignIn(){ 
                  setTimeout(function () {
                  window.location.href= 'register.php'; // the redirect goes here
                  },2000);
                }

                function GoNext(){ 
                  setTimeout(function () {
                  window.location.href= 'login.php'; // the redirect goes here
                  },2000);
                }
              </script>

                <?php 

                  $dsn = 'mysql:dbname=leonardddub;host=leonardddub.mysql.db';
                  $user = 'leonardddub';
                  $password = 'Rico95580';

                  $bdd = new PDO($dsn, $user, $password);

                  $pass =   $_POST['pass'];
                  $pass2 =  $_POST['pass2'];
                  $nick =   $_POST['nick'];

                  $pass = sha1($pass);
                  if((!empty($_POST['nick']))&&(!empty($_POST['pass'])))
                  {
                    if(!preg_match('/[\'^£$%&*()}{@#~?><>,|="_+¬-]/', $nick)){
                      if(strlen($_POST['nick'])<=24)
                      {
                        $sth = $bdd->prepare("SELECT * FROM users WHERE nick = '$nick'");
                        $sth->execute();
                        $data = $sth->fetchAll();
                        if (empty($data)) //check if nickname already exist
                        { 
                        $bdd->exec("INSERT INTO users(id, nick, pass) VALUES('', '$nick', '$pass')");
                        echo '<h2>You have successfully registered !</h2>
                              <script>GoNext()</script>';
                        }
                        else
                        {
                          echo '<h2>This username is already taken.</h2>
                              <script>BackSignIn()</script>';
                        }

                      }
                      else
                      {
                        echo '<h2>Username can at most be 24 characters.</h2>
                            <script>BackSignIn()</script>';
                      }
                    }
                    else
                    {
                      echo '<h2>Please, don\'t use special symbols.</h2>
                            <script>BackSignIn()</script>';
                    }
                  }
                  else
                  {
                    echo '<h2>Please fill in the form.</h2>
                          <script>BackSignIn()</script>';
                  }

              ?>
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
