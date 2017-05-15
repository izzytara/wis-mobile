<?php
header("Content-Type: text/html; charset=utf8");
//Check file type is correcy
if ((($_FILES["file"]["type"] == "image/gif")
|| ($_FILES["file"]["type"] == "image/jpeg")
|| ($_FILES["file"]["type"] == "image/jpg")
|| ($_FILES["file"]["type"] == "image/pjpeg"))
&& ($_FILES["file"]["size"] < 200000))
  {
  if ($_FILES["file"]["error"] > 0)//If error
    {
    echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
    }
  else
    {
    //echo "Upload: " . $_FILES["file"]["name"] . "<br />";
    //echo "Type: " . $_FILES["file"]["type"] . "<br />";
    //echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
    //echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";
    if (file_exists("storyimg/" . $_FILES["file"]["name"]))//If same file
      {
      echo "<script>alert('This img already exists!');history.go(-1);</script>";
      }
    else{
      move_uploaded_file($_FILES["file"]["tmp_name"], "storyimg/" . $_FILES["file"]["name"]);
      session_start();
      include('Connect.php');//Connect DB
      if($_SESSION['auth']){//Get uid if logged in
        $uname = $_SESSION['Username'];
        $findidbyname = "SELECT uid FROM travel_user WHERE uname= '$uname'";
        $uidres = mysqli_query($connect, $findidbyname);
        $uid1 = mysqli_fetch_assoc($uidres);
        $uid = $uid1[uid];
        $update_time = date("Y-m-d");//Get current time
        $location = $_POST["location"];
        $title = $_POST["title"];
        $story = $_POST["story"];
        $image_URL = "storyimg/". $_FILES["file"]["name"];//Get img stored URL
        $pupular = 0;
        $sql = "INSERT INTO travel_story(storyid,uid,update_time,location,title,story,image_URL,popular) VALUES (NULL,'$uid','$update_time','$location','$title','$story','$image_URL','$pupular')";
        $res = mysqli_query($connect, $sql);
        if($res){//If save success
          echo "<script>alert('Success Save this story');</script>";
          $index = "https://infs3202-d1sr7.uqcloud.net/";  
          echo "<script type='text/javascript'>";  
          echo "window.location.href='$index'";  
          echo "</script>";  
        }else{
          echo "Somthing ERROR, Try again later";
        }
      }elseif(!$_SESSION['auth']){
        $update_time = date("Y-m-d");//Get current time
        $location = $_POST["location"];
        $title = $_POST["title"];
        $story = $_POST["story"];
        $image_URL = "storyimg/". $_FILES["file"]["name"];//Get img stored URL
        $pupular = 0;
        $sql = "INSERT INTO travel_story(storyid,uid,update_time,location,title,story,image_URL,popular) VALUES (NULL,NULL,'$update_time','$location','$title','$story','$image_URL','$pupular')";
        $res = mysqli_query($connect, $sql);
        if($res){//If save success
          echo "<script>alert('Success Save this story');</script>";
          $index = "https://infs3202-d1sr7.uqcloud.net/";  
          echo "<script type='text/javascript'>";  
          echo "window.location.href='$index'";  
          echo "</script>";  
        }else{
          echo "Somthing ERROR, Try again later";
        }
      }  

    }
  }
  }
else//If get file error
  {
  echo "Invalid file";
  }

?>