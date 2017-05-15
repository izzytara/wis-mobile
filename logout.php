<?php
#used for logout
session_start();

unset($_SESSION['Username']);     
unset($_SESSION['auth']);
header("location: index.php");
exit;
?>