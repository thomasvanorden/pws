<!DOCTYPE html>
<html lang="nl">
	<head>
		<meta charset="utf-8">
		<title>Form_gebruiker</title>
		<link rel="stylesheet" type="text/css" href="./css/start.css"/>
	</head>
	<body>
		<form name="form1" method="post" action ="">
			<label>Gebruikersnaam</label>
			<input type = "text" placeholder="Vul hier je gebruikersnaam in" name = "gebruikersnaam" required>
			<label>Wachtwoord</label>
			<input type = "password" placeholder="Vul hier je wachtwoord in" name = "wachtwoord" required>
			<label>Wachtwoord bevestigen</label>
			<input type = "password" placeholder="Bevestig hier je wachtwoord" name = "bwachtwoord" required>
			<label>E-mailadres</label>
			<input type = "email" placeholder="Vul hier je emailadres in" name = "email" required>
			<label>Voornaam</label>
			<input type = "text" placeholder="Vul hier je voornaam in" name = "voornaam" required>
			<label>Tussenvoegsel</label>
			<input type = "text" placeholder="Vul hier je tussenvoegsel in" name = "tussenvoegsel">
			<label>Achternaam</label>
			<input type = "text" placeholder="Vul hier je achternaam in" name = "achternaam" required>
			<label>Geboortedatum</label>
			<input type = "date" placeholder="Vul hier je geboortedatum in" name = "geboortedatum">
			<label>Clientcode</label>
			<input type = "text" placeholder="Vul hier je client-code in" name = "client_code" required> <!--text/number field-->
			<label>Ben je een verzorger of een familielid?</label><br/>
			<input type = "radio" placeholder="true" name = "isverzorger" required>Ik ben een verzorger</input><br/>
			<input type = "radio" placeholder="false" name = "isverzorger" required>Ik ben een familielid</input><br/><br/>
			<label>Profielfoto</label>
			<input type = "file" placeholder="Selecteer je profielfoto" name = "profielfoto">
			<input type = "submit" value = "Verstuur">
		</form>
        <?php
					if (!EMPTY($_POST)) {
						$gebruikersnaam=$_POST['gebruikersnaam'];
						$wachtwoord=password_hash($_POST['wachtwoord'], PASSWORD_DEFAULT);
						$email=$_POST['email'];
						$voornaam=$_POST['voornaam'];
						$tussenvoegsel=$_POST['tussenvoegsel'];
						$achternaam=$_POST['achternaam'];
						$geboortedatum=$_POST['geboortedatum'];
						$client_code=$_POST['client_code'];
						$isverzorger=$_POST['isverzorger'];
						$profielfoto=$_FILES['profielfoto'];
						if (!strcmp($_FILES['profielfoto']['name'], "")) {
							$destination_file .= "test.png";
							$source_file = "./res/img/test.png";
						} else {
							$destination_file .= $_FILES['profielfoto']['name'];
						}

						if (password_verify($_POST['bwachtwoord'], $wachtwoord))
						{
							$verbinding = mysqli_connect("localhost", "root","140Thomas_Timo851", "pws");
							$query =
							"INSERT INTO pws_gebruiker(gebruikersnaam,wachtwoord,email,voornaam,tussenvoegsel,achternaam,geboortedatum,client_code,isverzorger,profielfoto)
							VALUES('$gebruikersnaam','$wachtwoord','$email','$voornaam','$tussenvoegsel','$achternaam','$geboortedatum','$client_code','$isverzorger','$profielfoto')";
							$resultaat = mysqli_query($verbinding, $query);
							echo "Je gegevens zijn verstuurd";
							$close = mysqli_close($verbinding);

							session_start();
							$_SESSION['gebruikersnaam'] = $gebruikersnaam;
							header("Location: form_notificatie.php");
							exit();
						}
						else {
							echo "Wachtwoorden komen niet overeen.";
						}
					}
				?>
	</body>
</html>
