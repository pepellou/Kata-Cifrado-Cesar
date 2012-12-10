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
		return $this->cipherString(strtolower($aString), $offset);
	}

	private function cipherString(
		$aString,
		$offset
	) {
		$ciphered = "";
		for ($l = 0; $l < strlen($aString); $l++) {
			$ciphered .= $this->cipherLetter($aString[$l], $offset);
		}
		return $ciphered;
	}

	private function cipherLetter(
		$aLetter,
		$offset
	) {
		if (!$this->isAlphabeticLetter($aLetter)) {
			return $aLetter;
		}
		return $this->cipherAlphabeticLetter($aLetter, $offset);
	}

	private function isAlphabeticLetter(
		$aLetter
	) {
		$originalAscii = ord($aLetter);
		return ($originalAscii >= ord('a') && $originalAscii <= ord('z'));
	}

	private function cipherAlphabeticLetter(
		$aLetter,
		$offset
	) {
		$originalAscii = ord($aLetter);
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
