<?php

require_once (dirname(__FILE__)."/../src/CaesarCipher.php");

class CaesarCipherTest extends PHPUnit_Framework_TestCase {

	/**
	* @dataProvider known_letters_ciphered
	*/
	public function test_encode_letter(
		$letter,
		$offset,
		$ciphered
	) {
		$cipher = new CaesarCipher($offset);
		$this->assertEquals(
			$ciphered,
			$cipher->encode($letter)
		);
	}

	public static function known_letters_ciphered(
	) {
		return array_merge(
			self::known_letters_ciphered_with_offset_1(),
			array(
				array("a", 2, "c"),
				array("b", 2, "d"),
				array("a", 3, "d"),
			)
		);
	}

	/**
	* @dataProvider known_letters_ciphered_with_offset_1
	*/
	public function test_default_offset(
		$letter,
		$offset,
		$ciphered
	) {
		$cipher = new CaesarCipher();
		$this->assertEquals(
			$ciphered,
			$cipher->encode($letter)
		);
	}

	public static function known_letters_ciphered_with_offset_1(
	) {
		return array(
			array("a", 1, "b"),
			array("b", 1, "c"),
			array("z", 1, "a"),
		);
	}

	public function xtest_acceptance(
	) {
		$cipher = new CaesarCipher(3);
		$this->assertEquals(
			"wrgr or txh vh suhjxqwded hudq odv plvpdv uhvsxhvwdv txh exvfdprv ho uhvwr gh qrvrwurv. ¿gh góqgh yhqjr? ¿d góqgh yrb? ¿fxáqwr wlhpsr whqjr? wrgr or txh sxgh kdfhu ixh vhqwduph b yhu frpr pruíd.",
			$cipher->encode("Todo lo que se preguntaba eran las mismas respuestas que buscamos el resto de nosotros. ¿De dónde vengo? ¿A dónde voy? ¿Cuánto tiempo tengo? Todo lo que pude hacer fue sentarme y ver como moría.")
		);
	}

}
