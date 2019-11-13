<?php

namespace App\Http\Controllers\Cart;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\CartModel;
use App\Services\Product\ProductRepository;

class CartController extends Controller {

	public function show(Request $request){
		$container  = app();
    	$model      = $container->make(CartModel::class); 
		$repository = $container->make(ProductRepository::class);
        $this->getDataForHeader($container);

		$productQuantity = $model->getDataArray(); // gets assoc array (key is productId value is productQuantity in the cart)
		$productList = $repository->getProductsByArray(array_keys($productQuantity)); // gets list of product data

		$this->putParameter('productDataList', $productList);
		$this->putParameter('productQuantityList', $productQuantity);

		$parameters = $this->getParameters();
		return view('bootstrap.cart.page', $parameters);
//            [
//			'productList' => $productList,
//			'productQuantityList' => $cartData
//			]);
	}

}