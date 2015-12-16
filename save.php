<p> Uploading file...</p>
    <?php session_start();
    $bdd = new PDO('mysql:host=localhost:8889;dbname=dubwars;charset=utf8', 'root', 'root');
	foreach(array('video', 'audio') as $type) {
    	if (isset($_FILES["${type}-blob"])) {

        	$fileName = $_POST["${type}-filename"];
        	$uploadDirectory = "uploads/$fileName";
            $bdd->exec("INSERT INTO quotes_data(id, url, owner) VALUES('', '$fileName', '')");

        	if (!move_uploaded_file($_FILES["${type}-blob"]["tmp_name"], $uploadDirectory)) {
            echo("Problem moving uploaded file.");
        	}

        echo($uploadDirectory);

    	}
	}

    echo "success";
	?>