function updateWidgetHoliday() {
    var days = ['Zondag','Maandag','Dinsdag','Woensdag','Donderdag','Vrijdag','Zaterdag'];
    var months = ['Januari','Februari','Maart','April','Mei','Juni','Juli','Augustus','September','Oktober','November','December'];

    var today = new Date();
    document.getElementById('widget_holiday').getElementsByTagName('h1')[0].innerHTML = days[today.getDay()] + " " + today.getDate() + " " + months[today.getMonth()];
    document.getElementById('widget_holiday').getElementsByTagName('p')[0].innerHTML = "Kerst";
    var t = setTimeout(updateWidgetHoliday, 1000 * 60 * 60);
}

function updateWidgetWeather()
{
    document.getElementById('widget_weather').getElementsByTagName('h1')[0].innerHTML = "Weer vandaag";
    document.getElementById('widget_weather').getElementsByTagName('p')[0].innerHTML = "17o";
    var t = setTimeout(updateWidgetWeather, 1000 * 60 * 30);
}

function updateWidgets()
{
    updateWidgetHoliday();
    updateWidgetWeather();
}
