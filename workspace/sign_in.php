<?php
    /*
     * handles the sign in button
    */

    session_start();
    
    if (isset($_POST['submit_SN'])) {
        $username = $_POST['userName_SN'];
        $password = $_POST['id_SN'];
        $conn = new mysqli("localhost", "root", "IPv2gwSQnjgQ", "login_info");
        
        //does stuff
        $username = stripslashes($username);
        $password = stripslashes($password);
        $username = $conn->real_escape_string($username);
        $password = $conn->real_escape_string($password);
        $username = strtolower($username);
    
        $query = $conn->query("SELECT * FROM login WHERE username = '$username' AND password = '$password'");
        $rows = $query->num_rows;
        
        //if the user exists then login
        if ($rows == 1) {
            $_SESSION['user'] = $username;
            header("location: index.php");
        } else {
            //echo "fix yar login";
        }
    }
?>
