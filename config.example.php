<?php
/*
 * This is configuration file.
 * Edit values as needed
 */
// Main configuration
// hide warnings
error_reporting(E_ERROR | E_PARSE);
// DataBase connection
require('DataBase.secure');
mysql_connect("tommy.heliohost.org", "username", $pass);
mysql_select_db('database_name');
//Webmaster Email
$mail_webmaster = 'example@example.com';
// URL
$url = 'https://example.com/';
//Number of sites per page
$nb_site_page = 10;
//Send an email when accepting/rejecting a web site
$mail = true;
//Site name/title
$sname = "Helio Link Exchange";
//Base Site
$surl = "/";
// Admin password for accepting or rejecting site
$password = "1234";
?>