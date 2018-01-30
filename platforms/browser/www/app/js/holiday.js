function check_holiday (dt_date) {
  // check for market holidays
// dt_date = new Date("2017-04-14T12:01:00Z"); // for testing purposes
	// check simple dates (month/date - no leading zeroes)
	var retArray = new Array();
	var n_date = dt_date.getDate();
	var n_month = dt_date.getMonth() + 1;
	var s_date1 = n_month + '/' + n_date;
	var s_year = dt_date.getFullYear();
	var s_day = dt_date.getDay(); // day of the week 0-6
	switch(s_date1){
		  case '1/1':
			retArray.push("Nieuwjaarsdag");
			retArray.push("./res/img/icons/new-year-day.png");
			return retArray;
	    case '4/27':
			retArray.push("Koningsdag");
			retArray.push("./res/img/icons/crown.png");
			return retArray;
	    case '5/4':
			retArray.push("Dodenherdenking");
			retArray.push("./res/img/icons/grave.png");
			return retArray;
	    case '5/5':
			retArray.push("Bevrijdingsdag");
			retArray.push("./res/img/icons/dove.png");
			return retArray;
	    case '10/4':
			retArray.push("Dierendag");
			retArray.push("./res/img/icons/animal-paw-print.png");
			return retArray;
	    case '11/11':
			retArray.push("Sint Maarten");
			retArray.push("./res/img/icons/toffee.png");
			return retArray;
	    case '12/5':
			retArray.push("Sinterklaas");
			retArray.push("./res/img/icons/mijter.png");
			return retArray;
	    case '12/25':
			retArray.push("Eerste Kerstdag");
			retArray.push("./res/img/icons/santa-claus.png");
			return retArray;
	    case '12/26':
			retArray.push("Tweede Kerstdag");
			retArray.push("./res/img/icons/santa-claus.png");
			return retArray;
	    case '12/31':
			retArray.push("Oudjaarsdag");
			retArray.push("./res/img/icons/fireworks.png");
			return retArray;
	}

/*	// weekday from beginning of the month (month/num/day)
	var n_wday = dt_date.getDay();
	var n_wnum = Math.floor((n_date - 1) / 7) + 1;
	var s_date2 = n_month + '/' + n_wnum + '/' + n_wday;
	switch(s_date2){
		case '11/4/4':
		return "Thanksgiving";
		}
*/
  var days = ['Zondag','Maandag','Dinsdag','Woensdag','Donderdag','Vrijdag','Zaterdag'];
  retArray.push(days[s_day]);
  retArray.push("./res/img/icons/calendar.png");
	return retArray;
}
