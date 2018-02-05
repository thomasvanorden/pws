<?php
    include('common.php');
    include('file_transfer.php');
    header("Access-Control-Allow-Origin: *");
    if (!EMPTY($_POST)) {
        $gebruikersnaam=$_POST['gebruikersnaam'];

        $query_check = "SELECT * FROM pws_gebruiker WHERE gebruikersnaam='$gebruikersnaam'";
        $resultaat_check = mysqli_query($verbinding, $query_check);
        while ($row = mysqli_fetch_array($resultaat_check))
        {
            echo json_encode(array("loginstatus" => "ERROR", "error" => "userexists"));
            $close = mysqli_close($verbinding);
            exit();
        }
        mkdir('img/'.$gebruikersnaam, 0777, true);

        $wachtwoord=md5($_POST['wachtwoord']);
        $email=$_POST['email'];
        $voornaam=$_POST['voornaam'];
        $tussenvoegsel=$_POST['tussenvoegsel'];
        $achternaam=$_POST['achternaam'];
        $geboortedatum=$_POST['geboortedatum'];
        $client_code=$_POST['client_code'];
        $isverzorger=$_POST['isverzorger'];
        $profielfoto=fileTransfer($_FILES['afile'], $gebruikersnaam);

        $query =
        "INSERT INTO pws_gebruiker(gebruikersnaam,wachtwoord,email,voornaam,tussenvoegsel,achternaam,geboortedatum,client_code,isverzorger,profielfoto)
        VALUES('$gebruikersnaam','$wachtwoord','$email','$voornaam','$tussenvoegsel','$achternaam','$geboortedatum','$client_code','$isverzorger','$profielfoto')";
        $resultaat = mysqli_query($verbinding, $query);

        echo json_encode(array("loginstatus" => "OK"));
        $close = mysqli_close($verbinding);
        exit();
    }
?>
