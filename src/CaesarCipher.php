<?php

class CaesarCipher {

	public $offset;

	public function encode(
		$aString
	) {
		$aString = strtolower($aString);
		$encoded = "";
		for ($l = 0; $l < strlen($aString); $l++) {
			$encoded .= $this->encodeLetter($aString[$l], $this->offset);
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
		$this->offset *= -1;
		return $this->encode($aString);
	}

}
