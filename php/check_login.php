<?php
session_start();

if(isset($_SESSION['username']) && !empty($_SESSION['username'])) {
   echo 'Set and not empty, and no undefined index error!';
}
if(!isset($_SESSION['username']) && empty($_SESSION['username'])){
    header("location:./php/login.php");
}

?>