function notify(title, content, icon) {
    var options = {
        body: content,
        icon: icon
    }
    var notification = new Notification(title, options);
}

function notify(title, content, icon, priority) {
    var options = {
        body: content,
        icon: icon
    }
    var notification = new Notification(title, options);
}

function notifyMe(elem) {
    notify(elem.parentNode.childNodes[3].innerHTML, elem.parentNode.childNodes[5].innerHTML, elem.parentNode.childNodes[1].src);
}

function notifyPermission()
{
    if (!("Notification" in window)) {
        alert("This browser does not support desktop notification");
    }
    
    else if (Notification.permission !== "denied") {
//        Notification.requestPermission(function (permission) {});
    }
}