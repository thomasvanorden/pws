<?php
  session_start();
    if (!EMPTY($_POST)) {
        $gebruikersnaam=$_POST['user'];
      if (!file_exists('img/'.$gebruikersnaam)) {
        mkdir('img/'.$gebruikersnaam, 0777, true);
      }

      $my_file = 'gebruiker.txt';
      $handle = fopen($my_file, 'w') or die('Cannot open file:  '.$my_file);
      file_put_contents("gebruiker.txt",print_r($_POST, true));
      fclose($handle);
        $wachtwoord=md5($_POST['pass']);
        $email=$_POST['email'];
        $voornaam=$_POST['fname'];
        $tussenvoegsel=$_POST['mname'];
        $achternaam=$_POST['lname'];
        $geboortedatum=$_POST['birth'];
        $client_code=$_POST['client'];
        $isverzorger=$_POST['verzorger'];
        //$profielfoto=$_POST['picpath'];
        $profielfoto="hoi.png";
        /*
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
        echo "'$gebruikersnaam','$wachtwoord','$email','$voornaam','$tussenvoegsel','$achternaam',DATE($geboortedatum),'$client_code','$isverzorger','$profielfoto')";
        $close = mysqli_close($verbinding);

//        session_start();
//        $_SESSION['gebruikersnaam'] = $gebruikersnaam;
//        header("Location: form_notificatie.html");
        exit();
    }
?>
