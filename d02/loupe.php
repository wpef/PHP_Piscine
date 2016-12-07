#!/usr/bin/php
<?php
function title_handler($matches) {
		$title = strstr($matches[0], "=");
		$title = substr($title, 1, count($title) - 2);
		$title = strtoupper($title);
		return ("title=\"".$title."\">");
}

function keep($line)
{
	$i = 0;
	for ($i = 0; $line[$i]!='>'; $i++);
		return substr($line, 0, ++$i);
}

function texte_handler($matches) {
		$keep = keep($matches[0]);
		$text = strstr($matches[0], ">");
		$text = substr($text, 1);
		$text = strtoupper($text);
		return ($keep.$text);
}

//$pattern = array(
//	"#title=([a-zA-Z ]+)>#" => title_handler;
//
//	);

if ($argv[1])
{
	$file = file($argv[1]);

	$texte = preg_replace_callback("#title=([a-zA-Z ]+)>#", title_handler, $file);
	$texte2 = preg_replace_callback("#<a href=http://[a-zA-Z. \"=]+>([a-zA-Z ]+)#", texte_handler, $texte);

	foreach ($texte2 as $txt) {
 		echo $txt;
 	}
 }
 return ($texte2);

?>
