function checkInternet()
{
    /*
        Misschien class gebruiken ipv id en dan ook met de namen "internet" en
        "nointernet" ofzo zodat het op elke pagina kan werken? Vgm is dat niet
        nodig aangezien we hier al checken of er internet is, en je anders
        nergens kunt komen.
    */
    if(navigator.onLine)
    {
        document.getElementById('buttons').style.display = "block";
        document.getElementById('nointernetmsg').style.display = "none";
    }
    else
    {
        document.getElementById('buttons').style.display = "none";
        document.getElementById('nointernetmsg').style.display = "block";
    }
}

var _hostname = "192.168.178.10";
