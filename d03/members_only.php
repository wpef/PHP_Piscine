<?php

//foreach ($_SERVER as $serv => $val) {
//	print "\n".$serv." => ".$val."\n"; }

$open = "<html><body>";
$close = "</body></html>";


header('WWW-Authenticate: Basic realm="Espace membres"');
if (isset($_SERVER['PHP_AUTH_USER'])  and isset($_SERVER['PHP_AUTH_PW']))
{
	$user = $_SERVER['PHP_AUTH_USER'];
	$pass = $_SERVER['PHP_AUTH_PW'];
}
if ($user === 'zaz' and $pass === 'jaimelespetitsponeys')
{
	$file = base64_encode(file_get_contents('img/42.png'));
	echo $open."Bonjour ".ucfirst($user)."<br />";
	echo "<img src='data:image/png;base64,$file'>";
	echo $close;
}
else
{
	header("HTTP/1.0 401 Unauthorized");
	echo $open."Cette zone est accessible uniquement aux membres du site$close";
}
?>
