<?php
session_start();
$form_h = '<form action="/Piscine/d04/index.php" method="GET">
	<p>Identifiant : <input type="text" name="login"';
$form_closetag = '/></p>';
$form_pass = '<p>Mot de passe : <input type="text" name="passwd"';
$form_endsub = '<p><input type="submit" name="submit" value="OK"></p></form>';

echo "<html><body>";

if (!isset($_SESSION['login']))
{
	echo $form_h.$form_closetag.$form_pass.$form_closetag.$form_endsub;
	$_SESSION['login'] = $_GET['login'];
	$_SESSION['passwd'] = $_GET['passwd'];
}
else
{
	echo $form_h.' value="'.$_SESSION['login'].'"'.$form_closetag;
	echo $form_pass.' value="'.$_SESSION['passwd'].'"'.$formclosetag;
	echo $form_endsub;
}
var_dump($_SESSION);

echo "</body></html>";
?>
