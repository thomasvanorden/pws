 # Alzheimer App
Hieronder zullen wij u stap voor stap door het proces lopen om ons project op te starten vanaf de broncode.
Daarnaast zullen wij u ook uitleggen hoe u een XAMPP server kunt opstarten met de juiste bestanden, om onze applicatie mee te testen, aangezien deze zeer beperkte functionaliteit heeft zonder server.

## App
### Benodigdheden
U heeft een aantal dingen nodig voordat u kunt beginnen:
* Smartphone met een van de volgende besturingssystemen
    * Android vanaf versie 6.1.2
    * Windows Phone vanaf versie 4.4.3
* Een computer met een van de volgende besturingssystemen
    * Windows
    * Mac OSX
* Een werkend netwerk
    * Een host met een vast lokaal IPv4-adres
* Telefooon en computer die op hetzelfde WiFi-netwerk zijn aangesloten
   * Gebruik deze telefoon voor de PhoneGap app
   * Gebruik deze copmuter voor XAMPP en de PhoneGap Desktop Application

### Broncode + Phonegap
Om onze app op te starten met de broncode, moet Phonegap (CLI?) eerst geïnstalleerd worden.
Instructies hiervoor staan in het verslag. <zeggen we dit? of nog een keer uitleggen: JA!>

Als Phonegap geïnstalleerd is, downloadt u de broncode vanaf Github: https://github.com/thomasvanorden/pws.
U klikt op de groene knop rechtsboven met de tekst "Clone or download".
Dan verschijnt een klein venster, en klikt u op "Download ZIP".

Nadat het bestand is gedownload pakt u het uit op de gewenste locatie; dit heeft geen invloed op de werking van de app. <ff alleen app kopieren>
Daarna start u Phonegap op, en <project opstarten + verbinding met telefoon enzo>

Wij hadden u graag onze app die wij met PhoneGap Build hebben gemaakt willen geven, echter hadden wij hierbij een probleem:
De app kon niet verbinden met een server die op een andere host draaide dan waarmee de telefoon verbonden was. Dit komt waarschijnlijk omdat de PhoneGap Build service tijdens het bouwen van de app, geen (sub)domain-crossing toestaat. Oftewel, door PhoneGap Build te gebruiken kunnen wij geen app "bouwen" die verbinding legt met een server op een andere host, dan waar de telefoon zelf mee is verbonden. Dit betekent dat onze app geen gegevens kan versturen of opvragen bij de server, hierdoor heeft de app totaal geen functionaliteit meer. Gelukkig kan u in combinatie met bovenstaande en onderstaande instructies alsnog de app testen!

## Server
Om een server op te starten voor onze app, moet XAMPP eerst geïnstalleerd worden.
Instructies hiervoor staan in het verslag. <zeggen we dit? of nog een keer uitleggen: JA!>

Als XAMPP is geïnstalleerd, bladert u in de verkenner naar de XAMPP-map.
Plak vervolgens het mapje "pws" uit de gedownloade broncode (zie stappen hierboven) in het mapje htdocs (XAMPP/htdocs) in de installatiemap van XAMPP.

Start vervolgens XAMPP waaarin u de Apache HTTP server, en de MySQL server op kan starten. Wacht todat deze beiden een groen bolletje krijgen.
U kunt nu verbinding leggen met de server!

## Gebruik
Zoals u misschien is opgevallen tijdens het opstarten van de app, is dat de app als eerste om een IP-adres vraagt, deze heeft de app nodig om met de server op de juiste wijze contact te leggen.
Uiteraard moet het opstarten van de app in de praktijk niet op deze wijze verlopen, maar voor het "simpelweg" thuis testen is dit de handigste mogelijkheid.
In dit veld vult u alleen het IP(v4)-adres in van de computer waar de server op staat.

## Testen
Om onze app goed te kunnen testen, is het handig als u na het opstarten van de app en alle bovenstaande stappen:
* Een cliënt aanmaakt via de "registreer cliënt"-knop op het homescherm 
   * Schrijf of kopieer de client code
* Hierna een familielid/verzorger registreert via de "registreer verzorger/familielid"-knop
* Inloggen familielid
* Notificatie aanmaken
* Inloggen client

## Deployment

Add additional notes about how to deploy this on a live system
