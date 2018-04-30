<?php

    include('sign_in.php');


    //checks if the user is signed in, if so it redirects them to the account page
    if (isset($_SESSION['user'])) {
        header('location: account.php');
    }
?>

<html>
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0'/>
    <head>
        <title>Talon 540</title>
        
        <link href="https://fonts.googleapis.com/css?family=Fjalla+One" rel="stylesheet">
        
        <link rel="stylesheet" href="stylesheets/menu.css"/>
        <link rel="stylesheet" href="stylesheets/main.css"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Fjalla+One" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400" rel="stylesheet">

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
        
        <a href="javascript:void(0)" id="menuBtn" onclick="openNav()"><i class="fa fa-bars"></i></a>
        <h1 id="banner-txt">TALON<span id="redTlt">540</span></h1>
        
        <div id="main" class="main-content">
            <div class="home-body">
                <div class="highlighted-center-body">
                    <form action="" method="post">
                        <img src="stylesheets/images/LOGO-new.png" alt="" id="sLogo">
                        <h2>Sign in to Talon 540</h2>
                        <input type="text" name="userName_SN" list="SN_UserName" placeholder="Username" required>
                        <input type="password" name="id_SN" list="SN_StudentID" placeholder="Password" required> <hr>
                        <input type="submit" id="btn" name="submit_SN" list="SN_Submit" value="Sign in now">
                    </form>
                </div>
            </div>
        </div>
        
        <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
        <script type="text/javascript" src="f_menu.js"></script>
        
    </body>
</html>