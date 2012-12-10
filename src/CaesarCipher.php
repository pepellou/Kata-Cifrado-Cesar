<?php

class CaesarCipher {

	public function encode(
		$aLetter
	) {
		return chr(ord($aLetter) + 1);
	}

}
