<?php
    /*
     * Handles the process of deleting a code
    */
    
    $code = $_GET['code'];
    include('session_check.php');
    $user = $_SESSION['user'];
    $conn = new mysqli("localhost", "root", "IPv2gwSQnjgQ", "login_info");
    
    if ($user=='admin') {
        $conn->query("DELETE FROM codes WHERE code='$code'");
        $result = $conn->query("UPDATE times SET outTime=now() WHERE code='$code' AND outTime='NULL'");
    }
    
    header('location: account.php');
?>