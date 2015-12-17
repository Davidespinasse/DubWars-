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
                    <a href="theme.php"> <img class="icons" src="img/1.png" alt="">Themes</a>
                </li>
                <li>
                    <a href="#menu-togglephone"><img class="icons" src="img/2.png" alt="">Trending sounds</a>
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
                        <div class="col-lg-2 col-md-2 col-xs-1 blank"></div>
                            <?php session_start();
                                $quoteId = $_GET['quote'];
                                $_SESSION['actualId'] = $_GET['quote'];
                                $bdd = new PDO('mysql:host=localhost:8889;dbname=dubwars;charset=utf8', 'root', 'root');
                                $query=$bdd->prepare("SELECT id, quote, audio FROM quotes_list WHERE id = '$quoteId'");
                                $query->execute();
                                $data=$query->fetch();
                                echo "<audio src='". $data["audio"] ."' id='audio'></audio>";
                                echo "<h2 class='col-lg-6 col-md-6 col-xs-6 name'>" . $data["quote"] . "</h2>";
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
                        <video autoplay width='100%' height='100%' id='video'></video>
                    </div>
                    <div class="col-lg-12 col-md-12 col-xs-12 command">
                    <a class="col-lg-2 col-md-2 col-xs-2 blank" href="#" > </a>
                    
                    <div class="col-lg-3 col-md-3 col-xs-2 blank"></div>
                    <a class="col-lg-2 col-md-2 col-xs-4 start" href="#" id="startButton"> <p>Start</p> <img src="img/arrow.png" alt=""></a>
                    <a class="col-lg-2 col-md-2 col-xs-4 restart" href="#" id="restartRecordButton"> <p>Restart </p><img src="img/restart.png" alt=""></a>
                    <div class="col-lg-3 col-md-3 col-xs-2 blank"></div>
                    <a class="col-lg-2 col-md-2 col-xs-2 blank" href="#" > </a>
                    
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://cdn.webrtc-experiment.com/MediaStreamRecorder.js"> </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="js/script.js"></script>
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