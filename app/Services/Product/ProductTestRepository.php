<?php

namespace App\Services\Product;

use App\Services\Product\ProductRepository;
use App\Models\ProductModel;

define('TEST_COUNT', 100);

class ProductTestRepository implements ProductRepository {


	public function getProductByID(int $id) {
		
		$data = array();
		$data['id']          = $id;
		$data['cat_id']      = $id;
		$data['name']        = 'name' . $id;
		$data['description'] = 'description' . $id;
		$data['price']       = TEST_COUNT - $id;
		$data['discount']    = 10;
		$data['picture']     = '/test' . $id;

		$product = new ProductModel($data);

		return $product;
	}

	function getProductsArray(array $parameters = array()) {
		if(!isset($parameters['page'])){
			$parameters['page'] = 0;
		}

		if(!isset($parameters['posCount'])){
			$parameters['posCount'] = 20;
		}

		$minIndex = $parameters['page'] * $parameters['posCount'];
		$maxIndex = $parameters['page'] * $parameters['posCount'] + $parameters['posCount'];

		$models = array();
		for($i = $minIndex; $i < $maxIndex; $i++){
			array_push($models, $this->getProductByID($i));
		}

		return $models;
	}

}