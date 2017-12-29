<!DOCTYPE html>
<html lang="nl">
	<head>
		<title>Form_gebruiker</title>
		<meta charset="utf-8">
	</head>
	<body>
		<form name="form1" method="post" action ="">
			<input type = "text" placeholder="Vul hier je gebruikersnaam in" name = "gebruikersnaam" required>
			<input type = "password" placeholder="Vul hier je wachtwoord in" name = "wachtwoord" required>
			<input type = "password" placeholder="Bevestig hier je wachtwoord" name = "bwachtwoord" required>
			<input type = "email" placeholder="Vul hier je emailadres in" name = "email" required>
			<input type = "text" placeholder="Vul hier je voornaam in" name = "voornaam" required>
			<input type = "text" placeholder="Vul hier je tussenvoegsel in" name = "tussenvoegsel">
			<input type = "text" placeholder="Vul hier je achternaam in" name = "achternaam" required>
			<input type = "date" placeholder="Vul hier je geboortedatum in" name = "geboortedatum">
			<input type = "number" placeholder="Vul hier je client-code in" name = "client_code" required>
			<p>Ben je een verzorger of een familielid?</p>
			<input type = "radio" placeholder="true" name = "isverzorger" required>Ik ben een verzorger
			<input type = "radio" placeholder="false" name = "isverzorger" required>Ik ben een familielid
			<input type = "file" placeholder="Selecteer je profielfoto" name = "profielfoto">
			<input type = "reset" value = "Reset">
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
