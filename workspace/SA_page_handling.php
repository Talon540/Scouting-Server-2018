<?php
    include("session_check.php");
    $conn = new mysqli("localhost", "root", "IPv2gwSQnjgQ", "login_info");
    
    echo $_POST['DATA_average'];
    echo "<br>";
    echo $_POST['DATA_override'];
    echo "<br>";
    echo $_POST['DATA_cancel'];
    
    if (isset($_POST['DATA_average'])) {
        
    } else if (isset($_POST['DATA_override'])) {
        
    } else if (isset($_POST['DATA_cancel'])) {
        
    } else {
        //header("Location: home.php");
    }
?>
