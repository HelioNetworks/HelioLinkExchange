<?php
/*
# This file counts clicks from users and update to db
# After counting a click for a site makes sure that a user can not click for the same site again
# We will set cookie and add IP in db for tracking
*/
// include configuration file
include('config.php');

//set variables
$id=$_GET['id'];
$url=$_GET['url'];
// Get user IP for tracking
$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
$ip2 = $_SERVER['REMOTE_ADDR'];

//Check if everything is ok
if(!empty($id)||ctype_digit($id)){
 //if ok, then procceed
$q=mysql_query("SELECT * FROM `topsite` WHERE id='".$id."'");

// check if user have already Clicked for a site
$qip = mysql_query("SELECT * FROM `ips` WHERE id='".$id."' AND ip='".$ip."' OR ip2='".$ip2."'");
if (mysql_num_rows($qip)>0) {
$ip_saved = 1;
}
// first check if requested site is available or not via "id"
 if(mysql_num_rows($q)>0){
 $c1 = "click".$id;
 if(!isset($_COOKIE[$c1])&&$_COOKIE[$c1]!=$id&&!empty($ip_saved)){
 
 // if click set, then procceed
mysql_query("UPDATE `topsite` SET clicks=clicks+1 WHERE id='".$id."'");
echo '<meta http-equiv="refresh" content="0; url=go.php?id='.$id.'."&url='.$url.'">';
mysql_query("INSERT INTO `ips` (id, ip, ip2) VALUES ('".$id."','".$ip."','".$ip2."')");
 } else {

// everything is okay, redirect user to redirect
echo '<meta http-equiv="refresh" content="0; url=index.php">
</head>
<body>
Redirecting...
</body>
</html>';
}
  } else {
// site not found, show warning to user and returning to home
 echo '<meta http-equiv="refresh" content="0; url=index.php">
</head>
<body onload="javascript:alert(\'Sorry, the site you are looking for cannot be found. You are being redirected to home page.\');">
Click <a here="index.php">here</a> if you are not redirected automatically.
</body>
</html>';
 }
} else {
// if not, then show warning and redirect to home page
echo '<meta http-equiv="refresh" content="0; url=index.php">
</head>
<body onload="javascript:alert(\'Sorry, something went wrong. You are being redirected to home page.\');">
Click <a here="index.php">here</a> if you are not redirected automatically.
</body>
</html>';
}
// Close MySQL connection
mysql_close();
?>