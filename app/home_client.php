<?php
	ini_set('session.gc_maxlifetime', 3600);
	session_set_cookie_params(3600);
	session_start();
	$verbinding = mysqli_connect("localhost","root","140Thomas_Timo851","pws");
	$s_client_code=$_SESSION['client_code'];
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8"/>
		<meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1, width=device-width"/>
		<link rel="stylesheet" type="text/css" href="./css/style.css"/>
		<title>Home</title>
	</head>
	<body onload="startTime()">
		<script src="./js/time.js"></script>
		<div id="timedate">
			<h1></h1>
			<p></p>
		</div>
		<form name="form1" method="post" action ="">
			<p><input type = "text" placeholder="vul hier ff een message nummertje in" name="klm"></p>
			<p><input type = "submit" value = "Verstuur"></p>
		</form>
		<script>
			function playAudio(notifnode) {
		        var audio = notifnode.getElementsByTagName('audio')[0];
		        audio.play();
			}
		</script>
		<?php
			function createTTSAudio($message)
			{
				$words = urlencode($message);
				$file  = md5($words);
				$file = "./audio/" . $file . ".mp3";

				if (!file_exists($file)) {
			   		$mp3 = file_get_contents(
			    	'https://translate.google.com/translate_tts?ie=UTF-8&q=' . $words . '&tl=nl&client=tw-ob');
			    	file_put_contents($file, $mp3);
				}

				return $file;
			}

			function createNotification($title, $content, $icon_name, $time)
			{
				$ttsFile = "./audio/268ada6d934c253a3188ccff78c2b3a5.mp3";//createTTSAudio($title);

				$appimg_path = "./res/img/test.jpg";
				$icon_path = "./res/img/" . $icon_name;
				echo "
				<div class=\"notification\" onclick=\"playAudio(this);\">
					<audio src=\"$ttsFile\"></audio>
					<div class=\"notifheader\">
						<img src=\"$appimg_path\" width=256px/>
						<h1 class=\"text\">Deze Dementie App is cool</h1>
						<p class=\"text\"><br/>$time</p>
					</div>
					<img src=\"$icon_path\"/>
					<h1 class=\"text\">$title</h1>
					<p class=\"text\">$content</p>
				</div>";
			}
		?>
		<?php
			$query2 = "SELECT * FROM pws_client WHERE client_code='$s_client_code'";
			$resultaat2 = mysqli_query($verbinding, $query2);
			while ($row2= mysqli_fetch_array($resultaat2))
			{
				echo "Goeiemorgen, " . $row2['voornaam'];
			}

			echo "<div id=\"notifications\">";
			$query = "SELECT * FROM pws_notificaties"; // WHERE client_code = '$s_client_code'
			$resultaat = mysqli_query($verbinding, $query);
			while ($row= mysqli_fetch_array($resultaat))
			{
				createNotification($row['titel'], $row['inhoud'], $row['pictogram'], $row['tijd']);
			}
			echo "</div>"
		?>

		<script>
			function showSlides()
			{
				var i;
				var slides = document.getElementsByClassName('notification');
				for (i = 0; i < slides.length; i++) {
						slides[i].style.display = "none";
				}

				slideIndex++;
				if (slideIndex > slides.length) {slideIndex = 1}
			    	slides[slideIndex-1].style.display = "block";

				setTimeout(showSlides, 1000);
			}
			var slideIndex = 0;
			showSlides(slideIndex);

		</script>
		<div class="widget" id="widget_holiday">
			<img src="./res/img/test.png"/>
			<h1 class="text">$title</h1>
			<p class="text">$content</p>
		</div>

			<script src="./js/widgets.js"></script>

		<div class="widget" id="widget_weather">
			<img src="./res/img/test.png"/>
			<h1 class="text">$title</h1>
			<p class="text">$content</p>
		</div>

		<script type="text/javascript">updateWidgets();</script>

	</body>
</html>
