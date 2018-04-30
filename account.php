<?php
    include('session_check.php');
    date_default_timezone_set('America/New_York');
    $conn = new mysqli("localhost", "root", "IPv2gwSQnjgQ", "login_info");
    $user = $_SESSION['user'];
    
    //deletes all codes that are out of date
    $conn->query("DELETE FROM codes WHERE endTime < now()");
    
    $userData = $conn->query("SELECT * FROM login WHERE username = '$user'")->fetch_assoc();
    
    //gets all the codes and puts them into result which is used to print them in the html
    $query = $conn->query("SELECT * FROM codes");
    $result = array();
    while ($row = $query->fetch_array(MYSQL_NUM)) {
        $result[] = $row;
    }
    
    //gest the total time for the user and puts it into totalNum which is used in the html
    $totalNum = $conn->query("SELECT HOUR(SUM(diffTime)) FROM times WHERE user = '$user'")->fetch_assoc();
    $totalNum = $totalNum['HOUR(SUM(diffTime))'];
    if ($totalNum == null) {
        $totalNum = 0;
    }
    
    //gets the current amount of time signed for in and puts it into sessionTime which is used in the html
    $inTime = $conn->query("SELECT inTime FROM times WHERE user = '$user' AND outTime IS NULL")->fetch_assoc();
    $inTime = $inTime['inTime'];
    $now = new DateTime();
    $now = $now->format('Y-m-d H:i:s');
    $sessionTime = $conn->query("SELECT TIMEDIFF('$now', '$inTime')")->fetch_array();
    $sessionTime = $sessionTime[0];
?>

<html>
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0'/>
    <head>
        <title>Talon 540</title>
        
        <link rel="stylesheet" href="stylesheets/menu.css"/>
        <link rel="stylesheet" href="stylesheets/main.css"/>
        <link rel="stylesheet" href="stylesheets/table.css"/>
        <link rel="stylesheet" href="stylesheets/profile.css"/>
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
                <li><a class="current" href="sign_page.php"><i class="fa fa-fw fa-sign-in"></i> Sign In</a></li>
                <li><a href="matches_page.php"><i class="fa fa-fw fa-database"></i> Data</a></li>
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
            <div class="prof-header">
                <div class="prof-emblem"><div style="background-image:url(<?php echo $userData['image'] ?>);" class="prof-emblem-img"></div></div>
                <h1 class="prof-txt">Welcome <br class="br-mbl"><span id="redTlt"><?php echo ucwords($_SESSION['user'])?>!</span></h1>
                <h1 class="prof-subtxt">"We are more than a Robot"</h1>
            </div>
                
            <div class="prof-content">
                <div class="prof-info">
                    <h1 id="prof-tlt"><?php echo $userData['tier'];?></h1>
                    <h1><?php echo $userData['subgroup']?></h1>
                    <img src="stylesheets/images/showshovel.png" alt="" id="badgeEmblem"><br>
                    <a href='logout.php' id="btn">Logout</a>
                </div>
                
                <div class="prof-sign-in">
                    <h1 id="prof-tlt">Sign in</h1>
                    <form method="post" action="account_data.php">
                        <h1>Total hours logged:</h1>
                        <h1 id="prof-big-txt"><?php echo $totalNum; ?></h1>
                        <h2>This session: <span id="redTlt"><?php 
                                if ($sessionTime==NULL){
                                    echo 'Not begun';
                                } else {
                                    echo $sessionTime;
                                }
                        ?></span></h2>
                        <?php if(!$_SESSION['onTime']) { ?>
                            <input type="text" name="wordOD_SN" list="SN_WordOfDay" placeholder="No caps, one word">
                            <input type="submit" id="btn" name="submit_WD" list="SN_Submit" value="Sign in now">  
                        <?php } ?>
                        <?php if($_SESSION['onTime']) { ?> <input type="submit" id="btn" name="submit_SO" list="SN_Submit" value="Sign out here"><?php } ?>
                    </form>
                </div>
                
                <?php if ($userData['tier'] == 'Mentor' || $userData['tier'] == 'Lead') { ?>
                    <div class="prof-full">
                        <h1 id="prof-tlt">Want to Generate a Sign in Code?</h1>
                        <form method="post" action="account_data.php">
                            <div class="prof-half-time">
                                <h1>Start Time: </h1>
                                <input type="date" id="date" name="date_Start">
                                <input type="time" id="time" name="time_Start">
                            </div>
                            <div class="prof-half-time">
                                <h1>End Time: </h1>
                                <input type="date" id="date2" name="date_End">
                                <input type="time" id="time2" name="time_End">
                            </div>
                            <input type="submit" id="btn" name="create_WD" list="SN_Submit" value="Generate Code">
                        </form>
                    </div>
            </div>
            <br>
            
            <?php if (count($result) != 0) { ?>
                <div class="table-body">
                    <table id="mainTable">
                        <thead>
                        <tr id="noHover">
                            <th>Code</th>
                            <th>Start Time</th>
                            <th>End Time</th>
                            <th>Uses</th>
                            <th>Cancel</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($result as $row):?>
                                <tr>
                                    <form method="post" action="cancel_code.php?code=<?php echo $row[0] ?>">
                                        <td><?php echo implode('</td><td>', $row); ?></td>
                                        <td><input id="btn-sml" type="submit" value="cancel"></td>
                                    </form>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table> 
                </div>
            <?php } ?>
            <?php } ?>
        </div>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <script src="plugins/jquery.floatThead.min.js"></script>
        <script src="plugins/jquery.tablesorter.js"></script>
        <script src="plugins/jquery.tablesorter.widgets.js"></script>
        <script src="plugins/widget-stickyHeaders.js"></script>

        <script src="tHeader_sticky.js"></script>
        <script src="f_menu.js"></script>
        <script src="account_op.js"></script>
        
    </body>
</html>