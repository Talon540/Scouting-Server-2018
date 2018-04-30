<?php
  session_start();

  //gets the team number from the address
  $team_num = $_GET['team_num'];
  $user = $_SESSION['user'];
  
  //connects to the database
  $host = 'localhost';
  $username = 'root';
  $password = 'IPv2gwSQnjgQ';
  $dbname = 'scouting_data';
  
  $db = new mysqli($host, $username, $password, $dbname);
  
  //gets the 5 teams below the selected team in comp score
  $barResultAbove = $db->query("SELECT team_num, compScore FROM avg_data WHERE compScore > (SELECT compScore FROM avg_data WHERE team_num = '$team_num') ORDER BY compScore ASC LIMIT 5");
  //gets the 5 teams above the selected team in comp score
  $barResultBelow = $db->query("SELECT team_num, compScore FROM avg_data WHERE compScore < (SELECT compScore FROM avg_data WHERE team_num = '$team_num') ORDER BY compScore DESC LIMIT 5");
    
  //gets the autoline values
  $autoline = $db->query("SELECT autoline FROM raw_data WHERE team_num = '$team_num' AND autoline = 'Crossed'");
  
  //gets the values for the auto chart
  $autoScale = $db->query("SELECT auto_scale FROM raw_data WHERE team_num = '$team_num' AND auto_scale >= 1");
  $autoSwitch = $db->query("SELECT auto_switch FROM raw_data WHERE team_num = '$team_num' AND auto_switch >= 1");
  $autoNoCube = 1;
    
  //gets the values for the teleop chart
  $teleopTeamSwitch = $db->query("SELECT SUM(team_switch) AS value_sum FROM raw_data WHERE team_num = '$team_num'")->fetch_assoc();
  $teleopScale = $db->query("SELECT SUM(scale) AS value_sum FROM raw_data WHERE team_num = '$team_num'")->fetch_assoc();
  $teleopEnemySwitch = $db->query("SELECT SUM(enemy_switch) AS value_sum FROM raw_data WHERE team_num = '$team_num'")->fetch_assoc();
  $teleopVault = $db->query("SELECT SUM(vault) AS value_sum FROM raw_data WHERE team_num = '$team_num'")->fetch_assoc();
  $teleopNoCube = 1;
  
  //gets the values for the climbing chart
  $climbingLackOfHopes = $db->query("SELECT climbing FROM raw_data WHERE team_num = '$team_num' AND climbing = 'None'");
  $climbingFails = $db->query("SELECT climbing FROM raw_data WHERE team_num = '$team_num' AND climbing = 'Tried'");
  $climbingWins = $db->query("SELECT climbing FROM raw_data WHERE team_num = '$team_num' AND climbing = 'Climbed'");
    
  //gets the values for the raw data table
  $query = $db->query("SELECT * FROM raw_data WHERE team_num = '$team_num'");
  $result = array();
  while ($row = $query->fetch_array(MYSQL_NUM)) {
    $result[] = $row;
  }
  
  //gets data for checking user rank
  $conn = new mysqli($host, $username, $password, "login_info");
  $userData = $conn->query("SELECT * FROM login WHERE username = '$user'")->fetch_assoc();
?>

