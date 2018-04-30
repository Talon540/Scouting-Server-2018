<?php
    session_start();
    
    $error = $_GET['error'];
?>
<html>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <head>
        <title>Talon 540</title>
        
        <link href="https://fonts.googleapis.com/css?family=Fjalla+One" rel="stylesheet">
        
        <link rel="stylesheet" href="stylesheets/menu.css"/>
        <link rel="stylesheet" href="stylesheets/main.css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Fjalla+One" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Rubik+Mono+One" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400" rel="stylesheet">
        
        <link rel="icon" href="stylesheets/images/LOGO-Tr.png">

    </head>
    <body onresize="returnNav()">
        <aside id="dropMenu" class="side-bar">
            <ul id="menu">
                <h1 id="bannerTlt"></h1>
                <li><a href="index.php"><i class="fa fa-fw fa-home"></i> Home</a></li>
                <li><a href="sign_page.php"><i class="fa fa-fw fa-sign-in"></i> Sign In</a></li>
                <li><a href="matches_page.php"><i class="fa fa-fw fa-database"></i> Data</a></li>
                <li><a class="current" href="SA_page.php"><i class="fa fa-fw fa-globe"></i> Scout</a></li>
                <li><a href="alert_page.php"><i class="fa fa-fw fa-exclamation-triangle"></i> Alerts</a></li>
                <br><br><a href="javascript:void(0)" class="backBtn" onclick="closeNav()"><i class="fa fa-backward"></i> Back</a>
            </ul>
        </aside>
        
        <div class="overlay" id="js-overlay"></div>
        
        <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
        <script type="text/javascript" src="f_menu.js"></script>
        
        <a href="javascript:void(0)" id="menuBtn" onclick="openNav()"><i class="fa fa-bars"></i></a>
        <h1 id="banner-txt">TALON<span id="redTlt">540</span></h1>
        
        <div id="ain" class="main-content">
            
            <form target="_top" action="data.php" method="post">
                <h1 id="pageTlt">Scout<span id="redTlt">About</span></h1>
                <?php if (isset($_SESSION['user'])) { ?>
                    
                    <?php if ($error == '0001') { ?>
                        <div id="error-repeated" class="error-body" style="display:block">
                            <h1>Error! You've entered in repeated data!</h1>
                        </div>
                    <?php } ?>
                    
                    <?php if ($error == '0000') { ?>
                    <div id="data-entered" class="error-body">
                        <h1>Input successful!</h1>
                    </div>
                    <?php } ?>
                    
                    
                    <h1 class="formTlt">Basic Info</h1>
                    <div class="small-center-body">
                        <input type="text" name="name_SA" list="SA_name" placeholder="Your Name" maxlength="20" required>
                        <input type="number" name="teamNum_SA" list="SA_teamNum" placeholder="Target Team" min="0" max="9999" required><hr>
                        <select name="match_Type" required>
                            <option value="Q">Qualifications</option>
                            <option value="QF">Quarter-Finals</option>
                            <option value="SF">Semi-finals</option>
                            <option value="F">Finals</option>
                        </select>
                        <input type="number" name="match_Num" placeholder="Match Number" min="0" max="500" required>
                    </div><br>
                
                    <h1 class="formTlt">Autonomous</h1>
                    <div class="small-center-body">
                        <h1>Autoline</h1>
                        <input id="AL_1" type="radio" name="Autoline_SA" value="1" required><label for="AL_1">Crossed</label><br>
                        <input id="AL_0" type="radio" name="Autoline_SA" value="0" required><label for="AL_0">Did not Cross</label><hr>
                        
                        <h1>Cube Placement</h1>
                        <input id="SW_A" type="number" name="SwitchAuto_SA" placeholder="Switch Auto" min="0" max="100" required>
                        <input id="SC_A" type="number" name="ScaleAuto_SA" placeholder="Scale Auto" min="0" max="100" required><br>
                    </div>
                
                    <br><h1 class="formTlt">Teleop</h1>
                    <div class="small-center-body">
                        <h1>Cube Control</h1>
                        <p class="instruction-text">Do not count Strategic Drops, but account for repeats.</p>
                        <input id="CD_T" type="number" name="CubeDropped_SA" placeholder="Cubes Dropped" min="0" max="100" required> <hr>
                        
                        <h1>Cube Placement</h1>
                        <input id="PO_T" type="number" name="PlaceOwn_SA" placeholder="Placed OWN Switch" min="0" max="100" required>
                        <input id="PE_T" type="number" name="PlaceEnemy_SA" placeholder="Placed ENEMY Switch" min="0" max="100" required>
                        <input id="PS_T" type="number" name="PlaceScale_SA" placeholder="Placed SCALE" min="0" max="100" required>
                        <input id="PV_T" type="number" name="PlaceVault_SA" placeholder="Placed VAULT" min="0" max="100" required><hr>
                        
                        <h1>Defense</h1>
                        <input id="D_1" type="radio" name="Defense_SA" value="1" required><label for="D_1">Defended</label><br>
                        <input id="D_0" type="radio" name="Defense_SA" value="0" required><label for="D_0">Did not Defend</label><hr>
                    
                        <h1>Climbing</h1>
                        <input id="CLB_2" type="radio" name="Climbing_SA" value="2" required><label for="CLB_2">Successful</label><br>
                        <input id="CLB_1" type="radio" name="Climbing_SA" value="1" required><label for="CLB_1">Tried, unsuccessful</label><br>
                        <input id="CLB_0" type="radio" name="Climbing_SA" value="0" required><label for="CLB_0">Did not attempt</label><hr>
                        
                        <h1>Support</h1>
                        <p class="instruction-text">Count all teammates that this bot supported during climbing (Max of 2).</p>
                        <input id="SB_T" type="number" name="SupportBot_SA" placeholder="# of Supported Bots" min="0" max="2" required> <hr>
                        
                        <h1>Comments</h1>
                        <textarea id="Comments" name="Comments_SA" placeholder="Please be respectful and concise."></textarea>
                        <!--<input id="Comments" type="text" name="Comments_SA" placeholder="Please be concise and respectful."><br><br> --->
                    </div>
                    <br>
                    <div class="outline-body">
                        <input id="btn" type="submit" value="Submit">
                        <input id="btn" type="reset" value="Reset">
                    </div>
                    
                <?php } else { ?>
                    <div class="center-body">
                        <h1>You're not signed in!</h1>
                        <p>Please sign in to scout matches for the database. You must be a Strategy Member of the Talon 540 FRC Team. Please be mindful of your actions: do not input faulty data. When inputing comments, please be respectful and honorous to every team that partifipates in the First Robotics Competition.</p>
                    </div>
                <?php } ?>
            </form>
        </div>
    </body>
</html>
