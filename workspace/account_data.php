<?php
    /*
     * This class handles all the submit buttons from account.php
    */

    include('session_check.php');
    date_default_timezone_set('America/New_York');
    $conn = new mysqli("localhost", "root", "IPv2gwSQnjgQ", "login_info");
    $user = $_SESSION['user'];
    
    //runs if the submit word of the day button is pressed
    if (isset($_POST['submit_WD'])) {
        $conn->query("UPDATE codes SET uses = uses + 1 WHERE code = '$word'");
        
        $word = $_POST['wordOD_SN'];
        $row = $conn->query("SELECT * FROM codes WHERE code = '$word'")->fetch_assoc();
        
        $now = new DateTime(date('Y-m-d H:i:s'));
        $start = new DateTime($row['startTime']);
        $end = new DateTime($row['endTime']);
        $test = new DateTime();
        
        if ($start < $now && $now < $end) {
            $now = $now->format('Y-m-d H:i:s');
            $_SESSION['inTime'] = $now;
            $conn->query("INSERT INTO times (user, inTime) VALUES ('$user', '$now')") or die("Query error: ".$conn->error);
            $_SESSION['onTime'] = TRUE;
        }
        header('location: account.php');
    }
    
    //runs if the sign out button is pressed
    if (isset($_POST['submit_SO'])) {
        $inTime = $_SESSION['inTime'];
        $outTime = new DateTime();
        $outTime = $outTime->format('Y-m-d H:i:s');
        $conn->query("UPDATE times SET outTime = '$outTime' WHERE user = '$user' AND inTime = '$inTime'");
        $timeDifference = $conn->query("SELECT TIMEDIFF('$outTime', '$inTime')")->fetch_array();
        $conn->query("UPDATE times SET diffTime = '$timeDifference[0]' WHERE user = '$user' AND inTime = '$inTime'");
        $_SESSION['onTime'] = FALSE;
        $page = 'account.php';
        header('location: account.php');
    }
    
    //runs if the create word button is pressed
    if (isset($_POST['create_WD'])) {
        
        //creates a random word from the alphabet
        $alphabet = "abcdefghijklmnopqrstuvwxyz";
        $word = "";
        for ($i = 0; $i < 10; $i++) {
            $num = rand(0, 26);
            
            $word = $word.substr($alphabet, $num, 1);
        }
        
        //gets the start and end date and time
        $startDate = $_POST['date_Start'];
        $endDate = $_POST['date_End'];
        $startTime = $_POST['time_Start'];
        $endTime = $_POST['time_End'];
        
        //inserts the new code
        $conn->query("INSERT INTO codes (code, startTime, endTime) VALUES ('$word', '$startDate.$startTime', '$startDate.$endTime')") or die("query error: ".$conn->error);
        header('location: account.php');
    }
?>
