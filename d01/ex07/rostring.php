#!/usr/bin/php
<?php
function ft_split($line)
{
	$tab = preg_split("#[\s+\t+]#", $line);
	$ii = count($tab);
	$i = $j = 0;
	while ($i < $ii)
	{
		if ($tab[$i] and ($tab[$i] != "\t" && $tab[$i] != " "))	
			$ret[$j++] = $tab[$i++];
		else
			$i++;
	}
	return $ret;
}

if ($argv[1])
{
	$i = 1;
	$tab = ft_split($argv[1]);

	while ($i < count($tab))
		echo ($tab[$i++]." ");
	echo $tab[0]."\n";
}
else
	echo("Please enter a string to rotate");
?>
