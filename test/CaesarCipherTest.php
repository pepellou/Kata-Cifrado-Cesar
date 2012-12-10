<?php

require_once (dirname(__FILE__)."/../src/CaesarCipher.php");

class CaesarCipherTest extends PHPUnit_Framework_TestCase {

	private $testee;

	public function setUp(
	) {
		$this->testee = new CaesarCipher();
	}

	/**
	* @dataProvider known_strings_ciphered
	*/
	public function test_encode_string(
		$string,
		$offset,
		$ciphered
	) {
		$this->testee->offset = $offset;
		$this->assertEquals(
			$ciphered,
			$this->testee->encode($string)
		);
	}

	public static function known_strings_ciphered(
	) {
		return array_merge(
			self::known_strings_ciphered_with_offset_1(),
			array(
				array("a", 2, "c"),
				array("b", 2, "d"),
				array("a", 3, "d"),
				array("abc", 3, "def"),
				array("xyz", 3, "abc"),
			)
		);
	}

	/**
	* @dataProvider known_strings_ciphered
	*/
	public function test_decode_string(
		$string,
		$offset,
		$ciphered
	) {
		$this->testee->offset = $offset;
		$this->assertEquals(
			strtolower($string),
			$this->testee->decode($ciphered)
		);
	}

	/**
	* @dataProvider known_strings_ciphered_with_offset_1
	*/
	public function test_default_offset(
		$string,
		$offset,
		$ciphered
	) {
		$this->testee->offset = 1;
		$this->assertEquals(
			$ciphered,
			$this->testee->encode($string)
		);
	}

	public static function known_strings_ciphered_with_offset_1(
	) {
		return array(
			array("a", 1, "b"),
			array("b", 1, "c"),
			array("z", 1, "a"),
			array("abc", 1, "bcd"),
			array("A", 1, "b"),
			array("a b", 1, "b c"),
		);
	}

	/**
	* @dataProvider known_ciphered_texts
	*/
	public function test_acceptance_encode(
		$originalText,
		$cipheredText
	) {
		$this->testee->offset = 3;

		$this->assertEquals(
			$cipheredText,
			$this->testee->encode($originalText)
		);
	}

	public static function known_ciphered_texts(
	) {
		return array(
			array(
				"Todo lo que se preguntaba eran las mismas respuestas "
				."que buscamos el resto de nosotros. ¿De dónde vengo? "
				."¿A dónde voy? ¿Cuánto tiempo tengo? Todo lo que pude "
				."hacer fue sentarme y ver como moría.",

				"wrgr or txh vh suhjxqwded hudq odv plvpdv uhvsxhvwdv "
				."txh exvfdprv ho uhvwr gh qrvrwurv. ¿gh góqgh yhqjr? "
				."¿d góqgh yrb? ¿fxáqwr wlhpsr whqjr? wrgr or txh sxgh "
				."kdfhu ixh vhqwduph b yhu frpr pruíd."
			)
		);
	}

	/**
	* @dataProvider known_ciphered_texts
	*/
	public function test_acceptance_decode(
		$originalText,
		$cipheredText
	) {
		$this->testee->offset = 3;

		$this->assertEquals(
			strtolower($originalText),
			$this->testee->decode($cipheredText)
		);
	}

}
