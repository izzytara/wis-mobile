<!doctype html>
<html lang="en">
	<!--Here is the head-->
	<head>
  	<meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Travel Diary</title>
    <link rel="stylesheet" href="css/main.css">
    <!-- Link Google font -->
    <link href="https://fonts.googleapis.com/css?family=Asap" rel="stylesheet">

    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="css/swiper.css">
        
    <!-- Link Bootstrap's CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="js/script.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <!-- Link Bootstrap's js -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- Link Siper's js-->
    <script src="JS/swiper.js"></script>
    
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
        <!--Here is test popular works display container-->
        <?php
        header("Content-Type: text/html; charset=utf8");
        include('Connect.php');
        $popular = "SELECT * FROM travel_story order by `popular` DESC LIMIT 10;";
        $popularres = mysqli_query($connect, $popular);
        while($popular1 = mysqli_fetch_assoc($popularres)){
        ?>
        <!--Get All stroies, sorted by popular-->
        <div id="popular-works" class="container white center">
            <div class="diary-display">
                <div class="photo">
                    <img class="img-responsive" src="<?php echo $popular1[image_URL];?>" id="<?php echo $popular1[storyid];?>" alt="placeholder">
                </div>
                <div class="diary">
                    <div class="location">
                        <p>
                            <span class="glyphicon glyphicon-map-marker"></span>
                            <span><?php echo $popular1[location];?></span>
                        </p>
                    </div>                    
                    <div class="title">
                        <h5>Title: <span><?php echo $popular1[title];?></span></h5>
                    </div>
                    <!--Get author name from uid-->
                    <?php
                    $findunamebyuid = "SELECT uname FROM travel_user WHERE uid= '$popular1[uid]'";
                    $nameres = mysqli_query($connect, $findunamebyuid);
                    $nameres1 = mysqli_fetch_assoc($nameres);
                    ?>
                    <div class="author-date">
                        <p>By:&nbsp;<span><?php if($nameres1[uname]){echo $nameres1[uname];}elseif($nameres1[uname] == null){echo "****";}?></span>&nbsp;Date: <span><?php echo $popular1[update_time];?></span></p>
                    </div>
                    
                    <div class="text">
                        <p><?php echo $popular1[story];?></p>
                    </div>                
                </div>                           
            </div>

            <div class="vote-like">
                    <p>
                        <span class="glyphicon glyphicon-heart vote-heart"></span>
                        <span><?php echo $popular1[popular];?></span>Like
                        <a href="#"><span class="glyphicon glyphicon-share"></span></a>   
                    </p>  
            </div>
        </div>
        <?php
        }
        ?>

        <!--Get image id-->
        <script>
            $(document).ready(function(){
                $(".photo img").click(function(){
                    var photoId = $(this).attr("id");
                    $("#vote-input").attr("value", photoId);
                    $("#vote-like-confirm").show();
                });

                $("#closediv").click(function(){
                    $("#vote-like-confirm").hide();
                });
            });
            
        </script>
            
            <div id="vote-like-confirm" class="modal">
                <form class="modal-content animate" name="vote_sys" method="post">
                    <p class="tcenter">Like it? Vote it!</p>
                    <input id="vote-input" name="story_id" type="hidden" value="photoID">
                    <p class="tcenter"><input class="btn tcenter" type="button" onclick="voteimg()" value="Yes">&nbsp;&nbsp;&nbsp;<input id="closediv" type="button" class="btn tcenter" value="No"></p>
                </form>
            </div>

            <!--Ajax to action vote.php-->
            <script>
            function voteimg(){
                var url = "/vote.php";
                var msg = document.getElementById("msg");
                var f = document.vote_sys;
                var storyid = f.story_id.value;
                console.log(storyid);
                $.ajax({
                    type:"POST",
                    url:url,
                    data: {storyid:storyid},
                    success:function(msg){
                        alert(msg);
                        history.go(0);
                    }
                });
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
