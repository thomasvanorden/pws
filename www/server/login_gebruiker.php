<?php
    if (!EMPTY($_POST)) {
        session_start();
        $gebruikersnaam = $_POST["user"];
        $wachtwoord = md5($_POST["pass"]); // hashing
        $verbinding = mysqli_connect("localhost","root","140Thomas_Timo851","pws");
        $query = "SELECT * FROM pws_gebruiker WHERE gebruikersnaam='$gebruikersnaam' AND wachtwoord='$wachtwoord'";
        $resultaat = mysqli_query($verbinding, $query);
        while ($row = mysqli_fetch_array($resultaat)) {
            $_SESSION["user"] = $gebruikersnaam;
            $_SESSION["time"] = date("Y-m-d",time());
            echo "loginsuccess";
            exit();
        }
        echo "loginfail";
    }
?>
