<?php
/*
# This file sets cookie and forwards
*/
// Get/Set values
$id=$_GET['id'];
$url=$_GET['url'];
$cid=$_GET['cid'];
if ($id == $cid) {
// if successful, then redirect
echo 'Redirecting... Your click <b>has</b> been saved.<script>window.location.replace("'.$url.'")</script>';
} else {
// if failed, then print
echo 'Somehing is wrong!';
}
?>