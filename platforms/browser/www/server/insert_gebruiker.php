<?php
    include('common.php');
    include('file_transfer.php');
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Credentials: true");
    header("Access-Control-Allow-Methods: *");
    session_start();
    if (!EMPTY($_POST)) {
        $gebruikersnaam=$_POST['gebruikersnaam'];
        $_SESSION['user'] = $gebruikersnaam;
        mkdir('img/'.$gebruikersnaam, 0777, true);

      $my_file = 'gebruiker.txt';
      $handle = fopen($my_file, 'w') or die('Cannot open file:  '.$my_file);
      file_put_contents("gebruiker.txt",print_r($_POST, true));
      fclose($handle);
        $wachtwoord=md5($_POST['wachtwoord']);
        $email=$_POST['email'];
        $voornaam=$_POST['voornaam'];
        $tussenvoegsel=$_POST['tussenvoegsel'];
        $achternaam=$_POST['achternaam'];
        $geboortedatum=$_POST['geboortedatum'];
        $client_code=$_POST['client_code'];
        $isverzorger=$_POST['isverzorger'];
        $profielfoto=fileTransfer($_FILES['afile']);

        $query =
        "INSERT INTO pws_gebruiker(gebruikersnaam,wachtwoord,email,voornaam,tussenvoegsel,achternaam,geboortedatum,client_code,isverzorger,profielfoto)
        VALUES('$gebruikersnaam','$wachtwoord','$email','$voornaam','$tussenvoegsel','$achternaam','$geboortedatum','$client_code','$isverzorger','$profielfoto')";
        $resultaat = mysqli_query($verbinding, $query);
        echo json_encode(array("loginstatus" => "OK"));
        $close = mysqli_close($verbinding);
        exit();
    }
?>
