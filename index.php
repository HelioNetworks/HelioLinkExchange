<?php
/*
# This file index sies from database and sorted by Clicks
*/
// include configuration file
include('config.php');
// set title and description for this page
$title = "Site Toplist";
$dc = "Free top list and link exchange at ".$sname;
// required function
function dehtml($html) {
  return htmlentities($html, ENT_QUOTES, 'utf-8');
}
//We get the number of websites
$req1 = mysql_fetch_array(mysql_query('SELECT count(id) AS `nb` FROM `topsite` WHERE status="ok"'));
//We get the current page
if(isset($_GET['page'])) {
  $page = intval($_GET['page']);
} else {
$page = 1;
}
//We calculate the number of pages and we display pages links
$nbpages = ceil($req1['nb'] / $nb_site_page);
if($page<1 or $page>$nbpages) {
  $page = 1;
}
$pages_site = 'Pages: ';
if($page>1) {
  $pages_site .= '<a href="?page='.($page-1).'">Previous</a> ';
}
for($i=1; $i <= $nbpages;$i++) {
  if($i==$page) {
    $pages_site .= '<strong>'.$i.'</strong> ';
  } else {
    $pages_site .= '<a href="?page='.$i.'">'.$i.'</a> ';
  }
}
if($page < $nbpages) {
  $pages_site = '<a href="?page='.($page+1).'">Next</a>';
}
//We calculate the first and last message position to display
$first_message = ($page-1)*$nb_site_page;
$last_message = $first_message +$nb_site_page;
$i = $first_message ;
// print out page headers
echo "<h2 class=\"center\">Top Sites</h2>";
//fetch data from database
$req2 = mysql_query('SELECT * FROM `topsite` WHERE status="ok" ORDER BY `clicks` DESC LIMIT '.$first_message .','.$last_message);
//$req2 = mysql_fetch_object($req2);
while($dnn2 = mysql_fetch_array($req2)) {
$i++;
echo "<div style=\"border:2px solid blue\">";
 echo $i.") ";
 echo "<td class=\"site\"><a href=/click.php?id=".(dehtml($dnn2['id']))."&url=".(dehtml($dnn2['url'])).">" . (dehtml($dnn2['name'])). "</a><br />";
 echo (dehtml($dnn2['description'])). "<br /></div>";

}
//We display pages site (again)
?>
<div style="border:2px solid red">
<?php echo $pages_site; ?></div>
</div>
<?php
// close MySQL connection
mysql_close();
?>