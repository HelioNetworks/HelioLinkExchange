<?php
/*
# This is control panel for admin to list site for accepting or rejecting
*/
// include configuration file
include('config.php');
//We get the current page
$req1 = mysql_fetch_array(mysql_query('SELECT count(id) AS `nb` FROM `topsite` WHERE status="no"'));
if(isset($_GET['page']))
{
$page = intval($_GET['page']);
}
else
{
$page = 1;
}
//We calculate the number of pages and we display pages links
$nbpages = ceil($req1['nb']/$nb_site_page);
if($page<1 or $page>$nbpages)
{
$page = 1;
}
$pages_site = 'Pages: ';
if($page>1)
{
$pages_site .= '<a href="'.$_SERVER["PHP_SELF"].'?page='.($page-1).'">Previous</a> ';
}
for($i=1;$i<=$nbpages;$i++)
{
if($i==$page)
{
$pages_site .= '<strong>'.$i.'</strong> ';
}
else
{
$pages_site .= '<a href="'.$_SERVER["PHP_SELF"].'?page='.$i.'">'.$i.'</a> ';
}
}
if($page<$nbpages)
{
$pages_site .= '<a href="'.$_SERVER["PHP_SELF"].'?page='.($page+1).'">Next</a>';
}
//We calculate the first and last message position to display
$first_message = ($page-1)*$nb_site_page;
$last_message = $first_message +$nb_site_page;
$i = $first_message ;
// Get all sites are pending
/*
$q1 = mysql_query("SELECT * FROM topsite WHERE status='no' DESC LIMIT ".$first_message.",".$last_message."");
*/
// Get all sites are pending
$q1 = mysql_query("SELECT * FROM topsite WHERE status='no'");
?>
<div style="border:2px solid grey;text-align:center">Inactive Sites</div>
<?
while ($inactive = mysql_fetch_array($q1)) {
$i++;
//echo $i;
?>
<?=$inactive["url"]?> <a href="action.sec.php?ch=a&id=<?=$inactive["id"]?>">Accept</a><br>
<?
}
// Show pagination
?>
<div style="border:2px solid red">
<?php echo $pages_site; ?></div>
<?
// close MySQL connection
mysql_close();
?>