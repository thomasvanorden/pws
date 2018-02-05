# Alzheimer App
Hieronder zullen wij u stap voor stap door het proces lopen om ons project op te starten vanaf de broncode, of om de app
te downloaden op uw smartphone, om de van te voren gebouwde app te testen.
Daarnaast zullen wij u ook uitleggen hoe u een XAMPP server kunt opstarten met de juiste bestanden, om onze applicatie mee te testen, aangezien deze zeer beperkte functionaliteit heeft zonder server.

## App
### Benodigdheden
U heeft een aantal dingen nodig voordat u kunt beginnen met de app op uw telefoon opstarten.
* Smartphone met een van de volgende besturingssystemen
    * Android vanaf versie 6.1.2
    * Windows Phone vanaf versie 4.4.3
* Een computer met een van de volgende besturingssystemen
    * Windows
    * Mac OSX
* Een werkend netwerk
    * Een host met een vast lokaal IPv4-adres

### Maak keuzes in het leven
U kunt onze app op twee manieren testen:
* Via de broncode in combinatie met Phonegap Desktop & Phonegap Mobile
* Via de .apk/.appx te downloaden op uw telefoon

Voor beide opties heeft u een werkende server nodig die wij verder zullen uitleggen onder [Server](##server) 

### Broncode + Phonegap
Om onze app op te starten met de broncode, moet Phonegap (CLI?) eerst geïnstalleerd worden.
Instructies hiervoor staan in het verslag. <zeggen we dit? of nog een keer uitleggen: JA!>

Als Phonegap geïnstalleerd is, downloadt u de broncode vanaf Github: https://github.com/thomasvanorden/pws.
U klikt op de groene knop rechtsboven met de tekst "Clone or download".
Dan verschijnt een klein venster, en klikt u op "Download ZIP".

Nadat het bestand is gedownload pakt u het uit op de gewenste locatie; dit heeft geen invloed op de werking van de app. <ff alleen app kopieren>
Daarna start u Phonegap op, en <project opstarten + verbinding met telefoon enzo>

### Van te voren gebouwd (klinkt echt kut)
<werkt alleen op iOS en Windows Phone en hoe laten we het hem downloaden? QR en link?ïï + uitleg>
Als de app geïnstalleerd is op uw smartphone, is het klaar voor gebruik!

End with an example of getting some data out of the system or using it for a little demo

## Server
Om een server op te starten voor onze app, moet XAMPP eerst geïnstalleerd worden.
Instructies hiervoor staan in het verslag. <zeggen we dit? of nog een keer uitleggen: JA!>

Als XAMPP is geïnstalleerd, bladert u in de verkenner naar de <installatiemap van XAMPP>.
Plak vervolgens het mapje "pws" uit de gedownloade broncode (zie stappen hierboven) in het mapje htdocs (XAMPP/htdocs) in de installatiemap van XAMPP.
In het mapje kunt u eventueel het mapje "app" verwijderen, aangezien de server dit niet nodig heeft. (vertellen we dat erbij?)

Start vervolgens in XAMPP de Apache HTTP server, en de MySQL server op, wacht todat deze beiden een groen bolletje krijgen.
U kunt nu verbinding leggen met de server!

## Gebruik
Zoals u misschien is opgevallen tijdens het opstarten van de app, is dat de app als aller eerste om een IP-adres vraagt, deze heeft de app nodig om met de server op de juiste wijze contact te leggen. 
<ff vertellen dat dat in de praktijk anders aangepakt wordt?>
In dit veld vult u alleen het IP(v4)-adres in van de computer waar de server op staat.
De rest van de path wordt achter de schermen aangevuld. <te vaag>
<wat gebeurt er als je een verkeerd IP invult?>
<ff uitleggen hoe die t kan testen ens>

## Deployment

Add additional notes about how to deploy this on a live system
