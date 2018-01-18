<?php
/*
# This file shows site's statistics to owner
*/
// set title and description for this page
$title = "Site Statistics";
// include configuration file
include('config.php');
$dc = "Statistics of your site in toplist at ".$sname;
include('assets/include/header.php');
include('assets/include/navbar.php');
// print out page headers
echo '
<h2 class="center">Site Stats</h2>';
//set variables
$id=$_GET['id'];
//Check if everything is ok
if(!empty($id)||ctype_digit($id)){
//if ok, then procceed
$q=mysql_query("SELECT * FROM `topsite` WHERE id='".$id."'");
// first check if requested site is available or not via "id"
if(mysql_num_rows($q)>0){
$q2 = mysql_fetch_array($q);
if (!empty($q2)){
// print clicks
echo "<div class=\"card text-white bg-dark mb-3\" style=\"\" >";
  echo "<div class=\"card-header\">Total Clicks</div>";
  echo "<div class=\"card-body\">";
    echo "<h4 class=\"card-title\">".$q2["clicks"]."</h4>";
    echo "<div class=\"card-text\">Note: This may not be 100% accurate!<br />";
      echo "<br />
      <a href="/" class=\" btn btn-secondary btn-sm\" role=\"button\">Back Home</a>
      <br />";
    echo "</div>";
  echo"</div></div>";
  
// Get all clicks
$q2 = mysql_query("SELECT * FROM `ips` WHERE id='".$id."' DESC LIMIT ".$first_message.",".$last_message."");
//We get the current page
$req1 = mysql_fetch_array(mysql_query('SELECT count(time) AS `nb` FROM `ips` WHERE id="'.$id.'"'));
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
// print the list of Clicks
while($cld = mysql_fetch_array($$q2)){
$i++;
echo $i;
echo '\. Users IP: ';
if (empty($cld["ip"])) {
echo $cld["ip2"];
} else {
echo $cld["ip"]; }
'<br>Time: '.date("g:I:a d/m/Y",$cld["time"]);
}
} else {
echo '<center>No statistics available</center>';
}
} else {
// site not found, show warning to user and returning to home
echo '';
}
} else {
// if not, then show warning and redirect to home page
echo '';
}
// close MySQL connection
include('assets/include/footer.php');
mysql_close();
?>
