<?php
    include('common.php');
    include('file_transfer.php');
    header("Access-Control-Allow-Origin: *");
    
  if (!EMPTY($_POST))
  {
    $my_file = 'notificatie.txt';
    $handle = fopen($my_file, 'w') or die('Cannot open file: ' . $my_file);
    file_put_contents("notificatie.txt",print_r($_POST, true));
    fclose($handle);

    $afzender_gebruikersnaam=$_POST["gebruikersnaam"];
    $query_cc = "SELECT client_code FROM pws_gebruiker WHERE gebruikersnaam = '$afzender_gebruikersnaam'";
    $resultaat_cc = mysqli_query($verbinding, $query_cc);
    $client_code=0;
    while ($row= mysqli_fetch_array($resultaat_cc)) {
      $client_code = $row['client_code'];
    }

    $client_notificatie_id=1;
    $tijd= date('Y-m-d H:i:s');
    $titel=$_POST['titel'];
    $inhoud=$_POST['inhoud'];
    $file_name = fileTransfer($_FILES['pictogram'],$afzender_gebruikersnaam);
      $query =
      "INSERT INTO pws_notificaties(id,client_code,client_notificatie_id,tijd,pictogram,titel,inhoud,afzender_gebruikersnaam)
      VALUES(null,'$client_code','$client_notificatie_id','$tijd','$file_name','$titel','$inhoud','$afzender_gebruikersnaam')";
      $resultaat = mysqli_query($verbinding, $query);
      echo json_encode(array("notifstatus" => "OK"));
    $close = mysqli_close($verbinding);
  }
  exit();
?>
