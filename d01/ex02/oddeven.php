#!/usr/bin/php
<?php

$input = fopen("php://stdin", "r");
while (42) {
	echo("Entrez un nombre: ");
	$line = fgets($input);
	if ($line == false) {
		echo("\n");
		exit();
	}
	$nb = substr($line, 0, -1);
	if (is_numeric($nb)) {
		print("Le chiffre ".$nb." est");
		if ($nb % 2 == 0)
			print(" Pair");
		else
			print(" Impair");
	}
	else
		print("'".$nb."'"." n'est pas un chiffre");
	print("\n");
}
?>
