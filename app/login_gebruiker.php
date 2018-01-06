<?php session_start();?>
<!DOCTYPE html>
<html lang="nl">
	<head>
		<meta charset="utf-8">
		<title>Inloggen gebruiker</title>
		<link rel="stylesheet" type="text/css" href="./css/start.css"/>
	</head>
	<body>
		<form id="form" name="form1" method="post" action ="">
			<label>Gebruikersnaam</label>
            <input type = "text" placeholder="Vul hier je gebruikersnaam in" name = "gebruikersnaam" required>
			<label>Wachtwoord</label>
            <input type = "password" placeholder="Vul hier je wachtwoord in" name = "password" required>
			<input type = "submit" value = "Verstuur">
		</form>
        <?php
		if (!EMPTY($_POST)) {
			$gebruikersnaam = $_POST["gebruikersnaam"];
			$verbinding = mysqli_connect("localhost","root","140Thomas_Timo851","pws");
			$query = "SELECT * FROM pws_gebruiker WHERE gebruikersnaam='$gebruikersnaam'";
				// TODO: We krijgen nu een error als een gebruikersnaam niet bestaat in de database, dat moeten we ff fixen.
				/* ZOIETS
					if ($query == null)
					{
						exit();
					}
				*/
			$resultaat = mysqli_query($verbinding, $query);
			while ($row= mysqli_fetch_array($resultaat)){
				if (password_verify($_POST["password"], $row['wachtwoord']) {
					$_SESSION['gebruikersnaam'] = $row['gebruikersnaam'];
					echo "Ingelogd.";
					header("Location: form_notificatie.php");
					exit();
				} else {
					echo "Incorrect wachtwoord.";
			}
		}
	}
		?>
	</body>
</html>
