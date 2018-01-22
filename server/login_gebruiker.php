<?php
  if (!EMPTY($_POST)) {
  $gebruikersnaam = $_POST["gebruikersnaam"];
  $verbinding = mysqli_connect("localhost","root","140Thomas_Timo851","pws");
  $query = "SELECT * FROM pws_gebruiker WHERE gebruikersnaam='$gebruikersnaam'";
  // TODO: We krijgen nu een error als een gebruikersnaam niet bestaat in de database, dat moeten we ff fixen.
  /* ZOIETS
    if ($query == null)
    {
      exit();
    }
  */
  $resultaat = mysqli_query($verbinding, $query);
  while ($row= mysqli_fetch_array($resultaat)){
  // if (password_verify($_POST["password"], $row['wachtwoord'])) {
  //  $_SESSION['gebruikersnaam'] = $row['gebruikersnaam'];

    echo "Ingelogd.";
    exit();
  }
  echo "Niet ingelogd.";
  }
?>
