<?php
  //connect to database
  $host = 'localhost';
  $username = 'root';
  $password = 'IPv2gwSQnjgQ';
  $dbname = 'scouting_data';
  $conn = new mysqli($host, $username, $password, $dbname);
  
  if ($conn->connect_error) {
      die("rip: ".$conn->connect_error);
  }
  
  //inserts the new average data into the database
  $conn->query("REPLACE INTO avg_data (team_num, auto_scale, auto_switch, cubes_drobbed, team_switch, enemy_switch, scale, vault, support) SELECT team_num, avg(auto_scale), avg(auto_switch), avg(cubes_drobbed), avg(team_switch), avg(enemy_switch), avg(scale), avg(vault), avg(support) FROM raw_data WHERE team_num = '$teamNum'");
  
  //averages the columns that are saved as words
  $averageAutoLineRow = $conn->query("SELECT autoline,COUNT(*) as count FROM raw_data WHERE team_num = '$teamNum' GROUP BY autoline ORDER BY count DESC")->fetch_assoc();
  $averageAutoLine = $averageAutoLineRow['autoline'];
  
  $averageDefenseRow = $conn->query("SELECT defense,COUNT(*) as count FROM raw_data WHERE team_num = '$teamNum' GROUP BY defense ORDER BY count DESC")->fetch_assoc();
  $averageDefense = $averageDefenseRow['defense'];
  
  $averageClimbingRow = $conn->query("SELECT climbing,COUNT(*) as count FROM raw_data WHERE team_num = '$teamNum' GROUP BY climbing ORDER BY count DESC")->fetch_assoc();
  $averageClimbing = $averageClimbingRow['climbing'];
  
  //inserts the new word averages into the database
  $conn->query("UPDATE avg_data SET autoline = '$averageAutoLine', defense = '$averageDefense', climbing = '$averageClimbing' WHERE team_num = '$teamNum'");
?>