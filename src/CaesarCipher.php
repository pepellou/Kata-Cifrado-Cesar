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
		$alphabetSize = ord('z') - ord('a') + 1;
		$originalAscii = ord($aLetter);
		$encodedAscii = $originalAscii + $this->offset;
		$offsetFromA = ($encodedAscii - ord('a')) % $alphabetSize;
		return chr(ord('a') + $offsetFromA);
	}

}
