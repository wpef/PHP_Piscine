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
		if ($tab[$i] and ($tab[$i] != "\t" || $tab[$i] != " "))	
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
		sort($tab);
	while ($tab[$i] == "\t" || $tab[$i] == " " || !$tab[$i])	
		$i++;
	while ($tab[$i])
		$ret[$j++] = $tab[$i++];
	return $ret;
}

if ($argv[1])
{
	$i = 0;
	$tab = create_tab($argv);
	print_r($tab);
	echo ($tab[count($tab) - 1]);
	while ($i < count($tab) - 1)
		echo (" ".$tab[$i++]);
	echo "\n";;
}
else
	echo("Please enter a string to rotate");
?>
