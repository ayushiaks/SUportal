<?php
session_start();
include("notices/database.php");



$sql="SELECT * FROM club ORDER BY id DESC";
$sql1="SELECT * FROM admin";

$result1=mysqli_query($con, $sql);
$result2=mysqli_query($con, $sql);
$result3=mysqli_query($con, $sql);
$result=mysqli_query($con, $sql1);

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/style.css" />

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="materialize/css/materialize.min.css"  media="screen,projection"/>

      <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.3/js/all.js"></script>
    <title>Student Union Portal</title>
</head>
<body>

    <div id="wrapper">
        <div id="black">

        </div>
        <div id="nav-bar">
            <div id="logo">
                <!-- TODO: Add BITS Logo here -->
            </div>
            <ul id="nav-items">
                <li id="home"><a class="tot_a" href="land.php">Home</a></li>
                <li class="parent-menu">
                    <a class="tot_a" href="#">212 Bus</a>
                    <ul class="sub-menu">
                        <li><a class="tot_a" href="http://tracker.pythonanywhere.com/">212 Tracker</a></li>
                        <li id="twoonetwo">212 Timings</li>
                    </ul>
                </li>
                <li id="contact">About Us</li>

                <li id="cng">Grievances</li>
                <li id="comp">Complaints</li>
                <li id="notice"><a href="notices/Notice.php">Notice</a></li>
                <li id="cal">Calendar</li>
                <li><a class="tot_a" href="logout.php">Logout</a></li>
            </ul>
            <div id="login">
                <!--<a href="login.php">Login</a>-->
            </div>
        </div>
        <div id="ajax-con">
            <div id="content">
                <div class="category">
                    <h1>Technical</h1>
                    <?php
                    $ctr1 = 0;
                    while($rows = mysqli_fetch_array($result1, MYSQLI_ASSOC)){
                        if(($rows['type'] == 'Technical') && $ctr1 < 10){
                            ?>
                            <p class="club_notice_content">
                                <?php    echo $rows['event_name']; ?>
                            </p>
                            <?php
                            // Exit looping and close connection
                            $ctr1++;
                        }
                    }
                    ?>
                    <div class="more" id="tech">
                        <a href="#"> Know More </a>
                    </div>
                </div>
                <div class="category">
                    <h1>Cultural</h1>
                    <?php
                    $ctr2 = 0;
                    while($rows = mysqli_fetch_array($result2, MYSQLI_ASSOC)){
                        if(($rows['type'] == 'Cultural')&& $ctr2 < 10){
                            ?>
                            <p class="club_notice_content">
                                <?php echo $rows['event_name']; ?>
                            </p>
                            <?php
                            // Exit looping and close connection
                            $ctr2++;
                        }
                    }
                    ?>
                    <div class="more" id="cult">
                        <a href="#"> Know More </a>
                    </div>
                </div>
                <div class="category">
                    <h1>Sports</h1>
                    <?php
                    $ctr3=0;
                    while($rows = mysqli_fetch_array($result3, MYSQLI_ASSOC)){
                        if(($rows['type'] == 'Sports')&&$ctr3<10){
                            ?>
                            <p class="club_notice_content">
                                <?php echo $rows['event_name']; ?>
                            </p>
                            <?php
                            // Exit looping and close connection
                            $ctr3++;
                        }
                    }
                    ?>
                    <div class="more" id="sports">
                        <a href="#"> Know More </a>
                    </div>
                </div>
                <div class="category">
                    <h1>Others</h1>
                    <?php
                    $ctr4=0;
                    while($rows = mysqli_fetch_array($result3, MYSQLI_ASSOC)){
                        if(($rows['type'] == 'Others')&&$ctr4<10){
                            ?>
                            <p class="club_notice_content">
                                <?php echo $rows['event_name']; ?>
                            </p>
                            <?php
                            // Exit looping and close connection
                            $ctr4++;
                        }
                    }
                    ?>
                    <div class="more" id="others">
                        <a href="#"> Know More </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript" language="javascript">
    $(document).ready(function() {
        $(document).on('click','#tech',function () {
            $('#ajax-con').load('notices/technotice.php', function() {
                $('head').append('<link rel="stylesheet" href="css/club_notice.css" />');
            });
        });
        $(document).on('click','#cult',function () {
            $('#ajax-con').load('notices/cultnotice.php', function() {
                $('head').append('<link rel="stylesheet" href="css/club_notice.css" />');
            });
        });
        $(document).on('click','#sports',function () {
            $('#ajax-con').load('notices/sportsnotice.php', function() {
                $('head').append('<link rel="stylesheet" href="css/club_notice.css" />');
            });
        });
        $(document).on('click','#others',function () {
            $('#ajax-con').load('info/others.html', function() {

            });
        });
        $(document).on('click','#twoonetwo',function () {
            $('#ajax-con').load('info/212.html', function() {

            });
        });
        $(document).on('click','#contact',function () {
            $('#ajax-con').load('about_us.html', function() {
                $('head').append('<link rel="stylesheet" href="css/about_us.css" />');
            });
        });
        $(document).on('click','#cng',function () {
            $('#ajax-con').load('comp/grievances.php', function() {
                $('head').append('<link rel="stylesheet" href="css/grievances.css" />');
            });
        });

        $(document).on('click','.submitgr_anonymous',function () {
            $('#ajax-con').load('comp/gr_anonymus.php', function() {
            });
        });
        $(document).on('click','#comp',function () {
            $('#ajax-con').load('comp/comp.php', function() {
                $('head').append('<link rel="stylesheet" href="css/complaints.css" />');
            });
        });

        $(document).on('click','.submitco_anonymous',function () {
            $('#ajax-con').load('comp/co_anonymous.php', function() {
            });
        });
        $(document).on('click','#cal',function () {
            $('#ajax-con').load('cal.php', function() {

            });
        });
    });
    </script>
</body>
</html>
