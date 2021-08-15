<?php
    session_start();
    ob_start();

    session_destroy();
    ob_end_flush();
    header('location: ../views/login.php');
?>