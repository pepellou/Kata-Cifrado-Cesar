<?php

class CaesarCipher {

	private $offset;

	public function __construct(
		$offset = 1
	) {
		$this->offset = $offset;
	}

	public function encode(
		$aLetter
	) {
		return chr(97 + (ord($aLetter) + $this->offset - 97) % 26);
	}

}
