function updateWidgetHoliday() {

    var today = new Date();
    var holiday = check_holiday(today);
    document.getElementById('widget_holiday').getElementsByTagName('h1')[0].innerHTML = holiday[0];
    document.getElementById('widget_holiday').getElementsByTagName('img')[0].src = holiday[1];
    setTimeout(updateWidgetHoliday, 1000 * 60 * 60);
}

function updateWidgetWeather()
{
  // v3.1.0
  //Docs at http://simpleweatherjs.com
  $(document).ready(function() {
    $.simpleWeather({
      location: 'Heerhugowaard, Netherlands',
      woeid: '',
      unit: 'c',
      success: function(weather) {
        $("#widget_weather").find("h2").html('<i class="icon-'+weather.code+'"></i>');
        $("#widget_weather").find("h1").html(weather.temp+'&deg;'+weather.units.temp);
      },
      error: function(error) {
        $("#widget_weather").html('<p>'+error+'</p>');
      }
    });
  });
    setTimeout(updateWidgetWeather, 1000 * 60 * 30);
}

function updateWidgets()
{
    updateWidgetHoliday();
    updateWidgetWeather();
}
