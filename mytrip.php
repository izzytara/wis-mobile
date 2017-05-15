<!doctype html>
<html lang="en">
	<!--Here is the head-->
	<head>
  	<meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Travel Diary</title>
    <link rel="stylesheet" href="css/main.css">

    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="css/swiper.css">
        
    <!-- Link Bootstrap's CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <!-- Link Bootstrap's js -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- Link Siper's js-->
    <script src="js/swiper.js"></script>
	</head>

	<!--Here is the body-->
	<body>

       <!--Here is the navigation-->
        <div class="nav-bar">
            <div class="container">               
                <div class="topnav nav" id="myTopnav">
                    <a class="navbar-brand" href="index.php"><img src="img/LOGO.png" alt="Traval Diary logo"></a>
                    <a class="left" href="explore.php">EXPLORE</a>
                    <a class="left" href="mytrip.php">MY TRAVEL</a>
                    <a class="left" href="#app">APP</a>
                    <a class="left" href="#aboutus">ABOUT US</a>                   
                    <a class="right" href="#">LANGUAGE</a>
                        <!--<li class="right"><a href="#"><span class="glyphicon glyphicon-list"></span></a> -->
                        
                        <!--If user has not loged in-->
                    
                        <?php
                            session_start();
                            if(!$_SESSION['auth']){
                        ?>                               
                            <a class="right" href="#" onclick="document.getElementById('userlogin').style.display='block'">LOGIN</a>                       
                        <!--If user has not loged in-->
                        <?php
                            }else if($_SESSION['auth']){
                        ?>                                      
                            <a class="right" href="logout.php">LOGOUT</a>                                                                                 
                        <?php
                            }
                        ?>                                               
                        
                    
                    <a href="javascript:void(0);" style="font-size:1em;" class="navicon" onclick="myFunction()">&#9776;</a>
                </div>
            </div>
        </div>
    <!--JavaScript for responsive mobile navigation-->
        <script>
            function myFunction() {
                var x = document.getElementById("myTopnav");
                if (x.className === "topnav") {
                    x.className += " responsive";
                } else {
                    x.className = "topnav";
                }
            }
        </script>

        
    <!--Here is the login form-->
    <div id="userlogin" class="modal">
            <div class="login">
                <form class="modal-content animate" action="login.php" method="post">
                    <h2 class="tcenter">Login</h2>

                        <div class="loginform center">
                            <label><b>Username</b></label>
                            <br>
                            <input class="center" type="text" placeholder="Enter username" name="username" required>
                            <br>
                            <label><b>Password</b></label>
                            <br>
                            <input class=" center" type="password" placeholder="Enter password" name="password" required>
                            <br>
                        </div>
                        <p class="tcenter"><button class="btn" type="submit" name="signup">Sign up</button><button class="btn" type="submit" name="login">Log in</button></p>
                    
                </form>
            </div>
        </div>

    <!--Here is the content-->
    <?php
    if($_SESSION['auth']){
    ?>
    <!--If log in-->
    <div class="content">
        <h2 class="tcenter">My Travel</h2>
        
        
        <div  class="container white">
    <!-- Swiper -->
                <div id="timeline" class="swiper-container swiper">
                    <div class="swiper-container">
                        <div class="swiper-wrapper">
                            <?php
                            header("Content-Type: text/html; charset=utf8");
                            $uname = $_SESSION['Username'];
                            include('Connect.php');
                            $timelinesql = "SELECT * FROM travel_story WHERE uid = (SELECT uid FROM travel_user WHERE uname = '$uname') order by `update_time` DESC";
                            $timelinres = mysqli_query($connect, $timelinesql);
                            while($timeline = mysqli_fetch_assoc($timelinres)){
                            ?>
                            <div class="swiper-slide">
                                <p id="line-for-timeline" class="tcenter"><span><?php echo $timeline[update_time];?></span>&nbsp&nbsp<span class="glyphicon glyphicon-map-marker"></span><span><?php echo $timeline[location];?></span></p>
                                <img id="<?php echo $timeline[storyid];?>" class="img-responsive center" src="<?php echo $timeline[image_URL];?>" alt="test1"/>
                            </div> 
                            <?php
                            }
                            ?>                          
                        </div>
        <!-- Add Pagination -->
                        <div class="swiper-pagination"></div>
                    </div>
                    
    
    <!--buttons-->
                <div class="button center">
                    <p class="tcenter"><a href="design.php" class="btn"><span id="start-icon" class="glyphicon glyphicon-edit"></span>Start Your Diary</a>
                    </p>
                </div>
            </div>
            
        </div>
        <div class="popup-window">
            <div id="timeline-edit" class="modal">
                <form class="modal-content animate" name="deletePhoto" action="delete.php" method="post">
                    <p class="tcenter">Do you want to delete it?</p>
                    <input id="photo-delete" name="p_id" type="hidden" value="photoID">
                    <p class="tcenter"><input class="btn tcenter" type="submit" name="yes" value="Yes">&nbsp;&nbsp;&nbsp;<input id="closediv" type="button" class="btn tcenter" value="No"></p>
                </form>
            </div>
        </div>
        <?php
        }else{
        ?>
        
        <div class="content">
            <div class="container white"><p class="tcenter">Login to record your own memory!</p></div>
        </div>
        <?php
        }
        ?>
        
        <script>
            $(document).ready(function(){
                $("#timeline img").click(function(){
                    var photoId = $(this).attr("id");
                    $("#photo-delete").attr("value", photoId);
                    $("#timeline-edit").show();
                });

                $("#closediv").click(function(){
                    $("#timeline-edit").hide();
                });
            });
            
        </script>
        
    <!-- Initialize Swiper -->
        <!-- Initialize Swiper -->
        <script>
        var swiper = new Swiper('.swiper-container', {
            pagination: '.swiper-pagination',
            slidesPerView: 1,
            paginationClickable: true,
            spaceBetween: 10,
            freeMode: true
        });
        </script>
       
        
        <script>
    //get the modal
            var modal = document.getElementById('userlogin');
    //when the user clicks anywhere out side the modal, close it
            window.onclick = function(event){
                if (event.target == modal){
                modal.style.display = "none";
            }
        }
        </script>
    </div>

    <!--Here is the footer-->
    
    <div class="footer">
        <div class="container">
                &copy; Copyright 2017
        </div>
    </div>

    
	</body>
</html>
