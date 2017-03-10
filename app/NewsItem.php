<?php

namespace App;

class NewsItem {

	private $picturePath;

	private $pictureName;

	private $text;

	private $sampleText;

	public function __construct($picturePath, $pictureName, $sampleText, $text) {

		$this->picturePath = $picturePath;
		$this->pictureName = $pictureName;
		$this->sampleText = $sampleText;
		$this->text = $text;
	
	}

	public function getPaths() {

		return $this->picturePath;
	
	}

	public function getPictureName() {

		return $this->pictureName;
	
	}

	public function getSampleText() {

		return $this->sampleText;
	
	}

	public function getText() {

		return $this->text;
	
	}

}
