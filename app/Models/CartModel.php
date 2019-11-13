<?php

namespace App\Models;

use Illuminate\Support\Facades\Session;

define('PRODUCTS_ARRAY', 'cartData');

class CartModel {

	private $data;

	function __construct(){
		$this->data = $this->getDataFromSession();
	}

	public function add(int $productId, int $count) {

		if(!isset($this->data[$productId])){
			$this->data[$productId] = $count;
			return;
		}

		$this->data[$productId] += $count;
	}

	public function remove(int $productId, $count){
		if(!isset($this->data[$productId])){
			return;
		}

		$this->data[$productId] -= $count;
		if($this->data[$productId] <= 0){
			unset($this->data[$productId]);
		}
	}

	public function edit(int $productId, int $quantity){
        $this->data[$productId] = $quantity;
    }

	public function removeAll(int $productId){
        if(!isset($this->data[$productId])){
            return;
        }

        unset($this->data[$productId]);
    }

    public function clear() {
	    $this->data = array();
    }

	public function getDataArray(){
		return $this->data;
	}

	public function saveChanges(){
		Session::put(PRODUCTS_ARRAY, $this->data);
	}

	private function getDataFromSession(){
		$data = Session::get(PRODUCTS_ARRAY, array());
		return $data;
	}

}