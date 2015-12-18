<p>Uploading file...</p>
    <?php session_start();
    require_once('139E023.php');
	foreach(array('video', 'audio') as $type) {
    	if (isset($_FILES["${type}-blob"])) {

            $id    = $_SESSION['actualId'];
            $owner = $_SESSION['user'];

        	$fileName = $_POST["${type}-filename"];

            $onlyName = preg_replace('/\\.[^.\\s]{3,4}$/', '', $fileName);

        	$uploadDirectory = "uploads/$fileName";
            $bdd->exec("INSERT INTO quotes_data(id, url, owner, quote_id) VALUES('', '$onlyName', '$owner', '$id')");

            $query = $bdd->prepare("SELECT * FROM users WHERE nick = '$owner'");
            $query->execute();
            $result = $query->fetch();
            
            $increment = $result["score"] + 1;

            $bdd->exec("UPDATE users SET score = '$increment' WHERE nick = '$owner'");
 
        	if (!move_uploaded_file($_FILES["${type}-blob"]["tmp_name"], $uploadDirectory)) {
            echo("Problem moving uploaded file.");
        	}

        echo($uploadDirectory);

    	}
	}

    echo "success";
	?>