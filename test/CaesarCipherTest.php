<?php

require_once (dirname(__FILE__)."/../src/CaesarCipher.php");

class CaesarCipherTest extends PHPUnit_Framework_TestCase {

	public function test_encode_a(
	) {
		$cipher = new CaesarCipher();
		$this->assertEquals(
			"b",
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
