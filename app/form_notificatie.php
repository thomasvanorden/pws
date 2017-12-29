<?php session_start();?>
<!DOCTYPE html>
<html lang="nl">
	<head>
		<title>Form_notificatie</title>
		<meta charset="utf-8">
		<?php
			$verbinding = mysqli_connect("localhost","root","140Thomas_Timo851","pws");
		?>

	</head>
	<body>
		<form name="form1" method="post" action ="" enctype="multipart/form-data">
			<input type = "text" placeholder="Vul hier de titel in" name = "titel" required>
			<p><input type = "file" value="pictogram" name ="pictogram" accept="image/*"></p>
			<input type = "reset" value = "Reset">
			<input type = "submit" value = "Verstuur">
		</form>
	<!--	<textarea rows="4" cols="50" name="inhoud" id="inhoud" form="form1" required></textarea> -->
		<?php
			if (!strcmp($_SESSION['gebruikersnaam'], "")) {
				header("Location: inloggen.php");
				exit();
			}

			if (!EMPTY($_POST))
			{
				$ftp_server = "127.0.0.1";
				$ftp_user_name = "daemon";
				$ftp_user_pass = "140Thomas_Timo851";
				$destination_file = "pws/timotankwagen.github.io/app/res/img/";
				$source_file = realpath($_FILES['pictogram']['tmp_name']);
				$file_name=$_FILES['pictogram']['name'];

				$conn_id = ftp_connect($ftp_server);
				$login_result = ftp_login($conn_id, $ftp_user_name, $ftp_user_pass);

				if ((!$conn_id) && (!$login_result)) {
						echo "FTP connection has failed!<br>";
						echo "Attempted to connect to $ftp_server for user $ftp_user_name <br>";
						exit;
				} else {
						echo "<br> Connected to $ftp_server, for user $ftp_user_name <br><br>";
				}

				if (!strcmp($_FILES['pictogram']['name'], "")) {
					$destination_file .= "test.png";
					$source_file = "./res/img/test.png";
				} else {
					$destination_file .= $_FILES['pictogram']['name'];
				}

				$upload = ftp_put($conn_id, $destination_file, $source_file, FTP_BINARY);
				if (!$upload) {
						echo "FTP upload has failed!<br>";
				} else {
						echo "Uploaded $source_file <br> to $ftp_server <br> as $destination_file <br>";
				}

				ftp_close($conn_id);

				$client_notificatie_id=1;
				$tijd= date('Y-m-d H:i:s');
				$afzender_gebruikersnaam=$_SESSION['gebruikersnaam'];
				$client_code=555;
				$titel=$_POST['titel'];
				$inhoud="test";

				if(strcmp($_SESSION['gebruikersnaam'], ""))
				{
					echo $_SESSION['gebruikersnaam'];
					$query =
					"INSERT INTO pws_notificaties(id,client_code,client_notificatie_id,tijd,pictogram,titel,inhoud,afzender_gebruikersnaam)
					VALUES(null,'$client_code','$client_notificatie_id','$tijd','$file_name','$titel','$inhoud','$afzender_gebruikersnaam')";

					$resultaat = mysqli_query($verbinding, $query);
					echo "Je gegevens zijn verstuurd<br/>";
				}
				else
				{
					echo "Geen gebruikersnaam opgeslagen in \$_SESSION<br/>";
				}

	      		$close = mysqli_close($verbinding);
			}
		?>
	</body>
</html>