<html>
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0'/>
    <head>
        <title>Talon 540</title>
        <link rel="stylesheet" href="stylesheets/menu.css"/>
        <link rel="stylesheet" href="stylesheets/main.css"/>
        <link rel="stylesheet" href="stylesheets/table.css"/>
        <link rel="stylesheet" href="stylesheets/chart.css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Rubik+Mono+One" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Fjalla+One" rel="stylesheet">
        
        <link rel="icon" href="stylesheets/images/LOGO-Tr.png">
        
        <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
        <script type="text/javascript" src="f_menu.js"></script>
      
      <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
      <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawBarChart);
        google.charts.setOnLoadCallback(drawAutoChart);
        google.charts.setOnLoadCallback(drawTeleopChart);
        google.charts.setOnLoadCallback(drawClimbingChart);
        
        function drawBarChart() {
          
          var data = new google.visualization.DataTable();
          data.addColumn('string', 'team');
          data.addColumn('number', 'compScore');
          data.addColumn({type:'string', role:'style'});
          data.addRows([
                <?php
                  //puts the teams below the selected team into the chart
                  while ($row = $barResultBelow->fetch_assoc()) {
                    $teams[] = $row;
                  }
                  
                  //reverses the results and puts them in the chart
                  if ($teams != null) {
                    $teams = array_reverse($teams, true);
              
                    foreach ($teams as $team) {
                      echo"['".$team['team_num']."', ".$team['compScore'].", 'blue' ],";
                    }
                  }
            
                  //gets and puts the data from the selected team into the chart
                  echo "['".$team_num."', ".$db->query("SELECT compScore FROM avg_data WHERE team_num = '$team_num'")->fetch_assoc()['compScore'].", 'red' ],";
                  
                  //puts the teams above the selected team into the chart
                  if ($barResultAbove->num_rows > 0) {
                    while($row = $barResultAbove->fetch_assoc()) {
                      echo "['".$row['team_num']."', ".$row['compScore'].", 'blue' ],";
                    }
                  }
               ?>
            ]);
            
          var options = {
            height: 300,
            title: 'Comp score',
            titleTextStyle: {
              color: 'white',
              fontSize: 30,
            },
          
            'width':'100%',
            height:300,
            backgroundColor:  {
              position: 'none',
              fill: '#3A3A3A',
              fillOpacity: 0.8,
            },
            legend: {
              textStyle: { color: 'white' }
            },
            hAxis: {
              textStyle: { color: 'white' }
            },
            vAxis: {
              textStyle: { color: 'white' }
            },
            animation: {
              duration: 2000,
              easing: 'out',
              startup: true,
            },
              legend: {position: 'none'},
            };
          
          function resize () {
            var chart = new google.visualization.ColumnChart(document.getElementById('barChart'));
            chart.draw(data, options);
          }
          
          window.onload = resize();
          window.onresize = resize;
        }
      
        function drawAutoChart() {
          
          var data = new google.visualization.DataTable();
          data.addColumn('string', 'Placement');
          data.addColumn('number', 'cubes');
          data.addRows([
            
              <?php
              
                //puts auto values into the auto chart
                //$autolineVal = $autoline->num_rows;
                $autoScaleVal = $autoScale->num_rows;
                $autoSwitchVal = $autoSwitch->num_rows;
                
                //if ($autoScaleVal == 0 && $autoSwitchVal == 0 && $autolineVal == 0) {
                if ($autoScaleVal == 0 && $autoSwitchVal == 0) {  
                  echo "['No auto Cubes', ".$autoNoCube."]";
                } else {
                  
                  echo "['Scale Cubes', ".$autoScaleVal."],";
                  echo "['Switch Cubes', ".$autoSwitchVal."]";
                }
                
                
              
              ?>
            ]);
            
            var options = {
              height: 300,
              'width': '50%',
              title: 'Auto Placement',
              pieSliceTextStyle: {fontSize:16},
              titleTextStyle: {
                color: 'white',
                fontSize: 28,
              },
              backgroundColor: {
                color: 'white',
                fill: '#3A3A3A',
                fillOpacity: 0.8
              },
              legend: {
                textStyle: { color: 'white' }
              },
            };
            
            var chart = new google.visualization.PieChart(document.getElementById('autoChart'));
            chart.draw(data, options);
        }
        
        function drawTeleopChart() {
          var data = new google.visualization.DataTable();
          data.addColumn('string', 'Placement');
          data.addColumn('number', 'cubes');
          data.addRows([
            
              <?php
                
                $teamSwitch = $teleopTeamSwitch['value_sum'];
                $scale = $teleopScale['value_sum'];
                $enemySwitch = $teleopEnemySwitch['value_sum'];
                $vault = $teleopVault['value_sum'];
                
                //puts the teleop values into the teleop chart
                if ($teamSwitch == 0 && $scale == 0 && $enemySwitch == 0) {
                  echo "['No Cubes', ".$teleopNoCube."]";
                } else {
                  echo "['Team Switch', ".$teamSwitch."],";
                  echo "['Scale', ".$scale."],";
                  echo "['Enemy Switch', ".$enemySwitch."],";
                  echo "['Vault', ".$vault."]";
                }
                
                
                
                //echo "['Team Switch', 0],";
                //echo "['Scale', 1],";
                //echo "['Enemy Switch', 2]";
              
              ?>
            ]);
            
            var options = {
              height: 300,
              'width': '50%',
              title: 'Teleop Placement',
              titleTextStyle: {
                color: 'white',
                fontSize: 28,
              },
              backgroundColor: {
                color: 'white',
                fill: '#3A3A3A',
                fillOpacity: 0.8
              },
              pieSliceTextStyle: {fontSize:16},
              legend: {
                textStyle: { color: 'white' }
              },
            };  
          
            var chart = new google.visualization.PieChart(document.getElementById('teleopChart'));
            chart.draw(data, options);
        }
      
        function drawClimbingChart() {
          var data = new google.visualization.DataTable();
          data.addColumn('string', 'team');
          data.addColumn('number', 'cubes');
          data.addRows([
            
              <?php
              
                //puts the climbing values into the climbing chart
                echo "['Didnt try', ".$climbingLackOfHopes->num_rows."],";
                echo "['Tried and failed', ".$climbingFails->num_rows."],";
                echo "['succeeded', ".$climbingWins->num_rows."]";
              
              
              ?>
            ]);
            
            var options = {
              height: 300,
              'width': '50%',
              title: 'Climbing',
              titleTextStyle: {
                color: 'white',
                fontSize: 28,
              },
              backgroundColor: {
                fill: '#3A3A3A',
                fillOpacity: 0.8,
              },
              pieSliceTextStyle: {fontSize:16},
              legend: {
                textStyle: { color: 'white' }
              },
            };
            
            var chart = new google.visualization.PieChart(document.getElementById('climbingChart'));
            chart.draw(data, options);
        }
    </script>
  </head>
  <body onresize="returnNav()">
    <aside id="dropMenu" class="side-bar">
            <ul id="menu">
                <h1 id="bannerTlt"></h1>
                <li><a href="index.php"><i class="fa fa-fw fa-home"></i> Home</a></li>
                <li><a href="sign_page.php"><i class="fa fa-fw fa-sign-in"></i> Sign In</a></li>
                <li><a class="current" href="matches_page.php"><i class="fa fa-fw fa-database"></i> Data</a></li>
                <li><a href="SA_page.php"><i class="fa fa-fw fa-globe"></i> Scout</a></li>
                <li><a href="alert_page.php"><i class="fa fa-fw fa-exclamation-triangle"></i> Alerts</a></li>
                <br><br><a href="javascript:void(0)" class="backBtn" onclick="closeNav()"><i class="fa fa-backward"></i> Back</a>
            </ul>
    </aside>
    
    <div class="mobileSide">
      <a href="javascript:void(0)" id="menuBtn" onclick="openNav()"><i class="fa fa-bars"></i></a>
      <h1 id="banner-txt">TALON<span id="redTlt">540</span></h1>
    </div>
    
    <div id="main" class="main-content">
      <h1 id="pageTlt" class="chartTlt">Team<span id="redTlt"><?php echo $team_num ?></span></h1>
      <div class="rawData-tlt"><h1 id="banner-txt" class="rawData-tlt">Team<span id="redTlt"><?php echo $team_num ?></span></h1></div>
      
      <div id="barChart"></div>
      <div id="autoChart"></div>
      <div id="teleopChart"></div>
      <div id="climbingChart"></div>
      
      <div class="rawData-tlt"><h1 id="banner-txt" class="rawData-tlt">RAW<span id="redTlt">DATA</span></h1></div>
        
      <div class="table-body">
        <table id="mainTable">
          <thead>
            <tr id="noHover">
              <th>Entry ID#</th>
              <th>Scouter Name</th>
              <th>Qual Number</th>
              <th>Team Number</th>
              <th>Autoline</th>
              <th>Auto Scale</th>
              <th>Auto Switch</th>
              <th>Cubes dropped</th>
              <th>Team switch</th>
              <th>Enemy switch</th>
              <th>Scale</th>
              <th>Vault</th>
              <th>Defense</th>
              <th>Climbing</th>
              <th>Support</th>
              <th>Comp Score</th>
              <th>Comments</th>
              <?php if ($userData['tier'] == 'Mentor' || $userData['tier'] == 'Lead' || $userData['subgroup'] == 'Strategy') { ?><th>Delete</th><?php } ?>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($result as $row):?>
              <tr>
                <form method="post" action="delete_submission.php?id=<?php echo $row[0] ?>&teamNum=<?php echo $team_num ?>">
                  <td><?php echo implode('</td><td>', $row); ?></td>
                  <?php if ($userData['tier'] == 'Mentor' || $userData['tier'] == 'Lead' || $userData['subgroup'] == 'Strategy') { ?><td><input id="btn-sml" type="submit" value="delete"></td><?php } ?>
                </form>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </body>
</html>
