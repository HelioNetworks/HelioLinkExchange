<?php
/*
# This is configuration file.
# Edit values as needed
*/
// Main configuration
// hide warnings
error_reporting(E_ERROR | E_PARSE);

// DataBase connection
mysql_connect('tommy.heliohost.org', 'bailey_github-lx', 'removed');
mysql_select_db('bailey_heliolinkexchange');

//Webmaster Email
$mail_webmaster = 'bailey@bailey.guru';

// URL
$url = 'https://hlx.bailey.guru/';

//Number of sites per page
$nb_site_page = 10;

//Send an email when accepting/rejecting a web site
$mail = true;
//Site name/title
$sname = "Helio Link Exchange";
//Base Site
$surl = "https://hlx.bailey.guru";

// Admin password for accepting or rejecting site
$password = "1234";
?>
