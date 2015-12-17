<p>Uploading file...</p>
    <?php session_start();
    $bdd = new PDO('mysql:host=localhost:8889;dbname=dubwars;charset=utf8', 'root', 'root');
	foreach(array('video', 'audio') as $type) {
    	if (isset($_FILES["${type}-blob"])) {

            $id    = $_SESSION['actualId'];
            $owner = $_SESSION['user'];

        	$fileName = $_POST["${type}-filename"];

            $onlyName = preg_replace('/\\.[^.\\s]{3,4}$/', '', $fileName);

        	$uploadDirectory = "uploads/$fileName";
            $bdd->exec("INSERT INTO quotes_data(id, url, owner, quote_id) VALUES('', '$onlyName', '$owner', '$id')");

        	if (!move_uploaded_file($_FILES["${type}-blob"]["tmp_name"], $uploadDirectory)) {
            echo("Problem moving uploaded file.");
        	}

        echo($uploadDirectory);

    	}
	}

    echo "success";
	?>