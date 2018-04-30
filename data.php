<?php
  /*
   * Inserts all of the data into both the raw data and average data tables
  */

  //connect to database
  $host = 'localhost';
  $username = 'root';
  $password = 'IPv2gwSQnjgQ';
  $dbname = 'scouting_data';
  $conn = new mysqli($host, $username, $password, $dbname);
  
  if ($conn->connect_error) {
      die("rip: ".$conn->connect_error);
  }
  
  //retrieves all values from the scouting form
  $name = $_POST["name_SA"];
  $teamNum = $_POST["teamNum_SA"];
  $autoline = $_POST["Autoline_SA"];
  $autoScale = $_POST["ScaleAuto_SA"];
  $autoSwitch = $_POST["SwitchAuto_SA"];
  $droppedCubes = $_POST["CubeDropped_SA"];
  $teamSwitch = $_POST["PlaceOwn_SA"];
  $enemySwitch = $_POST["PlaceEnemy_SA"];
  $scale = $_POST["PlaceScale_SA"];
  $vault = $_POST["PlaceVault_SA"];
  $defense = $_POST["Defense_SA"];
  $climbing = $_POST["Climbing_SA"];
  $support = $_POST["SupportBot_SA"];
  $comment = $_POST["Comments_SA"];
  $matchNum = $_POST['match_Num'];
  
  //checks to see if the data has been inserted before
  $dataCheck = $conn->query("SELECT * FROM raw_data WHERE qual_num = '$matchNum' AND team_num = '$teamNum'");
  
  //compScore
  $compScore = ($scale*6) + ($teamSwitch*3) + ($enemySwitch*4) + (5*sqrt($vault)) + ($defense*5) + ($autoline*5) + ($support*7) + ($autoScale*20) + ($autoSwitch*10);
  if ($climbing == 1) {
    $compScore += 5;
  } else if ($climbing == 2) {
    $compScore += 15;
  }
  
  if ($teamSwitch != 0 || $enemySwitch != 0 || $scale != 0) {
    $compScore -= ($droppedCubes*6)/($teamSwitch+$enemySwitch+$scale);
  }
  
  //redirects if there is another form submitted with the same team and match number
  if ($dataCheck->num_rows > 0) {
    header("Location: SA_page.php?error=0001");
  } else {
    //converts the numbers to words for the table
    if ($autoline == 0) {
      $autoline = "Failed";
    } else {
      $autoline = "Crossed";
    }
  
    if ($defense == 0) {
      $defense = "No";
    } else {
      $defense = "Yes";
    }
  
    if ($climbing == 0) {
      $climbing = "None";
    } else if ($climbing == 1) {
      $climbing = "Tried";
    } else {
      $climbing = "Climbed";
    }
    
    //imserts data into raw table
    $query = "INSERT INTO raw_data (name, qual_num, team_num, autoline, auto_scale, auto_switch, cubes_drobbed, team_switch, enemy_switch, scale, vault, defense, climbing, support, compScore, comments) VALUES ('$name', '$matchNum', '$teamNum', '$autoline', '$autoScale', '$autoSwitch', '$droppedCubes', '$teamSwitch', '$enemySwitch', '$scale', '$vault', '$defense', '$climbing', '$support', '$compScore', '$comment')";
    $conn->query($query);
    
    //updates the averages in the average data
    $conn->query("REPLACE INTO avg_data (team_num, auto_scale, auto_switch, cubes_drobbed, team_switch, enemy_switch, scale, vault, support, compScore) SELECT team_num, avg(auto_scale), avg(auto_switch), avg(cubes_drobbed), avg(team_switch), avg(enemy_switch), avg(scale), avg(vault), avg(support), avg(compScore) FROM raw_data WHERE team_num = '$teamNum'");
    
    //averages the words
    $averageAutoLineRow = $conn->query("SELECT autoline,COUNT(*) as count FROM raw_data WHERE team_num = '$teamNum' GROUP BY autoline ORDER BY count DESC")->fetch_assoc();
    $averageAutoLine = $averageAutoLineRow['autoline'];
    
    $averageDefenseRow = $conn->query("SELECT defense,COUNT(*) as count FROM raw_data WHERE team_num = '$teamNum' GROUP BY defense ORDER BY count DESC")->fetch_assoc();
    $averageDefense = $averageDefenseRow['defense'];
    
    $averageClimbingRow = $conn->query("SELECT climbing,COUNT(*) as count FROM raw_data WHERE team_num = '$teamNum' GROUP BY climbing ORDER BY count DESC")->fetch_assoc();
    $averageClimbing = $averageClimbingRow['climbing'];
    
    //updates with new word averages
    $conn->query("UPDATE avg_data SET autoline = '$averageAutoLine', defense = '$averageDefense', climbing = '$averageClimbing' WHERE team_num = '$teamNum'");
    
    //includes the html for the page
    header("Location: SA_page.php?error=0000");

  }

?>