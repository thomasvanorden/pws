<?php
header("Access-Control-Allow-Origin: *");
$verbinding = mysqli_connect("localhost","root","140Thomas_Timo851","pws");
/*
  if (!strcmp($_SESSION['gebruikersnaam'], "")) {
    header("Location: inloggen.php");
    exit();
  }
*/
  if (!EMPTY($_POST))
  {
    $my_file = 'file.txt';
    $handle = fopen($my_file, 'w') or die('Cannot open file:  '.$my_file);
    file_put_contents("file.txt",print_r($_POST, true));
    fclose($handle);
    $ftp_server = "localhost";
    $ftp_user_name = "daemon";
    $ftp_user_pass = "140Thomas_Timo851";
    $destination_file = "file2.txt";
    $source_file = realpath($_POST['pictogram']);
    $file_name=$_POST['pictogram'];

    $conn_id = ftp_connect($ftp_server);
    $login_result = ftp_login($conn_id, $ftp_user_name, $ftp_user_pass);
    if ((!$conn_id) && (!$login_result)) {
        echo "FTP connection has failed!<br>";
  //    echo "Attempted to connect to $ftp_server for user $ftp_user_name <br>";
        exit;
    } else {
       echo "Connected to $ftp_server, for user $ftp_user_name <br><br>";
    }

  //  if (!strcmp($_POST['pictogram'], "")) {
//      $destination_file .= "test.png";
      $source_file = "file.txt";
  //  } else
    {
    }

    echo "Uploaded $source_file <br> to $ftp_server <br> as $destination_file <br>";

    $upload = ftp_put($conn_id, $destination_file, $source_file, FTP_BINARY);
    if (!$upload) {
        echo "FTP upload has failed!<br>";
    } else {
        echo "Uploaded $source_file <br> to $ftp_server <br> as $destination_file <br>";
    }
    ftp_close($conn_id);

    $client_notificatie_id=1;
    $tijd= date('Y-m-d H:i:s');
    // $afzender_gebruikersnaam=$_SESSION['gebruikersnaam'];
    $afzender_gebruikersnaam="Je mama";
    $client_code=555;
    $titel=$_POST['titel'];
    $inhoud=$_POST['inhoud'];

  //  if(strcmp($_SESSION['gebruikersnaam'], ""))
    {
//      echo $_SESSION['gebruikersnaam'];
      $query =
      "INSERT INTO pws_notificaties(id,client_code,client_notificatie_id,tijd,pictogram,titel,inhoud,afzender_gebruikersnaam)
      VALUES(null,'$client_code','$client_notificatie_id','$tijd','$file_name','$titel','$inhoud','$afzender_gebruikersnaam')";
      $resultaat = mysqli_query($verbinding, $query);
    }
/*    else
    {
      echo "Geen gebruikersnaam opgeslagen in \$_SESSION<br/>";
    }
*/
        $close = mysqli_close($verbinding);
  }
?>
