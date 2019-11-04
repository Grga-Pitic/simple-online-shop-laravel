<?php

namespace App\Services\Product\data;

class ProductListResult {

	private $list;
	private $size;

	function __construct(array $list, int $size){
		$this->list = $list;
		$this->size = $size;
	}

	public function getList(){
		return $this->list;
	} 

	public function getSize(){
		return $this->size;
	}

}