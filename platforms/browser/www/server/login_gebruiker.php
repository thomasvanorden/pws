<?php
    include('common.php');
    header("Access-Control-Allow-Origin: *");

    if (!EMPTY($_POST)) {
        $gebruikersnaam = $_POST["gebruikersnaam"];
        $wachtwoord = md5($_POST["password"]);
        $query = "SELECT * FROM pws_gebruiker WHERE gebruikersnaam='$gebruikersnaam' AND wachtwoord='$wachtwoord'";
        $resultaat = mysqli_query($verbinding, $query);
        while ($row = mysqli_fetch_array($resultaat)) {
            echo json_encode(array("loginstatus" => "OK", "username" => $gebruikersnaam));
            exit();
        }
        echo json_encode(array("loginstatus" => "ERROR"));
    }
?>
