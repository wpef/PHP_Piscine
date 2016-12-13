#!/usr/bin/php
<?php
function get_imgurl($tab)
{
	$i = 0;
	for ($i = 0; $tab[0][$i] != NULL; $i++) {
		preg_match('#src=\"([A-Za-z0-9\.:/\_?%=-]+)#', $tab[0][$i], $ret[$i]);
	}
	for ($i = 0; $i < count($ret); $i++) {
		$return[$i] = $ret[$i][1];
	}
	return $return;
}

function get_images($argv)
{
	$c = curl_init($argv[1]);
	curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
	$cont = curl_exec($c);
	curl_close($c);
	preg_match_all('#<img (.)+>#', $cont, $tab);
	$imgurl = get_imgurl($tab);
	return $imgurl;
}

function dl_images($imgurls, $path, $url)
{
	if (is_array($imgurls))
	{
		foreach ($imgurls as $img) {
			if ($img[0] == "/")
				continue;
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
		echo "1 IMAGE FOUND !";
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
	if ($imgurls && mkdir($file))
		dl_images($imgurls, $file, $url);
}
?>
