<!DOCTYPE html>
<html lang="nl">
	<head>
		<meta charset="utf-8">
		<title>Form_client</title>
		<link rel="stylesheet" type="text/css" href="./css/start.css"/>
	</head>
	<body>
		<form name="form1" method="post" action ="">
			<label>Voornaam</label>
			<input type = "text" placeholder="Vul hier je voornaam in" name = "voornaam" required>
			<label>Tussenvoegsel</label>
			<input type = "text" placeholder="Vul hier je tussenvoegsel in" name = "tussenvoegsel">
			<label>Achternaam</label>
			<input type = "text" placeholder="Vul hier je achternaam in" name = "achternaam" required>
			<label>Geboortedatum</label>
			<input type = "date" placeholder="Vul hier je geboortedatum in" name = "geboortedatum" required>
			<input type="submit" value="Verstuur">
		</form>
        <?php
		if (!EMPTY($_POST)) {
			$voornaam=$_POST['voornaam'];
			$tussenvoegsel=$_POST['tussenvoegsel'];
			$achternaam=$_POST['achternaam'];
			$geboortedatum=$_POST['geboortedatum'];

			$digits = 8;
			$client_code = rand(pow(10, $digits-1), pow(10, $digits)-1);
			echo $client_code;
			$verbinding = mysqli_connect("localhost", "root","140Thomas_Timo851", "pws");
			$query =
			"INSERT INTO pws_client(id,voornaam,tussenvoegsel,achternaam,geboortedatum,client_code)
			VALUES(null,'$voornaam','$tussenvoegsel','$achternaam','$geboortedatum','$client_code')";
			$resultaat = mysqli_query($verbinding, $query);
			echo "Je gegevens zijn verstuurd";
			$close = mysqli_close($verbinding);
		}
		?>
	</body>
</html>
