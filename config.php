<?php
/*
# This is configuration file.
# Edit values as needed
*/
// Main configuration
// hide warnings
error_reporting(E_ERROR | E_PARSE);

// DataBase connection
mysql_connect('localhost', 'mrj_test', 'PASSWORD');
mysql_select_db('mrj_test');

//Webmaster Email
$mail_webmaster = 'merajbd7@gmail.com';

// URL
$url = 'http://example.com/';

//Number of sites per page
$nb_site_page = 10;

//Send an email when accepting/rejecting a web site
$mail = true;
//Site name/title
$sname = "AtoZ.ML";
//Base Site
$surl = "http://atoz.ml";

// Admin password for accepting or rejecting site
$password = 1234;
?>
<!DOCTYPE html>
<html>
<head>
<meta name="robots" content="index, follow,all"/>
<meta name="language" content="en"/>
<meta name="googlebot" content="index,follow,all"/>
<meta name="audience" content="all"/>
<meta name="viewport" content="width=device-width, initial-scale=1"/>
<meta name="keywords" content="site,top,link,exchange,heliohost,helionet,atoz.ml,mrj,meraj"/>
<meta name="description" content="<?=$dc?>"/>
<link rel="stylesheet" href="http://<?=$surl?>/styles/materialize.min.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Inconsolata" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="http://<?=$surl?>/material-icons.min.css">
<link rel="stylesheet" href="http://<?=$surl?>/style.css" type="text/css">
<link rel="shortcut icon" href="http://<?=$surl?>/favicon.ico" type="image/x-icon"/>
<link rel="icon" href="http://<?=$surl?>/favicon.ico" type="image/x-icon"/>
<meta name="title" content="<?=$sname?> - <?=$title?>"/>
<title><?=$sname?> - <?=$title?></title>