<?php
    /*
     *Checks to see if the current user is logged in by looking for their username in the database
    */


    //start session and connect to mysql
    session_start();
    $conn = new mysqli("localhost", "root", "IPv2gwSQnjgQ", "login_info");
    
    //gets the username of the current user
    $username = $_SESSION['user'];
    
    //retrieves all users with the same username
    $query = $conn->query("SELECT username FROM login WHERE username='$username'");
    $row = $query->fetch_assoc();
    
    //checks if any users exist and if not it redirects them to th ehome page
    if (!isset($row['username'])) {
        header('location: index.php');
    }
?>
