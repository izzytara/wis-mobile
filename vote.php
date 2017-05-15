<?php	
	include('Connect.php'); 
	$storyid = $_POST['storyid'];
	$popularnum = "SELECT popular FROM travel_story WHERE storyid='$storyid'";//
	$popularnumres = mysqli_query($connect, $popularnum);
    $popular = mysqli_fetch_assoc($popularnumres);
    $Num = $popular[popular];
    $Num = $Num + 1;
    $update = "UPDATE travel_story SET popular = '$Num' WHERE storyid='$storyid'";
    $updateres = mysqli_query($connect, $update);
    if($updateres){
    	echo "Vote success!";
    }
    else{
    	echo "Error";
    }
?>