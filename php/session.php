<?php

session_start(['cookie_lifetime' => 86400]);

if(!empty($_SESSION['userID'])){
    $myID = $_SESSION['userID'];
}

?>