<?php
    header("Content-Type: text/html; charset=utf8");
    if(isset($_POST["yes"])){
    	include('Connect.php');//Connect DB
    	$storyid = $_POST["p_id"];
    	$deletesql = "DELETE FROM travel_story WHERE storyid = '$storyid'";
    	$deleteres = mysqli_query($connect, $deletesql);
    	if($deleteres){
    		echo "<script>alert('Delete success！');history.go(-1);</script>"; 
    	}
    }
?>