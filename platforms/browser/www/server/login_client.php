<?php
    include('common.php');
    header("Access-Control-Allow-Origin: *");
  if (!EMPTY($_POST)) {
    session_start();
    $geboortedatum = $_POST["geboortedatum"];
    $client_code = $_POST["client_code"];
    $query = "SELECT * FROM pws_client WHERE client_code='$client_code' AND geboortedatum='$geboortedatum'";
    $resultaat = mysqli_query($verbinding, $query);
    while ($row= mysqli_fetch_array($resultaat)) {
        $_SESSION['client_code'] = $row['client_code'];
        echo "loginsuccess";
        exit();
    }
    echo "loginfail";
  }
?>
