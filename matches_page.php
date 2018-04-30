<?php  

    ini_set('display_errors',0);
    
    //connects to database
    $host = 'localhost';
    $username = 'root';
    $password = 'IPv2gwSQnjgQ';
    $dbname = 'scouting_data';
    $db = new mysqli($host, $username, $password, $dbname);
    
    //gets data from the average table
    $query = $db->query("SELECT * FROM avg_data");
    $result = array();
    while ($row = $query->fetch_array(MYSQL_NUM)) {
        $result[] = $row;
    }
    
    $numRows = $query->num_rows;
?>

<html>
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0'/>
    <meta http-equiv="refresh" content="30">
    <head>
        <title>Talon 540</title>
        
        <link rel="stylesheet" href="stylesheets/menu.css"/>
        <link rel="stylesheet" href="stylesheets/main.css"/>
        <link rel="stylesheet" href="stylesheets/table.css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Rubik+Mono+One" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Fjalla+One" rel="stylesheet">
        
        <link rel="icon" href="stylesheets/images/LOGO-Tr.png">

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
            <h1 id="pageTlt">Match<span id="redTlt">Data</span></h1>
            <?php if($numRows > 0){ ?>
            <div class="inputSearch">
                <input id="search" type="search" placeholder="Search for Teams">
                <span id="search_icon"><i class="fa fa-fw fa-search"></i></span>
            </div>
            <div class="table-body">
                <table id="mainTable">
                    <thead>
                        <tr id="noHover">
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
                            <th>Score</th>
                        </tr>
                    </thead>
                    <tbody id="bodyH">
                        <?php foreach ($result as $row):?>
                            <tr class="clickable">
                                <td><a href="team_data.php?team_num=<?php echo $row[0] ?>"><?php echo implode('</td></a><td>', $row); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <?php } else {?>
                <div class="center-body">
                        <h1>No data yet :(</h1>
                        <p>Our Scouters are taking a coffee break. Please check back later when the matches start back up. Good luck on the field, and have a great Season!</p>
                </div>
            
            <?php } ?>
        </div>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <script src="plugins/jquery.floatThead.min.js"></script>
        <script src="plugins/jquery.tablesorter.js"></script>
        <script src="plugins/jquery.tablesorter.widgets.js"></script>
        <script src="plugins/widget-stickyHeaders.js"></script>
        <script src="jquery.floatThead.min.js"></script>
        <script src="tHeader_sticky.js"></script>
        <script src="f_menu.js"></script>
        
    </body>
</html>