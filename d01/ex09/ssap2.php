#!/usr/bin/php
<?php

function argv_copy($arg)
{
	$i = 1;
	$j = 0;
	while ($arg[$i])
		$ret[$j++] = $arg[$i++];
	return $ret;
}

function ft_split($line)
{
	$tab = preg_split("#[\s+\t+]#", $line);
	$ii = count($tab);
	$i = $j = 0;
	while ($i < $ii)
	{
		if ($tab[$i] and ($tab[$i] != "\t" and $tab[$i] != " "))	
		{
			$ret[$j] = $tab[$i];
			$i++; $j++;
		}
		else
			$i++;
	}
	return $ret;
}

function ft_splittab($arg)
{
	$tab = argv_copy($arg);
	$ii = count($tab);
	$i = $j = 0;
	while ($i < $ii)
	{
		if ($tab[$i] and ($tab[$i] != "\t" and $tab[$i] != " "))	
		{
			if (strstr($tab[$i], ' '))
			{
				$ss_tab = ft_split($tab[$i]);
				$tabii = count($ss_tab);
				$tabi = 0;
				while ($tabi < $tabii)
					$ret[$j++] = $ss_tab[$tabi++];
				$i++;
			}
			else
				$ret[$j++] = $tab[$i++];
		}
		else
			$i++;
	}
	return $ret;
}

function create_tab($argv)
{
	$i = 0;
	$j = 0;
	$tab = ft_splittab($argv);
	
	if (is_array($tab))
		usort($tab, 'strnatcasecmp');
	while ($tab[$i] == "\t" || $tab[$i] == " " || !$tab[$i])	
		$i++;
	while ($tab[$i])
		$ret[$j++] = $tab[$i++];
	return $ret;
}

function ft_decroissant($a, $b)
{
	if ($a > $b)
		return false;
	return true;
}

function ft_sort($tab)
{
	$i = $al = $num = $co = 0;

	while ($i < count($tab))
	{
		if (ctype_alpha($tab[$i]))
			$ret[0][$al++] = $tab[$i];
		else if (ctype_digit($tab[$i]))
			$ret[1][$num++] = $tab[$i];
		else
			$ret[2][$co++] = $tab[$i];
		$i++;
	}
	usort($ret[1], 'ft_decroissant');
	return $ret;
}

function ft_printsq($ret)
{
	$i = $j = 0;

	while ($i < 3)
	{
		while ($j < count($ret[$i]))
			echo ($ret[$i][$j++]."\n");
		$j = 0;
		$i++;
	}
}

if ($argv[1])
{
	$i = 0;
	$tab = create_tab($argv);
	$ret = ft_sort($tab);

	ft_printsq($ret);
}
else
	echo("Please enter a string to rotate");
?>
