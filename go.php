<?
/*
# This file sets cookie and forwards
*/
// Get/Set values
$id=$_GET['id'];
$name="click".$id;
$time=time()+60*60*24*365;
// Set cookie
$sc = setcookie($name,$id,$time);
if ($sc){
// if successful, then redirect
echo '<meta http-equiv="refresh" content="0; url=index.php">
</head>
<body>
Redirecting...
</body>
</html>';
} else {
// if failed, then print
echo 'Somehing is wrong!';
}
?>