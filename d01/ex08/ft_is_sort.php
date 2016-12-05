#!/usr/bin/php
<?php

function tab_compare ($tab1, $tab2)
{
	$i = 0;
	while ($i < count($tab1))
	{
		if ($tab1[$i] != $tab2[$i])
			return false;
		$i++;
	}
	return true;
}

function ft_is_sort($tab)
{
	if (!is_array($tab))
		echo "error: ft_is_sort argument is not an array\n";

	$i = $j = 0;

	while ($i < count($tab))
		$ret[$j++] = $tab[$i++];
	sort($ret);
	return tab_compare($ret, $tab);
}
?>
