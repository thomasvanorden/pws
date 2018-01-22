<?php
    if (!EMPTY($_POST)) {
        $gebruikersnaam=$_POST['user'];
        $wachtwoord=password_hash($_POST['pass'], PASSWORD_DEFAULT);
        $email=$_POST['email'];
        $voornaam=$_POST['fname'];
        $tussenvoegsel=$_POST['mname'];
        $achternaam=$_POST['lname'];
        $geboortedatum=$_POST['birth'];
        $client_code=$_POST['client'];
        $isverzorger=$_POST['verzorger'];
        $profielfoto=$_POST['picpath'];/*
        if (!strcmp($_FILES['profielfoto']['name'], "")) {
            $destination_file .= "test.png";
            $source_file = "./res/img/test.png";
        } else {
            $destination_file .= $_FILES['profielfoto']['name'];
        }*/

        $verbinding = mysqli_connect("localhost", "root","140Thomas_Timo851", "pws");
        $query =
        "INSERT INTO pws_gebruiker(gebruikersnaam,wachtwoord,email,voornaam,tussenvoegsel,achternaam,geboortedatum,client_code,isverzorger,profielfoto)
        VALUES('$gebruikersnaam','$wachtwoord','$email','$voornaam','$tussenvoegsel','$achternaam','$geboortedatum','$client_code','$isverzorger','$profielfoto')";
        $resultaat = mysqli_query($verbinding, $query);
        echo "Je gegevens zijn verstuurd";
        $close = mysqli_close($verbinding);

//        session_start();
//        $_SESSION['gebruikersnaam'] = $gebruikersnaam;
//        header("Location: form_notificatie.html");
        exit();
    }
?>
