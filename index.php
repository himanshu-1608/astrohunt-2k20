<?php
    if(isset($_SESSION['teamName'])) {
        
        require "$_SERVER[DOCUMENT_ROOT]/dbconn.php";
        
        //update team status
        $sql = "SELECT * FROM `teams` WHERE team_name=\"$_SESSION[teamName]\"";
        $result = mysqli_query($conn, $sql);
        $result = mysqli_fetch_all($result, MYSQLI_ASSOC);
        $_SESSION['eligible'] = $result[0]['eligible'];
        $_SESSION['level'] = $result[0]['level'];

        //close db connection
        mysqli_close($conn);
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Adding Materialize CSS -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- Meta-data for the site-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Astrohunt-2k20</title>
    <style>
    body {
        background: black;
    }

    @media only screen and (min-device-width : 768px) {
        body {
            background-image: url(/img/stars.jpg);
            background-size: cover;
            background-repeat: no-repeat;
        }
    }

    #club-logo {
        height: 12vw;
    }

    @media only screen and (max-device-width : 500px) {
        #club-logo {
            height: 11vw;
            margin-top: 6px;
            margin-left: -10px;
            margin-right: 10px;
        }
    }

    @media only screen and (min-device-width : 500px) and (max-device-width : 650px) {
        #club-logo {
            height: 10vw;
        }
    }

    @media only screen and (min-device-width : 650px) and (max-device-width : 800px) {
        #club-logo {
            height: 8vw;
        }
    }

    @media only screen and (min-device-width : 800px) and (max-device-width : 1000px) {
        #club-logo {
            height: 7vw;
        }
    }

    @media only screen and (min-device-width : 1000px) and (max-device-width : 1370px) {
        #club-logo {
            height: 5vw;
            margin-right: 20px;
        }
    }

    @media only screen and (min-device-width : 1370px) and (max-device-width : 1605px) {
        #club-logo {
            height: 4vw;
            margin-right: 10px;
        }
    }
    </style>
</head>

