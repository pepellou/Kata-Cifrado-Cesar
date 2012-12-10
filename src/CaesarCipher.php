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
		return chr(ord($aLetter) + $this->offset);
	}

}
