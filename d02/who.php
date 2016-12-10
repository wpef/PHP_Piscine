#!/usr/bin/php
<?php

date_default_timezone_set('Europe/paris');
$file = file_get_contents('/var/run/utmpx');
$cont = substr($file, 1256);
while ($cont != NULL)
{
	$tab = unpack('a256user/a4id/a32line/ipid/itype/I2time/a256host/i16pad', $cont);
	echo ($tab[user]."\t".$tab[line]."\t   ".date('M d H:i',$tab[time1])."\n");
	$cont = substr($cont, 628);
}

?>
