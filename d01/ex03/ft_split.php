<?php

function ft_split($line)
{
	$tab = preg_split("#[\s\t]#", $line);
	sort($tab);
	$i = $j = 0;
	while ($tab[$i] == "\t" || $tab[$i] == " " || $tab[$i] == false)
		$i++;
	while ($tab[$i]) 
	{
		$ret[$j] = $tab[$i];
		$i++; $j++;
	}
	return $ret;
}

?>
