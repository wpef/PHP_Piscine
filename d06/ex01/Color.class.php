<?php
class Color {
	public $red = 0;
	public $green = 0;
	public $blue = 0;
	public static $verbose = FALSE;

	public static function doc() { file_get_contents('./Color.doc.txt')."\n"; }

	public function __construct(array $ref) {
		if (count($ref) == 1)
			$ref = Color::split_color($ref['rgb']);
		
		$this->red = intval($ref['red']) % 256;;
		$this->green = intval($ref['green']) % 256;
		$this->blue = intval($ref['blue']) % 256;
		
		if (self::$verbose == TRUE)
			echo $this." constructed.\n";
	}

	public function __toString() {
		$format = "Color( red: %3d, green: %3d, blue: %3d )";
		$red = $this->red;
		$green = $this->green;
		$blue = $this->blue;
		$ret = sprintf($format, $red, $green, $blue);
		return $ret;
	}

	public function __destruct() {
		if (self::$verbose == TRUE)
			echo $this." destructed.\n";
	}

	private static function split_color($rgb) {
		$ret = array(
		'red' => ($rgb >> 16),
		'green' => ($rgb >> 8),
		'blue' => ($rgb),
		);
		return $ret;
	}

	public function add($color)
	{
		$red = ($this->red) + ($color->red);
		$green = ($this->green) + ($color->green);
		$blue = ($this->blue) + ($color->blue);
		$ret = new Color ( array ('red' => $red, 'green' => $green, 'blue' => $blue) );
		return $ret;
	}

	public function sub($color)
	{
		$red = ($this->red) - ($color->red);
		$green = ($this->green) - ($color->green);
		$blue = ($this->blue) - ($color->blue);
		$ret = new Color ( array ('red' => $red, 'green' => $green, 'blue' => $blue) );
		return $ret;
	}

	public function mult($f)
	{
		$red = ($this->red) * $f;
		$green = ($this->green) * $f;
		$blue = ($this->blue) * $f;
		$ret = new Color ( array ('red' => $red, 'green' => $green, 'blue' => $blue) );
		return $ret;
	}
}

?>
