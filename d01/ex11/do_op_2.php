#!/usr/bin/php
<?php


function ft_split($argv)
{
	$i = $j = 0;
	
	for ($j = $i; $argv[$i] == " " or $argv[$i] == "\t"; $i++);
	for ($j = $i; ctype_digit($argv[$j]); $j++);
		$ret[0] = substr($argv, $i, $j - $i);
	for ($i = $j; $argv[$i] == " " or $argv[$i] == "\t"; $i++);
	if ($argv[$i] == "+" or $argv[$i] == "-" or $argv[$i] == "*" or $argv[$i] == "/" or $argv[$i] == "%")
		$ret[1] = $argv[$i];
	else
		$ret[1] == "ERROR";
	for ($i++; $argv[$i] == " " or $argv[$i] == "\t"; $i++);
	for ($j = $i; ctype_digit($argv[$j]); $j++);
		$ret[2] = substr($argv, $i, $j - $i);
	return $ret;
}

function ft_check($ret)
{
	for ($i = 0; $i < 3; $i++)
	{
		if ($i == 0 or $i == 2)
		{
			if ($ret[$i] == "" or !ctype_digit($ret[$i]))
			{
				echo "Syntax Error";
				exit();
			}
		}
		else
		{
			if ($ret[$i] == "ERROR")
			{
				echo "Syntax Error\n";
				exit();
			}
		}
	}
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

if ($argv[1]) {
	$tab = ft_split($argv[1]);
	ft_check($tab);
	echo dothemath($tab)."\n";
}
else
	echo "Incorrect Parameters\n";
?>
