<?php

if ($_GET['action'])
	switch ($_GET['action']) {
		case 'set' :
			if (isset($_GET['value']))
				setcookie($_GET['name'], $_GET['value']);
			else
				setcookie($_GET['name'], "");
			break;
		case 'get' :
			if (isset($_COOKIE[$_GET['name']])) {
				echo $_COOKIE[$_GET['name']];
			}
			else
				echo $_GET['name']." is not set, please use 'set' action";
			break;
		case 'del' :
			setcookie($_GET['name']);
			break;
		default :
			echo "Cookie action is not valid";
	}
else
	echo "WUUUT ??";

//var_dump($_COOKIE);

?>
