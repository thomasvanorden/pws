<?php session_start();?>
<!DOCTYPE html>
<html lang="nl">
	<head>
		<title>Inloggen client</title>
		<meta charset="utf-8">
	</head>
	<body>
		<form name="form1" method="post" action ="">
            <input type = "date" placeholder="Vul hier je geboortedatum in jjjj-mm-dd" name = "geboortedatum" required>
            <input type = "number" placeholder="Vul hier je client_code in" name = "client_code" required>
			<input type = "reset" value = "Reset">
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
			while ($row= mysqli_fetch_array($resultaat)){
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
