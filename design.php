<!doctype html>
<html lang="en">
	<!--Here is the head-->
	<head>
  	<meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Travel Diary</title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/design.css">
    <!-- Link Google font -->
    <link href="https://fonts.googleapis.com/css?family=Asap" rel="stylesheet">

    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="css/swiper.css">
        
    <!-- Link Bootstrap's CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <!-- Link Bootstrap's js -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- Link Siper's js-->
    <script type="text/javascript" src="js/swiper.js"></script>
    <script type="text/javascript" src="js/map.js"></script>
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
    <div class="content">
        
<!--*****The form starts here*******-->
        
    <!--Here is the Step1 container-->
        <form class="design-form" action="upload.php" method="post" enctype="multipart/form-data">
            <div id="step1" class="container green">
                <div class="design-outside">
                    <h3 class="tcenter">1. Choose Location</h3>
                    <div class="design-inside center">

                        <div class="step-instruct"><p class="tcenter">Please chick you current location from the Google Map</p></div>
                        <div id="map" class="design-area"></div>
                        <!--map api-->
                        <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAM4uETuyFU5KzjRyn1-aZYy-xnH6jJwzg&callback=myMap" type="text/javascript"></script>
                        <!--Get location POST-->
                        <input id="location" name="location" style="color:black" type="hidden">
                        
                    </div>
                    <div class="stepbar"><p class="tcenter">
                        <img class="img-responsive center" src="img/step1nav.png" alt="step1 nav progress bar"/></p>
                    </div>

                </div>
            </div>


        <!--Here is the Step2 container-->
            
            <div id="step2" class="container white">
                <div class="design-outside">
                    <h3 class="tcenter">2. Upload Your Pictures</h3>
                    <div class="design-inside center">

                        <div class="step-instruct"><p class="tcenter">Please choose your photograph from your mobile or computer</p></div>


                        <div class="design-area">
                            <img id="upload-img" class="img-responsive center" src="img/upload%20image.png" alt="upload photo"/>
                            <p class="tcenter"><input type="file" name="file" id="file"/></p>
                        </div>              
                    </div>
                    <div class="stepbar"><p class="tcenter">
                        <img class="img-responsive center" src="img/step2nav.png" alt="step1 nav progress bar"/></p>
                    </div>      
                </div>
            </div>
            




        <!--Here is the third display container-->
            <div id="step3" class="container green">
                <div class="design-outside">
                    <h3 class="tcenter">3. My Blog Post</h3>
                    <div class="design-inside center">
                        <div class="design-area textarea center">
                            <textarea class="center textarea-small" rows="1" cols="60" name="title"placeholder="Write your title here." required></textarea>
                            <br>
                            <textarea class="center textarea-large" rows="11" cols="60" name="story" placeholder="Write in your journal here." required></textarea>
                            <p class="tcenter"><button class="btn" type="submit" name="signup">Done</button></p>
                        </div>

                    </div>
                    <div class="stepbar"><p class="tcenter">
                        <img class="img-responsive center" src="img/step3nav.png" alt="step1 nav progress bar"/></p>
                    </div>

                </div>
            </div>
    </form>
<!--*****The form ends here*******-->
    
    
    </div>
    <!--Here is the footer-->
    
    <div class="footer">
        <div class="container">
                &copy; Copyright 2017
        </div>
    </div>

    
	</body>
</html>
