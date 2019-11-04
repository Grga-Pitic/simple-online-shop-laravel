<?php

namespace App\Models;

class ProductModel {
	
	private $data;

	public function __construct($data){
		$this->data = $data;
	}

	public function getColumnByName(string $name){
		return $this->data[$name];
	}
}