<body>

    <!--Adding a navigation bar at the top-->
    <nav class="green darken-4">
        <div class="nav-wrapper container">
            <img src="/img/antariksh-logo.jpg" class="respomsive-img" id="club-logo" />
            <a href="#" class="brand-logo">Astro-Hunt</a>
            <a href="#" class="sidenav-trigger" data-target="mobile-links">
                <i class="material-icons">menu</i>
            </a>
            <ul class="right hide-on-med-and-down">
                <li><a href="#" class="waves-effect">Conducted by Antariksh, NIT KKR</a></li>
                <?php
                if(isset($_SESSION['teamName'])) { ?>
                <li><a href="/logout/" class="waves-effect">Log Out</a></li>
                <?php } else {?>
                <li><a href="#login" class="waves-effect modal-trigger">Log In</a></li>
                <?php 
                }
                if(isset($_SESSION['teamName'])){ ?>
                <li>
                    <a href="#" class="dropdown-trigger" data-target='dropdown-levels'>Levels
                        <i class="large material-icons right">arrow_drop_down</i>
                    </a>
                </li>
                <?php } ?>
            </ul>
        </div>
    </nav>

    <div class="row" style="margin-top: 20px;">
        <div class="col s12 m8 l8 center-align">
            <!--Team Related Stuff-->
            <?php
                if(isset($_SESSION['teamName'])) {
                    
                    //show team name
                    echo "<h5 class=\"green-text center-align\">Team $_SESSION[teamName]</h5>";
                    
                    if($_SESSION['eligible']) {
                        
                        //display question no.
                        if($_SESSION['level']<14) {
                            echo "<h5 class=\"white-text center-align\">Level $_SESSION[level]</h5>";
                        }

                        //display question
                        switch($_SESSION['level']) {
                            case "0": echo "<h6 style=\"margin-top:30px;\" class=\"container white-text\"><strong>"."Lets begin this hunt with what our time began"."</strong></h6>";
                            break;
                            case "1": 
                                echo "<h6 style=\"margin-top:30px;\" class=\"container white-text\"><strong>".
                                "Don't judge those, who don't speak,<br>
                                Whom you consider invisible and meek.<br>
                                For they are massive, they follow no laws,<br>
                                It's their very world, their own flaws.<br>
                                But Murphy you were away,<br>
                                Me and Tars were all alone,<br>
                                And amongst its depths,<br>
                                We had to find our way home.<br>"
                                ."</strong></h6>";
                            break;
                            case "2": 
                                echo "<img src=\"img/L2.jpg\" width=\"300px\">";
                            break;
                            case "3":
                                echo "<h6 class=\"white-text\">Time Elapsed:<br></h6><h6 style=\"margin-top:30px;\" class=\"container white-text\"><strong>"."<span id=\"upSpan\"></span>
                                <script>
                                let i = 0;
                                setInterval(updateShit,1000);
                                function updateShit() {
                                    shit = Math.floor(new Date().getTime()/1000)- 1605882540;
                                    shitA = Math.floor(shit/(3600*24));
                                    shitB = Math.floor(shit/3600)%24;
                                    shitC = Math.floor((shit%3600)/60);
                                    shitD = Math.floor(((shit%3600)%60));
                                    
                                    let showA = \"\"+shitA,showB=\"\"+shitB, showC=\"\"+shitC, showD=\"\"+shitD;
                                    if(shitA<10) showA = \"0\"+shitA;
                                    if(shitB<10) showB = \"0\"+shitB;
                                    if(shitC<10) showC = \"0\"+shitC;
                                    if(shitD<10) showD = \"0\"+shitD;
                                    document.getElementById('upSpan').innerHTML = \"43:03:\" + showA + \":\" + showB + \":\" + showC + \":\" + showD;
                                }
                                </script>"
                                ."</strong></h6>";
                            break;
                            case "4": echo 
                            "<img src=\"img/L4.jpeg\" width=\"300px\">";
                            break;
                            case "5": echo "<img src=\"img/L5.png\" width=\"300px\">";
                            break;
                            case "6": echo 
                            "<h6 style=\"margin-top:30px;\" class=\"container white-text\"><strong>".
                            "He is surrounded by fear and dread<br>
                            And his hue says danger ahead<br>
                            Yet I yearned to be his first mate<br>
                            But my stay was no longer than my name.<br>
                            "."</strong></h6>";
                            break;
                            case "7": echo "<img src=\"img/L7.png\" width=\"700px\">";
                            break;
                            case "8": echo "<img src=\"img/L8.png\" width=\"300px\">";
                            break;
                            case "9": echo "<img src=\"img/L9.jpg\" width=\"700px\"><br>"
                            ."<h6 class=\"white-text\">If you want to crack this level you have to find \"your place in space!\"</h6>";
                            break;
                            case "10": echo "<img src=\"img/L10.jpg\" width=\"300px\">";
                            break;
                            case "11": echo "<img src=\"img/L11.png\" width=\"350px\">";
                            break;
                            case "12": echo "<img src=\"img/L12.jpg\" width=\"400px\">"
                            ."<h5 class=\"white-text\">Connect</h5>";
                            break;
                            case "13": echo "<img src=\"img/L13.png\" width=\"400px\">";
                            break;
                            case "14": echo "<h5 class=\"white-text\">Congratulations, you have completed Astro-Hunt! We will contact you soon :)</h5>";
                            break;
                            default: echo "Please Logout and Login again";
                            break;
                        }

                        //form input
                        if($_SESSION['level']<14) { ?>

            <div class="container" style="margin-bottom: 10px;">
                <form action="/check/" class="center-align" method="POST">
                    <div style="width:30%; margin-left: 35%;" class="input-field center-align">
                        <input type="text" name="candidateAnswer" id="answer" class="orange-text" required>
                        <label for="answer">Your Answer</label>
                    </div>
                    <input type="submit" name="submit" class="blue white-text" style="padding: 5px 10px;"
                        value="Submit">
                </form>
            </div>

            <?php
                        } //end of form input if($_SESSION['level']<14)

                    } else {
                    //else for if($_SESSION['eligible'])
                    echo "<h5 class=\"center-align blue-text\">Your team is ineligible</h5>";
                    }
                    
                } else {
                //else for if(isset($_SESSION['teamName']))
                echo "<h3 class=\"center-align white-text\">
                WELCOME TO ASTROHUNT 2020</h3>
                <p class=\"white-text\">The final pitstop for the most mind-bending mysteries and space-spanning adventures.<br>Contend against the best in a race of wits and acuity!</p>
                <h4 class=\"white-text\">RULES</h4>
                <p class=\"white-text left-align container\">
                1. Three members per team.<br>
                2. The questions will be text or image based or a combination of both.<br>
                3. The answers are not case-sensitive but do not include spaces in the answer.<br>
                4. Participants are free to use any online resource to solve the mysteries.<br>
                5. Participants are allowed to ask the coordinator for hints.<br>
                6. Sharing answers/hints with other teams isn't allowed and will lead to elimination of both the teams.<br>
                7. We advise you to use a PC for a better experience although the website will be accessible from both phone and PC.<br>
                8. Do not use double quotes(&quot; &quot;) in answers. There is no answer having double quotes and it will be considered as unfair means.</p>
                
                <h4 class=\"white-text\">Ganbare!!</h4>";        
                }
            ?>

            <!-- Hint for previous levels-->
            <div style="margin-top: 50px;" id="prev_lev"></div>
            <div id="prev_content"></div>
        </div>
        <?php if(isset($_SESSION['teamName'])){ ?>
        <section class="col s12 m3 l3 blue-text">
            <h5 class="center green-text">Leaderboard</h5>
            <hr class="container">
            <?php
        }
                require "$_SERVER[DOCUMENT_ROOT]/dbconn.php";
        
                //update team status
                $sql = "SELECT * FROM `teams` ORDER BY `level` DESC, `last_good` ASC LIMIT 5;";
                $result = mysqli_query($conn, $sql);
                $result = mysqli_fetch_all($result, MYSQLI_ASSOC);
                if(!isset($_SESSION['teamName'])) {
                    $result = [];
                }
                //close db connection
                mysqli_close($conn);
                
                if(isset($_SESSION['teamName'])) {
            ?>
            <table class="centered responsive-table white-text" style="margin-bottom: 10px;">
                <thead>
                    <tr>
                        <th>Team</th>
                        <th>Level</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                }
                    for($i=0;$i<count($result);$i++) { ?>
                    <tr>
                        <td><strong><?php echo $result[$i]['team_name']; ?></strong></td>
                        <td><strong><?php echo $result[$i]['level'];     ?></strong></td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </section>
    </div>

    <!-- Utilities for side work -->

    <!--Side-nav-->

    <ul class="sidenav blue darken-4" id="mobile-links">
        <li><a href="#" class="waves-effect white-text">Conducted by Antariksh, NITKKR</a></li>
        <?php
        if(!isset($_SESSION['teamName'])) { ?>
        <li><a href="#login" class="waves-effect white-text modal-trigger">Log In</a></li>
        <?php } else { ?>
        <li><a href="/logout/" class="waves-effect white-text">Log Out</a></li>
        <?php } ?>
        <?php if(isset($_SESSION['teamName'])) {
        if($_SESSION['level']>0) { ?>
        <li><a onclick="show0()" href="#" class="sidenav-close green darken-1   black-text">Level 0</a></li>
        <?php } if($_SESSION['level']>1) {?>
        <li><a onclick="show1()" href="#" class="sidenav-close green            black-text">Level 1</a></li>
        <?php } if($_SESSION['level']>2) {?>
        <li><a onclick="show2()" href="#" class="sidenav-close green  lighten-1 black-text">Level 2</a></li>
        <?php } if($_SESSION['level']>3) {?>
        <li><a onclick="show3()" href="#" class="sidenav-close green  lighten-2 black-text">Level 3</a></li>
        <?php } if($_SESSION['level']>4) {?>
        <li><a onclick="show4()" href="#" class="sidenav-close green  lighten-3 black-text">Level 4</a></li>
        <?php } if($_SESSION['level']>5) {?>
        <li><a onclick="show5()" href="#" class="sidenav-close yellow lighten-3 black-text">Level 5</a></li>
        <?php } if($_SESSION['level']>6) {?>
        <li><a onclick="show6()" href="#" class="sidenav-close yellow lighten-2 black-text">Level 6</a></li>
        <?php } if($_SESSION['level']>7) {?>
        <li><a onclick="show7()" href="#" class="sidenav-close yellow lighten-1 black-text">Level 7</a></li>
        <?php } if($_SESSION['level']>8) {?>
        <li><a onclick="show8()" href="#" class="sidenav-close yellow           black-text">Level 8</a></li>
        <?php } if($_SESSION['level']>9) {?>
        <li><a onclick="show9()" href="#" class="sidenav-close orange lighten-3 black-text">Level 9</a></li>
        <?php } if($_SESSION['level']>10) {?>
        <li><a onclick="show10()" href="#" class="sidenav-close orange lighten-2 black-text">Level 10</a></li>
        <?php } if($_SESSION['level']>11) {?>
        <li><a onclick="show11()" href="#" class="sidenav-close orange lighten-1 black-text">Level 11</a></li>
        <?php } if($_SESSION['level']>12) {?>
        <li><a onclick="show12()" href="#" class="sidenav-close orange           black-text">Level 12</a></li>
        <?php } if($_SESSION['level']>13) {?>
        <li><a onclick="show13()" href="#" class="sidenav-close red    lighten-3 black-text">Level 13</a></li>
        <?php } if($_SESSION['level']>14) {?>
        <li><a onclick="show14()" href="#" class="sidenav-close red    lighten-2 black-text">Level 14</a></li>
        <?php }}?>
    </ul>

    <!--Modal which opens when we click login button-->

    <div class="modal" id="login">
        <div class="modal-content" id="login-modal">
            <form action="/login/" method="POST">
                <div class="container center-align">
                    <h2>Login</h2>
                    <div class="input-field">
                        <input id="login-teamname" type="text" name="login_teamname" required>
                        <label for="login-teamname" class="black-text">Team Name</label>
                    </div>
                    <div class="input-field">
                        <input id="login-password" type="password" name="login_password" required>
                        <label for="login-password" class="black-text">Team Password</label>
                    </div>
                    <input class="blue btn" type="submit" name="submit" value="Log In">
                </div>
            </form>
        </div>
    </div>

    <!-- DropDown for levels -->

    <ul class="dropdown-content" id="dropdown-levels">
        <?php if(isset($_SESSION['teamName'])) {
        if($_SESSION['level']>0) { ?>
        <li><a onclick="show0()" href="#" class="green darken-1   black-text">Level 0</a></li>
        <?php } if($_SESSION['level']>1) {?>
        <li><a onclick="show1()" href="#" class="green            black-text">Level 1</a></li>
        <?php } if($_SESSION['level']>2) {?>
        <li><a onclick="show2()" href="#" class="green  lighten-1 black-text">Level 2</a></li>
        <?php } if($_SESSION['level']>3) {?>
        <li><a onclick="show3()" href="#" class="green  lighten-2 black-text">Level 3</a></li>
        <?php } if($_SESSION['level']>4) {?>
        <li><a onclick="show4()" href="#" class="green  lighten-3 black-text">Level 4</a></li>
        <?php } if($_SESSION['level']>5) {?>
        <li><a onclick="show5()" href="#" class="yellow lighten-3 black-text">Level 5</a></li>
        <?php } if($_SESSION['level']>6) {?>
        <li><a onclick="show6()" href="#" class="yellow lighten-2 black-text">Level 6</a></li>
        <?php } if($_SESSION['level']>7) {?>
        <li><a onclick="show7()" href="#" class="yellow lighten-1 black-text">Level 7</a></li>
        <?php } if($_SESSION['level']>8) {?>
        <li><a onclick="show8()" href="#" class="yellow           black-text">Level 8</a></li>
        <?php } if($_SESSION['level']>9) {?>
        <li><a onclick="show9()" href="#" class="orange lighten-3 black-text">Level 9</a></li>
        <?php } if($_SESSION['level']>10) {?>
        <li><a onclick="show10()" href="#" class="orange lighten-2 black-text">Level 10</a></li>
        <?php } if($_SESSION['level']>11) {?>
        <li><a onclick="show11()" href="#" class="orange lighten-1 black-text">Level 11</a></li>
        <?php } if($_SESSION['level']>12) {?>
        <li><a onclick="show12()" href="#" class="orange           black-text">Level 12</a></li>
        <?php } if($_SESSION['level']>13) {?>
        <li><a onclick="show13()" href="#" class="red    lighten-3 black-text">Level 13</a></li>
        <?php } if($_SESSION['level']>14) {?>
        <li><a onclick="show14()" href="#" class="red    lighten-2 black-text">Level 14</a></li>
        <?php }}?>
    </ul>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>
    $(document).ready(function() {
        $('.modal').modal();
        $('.sidenav').sidenav();
        $('.dropdown-trigger').dropdown({
            constrainWidth: true,
            coverTrigger: false,
            inDuration: 1000,
            outDuration: 1000
        });
    });
    </script>
    <script>
    <?php if(isset($_SESSION['teamName'])) {
        if($_SESSION['level']>0) { ?>
        function show0() {
            document.getElementById('prev_lev').innerHTML = "<h5 class=\"white-text center-align\">Level 0</h5>";
            document.getElementById('prev_content').innerHTML = "<h6 style=\"margin-top:30px;\" class=\"container white-text\"><strong>Lets begin this hunt with what our time began</strong></h6>";
        }
        <?php } if($_SESSION['level']>1) {?>
        function show1() {
            document.getElementById('prev_lev').innerHTML = "<h5 class=\"white-text center-align\">Level 1</h5>";
            document.getElementById('prev_content').innerHTML = "<h6 style=\"margin-top:30px;\" class=\"container white-text\"><strong>Don't judge those, who don't speak,<br>Whom you consider invisible and meek.<br>For they are massive, they follow no laws,<br>It's their very world, their own flaws.<br>But Murphy you were away,<br>Me and Tars were all alone,<br>And amongst its depths,<br>We had to find our way home.<br></strong></h6>";
        }
        <?php } if($_SESSION['level']>2) {?>
        function show2() {
            document.getElementById('prev_lev').innerHTML = "<h5 class=\"white-text center-align\">Level 2</h5>";
            document.getElementById('prev_content').innerHTML = "<img src=\"img/L2.jpg\" width=\"300px\">";
        }
        <?php } if($_SESSION['level']>3) {?>
        function show3() {
            document.getElementById('prev_lev').innerHTML = "<h5 class=\"white-text center-align\">Level 3</h5>";
            document.getElementById('prev_content').innerHTML = "<h6 class=\"white-text\">Time Elapsed:<br></h6><h6 style=\"margin-top:30px;\" class=\"container white-text\"><strong>Voyager-2 Live Clock</strong></h6>";
        }
        <?php } if($_SESSION['level']>4) {?>
        function show4() {
            document.getElementById('prev_lev').innerHTML = "<h5 class=\"white-text center-align\">Level 4</h5>";
            document.getElementById('prev_content').innerHTML = "<img src=\"img/L4.jpeg\" width=\"300px\">";
        }
        <?php } if($_SESSION['level']>5) {?>
        function show5() {
            document.getElementById('prev_lev').innerHTML = "<h5 class=\"white-text center-align\">Level 5</h5>";
            document.getElementById('prev_content').innerHTML = "<img src=\"img/L5.png\" width=\"300px\">";
        }
        <?php } if($_SESSION['level']>6) {?>
        function show6() {
            document.getElementById('prev_lev').innerHTML = "<h5 class=\"white-text center-align\">Level 6</h5>";
            document.getElementById('prev_content').innerHTML = "<h6 style=\"margin-top:30px;\" class=\"container white-text\"><strong>He is surrounded by fear and dread<br>And his hue says danger ahead<br>Yet I yearned to be his first mate<br>But my stay was no longer than my name.<br></strong></h6>";
        }
        <?php } if($_SESSION['level']>7) {?>
        function show7() {
            document.getElementById('prev_lev').innerHTML = "<h5 class=\"white-text center-align\">Level 7</h5>";
            document.getElementById('prev_content').innerHTML = "<img src=\"img/L7.png\" width=\"700px\">";
        }
        <?php } if($_SESSION['level']>8) {?>
        function show8() {
            document.getElementById('prev_lev').innerHTML = "<h5 class=\"white-text center-align\">Level 8</h5>";
            document.getElementById('prev_content').innerHTML = "<img src=\"img/L8.png\" width=\"300px\">";
        }
        <?php } if($_SESSION['level']>9) {?>
        function show9() {
            document.getElementById('prev_lev').innerHTML = "<h5 class=\"white-text center-align\">Level 9</h5>";
            document.getElementById('prev_content').innerHTML = "<img src=\"img/L9.jpg\" width=\"700px\"><br><h6 class=\"white-text\">If you want to crack this level you have to find \"your place in space!\"</h6>";
        }
        <?php } if($_SESSION['level']>10) {?>
        function show10() {
            document.getElementById('prev_lev').innerHTML = "<h5 class=\"white-text center-align\">Level 10</h5>";
            document.getElementById('prev_content').innerHTML = "<img src=\"img/L10.jpg\" width=\"300px\">";
        }
        <?php } if($_SESSION['level']>11) {?>
        function show11() {
            document.getElementById('prev_lev').innerHTML = "<h5 class=\"white-text center-align\">Level 11</h5>";
            document.getElementById('prev_content').innerHTML = "<img src=\"img/L11.png\" width=\"350px\">";
        }
        <?php } if($_SESSION['level']>12) {?>
        function show12() {
            document.getElementById('prev_lev').innerHTML = "<h5 class=\"white-text center-align\">Level 12</h5>";
            document.getElementById('prev_content').innerHTML = "<img src=\"img/L12.jpg\" width=\"400px\"><h5 class=\"white-text\">Connect</h5>";
        }
        <?php } if($_SESSION['level']>13) {?>
        function show13() {
            document.getElementById('prev_lev').innerHTML = "<h5 class=\"white-text center-align\">Level 13</h5>";
            document.getElementById('prev_content').innerHTML = "<img src=\"img/L13.png\" width=\"400px\">";
        }
        <?php } if($_SESSION['level']>14) {?>
        function show14() {
            document.getElementById('prev_lev').innerHTML = "<h5 class=\"white-text center-align\">Level 14</h5>";
            document.getElementById('prev_content').innerHTML = "<h5 class=\"white-text\">Congratulations, you have completed Astro-Hunt! We will contact you soon :)</h5>";
        }
        <?php }}?>
    </script>
</body>

</html>