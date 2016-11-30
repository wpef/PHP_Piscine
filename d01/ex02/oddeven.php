#!/usr/bin/php
<?php
while (42) {
	$nb = readline("Entrez un nombre : ");
	if (is_numeric($nb)) {
		print("Le chiffre ".$nb." est");
		if ($nb % 2 == 0)
			print(" Pair");
		else
			print(" Impair");
	}
	else
		print($nb." n'est pas un chiffre");
	print("\n");
}
?>
