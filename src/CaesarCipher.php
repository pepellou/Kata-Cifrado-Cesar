<?php

class CaesarCipher {

	public $offset;

	public function encode(
		$aString
	) {
		return $this->cipher($aString, $this->offset);
	}

	private function cipher(
		$aString,
		$offset
	) {
		$aString = strtolower($aString);
		$encoded = "";
		for ($l = 0; $l < strlen($aString); $l++) {
			$encoded .= $this->encodeLetter($aString[$l], $offset);
		}
		return $encoded;
	}

	private function encodeLetter(
		$aLetter,
		$offset
	) {
		$originalAscii = ord($aLetter);
		if ($originalAscii < ord('a') || $originalAscii > ord('z'))
			return $aLetter;
		$alphabetSize = ord('z') - ord('a') + 1;
		$encodedAscii = $originalAscii + $offset;
		$offsetFromA = ($alphabetSize + $encodedAscii - ord('a')) % $alphabetSize;
		return chr(ord('a') + $offsetFromA);
	}

	public function decode(
		$aString
	) {
		return $this->cipher($aString, -$this->offset);
	}

}
