<?php

    session_start();
    session_unset();
    session_destroy();
    
    header("location: index-event.php?error=none");
    