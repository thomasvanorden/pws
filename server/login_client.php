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
  while ($row= mysqli_fetch_array($resultaat)) {
  if ($row['geboortedatum'] == $geboortedatum) {
//    $_SESSION['client_code'] = $row['client_code'];
    echo "Je bent lekker & ingelogd";
  } else {
//    echo "Incorrecte combinatie van geboortedatum en client code.";
  }
  }
  }
?>
