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
if(!empty($id) || ctype_digit($id)){
 //if ok, then procceed
$q=mysql_query("SELECT * FROM `topsite` WHERE id='".$id."'");
// check if user have already Clicked for a site
$qip = mysql_query("SELECT * FROM `ips` WHERE id='".$id."' AND ip='".$ip."' OR ip2='".$ip2."'");
if (mysql_num_rows($qip)>0) {
$ip_saved = 1;
}
if(mysql_num_rows($q)>0) {
  $cid = $id;
  echo "check id.<br /><br />";
 }
if(!isset($_COOKIE["Clicked_ID".$cid]) && (isset($cid))) {
  echo "set cookie.<br /><br />";
  setcookie("Clicked_ID".$cid, "iD:".$id." ip:".$ip." / ".$ip2, time() + (86400 * 30), "/"); // 86400 = 1 day
  $set_true = 1; // So we know the cookie has been set
}
// first check if requested site is available
if(($set_true == 1) && ($ip_saved == 0)) { //set_true for quicker testing.
  echo "check cookie.<br /><br />";
 // if click set, then procceed
mysql_query("UPDATE `topsite` SET clicks=clicks+1 WHERE id='".$id."'");
mysql_query("INSERT INTO `ips` (id, ip, ip2) VALUES ('".$id."','".$ip."','".$ip2."')");
echo 'Redirecting... (1)';
sleep(5);
echo '<script>window.location.replace("/go/?id='.$id.'&url='.$url.'&cid='.$cid.'")</script>';
 } else {

// everything is okay, redirect user to website
echo 'Redirecting... (0)';
sleep(20);
echo '<script>window.location.replace("/go/?id='.$id.'&url='.$url.'&cid='.$cid.'")</script>';
}
if(mysql_num_rows($q) == 0) {
// site not found, show warning to user and returning to home
 echo '<body onload="javascript:alert(\'Sorry, the site you are looking for cannot be found. You are being redirected to home page.\');">
Click <a href="/">here</a> if you are not redirected automatically.';
 }
} else {
// if not, then show warning and redirect to home page
echo '<body onload="javascript:alert(\'Sorry, something went wrong. You are being redirected to home page.\');">
Click <a href="/">here</a> if you are not redirected automatically.';
}
// Close MySQL connection
mysql_close();
?>