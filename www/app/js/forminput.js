function invalidField(inputField, returnVal) {
    inputField.style.background = 'rgb(244, 80, 91)';
    return returnVal;
}

function isEmpty(inputField) {
    inputField.style.background = '#BBBBBB';
    if (inputField.value == "" || inputField.value == null)
        return invalidField(inputField, true);

    return false;
}

function checkPassword(password, bpassword) {
    if (isEmpty(password) || isEmpty(bpassword))
    {
        invalidField(bpassword, false);
        return invalidField(password, false);
    }

    if (password.value != bpassword.value)
    {
        invalidField(bpassword, false);
        return invalidField(password, false);
    }

    return true;
}

function checkEmail(email) {
    if (isEmpty(email))
        return invalidField(email, false);

    var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    var temp = re.test(email.value);
    if (!temp) {
      return invalidField(email,false);
    }
    return true;
}

function checkDate(dateString) {
    if (isEmpty(dateString))
        return invalidField(dateString, false);

    var regEx = /^\d{4}-\d{2}-\d{2}$/;
    var match = dateString.value.match(regEx) != null;
    if (match)
      return true;
    else
      return invalidField(dateString,false);
}
