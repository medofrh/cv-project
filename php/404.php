<?php
$error = $_SERVER["REDIRECT_STATUS"];

$error_title = '';
$error_message = '';

if($error == 404)
{
    $error_title = "404 Page Not Found <br/>";
    $error_message = "The document/file requested was not found on this server.";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p><?php echo $error_title; ?></p>
    <p><?php echo $error_message; ?></p>
</body>
</html>