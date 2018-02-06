 # Alzheimer App
Hieronder zullen wij u stap voor stap door het proces lopen om ons project op te starten vanaf de broncode.
Daarnaast zullen wij u ook uitleggen hoe u een XAMPP server kunt opstarten met de juiste bestanden, om onze applicatie mee te testen, aangezien deze zeer beperkte functionaliteit heeft zonder server.

## Benodigdheden
U heeft een aantal dingen nodig voordat u kunt beginnen:
* Smartphone met een internetverbindingen en een van de volgende besturingssystemen
    * Android vanaf versie 6.1.2
    * Windows Phone vanaf versie 4.4.3
    * iOS vanaf 4.3.1
* Een computer met een van de volgende besturingssystemen
    * Windows
    * Mac OSX
* Een werkend netwerk
    * Een host met een vast lokaal IPv4-adres
* Telefoon en computer die op hetzelfde WiFi-netwerk zijn aangesloten
   * Gebruik deze telefoon voor de PhoneGap app
   * Gebruik deze computer voor XAMPP en de PhoneGap Desktop Application

## Server
Om een server op te starten voor onze app, moet XAMPP eerst geïnstalleerd worden.
Als eerst downloadt u het installatiebestand via de officiele website: ‘https://www.apachefriends.org/download.html’.
Hier krijg je de keuze uit een aantal platforms en daarbinnen is er een aantal versies. Na het installatiebestand gedownload te hebben, volgt een simpele installatie procedure. Zodra de software geïnstalleerd is, is het gelijk klaar voor gebruik; het is niet eerst nodig om een aantal configuratiebestanden te bewerken. Als de XAMPP Control Panel is geopend (op de Mac versie) krijgt u drie opties; elke optie om respectievelijk de MySQL server, de FTP server, en de Apache server te starten of te stoppen. Wij hebben alleen de MySQL en Apache HTTP server gebruikt, en alleen die twee hoeven dus opgestart te worden.

Vervolgens downloadt u de broncode vanaf Github: https://github.com/thomasvanorden/pws. U klikt op de groene knop rechtsboven met de tekst "Clone or download". Dan verschijnt een klein venster, en klikt u op "Download ZIP". 
Plak vervolgens het mapje "pws" uit de gedownloade broncode in het mapje htdocs (XAMPP/htdocs) in de installatiemap van XAMPP.

Start vervolgens de XAMPP Control Panel op waarin u de Apache HTTP server, en de MySQL server op start.
Wacht todat deze beiden een groen bolletje krijgen.
U kunt nu verbinding leggen met de server!

## App
Om onze app op te starten met de broncode, moet Phonegap eerst geïnstalleerd worden.
Wij hebben gebruik gemaakt van de command-line interface voor Phonegap die te verkrijgen is via Node.js
Eerst moet hiervoor dus Node.js geinstalleerd worden.

Dit is het makkelijkst via de officiele website: https://nodejs.org/.
Als Node.js eenmaal geïnstalleerd is, opent u een normale terminal op uw PC, en typt in: ‘npm install -g phonegap’.
Dit zegt tegen het programma ‘Node Package Manager (npm)’, die meegeleverd wordt met Node.js, om Phonegap “globaal” (-g) te installeren, dus voor alle gebruikers van die computer.

Na het installatie process bladert u via de terminal naar de map die het Phonegap project (XAMPP/htdocs/pws) bevat.
Daarna kunt u een live preview van de app starten met het command ‘phonegap serve’.

Het is ook aangeraden om de mobiele app van Phonegap te downloaden, om gebruik te maken van de live preview-functie van Phonegap. Deze app is te vinden in de Google Play Store, de Apple App Store, en de Microsoft Windows Store.
Als je beide applicaties (desktop en mobiel) eenmaal hebt gedownload, is het heel makkelijk om een Phonegap project te openen op een smartphone. Echter is het ook mogelijk om met uw browser verbinding te leggen met de Phonegap server, in plaats van de Phonegap Developer App op uw smartphone.

Wij hadden u graag onze app die wij met PhoneGap Build hebben gemaakt willen geven, echter hadden wij hierbij een probleem:
De app kon niet verbinden met een server die op een andere host draaide dan waarmee de telefoon verbonden was. Dit komt waarschijnlijk omdat de PhoneGap Build service tijdens het bouwen van de app, geen (sub)domain-crossing toestaat. Oftewel, door PhoneGap Build te gebruiken kunnen wij geen app "bouwen" die verbinding legt met een server op een andere host, dan waar de telefoon zelf mee is verbonden. Dit betekent dat onze app geen gegevens kan versturen of opvragen bij de server, hierdoor heeft de app totaal geen functionaliteit meer. Gelukkig kan u in combinatie met bovenstaande en onderstaande instructies alsnog de app testen!

## Gebruik
Zoals u misschien is opgevallen tijdens het opstarten van de app, is dat de app als eerste om een IP-adres vraagt, deze heeft de app nodig om met juiste de server te verbinden.
Uiteraard moet het opstarten van de app in de praktijk niet op deze wijze verlopen, maar voor het "simpelweg" thuis testen is dit de handigste mogelijkheid.
In dit veld vult u alleen het IP(v4)-adres in van de host/computer waar de server op staat.

## Testen
Om onze app goed te kunnen testen, is het handig als u na het opstarten van de app de onderstaande stappen volgt:
1. U komt terecht op het startscherm van de app, hier klikt u op "Client registreren"
2. Hier vult u de gevraagde gegevens in van de client.
3. Als u alles correct invult, wordt u doorgestuurd naar homescherm voor de client. Echter krijgt u eerst een notificatie met daarin de unieke code die speciaal voor deze client is gegenereerd. Schrijf deze ergens op, of kopieer het naar uw klembord. Deze code is niet via de app opnieuw op te vragen.
4. Vervolgens gaat u, eventueel op een ander apparaat, naar het start scherm van de app, en klikt u hier op "Familielid/verzorger registreren".
5. Ook hier vult u weer een aantal gegevens in. In dit formulier dient u ook de eerder ontvangen client-code in te voeren om het familielid of de verzorger te koppelen aan de juiste client.
6. Als deze gegevens correct zijn ingevuld wordt u doorgestuurd naar het formulier om een notificatie te sturen.
7. Stuur hier een (of meerdere) berichten naar de client. In dit bericht kunt u een titel invoeren, een inhoud invoeren, en eventueel een afbeelding uploaden.
8. Op het homescherm voor de client verschijnt direct een notificatie met de door u ingevulde gegevens.
