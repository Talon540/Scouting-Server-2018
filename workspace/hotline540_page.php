<?php
    $groups = array("Admin","Outreach", "PR", "Programming","Strategy");
?>

<html>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <head>
        <title>Talon 540</title>
        
        <link href="https://fonts.googleapis.com/css?family=Fjalla+One" rel="stylesheet">
        
        <link rel="stylesheet" href="stylesheets/menu.css"/>
        <link rel="stylesheet" href="stylesheets/main.css"/>
        <link rel="stylesheet" href="stylesheets/alert.css"/>
        <link rel="stylesheet" href="stylesheets/table.css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Fjalla+One" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Rubik+Mono+One" rel="stylesheet">
        
        <link rel="icon" href="stylesheets/images/LOGO-Tr.png">

    </head>
    <body onresize="returnNav()">
        <aside id="dropMenu" class="side-bar">
            <ul id="menu">
                <h1 id="bannerTlt"></h1>
                <li><a href="index.php"><i class="fa fa-fw fa-home"></i> Home</a></li>
                <li><a href="sign_page.php"><i class="fa fa-fw fa-sign-in"></i> Sign In</a></li>
                <li><a href="matches_page.php"><i class="fa fa-fw fa-database"></i> Data</a></li>
                <li><a href="SA_page.php"><i class="fa fa-fw fa-globe"></i> Scout</a></li>
                <li><a class="current" href="alert_page.php"><i class="fa fa-fw fa-exclamation-triangle"></i> Alerts</a></li>
                <br><br><a href="javascript:void(0)" class="backBtn" onclick="closeNav()"><i class="fa fa-backward"></i> Back</a>
            </ul>
        </aside>
        
        <div class="overlay" id="js-overlay"></div>
        
        <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
        <script type="text/javascript" src="f_menu.js"></script>
        
        <a href="javascript:void(0)" id="menuBtn" onclick="openNav()"><i class="fa fa-bars"></i></a>
        <h1 id="banner-txt">TALON<span id="redTlt">540</span></h1>
        
        <div id="main" class="main-content">
            <h1 id="pageTlt">Hotline<span id="redTlt">540</span></h1><br>
            <div class="alert-content">
                <div class="alert-contacts">
                    <h1 class="alert-tlt"><i class="fa fa-fw fa-address-book" id="alert-i"></i>Contacts</h1>
                    <?php for ($i = 0; $i < count($groups); $i++) {
                        echo "<div class='alert-group-select'>";
                    ?>
                        <h1 class="alert-contact-tlt" id=<?php echo ("al_"+$i)?>><?php echo $groups[$i]?></h1>
                    <?php echo "</div>"; } ?>
                </div>
                <div class="alert-info">
                    <h1 class="alert-tlt"><i class="fa fa-fw fa-info-circle" id="alert-i"></i>Information</h1>
                </div>
            </div>
        </div>
    </body>
</html>
