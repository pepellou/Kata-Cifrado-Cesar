<?php

class CaesarCipher {

	public $offset;
	public $direction;

	public function encode(
		$aString
	) {
		return $this->cipher($aString, 1);
	}

	private function cipher(
		$aString,
		$direction
	) {
		$this->direction = $direction;
		return $this->cipherString(strtolower($aString));
	}

	private function cipherString(
		$aString
	) {
		$ciphered = "";
		for ($l = 0; $l < strlen($aString); $l++) {
			$ciphered .= $this->cipherLetter($aString[$l]);
		}
		return $ciphered;
	}

	private function cipherLetter(
		$aLetter
	) {
		if (!$this->isAlphabeticLetter($aLetter)) {
			return $aLetter;
		}
		return $this->cipherAlphabeticLetter($aLetter);
	}

	private function isAlphabeticLetter(
		$aLetter
	) {
		$ascii = ord($aLetter);
		return ($ascii >= ord('a') && $ascii <= ord('z'));
	}

	private function cipherAlphabeticLetter(
		$aLetter
	) {
		$originalAscii = ord($aLetter);
		$alphabetSize = ord('z') - ord('a') + 1;
		$encodedAscii = $originalAscii + $this->direction * $this->offset;
		$offsetFromA = ($alphabetSize + $encodedAscii - ord('a')) % $alphabetSize;
		return chr(ord('a') + $offsetFromA);
	}

	public function decode(
		$aString
	) {
		return $this->cipher($aString, -1);
	}

}
