<?php
    session_start();
    if (!isset($_SESSION['online']) or !$_SESSION['online']) {
        header("location: index.php");
        exit;
    }
?>