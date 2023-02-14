<?php
    session_start();
     unset($_SESSION['is_logged']);
    session_destroy();
    header('Location: index.php');
?>