<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>template 01</title>
    <link rel="style/stylesheet" href="style.css">
</head>
<body>
	<video autoplay width="400" height="400" id='video'></video>
	<input type="button" id="startButton" value="start recording">
	
	<audio src="audiodb/darthvater_jesuistonpere.mp3" controls id="audio"></audio>

	<?php
	foreach(array('video', 'audio') as $type) {
    	if (isset($_FILES["${type}-blob"])) {

        	$fileName = $_POST["${type}-filename"];
        	$uploadDirectory = "uploads/$fileName";

        	if (!move_uploaded_file($_FILES["${type}-blob"]["tmp_name"], $uploadDirectory)) {
            echo("problem moving uploaded file");
        	}

        echo($uploadDirectory);

    	}
	}
	?>

	<script src="https://cdn.webrtc-experiment.com/MediaStreamRecorder.js"> </script>
	<script src="js/script.js"></script>
</body>
</html>