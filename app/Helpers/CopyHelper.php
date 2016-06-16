<?php

namespace App\Helpers;

class CopyHelper {

	protected $copy = [];

	public function __construct($copy){
		$this->copy = $copy;
	}

	public function get($slug): string{
		return isset($this->copy[$slug]) ? $this->copy[$slug] : '';
	}


}