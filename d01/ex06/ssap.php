#!/usr/bin/php
<?php 

function argv_copy($arg)
{
	$i = 1;
	while ($arg[$i])
		$ret[$j++] = $arg[$i++];
	return $ret;
}

function ft_splittab($arg)
{
	$tab = argv_copy($arg);
	sort($tab);
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
	$i = 0;
	$tab = ft_splittab($argv);
	while ($tab[$i])
		echo ($tab[$i++]."\n");
}
else
{
	echo("Please type a line to ssap");
}
?>