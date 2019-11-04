<?php 

namespace App\Services\Product;

use Illuminate\Support\Facades\DB;
use App\Services\Product\ProductRepository;
use App\Models\ProductModel;
use App\Services\Product\data\ProductListResult;

class ProductSqlRepository implements ProductRepository {
	public function getProductByID(int $id) {
		
		$result = DB::table('product')->where('id', $id)->first();

		if(count($result) == 0){
			throw new \UnderflowException('Product doesn\'t exist in the db');
		}

		$product = $this->createModelByResult($result);
		return $product;
	}

	function getProductsArray(array $parameters = array()) { // TODO do refactoring by splitting for a methods

		// builds a query using a parameters

		$query = DB::table('product'); 
		$this->buildQuery($query, $parameters);
		$resultSize = $query->count(); // quantity of rows in the result (without a limits)

		$this->appendLimits($query, $parameters);
		$result     = $query->get(); // execute query
		
		// creates array of productModel
		$models = array();
		foreach ($result as $row) {
			$newModel = $this->createModelByResult($row);
			array_push($models, $newModel);
		}

		$listObject = new ProductListResult($models, $resultSize);

		return $listObject;
	}

	function getProductsByArray(array $arrayOfId) {
		$resultProducts = array();
		foreach ($arrayOfId as $id) {
			$result = DB::table('product')->where('id', $id)->first();

			if(count($result) == 0){
				continue;
			}

			$resultProducts[$id] = $this->createModelByResult($result);
		}

		return $resultProducts;
	}

	private function buildQuery($query, array $parameters){

		$where = array();

		if(isset($parameters['category'])){                         // where cat_id = category
			array_push($where, ['cat_id', $parameters['category']]);
		}

		if(isset($parameters['minPrice'])){                        // where price > minPrice
			array_push($where, ['price', '>', $parameters['minPrice']]);
		}

		if(isset($parameters['maxPrice'])){                        // where price < maxPrice
			array_push($where, ['price', '<', $parameters['maxPrice']]);
		}
		
		$query->where($where);
		
		$query->orderBy('price', $parameters['orderBy']); // order by price (asc|desc)

	}

	private function appendLimits($query, array $parameters){
		$minIndex = $parameters['page'] * $parameters['productCount'];
		$query->skip($minIndex)->take($parameters['productCount']);         // limit minIndex, maxIndex
	}

	private function createModelByResult($row){
		$data = array();
		$data['id']          = $row->id;
		$data['cat_id']      = $row->cat_id;
		$data['name']        = $row->name;
		$data['description'] = $row->description;
		$data['price']       = $row->price;
		$data['discount']    = $row->discount;
		$data['picture']     = $row->picture;

		$newModel = new ProductModel($data);

		return $newModel;
	}

}