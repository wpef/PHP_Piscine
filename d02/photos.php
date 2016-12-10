#!/usr/bin/php
<?php

function get_imgurl($tab)
{
	$i = 0;
	while ($tab[$i] != NULL)
	{
		$len = strlen($tab[$i]) - 11;
		$ret[$i] = substr($tab[$i++], 10, $len);
	}
	return $ret;
}

function get_images($argv)
{
	$c = curl_init($argv[1]);
	curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
	$cont = curl_exec($c);
	curl_close($c);
	preg_match('#<img src=[\"\'][\w-:/.]*[\"\']#', $cont, $tab);
	$imgurl = get_imgurl($tab);
	return $imgurl;
}

function dl_images($imgurls, $path)
{
	if (is_array($imgurls))
	{
		foreach ($imgurls as $img) {
			$imgname = preg_split("#/#", $img);
			$imgname = $imgname[count($imgname) - 1];
			$ch = curl_init($img);
			$fd = fopen($path.$imgname, 'wb');
			curl_setopt($ch, CURLOPT_FILE, $fd);
			curl_setopt($ch, CURLOPT_HEADER, 0);
			$res = curl_exec($ch);
			curl_close($ch);
			fclose($fd);
		}
	}
	else if ($imgurls != NULL) {
		$imgname = preg_split("#/#", $imgurls);
		$imgname = $imgname[count($imgname) - 1];
		$ch = curl_init($imgurls);
		$fd = fopen($path.$imgname, 'wb');
		curl_setopt($ch, CURLOPT_FILE, $fd);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		$res = curl_exec($ch);
		curl_close($ch);
		fclose($fd);
	}
	else
		echo "NO PHOTOS\n";

}

if ($argv[1])
{
	$file = substr($argv[1], 7);
	$file = "./".$file."/";
	$imgurls = get_images($argv);
	if (is_dir($file))
		rmdir($file);
	if (!mkdir($file))
		echo "MKDIR: ERROR";
	dl_images($imgurls, $file);
}
?>
