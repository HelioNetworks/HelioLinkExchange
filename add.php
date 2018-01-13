<?
/*
# This file let users to add their website
# Websites will not be added to list, they need to be accept/reject manually via admin
*/
// set title and description for this page
$title = "Add Site";
$dc = "Add your site to link directory at ".$sname;
// include configuration file
include('config.php');
// print out page headers
echo '</head>
<body>
<h2 class="center">Add Your Site</h2>';
// if isset form
if (isset($_POST['submitd'])){
	// We get the futur ID of the Website
	$req1 = mysql_fetch_array(mysql_query('SELECT max(id) AS `id` FROM `topsite`'));
	$id = intval($req1['id'])+1;
	// We send an email to the webmaster
	if($mail)
	{
		$subject = 'Your website subscription at '.$sname;
		$message = "Hi,
You recieved this message after the subscription of your website (".$_POST['url'].") on our top site at '.$sname.'.
Admin will review your site and let you know if your site is accepted or not. If your site is accepted, you will get further informations by an email.

Thank you.";
		$to = $_POST['email'];
		$headers = "From: \"".$sname." Admin\"<".$mail_webmaster.">\n";
		$headers .= "Reply-To: ".$mail_webmaster."\n";
		$headers .= "Content-Type: text/plain; charset=\"utf-8\"";
	function send_email() {
	mail($to,$subject,$message,$headers);
	 }
	}
	// Add site to db
	if(mysql_query("INSERT INTO topsite (id, name, url, clicks, description, banner, email, status) VALUES ('', '".$_POST['name']."', '".$_POST['url']."', 0, '".$_POST['description']."', '".$_POST['banner']."', '".$_POST['email']."', 'no')"))
	{
		echo '<div style="color:green"><strong>Your website has successfully been submited, an admin will check it soon. Will be notified by email.<br>Click here to go <a href="index.php">Home</a></strong></div>';
	send_email();
	}
	else
	{
		echo '<div style="color:red"><strong>An error occurred while submitting the website. Please try again or go to <a href="index.php">Home</a></strong></div>';
	}
// We  Show the form
} else {
?>
To add your website to this top site, you have to fill the following form:<br />
<form action="<?=$_SERVER['PHP_SELF']?>" method="post" class="form">
 <input type="hidden" name="submitd" value="true" />
 <label for="name">Website Name</label><input type="text" name="name" id="name" maxlength="55" /><br />
 <label for="url">URL</label><input type="text" name="url" id="url" /><br />
 <label for="description">Description</label><input type="text" name="description" id="description" maxlength="255" /><br />
 <label for="banner">Banner</label><input type="text" name="banner" id="banner" /><br />
 <label for="email">Email</label><input type="text" name="email" id="email" /><br />
 <input type="submit" value="Submit" />
</form>
<?
}
// close MySQL connection
mysql_close();
?>