<?php

   if (!isset($_SESSION['userID']) && empty($_SESSION['userID'])) {
        echo "u musst signin in frist !!";
        header('Location: ../php/login.php');
        exit();
    }
?>