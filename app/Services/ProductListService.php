<?php

namespace App\Services;

use Illuminate\Http\Request;

class ProductListService {

	public function readParameters(Request $request){
		$parameters = array();

		if($request->has('category')){
			$parameters['category'] = $request->input('category');
		}

		if($request->has('page')){
			$parameters['page'] = $request->input('page');
		}

		if($request->has('productCount')){
			$parameters['productCount'] = $request->input('productCount');
		}

		if($request->has('minPrice')){
			$parameters['minPrice'] = $request->input('minPrice');
		}

		if($request->has('maxPrice')){
			$parameters['maxPrice'] = $request->input('maxPrice');
		}

		if($request->has('orderBy')){
			$parameters['orderBy'] = $request->input('orderBy');
		}

		return $parameters;
	}

	public function setDefaultParameters(array $parameters) { // if parameters doesn't exist
		if(!isset($parameters['page'])){  
			$parameters['page'] = 0;
		}

		if(!isset($parameters['productCount'])){
			$parameters['productCount'] = 20;
		}

		if(!isset($parameters['orderBy'])){
			$parameters['orderBy'] = 'asc';
		}

		return $parameters;
	}

	public function getPagesQuantity(int $pageSize, int $productQuantity){
		$pageQuantity = intdiv($productQuantity, $pageSize);
		if(($productQuantity % $pageSize) != 0){
			$pageQuantity++;
		}

		return $pageQuantity;
	}

}