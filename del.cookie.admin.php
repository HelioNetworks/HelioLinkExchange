<?php

$cid = (string)$_GET['cid'];
$id = "Del";
$ip = "Del";
$ip2 = "Del";

echo $cid."/";
setcookie("Clicked_ID".$cid, "del" , time() + 0, "/"); // 86400 = 1 day

?>