<?php
    //deletes the current session of the user and returns them to the home page
    session_start();
    if (session_destroy()) {
        header('Location: index.php');
    }
?>