<?php
    include('common.php');
    header("Access-Control-Allow-Origin: *");
    if(!EMPTY($_POST))
    {
		$client_code = $_POST["client_code"];

		$query = "SELECT * FROM pws_notificaties WHERE client_code = '$client_code'";
		$resultaat = mysqli_query($verbinding, $query);

        $jsonNotifs = array();
        while ($row= mysqli_fetch_array($resultaat))
		{
            $afzendergebruikersnaam = $row['afzender_gebruikersnaam'];
    		$query2 = "SELECT * FROM pws_gebruiker WHERE gebruikersnaam='$afzendergebruikersnaam'";
    		$resultaat2 = mysqli_query($verbinding, $query2);
    		while ($row2= mysqli_fetch_array($resultaat2))
    		{
                array_push($jsonNotifs, array('titel' => $row['titel'], 'inhoud' => $row['inhoud'], 'notif_id' => $row['id'],
                'sender' => $row['afzender_gebruikersnaam'], 'picname' => $row['pictogram'], 'sender_name' => ($row2['voornaam'] . " " . $row2['tussenvoegsel'] . " " . $row2['achternaam']),
                'profielfoto' => $row2['profielfoto']));
    		}
		}
        echo json_encode($jsonNotifs);
        $my_file = 'notificaties.txt';
        $handle = fopen($my_file, 'w') or die('Cannot open file:  '.$my_file);
        file_put_contents("notificaties.txt",json_encode($jsonNotifs));
        fclose($handle);
    }
?>
