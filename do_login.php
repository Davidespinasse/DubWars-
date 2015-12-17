<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>DubWars - Connexion</title>

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
              function BackLogIn(){ 
                setTimeout(function () {
                window.location.href= 'login.php'; // the redirect goes here
                },2000);
              }

              function GoNext(){ 
                setTimeout(function () {
                window.location.href= 'theme.php'; // the redirect goes here
                },2000);
              }
          </script>

           <?php session_start();

              if((!empty($_POST['nick']))&&(!empty($_POST['pass'])))
              {
                $pass = sha1($_POST['pass']);

                $bdd = new PDO('mysql:host=leonardddub.mysql.db;dbname=leonardddub;charset=utf8', 'leonardddub', 'Rico95580');

                $query=$bdd->prepare("SELECT id, nick, pass FROM users WHERE nick = :nick");
                    $query->bindValue(':nick',$_POST['nick'], PDO::PARAM_STR);
                    $query->execute();
                    $data=$query->fetch();

                    if($pass == $data['pass'])
                    {
                      $_SESSION['user'] = $data['nick'];
                      $_SESSION['logged'] = 1;
                      echo '<h2>You are connected as ' . $_SESSION["user"] . ' !</h2>
                            <script>GoNext()</script>';
                    }
                    else
                    {
                      echo '<h2>Les identifiants entrés ne correspondent pas.</h2>
                            <script>BackLogIn()</script>';
                    }
              }
              else
              {
                echo '<h2>Veuillez remplir les champs.</h2>
                      <script>BackLogIn()</script>';
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
