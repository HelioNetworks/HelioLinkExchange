<?php
/*
# This file sets cookie and forwards
*/
include('config.php');
include('assets/include/header.php');
include('assets/include/navbar.php');
// Get/Set values
$id=$_GET['id'];
$url=$_GET['url'];
$cid=$_GET['cid'];
if ($id == $cid) {
// if successful, then redirect
echo 'Redirecting... ';
sleep(2);
echo '<script>window.location.replace("'.$url.'")</script>';
} else {
// if failed, then print
echo 'Somehing is wrong!';
}
include('assets/include/footer.php');
?>