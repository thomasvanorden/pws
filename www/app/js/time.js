function startTime() {
    var days = ['Zondag','Maandag','Dinsdag','Woensdag','Donderdag','Vrijdag','Zaterdag'];
    var months = ['Januari','Februari','Maart','April','Mei','Juni','Juli','Augustus','September','Oktober','November','December'];

    var today = new Date();
    var d = days[today.getDay()];
    var h = today.getHours();
    var m = today.getMinutes();
    document.getElementById('timedate').getElementsByTagName('h1')[0].innerHTML = checkTime(h) + ":" + checkTime(m);
    document.getElementById('timedate').getElementsByTagName('p')[0].innerHTML = d + ", " + today.getDate() + " " + months[today.getMonth()] + " " + today.getFullYear();
    var t = setTimeout(startTime, 1000);
}

function checkTime(i) {
    if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
    return i;
}