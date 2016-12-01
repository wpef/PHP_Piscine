#!/usr/bin/php
<?php

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

if ($argv[1])
{
	$tab = (ft_split($argv[1]));
	$i = 0;
	while ($tab[$i + 1])
	{
		echo($tab[$i]." ");
		$i++;
	}
	echo($tab[$i]);
}
else {
	exit();
}
?>