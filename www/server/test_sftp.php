<?php
    $conn_id = ftp_ssl_connect("localhost");

    // login with username and password
    $login_result = ftp_login($conn_id, 'daemon', '140Thomas_Timo851');

    if (!$login_result) {
        // PHP will already have raised an E_WARNING level message in this case
        echo("can't login");
    }
    else {
        echo("login successful");
    }

    echo ftp_pwd($conn_id); // /

    // close the ssl connection
    ftp_close($conn_id);
?>
