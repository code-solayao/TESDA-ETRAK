<?php
    session_start();
    if (!isset($_SESSION["user_id"]) || !isset($_SESSION["username"])) {
        session_unset();
        session_destroy();
        header("Location: ../login/index.php");
        exit;
    }
?>