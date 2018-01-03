<?php
/*
# This script perform actions taken by admins.
# Accepting and rejecting site via Id.
# It's name is hard to guess by users but can be added more security if needed
*/
// include configuration file
include('config.php');
// HelioHost sign up link
$signup_link = "http://heliohost.org/signup";
// We check if its an admin and if the id is defined
if(isset($_GET['id']))
{
	$id = intval($_GET['id']);
	$req1 = mysql_query('select email,url from topsite where id="'.$id.'"');
	// We check if the website exists
	if(mysql_num_rows($req1)>0)
	{
		$req1 = mysql_fetch_array($req1);
		// If the admin accept the site
		if($_GET['ch']=='a')
		{
			// We change the status of the website in the DB
			if(mysql_query('update topsite set status="ok" where id="'.$id.'"'))
			{
				// We send an email
				if($mail)
				{
					$subject = 'Your website has been aproved in '.$sname;
					$message = "Hi,
You received this message to inform you that your website (".$req1['url'].") has been aproved in our site.
You can start earning points by sharing the following link in your website. You can place it in footer or anywhere you want. Remember, more clicks you get on this link more points you earn and your site will keep climbing top at list. We count a click from a user only for first time. So that different peoples from different places click on this link, more points you will get.

Add this link to your site: <a href=\"".$url."click.php?id=".$id."\">The Link Exchange Directory</a>

For tracking your site statistics: <a href=\"".$url."stats.php?id=".$id."\">Statistics of Your Site</a>
Make sure this link kept secret.

Note: You can change links text  you want to get users click. But don't change the url.

Thank you for being a HelioHost user.

Regards,
".$sname." Team";
					$to = $req1['email'];
					$headers = "From: \"Top site\"<".$mail_webmaster.">\n";
					$headers .= "Reply-To: ".$mail_webmaster."\n";
					$headers .= "Content-Type: text/plain; charset=\"utf-8\"";
					mail($to,$subject,$message,$headers);
				}
				// We redirect to the main site
				header('Location: '.$url);
			}
		}// If the admin reject the website
		elseif($_GET['ch']=='r')
		{
			// We delete the website from the DB
			if(mysql_query('delete from topsite where id="'.$id.'"'))
			{
				//We send an email
				if($mail)
				{
					$subject = 'Your website has been rejected at '.$sname;
					$message = "Hi,
You receive this message to inform you that your website(".$req1['url'].") has been rejected. We only accept sites hosted by HelioHost. For more details, contact us at ".$mail_webmaster.".
If you want to sign up for a HelioHost account, go to ".$signup_link."

HelioHost offers free web hosting with 1000 MB disk space and unlimited bandwidth. HelioHost have many servers with different specifications. Automatic software installation, cPanel, Free Customer Support, Own Domains, Unlimited Subdoomains, Email Accounts, MySQL, HTTP/2, Free SSL, Remote MySQL Access and many more.
HelioHost supports PHP, ASP.NET, Java, Ruby on Rails, Python, Perl, Django and so on.

Thank you.";
					$to = $req1['email'];
					$headers = "From: \"Top site\"<".$mail_webmaster.">\n";
					$headers .= "Reply-To: ".$mail_webmaster."\n";
					$headers .= "Content-Type: text/plain; charset=\"utf-8\"";
					mail($to,$subject,$message,$headers);
				}
				// We redirect user to the main site
				header('Location: '.$url);
			}
		}// Otherwise, we delete the website from the DB
		else
		{
			// We delete the website from the DB
			if(mysql_query('delete from topsite where id="'.$id.'"'))
			{
				// We redirect to the ain site
				header('Location: '.$url);
			}
		}
	}
}
// close MySQL connection to save memory
mysql_close();
?>