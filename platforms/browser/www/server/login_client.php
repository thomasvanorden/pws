<?php
    include('common.php');
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Credentials: true");
    header("Access-Control-Allow-Methods: *");

  if (!EMPTY($_POST)) {
    $geboortedatum = $_POST["geboortedatum"];
    $client_code = $_POST["client_code"];
    $query = "SELECT * FROM pws_client WHERE client_code='$client_code' AND geboortedatum='$geboortedatum'";
    $resultaat = mysqli_query($verbinding, $query);
    while ($row= mysqli_fetch_array($resultaat)) {
        echo json_encode(array("loginstatus" => "OK", "client_code" => $client_code));
        exit();
    }
    echo json_encode(array("loginstatus" => "ERROR"));
  }
?>
