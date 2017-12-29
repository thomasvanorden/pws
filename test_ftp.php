<!DOCTYPE html>
<html lang="nl">
	<head>
		<title>sjabloon</title>
		<meta charset="utf-8">
	</head>
	<body>
		<form name="form1" method="post" action ="" enctype="multipart/form-data">
			<p><input type = "file" value="pictogram" name ="pictogram"></p>
			<p><input type = "submit" value = "Verstuur"></p>
		</form>
        <?php
		/*
		opmerKINKYKIKIjes

		*/
        if (!EMPTY($_FILES)){
            $ftp_server = "127.0.0.1";
            $ftp_user_name = "daemon";
            $ftp_user_pass = "140Thomas_Timo851";
            $destination_file = "pws/timotankwagen.github.io/app/res/img/".($_FILES['pictogram']['name']);
            $source_file = realpath($_FILES['pictogram']['tmp_name']);
            // "/Applications/XAMPP/htdocs/pws/timotankwagen.github.io/app/res/img/";

            // set up basic connection
            $conn_id = ftp_connect($ftp_server);

            // login with username and password
            $login_result = ftp_login($conn_id, $ftp_user_name, $ftp_user_pass);

            // check connection
            if ((!$conn_id) && (!$login_result)) {
                echo "FTP connection has failed!<br>";
                echo "Attempted to connect to $ftp_server for user $ftp_user_name <br>";
                exit;
            } else {
                echo "<br> Connected to $ftp_server, for user $ftp_user_name <br><br>";
            }

            // upload the file
            $upload = ftp_put($conn_id, $destination_file, $source_file, FTP_BINARY);

            // check upload status
            if (!$upload) {
                echo "FTP upload has failed!<br>";
            } else {
                echo "Uploaded $source_file <br> to $ftp_server <br> as $destination_file <br>";
            }

            // close the FTP stream
            ftp_close($conn_id);
        }
        ?>
	</body>
</html>
