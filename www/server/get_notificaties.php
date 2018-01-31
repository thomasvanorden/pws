<?php
    include('common.php');
    header("Access-Control-Allow-Origin: *");
    if(!EMPTY($_POST))
    {
		$client_code = $_POST["client_code"];
		$query2 = "SELECT * FROM pws_client WHERE client_code='$client_code'";
		$resultaat2 = mysqli_query($verbinding, $query2);
		while ($row2= mysqli_fetch_array($resultaat2))
		{
		//	echo "Goeiemorgen, " . $row2['voornaam'];
		}

		$query = "SELECT * FROM pws_notificaties WHERE client_code = '$client_code'";
		$resultaat = mysqli_query($verbinding, $query);

    $jsonNotifs = array();
		while ($row= mysqli_fetch_array($resultaat))
		{
            array_push($jsonNotifs, array('titel' => $row['titel'], 'inhoud' => $row['inhoud'], 'notif_id' => $row['id'],
            'sender' => $row['afzender_gebruikersnaam'], 'picname' => $row['pictogram'], 'sender_name' => ($row['voornaam'] . " " .$row['tussenvoegsel'] . " " .$row['achternaam']),
            'profielfoto' => $));
		}
        echo json_encode($jsonNotifs);
        $my_file = 'notificaties.txt';
        $handle = fopen($my_file, 'w') or die('Cannot open file:  '.$my_file);
        file_put_contents("notificaties.txt",json_encode($jsonNotifs));
        fclose($handle);
    }
?>
