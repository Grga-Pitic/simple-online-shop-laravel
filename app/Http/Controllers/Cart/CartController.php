<?php

namespace App\Http\Controllers\Cart;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

use App\Models\CartModel;
use App\Services\Product\ProductRepository;

class CartController extends Controller {

	public function show(Request $request){
		$container  = app();
    	$model      = $container->make(CartModel::class); 
		$repository = $container->make(ProductRepository::class);

		$cartData = $model->getDataArray();
		
		$productList = $repository->getProductsByArray(array_keys($cartData));

		return view('cart.main', [
			'productList' => $productList,
			'productQuantityList' => $cartData
			]);
	}

}