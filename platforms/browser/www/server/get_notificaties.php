<?php
    include('common.php');
    header("Access-Control-Allow-Origin: *");
    header('Content-type: application/json');
    if(!EMPTY($_POST))
    {
		$client_code = $_POST['client'];//$_SESSION["client_code"];
		$query2 = "SELECT * FROM pws_client WHERE client_code='$client_code'";
		$resultaat2 = mysqli_query($verbinding, $query2);
		while ($row2= mysqli_fetch_array($resultaat2))
		{
		//	echo "Goeiemorgen, " . $row2['voornaam'];
		}

		$query = "SELECT * FROM pws_notificaties"; // WHERE client_code = '$s_client_code'
		$resultaat = mysqli_query($verbinding, $query);

        $jsonNotifs = array();
		while ($row= mysqli_fetch_array($resultaat))
		{
            array_push($jsonNotifs, array('titel' => $row['titel'], 'inhoud' => $row['inhoud'], 'notif_id' => $row['id']));
			//createNotification($row['titel'], $row['inhoud'], $row['pictogram'], $row['tijd']);
		}

//        echo json_encode(array('client_code' => $client_code));
        echo json_encode($jsonNotifs);
    }
?>
