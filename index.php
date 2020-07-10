<html>
<head>
    <title> Error 404: Page not found </title>
</head>
<?php
    if ($_GET['action'] === 'reset')
    {
        $logfile = fopen("logged.html", "w");
    }
    else
    {
        $logfile = fopen("logged.html", "a+");
    }
    fwrite($logfile, "
        <p> ====================================================== </p>
        <p>Date/Time: "      . date("d/m/Y h:i:sa")             . "</p>
        <p>IP: "             . $_SERVER['REMOTE_ADDR']          . "</p>
        <p>Fowarded for: "   . $_SERVER['HTTP_X_FORWARDED_FOR'] . "</p>
        <p>User-Agent: "     . $_SERVER['HTTP_USER_AGENT']      . "</p>
        <p>Referer: "        . $_SERVER['HTTP_REFERER']         . "</p>
        <p>Language: "       . $_SERVER['HTTP_ACCEPT_LANGUAGE'] . "</p>
        <br>
	");
    fclose($logfile);
    if (($_GET['action'] === 'redirect') && !empty($_GET['target']))
    {
        header('Location: ' . $_GET['target']);
    }
?>
    <body>
        <p> Error 404: Page not found. </p>
    </body>
</html>
