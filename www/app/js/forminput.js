function isValidDate(dateString) {
    var regEx = /^\d{4}-\d{2}-\d{2}$/;
    return dateString.match(regEx) != null;
}

function validateEmail(email) {
  var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return re.test(email);
}

function checkFields(username, password, bpassword, email, fname, mname, lname, birth, client, verzorger, picpath) {
    var elementNotFilled = false;
    var requiredElements = $('input[required]').each(function() {
        $(this).css('background', '#BBBBBB');
        if ($(this).val() == "" || $(this).val() == null)
        {
            elementNotFilled = true;
            $(this).css('background', 'rgb(244, 80, 91)');
        }
    });
    if (password != bpassword)
    {
        alert("Wachtwoorden komen niet overeen");
        return false;
    }
    if (!isValidDate(birth) && birth != "")
    {
        alert("Datum incorrect formaat (JJJJ-MM-DD)");
        return false;
    }
    if (!validateEmail(email) && email != "")
    {
        alert("Ongeldig emailadres");
        return false;
    }

    if (elementNotFilled) return false;
    return true;
}
