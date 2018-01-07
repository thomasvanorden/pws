<?php session_start();?>
<!DOCTYPE html>
<html lang="nl">
	<head>
		<meta charset="utf-8">
		<title>Inloggen client</title>
		<link rel="stylesheet" type="text/css" href="./css/start.css"/>
	</head>
	<body>
		<form name="form1" method="post" action ="">
			<label>Geboortedatum</label>
            <input type = "date" placeholder="Vul hier je geboortedatum in jjjj-mm-dd" name = "geboortedatum" required>
			<label>Geboortedatum</label>
            <input type = "text" placeholder="Vul hier je client_code in" name = "client_code" required> <!--Number field geeft die rare pijltjes, misschien text van maken?-->
			<input type = "submit" value = "Verstuur">
		</form>
        <?php
		if (!EMPTY($_POST)) {
			$geboortedatum = $_POST["geboortedatum"];
			$client_code = $_POST["client_code"];
			$verbinding = mysqli_connect("localhost","root","140Thomas_Timo851","pws");
			$query = "SELECT * FROM pws_client WHERE client_code='$client_code'";
			$resultaat = mysqli_query($verbinding, $query);
		    if ($resultaat->num_rows==0) {
		    	echo "incorrectie client code";
		    }
			while ($row= mysqli_fetch_array($resultaat)) {
				if ($row['geboortedatum'] == $geboortedatum) {
					$_SESSION['client_code'] = $row['client_code'];
					echo "Ingelogd.";
					header("Location: home_client.php");
					exit();
				} else {
					echo "Incorrecte combinatie van geboortedatum en client code.";
				}
			}
		}
		?>
	</body>
</html>
