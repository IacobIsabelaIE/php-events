<?php
    
    session_start();
    setcookie(session_name(), '', 100);
    session_unset();
    session_destroy();
    $_SESSION = array();
    header("Location: localhost/php-events/view/ui/events.php");

