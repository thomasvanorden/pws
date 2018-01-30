<?php
    include('common.php');
    header("Access-Control-Allow-Origin: *");
    session_start();
  if (!EMPTY($_POST)) {
      $voornaam=$_POST['voornaam'];
      $tussenvoegsel=$_POST['tussenvoegsel'];
      $achternaam=$_POST['achternaam'];
      $geboortedatum=$_POST['geboortedatum'];

      $digits = 8;
      $client_code = rand(pow(10, $digits-1), pow(10, $digits)-1);
      $query =
      "INSERT INTO pws_client(voornaam,tussenvoegsel,achternaam,geboortedatum,client_code)
      VALUES('$voornaam','$tussenvoegsel','$achternaam','$geboortedatum','$client_code')";
      $resultaat = mysqli_query($verbinding, $query);
      echo json_encode(array("insertstatus" => "OK"));
      $_SESSION["client_code"] = $client_code;

      $close = mysqli_close($verbinding);
  }
?>
