<?php

require_once (dirname(__FILE__)."/../src/CaesarCipher.php");

class CaesarCipherTest extends PHPUnit_Framework_TestCase {

	/**
	* @dataProvider known_letters_ciphered
	*/
	public function test_encode_letter(
		$letter,
		$ciphered
	) {
		$cipher = new CaesarCipher();
		$this->assertEquals(
			$ciphered,
			$cipher->encode($letter)
		);
	}

	public static function known_letters_ciphered(
	) {
		return array(
			array("a", "b"),
			array("b", "c"),
		);
	}

	public function test_encode_letter_with_offset_2(
	) {
		$cipher = new CaesarCipher(2);
		$this->assertEquals(
			"c",
			$cipher->encode("a")
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
