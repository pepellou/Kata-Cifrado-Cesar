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
		return chr(ord('a') + (ord($aLetter) + $this->offset - ord('a')) % (ord('z') - ord('a') + 1));
	}

}
