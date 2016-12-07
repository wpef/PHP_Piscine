#!/usr/bin/php
<?php

function another_world($argv)
{
	$i = $ii = 0;
	$j = 0;
	while ($argv[$ii])
	{		
		for ($i = $ii; $argv[$i] == " " or $argv[$i] == "\t"; $i++);
		for ($ii = $i; $argv[$ii] and $argv[$ii] != " " and $argv[$ii] != "\t"; $ii++);
		$ret[$j++] = substr($argv, $i, $ii - $i);
	}
	return $ret;
}

$i = 0;

if ($argv[1])
{
	$tab = another_world($argv[1]);
	while ($tab[$i])
		echo $tab[$i++]." ";
	echo "\n";
}
?>
