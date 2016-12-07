#!/usr/bin/php
<?php

function find_calc($line)
{
	$tab = preg_split("#[\s\t]#", $line);
	for ($i = 0; $i < count($tab); $i++)
	{
		if ($tab[$i] == "+" or $tab[$i] == "-" or
			$tab[$i] == "/" or $tab[$i] == "*" or
			$tab[$i] == "%")
			return ($tab[$i]);
	}
	return "ERROR";
}


function find_nb($line)
{
	$i = 0;
	$tab = preg_split("#[\s\t]#", $line);
	for ($i = 0; !ctype_digit($tab[$i]); $i++);
	return $tab[$i];
}


function ft_split($argv)
{
	$ret[0] = find_nb($argv[1]);
	$ret[1] = find_calc($argv[2]);
	$ret[2] = find_nb($argv[3]);
	
	/*CHECKING DATAS */

	for ($i = 0; $i < 3; $i++)
	{
		if ($i == 0 or $i == 2)
		{
			if ($ret[$i] == "")
				exit();
			if (!ctype_digit($ret[$i]))
				exit();
		}
		else
		{
			if ($ret[$i] == "ERROR")
				exit();
		}
	}
	return $ret ;
}

function dothemath($tab)
{
	switch ($tab[1]) {
		case "+":
			return $tab[0] + $tab[2];
		case "-":
			return $tab[0] - $tab[2];
		case "*":
			return $tab[0] * $tab[2];
		case "/":
			return $tab[0] / $tab[2];
		case "%":
			return ($tab[0] % $tab[2]);
	}
}

$argi = count($argv);

if ($argi == 4)
{
	$tab = ft_split($argv);
	echo dothemath($tab)."\n";
}
else
	echo "Invalid Parameters\n";

?>
