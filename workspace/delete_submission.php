<?php
  /*
   * Deletes entries from the raw data table and then updates the average table
  */
  
  include("session_check.php");
  $id = $_GET['id'];
  $teamNum = $_GET['teamNum'];
  $conn = new mysqli('localhost', 'root', 'IPv2gwSQnjgQ', 'scouting_data');
    
  //deletes the raw data
  $conn->query("DELETE FROM raw_data WHERE id = '$id'");
  
  if ($conn->connect_error) {
      die("rip: ".$conn->connect_error);
  }
  
  $result = $conn->query("SELECT * FROM raw_data WHERE team_num = '$teamNum'");
  
  //checks to make sure the data exists in the average table
  if ($result->num_rows > 0) {
    //inesrt the new averages
    $conn->query("REPLACE INTO avg_data (team_num, auto_scale, auto_switch, cubes_drobbed, team_switch, enemy_switch, scale, vault, support, compScore) SELECT team_num, avg(auto_scale), avg(auto_switch), avg(cubes_drobbed), avg(team_switch), avg(enemy_switch), avg(scale), avg(vault), avg(support), avg(compScore) FROM raw_data WHERE team_num = '$teamNum'");
    $averageAutoLineRow = $conn->query("SELECT autoline,COUNT(*) as count FROM raw_data WHERE team_num = '$teamNum' GROUP BY autoline ORDER BY count DESC")->fetch_assoc();
    $averageAutoLine = $averageAutoLineRow['autoline'];
  
    $averageDefenseRow = $conn->query("SELECT defense,COUNT(*) as count FROM raw_data WHERE team_num = '$teamNum' GROUP BY defense ORDER BY count DESC")->fetch_assoc();
    $averageDefense = $averageDefenseRow['defense'];
  
    $averageClimbingRow = $conn->query("SELECT climbing,COUNT(*) as count FROM raw_data WHERE team_num = '$teamNum' GROUP BY climbing ORDER BY count DESC")->fetch_assoc();
    $averageClimbing = $averageClimbingRow['climbing'];
  
    $conn->query("UPDATE avg_data SET autoline = '$averageAutoLine', defense = '$averageDefense', climbing = '$averageClimbing' WHERE team_num = '$teamNum'");
    
    $row = $conn->query("SELECT * FROM avg_data WHERE team_num = '$teamNum'")->fetch_assoc();
    
    //return to the team data page
    header("Location: team_data.php?team_num=".$teamNum);
  } else {
    //otherwise delete the last average data and return to the matches page
    $conn->query("DELETE FROM avg_data WHERE team_num = '$teamNum'");
    
    header("Location: matches_page.php");
  }
?>
