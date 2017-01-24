<?php
require_once 'Color.class.php';

class Vertex {
	private $_x = 0;
	private $_y = 0;
	private $_z = 0;
	private $_w = 1;
	private $_color;
	public static $verbose = FALSE;

	/* --> SPECIAL _ FUNCTIONS <-- */

	public static function doc() { return (file_get_contents('./Vertex.doc.txt')); }

	public function __construct(array $kwargs)
	{
		/* SET */
		$this->_x = $kwargs['x'];
		$this->_z = $kwargs['z'];
		$this->_y = $kwargs['y'];
		if (array_key_exists('color', $kwargs) && is_a($kwargs['color'], 'Color'))
			$this->_color = $kwargs['color'];
		else
			$this->_color = new Color(array('red' => 255, 'green' => 255, 'blue' => 255));
		if (array_key_exists('w', $kwargs))
					$this->_w = $kwargs['w'];

		/* VERBOSE */
		if (self::$verbose)
			echo $this." constructed\n";
	}

	public function __destruct() {
		if (self::$verbose == TRUE)
			echo $this." destructed\n";
	}

	public function __toString() {
		$x = $this->_x;
		$y = $this->_y;
		$z = $this->_z;
		$w = $this->_w;
		$c = $this->_color;
		
		if (self::$verbose) {
			$format = "Vertex( x: %.2f, y: %.2f, z:%.2f, w:%.2f, %s )";
			$ret = sprintf($format, $x, $y, $z, $w, $c);
		}
		else {
			$format = "Vertex( x: %.2f, y: %.2f, z:%.2f, w:%.2f )";
			$ret = sprintf($format, $x, $y, $z, $w);
		}
		
		return $ret;
	}

	/* --> SET _ FUNCTIONS <-- */

	public function setX ($val) {
		if (is_numeric($val)) $this->_x = $val; }
	public function setY ($val) {
		if (is_numeric($val)) $this->_y = $val; }
	public function setZ ($val) {
		if (is_numeric($val)) $this->_z = $val; }
	public function setW ($val) {
		if (is_numeric($val)) $this->_w = $val; }
	public function setColor ($val) {
		if (is_a($val, 'Color')) $this->_color = $val; }

	/* --> GET _ FUNCTIONS <-- */

	public function getX ($val) { return $this->_x; }
	public function getY ($val) { return $this->_y; }
	public function getZ ($val) { return $this->z; }
	public function getW ($val) { return $this->_w; }
	public function getColor ($val) { return $this->_color; }
}
?>