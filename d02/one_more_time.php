#!/usr/bin/php
<?php

function date_formate($tab)
{
	if (!preg_match("#lundi|mardi|mercredi|jeudi|vendredi|Samedi|dimanche#i", $tab[0]))
	{
		echo "Wrong Format\n";
		exit();
	}
	if (!preg_match("#[0-9][0-9]#", $tab[1]))
	{
		echo "Wrong Format\n";
		exit();
	}
	if (preg_match("#janvier#i", $tab[2]))
		$tab[2] = '01';
	else if (preg_match("#f[eé]vrier#ui", $tab[2]))
		$tab[2] = '02';
	else if (preg_match("#Mars#i", $tab[2]))
		$tab[2] = '03';
	else if (preg_match("#Avril#i", $tab[2]))
		$tab[2] = '04';
	else if (preg_match("#mai#i", $tab[2]))
		$tab[2] = '05';
	else if (preg_match("#Juin#i", $tab[2]))
		$tab[2] = '06';
	else if (preg_match("#Juillet#i", $tab[2]))
		$tab[2] = '07';
	else if (preg_match("#Ao[uû]t#ui", $tab[2]))
		$tab[2] = '08';
	else if (preg_match("#Septembre#i", $tab[2]))
		$tab[2] = '09';
	else if (preg_match("#Octobre#i", $tab[2]))
		$tab[2] = '10';
	else if (preg_match("#Novembre#i", $tab[2]))
		$tab[2] = '11';
	else if (preg_match("#D[ée]cembre#iu", $tab[2]))
		$tab[2] = '12';
	else
		$tab[2] = NULL;
	if ($tab[2] == NULL)
	{
		echo "Wrong Format\n";
		exit();
	}
	if (!preg_match("#^\d{4}$#", $tab[3]))
	{
		echo "Wrong Format\n";
		exit();
	}
	if (!preg_match("#^\d{2}:\d{2}:\d{2}$#", $tab[4]))
	{
		echo "Wrong Format\n";
		exit();
	}
	$return = $tab[3].":".$tab[2].":".$tab[1]." ".$tab[4];
	return $return;
}

$i = 0;

$date = preg_split("# #", $argv[1]);
$date = date_formate($date);

date_default_timezone_set(UTC);
if ($ret = strtotime($date))
	echo $ret."\n";
else
	echo "Wrong Format\n";
?>
