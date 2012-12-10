<?php

class CaesarCipher {

	public $offset;

	public function encode(
		$aString
	) {
		$aString = strtolower($aString);
		$encoded = "";
		for ($l = 0; $l < strlen($aString); $l++) {
			$encoded .= $this->encodeLetter($aString[$l]);
		}
		return $encoded;
	}

	private function encodeLetter(
		$aLetter
	) {
		$alphabetSize = ord('z') - ord('a') + 1;
		$originalAscii = ord($aLetter);
		if ($originalAscii < ord('a') || $originalAscii > ord('z'))
			return $aLetter;
		$encodedAscii = $originalAscii + $this->offset;
		$offsetFromA = ($encodedAscii - ord('a')) % $alphabetSize;
		return chr(ord('a') + $offsetFromA);
	}

}
